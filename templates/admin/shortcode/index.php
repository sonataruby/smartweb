<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title">
			<i data-feather="server"></i> <?php echo lang("shortcode.title");?>
			
</h3>


<?php echo form_open();?>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<td><?php echo lang("globals.stt");?></td>
		<td><a href="<?php echo $linkcache;?>keyword"><?php echo lang("shortcode.keyword");?></a></td>
<td><a href="<?php echo $linkcache;?>replace_data"><?php echo lang("shortcode.replace_data");?></a></td>
<td><a href="<?php echo $linkcache;?>format"><?php echo lang("shortcode.format");?></a></td>
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><?php echo (($key+1) + $data["offset"]);?></td>
			<td><?php echo $item->keyword;?></td>
<td><?php echo $item->replace_data;?></td>
<td><?php echo $item->format;?></td>
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