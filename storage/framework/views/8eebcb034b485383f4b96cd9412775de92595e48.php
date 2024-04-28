
<?php $__env->startSection('content'); ?>
        <script src="<?php echo asset('vendors/dropzone/dropzone.js')  ?>"></script>
     


    <div class="row">
        <div class="col-md-12">
            <div class="page-header d-flex justify-content-between">
                <h2>Professors</h2>
                <ul class="nav">
              
                     <li>
                    <div class="dropdown">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
    Import
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" data-toggle="modal" href="#exampleModalCenter" >CSV</a>
  </div>
</div>
                    </li>  
                   
                    
                      




                </ul>
                
            </div>
            

            <div class="card border-0">
                
                <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="user-list_length"><label>Show 
                <form method="get" action="<?php echo e(route('prof.home')); ?>"><select onchange="this.form.submit()" name="show" aria-controls="user-list" class="custom-select custom-select-sm form-control form-control-sm"><option selected="true" disabled ></option><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></form></label></div></div><div class="col-sm-12 col-md-6"><div  id="user-list_filter" class="dataTables_filter"><label style="float:right">Search:<input onkeyup="profSH(this)" type="search" class="form-control form-control-sm" placeholder="" aria-controls="user-list"></label></div></div></div>
                
                    
                
              
                <div class="table-responsive">

                    <table id="prof-list" class="table table-borderless table-hover">
                        <thead>
                        <tr>
                         
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Specialité</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                  
                      <?php $__currentLoopData = $data['prof']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
                        <tr>
                            <td>
                                <a href="#">
                                           <?php if(empty($prof->photo) or is_null($prof->photo)): ?>

                                       <figure class="avatar avatar-sm">
                                             <span class="avatar-title bg-danger rounded-circle">P</span>
                                        </figure>
                                    

                               <?php else: ?>
                                <figure class="avatar avatar-sm">

                                         <img   src="<?php echo e(url('/').'/storage/app/'.$prof->photo); ?>"
                                             class="rounded-circle" alt="image">
                                        
                                </figure>
                                <?php endif; ?>
                                    
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
                            
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                          <form action="<?php echo e(route('prof.edit')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                           <a href="#" onclick="this.closest('form').submit();return false;" class="dropdown-item">Edit</a>
                                     <input hidden name="id" value="<?php echo e($prof->id); ?>" >
                                        
                                        </form>
                                        <a href="#" class="dropdown-item" onclick="deleteProf(this)" fileid="<?php echo e($prof->id); ?>">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        </tbody>
                    </table>
                </div>
                
                
          
                
                
            </div>
        </div>
    </div>

      <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="user-list_info" role="status" aria-live="polite">Showing 1 to 10 of 12 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="user-list_paginate"><ul style="float:right" class="pagination"><?php echo $data['prof']->render(); ?></ul></div></div></div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">ADD PROF LIST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="ti-close"></i>
        </button>
      </div>
      <div class="modal-body">
        


<form method="post" action="<?php echo e(route('prof.index')); ?>"
      class="dropzone"
      id="dropzoneForm" enctype="multipart/form-data">
           <?php echo csrf_field(); ?>
                    <div class="fallback">
                        <input type="file" name="file" multiple>
                    </div>
          
          </form>

      </div>
                          <img src="<?php echo asset('assets/media/image/prof.PNG')  ?>" >

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
        </button>
      </div>
    </div>
  </div>
</div>
<script>var  htmlinitprof= document.getElementById("prof-list").innerHTML;</script>

<script type="application/javascript" src="<?php echo asset('assets/js/scripy.js')  ?>"></script>

<script type="text/javascript">

  Dropzone.options.dropzoneForm = {
    autoProcessQueue : true,
    acceptedFiles : ".csv",

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

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Udash\resources\views/prof.blade.php ENDPATH**/ ?>