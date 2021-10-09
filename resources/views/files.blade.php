@extends('layouts.layout')
@section('content')
        <script src="<?php echo asset('vendors/dropzone/dropzone.js')  ?>"></script>
     
<div class="page-header d-flex justify-content-between">
        <h2>Instances</h2>
        <a href="#" class="files-toggler">
            <i class="ti-menu"></i>
        </a>
    </div>

    <div class="row">
        <div class="col-xl-3 files-sidebar" >
            <div class="card border-0" >
                @if(session("role")=="admin")
                @if(count($data['categories'])>0)
                  <div class="pure-button fuller-button red" data-toggle="modal" data-target="#archive">Archive</div>
                @endif
                @endif
                
                <div id="files" class="jstree jstree-1 jstree-default"  >
        

                    <ul class="jstree-container-ul jstree-children jstree-no-dots" role="group" style="overflow-y:scroll;max-height:600px">
                        @if(count($data['categories'] )==0)
                        <small>no Catogories to show</small>
                        @else
                        @foreach($data['categories'] as $category)
                        <form method="post" action="{{ route('cat.homePost') }}">
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
                             @if($category->accepted==0)
                            <a  class="jstree-anchor nameCat animate__animated animate__bounce animate__infinite" href="#" tabindex="-1" id="j1_1_anchor">
                                <i class="jstree-icon jstree-themeicon ti-folder text-warning jstree-themeicon-custom" role="presentation">
                            </i>
                                {{$category->name}}

                            </a>
                             @else
                            <a  class="jstree-anchor nameCat" href="#" tabindex="-1" id="j1_1_anchor">
                                <i class="jstree-icon jstree-themeicon ti-folder text-warning jstree-themeicon-custom" role="presentation">
                            </i>
                                {{$category->name}}

                            </a>
                             @endif
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
@if(session('role')=="admin")       
  <li class="nav-item">
    <a class="nav-link" id="req-tab" data-toggle="tab" href="#reqreq" role="tab"
       aria-controls="contact" aria-selected="false">Action</a>
  </li>
@endif
</ul>
            
            
<div class="tab-content">
    
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
             
            <div class="d-md-flex justify-content-between ">
                <h2>Files</h2>
               <ul class="list-inline mb-3 nav">
                   
              
                    @if($data['role']=="admin")

                    <li class="nav-link">
                        <a href="#" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown">
                            Add
                        </a>
                        <div class="dropdown-menu">
                             @if(session('role')=="admin" or session('role')=="prof" or session('role')=="emp" )
                            <a class="dropdown-item"  data-toggle="modal" href="#exampleModalCenter">New Category</a>
                            @endif
                            @if(isset($data['catId']))
                            <a class="dropdown-item" data-toggle="modal" href="#exampleModal" >New File</a>
                            @endif
                        </div>
                    </li>
                    @endif
                            
  
       
                </ul>
              
              
            </div>


    @if(isset($data['catId']))
     @if(count($data['files'])>0)
     <div class="row"><div class="col-sm-12 col-md-6"><div  id="user-list_filter" class="dataTables_filter"><label style="float:left">Search:<input  spellcheck="false" placeholder="Search" onkeyup="shFile(this)" dataid="{{$data['catId']}}"type="search" class="form-control form-control-sm" placeholder="" aria-controls="user-list" ></label></div></div></div>
    @endif
     
  @endif          
    

    <div class="table-responsive">
         @if(isset($data['catId']))
          @if(count($data['files'])>0)
       
                
                
                
                
                <table id="table-files"  class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Added</th>
                        <th>Added By</th>
                        <th></th>
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
                        
                  
                        <td class="text-right">
                            <div class="dropdown">
                                <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                    <i class="ti-more-alt"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item" date="{{$file->date}}" original="{{$file->original}}" size="{{$file->size * 0.001}}" owner="{{$file->name}}" fileid="{{url('/').'/download/'.$file->id}}" data-sidebar-target="#view-detail">View
                                        Details</a>
                                    <a href="#" onclick="deleteFile(this)" fileid="{{$file->id}}" class="dropdown-item">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                  @endforeach
                        
                    
                       
                    </tbody>
                    
                    
                </table>
        
            @else
           <video id="gif-mp4" poster="https://media2.giphy.com/media/L8K62iTDkzGX6/200_s.gif" style="margin:0;padding:0" autoplay="" loop="" width="100%" height="320">
                <source src="https://media2.giphy.com/media/L8K62iTDkzGX6/giphy.mp4" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;">
                <img src="https://media2.giphy.com/media/L8K62iTDkzGX6/giphy.gif" title="Your browser does not support the mp4 video codec.">
            </video>
         @endif
         @endif  
            </div>
    
    
    
    

    </div>
    
    
    
    
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
             @if(isset($data['catId']))
              <div class="col-md-12">
            <div class="page-header d-flex justify-content-between">
                <h2>Admins</h2>
                <ul class="nav">
                    @if(session('role')=="admin")
                     <li>
                    <div class="dropdown">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
    Add
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" data-toggle="modal" href="#empsModal" >Admin</a>
    <a class="dropdown-item" data-toggle="modal" href="#profsModal" >Professors</a>
  </div>
</div>
                    </li> 
                    @endif
                   
                    
                      




                </ul>
                
            </div>
            

            <div class="card border-0">
                 @if(count($data['admins'])>0)
 <div class="row"><div class="col-sm-12 col-md-6"><div  id="user-list_filter" class="dataTables_filter"><label style="float:left">Search:<input onkeyup="shAdmin(this)" dataid="{{$data['catId']}}"  type="search" class="form-control form-control-sm" placeholder="" aria-controls="user-list"></label></div></div></div>
                @endif
                    
                
                <div class="table-responsive">
                @if(count($data['admins'])>0)

                    <table id="admin-list" class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th>
                               
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                  
                      @foreach($data['admins'] as $emp)
               
                        <tr>
                            <td>
                             <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">A</span>
                                        </figure>
                            
                            </td>
                            <td>
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
                            
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" onclick="deleteAdmin(this)" catid="{{$data['catId']}}" admin="{{$emp->id}}" class="dropdown-item">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                       
                        </tbody>
                    </table>
                     @else
           <video id="gif-mp4" poster="https://media2.giphy.com/media/L8K62iTDkzGX6/200_s.gif" style="margin:0;padding:0" autoplay="" loop="" width="100%" height="320">
                <source src="https://media2.giphy.com/media/L8K62iTDkzGX6/giphy.mp4" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;">
                <img src="https://media2.giphy.com/media/L8K62iTDkzGX6/giphy.gif" title="Your browser does not support the mp4 video codec.">
            </video>
         @endif
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
                <ul class="nav">
         
                @if(session('role')=="admin")

                     <li>
                    <div class="dropdown">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
    Add
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" data-toggle="modal" href="#csvetd" >Student</a>
    <a class="dropdown-item" data-toggle="modal" href="#csvprof" >Profesors</a>
    <a class="dropdown-item" data-toggle="modal" href="#csvemp" >Admin</a>

  </div>
</div>
                    </li>  
                 @endif     
                    
                      




                </ul>
                
            </div>
            

            <div class="card border-0">
                @if(count($data['members'])>0)

                <div class="row"><div class="col-sm-12 col-md-6"><div  id="user-list_filter" class="dataTables_filter"><label style="float:left">Search:<input onkeyup="shMember(this)" dataid="{{$data['catId']}}" type="search" class="form-control form-control-sm" placeholder="" aria-controls="user-list"></label></div></div></div>
                @endif
                    
                
              
                <div class="table-responsive">
                                    @if(count($data['members'])>0)

                    <table id="users-list" class="table table-borderless table-hover">
                        <thead>
                        <tr>
                            <th>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="user-list-select-all">
                                    <label class="custom-control-label" for="user-list-select-all"></label>
                                </div>
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                      @foreach($data['members'] as $member)
                        <tr>
                            <td>
                              
                                <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">M</span>
                                 
                                        </figure>  
                        </td>
                             
                            <td>
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
                            
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" onclick="deleteAdmin(this)" catid="{{$data['catId']}}" admin="{{$member->id}}" class="dropdown-item">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                       
                        </tbody>
                    </table>
        @else
           <video id="gif-mp4" poster="https://media2.giphy.com/media/L8K62iTDkzGX6/200_s.gif" style="margin:0;padding:0" autoplay="" loop="" width="100%" height="320">
                <source src="https://media2.giphy.com/media/L8K62iTDkzGX6/giphy.mp4" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;">
                <img src="https://media2.giphy.com/media/L8K62iTDkzGX6/giphy.gif" title="Your browser does not support the mp4 video codec.">
            </video>
         @endif
                </div>
                
                
          
                
                
            </div>
        </div>
      
     @endif 
      
  </div>
  <div class="tab-pane fade" id="reqreq" role="tabpanel" aria-labelledby="req-tab" >
                 @if(isset($data['catId']))
              <div class="col-md-12">
            <div class="page-header d-flex justify-content-between">
                <h2>      <div  class="flex-grid-center">
    @if(isset($data['accepted']->accepted))
    @if($data['accepted']->accepted==0)          
    <div onclick="Accept(this)" data="{{$data['catId']}}" class="pure-button fuller-button blue">ACCEPT</div>
     @endif
      @endif    
    <div onclick="Delete(this)" data="{{$data['catId']}}" class="pure-button fuller-button red">DELETE</div>

</div>   </h2>
             
            
            </div>
                  
           
    </div>
      
     @endif 
      
  </div>
    
</div>

        </div>
    </div>




<!-- .modal-sm -->
<div id="archive" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
           <form action="{{route('cat.archive')}}" method="post">
               @csrf
 <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Add Archive</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close"></i>
        </button>
      </div>
      <div class="modal-body">
          <input class="form-control form-control-lg" name="Label" type="text" placeholder="Archive Name">
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
        </button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div> </form>
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
        <h5 class="modal-title" id="exampleModalCenterTitle">Create new Instances</h5>
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
                        <input type="hidden" name="members" value="{{$data['members']}}">
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
                                          <img src="<?php echo asset('assets/media/image/std.PNG')  ?>" >

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
