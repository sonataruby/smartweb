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
<link rel="shortcut icon" href="<?php echo $settings->site_favicon;?>">
<!-- Site Title  -->
<title><?php echo $settings->site_name; ?></title>
<!-- Bundle and Base CSS -->

<link rel="stylesheet" href="templates/assets/core/bootstrap.css">
<link rel="stylesheet" href="templates/assets/core/pages.css">
<link rel="stylesheet" href="templates/assets/css/style.css">
<!-- Extra CSS -->
<link rel="stylesheet" href="templates/assets/css/theme.css">
<script src="templates/assets/core/jquery.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script src="templates/assets/core/jquery.upload.js"></script>
<?php 
  if(is_array($stylesheet) && $stylesheet){
  foreach ($stylesheet as $key => $value) { ?>
    <link rel="stylesheet" href="templates/<?php echo $value;?>" type="text/css">
  <?php 
    }
  } 
?>
<?php 
  if(is_array($stylesheetEx) && $stylesheetEx){
  ?>
  <style type="text/css">
  <?php foreach ($stylesheetEx as $key => $value) { ?>
    <?php echo $value;?>
  <?php } ?>
  </style>
<?php } ?>
<style type="text/css">
    .header-main{
        background-color: #5d46e8;
        margin-bottom: 20px;
    }
    .nk-footer{
        padding-top: 30px;
        padding-bottom: 30px;
        background-color: #f2f2f2;
    }
</style>
</head>
<body class="nk-body body-wider mode-onepage">

  <div class="nk-wrap">
    <header class="nk-header page-header is-transparent is-sticky is-shrink" id="header">
              <!-- Header @s -->             <div class="header-main">                 <div class="header-container container">                     <div class="header-wrap">                         <!-- Logo @s -->                         <div class="header-logo logo animated" data-animate="fadeInDown" data-delay=".65">                             <a href="./" class="logo-link">                                 <img class="logo-dark" src="templates/assets/images/logo.png" srcset="templates/assets/images/logo2x.png 2x" alt="logo">                                 <img class="logo-light" src="templates/assets/images/logo.png" srcset="templates/assets/images/logo2x.png 2x" alt="logo">                             </a>                         </div>                          <!-- Menu Toogle @s -->                         <div class="header-nav-toggle">                             <a href="#" class="navbar-toggle" data-menu-toggle="header-menu">                                 <div class="toggle-line">                                     <span></span>                                 </div>                             </a>                         </div>                          <!-- Menu @s -->                         <div class="header-navbar header-navbar-s1">                             <nav class="header-menu" id="header-menu">                                 <ul class="menu animated" data-animate="fadeInDown" data-delay=".75">




              </ul>                                 

            <ul class="menu menu-s2 animated" data-animate="fadeInDown" data-delay=".85">                                     
                <li class="language-switcher language-switcher-s1 toggle-wrap">                                         
                    <a class="toggle-tigger" href="#">English</a>                                         
                    <ul class="toggle-class toggle-drop toggle-drop-left drop-list drop-list-sm"><?php echo nav_language($supportlangauge);?></ul>
                </li>
                <li class="toggle-wrap has-sub">                                         
                    <a class="toggle-tigger"><?php echo $user->lastname;?> <?php echo $user->firstname;?></a>                                         
                    <ul class="toggle-class toggle-drop toggle-drop-right drop-list drop-list-md">
                        <li><a href="/account/profile">Settings</a></li>
                        <li><a href="/wallet">Wallet</a></li>
                        <li><a href="/wallet">Finance Apps</a></li>
                        <li><a href="/account/logout">Logout</a></li>
                    </ul>
                </li> 

                
                                                
            </ul>                             

        </nav>                         </div><!-- .header-navbar @e -->                     </div>                                                                 </div>             </div><!-- .header-main @e -->      
              
    </header>
    <div class="nk-pages" style="padding-top: 120px;">
      <?php if($breadcrumbs){ ?>
      <div class="border-bottom mb-3">
        <div class="container">
          <?php echo $breadcrumbs;?>
        </div>
      </div>
      <?php } ?>

<?php if($confirm){ ?>
<div class="container alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    <?php echo $confirm;?>
  </div>
</div>
<?php } ?>


<?php if($errors){ ?>
<div class="container alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    <?php echo $errors;?>
  </div>
</div>
<?php } ?>

<div class="container my-md-4 bd-layout">
    <aside class="bd-sidebar d-none d-sm-block">
        <nav class="collapse bd-links" id="bd-docs-nav" aria-label="Docs navigation">
            <div class="bg-primary rounded p-4 text-center" style="margin-bottom: 20%;">
                    <img src="<?php echo $user->user_avatar;?>" class="img-thumbnail" alt="..." style="border-radius: 100%; margin-bottom: -40%;">
            </div>
            <div class="collapse show" id="getting-started-collapse">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><?php echo $user->lastname;?> <?php echo $user->firstname;?></li>
                  <?php if($user->phone){ ?>
                  <li class="list-group-item"><?php echo $user->email;?></li>
                  <?php } ?>
                  <?php if($user->phone){ ?>
                  <li class="list-group-item"><?php echo $user->phone;?></li>
                  <?php } ?>
                  <?php if($user->website){ ?>
                  <li class="list-group-item"><?php echo $user->website;?></li>
                  <?php } ?>
                  <?php if($user->address){ ?>
                  <li class="list-group-item"><?php echo $user->address;?></li>
                  <?php } ?>
                </ul>

                <hr>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><a href="/profile">Profile</a></li>
                  <li class="list-group-item"><a href="/wallet">Wallet</a></li>
                  <li class="list-group-item"><a href="/members">Member</a></li>
                  <li class="list-group-item"><a href="/finance">Finance Apps</a></li>
                  
                </ul>
            </div>
            <div style="position:absolute ;bottom: 0;  width: 100%;"><a href="/account/logout" class="btn btn-sm btn-danger btn-block" style="width: 100%;">Logout</a></div>
        </nav>
    </aside>
    <main class="bd-main order-1">
        <?php echo $this->renderSection('body') ?>
    </main>
</div>
      </div>
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

  <script src="templates/assets/js/scripts.js"></script>
  <script src="templates/assets/js/charts.js"></script>

</body>

</html>