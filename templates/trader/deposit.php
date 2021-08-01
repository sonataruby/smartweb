<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<section class="nb-contents" style="padding-top:10px; padding-bottom: 50px;">
	<div class="container">
		<h3>Balancer</h3>
		<div class="row">
			<div class="col-md-6 col-6 pb-3">
				<div class="border rounded p-4">Your Balance : 0$</div>
			</div>
			<div class="col-md-6 col-6 pb-3">
				<div class="border rounded p-4">Your Balance : 0 AURU</div>
			</div>
		</div>
	</div>
	<div class="container">
		<h3>Balance Empty</h3>
		<div>Your Balance empty money. plz Deposit or can buy AURU token</div>
	</div>
</section>

<?php $this->endSection() ?>