<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>

<?php if(intval($balance_token) > 0 && intval($balance_token) >= $price_copy){ ?>
		
				<div class="alert alert-danger" role="alert">
				   Your account balance is not enough. You can buy <b><?php echo $tokenname;?></b> in the options below
				</div>
				<h3>Buy <?php echo $tokenname;?> Token </h3>
				<div class="row">
					<div class="col-12">
						<b>Amount</b>
						<div class="pb-3"><input type="number" class="form-control" name="numbertoken" value="1000"></div>
					</div>

					<div class="col-12">
						<b>Price : </b>
						<?php echo $price_token;?> USD
					</div>

					<div class="col-md-4 col-6 pb-3">
						<div class="border rounded p-4">
							
							<h5 class="priceusd">0 USD</h5>
							<hr>
							<div class="text-center"><a data-payment="paypal" class="btn btn-primary btn-sm">Payment Paypal</a></div>
						</div>
					</div>
					<div class="col-md-4 col-6 pb-3">
						<div class="border rounded p-4">
							
							<h5 class="pricebtc">0.0000 BTC</h5>
							<hr>
							<div class="text-center"><a data-payment="btc" class="btn btn-primary btn-sm">Payment BTC</a></div>
						</div>
					</div>

					<div class="col-md-4 col-6 pb-3">
						<div class="border rounded p-4">
							
							<h5 class="priceeth">0.000 ETH</h5>
							<hr>
							<div class="text-center"><a data-payment="eth" class="btn btn-primary btn-sm">Payment ETH</a></div>
						</div>
					</div>

				</div>

				<div class="paymentdata"></div>
			
		<?php }else {?>
<?php echo form_open();?>
<section class="nb-contents" style="padding-top:10px; padding-bottom: 50px;">
	<div class="border p-3">
		<div class="container">
			<h3>Seial & MT4/MT5 ID</h3>
			<div class="row">
				<div class="col-md-4 col-6 pb-3">
					MT4/MT5 ID
					<input type="text" name="metaid" required value="<?php echo $signalinfo->meta_id;?>" class="form-control">
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
		

			<h3>Rent VPS ( <?php echo $price_vps;?> <?php echo $tokenname;?> ) / month</h3>
			<div class="form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1">Yes/No</label>
			</div>
		</div>
	</div>
	<br>
	<div class="border p-3">
		<div class="container">
			<?php echo form_open();?>
			<h3>Select Signal ( <?php echo $price_copy;?> <?php echo $tokenname;?> / 1 month)</h3>
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
	</div>
</section>
<?php echo form_close();?>

<?php } ?>
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

<?php $this->endSection() ?>