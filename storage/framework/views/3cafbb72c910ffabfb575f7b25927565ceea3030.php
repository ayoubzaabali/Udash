
    
    
    
    
    
  <div class="row">
    <div class="col-12">
		<table class="table table-image">
		  <thead>
		    <tr>
		      <th scope="col">Type</th>
		      <th scope="col">File Name</th>
		      <th scope="col">Word Count</th>
		      <th scope="col">Creation Date</th>
		    </tr>
		  </thead>
		  <tbody>
    <?php $__currentLoopData = $data['files']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(!is_null($file)): ?>
  
		   <tr onmouseover="this.style.transform='scale(1.1)';this.style.color='#E23C3C'" onmouseout="this.style.transform='scale(1)';this.style.color='black'" >
		      <td onclick="window.open('<?php echo e(url('/').'/download/'.$file->id); ?>', '_blank');"  style="cursor:pointer" class="w-25">
                                <figure class="avatar avatar-xl img-fluid ">

			     
                                    
                                    <?php $testo=strtolower(pathinfo(storage_path($file->path),PATHINFO_EXTENSION)) ?>
                                    <?php if($testo=="pdf"): ?>
                                    <span class="avatar-title bg-primary-gradient  ">
                                        
                                        <i class="fa fa-file-pdf-o"></i>
                                        
                                        
                                    </span>
                                    <?php elseif($testo=="jpeg" or $testo=="jpg"  ): ?>
                                    
                                    <span class="avatar-title bg-secondary-gradient  ">
                                        
                                        <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                        
                                        
                                    </span> 

                                    <?php elseif($testo=="docx"): ?>
                                    
                                    <span class="avatar-title bg-info-gradient  ">
                                        
                                        <i class="fa fa-file-word-o" aria-hidden="true"></i>

                                        
                                        
                                    </span> 
                                    <?php elseif($testo=="doc"): ?>
                                    
                                    <span class="avatar-title bg-info  ">
                                        
                                        <i class="fa fa-file-word-o" aria-hidden="true"></i>

                                        
                                        
                                    </span> 
                                    <?php elseif($testo=="png"): ?>
                                    
                                    <span class="avatar-title bg-success-gradient   ">
                                        
                                        <i class="fa fa-picture-o" aria-hidden="true"></i>


                                        
                                        
                                    </span>
 
                                    <?php elseif($testo=="csv"): ?>
                                    
                                    <span class="avatar-title bg-success-gradient   ">
                                        
                                        <i class="fa fa-table" aria-hidden="true"></i>



                                        
                                        
                                    </span>
                                    <?php elseif($testo=="xlsx" or $testo=="xls" ): ?>
                                    
                                    <span class="avatar-title bg-success  ">
                                        
                                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>



                                        
                                        
                                    </span>

                                    <?php elseif($testo=="sql"): ?>
                                    
                                    <span class="avatar-title bg-light   ">
                                        
                                        <i class="fa fa-database" aria-hidden="true"></i>



                                        
                                        
                                    </span> 
                                    <?php else: ?>
                                    
                                    <span class="avatar-title bg-dark-gradient   ">
                                        
                                        <i class="fa fa-file-o" aria-hidden="true"></i>



                                        
                                        
                                    </span>                                    
                                    <?php endif; ?>
                  </figure>

		      </td>
		      <td><?php echo e($file->original); ?></td>
		      <td><?php echo e($file->num); ?></td>
		      <td> <span class="badge badge-success"><?php echo e($file->date); ?></span></td>
               
		    </tr>
              
      <?php endif; ?>
    
    
    
    
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		  </tbody>
		</table>   
    </div>
  </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  <?php /**PATH C:\xampp\htdocs\Udash\resources\views\sh\intiligent.blade.php ENDPATH**/ ?>