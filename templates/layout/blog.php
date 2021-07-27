<!DOCTYPE html>
<html lang="en" class="js">
<head>
<meta charset="utf-8">
<!-- Site Title  -->
<title><?php echo $settings->site_name; ?></title>
<meta name="author" content="Smart Blockchain">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<?php echo $settings->site_description; ?>">
<meta name="keyword" content="<?php echo $settings->site_keywords; ?>">
<base href="<?php echo base_url();?>">
<!-- Favicons -->
<link rel="apple-touch-icon" href="apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="manifest.json">
<link rel="mask-icon" href="safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="favicon.ico">
<link rel="shortcut icon" href="<?php echo $settings->site_favicon;?>">
<meta name="theme-color" content="#7952b3">

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
<!-- Header Meta -->
<?php 
  if($settings->headerMeta){
    echo $settings->headerMeta;
  } 
?>
<!-- Bundle and Base CSS -->
<link rel="stylesheet" href="templates/assets/core/bootstrap.css" type="text/css">
<link rel="stylesheet" href="templates/assets/core/core.css" type="text/css">
<link rel="stylesheet" href="templates/assets/core/pages.css">
<link rel="stylesheet" href="templates/assets/css/child.css" type="text/css">
<link rel="stylesheet" href="templates/assets/css/style.css" type="text/css">
<?php 
  if(is_array($stylesheet) && $stylesheet){
  foreach ($stylesheet as $key => $value) { ?>
    <link rel="stylesheet" href="templates/<?php echo $value;?>" type="text/css">
  <?php 
    }
  } 
?>

</head>
<body class="nk-body body-wider mode-onepage">
<div class="skippy visually-hidden-focusable overflow-hidden">
  <div class="container-xl">
    <a class="d-inline-flex p-2 m-1" href="#content">Skip to main content</a>
    <a class="d-none d-md-inline-flex p-2 m-1" href="#bd-docs-nav">Skip to docs navigation</a>
  </div>
</div>
  <div class="nk-wrap">
    <header class="nk-header page-header is-transparent is-sticky is-shrink">
                   <!-- Header @s -->             <div class="header-main">                 <div class="header-container container">                     <div class="header-wrap">                         <!-- Logo @s -->                         <div class="header-logo logo animated" data-animate="fadeInDown" data-delay=".65">                             <a href="./" class="logo-link">                                 <img class="logo-dark" src="<?php echo $settings->site_logo;?>" srcset="<?php echo $settings->site_logo_srcset;?> 2x" alt="logo">                                 <img class="logo-light" src="<?php echo $settings->site_logo_2;?>" srcset="<?php echo $settings->site_logo_2_srcset;?> 2x" alt="logo">                             </a>                         </div>                         <!-- Menu Toogle @s -->                         <div class="header-nav-toggle">                             <a href="#" class="navbar-toggle" data-menu-toggle="example-menu-04">                                 <div class="toggle-line">                                     <span></span>                                 </div>                             </a>                         </div>                         <!-- Menu @s -->                         <div class="header-navbar header-navbar-s3">                             <nav class="header-menu justify-content-between" id="example-menu-04">                                 <ul class="menu menu-s2 animated" data-animate="fadeInDown" data-delay=".75"><?php echo nav_menu("header");?></ul>                                 <ul class="menu-btns align-items-center animated" data-animate="fadeInDown" data-delay=".85">                                     <li><a href="#" class="btn btn-rg btn-round btn-primary"><span>Buy Token</span></a></li>                                     <li class="language-switcher toggle-wrap">                                         <a class="btn btn-rg btn-round btn-outline btn-primary toggle-tigger tc-light" href="#">                                             <img class="language-flag" src="templates/themes/lavenderassets/images/flag-en.jpg" alt="en"><span>En</span> <em class="icon ti ti-angle-down"></em>                                         </a>                                         <ul class="toggle-class toggle-drop drop-list drop-list-sm"><?php echo nav_language($supportlangauge);?></ul>                                     </li>                                 </ul>                             </nav>                         </div><!-- .header-navbar @e -->                     </div>                 </div>             </div><!-- .header-main @e -->              <!-- Banner @s -->             <?php if($is_home == true){ echo widgets("banner"); } ?>             <!-- .header-banner @e -->         
    </header>
    
    <div class="nk-pages">
      <div class="container  bd-layout">
        <aside class="bd-sidebar d-none d-sm-block">
          <nav class="collapse bd-links" id="bd-docs-nav" aria-label="Docs navigation">
              <?php echo $this->renderSection('bodyNav') ?> 
          </nav>
        </aside>

        <main class="bd-main order-1">
          <div class="bd-intro ps-lg-4">
            <?php echo $this->renderSection('bodyTop') ?> 
          </div>
              
          
          <div class="bd-toc mt-4 mb-5 my-md-0 ps-xl-3 mb-lg-5 text-muted">
            <?php echo $this->renderSection('bodyRight') ?>
          </div>
          <div class="bd-content ps-lg-4">
            <?php echo $this->renderSection('body') ?>
          </div>
          
        </main>
        
    </div>

    <footer class="nk-footer bg-theme-alt">
        <?php echo widgets("footer");?>
    </footer>
    
  </div>

  <div class="preloader"><span class="spinner spinner-round"></span></div>
  
  <!-- JavaScript -->
  <script src="templates/assets/core/jquery.js" type="text/javascript"></script>
  <script src="templates/assets/js/scripts.js" type="text/javascript"></script>
  <script src="templates/assets/js/charts.js" type="text/javascript"></script>
<?php 
if(is_array($javascript)){
  foreach ($javascript as $key => $value) { ?>
  <script src="templates/<?php echo $value;?>" type="text/javascript"></script>
<?php 
  }
} 
?>

<!-- Footer Meta -->
<?php 
  if($settings->footerMeta){
    echo $settings->footerMeta;
  } 
?>
</body>

</html>