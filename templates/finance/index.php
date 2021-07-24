<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
	
	<div class="row">
		<div class="col-md-4 col-12 pb-4">
			<div class="bg-primary p-5">
				<h5 class="text-white"><a href="/wallet/buytoken">Buy Smart Token</a></h5>
			</div>
		</div>

		<div class="col-md-4 col-12 pb-4">
			<div class="bg-primary p-5">
				<h5 class="text-white"><a href="/trader">Smart FX Trader</a></h5>
			</div>
		</div>

		<div class="col-md-4 col-12 pb-4">
			<div class="bg-primary p-5">
				<h5 class="text-white">Airdrop Token</h5>
			</div>
		</div>
	</div>
<?php echo $this->endSection() ?>