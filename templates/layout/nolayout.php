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
<link rel="shortcut icon" href="favicon.png">
<!-- Site Title  -->
<title><?php echo $settings->site_name; ?></title>
<!-- Bundle and Base CSS -->
<link rel="stylesheet" href="templates/assets/core/bootstrap.css">
<link rel="stylesheet" href="templates/assets/core/core.css">
<link rel="stylesheet" href="templates/assets/css/style.css">
<!-- Extra CSS -->
<link rel="stylesheet" href="templates/assets/css/theme.css">
</head>
<body class="nk-body body-wider mode-onepage">

  <div class="nk-wrap">
   <main class="nk-pages">
        <?php echo $this->renderSection('body') ?>
    </main>
    
  </div>

  <div class="preloader"><span class="spinner spinner-round"></span></div>
  
  <!-- JavaScript -->
  <script src="templates/assets/core/jquery.js"></script>
  <script src="templates/assets/js/scripts.js"></script>
  <script src="templates/assets/js/charts.js"></script>
</body>

</html>