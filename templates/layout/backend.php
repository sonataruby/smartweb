<!doctype html>
<html lang="en" class="js">
<head>
	<meta charset="utf-8">
<meta name="author" content="Softnio">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<base href="<?php echo base_url();?>">
<!-- Fav Icon  -->
<link rel="shortcut icon" href="favicon.png">
<!-- Site Title  -->
<title>Token Program</title>
<!-- Bundle and Base CSS -->

<link rel="stylesheet" href="templates/assets/core/bootstrap.css">

<link rel="stylesheet" href="templates/assets/theme.css">
<link rel="stylesheet" href="templates/assets/core/admin.css">

<script src="templates/assets/core/apps.js"></script>
<script src="templates/assets/core/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="templates/assets/core/datepicker.css"/>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script src="templates/assets/core/jquery.upload.js"></script>
<link rel="stylesheet" href="templates/assets/core/trumbowyg/ui/trumbowyg.css"/>
<script type='text/javascript' src='templates/assets/core/trumbowyg/trumbowyg.js'></script>

<?php 
$file = glob ( FCPATH . "templates/assets/core/trumbowyg/plugins/*/trumbowyg.*.js");
foreach ($file as $key => $value) { 
    if(strpos($value,".min") !== false && basename($value) != "trumbowyg.highlight.min.js"){
    ?>
    <script type='text/javascript' src='<?php echo str_replace(FCPATH,'',$value);?>'></script>
<?php 
    }
} ?>


</head>
<body>
  <div class="skippy visually-hidden-focusable overflow-hidden">
  <div class="container-xl">
    <a class="d-inline-flex p-2 m-1" href="#content">Skip to main content</a>
    <a class="d-none d-md-inline-flex p-2 m-1" href="#bd-docs-nav">Skip to docs navigation</a>
  </div>
</div>
<header class="navbar navbar-expand-md navbar-dark bd-navbar">
  <nav class="container-fluid flex-wrap flex-md-nowrap" aria-label="Main navigation">
    <a class="navbar-brand p-0 me-2" href="/" aria-label="Bootstrap">
      AD
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
</svg>

    </button>

    <div class="collapse navbar-collapse" id="bdNavbar">
      <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav pt-2 py-md-0">
        <li class="nav-item col-6 col-md-auto">
          <a class="nav-link p-2" href="admin">Home</a>
        </li>
        <li class="nav-item col-6 col-md-auto">
          <a class="nav-link p-2 active" aria-current="true" href="/admin/users">Account</a>
        </li>
        <li class="nav-item col-6 col-md-auto">
          <a class="nav-link p-2" href="admin/application">Apps</a>
        </li>
        
        <li class="nav-item col-6 col-md-auto">
          <a class="nav-link p-2" href="admin/templates">Themes</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Systems
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="admin/settings">Settings</a></li>
            <li><a class="dropdown-item" href="admin/settings/backup">Backup</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="admin/settings/language">Language</a></li>
          </ul>
        </li>
      </ul>

      <hr class="d-md-none text-white-50">

      <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $language;?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            
            <?php foreach ($supportlangauge as $key => $value) { ?>
              <li><a class="dropdown-item" href="<?php echo $linkcache ? $linkcache."&" : "/admin?";?>language=<?php echo $key;?>"><?php echo $value;?></a></li>
             
            <?php } ?>
          </ul>
        </li>

         
      </ul>

      <a class="btn btn-bd-download d-lg-inline-block my-2 my-md-0 ms-md-3" href="/docs/5.0/getting-started/download/">Download</a>
    </div>
  </nav>
</header>

<nav class="bd-subnavbar py-2" aria-label="Secondary navigation">
  
  <div class="container-fluid d-flex align-items-md-center">
    

    <?php echo form_open("",["method" => "get","class" => "bd-search position-relative me-auto"]);?>
    <div class="input-group mb-3">
      <input type="text" class="form-control" name="search" value="<?php echo $_GET['search'];?>" placeholder="Enter Key Search"  aria-describedby="basic-addon2">
      <button class="btn btn-outline-primary" id="basic-addon2"><i data-feather="search"></i> Search</button>
    </div>
    <?php echo form_close();?>
    <div>
      
    </div>
  </div>
  
</nav>

<?php if($confirm){ ?>
<div class="container-fluid alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    <?php echo $confirm;?>
  </div>
</div>
<?php } ?>


<?php if($errors){ ?>
<div class="container-fluid alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    <?php echo $errors;?>
  </div>
</div>
<?php } ?>

<div class="container-fluid my-md-4 bd-layout">
  <aside class="bd-sidebar">
    <nav class="collapse bd-links" id="bd-docs-nav" aria-label="Docs navigation">
      <h4>Admin Apps</h4>
      <ul class="list-unstyled mb-0 py-3 pt-md-1">
        <li class="mb-1"><a href="/admin/users">Account</a></li>
        <li class="mb-1"><a href="/admin/settings">System</a></li>
        <li class="mb-1"><a href="/admin/application">Apps</a></li>
      </ul>
  </nav>
  </aside>
  <main class="bd-main order-1">
    <div class="bd-intro ps-lg-4">
      <div class="justify-content-between d-flex">
      <?php if($breadcrumbs){ ?>
      <?php echo $breadcrumbs;?>
      <?php } ?>
      <div>
        <?php if($link != "" && $action == "list"){ ?>
        <div class="btn-group rounded-pill" role="group" aria-label="Basic example">
          <a type="button" href="<?php echo $linkcache2;?>desc" class="btn <?php echo $_GET["des"] == "desc" ? "btn-primary" : "btn-outline-secondary";?>"><i data-feather="arrow-up"></i></a>
          <a type="button" href="<?php echo $linkcache2;?>asc" class="btn <?php echo $_GET["des"] == "asc" ? "btn-primary" : "btn-outline-secondary";?>"><i data-feather="arrow-down"></i></a>
          
        </div>
          <a href="<?php echo $link;?>/create" class="btn btn-md btn-info"><i data-feather="plus-circle"></i> <?php echo lang("globals.create");?></a>
          <button class="btn btn-md btn-danger"><i data-feather="x-circle"></i> <?php echo lang("globals.delete");?></button>
        
        <?php } ?>
        <?php if($link != "" && $action == "create"){ ?>
          <a href="<?php echo $link;?>" class="btn btn-md btn-outline-primary"><i data-feather="arrow-left"></i> <?php echo lang("globals.back");?></a>
          <button class="btn btn-md btn-primary" onclick="$('main form').submit();"><i data-feather="save"></i> <?php echo lang("globals.save");?></button>
        <?php } ?>
        </div>
      </div>

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


<footer class="bd-footer py-5 mt-5 bg-light">
  <div class="container py-5">
    
  </div>
</footer>
<script>
      feather.replace()
    </script>

</body>
</html>