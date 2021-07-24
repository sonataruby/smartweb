<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
	<h3 class="justify-content-between d-flex">Wallet <a href="/wallet/create" class="btn btn-sm btn-primary"><i data-feather="edit"></i> Create</a></h3>	
	

	<table class="table">
		<thead>
			<th>Address</th>
			<th>Network</th>
			<th></th>
			<th></th>
		</thead>
		<?php foreach ($wallet as $key => $value) { ?>
			<tr>
				<td>
					<div style="max-width: 200px;">
						<a href="/wallet/token/<?php echo $value->wallet_address;?>"><div class="limitChatter"><?php echo $value->wallet_address;?></div></a>
					</div>
				</td>
				<td><?php echo $value->wallet_network == "token" ? "Smart Crypto" : $value->wallet_network;?></td>
				

				<td><?php echo ($value->balance + $value->local_balance);?> <?php echo $value->wallet_money;?></td>

				<td class="text-end" style="white-space: nowrap;">
					<a href="/wallet/deposit/<?php echo $value->id;?>" class="btn btn-sm btn-primary"><i data-feather="edit"></i> Deposit</a>
					<a href="/wallet/create/<?php echo $value->id;?>" class="btn btn-sm btn-primary"><i data-feather="edit"></i> Edit</a>
					<a href="/wallet/remove/<?php echo $value->id;?>" class="btn btn-sm btn-danger"><i data-feather="x-circle"></i> Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>
<style type="text/css">
	.limitChatter {
		  overflow: hidden;
		  display: -webkit-box;
		  -webkit-line-clamp: 3;
		  -webkit-box-orient: vertical;
		}
</style>
<?php echo $this->endSection() ?>