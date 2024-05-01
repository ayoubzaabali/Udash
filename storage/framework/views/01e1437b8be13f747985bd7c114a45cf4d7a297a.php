
<?php $__env->startSection('content'); ?>  
    <div class="content-title d-flex justify-content-between">
        <h4>Top Categories(User Based)</h4>
    </div>

    <div class="row">
      
<?php $__currentLoopData = $data['categoriesU']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card">
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
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Udash\resources\views\catsCountU.blade.php ENDPATH**/ ?>