<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>
	<?php echo form_open();?>
	<h3>Withdraw | <?php echo $token;?></h3>	
	
	<div class="mb-3">
	  <label for="exampleFormControlInput1" class="form-label">Amount</label>
	  <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter Number">
	</div>
	<div class="mb-3">
		<button class="btn btn-primary btn-sm">Withdraw</button>
	</div>
	<?php echo form_close();?>
<?php $this->endSection() ?>