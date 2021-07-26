<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>

<?php echo form_open();?>
<section class="nb-contents" style="padding-top:10px; padding-bottom: 50px;">
	<div class="container">
		<h3>Seial & MT4/MT5 ID</h3>
		<div class="row">
			<div class="col-md-4 col-6 pb-3">
				MT4/MT5 ID
				<input type="text" name="metaid" value="<?php echo $signalinfo->meta_id;?>" class="form-control">
			</div>
			<div class="col-md-4 col-6 pb-3">
				Password
				<input type="text" name="metapass" value="<?php echo $signalinfo->meta_password;?>" class="form-control">
			</div>
			<div class="col-md-4 col-6 pb-3">
				Server
				<input type="text" name="servermeta" value="<?php echo $signalinfo->metaserver;?>" class="form-control">
			</div>
		</div>
	</div>

	<div class="container">
		<h3>Option</h3>
		<div class="row">
			<div class="col-md-6 col-6 pb-3">
				Lot Size (Max 2%)
				<input type="text" name="size" class="form-control">
			</div>
			<div class="col-md-6 col-6 pb-3">
				Limit (Max 16)
				<input type="text" name="limit" class="form-control">
			</div>
		</div>
	</div>

	<div class="container">
		<?php echo form_open();?>
		<h3>Select Signal</h3>
		<select class="form-select" name="signals">
			<option value="">Select Signals</option>
			<?php foreach ($signal as $key => $value) { ?>
				<option value="<?php echo $value->symbol;?>"><?php echo $value->symbol;?></option>
			<?php } ?>
			
		</select>
		<br>
		<button class="btn btn-primary btn-sm">Create</button>
		<?php echo form_close();?>
	</div>

</section>
<?php echo form_close();?>


<section class="nb-contents" style="padding-top:10px; padding-bottom: 50px;">
	<div class="container">
		<h3>List Copy</h3>
		<table class="table">
			<thead>
				<th>Symbol</th>
				<th>Size</th>
				<th>Limit</th>
				<th>Status</th>
			</thead>
			<?php foreach ($signalready as $key => $value) {  ?>
				
			<tr>
				<td><?php echo $key;?></td>
				<td><?php echo $value->size;?>%</td>
				<td><?php echo $value->limit;?> order</td>
				<td></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</section>

<?php echo $this->endSection() ?>