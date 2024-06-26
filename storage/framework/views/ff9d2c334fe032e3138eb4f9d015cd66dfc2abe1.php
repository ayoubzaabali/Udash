
<?php $__env->startSection('content'); ?>

                    <div class="page-header">
        <h2>Settings</h2>
    </div>

    <div class="nav nav-pills mb-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-item nav-link nav-link active" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="true">Security</a>
    </div>
    <div class="tab-content" id="v-pills-tabContent">
       
      
        <div class="tab-pane fade show active" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            <div class="content-title">
                <h4>Security</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form  method="post" action="<?php echo e(route('change.password')); ?>">
                        <?php echo csrf_field(); ?>
                         <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <p class="text-danger"><?php echo e($error); ?></p>

                        <script>toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };



toastr.error('<?php echo e($error); ?>');

</script>



                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input required type="password" class="form-control" name="current_password" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.style.backgroundColor='#ffffff'"onfocusout="this.setAttribute('readonly','true');this.style.backgroundColor='#EEFFE6'" required>
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input required type="password" class="form-control" name="new_password" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.style.backgroundColor='#ffffff'"onfocusout="this.setAttribute('readonly','true');this.style.backgroundColor='#EEFFE6'" required >
                                </div>
                                <div class="form-group">
                                    <label>New Password Repeat</label>
                                    <input required type="password" class="form-control" name="new_confirm_password" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');this.style.backgroundColor='#ffffff'"onfocusout="this.setAttribute('readonly','true');this.style.backgroundColor='#EEFFE6'" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
   
    </div>
      <script type="application/javascript"> 
          window.onload=function(){
              w3.addStyle('input:-moz-read-only','background-color','#EEFFE6');
              w3.addStyle('input:read-only','  background-color','#EEFFE6');
          }


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Udash\resources\views\setting.blade.php ENDPATH**/ ?>