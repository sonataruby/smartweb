<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title">
			<i data-feather="server"></i> <?php echo lang("users_wallet.title");?>
			
</h3>


<?php echo form_open();?>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<td><?php echo lang("globals.stt");?></td>
		<td><a href="<?php echo $linkcache;?>user_id"><?php echo lang("users_wallet.user_id");?></a></td>
<td><a href="<?php echo $linkcache;?>wallet_address"><?php echo lang("users_wallet.wallet_address");?></a></td>
<td><a href="<?php echo $linkcache;?>wallet_network"><?php echo lang("users_wallet.wallet_network");?></a></td>
<td><a href="<?php echo $linkcache;?>created_at"><?php echo lang("users_wallet.created_at");?></a></td>
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><?php echo (($key+1) + $data["offset"]);?></td>
			<td><?php echo $item->user_id;?></td>
<td><?php echo $item->wallet_address;?></td>
<td><?php echo $item->wallet_network;?></td>
<td><?php echo $item->created_at;?></td>
			<td class="text-end" style="white-space: nowrap;">
					<a class="btn btn-sm btn-primary" href="<?php echo $link;?>/create/<?php echo $item->id;?>"><i data-feather="edit"></i> Edit</a>
					<a class="btn btn-sm btn-danger" href="<?php echo $link;?>/delete/<?php echo $item->id;?>"><i data-feather="x-circle"></i> Delete</a>
			</td>
		</tr>
	<?php } ?>

	</table>
</div>
<?php echo form_close();?>
<?php echo $data["page"];?>
<?php $this->endSection() ?>