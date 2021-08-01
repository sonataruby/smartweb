<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title">
			<i data-feather="server"></i> <?php echo lang("finaceapps.title");?>
			
</h3>


<?php echo form_open();?>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<td><?php echo lang("globals.stt");?></td>
		<td><a href="<?php echo $linkcache;?>name"><?php echo lang("finaceapps.name");?></a></td>
<td><a href="<?php echo $linkcache;?>image"><?php echo lang("finaceapps.image");?></a></td>
<td><a href="<?php echo $linkcache;?>description"><?php echo lang("finaceapps.description");?></a></td>
<td><a href="<?php echo $linkcache;?>link"><?php echo lang("finaceapps.link");?></a></td>
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><?php echo (($key+1) + $data["offset"]);?></td>
			<td><?php echo $item->name;?></td>
<td><?php echo $item->image;?></td>
<td><?php echo $item->description;?></td>
<td><?php echo $item->link;?></td>
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