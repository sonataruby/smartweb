<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>


<h3 class="title">
			<i data-feather="server"></i> <?php echo lang("users.title");?>
</h3>


<?php echo form_open();?>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<td></td>
		<td><a href="<?php echo $linkcache;?>username"><?php echo lang("users.username");?></a></td>
		
		<td><a href="<?php echo $linkcache;?>email"><?php echo lang("users.email");?></a></td>
		
		<td><a href="<?php echo $linkcache;?>display_name"><?php echo lang("users.display_name");?></a></td>
		<td><a href="<?php echo $linkcache;?>firstname"><?php echo lang("users.firstname");?></a></td>
		<td><a href="<?php echo $linkcache;?>lastname"><?php echo lang("users.lastname");?></a></td>
		
		
		
		<td><a href="<?php echo $linkcache;?>phone_number"><?php echo lang("users.phone_number");?></a></td>
		
		<td><a href="<?php echo $linkcache;?>language"><?php echo lang("users.language");?></a></td>
		<td><a href="<?php echo $linkcache;?>country_id"><?php echo lang("users.country_id");?></a></td>
		<td><a href="<?php echo $linkcache;?>city_id"><?php echo lang("users.city_id");?></a></td>
		
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><img src="<?php echo $item->avatar;?>" style="width: 48px;"></td>
			<td><?php echo $item->username;?></td>

<td><?php echo $item->email;?></td>

<td><?php echo $item->display_name;?></td>
<td><?php echo $item->firstname;?></td>
<td><?php echo $item->lastname;?></td>

<td><?php echo $item->phone_number;?></td>

<td><?php echo $item->language;?></td>
<td><?php echo $item->country_id;?></td>

<td><?php echo $item->city_id;?></td>

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