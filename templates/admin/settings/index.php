<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>


<h3 class="title">
			<i data-feather="server"></i> <?php echo lang("settings.title");?>
			
</h3>


<?php echo form_open();?>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<td><?php echo lang("globals.stt");?></td>
		<td><a href="<?php echo $linkcache;?>name"><?php echo lang("settings.name");?></a></td>
<td><a href="<?php echo $linkcache;?>value"><?php echo lang("settings.value");?></a></td>
<td><a href="<?php echo $linkcache;?>language"><?php echo lang("settings.language");?></a></td>
<td><a href="<?php echo $linkcache;?>groups"><?php echo lang("settings.groups");?></a></td>
<td><a href="<?php echo $linkcache;?>type"><?php echo lang("settings.type");?></a></td>
<td><a href="<?php echo $linkcache;?>default_value"><?php echo lang("settings.default_value");?></a></td>
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><?php echo (($key+1) + $data["offset"]);?></td>
			<td><?php echo $item->name;?></td>
<td><?php echo $item->value;?></td>
<td><?php echo $item->language;?></td>
<td><?php echo $item->groups;?></td>
<td><?php echo $item->type;?></td>
<td><?php echo $item->default_value;?></td>
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
<?php echo $this->endSection() ?>