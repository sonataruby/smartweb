<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
	<h3>Wallet</h3>	
	
	<section class="nb-contents" style="padding-top:10px; padding-bottom: 50px;">
		<div class="container">
			<h3>Balancer</h3>
			<div class="row">
				<div class="col-md-6 col-6 pb-3">
					<div class="border rounded p-4">Deposit : Widthdraw</div>
				</div>
				<div class="col-md-6 col-6 pb-3">
					<div class="border rounded p-4">Your Balance : <?php echo $balance_token;?> Token</div>
				</div>
			</div>
		</div>
	</section>
	
<?php echo $this->endSection() ?>