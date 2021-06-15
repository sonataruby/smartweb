<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>


<h3 class="title">
			<i data-feather="server"></i> <?php echo lang("users.title");?>
			
</h3>


<?php echo form_open();?>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
		<td><?php echo lang("globals.stt");?></td>
				
		
		<td><a href="<?php echo $linkcache;?>email_status"><?php echo lang("users.email_status");?></a></td>
		<td><a href="<?php echo $linkcache;?>email"><?php echo lang("users.email");?></a></td>
		<td><a href="<?php echo $linkcache;?>role"><?php echo lang("users.role");?></a></td>
		

		
		<td><a href="<?php echo $linkcache;?>phone_number"><?php echo lang("users.phone_number");?></a></td>
		<td><a href="<?php echo $linkcache;?>country_id"><?php echo lang("users.country_id");?></a></td>
		<td><a href="<?php echo $linkcache;?>state_id"><?php echo lang("users.state_id");?></a></td>
		<td><a href="<?php echo $linkcache;?>city_id"><?php echo lang("users.city_id");?></a></td>
		
		<td><a href="<?php echo $linkcache;?>created_at"><?php echo lang("users.created_at");?></a></td>
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><img src="<?php echo $item->avatar;?>" style="width: 45px;"></td>
			<td>
				<?php echo $item->email_status;?> 
				<?php echo ($item->user_type == "registered" ? "" : "");?> 
				<?php echo $item->banned;?>
				
			</td>
			<td><?php echo $item->email;?></td>
			
			<td><?php echo $item->role;?></td>
			

			
			<td><?php echo $item->phone_number;?></td>
			<td><?php echo $item->country_id;?></td>
			<td><?php echo $item->state_id;?></td>
			<td><?php echo $item->city_id;?></td>
			
			<td><?php echo $item->created_at;?></td>
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