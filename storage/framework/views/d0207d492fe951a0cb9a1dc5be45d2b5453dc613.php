
<?php $__env->startSection('content'); ?>
        <script src="<?php echo asset('vendors/dropzone/dropzone.js')  ?>"></script>
     

  <!-- Content -->
  
    <section class='statis text-center'>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="box bg-primary-gradient   ">
              <i class="fa fa-eye"></i>
              <h3><?php echo e($data['Scount']); ?></h3>
              <p class="lead">Students</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box bg-secondary-gradient ">
              <i class="fa fa-user-o"></i>
              <h3><?php echo e($data['Pcount']); ?></h3>
              <p class="lead">Professors</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box bg-success-gradient ">
              <i class="fa fa-shopping-cart"></i>
              <h3><?php echo e($data['Acount']); ?></h3>
              <p class="lead">Administrative</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box bg-warning-gradient ">
              <i class="fa fa-handshake-o"></i>
              <h3><?php echo e($data['Fcount']); ?></h3>
              <p class="lead">Files</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <div class="row">
        <div class="col-md-8">
            
            <h4>Daily Usage</h4>
            <div id="daily-usage">
            
            
            
            
            </div>

        </div>
        <div class="col-md-4" >
            <div class="card">
                <div class="card-body text-center">
                    <div class="row mb-4">
                        <div class="col-md-8 offset-md-2">
                            <img src="<?php echo asset('assets/media/image/report.svg')  ?>" class="img-fluid" alt="report">
                        </div>
                    </div>
                    <h4 class="my-3">Navigate Instances Page</h4>
                    <p class="text-muted">manage your Instances and files easily.</p>
                    <button class="btn btn-outline-primary btn-lg2" onclick="window.location.replace('http://docs.smart-ensa.com/I/categories');">GO</button>
                </div>
            </div>
        </div>
    </div>
<div style="display:none" class="row">
<div   class="col-md-12" id="chartu">
    <div class="content-title d-flex justify-content-between">
        <h4>Live Chart</h4>
    </div>
 <div id="chartContainer" style="height: 300px; width: 100%;">
            
            
            
            
</div>
    
</div>



</div>
    <div class="content-title d-flex justify-content-between">
        <h4>Top Instances(File Based)</h4>
        <a href="<?php echo e(route('dash.catsFiles')); ?>">View All</a>
    </div>

    <div class="row">
    <?php
   $array_count_files=[];
?>   
<?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <?php
   array_push($array_count_files,$category->file_count);
?>
        <div class="col-md-3">
            <div class="card  ">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <div class=" ">
                            <i class="font-size-22 ti-folder"></i>
                        </div>
                    
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5><?php echo e($category->name); ?></h5>
                        <div class="dropdown">
                            <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                <i class="ti-more-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form method="post" action="<?php echo e(route('cat.homePost')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="catId" hidden value="<?php echo e($category->id); ?>">
                                 <a  class="dropdown-item" onclick="this.closest('form').submit()" >View Details</a>                            

                                </form>
                            </div>
                        </div>
                    </div>
                    <p class="small text-muted mb-0"><?php echo e($category->file_count); ?> Files</p>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
         <?php
$array_count_files=json_encode($array_count_files);
        ?>
        <script type="application/javascript">
              console.log('data');
    var data = JSON.parse("<?php echo e($array_count_files); ?>") ;
    console.log(data);
        </script>
   
    </div>


    <div class="content-title d-flex justify-content-between">
        <h4>Recent Files(Last Month)</h4>
        <a href="<?php echo e(route('RecentFiles')); ?>">View All</a>
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



    <div class="content-title d-flex justify-content-between">
        <h4>Top Instances (User Based)</h4>
        <a href="<?php echo e(route('dash.ListCatsUsers')); ?>">View All</a>
    </div>

    <div class="row">
<?php
   $array_count_files=[];
   $names=[];
   $i=0;
?>  

      
<?php $__currentLoopData = $data['categoriesU']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <?php
   array_push($array_count_files,$category->user_count);
   $names[$i]=$category->name;
   $i++;
?>
        <div class="col-md-3 ">
            <div class="card bg-warning-gradient    ">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            <i class="font-size-22 ti-folder"></i>
                        </div>
                    
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5><?php echo e($category->name); ?></h5>
                        <div class="dropdown">
                            <a href="#" class="btn btn-floating" data-toggle="dropdown">
                                <i class="ti-more-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form method="post" action="<?php echo e(route('cat.homePost')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="catId" hidden value="<?php echo e($category->id); ?>">
                                 <a  class="dropdown-item" onclick="this.closest('form').submit()" >View Details</a>                            

                                </form>
                            </div>
                        </div>
                    </div>
                    <p class="small text-muted mb-0"><?php echo e($category->user_count); ?> Member</p>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        
 <?php
$array_count_files=json_encode($array_count_files);
        $names=json_encode($names);

        ?>
              
<div hidden id="dataAxis" IpAdress="<?php echo e($names); ?>"></div>
        <script type="application/javascript">
    var data3=JSON.parse(document.getElementById("dataAxis").getAttribute('IpAdress'));
 ;
    var data2 = JSON.parse("<?php echo e($array_count_files); ?>") ;
        </script>
    </div>
<!-- Dashboard scripts -->
<script src="<?php echo asset('assets/js/examples/pages/file-dashboard.js')  ?>"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="<?php echo asset('assets/js/examples/pages/scatter.js')  ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Udash\resources\views/dash.blade.php ENDPATH**/ ?>