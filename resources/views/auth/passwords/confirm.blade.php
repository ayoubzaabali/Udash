<!doctype html>
<html lang="en">

<!-- Mirrored from filedash.laborasyon.com/demos/orange/pages/default/lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Aug 2020 16:33:16 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edocs</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo asset('assets/media/image/favicon.png')  ?>" />

    <!-- Plugin styles -->
    <link rel="stylesheet"   href="<?php echo asset('vendors/bundle.css')  ?>" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet"   href="<?php echo asset('assets/css/app.min.css')  ?>" type="text/css">
</head>
    <?php $goku= asset('assets/media/image/image1.jpg');  ?>
<body class="form-membership" style='background: url("{{$goku}}")'>

<!-- begin::preloader-->
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- end::preloader -->

<div class="form-wrapper">

    <!-- logo -->
    <div id="logo">
        <img  src="<?php echo asset('assets/media/image/logo-dark.png')  ?>" alt="image">
    </div>
    <!-- ./ logo -->

    
    <h5>Enter your password</h5>

    <!-- form -->
     <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
        <div class="form-group d-flex align-items-center">
            <div class="mr-3">
                <figure class="mb-4 avatar avatar-sm">
                    <img src="<?php echo asset('assets/media/image/user/women_avatar1.jpg')  ?>" class="rounded-circle" alt="avatar">
                </figure>
            </div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password"  autofocus>
        </div>
                             @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        <button class="btn btn-primary btn-block">Unlock</button>
        <hr>
        
    </form>
    <!-- ./ form -->
<a href="login.html" class="btn btn-sm btn-outline-light ml-1">Sign out</a>

</div>

<!-- Plugin scripts -->
<script   src="<?php echo asset('vendors/bundle.js')  ?>"></script>

<!-- App scripts -->
<script    src="<?php echo asset('assets/js/app.min.js')  ?>"></script>
</body>

<!-- Mirrored from filedash.laborasyon.com/demos/orange/pages/default/lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Aug 2020 16:33:16 GMT -->
</html>
