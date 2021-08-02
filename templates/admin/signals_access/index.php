<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title">
			<i data-feather="server"></i> <?php echo lang("signals_access.title");?>
			
</h3>


<?php echo form_open();?>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<td><?php echo lang("globals.stt");?></td>
		<td><a href="<?php echo $linkcache;?>account_id"><?php echo lang("signals_access.account_id");?></a></td>
<td><a href="<?php echo $linkcache;?>symbol"><?php echo lang("signals_access.symbol");?></a></td>
<td><a href="<?php echo $linkcache;?>status"><?php echo lang("signals_access.status");?></a></td>
<td><a href="<?php echo $linkcache;?>created_at"><?php echo lang("signals_access.created_at");?></a></td>
<td><a href="<?php echo $linkcache;?>starttime"><?php echo lang("signals_access.starttime");?></a></td>
<td><a href="<?php echo $linkcache;?>endtime"><?php echo lang("signals_access.endtime");?></a></td>
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><?php echo (($key+1) + $data["offset"]);?></td>
			<td><?php echo $item->account_id;?></td>
<td><?php echo $item->symbol;?></td>
<td><?php echo $item->status;?></td>
<td><?php echo $item->created_at;?></td>
<td><?php echo $item->starttime;?></td>
<td><?php echo $item->endtime;?></td>
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