<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>


<h3 class="d-flex justify-content-between">
			<div><i data-feather="server"></i> Language</div>
			
			<div>
				<select class="form-select" aria-label="Default select example">
				  <option selected>Open this select menu</option>
				  <option value="1">One</option>
				  <option value="2">Two</option>
				  <option value="3">Three</option>
				</select>
			</div>
</h3>
<?php echo form_open();?>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Select File</span>
  	<select class="form-select" name="filesave" aria-label="Default select example" onchange="window.location.href='/admin/settings/language?file='+this.value">
	  <option value="<?php echo $_GET['file'];?>" selected><?php echo $_GET['file'];?></option>
	  <?php foreach ($file as $key => $value) { ?>
	  	<option value="<?php echo basename($value);?>"><?php echo basename($value);?></option>
	  <?php } ?>
	  
	</select>
	<button class="btn btn-primary" type="submit">Save</button>
</div>
<?php 
	$ingore = ["language","languge","groups","value","keyword","description","format"];
?>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<th width="20%">Key</th>
			<th>Data</th>
		</thead>
		<?php foreach ($langmode as $key => $value) { ?>
			<?php if(!in_array($key,$ingore) && $_GET['file'] != "Globals.php"){ ?>
			<tr>
				<td><?php echo $key;?></td>
				<td><input type="text" class="form-control" name="lang[<?php echo $key;?>]" value="<?php echo $value;?>"></td>
			</tr>
			<?php } ?>
			<?php if($_GET['file'] == "Globals.php"){ ?>
			<tr>
				<td><?php echo $key;?></td>
				<td><input type="text" class="form-control" name="lang[<?php echo $key;?>]" value="<?php echo $value;?>"></td>
			</tr>
			<?php } ?>
		<?php } ?>
	</table>
</div>
<?php echo form_close();?>

<?php echo $this->endSection() ?>