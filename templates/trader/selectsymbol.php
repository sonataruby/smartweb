<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>


<section class="nb-contents" style="padding-top:10px; padding-bottom: 50px;">
	<div class="container">
		<h3>Balancer</h3>
		<div class="row">
			<div class="col-md-6 col-6 pb-3">
				<div class="border rounded p-4">Your Balance : <?php echo $balance_usd;?> $</div>
			</div>
			<div class="col-md-6 col-6 pb-3">
				<div class="border rounded p-4">Your Balance : <?php echo $balance_usd;?> AURU</div>
			</div>
		</div>
	</div>
	<div class="container">
		<?php echo form_open();?>
		<h3>Select Symbol</h3>
		<select class="form-select" name="symbol">
			<?php foreach ($symbol as $key => $value) { ?>
				<option value="<?php echo $key;?>"><?php echo $key;?></option>
			<?php } ?>
			
		</select>
		<br>
		<button class="btn btn-primary btn-sm">Execute</button>
		<?php echo form_close();?>
	</div>
</section>

<?php echo $this->endSection() ?>