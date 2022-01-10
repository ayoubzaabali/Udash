<!DOCTYPE html>
<html lang="en-US" class="no-js scheme_default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href='{{asset('css/home.css')}}?v={{Str::random(5)}}' >
</head>
<body>
<div class="preloader"> <img class="preloader-icon" src="{{asset('assets/media/image/favicon.png')}}" alt="My Site Preloader"> </div>

    <div id="main">
        @yield('main')
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
      <div class="border1"></div> <!--for the underline -->
        <ul>
          <a href="#"><li>Home</li></a>
          <a href="#"><li>Search</li></a>
          <a href="#"><li>Contact</li></a>
          <a href="#"><li>About</li></a>
        </ul>
    </div>

<!--  for some other links -->
    <div class="footer-items">
      <h3>Our partners</h3>
      <div class="border1"></div>  <!--for the underline -->
        <ul>
          <a href="#"><li>Indian</li></a>
          <a href="#"><li>Chinese</li></a>
          <a href="#"><li>Mexican</li></a>
          <a href="#"><li>Italian</li></a>
        </ul>
    </div>

<!--  for contact us info -->
    <div class="footer-items">
      <h3>Contact us</h3>
      <div class="border1"></div>
        <ul>
          <li><i class="fa fa-map-marker" aria-hidden="true"></i>XYZ, abc</li>
          <li><i class="fa fa-phone" aria-hidden="true"></i>123456789</li>
          <li><i class="fa fa-envelope" aria-hidden="true"></i>xyz@gmail.com</li>
        </ul> 
      
<!--   for social links -->
        <div class="social-media">
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-google-plus-square"></i></a>
        </div> 
    </div>
  </div>
  
<!--   Footer Bottom start  -->
  <div class="footer-bottom">
    Copyright &copy; Food and Burps 2020.
  </div>
</div>
  
<!--   Footer Bottom end -->
  
</body>  
<script src="https://unpkg.com/vue@next"></script>
<script src="{{asset('js/home.js')}}"></script>
</html>