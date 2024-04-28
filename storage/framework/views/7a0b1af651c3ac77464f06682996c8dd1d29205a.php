<!doctype html>
<html lang="en">

<!-- Mirrored from filedash.laborasyon.com/demos/orange/pages/default/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Aug 2020 16:33:16 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"> 
    <title>Edocs</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo asset('assets/media/image/favicon.png')  ?>" />

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo asset('vendors/bundle.css')  ?>" type="text/css">

    <link href="<?php echo asset('fonts.googleapis.com/css2c1e6.css?family=Josefin+Sans:wght@400;700&amp;display=swap')  ?>" rel="stylesheet">
    <!-- quill -->
    <link  href="<?php echo asset('vendors/quill/quill.snow.css')  ?>" rel="stylesheet" type="text/css">
    <!-- quill -->
    <link href="<?php echo asset('vendors/jstree/themes/default/style.min.css')  ?>" rel="stylesheet" type="text/css">

    <!-- Clockpicker -->
    <link rel="stylesheet" href="<?php echo asset('vendors/clockpicker/bootstrap-clockpicker.min.css')  ?>" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="<?php echo asset('vendors/datepicker/daterangepicker.css')  ?>" type="text/css">

    <!-- Datatable -->
    <link rel="stylesheet" href="<?php echo asset('vendors/dataTable/datatables.min.css')  ?>"  type="text/css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo asset('vendors/select2/css/select2.min.css')  ?>" type="text/css">
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet"  href="<?php echo asset('assets/css/themify-icons.css')  ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('assets/css/weather-icons.css')  ?>"  type="text/css">
    <link rel="stylesheet"   href="<?php echo asset('vendors/dropzone/dropzone.css')  ?>"  type="text/css">
    
    <link rel="stylesheet" href="<?php echo asset('assets/css/ffolders.min.css')  ?>"  type="text/css">

    <!-- App css -->
    <link rel="stylesheet" href="<?php echo asset('assets/css/app.min.css')  ?>"  type="text/css">
     <script type="application/javascript">var uri  ="<?php echo e(url('/')); ?>";</script>   

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="form-membership" style="background: url(../../assets/media/image/image1.jpg)">

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<div class="form-wrapper">

    <!-- logo -->
    <div id="logo">
        <img src="<?php echo asset('assets/media/image/logo-dark.png')  ?>" alt="image">
    </div>
    <!-- ./ logo -->

    
    <h5>Sign in</h5>

    <!-- form -->
    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <input id="email" type="email" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
              <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback" role="alert">
               <strong><?php echo e($message); ?></strong>
               </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group d-flex justify-content-between">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked=""   name="remember" id="remember" {{ old('remember') ? 'checked' : ''>
                <label class="custom-control-label" for="remember">Remember me</label>
            </div>
        </div>
        <button class="btn btn-primary btn-block">Sign in</button>
        <hr>
      
    </form>
    <!-- ./ form -->


</div>

<script src="<?php echo asset('vendors/bundle.js')  ?>"></script>

<script src="<?php echo asset('assets/js/app.min.js')  ?>"></script>

</body>

<!-- Mirrored from filedash.laborasyon.com/demos/orange/pages/default/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Aug 2020 16:33:16 GMT -->
</html>
<?php /**PATH C:\xampp\htdocs\Udash\resources\views/auth/login.blade.php ENDPATH**/ ?>