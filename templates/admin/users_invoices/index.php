<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title">
			<i data-feather="server"></i> <?php echo lang("users_invoices.title");?>
			
</h3>


<?php echo form_open();?>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<td><?php echo lang("globals.stt");?></td>
		<td><a href="<?php echo $linkcache;?>user_id"><?php echo lang("users_invoices.user_id");?></a></td>
<td><a href="<?php echo $linkcache;?>invoice_id"><?php echo lang("users_invoices.invoice_id");?></a></td>
<td><a href="<?php echo $linkcache;?>payment_id"><?php echo lang("users_invoices.payment_id");?></a></td>
<td><a href="<?php echo $linkcache;?>type"><?php echo lang("users_invoices.type");?></a></td>
<td><a href="<?php echo $linkcache;?>status"><?php echo lang("users_invoices.status");?></a></td>
<td><a href="<?php echo $linkcache;?>amount"><?php echo lang("users_invoices.amount");?></a></td>
<td><a href="<?php echo $linkcache;?>items"><?php echo lang("users_invoices.items");?></a></td>
<td><a href="<?php echo $linkcache;?>created_at"><?php echo lang("users_invoices.created_at");?></a></td>
<td><a href="<?php echo $linkcache;?>updated_at"><?php echo lang("users_invoices.updated_at");?></a></td>
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><?php echo (($key+1) + $data["offset"]);?></td>
			<td><?php echo $item->user_id;?></td>
<td><?php echo $item->invoice_id;?></td>
<td><?php echo $item->payment_id;?></td>
<td><?php echo $item->type;?></td>
<td><?php echo $item->status;?></td>
<td><?php echo $item->amount;?></td>
<td><?php echo $item->items;?></td>
<td><?php echo $item->created_at;?></td>
<td><?php echo $item->updated_at;?></td>
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