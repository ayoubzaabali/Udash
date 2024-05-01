   



<?php $__env->startSection('content'); ?>
<div class="content-title d-flex justify-content-between">
        <h4>Recent Files</h4>
        <a href="#">View All</a>
    </div>            
    
     <div class="mb-4">
    <div class="table-responsive">
                
                
                
                
                
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
                                </div>
                            </div>
                        </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    
                    
                </table>
            </div>
                </div>

 <?php $__env->stopSection(); ?>
   
    
    
        
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Udash\resources\views\FilesMonth.blade.php ENDPATH**/ ?>