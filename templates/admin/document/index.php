<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>


<h3 class="title">
			<i data-feather="server"></i> <?php echo lang("document.title");?>
			
</h3>


<?php echo form_open();?>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<td><?php echo lang("globals.stt");?></td>
		<td><a href="<?php echo $linkcache;?>language"><?php echo lang("document.language");?></a></td>
<td><a href="<?php echo $linkcache;?>title"><?php echo lang("document.title");?></a></td>
<td><a href="<?php echo $linkcache;?>image"><?php echo lang("document.image");?></a></td>
<td><a href="<?php echo $linkcache;?>contents_highlight"><?php echo lang("document.contents_highlight");?></a></td>
<td><a href="<?php echo $linkcache;?>contents"><?php echo lang("document.contents");?></a></td>
<td><a href="<?php echo $linkcache;?>tags"><?php echo lang("document.tags");?></a></td>
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><?php echo (($key+1) + $data["offset"]);?></td>
			<td><?php echo $item->language;?></td>
<td><?php echo $item->title;?></td>
<td><?php echo $item->image;?></td>
<td><?php echo $item->contents_highlight;?></td>
<td><?php echo $item->contents;?></td>
<td><?php echo $item->tags;?></td>
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