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
<link rel="stylesheet" href="templates/assets/css/bootstrap.css">
<link rel="stylesheet" href="templates/assets/theme.css">

<script src="templates/assets/core/apps.js"></script>

<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script src="templates/assets/js/jquery.upload.js"></script>



</head>
<body>
<header class="navbar navbar-expand-md navbar-dark bd-navbar">
  <nav class="container-xxl flex-wrap flex-md-nowrap" aria-label="Main navigation">
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
        
      </ul>

      

      
    </div>
  </nav>
</header>



<?php if($confirm){ ?>
<div class="container-xxl alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    <?php echo $confirm;?>
  </div>
</div>
<?php } ?>


<?php if($errors){ ?>
<div class="container-xxl alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    <?php echo $errors;?>
  </div>
</div>
<?php } ?>

<div class="container-xxl my-md-4 bd-layout">
  <aside class="bd-sidebar"></aside>
  <main class="bd-main order-1">
      <h3>Install</h3>
      <?php echo form_open();?>
      <div class="card">
        
        <div class="card-body">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Database</label>
            <select type="text" class="form-control" id="exampleFormControlInput1" name="database">
              <option value="mysql">Mysql</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Database Server</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="server" placeholder="Server" value="localhost">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Database Server</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="databasename" placeholder="Database Name" value="smart_token">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Database User</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="databaseuser" placeholder="Username" value="root">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Database Password</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="databasepassword" placeholder="Password">
          </div>
          <h3>Admin Account</h3>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="adminemail" placeholder="Email">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="adminpassword" placeholder="Password">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"></label>
            <button class="btn btn-primary">Start Install</button>
          </div>

        </div>
      </div>
      <?php echo form_close();?>
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