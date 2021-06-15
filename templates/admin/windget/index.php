<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>

<h3 class="title d-flex justify-content-between">

			<div><i data-feather="server"></i> <?php echo lang("windget.title");?></div>
			<a class="btn btn-sm btn-primary" href="/admin/windget/syncdefault"><i data-feather="sync"></i> Sync Default Build</a>
			
</h3>


<?php echo form_open();?>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<td><?php echo lang("globals.stt");?></td>
		<td><a href="<?php echo $linkcache;?>keyword"><?php echo lang("windget.keyword");?></a></td>
<td><a href="<?php echo $linkcache;?>display"><?php echo lang("windget.display");?></a></td>
<td><a href="<?php echo $linkcache;?>short"><?php echo lang("windget.short");?></a></td>
<td><a href="<?php echo $linkcache;?>name"><?php echo lang("windget.name");?></a></td>
<td><a href="<?php echo $linkcache;?>language"><?php echo lang("windget.language");?></a></td>
<td><a href="<?php echo $linkcache;?>format"><?php echo lang("windget.format");?></a></td>
<td><a href="<?php echo $linkcache;?>created_at"><?php echo lang("windget.created_at");?></a></td>
<td><a href="<?php echo $linkcache;?>deleted_at"><?php echo lang("windget.deleted_at");?></a></td>
<td><a href="<?php echo $linkcache;?>updated_at"><?php echo lang("windget.updated_at");?></a></td>
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><?php echo (($key+1) + $data["offset"]);?></td>
			<td><?php echo $item->keyword;?></td>
<td><?php echo $item->display;?></td>
<td><?php echo $item->short;?></td>
<td><?php echo $item->name;?></td>
<td><?php echo $item->language;?></td>
<td><?php echo $item->format;?></td>
<td><?php echo $item->created_at;?></td>
<td><?php echo $item->deleted_at;?></td>
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
<?php echo $this->endSection() ?>