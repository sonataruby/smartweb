<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
	
	<div class="row">
		<div class="col-md-4 col-12 pb-4">
			<div class="bg-primary p-5">
				<h5><a href="/wallet/buytoken" class="text-white">Buy Smart Token</a></h5>
			</div>
		</div>

		<div class="col-md-4 col-12 pb-4">
			<div class="bg-primary p-5">
				<h5><a href="/trader" class="text-white">Smart FX Trader</a></h5>
			</div>
		</div>

		<div class="col-md-4 col-12 pb-4">
			<div class="bg-primary p-5">
				<h5 class="text-white">Airdrop Token</h5>
			</div>
		</div>
	</div>
<?php echo $this->endSection() ?>