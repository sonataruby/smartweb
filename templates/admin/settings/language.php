<?php echo $this->extend($layout); ?>

<?php $this->section('bodyTop') ?>


<h3 class="d-flex justify-content-between">
			<div><i data-feather="server"></i> Language</div>
</h3>
<table class="table">
	<thead>
		<td>Name</td>
		<td>Dir</td>
		<td>Status</td>
		<td></td>
	</thead>
<?php foreach ($supportlangauge as $key => $value) { 

	?>
	<tr>
		<td><a href="/admin/settings/language/<?php echo $key;?>"><?php echo $value;?></a></td>
		<td><?php echo $key;?></td>
		<td><?php echo is_dir(APPPATH . "Language/".$key) ? "Ready" : "None";?></td>
		<td class="text-end">
			<?php if($key != "en"){ ?>
			<a href="/admin/settings/makelang/<?php echo $key;?>" class="btn btn-sm btn-primary">Make</a>
			<?php } ?>
		</td>
	</tr>
<?php } ?>
</table>
<?php $this->endSection() ?>

<?php $this->section('body') ?>
<?php echo form_open();?>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Select File</span>
  	<select class="form-select" name="filesave" aria-label="Default select example" onchange="window.location.href='/admin/settings/language/<?php echo $active;?>?file='+this.value">
	  <option value="<?php echo $_GET['file'];?>" selected><?php echo $_GET['file'];?></option>
	  <?php foreach ($file as $key => $value) { ?>
	  	<option value="<?php echo basename($value);?>"><?php echo basename($value);?></option>
	  <?php } ?>
	  
	</select>
	<button class="btn btn-primary" type="submit">Save Update Data</button>
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
		<?php foreach (@$langmode as $key => $value) { ?>
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

<?php $this->endSection() ?>