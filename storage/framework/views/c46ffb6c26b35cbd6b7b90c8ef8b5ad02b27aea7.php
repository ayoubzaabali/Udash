
<?php $__env->startSection('content'); ?>
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
                <!-- <?php if(session("role")=="admin"): ?>
                <?php if(count($data['categories'])>0): ?>
                  <div class="pure-button fuller-button red" data-toggle="modal" data-target="#archive">Archive</div>
                <?php endif; ?>
                <?php endif; ?> -->
                
                <div id="files" class="jstree jstree-1 jstree-default"  >
        

                    <ul  id="filesScroll" class="jstree-container-ul jstree-children jstree-no-dots" role="group" >
                        <?php if(count($data['categories'] )==0): ?>
                        <small>no Instances to show</small>
                        <?php else: ?>
                        <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form method="post" action="<?php echo e(route('cat.homePost')); ?>">
                            <?php echo csrf_field(); ?>
                        <?php if($category->id==$data['catId']): ?>
                        <li style="padding:10px 0 10px 0 ;cursor:pointer" class="listo selectedC" onclick="GoDetails(this)">
                        <?php else: ?>
                         <li style="padding:10px 0 10px 0 ;cursor:pointer" class="listo" onclick="GoDetails(this)">  
                        <?php endif; ?>
                                <input type="text" name="catId" hidden value="<?php echo e($category->id); ?>">
                                <input hidden type="submit">
                            <i class="jstree-icon jstree-ocl" role="presentation">
                            </i>
                             <?php if($category->accepted==0): ?>
                            <a  class="jstree-anchor nameCat animate__animated animate__bounce animate__infinite" href="#" tabindex="-1" id="j1_1_anchor">
                                <i class="jstree-icon jstree-themeicon ti-folder text-warning jstree-themeicon-custom" role="presentation">
                            </i>
                                <?php echo e($category->name); ?>


                            </a>
                             <?php else: ?>
                            <a  class="jstree-anchor nameCat" href="#" tabindex="-1" id="j1_1_anchor">
                                <i class="jstree-icon jstree-themeicon ti-folder text-warning jstree-themeicon-custom" role="presentation">
                            </i>
                                <?php echo e($category->name); ?>


                            </a>
                             <?php endif; ?>
                        </li>
                       
                        </form>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
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
<?php if(session('role')=="admin"): ?>       
  <li class="nav-item">
    <a class="nav-link" id="req-tab" data-toggle="tab" href="#reqreq" role="tab"
       aria-controls="contact" aria-selected="false">Action</a>
  </li>
<?php endif; ?>
</ul>
            
            
<div class="tab-content">
    
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
             
            <div class="d-md-flex justify-content-between ">
                <h2>Files</h2>
               <ul class="list-inline mb-3 nav">
                   
              
                    <?php if($data['role']=="admin"): ?>

                    <li class="nav-link">
                        <a href="#" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown">
                            Add
                        </a>
                        <div class="dropdown-menu">
                             <?php if(session('role')=="admin" or session('role')=="prof" or session('role')=="emp" ): ?>
                            <a class="dropdown-item"  data-toggle="modal" href="#exampleModalCenter">New Instance</a>
                            <?php endif; ?>
                            <?php if(isset($data['catId'])): ?>
                            <a class="dropdown-item" data-toggle="modal" href="#exampleModal" >New File</a>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endif; ?>
                            
  
       
                </ul>
              
              
            </div>


    <?php if(isset($data['catId'])): ?>
     <?php if(count($data['files'])>0): ?>
     <div class="row"><div class="col-sm-12 col-md-6"><div  id="user-list_filter" class="dataTables_filter"><label style="float:left">Search:<input  spellcheck="false" placeholder="Search" onkeyup="shFile(this)" dataid="<?php echo e($data['catId']); ?>"type="search" class="form-control form-control-sm" placeholder="" aria-controls="user-list" ></label></div></div></div>
    <?php endif; ?>
     
  <?php endif; ?>          
    

    <div class="table-responsive">
         <?php if(isset($data['catId'])): ?>
          <?php if(count($data['files'])>0): ?>
       
                
                
                
                
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
                        
                    <?php $__currentLoopData = $data['files']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     
              
                    <tr>
                        <td>
                            <a href="<?php echo e(url('/').'/download/'.$file->id); ?>" class="d-flex align-items-center">
                                <figure class="avatar avatar-sm mr-3">
                                  
                                    
                                    <?php $testo=strtolower(pathinfo(storage_path($file->path),PATHINFO_EXTENSION)) ?>
                                    <?php if($testo=="pdf"): ?>
                                    <span class="avatar-title bg-primary-gradient  rounded-pill">
                                        
                                        <i class="fa fa-file-pdf-o"></i>
                                        
                                        
                                    </span>
                                    <?php elseif($testo=="jpeg" or $testo=="jpg"  ): ?>
                                    
                                    <span class="avatar-title bg-secondary-gradient  rounded-pill">
                                        
                                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                        
                                        
                                    </span> 

                                    <?php elseif($testo=="docx"): ?>
                                    
                                    <span class="avatar-title bg-info-gradient   rounded-pill">
                                        
                                        <i class="fa fa-file-word-o" aria-hidden="true"></i>

                                        
                                        
                                    </span> 
                                    <?php elseif($testo=="doc"): ?>
                                    
                                    <span class="avatar-title bg-info  rounded-pill">
                                        
                                        <i class="fa fa-file-word-o" aria-hidden="true"></i>

                                        
                                        
                                    </span> 
                                    <?php elseif($testo=="png"): ?>
                                    
                                    <span class="avatar-title bg-success-gradient   rounded-pill">
                                        
                                        <i class="fa fa-picture-o" aria-hidden="true"></i>


                                        
                                        
                                    </span>
 
                                    <?php elseif($testo=="csv"): ?>
                                    
                                    <span class="avatar-title bg-success-gradient   rounded-pill">
                                        
                                        <i class="fa fa-table" aria-hidden="true"></i>



                                        
                                        
                                    </span>
                                    <?php elseif($testo=="xlsx" or $testo=="xls" ): ?>
                                    
                                    <span class="avatar-title bg-success   rounded-pill">
                                        
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>



                                        
                                        
                                    </span>

                                    <?php elseif($testo=="sql"): ?>
                                    
                                    <span class="avatar-title bg-light   rounded-pill">
                                        
                                        <i class="fa fa-database" aria-hidden="true"></i>



                                        
                                        
                                    </span> 
                                    <?php else: ?>
                                    
                                    <span class="avatar-title bg-dark-gradient   rounded-pill">
                                        
                                        <i class="fa fa-file-o" aria-hidden="true"></i>



                                        
                                        
                                    </span>                                    
                                    <?php endif; ?>

                                </figure>
                                <span class="d-flex flex-column">
                                    <span class="text-primary"><?php echo e($file->original); ?></span>
                                    <span class="small font-italic"><?php echo e($file->size * 0.001); ?> KB</span>
                                </span>
                            </a>
                        </td>
                        <td><?php echo e($file->date); ?></td>
                        <td>
                            <div class="badge bg-info-bright text-info"><?php echo e($file->name); ?></div>
                        </td>
                        
                  
                        <td class="text-right">
                            <div class="dropdown">
                                <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                    <i class="ti-more-alt"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item" date="<?php echo e($file->date); ?>" original="<?php echo e($file->original); ?>" size="<?php echo e($file->size * 0.001); ?>" owner="<?php echo e($file->name); ?>" fileid="<?php echo e(url('/').'/download/'.$file->id); ?>" data-sidebar-target="#view-detail">View
                                        Details</a>
                                    <a href="#" onclick="deleteFile(this)" fileid="<?php echo e($file->id); ?>" class="dropdown-item">Delete</a>
                              
                                </div>
                        
                            </div>
                        </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    
                       
                    </tbody>
                    
                    
                </table>
        
            <?php else: ?>
           <video id="gif-mp4" poster="https://media2.giphy.com/media/L8K62iTDkzGX6/200_s.gif" style="margin:0;padding:0" autoplay="" loop="" width="100%" height="320">
                <source src="https://media2.giphy.com/media/L8K62iTDkzGX6/giphy.mp4" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;">
                <img src="https://media2.giphy.com/media/L8K62iTDkzGX6/giphy.gif" title="Your browser does not support the mp4 video codec.">
            </video>
         <?php endif; ?>
         <?php endif; ?>  
            </div>
    
    
    
    

    </div>
    
    
    
    
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
             <?php if(isset($data['catId'])): ?>
              <div class="col-md-12">
            <div class="page-header d-flex justify-content-between">
                <h2>Admins</h2>
                <ul class="nav">
                    <?php if(session('role')=="admin"): ?>
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
                    <?php endif; ?>
                   
                    
                      




                </ul>
                
            </div>
            

            <div class="card border-0">
                 <?php if(count($data['admins'])>0): ?>
 <div class="row"><div class="col-sm-12 col-md-6"><div  id="user-list_filter" class="dataTables_filter"><label style="float:left">Search:<input onkeyup="shAdmin(this)" dataid="<?php echo e($data['catId']); ?>"  type="search" class="form-control form-control-sm" placeholder="" aria-controls="user-list"></label></div></div></div>
                <?php endif; ?>
                    
                
                <div class="table-responsive">
                <?php if(count($data['admins'])>0): ?>

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
                  
                      <?php $__currentLoopData = $data['admins']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                        <tr>
                            <td>
                             <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">A</span>
                                        </figure>
                            
                            </td>
                            <td>
                                <a href="#">
                                      
                                    <?php echo e($emp->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($emp->email); ?></td>
                            
                            <td>
                                <?php if($emp->sexe=="F"): ?>
                                <span class="badge bg-danger-bright text-danger">F</span>
                                <?php elseif($emp->sexe=="M"): ?>
                                   <span class="badge bg-success-bright text-success">M</span>
                                <?php endif; ?>
                            </td>
                            
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" onclick="deleteAdmin(this)" catid="<?php echo e($data['catId']); ?>" admin="<?php echo e($emp->id); ?>" class="dropdown-item">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        </tbody>
                    </table>
                     <?php else: ?>
           <video id="gif-mp4" poster="https://media2.giphy.com/media/L8K62iTDkzGX6/200_s.gif" style="margin:0;padding:0" autoplay="" loop="" width="100%" height="320">
                <source src="https://media2.giphy.com/media/L8K62iTDkzGX6/giphy.mp4" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;">
                <img src="https://media2.giphy.com/media/L8K62iTDkzGX6/giphy.gif" title="Your browser does not support the mp4 video codec.">
            </video>
         <?php endif; ?>
                </div>
                
                
          
                
                
            </div>
        </div>
      
     <?php endif; ?> 
      
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                 <?php if(isset($data['catId'])): ?>
              <div class="col-md-12">
            <div class="page-header d-flex justify-content-between">
                <h2>Members</h2>
                <ul class="nav">
         
                <?php if(session('role')=="admin"): ?>

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
                 <?php endif; ?>     
                    
                      




                </ul>
                
            </div>
            

            <div class="card border-0">
                <?php if(count($data['members'])>0): ?>

                <div class="row"><div class="col-sm-12 col-md-6"><div  id="user-list_filter" class="dataTables_filter"><label style="float:left">Search:<input onkeyup="shMember(this)" dataid="<?php echo e($data['catId']); ?>" type="search" class="form-control form-control-sm" placeholder="" aria-controls="user-list"></label></div></div></div>
                <?php endif; ?>
                    
                
              
                <div class="table-responsive">
                                    <?php if(count($data['members'])>0): ?>

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
                      <?php $__currentLoopData = $data['members']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                              
                                <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">M</span>
                                 
                                        </figure>  
                        </td>
                             
                            <td>
                                <a href="#">
                                       
                                    <?php echo e($member->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($member->email); ?></td>
                            
                            <td>
                                <?php if($member->sexe=="F"): ?>
                                <span class="badge bg-danger-bright text-danger">F</span>
                                <?php elseif($member->sexe=="M"): ?>
                                   <span class="badge bg-success-bright text-success">M</span>
                                <?php endif; ?>
                            </td>
                            
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" onclick="deleteAdmin(this)" catid="<?php echo e($data['catId']); ?>" admin="<?php echo e($member->id); ?>" class="dropdown-item">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        </tbody>
                    </table>
        <?php else: ?>
           <video id="gif-mp4" poster="https://media2.giphy.com/media/L8K62iTDkzGX6/200_s.gif" style="margin:0;padding:0" autoplay="" loop="" width="100%" height="320">
                <source src="https://media2.giphy.com/media/L8K62iTDkzGX6/giphy.mp4" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;">
                <img src="https://media2.giphy.com/media/L8K62iTDkzGX6/giphy.gif" title="Your browser does not support the mp4 video codec.">
            </video>
         <?php endif; ?>
                </div>
                
                
          
                
                
            </div>
        </div>
      
     <?php endif; ?> 
      
  </div>
  <div class="tab-pane fade" id="reqreq" role="tabpanel" aria-labelledby="req-tab" >
                 <?php if(isset($data['catId'])): ?>
              <div class="col-md-12">
            <div class="page-header d-flex justify-content-between">
                <h2>      <div  class="flex-grid-center">
    <?php if(isset($data['accepted']->accepted)): ?>
    <?php if($data['accepted']->accepted==0): ?>          
    <div onclick="Accept(this)" data="<?php echo e($data['catId']); ?>" class="pure-button fuller-button blue">ACCEPT</div>
     <?php endif; ?>
      <?php endif; ?>    
    <div onclick="Delete(this)" data="<?php echo e($data['catId']); ?>" class="pure-button fuller-button red">DELETE</div>
    <?php if(session("role")=="admin"): ?>
                <?php if(count($data['categories'])>0): ?>
                  <div class="pure-button fuller-button red" data-toggle="modal" data-target="#archive">Archive All</div>
                <?php endif; ?>
                <?php endif; ?>

</div>   </h2>
             
            
            </div>
                  
           
    </div>
      
     <?php endif; ?> 
      
  </div>
    
</div>

        </div>
    </div>




<!-- .modal-sm -->
<div id="archive" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
           <form action="<?php echo e(route('cat.archive')); ?>" method="post">
               <?php echo csrf_field(); ?>
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
        


<form method="post" action="<?php echo e(route('file.upload')); ?>"
      class="dropzone"
      id="dropzoneForm" enctype="multipart/form-data">
           <?php echo csrf_field(); ?>
    <div class="fallback"> <input type="file" name="file" ></div>
                      
      <?php if( isset($data['catId']) ): ?>
                        <input  type="hidden" name="categoryId"value="<?php echo e($data['catId']); ?>">
                        <input type="hidden" name="members" value="<?php echo e($data['members']); ?>">
                        <?php endif; ?>
          
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
                        <form method="POST" action="<?php echo e(route('emp.admins')); ?>">
<?php echo csrf_field(); ?>
                            <?php if(isset($data['catId'])): ?>  
                            <input name="cat" type="hidden" value="<?php echo e($data['catId']); ?>">
                            <?php endif; ?>
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
                     
                      <?php $__currentLoopData = $data['emp']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="messi<?php echo e($emp->id); ?>" value="<?php echo e($emp->id); ?>" id="user<?php echo e($emp->id); ?>">
                                    <label class="custom-control-label" for="user<?php echo e($emp->id); ?>"></label>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
                                    <?php echo e($emp->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($emp->email); ?></td>
                            
                            <td>
                                <?php if($emp->sexe=="F"): ?>
                                <span class="badge bg-danger-bright text-danger">F</span>
                                <?php elseif($emp->sexe=="M"): ?>
                                   <span class="badge bg-success-bright text-success">M</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($emp->poste); ?></td>
                            
                   
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
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
                        <form method="POST" action="<?php echo e(route('prof.admins')); ?>">
<?php echo csrf_field(); ?>
                          <?php if(isset($data['catId'])): ?>  
                            <input name="cat" type="hidden" value="<?php echo e($data['catId']); ?>">
                            <?php endif; ?>
                            
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
                     
                      <?php $__currentLoopData = $data['profn']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="messi<?php echo e($prof->id); ?>" value="<?php echo e($prof->id); ?>" id="user<?php echo e($prof->id); ?>">
                                    <label class="custom-control-label" for="user<?php echo e($prof->id); ?>"></label>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
                                    <?php echo e($prof->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($prof->email); ?></td>
                            
                            <td>
                                <?php if($prof->sexe=="F"): ?>
                                <span class="badge bg-danger-bright text-danger">F</span>
                                <?php elseif($prof->sexe=="M"): ?>
                                   <span class="badge bg-success-bright text-success">M</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($prof->specialité); ?></td>
                            
                   
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
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
        


<form method="post" action="<?php echo e(route('student')); ?>"
      class="dropzone"
      id="dropzoneForm" enctype="multipart/form-data">
           <?php echo csrf_field(); ?>
                         <div class="fallback">
                        <input type="file" name="file" >
                      
                    </div>
                       <?php if( isset($data['catId']) ): ?>
                        <input  type="hidden" name="categoryId" value="<?php echo e($data['catId']); ?>">
                        <?php endif; ?>
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
                        <form method="POST" action="<?php echo e(route('prof.member')); ?>">
<?php echo csrf_field(); ?>
                          <?php if(isset($data['catId'])): ?>  
                            <input name="cat" type="hidden" value="<?php echo e($data['catId']); ?>">
                            <?php endif; ?>
                            
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
                     
                      <?php $__currentLoopData = $data['profnm']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="messi<?php echo e($prof->id); ?>" value="<?php echo e($prof->id); ?>" id="user2<?php echo e($prof->id); ?>">
                                    <label class="custom-control-label" for="user2<?php echo e($prof->id); ?>"></label>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
                                    <?php echo e($prof->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($prof->email); ?></td>
                            
                            <td>
                                <?php if($prof->sexe=="F"): ?>
                                <span class="badge bg-danger-bright text-danger">F</span>
                                <?php elseif($prof->sexe=="M"): ?>
                                   <span class="badge bg-success-bright text-success">M</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($prof->specialité); ?></td>
                            
                   
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
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
                        <form method="POST" action="<?php echo e(route('emp.member')); ?>">
<?php echo csrf_field(); ?>
                            <?php if(isset($data['catId'])): ?>  
                            <input name="cat" type="hidden" value="<?php echo e($data['catId']); ?>">
                            <?php endif; ?>
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
                     
                      <?php $__currentLoopData = $data['empnm']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="messi<?php echo e($emp->id); ?>" value="<?php echo e($emp->id); ?>" id="empl<?php echo e($emp->id); ?>">
                                    <label class="custom-control-label" for="empl<?php echo e($emp->id); ?>"></label>
                                </div>
                            </td>
                            <td>
                                <a href="#">
                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
                                    <?php echo e($emp->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($emp->email); ?></td>
                            
                            <td>
                                <?php if($emp->sexe=="F"): ?>
                                <span class="badge bg-danger-bright text-danger">F</span>
                                <?php elseif($emp->sexe=="M"): ?>
                                   <span class="badge bg-success-bright text-success">M</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($emp->poste); ?></td>
                            
                   
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
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

<form id="datasend" action="<?php echo e(route('cat.home')); ?>" method="get">
    <?php echo csrf_field(); ?>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Udash\resources\views/files.blade.php ENDPATH**/ ?>