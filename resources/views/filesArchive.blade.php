@extends('layouts.layout')
@section('content')
        <script src="<?php echo asset('vendors/dropzone/dropzone.js')  ?>"></script>
     
<div class="page-header d-flex justify-content-between">
        <h2>Archives </h2>
        <a href="#" class="files-toggler">
            
            <i class="ti-menu"></i>
        </a>
    </div>

    <div class="row">
        
        <div class="col-xl-3 files-sidebar" >
            @if(!is_null($data['archiveId']))
            <form method="post" action="{{route('cat.archivehomePost')}}" >
                @csrf
     <select onchange="this.closest('form').submit();" name="archiveId" class="form-control form-control-sm">
         @foreach($data['archives'] as $archive)
         @if($archive->id==$data['archiveId'])
  <option  selected value="{{$archive->id}}">{{$archive->name}}</option>
         @else
     <option value="{{$archive->id}}">{{$archive->name}}</option>
      @endif
         @endforeach
</select>  
    </form>  
            @endif
            
 
          
            <div class="card border-0" >
                @if(session("role")=="admin")
                @if(!is_null($data['archiveId']))
                <form method="post" action="{{route('cat.unarchive')}}" >
                    @csrf
                    <input type="hidden" value="{{$data['archiveId']}}" name="id">
                <div class="pure-button fuller-button "  onclick="unarchive(this)" >Unarchive</div>

                </form>
<script type="application/javascript" >
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
              function unarchive(req){
                  
                  
                  swal({
    title: "Are you sure?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
}).then((willDelete) => {
    if (willDelete) {
        swal("Expole Catogories to See your Files", {
            icon: "success",});
        req.closest('form').submit();
        
    } else {
        swal("Your Archive  is safe!", {icon: "error",});
              
              }
                  
 });

              }

</script>
               @endif
                @endif
                
                <div id="files" class="jstree jstree-1 jstree-default"  >
                                                   

                    <ul class="jstree-container-ul jstree-children jstree-no-dots" role="group" style="overflow-y:scroll;max-height:600px">
                        @if(count($data['categories'] )==0)
                        <small>no Catogories to show</small>
                        @else
                        @foreach($data['categories'] as $category)
                        <form method="post" action="{{ route('cat.archivehomePost') }}">
                            @csrf
                        @if($category->id==$data['catId'])
                        <li style="padding:10px 0 10px 0 ;cursor:pointer" class="listo selectedC" onclick="GoDetails(this)">
                        @else
                         <li style="padding:10px 0 10px 0 ;cursor:pointer" class="listo" onclick="GoDetails(this)">  
                        @endif
                                <input type="text" name="catId" hidden value="{{$category->id}}">
                                <input hidden type="submit">
                            <i class="jstree-icon jstree-ocl" role="presentation">
                            </i>
                            <a  class="jstree-anchor" href="#" tabindex="-1" id="j1_1_anchor">
                                <i class="jstree-icon jstree-themeicon ti-folder text-warning jstree-themeicon-custom" role="presentation">
                            </i>
                                {{$category->name}}

                            </a>
                        </li>
                       
                        </form>
                        @endforeach
                        @endif
                    </ul>
                </div>
                
            </div>
        </div>
        

  
        
        <div  class="col-xl-9">
        <ul class="nav nav-tabs mb-3" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
       aria-controls="home" aria-selected="true">Files</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
       aria-controls="profile" aria-selected="false">Admins</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
       aria-controls="contact" aria-selected="false">Members</a>
  </li>
</ul>
            
            
<div class="tab-content">
    
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
             
            <div class="d-md-flex justify-content-between ">
                <h2>Files</h2>
             
              
              
            </div>
    @if(isset($data['catId']))
     <div class="row"><div class="col-sm-12 col-md-6"><div  id="user-list_filter" class="dataTables_filter"><label style="float:left">Search:<input  spellcheck="false" placeholder="Search" onkeyup="shFile(this)" dataid="{{$data['catId']}}"type="search" class="form-control form-control-sm" placeholder="" aria-controls="user-list" ></label></div></div></div>
    @endif
     
            <div class="table-responsive">
                
                
                
                
                
                <table id="table-files"  class="table table-borderless table-hover">
                    
                    <thead>
                    <tr>
                       
                        <th>Name</th>
                        <th>Added</th>
                        <th>Added By</th>
                    </tr>
                    </thead>
                   
                    <tbody>
                    @foreach($data['files'] as $file)
                     
              
                    <tr>
                        <td>
                            <a href="{{url('/').'/download/'.$file->id}}" class="d-flex align-items-center">
                                <figure class="avatar avatar-sm mr-3">
                                  
                                    
                                    <?php $testo=strtolower(pathinfo(storage_path($file->path),PATHINFO_EXTENSION)) ?>
                                    @if($testo=="pdf")
                                    <span class="avatar-title bg-primary-gradient  rounded-pill">
                                        
                                        <i class="fa fa-file-pdf-o"></i>
                                        
                                        
                                    </span>
                                    @elseif ($testo=="jpeg" or $testo=="jpg"  )
                                    
                                    <span class="avatar-title bg-secondary-gradient  rounded-pill">
                                        
                                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                        
                                        
                                    </span> 

                                    @elseif ($testo=="docx")
                                    
                                    <span class="avatar-title bg-info-gradient   rounded-pill">
                                        
                                        <i class="fa fa-file-word-o" aria-hidden="true"></i>

                                        
                                        
                                    </span> 
                                    @elseif ($testo=="doc")
                                    
                                    <span class="avatar-title bg-info  rounded-pill">
                                        
                                        <i class="fa fa-file-word-o" aria-hidden="true"></i>

                                        
                                        
                                    </span> 
                                    @elseif ($testo=="png")
                                    
                                    <span class="avatar-title bg-success-gradient   rounded-pill">
                                        
                                        <i class="fa fa-picture-o" aria-hidden="true"></i>


                                        
                                        
                                    </span>
 
                                    @elseif ($testo=="csv")
                                    
                                    <span class="avatar-title bg-success-gradient   rounded-pill">
                                        
                                        <i class="fa fa-table" aria-hidden="true"></i>



                                        
                                        
                                    </span>
                                    @elseif ($testo=="xlsx" or $testo=="xls" )
                                    
                                    <span class="avatar-title bg-success   rounded-pill">
                                        
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>



                                        
                                        
                                    </span>

                                    @elseif ($testo=="sql")
                                    
                                    <span class="avatar-title bg-light   rounded-pill">
                                        
                                        <i class="fa fa-database" aria-hidden="true"></i>



                                        
                                        
                                    </span> 
                                    @else
                                    
                                    <span class="avatar-title bg-dark-gradient   rounded-pill">
                                        
                                        <i class="fa fa-file-o" aria-hidden="true"></i>



                                        
                                        
                                    </span>                                    
                                    @endif

                                </figure>
                                <span class="d-flex flex-column">
                                    <span class="text-primary">{{$file->original}}</span>
                                    <span class="small font-italic">{{$file->size * 0.001 }} KB</span>
                                </span>
                            </a>
                        </td>
                        <td>{{$file->date}}</td>
                        <td>
                            <div class="badge bg-info-bright text-info">{{$file->name}}</div>
                        </td>
                        
                  
                       
                    </tr>
                  @endforeach
                    </tbody>
                    
                    
                </table>
            </div>

    </div>
    
    
    
    
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
             @if(isset($data['catId']))
              <div class="col-md-12">
            <div class="page-header d-flex justify-content-between">
                <h2>Admins</h2>
    
                
            </div>
            

            <div class="card border-0">
                
                <div class="row"><div class="col-sm-12 col-md-6"><div  id="user-list_filter" class="dataTables_filter"><label style="float:left">Search:<input onkeyup="shAdmin(this)" dataid="{{$data['catId']}}"  type="search" class="form-control form-control-sm" placeholder="" aria-controls="user-list"></label></div></div></div>
                
                    
                
                <div class="table-responsive">
                    
                    <table id="admin-list" class="table table-borderless table-hover">
                        <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                        </tr>
                        </thead>
                        <tbody>
                  
                      @foreach($data['admins'] as $emp)
               
                        <tr>
                            
                            <td>
                                  <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">A</span>
                                        </figure>
                                <a href="#">
                                      
                                    {{$emp->name}}
                                </a>
                            </td>
                            <td>{{$emp->email}}</td>
                            
                            <td>
                                @if($emp->sexe=="F")
                                <span class="badge bg-danger-bright text-danger">F</span>
                                @elseif($emp->sexe=="M")
                                   <span class="badge bg-success-bright text-success">M</span>
                                @endif
                            </td>
                            
                           
                        </tr>
                    @endforeach
                       
                        </tbody>
                    </table>
                </div>
                
                
          
                
                
            </div>
        </div>
      
     @endif 
      
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                 @if(isset($data['catId']))
              <div class="col-md-12">
            <div class="page-header d-flex justify-content-between">
                <h2>Members</h2>
          
                
            </div>
            

            <div class="card border-0">
                
                <div class="row"><div class="col-sm-12 col-md-6"><div  id="user-list_filter" class="dataTables_filter"><label style="float:left">Search:<input onkeyup="shMember(this)" dataid="{{$data['catId']}}" type="search" class="form-control form-control-sm" placeholder="" aria-controls="user-list"></label></div></div></div>
                
                    
                
              
                <div class="table-responsive">
                    
                    <table id="users-list" class="table table-borderless table-hover">
                        <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                        </tr>
                        </thead>
                        <tbody>
                      @foreach($data['members'] as $member)
                        <tr>
                            
                            <td>
                                   <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">M</span>
                                 
                                        </figure>  
                                <a href="#">
                                       
                                    {{$member->name}}
                                </a>
                            </td>
                            <td>{{$member->email}}</td>
                            
                            <td>
                                @if($member->sexe=="F")
                                <span class="badge bg-danger-bright text-danger">F</span>
                                @elseif($member->sexe=="M")
                                   <span class="badge bg-success-bright text-success">M</span>
                                @endif
                            </td>
                            
                          
                        </tr>
                    @endforeach
                       
                        </tbody>
                    </table>
                </div>
                
                
          
                
                
            </div>
        </div>
      
     @endif 
      
  </div>

    
</div>

        </div>
    </div>





    <div class="modal fade" id="newTaskModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Task title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tags</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-single" multiple>
                                    <option value="Theme Support">Theme Support</option>
                                    <option value="Freelance">Freelance</option>
                                    <option selected value="Social">Social</option>
                                    <option selected value="Friends">Friends</option>
                                    <option value="Coding">Coding</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row row-sm">
                            <label class="col-sm-3 col-form-label">Deadline</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control create-event-datepicker"
                                       placeholder="Date">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control create-event-demo"
                                       placeholder="Time">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Participate</label>
                            <div class="col-sm-9">
                                <div class="avatar-group">
                                    <figure class="avatar avatar-sm">
                                        <img src="../../assets/media/image/user/women_avatar3.jpg"
                                             class="rounded-circle"
                                             alt="image">
                                    </figure>
                                    <figure class="avatar avatar-sm">
                                        <span class="avatar-title bg-danger rounded-circle">S</span>
                                    </figure>
                                    <figure class="avatar avatar-sm">
                                        <img src="../../assets/media/image/user/women_avatar5.jpg"
                                             class="rounded-circle"
                                             alt="image">
                                    </figure>
                                </div>
                                <button type="button" class="btn btn-outline-light btn-sm btn-floating" title="Add User"
                                        data-toggle="dropdown">
                                    <i class="ti-plus"></i>
                                </button>
                                <div class="dropdown-menu p-0">
                                    <div class="p-3">
                                        <h6 class="text-uppercase font-size-11 mb-3">Add User</h6>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" placeholder="Search User"
                                                   aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-light" type="button" id="button-addon2">
                                                    <i class="ti-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-flush mt-2">
                                            <li class="list-group-item d-flex align-items-center pl-0 pr-0">
                                                <div class="mr-2">
                                                    <figure class="avatar avatar-sm">
                                                        <span class="avatar-title bg-primary rounded-circle">V</span>
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Valentine Maton</h6>
                                                </div>
                                                <div class="dropdown ml-auto">
                                                    <a href="#" data-toggle="dropdown"
                                                       class="btn btn-outline-light btn-sm"
                                                       aria-haspopup="true" aria-expanded="false">
                                                        <i data-feather="plus"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center pl-0 pr-0">
                                                <div class="mr-2">
                                                    <figure class="avatar avatar-sm">
                                                        <img
                                                            src="../../assets/media/image/user/women_avatar3.jpg"
                                                            class="rounded-circle" alt="image">
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Valentine Maton</h6>
                                                </div>
                                                <div class="dropdown ml-auto">
                                                    <a href="#" data-toggle="dropdown"
                                                       class="btn btn-outline-light btn-sm"
                                                       aria-haspopup="true" aria-expanded="false">
                                                        <i data-feather="plus"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center pl-0 pr-0">
                                                <div class="mr-2">
                                                    <figure class="avatar avatar-sm">
                                                        <img
                                                            src="../../assets/media/image/user/women_avatar2.jpg"
                                                            class="rounded-circle" alt="image">
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Valentine Maton</h6>
                                                </div>
                                                <div class="dropdown ml-auto">
                                                    <a href="#" data-toggle="dropdown"
                                                       class="btn btn-outline-light btn-sm ml-3" aria-haspopup="true"
                                                       aria-expanded="false">
                                                        <i data-feather="plus"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center pl-0 pr-0">
                                                <div class="mr-2">
                                                    <figure class="avatar avatar-sm">
                                                        <img src="../../assets/media/image/user/man_avatar2.jpg"
                                                             class="rounded-circle" alt="image">
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Valentine Maton</h6>
                                                </div>
                                                <div class="dropdown ml-auto">
                                                    <a href="#" data-toggle="dropdown"
                                                       class="btn btn-outline-light btn-sm ml-3" aria-haspopup="true"
                                                       aria-expanded="false">
                                                        <i data-feather="plus"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Task title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Title"
                                       value="Draw design and presentation for customers.">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tags</label>
                            <div class="col-sm-9">
                                <select class="js-example-basic-single" multiple>
                                    <option selected value="Theme Support">Theme Support</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Social">Social</option>
                                    <option value="Friends">Friends</option>
                                    <option value="Coding">Coding</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row row-sm">
                            <label class="col-sm-3 col-form-label">Deadline</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control create-event-datepicker"
                                       placeholder="Date" value="10/31/2019">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control create-event-demo" value="11:57"
                                       placeholder="Time">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Participate</label>
                            <div class="col-sm-9">
                                <div class="avatar-group">
                                    <figure class="avatar avatar-sm">
                                        <img src="../../assets/media/image/user/women_avatar3.jpg"
                                             class="rounded-circle"
                                             alt="image">
                                    </figure>
                                    <figure class="avatar avatar-sm">
                                        <span class="avatar-title bg-danger rounded-circle">S</span>
                                    </figure>
                                    <figure class="avatar avatar-sm">
                                        <img src="../../assets/media/image/user/women_avatar5.jpg"
                                             class="rounded-circle"
                                             alt="image">
                                    </figure>
                                </div>
                                <button type="button" class="btn btn-outline-light btn-sm btn-floating" title="Add User"
                                        data-toggle="dropdown">
                                    <i class="ti-plus"></i>
                                </button>
                                <div class="dropdown-menu p-0">
                                    <div class="p-3">
                                        <h6 class="text-uppercase font-size-11 mb-3">Add User</h6>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" placeholder="Search User"
                                                   aria-describedby="button-addon3">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-light" type="button" id="button-addon3">
                                                    <i class="ti-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-flush mt-2">
                                            <li class="list-group-item d-flex align-items-center pl-0 pr-0">
                                                <div class="mr-2">
                                                    <figure class="avatar avatar-sm">
                                                        <span class="avatar-title bg-primary rounded-circle">V</span>
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Valentine Maton</h6>
                                                </div>
                                                <div class="dropdown ml-auto">
                                                    <a href="#" data-toggle="dropdown"
                                                       class="btn btn-outline-light btn-sm"
                                                       aria-haspopup="true" aria-expanded="false">
                                                        <i data-feather="plus"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center pl-0 pr-0">
                                                <div class="mr-2">
                                                    <figure class="avatar avatar-sm">
                                                        <img
                                                            src="../../assets/media/image/user/women_avatar3.jpg"
                                                            class="rounded-circle" alt="image">
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Valentine Maton</h6>
                                                </div>
                                                <div class="dropdown ml-auto">
                                                    <a href="#" data-toggle="dropdown"
                                                       class="btn btn-outline-light btn-sm"
                                                       aria-haspopup="true" aria-expanded="false">
                                                        <i data-feather="plus"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center pl-0 pr-0">
                                                <div class="mr-2">
                                                    <figure class="avatar avatar-sm">
                                                        <img
                                                            src="../../assets/media/image/user/women_avatar2.jpg"
                                                            class="rounded-circle" alt="image">
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Valentine Maton</h6>
                                                </div>
                                                <div class="dropdown ml-auto">
                                                    <a href="#" data-toggle="dropdown"
                                                       class="btn btn-outline-light btn-sm ml-3" aria-haspopup="true"
                                                       aria-expanded="false">
                                                        <i data-feather="plus"></i>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex align-items-center pl-0 pr-0">
                                                <div class="mr-2">
                                                    <figure class="avatar avatar-sm">
                                                        <img src="../../assets/media/image/user/man_avatar2.jpg"
                                                             class="rounded-circle" alt="image">
                                                    </figure>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Valentine Maton</h6>
                                                </div>
                                                <div class="dropdown ml-auto">
                                                    <a href="#" data-toggle="dropdown"
                                                       class="btn btn-outline-light btn-sm ml-3" aria-haspopup="true"
                                                       aria-expanded="false">
                                                        <i data-feather="plus"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur corporis incidunt labore modi numquam omnis pariatur possimus suscipit vitae voluptas?</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <i data-feather="check" class="mr-2"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



<div style="overflow:scroll" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Create new Instance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close"></i>
        </button>
      </div>
      <div id="mymode" class="modal-body" >
          
     
          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
        </button>
        <button onclick="addfolder()" type="button" class="btn btn-primary" >Add One More</button>
        <button type="button" onclick="addCategory()" class="btn btn-primary" >Save</button>
      </div>
    </div>
  </div>
</div>


<script type="application/javascript" src="<?php echo asset('assets/js/folders.js')  ?>"></script>
<script type="application/javascript">
    'use strict'
   function GoDetails(e){
       e.firstElementChild.nextElementSibling.click();
   }

</script>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            
          <i class="ti-close"></i>
        </button>
      </div>
      <div class="modal-body">
        


<form method="post" action="{{ route('file.upload') }}"
      class="dropzone"
      id="dropzoneForm" enctype="multipart/form-data">
           @csrf
    <div class="fallback"> <input type="file" name="file" ></div>
                      
      @if( isset($data['catId']) )
                        <input  type="hidden" name="categoryId"value="{{$data['catId']}}">
                        @endif
          
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
        </button>
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="empsModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <form method="POST" action="{{route('emp.admins')}}">
@csrf
                            @if(isset($data['catId']))  
                            <input name="cat" type="hidden" value="{{$data['catId']}}">
                            @endif
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Make an admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close"></i>
        </button>
      </div>
      <div class="modal-body" >
          
                        <div class="table-responsive" style="overflow-y:scroll;max-height:500px">
                    <table id="user-list" class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th>
                               
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Poste</th>
                        </tr>
                        </thead>
                        <tbody>
                     
                      @foreach($data['emp'] as $emp)
               
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="messi{{$emp->id}}" value="{{$emp->id}}" id="user{{$emp->id}}">
                                    <label class="custom-control-label" for="user{{$emp->id}}"></label>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
                                    {{$emp->name}}
                                </a>
                            </td>
                            <td>{{$emp->email}}</td>
                            
                            <td>
                                @if($emp->sexe=="F")
                                <span class="badge bg-danger-bright text-danger">F</span>
                                @elseif($emp->sexe=="M")
                                   <span class="badge bg-success-bright text-success">M</span>
                                @endif
                            </td>
                            <td>{{$emp->poste}}</td>
                            
                   
                        </tr>
                    @endforeach
                       
                        </tbody>
                    </table>
                    
                </div>
                




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
        </button>
        <button type="submit" class="btn btn-primary" id="submit-all">Save changes</button>
      </div>
    </div>
  </div> </form> 
</div>                          


<div class="modal fade" id="profsModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <form method="POST" action="{{route('prof.admins')}}">
@csrf
                          @if(isset($data['catId']))  
                            <input name="cat" type="hidden" value="{{$data['catId']}}">
                            @endif
                            
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Make an admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close"></i>
        </button>
      </div>
      <div class="modal-body" >
          
                        <div class="table-responsive" style="overflow-y:scroll;max-height:500px">
                    <table id="user-list" class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th>
                               
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Specialité</th>
                        </tr>
                        </thead>
                        <tbody>
                     
                      @foreach($data['profn'] as $prof)
               
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="messi{{$prof->id}}" value="{{$prof->id}}" id="user{{$prof->id}}">
                                    <label class="custom-control-label" for="user{{$prof->id}}"></label>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
                                    {{$prof->name}}
                                </a>
                            </td>
                            <td>{{$prof->email}}</td>
                            
                            <td>
                                @if($prof->sexe=="F")
                                <span class="badge bg-danger-bright text-danger">F</span>
                                @elseif($prof->sexe=="M")
                                   <span class="badge bg-success-bright text-success">M</span>
                                @endif
                            </td>
                            <td>{{$prof->specialité}}</td>
                            
                   
                        </tr>
                    @endforeach
                       
                        </tbody>
                    </table>
                    
                </div>
                




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
        </button>
        <button type="submit" class="btn btn-primary" id="submit-all">Save changes</button>
      </div>
    </div>
  </div> </form> 
</div>   


<div class="modal fade" id="csvetd" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">import csv student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close"></i>
        </button>
      </div>
      <div class="modal-body">
        


<form method="post" action="{{ route('student') }}"
      class="dropzone"
      id="dropzoneForm" enctype="multipart/form-data">
           @csrf
                         <div class="fallback">
                        <input type="file" name="file" >
                      
                    </div>
                       @if( isset($data['catId']) )
                        <input  type="hidden" name="categoryId" value="{{$data['catId']}}">
                        @endif
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
        </button>
        <button type="button" class="btn btn-primary" id="submit-all">Save changes</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="csvprof" tabindex="-1" role="dialog" aria-hidden="true">
                        <form method="POST" action="{{route('prof.member')}}">
@csrf
                          @if(isset($data['catId']))  
                            <input name="cat" type="hidden" value="{{$data['catId']}}">
                            @endif
                            
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add Members</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close"></i>
        </button>
      </div>
      <div class="modal-body" >
          
                        <div class="table-responsive" style="overflow-y:scroll;max-height:500px">
                    <table id="user-list" class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th>
                               
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Specialité</th>
                        </tr>
                        </thead>
                        <tbody>
                     
                      @foreach($data['profnm'] as $prof)
               
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="messi{{$prof->id}}" value="{{$prof->id}}" id="user2{{$prof->id}}">
                                    <label class="custom-control-label" for="user2{{$prof->id}}"></label>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
                                    {{$prof->name}}
                                </a>
                            </td>
                            <td>{{$prof->email}}</td>
                            
                            <td>
                                @if($prof->sexe=="F")
                                <span class="badge bg-danger-bright text-danger">F</span>
                                @elseif($prof->sexe=="M")
                                   <span class="badge bg-success-bright text-success">M</span>
                                @endif
                            </td>
                            <td>{{$prof->specialité}}</td>
                            
                   
                        </tr>
                    @endforeach
                       
                        </tbody>
                    </table>
                    
                </div>
                




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
        </button>
        <button type="submit" class="btn btn-primary" id="submit-all">Save changes</button>
      </div>
    </div>
  </div> </form> 
</div>   
<div class="modal fade" id="csvemp" tabindex="-1" role="dialog" aria-hidden="true">
                        <form method="POST" action="{{route('emp.member')}}">
@csrf
                            @if(isset($data['catId']))  
                            <input name="cat" type="hidden" value="{{$data['catId']}}">
                            @endif
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Make a Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close"></i>
        </button>
      </div>
      <div class="modal-body" >
          
                        <div class="table-responsive" style="overflow-y:scroll;max-height:500px">
                    <table id="user-list" class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th>
                               
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Poste</th>
                        </tr>
                        </thead>
                        <tbody>
                     
                      @foreach($data['empnm'] as $emp)
               
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="messi{{$emp->id}}" value="{{$emp->id}}" id="empl{{$emp->id}}">
                                    <label class="custom-control-label" for="empl{{$emp->id}}"></label>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
                                    {{$emp->name}}
                                </a>
                            </td>
                            <td>{{$emp->email}}</td>
                            
                            <td>
                                @if($emp->sexe=="F")
                                <span class="badge bg-danger-bright text-danger">F</span>
                                @elseif($emp->sexe=="M")
                                   <span class="badge bg-success-bright text-success">M</span>
                                @endif
                            </td>
                            <td>{{$emp->poste}}</td>
                            
                   
                        </tr>
                    @endforeach
                       
                        </tbody>
                    </table>
                    
                </div>
                




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
        </button>
        <button type="submit" class="btn btn-primary" id="submit-all">Save changes</button>
      </div>
    </div>
  </div> </form> 
</div>  

<form id="datasend" action="{{route('cat.home')}}" method="get">
    @csrf
</form>
<script type="application/javascript" src="<?php echo asset('assets/js/scripy.js')  ?>"></script>

<script type="application/javascript">
function deleteFile(req){
    var data = req.getAttribute("fileid");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
     
        if(this.responseText=="OK"){
         function f() {
            req.parentElement.parentElement.parentElement.parentElement.classList.add('animate__animated') ;
            req.parentElement.parentElement.parentElement.parentElement.classList.add('animate__backOutUp') ;
             setTimeout(alertFunc, 600);
         }function alertFunc(){req.parentElement.parentElement.parentElement.parentElement.remove();}f();
        }

   }
     };
  xhttp.open("GET", uri+"/deleteFile/"+data, true);
  xhttp.send();
    
}

    function deleteAdmin(req){
    var cat = req.getAttribute("catid");
    var usr = req.getAttribute("admin");
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
     
        if(this.responseText=="OK"){
         function f() {
            req.parentElement.parentElement.parentElement.parentElement.classList.add('animate__animated') ;
            req.parentElement.parentElement.parentElement.parentElement.classList.add('animate__backOutUp') ;
             setTimeout(alertFunc, 600);
         }function alertFunc(){req.parentElement.parentElement.parentElement.parentElement.remove();}f();
        }

   }
     };
  xhttp.open("GET", uri+"/deleteMA/"+cat+"/"+usr, true);
  xhttp.send();
    
}




</script>

<script type="text/javascript">

  Dropzone.options.dropzoneForm = {
    autoProcessQueue : true,

    init:function(){
        

        
      this.on("complete", function(){
        if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
        {
          var _this = this;
             location.reload(); 
        }
      });

    }

  };




</script>


@endsection
