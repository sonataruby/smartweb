<!DOCTYPE html>
<html lang="en" class="js">
<head>
<meta charset="utf-8">
<meta name="author" content="Smart Blockchain">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?php echo $settings->site_description; ?>">
<meta name="keyword" content="<?php echo $settings->site_keywords; ?>">
<base href="<?php echo base_url();?>">
<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="<?php echo $settings->twitter; ?>">
<meta name="twitter:creator" content="<?php echo $settings->twitter; ?>">
<meta name="twitter:title" content="<?php echo $settings->site_name; ?>">
<meta name="twitter:description" content="<?php echo $settings->site_description; ?>">
<meta name="twitter:image" content="<?php echo $settings->site_banner; ?>">
<!-- Facebook -->
<meta property="og:url" content="<?php echo base_url(); ?>">
<meta property="og:title" content="<?php echo $settings->site_name; ?>">
<meta property="og:description" content="<?php echo $settings->site_description; ?>">
<meta property="og:type" content="article">
<meta property="og:image" content="<?php echo $settings->site_banner; ?>">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1000">
<meta property="og:image:height" content="500">
<!-- Fav Icon  -->
<link rel="shortcut icon" href="templates/assets/images/favicon.png">
<!-- Site Title  -->
<title><?php echo $settings->site_name; ?></title>
<!-- Bundle and Base CSS -->
<link rel="stylesheet" href="templates/assets/css/vendor.bundle.css">
<link rel="stylesheet" href="templates/assets/css/style.css">
<!-- Extra CSS -->
<link rel="stylesheet" href="templates/assets/css/theme.css">
</head>
<body class="nk-body body-wider mode-onepage">

  <div class="nk-wrap">
    <header class="nk-header page-header is-sticky is-shrink is-transparent is-light border-bottom">
              <!-- Header @s -->             <div class="header-main">                 <div class="header-container container">                     <div class="header-wrap">                         <!-- Logo @s -->                         <div class="header-logo logo animated" data-animate="fadeInDown" data-delay=".65">                             <a href="./" class="logo-link">                                 <img class="logo-dark" src="templates/assets/images/logo.png" srcset="templates/assets/images/logo2x.png 2x" alt="logo">                                 <img class="logo-light" src="templates/assets/images/logo.png" srcset="templates/assets/images/logo2x.png 2x" alt="logo">                             </a>                         </div>                          <!-- Menu Toogle @s -->                         <div class="header-nav-toggle">                             <a href="#" class="navbar-toggle" data-menu-toggle="header-menu">                                 <div class="toggle-line">                                     <span></span>                                 </div>                             </a>                         </div>                          <!-- Menu @s -->                         <div class="header-navbar header-navbar-s1">                             <nav class="header-menu" id="header-menu">                                 <ul class="menu animated" data-animate="fadeInDown" data-delay=".75">




              </ul>                                 <ul class="menu-btns menu-btns-s3 align-items-center animated" data-animate="fadeInDown" data-delay=".85">                                     <li class="language-switcher language-switcher-s1 toggle-wrap">                                         <a class="toggle-tigger" href="#">English</a>                                         <ul class="toggle-class toggle-drop toggle-drop-left drop-list drop-list-sm"><?php echo nav_language($supportlangauge);?></ul>                                     </li>                                     
                <li><a href="#" data-toggle="modal" data-target="#register-popup" class="btn btn-md btn-primary btn-outline"><span><?php echo $user->lastname;?> <?php echo $user->firstname;?></span></a></li>                                 </ul>                             </nav>                         </div><!-- .header-navbar @e -->                     </div>                                                                 </div>             </div><!-- .header-main @e -->      
              
    </header>
    <main class="nk-pages" style="padding-top: 80px;">
      <div class="container">
        <div class="row">
            <div class="col-3">
               
                <div>
                    <img src="<?php echo $user->user_avatar;?>" class="img-thumbnail" alt="...">
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><?php echo $user->lastname;?> <?php echo $user->firstname;?></li>
                  <li class="list-group-item"><i class="fa "></i> <?php echo $user->email;?></li>
                  <li class="list-group-item"><?php echo $user->phone;?></li>
                  <li class="list-group-item"><?php echo $user->website;?></li>
                  <li class="list-group-item"><?php echo $user->address;?></li>
                </ul>

                <hr>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><a href="/profile">Profile</a></li>
                  <li class="list-group-item"><a href="/wallet">Wallet</a></li>
                  <li class="list-group-item"><a href="/members">Member</a></li>
                  <li class="list-group-item">Finance Program</li>
                  
                </ul>
                <hr>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Profile</li>
                  <li class="list-group-item">Wallet</li>
                  <li class="list-group-item">Member</li>
                  <li class="list-group-item">Program</li>
                  
                </ul>
            </div>
            <div class="col-9">
                <?php echo $this->renderSection('body') ?>
            </div>
        </div>
      </div>
    </main>
    <footer class="nk-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <span class="footer-copyright">Copyright <?php echo date("Y");?>, <a href="#">Smart Crypto</a>.  All Rights Reserved.</span>
                </div><!-- .col -->
                <div class="col-md-5 text-md-right">
                    <ul class="footer-links">
                        <li><a href="policy.html">Privacy Policy</a></li>
                        <li><a href="policy.html">Terms of Sales</a></li>
                    </ul>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </footer>
    
  </div>

  <div class="preloader"><span class="spinner spinner-round"></span></div>
  
  <!-- JavaScript -->
  <script src="templates/assets/js/jquery.js"></script>
  <script src="templates/assets/js/scripts.js"></script>
  <script src="templates/assets/js/charts.js"></script>
</body>

</html>