<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title">
			<i data-feather="server"></i> <?php echo lang("signals.title");?>
			
</h3>


<?php echo form_open();?>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<td><?php echo lang("globals.stt");?></td>
		<td><a href="<?php echo $linkcache;?>is_free"><?php echo lang("signals.is_free");?></a></td>
<td><a href="<?php echo $linkcache;?>symbol"><?php echo lang("signals.symbol");?></a></td>
<td><a href="<?php echo $linkcache;?>type"><?php echo lang("signals.type");?></a></td>
<td><a href="<?php echo $linkcache;?>open"><?php echo lang("signals.open");?></a></td>
<td><a href="<?php echo $linkcache;?>sl"><?php echo lang("signals.sl");?></a></td>
<td><a href="<?php echo $linkcache;?>tp1"><?php echo lang("signals.tp1");?></a></td>
<td><a href="<?php echo $linkcache;?>tp2"><?php echo lang("signals.tp2");?></a></td>
<td><a href="<?php echo $linkcache;?>tp3"><?php echo lang("signals.tp3");?></a></td>
<td><a href="<?php echo $linkcache;?>status"><?php echo lang("signals.status");?></a></td>
<td><a href="<?php echo $linkcache;?>active"><?php echo lang("signals.active");?></a></td>
<td><a href="<?php echo $linkcache;?>profits"><?php echo lang("signals.profits");?></a></td>
<td><a href="<?php echo $linkcache;?>opendate"><?php echo lang("signals.opendate");?></a></td>
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><?php echo (($key+1) + $data["offset"]);?></td>
			<td><?php echo $item->is_free;?></td>
<td><?php echo $item->symbol;?></td>
<td><?php echo $item->type;?></td>
<td><?php echo $item->open;?></td>
<td><?php echo $item->sl;?></td>
<td><?php echo $item->tp1;?></td>
<td><?php echo $item->tp2;?></td>
<td><?php echo $item->tp3;?></td>
<td><?php echo $item->status;?></td>
<td><?php echo $item->active;?></td>
<td><?php echo $item->profits;?></td>
<td><?php echo $item->opendate;?></td>
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