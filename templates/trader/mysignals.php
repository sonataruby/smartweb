<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<section class="nb-contents" style="padding-top:10px; padding-bottom: 50px;">
	<div class="container">
		<h3>Balancer</h3>
		<div class="row">
			
			<div class="col-md-6 col-6 pb-3">
				<div class="border rounded p-4">Your Balance : <?php echo $balance_token;?> <b><?php echo $tokenname;?></b></div>
			</div>

			<div class="col-md-6 col-6 pb-3">
				<div class="border rounded p-4"><a href="/wallet/deposit" class="btn btn-sm btn-info">Deposit</a>  <a class="btn btn-sm btn-danger" href="/wallet/withdraw">Withdraw</a></div>
			</div>
		</div>
	</div>
	<div class="container">
		
		<h3 class="d-flex justify-content-between">Your Signals <a href="/trader" class="btn btn-sm btn-info">Trade Monitor</a></h3>
		
		
		<table class="table">
			<thead>
				<th>Symbol</th>
				<th>Start</th>
				<th>Finish</th>
				<th></th>
			</thead>
			<?php foreach ($symbolvip as $key => $value) { ?>
				
			<tr>
				<td><?php echo $value->symbol;?></td>
				<td><?php echo $value->starttime;?></td>
				<td><?php echo $value->endtime;?></td>
				<td class="text-end"><a href="/smarttrader/upvip/<?php echo $value->symbol;?>" class="btn btn-sm btn-info">Extend</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</section>
<?php $this->endSection() ?>