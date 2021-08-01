<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title d-flex justify-content-between">
			<div><i data-feather="server"></i> <?php echo lang("menu.title");?></div>
			<a class="btn btn-sm btn-primary" href="/admin/menu/syncdefault"><i data-feather="sync"></i> Sync Default Build</a>
</h3>


<?php echo form_open();?>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<td><?php echo lang("globals.stt");?></td>
		<td><a href="<?php echo $linkcache;?>name"><?php echo lang("menu.name");?></a></td>
<td><a href="<?php echo $linkcache;?>parent"><?php echo lang("menu.parent");?></a></td>
<td><a href="<?php echo $linkcache;?>short"><?php echo lang("menu.short");?></a></td>
<td><a href="<?php echo $linkcache;?>status"><?php echo lang("menu.status");?></a></td>
<td><a href="<?php echo $linkcache;?>language"><?php echo lang("menu.language");?></a></td>
<td><a href="<?php echo $linkcache;?>router"><?php echo lang("menu.router");?></a></td>
<td><a href="<?php echo $linkcache;?>display"><?php echo lang("menu.display");?></a></td>
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><?php echo (($key+1) + $data["offset"]);?></td>
			<td><?php echo $item->name;?></td>
<td><?php echo $item->parent;?></td>
<td><?php echo $item->short;?></td>
<td><?php echo $item->status;?></td>
<td><?php echo $item->language;?></td>
<td><?php echo $item->router;?></td>
<td><?php echo $item->display;?></td>
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