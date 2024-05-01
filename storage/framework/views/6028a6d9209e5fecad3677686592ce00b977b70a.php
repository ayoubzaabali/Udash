
<?php $__env->startSection('content'); ?>
<div class="content-title">
        <h4>Edit Administrative</h4>
</div>



<form class="needs-validation" novalidate method="post" action="<?php echo e(route('emp.records')); ?>">
    <?php echo csrf_field(); ?>
  <div class="form-row">
      <input type="hidden" name="id" value="<?php echo e($data['emp']->id); ?>">
    <div class="form-group col-md-6">
      <label for="validationCustom01">Email</label>
      <input id="validationCustom01" name="email" value="<?php echo e($data['emp']->email); ?>"  required type="email" class="form-control"  placeholder="Email">
     <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="form-group col-md-6">
      <label for="validationCustom02">Name</label>
      <input name="name" type="Text" class="form-control"  value="<?php echo e($data['emp']->name); ?>"  id="validationCustom02"  required placeholder="Name">
        <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="validationCustom03">Poste</label>
    <input name="poste" type="text" class="form-control" id="validationCustom03"  value="<?php echo e($data['emp']->poste); ?>"  required placeholder="Poste">
      <div class="valid-feedback">
        Looks good!
      </div>
      
  </div>
 <div class="form-group ">
      <label for="inputState">Sexe</label>
      <select id="validationCustom04"  class="form-control" name="sexe" required>
          <?php if($data['emp']->sexe=="M"): ?>
        <option value="M">M</option>
        <option value="F">F</option>
          <?php else: ?>
          <option value="F">F</option>
          <option value="M">M</option>
          <?php endif; ?>
      </select>
       <div class="valid-feedback">
        Looks good!
      </div>
    </div>

  <button type="submit" class="btn btn-primary  btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button>
</form>

<script>


(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();



</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Udash\resources\views\editEmp.blade.php ENDPATH**/ ?>