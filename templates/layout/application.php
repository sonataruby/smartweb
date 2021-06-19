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
<body class="nk-body body-wider theme-dark mode-onepage">

  <div class="nk-wrap">
    <header class="nk-header page-header is-transparent is-sticky is-shrink">
       		    <!-- Header @s -->             <div class="header-main">                 <div class="container">                     <div class="header-wrap">                         <!-- Logo @s -->                         <div class="header-logo logo animated" data-animate="fadeInDown" data-delay=".65">                             <a href="./" class="logo-link">                                 <img class="logo-dark" src="templates/assets/images/logo.png" srcset="templates/assets/images/logo2x.png 2x" alt="logo">                                 <img class="logo-light" src="templates/assets/images/logo-full-white.png" srcset="templates/assets/images/logo-full-white2x.png 2x" alt="logo">                             </a>                         </div>                          <!-- Menu Toogle @s -->                         <div class="header-nav-toggle">                             <a href="#" class="navbar-toggle" data-menu-toggle="header-menu">                                 <div class="toggle-line">                                     <span></span>                                 </div>                             </a>                         </div>                          <!-- Menu @s -->                         <div class="header-navbar header-navbar-s2">                             <nav class="header-menu justify-content-between" id="header-menu">                                 <ul class="menu animated remove-animation" data-animate="fadeInDown" data-delay=".75"><?php echo nav_menu("header");?></ul>                                 <ul class="menu-btns align-items-center animated remove-animation" data-animate="fadeInDown" data-delay=".85">                                     <li class="language-switcher language-switcher-s2 toggle-wrap">                                         <a class="btn btn-rg toggle-tigger btn-outline btn-auto no-change btn-primary" href="#"><span>EN</span><em class="icon ti ti-angle-down"></em></a>                                         <ul class="toggle-class toggle-drop drop-list drop-list-mb"><?php echo nav_language();?></ul>                                     </li>                                     <li><a href="#" class="btn btn-rg btn-secondary no-change"><span>Buy Token</span></a></li>                                 </ul>                             </nav>                         </div><!-- .header-navbar @e -->                     </div>                                                                 </div>             </div><!-- .header-main @e --> 			<!-- Banner @s -->             <?php echo widgets("banner");?> 			<!-- .header-banner @e --> 		
    </header>
    <main class="nk-pages">
        <?php echo $this->renderSection('body') ?>
    </main>
    <footer class="nk-footer bg-theme ov-h overlay-x fw-4">
        <?php echo widgets("footer");?>
    </footer>
    
  </div>

  <div class="preloader"><span class="spinner spinner-round"></span></div>
  
  <!-- JavaScript -->
  <script src="templates/assets/js/jquery.js"></script>
  <script src="templates/assets/js/scripts.js"></script>
  <script src="templates/assets/js/charts.js"></script>
</body>

</html>