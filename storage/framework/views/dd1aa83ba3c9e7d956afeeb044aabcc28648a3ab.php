<!DOCTYPE html>
<html lang="en-US" class="no-js scheme_default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href='<?php echo e(asset('css/home.css')); ?>?v=<?php echo e(Str::random(5)); ?>'>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/fontawesome.min.css"
        integrity="sha512-r9kUVFtJ0e+8WIL8sjTUlHGbTLwlOClXhVqGgu4sb7ILdkBvM2uI+n/Fz3FN8u3VqJX7l9HLiXqXxkx2mZpkvQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha512-fzff82+8pzHnwA1mQ0dzz9/E0B+ZRizq08yZfya66INZBz86qKTCt9MLU0NCNIgaMJCgeyhujhasnFUsYMsi0Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div id="sidebar" class="sidebar sidevis" draggable="true">
        <div id="mydivheader"><i class="fas fa-arrows-alt"></i></div>
        <div class="navit">
            <img src="<?php echo e(asset('assets/media/image/favicon.png')); ?>" alt="" width=80>
        </div>
        <div class="navit">
            <i class="fab fa-cc-discover"></i>
            <label><a href="#firstSection">Home</a></label>
        </div>
        <div class="navit">
            <i class="fas fa-braille"></i>
            <label><a href="#section4">Testimonials</a></label>
        </div>
        <div class="navit">
            <i class="far fa-address-book"></i>
            <label><a href="#contact">Contact Us</a></label>
        </div>
        <div class="navit">
            <i class="fas fa-eject"></i>
            <label><a href="#section2">About us</a></label>
        </div>
    </div>
    <div class="preloader"> <img class="preloader-icon" src="<?php echo e(asset('assets/media/image/favicon.png')); ?>"
            alt="My Site Preloader"> </div>
    <div id="main">
        <?php echo $__env->yieldContent('main'); ?>
    </div>
    <!--  FOOTER START -->

    <div class="footer">
        <div class="inner-footer">

            <!--  for company name and description -->
            <div class="footer-items">
                <h1>Udash</h1>
                <p>Best Business Cloud Storage and File Sharing Providers ; Best for Advanced Storage.</p>
            </div>

            <!--  for quick links  -->
            <div class="footer-items">
                <h3>Quick Links</h3>
                <div class="border1"></div>
                <!--for the underline -->
                <ul>
                    <a href="#firstSection">
                        <li>Home</li>
                    </a>
                    <a href="#section4">
                        <li>Testimonials</li>
                    </a>
                    <a href="#contact">
                        <li>Contact</li>
                    </a>
                    <a href="#section2">
                        <li>About</li>
                    </a>
                </ul>
            </div>

      

            <!--  for contact us info -->
            <div class="footer-items">
                <h3>Contact us</h3>
                <div class="border1"></div>
                <ul>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>  287 Lost Creek Road</li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i>  Philadelphia</li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i>  jennifer@udash.com</li>
                </ul>
            </div>

                <!--  eye catchy image -->
           <div class="footer-items">
               <img  src="<?php echo e(asset('assets/media/image/myGif.gif')); ?>" alt="">
            </div>
            
        </div>


        <!--   Footer Bottom start  -->
        <div class="footer-bottom">
            Copyright &copy; Udash <?php echo e(now()->year); ?>.
        </div>
    </div>

    <!--   Footer Bottom end -->

</body>
<script src="https://unpkg.com/vue@next"></script>
<script src="<?php echo e(asset('js/home.js')); ?>"></script>
<script src='<?php echo e(asset('js/features.js')); ?>?v=<?php echo e(Str::random(5)); ?>'></script>

</html><?php /**PATH C:\xampp\htdocs\Udash\resources\views/layouts/homePage.blade.php ENDPATH**/ ?>