<!doctype html>
<html lang="en">

<!-- Mirrored from filedash.laborasyon.com/demos/orange/pages/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Aug 2020 16:29:28 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"> 
    <title>Udash</title>

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
     <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <!-- App css -->
    <link rel="stylesheet" href="<?php echo asset('assets/css/app.min.css')  ?>"  type="text/css">
     <script type="application/javascript">var uri  ="<?php echo e(url('/')); ?>";</script>   

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
    

 .flex-grid-center {
	 display: flex;
	 justify-content: center;
	 margin: 5em 0;
}
 .fuller-button {
	 color: lightsalmon;
	 background: none;
	 border-radius: 0;
	 padding: 1.2em 5em;
	 letter-spacing: 0.35em;
	 font-size: 0.7em;
	 transition: background-color 0.3s, box-shadow 0.3s, color 0.3s;
	 margin: 1em;
     cursor: pointer;
}
 .fuller-button.blue {
	 box-shadow: inset 0 0 1em rgba(0, 170, 170, 0.5), 0 0 1em rgba(0, 170, 170, 0.5);
	 border: #0dd solid 2px;
}
 .fuller-button.blue:hover {
	 background-color: #0dd;
	 box-shadow: inset 0 0 0 rgba(0, 170, 170, 0.5), 0 0 1.5em rgba(0, 170, 170, 0.7);
}
 .fuller-button.red {
	 box-shadow: inset 0 0 1em rgba(251, 81, 81, 0.4), 0 0 1em rgba(251, 81, 81, 0.4);
	 border: #fb5454 solid 2px;
}
 .fuller-button.red:hover {
	 background-color: #fb5454;
	 box-shadow: inset 0 0 0 rgba(251, 81, 81, 0.4), 0 0 1.5em rgba(251, 81, 81, 0.6);
}
 .fuller-button.white {
	 box-shadow: inset 0 0 0.8em rgba(255, 255, 255, 0.3), 0 0 0.8em rgba(255, 255, 255, 0.3);
	 border: #fff solid 2px;
}
 .fuller-button.white:hover {
	 color: rgba(0, 0, 0, 0.8);
	 background-color: #fff;
	 box-shadow: inset 0 0 0 rgba(255, 255, 255, 0.3), 0 0 1.2em rgba(255, 255, 255, 0.5);
}
 .pure-control-group {
	 display: -webkit-box;
	 display: -webkit-flex;
	 display: -ms-flexbox;
	 display: flex;
	 -webkit-box-orient: vertical;
	 -webkit-box-direction: normal;
	 -webkit-flex-direction: column;
	 -ms-flex-direction: column;
	 flex-direction: column;
	 position: relative;
	 padding: 0 1em 2.6em 1em;
}
 .pure-form .pure-control-group label {
	 text-align: left;
	 position: absolute;
	 left: 0;
	 top: 15%;
	 z-index: 0;
	 letter-spacing: 0;
	 margin: 0 1em;
}
 .pure-form .pure-control-group input {
	 background: none;
	 box-shadow: none;
	 padding-left: 0;
	 border-radius: 0;
	 border: none;
	 border-bottom: 2px solid rgba(255, 255, 255, 0.4);
	 position: relative;
	 z-index: 1;
	 color: #fff;
}
 .pure-form .pure-control-group input:focus {
	 border-bottom: 2px solid white;
}
 .pure-form .pure-control-group textarea {
	 background: none;
	 box-shadow: none;
	 border-radius: 0;
	 border: none;
	 border-left: 2px solid rgba(255, 255, 255, 0.4);
	 resize: none;
	 height: 8em;
	 color: #fff;
}
 .pure-form .pure-control-group textarea:focus {
	 border-left: 2px solid white;
}
 .pure-form .pure-control-group input[type=email]:focus:invalid {
	 color: #fff;
}
 .pure-form .pure-control-group input[type=email]:invalid {
	 color: #fb5454;
}
 .pure-form button {
	 margin: 0.5em 1em;
}
.effect5
{
  position: relative;
}
.effect5:before, .effect5:after
{
  z-index: -1;
  position: absolute;
  content: "";
  bottom: 25px;
  left: 10px;
  width: 50%;
  top: 80%;
  max-width:300px;
  background: #777;
  -webkit-box-shadow: 0 35px 20px #777;
  -moz-box-shadow: 0 35px 20px #777;
  box-shadow: 0 35px 20px #777;
  -webkit-transform: rotate(-8deg);
  -moz-transform: rotate(-8deg);
  -o-transform: rotate(-8deg);
  -ms-transform: rotate(-8deg);
  transform: rotate(-8deg);
}
.effect5:after
{
  -webkit-transform: rotate(8deg);
  -moz-transform: rotate(8deg);
  -o-transform: rotate(8deg);
  -ms-transform: rotate(8deg);
  transform: rotate(8deg);
  right: 10px;
  left: auto;
}
:root{
    --aramaKutusu-boyut:30px;
    --aramaKutusu-uzunluk:30vw;
}
        
.aramaKutusu{
    transform:scaleY(1.5);
    background: #ffffff;
    height:var(--aramaKutusu-boyut);
    border-radius: var(--aramaKutusu-boyut);
    padding:10px;
    width:auto;
    display:flex;
    align-items: center;
    box-shadow: 0 0 4px rgba(242, 120, 75, 0.7);
}

.aramaKutusu a{
    color:orangered;
    width:var(--aramaKutusu-boyut);
    height:var(--aramaKutusu-boyut);
    background: white;
    border:none;
    border-radius: 50%;
    display:flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    font-size: calc(var(--aramaKutusu-boyut) * .6);
}

.aramaKutusu input{
    border:none;
    background: none;
    outline: none;
    color:white;
    font-size: 120%;
    padding:0;
    width:0;
    transition: .3s ease-in;
}

.aramaKutusu:hover > input {
    width:var(--aramaKutusu-uzunluk);
    padding:0 12px;
}

.aramaKutusu:hover > a {
    background: transparent;
    color:gray;
}
        
        #new-movie-form {
  display: none;
}

.visible {
  display: block;
}

.error {
  border-color:#ebccd1;
  color:#a94442;
  background-color:#f2dede;
}

.checked {
  color: gray;
}
        
        
.active-pink-2 input.form-control[type=text]:focus:not([readonly]) {
  border-bottom: 1px solid #f48fb1;
  box-shadow: 0 1px 0 0 #f48fb1;
}
.active-pink input.form-control[type=text] {
  border-bottom: 1px solid #f48fb1;
  box-shadow: 0 1px 0 0 #f48fb1;
}
.active-purple-2 input.form-control[type=text]:focus:not([readonly]) {
  border-bottom: 1px solid #ce93d8;
  box-shadow: 0 1px 0 0 #ce93d8;
}
.active-purple input.form-control[type=text] {
  border-bottom: 1px solid #ce93d8;
  box-shadow: 0 1px 0 0 #ce93d8;
}
.active-cyan-2 input.form-control[type=text]:focus:not([readonly]) {
  border-bottom: 1px solid #4dd0e1;
  box-shadow: 0 1px 0 0 #4dd0e1;
}
.active-cyan input.form-control[type=text] {
  border-bottom: 1px solid #4dd0e1;
  box-shadow: 0 1px 0 0 #4dd0e1;
}
.box {
  position: relative;
  padding: 15px;
  overflow: hidden;
  border-radius: 3px;
  margin-bottom: 25px;
}
.box h3:after {
  content: "";
  height: 2px;
  width: 70%;
  margin: auto;
  background-color: rgba(255, 255, 255, 0.12);
  display: block;
  margin-top: 10px;
}
.box i {
  position: absolute;
  height: 70px;
  width: 70px;
  font-size: 22px;
  padding: 15px;
  top: -25px;
  left: -25px;
  background-color: rgba(255, 255, 255, 0.15);
  line-height: 60px;
  text-align: right;
  border-radius: 50%;
}

    </style>
</head>
<body onload="setRecipient()">
     <!-- Main scripts -->
<script src="<?php echo asset('vendors/bundle.js')  ?>"></script>
<script src="cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
<script src="cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.min.js"></script>
<!-- Datatable -->
<script src="<?php echo asset('vendors/dataTable/datatables.min.js')  ?>"></script>
<!-- Jstree -->
<script src="<?php echo asset('vendors/jstree/jstree.min.js')  ?>"></script>
<!-- Apex chart -->
<script src="apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="<?php echo asset('vendors/charts/apex/apexcharts.min.js')  ?>"></script>


 <script src="https://www.w3schools.com/lib/w3.js"></script> 
<!-- App scripts -->
<script src="<?php echo asset('assets/js/app.min.js')  ?>"></script>
    
<!- <!-- Preloader
<div class="preloader">
    <div class="preloader-icon"></div>
</div>
<!-- ./ Preloader -->
     <?php if(isset($data['catId']) && !isset($data['archiveId'])): ?>

<!-- modal -->
<div class="modal fade" id="sendingMail" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content"  >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" id="closni" data-dismiss="modal" aria-label="Close">
          <i class="ti-close"></i>
        </button>
      </div>
      <div class="modal-body" >
        <form id="messageForm" action="<?php echo e(route('sendmail')); ?>" method="post" >
            <?php echo csrf_field(); ?>
            <input type="hidden" name="members" id="catIDM" value="<?php echo e($data['members']); ?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input disabled type="text" name="id" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea id="messageC" name="message" class="form-control" id="message-text"></textarea>
            </div>
            
         </form>
       </div>
       <div class="modal-footer" id="sendingMailUltra">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
          </button>
          <button type="button" onclick="SendMessage()" class="btn btn-primary">Send message</button>
       </div>
     </div>
  </div>
</div>
    
    <div id="waithey" >
    
    <div class="spinner-grow text-success" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-grow text-danger" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-grow text-warning" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-grow text-info" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-grow text-light" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-grow text-dark" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-grow text-success" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-grow text-danger" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-grow text-warning" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-grow text-info" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-grow text-light" role="status">
  <span class="sr-only">Loading...</span>
</div>
<div class="spinner-grow text-dark" role="status">
  <span class="sr-only">Loading...</span>
</div>
    
    </div>
    <?php endif; ?>
    <script type="application/javascript">
  function setRecipient(){
       cats=document.querySelectorAll('.listo'); 
       cats.forEach(function(cat) {
           if(cat.classList.contains('selectedC')){
              document.getElementById("recipient-name").setAttribute("placeholder","Category:"+cat.innerText);

           }
       });
      
       
   }
        
     function SendMessage() {
                    var form = document.getElementById('messageForm');
                    var formData = new FormData(form);
                    formData.append("message", document.getElementById("messageC").value);
                    formData.append("members", document.getElementById("catIDM").value);
                  document.getElementById("sendingMailUltra").innerHTML=document.getElementById("waithey").innerHTML;

                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                       document.querySelector('#closni').click();
                       toastr.options = {
                            timeOut: 3000,
                            progressBar: true,
                            showMethod: "slideDown",
                            hideMethod: "slideUp",
                            showDuration: 200,
                            hideDuration: 200
                        };
                        toastr.success('Successfully completed');
                       }
                      }
                    
                    
                    xhttp.open("POST", "<?php echo e(url('/')); ?>"+"/sendmail");
                    xhttp.send(formData);

                    }    
    
    
    
    </script>
<!-- Layout wrapper -->
<div class="layout-wrapper">
    <!-- Header -->
    <div class="header d-print-none">
        <div class="header-container">
            <div class="header-body">
                <div class="header-body-left">
                    <ul class="navbar-nav">
                        <li class="nav-item navigation-toggler">
                            <a href="#" class="nav-link">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                        <li class="nav-item"  >
                            <div class="header-search-form">
                                <form>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn">
                                                <i class="ti-search"></i>
                                            </button>
                                        </div>
                                        <input onclick="window.location.replace('<?php echo e(route('search')); ?>');" type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn header-search-close-btn">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="header-body-right">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link mobile-header-search-btn" title="Search">
                                <i class="ti-search"></i>
                            </a>
                        </li>
                       

                        <li class="nav-item dropdown">
                            <a href="<?php echo e(route('setd')); ?>" class="nav-link nav-link-notify" title="Settings" data-sidebar-target="#settings">
                                <i class="ti-settings"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link profile-nav-link dropdown-toggle" title="User menu"
                               data-toggle="dropdown">
                                <span class="mr-2 d-sm-inline d-none"><?php echo e(Auth::user()->name); ?></span>
                                <?php if(empty(Auth::user()->photo) or is_null(Auth::user()->photo)): ?>
                                <figure class="avatar avatar-sm">
                                     <?php if(session('role')=="admin"): ?>
                                    <span class="avatar-title bg-danger rounded-circle">A</span>
                                    <?php elseif(session('role')=="prof"): ?>
                                    <span class="avatar-title bg-success rounded-circle">P</span>
                                    <?php elseif(session('role')=="emp"): ?>
                                    <span class="avatar-title bg-secondary rounded-circle">Em</span>
                                    <?php elseif(session('role')=="etd"): ?>
                                    <span class="avatar-title bg-black rounded-circle">E</span>
                                    <?php endif; ?>
                                    </figure>
                                

                                  <?php else: ?>
                                <figure class="avatar avatar-sm">

                                        <img  src="<?php echo e(url('/').'/storage/app/'.Auth::user()->photo); ?>"
                                             class="rounded-circle" alt="image">
                                        
                                </figure>
                                <?php endif; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                <div class="text-center py-4"
                                     data-background-image="<?php echo asset('assets/media/image/image1.jpg')  ?>" >
                                    <figure  class="avatar avatar-xl">
                                        <?php if(empty(Auth::user()->photo) or is_null(Auth::user()->photo)): ?>
                                        <img id="myphoto"  src="<?php echo asset('assets/media/image/user/default.png')  ?>"
                                             class="rounded-circle" alt="image">
                                        <?php else: ?>
                                        <img id="myphoto" onclick="changePhoto(this)"   src="<?php echo e(url('/').'/storage/app/'.Auth::user()->photo); ?>"
                                             class="rounded-circle" alt="image">
                                        <?php endif; ?>
                                        <form method="POST" id="ProfileForm"   enctype="multipart/form-data" >
                                         <?php echo csrf_field(); ?>
												<input style="display:none" type="file" id="ProfilePhoto" name="ProfilePhoto">
                                        </form>

                                    </figure>
                                    <h5 class="mb-0"><?php echo e(Auth::user()->name); ?></h5>
                                </div>
                                <div class="list-group list-group-flush">
                                    <a href="<?php echo e(route('setd')); ?>" class="list-group-item" >Settings</a>
                                    <form method="post" action="<?php echo e(route('logout')); ?>" >
                                       <?php echo csrf_field(); ?>
                                    <a href="#" onclick="this.closest('form').submit();" class="list-group-item text-danger"
                                      >Sign Out!</a>
                                    </form>
                                  
                                </div>
                              
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item header-toggler">
                    <a href="#" class="nav-link">
                        <i class="ti-arrow-down"></i>
                    </a>
                </li>
                <li class="nav-item sidebar-toggler">
                    <a href="#" class="nav-link">
                        <i class="ti-cloud"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ Header -->
    
    
    <script type="application/javascript">
    function changePhoto(req){
         document.getElementById('ProfilePhoto').click();
        cosnole.log(req.firstElementChild);
         req.firstElementChild.src="<?php echo asset('assets/media/image/wait.gif')  ?>";
        
    }
        document.getElementById('ProfilePhoto').onchange=function(ev){
        //    ev.target.closest("form").submit();
           loadDoc222(ev.target); 
        }
        
    function loadDoc222(dat) {
                    var form = document.getElementById('ProfileForm');
                    var formData = new FormData(form);
                    formData.append("ProfilePhoto", dat.files[0]);
                      
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        console.log("okay");
                    if (this.readyState == 4 && this.status == 200) {
                        console.log("okay2");
                        var myres=JSON.parse(this.response);
                        if(myres['val']=="OK"){
                            document.getElementById("myphoto").setAttribute("src","http://docs.smart-ensa.com/I"+"/storage/app/"+myres['path']);
                            console.log('<?php echo e(url('/')); ?>');
                        }
                       }
                      }
                    
                     
                    
                    xhttp.open("POST", "<?php echo e(url('/')); ?>"+"/sendPhoto");
                    xhttp.send(formData);

                    }
    
    
    </script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <!-- Content wrapper -->
    <div class="content-wrapper">
       
        <!-- begin::navigation -->
        <div class="navigation" style="overflow-y:scroll ;scrollbar-width: none;-ms-overflow-style: none;">
            <div class="logo">
                <a href=index-2.html>
                    <img style="width:100%;height:auto;" src="<?php echo asset('assets/media/image/logo.png')  ?>" >
                </a>
            </div>
            <ul>
                 <?php if(Auth::user()->role=="admin"): ?>
                <li>
                    <a  href="<?php echo e(route('dash')); ?>">
                        <i class="nav-link-icon ti-pie-chart"></i>
                        <span class="nav-link-label">Dashboard</span>
                        <span class="badge badge-danger badge-small">2</span>
                    </a>
                </li>
                <?php endif; ?>
                 <?php if(isset($data['catId']) && !isset($data['archiveId'])): ?>
                 <?php if(session('role')=="admin" or session('role')=="prof" or session('role')=="emp" ): ?>

                 <li data-toggle="modal" data-target="#sendingMail">
                     
                    <a>
                        <i class="nav-link-icon  ti-email"></i>
                        <span class="nav-link-label">Send Mail</span>
                        <span class="badge badge-warning">Send</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php endif; ?>
                
                <li>
                    <a  href="<?php echo e(route('cat.home')); ?>">
                        <i class="nav-link-icon ti-folder"></i>
                        <span class="nav-link-label">Instances</span>
                    </a>
                </li>
                <?php if(Auth::user()->role=="admin"): ?>
                <li>
                    <a  href="<?php echo e(route('prof.home')); ?>">
                        <i class="nav-link-icon ti-pulse"></i>
                        <span class="nav-link-label">Professors</span>
                    </a>
                </li>
                 <?php endif; ?>
                <?php if(Auth::user()->role=="admin"): ?>
                <li>
                    <a  href="<?php echo e(route('etd.home')); ?>">
                        <i class="nav-link-icon ti-book"></i>
                        <span class="nav-link-label">Students</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(Auth::user()->role=="admin"): ?>
                <li>
                    <a  href="<?php echo e(route('emp.home')); ?>">
                        <i class="nav-link-icon ti-user"></i>
                        <span class="nav-link-label">Administrative</span>
                    </a>
                </li>
                <?php endif; ?>
                
             
                
              <?php if(Auth::user()->role=="admin"): ?>
                
                <li>
                    <a  href="<?php echo e(route('cat.archivehome')); ?>">
                        <i class="nav-link-icon ti-zip"></i>
                        <span class="nav-link-label">Archive</span>
                    </a>
                </li>
                
                <?php endif; ?>
                
            </ul>
        </div>
        <!-- end::navigation -->
      
        
        
        
        
        
        
        
        
        
        <!-- Content body -->
        <div class="content-body">
            
    
            <!-- Content -->
            <div class="content">
               <?php echo $__env->yieldContent('content'); ?> 
                
            </div>
            <!-- ./ Content -->
            
            <!-- Footer -->
            <footer class="content-footer d-print-none">
                <div>© 2020 Ayoub Zaabali - </div>
              
            </footer>
            <!-- ./ Footer -->
            
        </div>
        <!-- ./ Content body -->
      
        <!-- Sidebar group -->
        <div class="sidebar-group d-print-none">
            <!-- Sidebar - Storage -->
            <div class="sidebar primary-sidebar show" id="storage">
                <div class="sidebar-header">
                    <h4>Share The Document</h4>
                </div>
                <div class="sidebar-content">
             
                            <img class="img-fluid" style="background-size:cover;height:50%;width:100%"  src="<?php echo asset('assets/media/image/myGif.gif')  ?>"  alt="upgrade">
                            
                    
                </div>
                <div class="sidebar-footer">
                     <?php if(isset($data['catId']) && !isset($data['archiveId'])): ?>
                    <button data-toggle="modal" href="#exampleModal"  class="btn btn-lg btn-block btn-outline-primary">
                        <i class="fa fa-cloud-upload mr-3"></i> Upload
                    </button>
                    <?php else: ?>
                      <button disabled class="btn btn-lg btn-block btn-outline-primary">
                        <i class="fa fa-cloud-upload mr-3"></i> Upload
                    </button>
                    <?php endif; ?>
                </div>
            </div>
            <!-- ./ Sidebar - Storage -->

            <!-- Sidebar - File info -->
            <div class="sidebar" id="view-detail">
                <div class="sidebar-header">
                    <h4>View Detail</h4>
                    <a href="#" class="btn btn-light btn-floating sidebar-close-btn">
                        <i class="ti-angle-right"></i>
                    </a>
                </div>
                <div class="sidebar-content">
                    <figure class="avatar mb-4">
                        <span class="avatar-title bg-info-bright text-info rounded-pill">
                            <i class="ti-file"></i>
                        </span>
                    </figure>
                    <div class="row mb-3">
                        <div class="col-md-5">File name:</div>
                        <div class="col-md-7"><a href="#" class="link-1">Meeting-notes.doc</a></div>
                    </div>
              
                    <div class="row mb-3">
                        <div class="col-md-5">Size</div>
                        <div class="col-md-7">22 KB</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-5">Added By:</div>
                        <div class="col-md-7">Monday, July 02, 2020 9:34am</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-5">Date:</div>
                        <div class="col-md-7 text-success">Monday, July 02, 2020 9:34am</div>
                    </div>
                  
                </div>
                <div class="sidebar-footer">
                    <button class="btn btn-lg btn-block btn-primary">
                        <a style="color:white" href="#" class="d-flex align-items-center"><i class="ti-share mr-3"></i> Download</a>

                        
                    </button>
                </div>
            </div>
            <!-- ./ Sidebar - file info -->

         
        </div>
        <!-- ./ Sidebar group -->
            </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->

    
    







</body>

<!-- Mirrored from filedash.laborasyon.com/demos/orange/pages/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Aug 2020 16:30:02 GMT -->
</html>
       <?php /**PATH C:\xampp\htdocs\Udash\resources\views/layouts/layout.blade.php ENDPATH**/ ?>