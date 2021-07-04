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
		<td><a href="<?php echo $linkcache;?>username"><?php echo lang("users.username");?></a></td>
<td><a href="<?php echo $linkcache;?>slug"><?php echo lang("users.slug");?></a></td>
<td><a href="<?php echo $linkcache;?>email"><?php echo lang("users.email");?></a></td>
<td><a href="<?php echo $linkcache;?>email_status"><?php echo lang("users.email_status");?></a></td>
<td><a href="<?php echo $linkcache;?>token"><?php echo lang("users.token");?></a></td>
<td><a href="<?php echo $linkcache;?>password"><?php echo lang("users.password");?></a></td>
<td><a href="<?php echo $linkcache;?>role"><?php echo lang("users.role");?></a></td>
<td><a href="<?php echo $linkcache;?>user_type"><?php echo lang("users.user_type");?></a></td>
<td><a href="<?php echo $linkcache;?>display_name"><?php echo lang("users.display_name");?></a></td>
<td><a href="<?php echo $linkcache;?>firstname"><?php echo lang("users.firstname");?></a></td>
<td><a href="<?php echo $linkcache;?>lastname"><?php echo lang("users.lastname");?></a></td>
<td><a href="<?php echo $linkcache;?>midname"><?php echo lang("users.midname");?></a></td>
<td><a href="<?php echo $linkcache;?>facebook_id"><?php echo lang("users.facebook_id");?></a></td>
<td><a href="<?php echo $linkcache;?>google_id"><?php echo lang("users.google_id");?></a></td>
<td><a href="<?php echo $linkcache;?>avatar"><?php echo lang("users.avatar");?></a></td>
<td><a href="<?php echo $linkcache;?>banner_img"><?php echo lang("users.banner_img");?></a></td>
<td><a href="<?php echo $linkcache;?>banned"><?php echo lang("users.banned");?></a></td>
<td><a href="<?php echo $linkcache;?>phone_number"><?php echo lang("users.phone_number");?></a></td>
<td><a href="<?php echo $linkcache;?>timezone"><?php echo lang("users.timezone");?></a></td>
<td><a href="<?php echo $linkcache;?>language"><?php echo lang("users.language");?></a></td>
<td><a href="<?php echo $linkcache;?>country_id"><?php echo lang("users.country_id");?></a></td>
<td><a href="<?php echo $linkcache;?>state_id"><?php echo lang("users.state_id");?></a></td>
<td><a href="<?php echo $linkcache;?>city_id"><?php echo lang("users.city_id");?></a></td>
<td><a href="<?php echo $linkcache;?>address"><?php echo lang("users.address");?></a></td>
<td><a href="<?php echo $linkcache;?>zip_code"><?php echo lang("users.zip_code");?></a></td>
<td><a href="<?php echo $linkcache;?>show_email"><?php echo lang("users.show_email");?></a></td>
<td><a href="<?php echo $linkcache;?>show_phone"><?php echo lang("users.show_phone");?></a></td>
<td><a href="<?php echo $linkcache;?>show_location"><?php echo lang("users.show_location");?></a></td>
<td><a href="<?php echo $linkcache;?>facebook_url"><?php echo lang("users.facebook_url");?></a></td>
<td><a href="<?php echo $linkcache;?>twitter_url"><?php echo lang("users.twitter_url");?></a></td>
<td><a href="<?php echo $linkcache;?>instagram_url"><?php echo lang("users.instagram_url");?></a></td>
<td><a href="<?php echo $linkcache;?>pinterest_url"><?php echo lang("users.pinterest_url");?></a></td>
<td><a href="<?php echo $linkcache;?>linkedin_url"><?php echo lang("users.linkedin_url");?></a></td>
<td><a href="<?php echo $linkcache;?>vk_url"><?php echo lang("users.vk_url");?></a></td>
<td><a href="<?php echo $linkcache;?>youtube_url"><?php echo lang("users.youtube_url");?></a></td>
<td><a href="<?php echo $linkcache;?>last_seen"><?php echo lang("users.last_seen");?></a></td>
<td><a href="<?php echo $linkcache;?>show_rss_feeds"><?php echo lang("users.show_rss_feeds");?></a></td>
<td><a href="<?php echo $linkcache;?>intivited_code"><?php echo lang("users.intivited_code");?></a></td>
<td><a href="<?php echo $linkcache;?>created_at"><?php echo lang("users.created_at");?></a></td>
		<td></td>
	</thead>

	<?php foreach($data["items"] as $key => $item){?>
		<tr>
			<td><?php echo (($key+1) + $data["offset"]);?></td>
			<td><?php echo $item->username;?></td>
<td><?php echo $item->slug;?></td>
<td><?php echo $item->email;?></td>
<td><?php echo $item->email_status;?></td>
<td><?php echo $item->token;?></td>
<td><?php echo $item->password;?></td>
<td><?php echo $item->role;?></td>
<td><?php echo $item->user_type;?></td>
<td><?php echo $item->display_name;?></td>
<td><?php echo $item->firstname;?></td>
<td><?php echo $item->lastname;?></td>
<td><?php echo $item->midname;?></td>
<td><?php echo $item->facebook_id;?></td>
<td><?php echo $item->google_id;?></td>
<td><?php echo $item->avatar;?></td>
<td><?php echo $item->banner_img;?></td>
<td><?php echo $item->banned;?></td>
<td><?php echo $item->phone_number;?></td>
<td><?php echo $item->timezone;?></td>
<td><?php echo $item->language;?></td>
<td><?php echo $item->country_id;?></td>
<td><?php echo $item->state_id;?></td>
<td><?php echo $item->city_id;?></td>
<td><?php echo $item->address;?></td>
<td><?php echo $item->zip_code;?></td>
<td><?php echo $item->show_email;?></td>
<td><?php echo $item->show_phone;?></td>
<td><?php echo $item->show_location;?></td>
<td><?php echo $item->facebook_url;?></td>
<td><?php echo $item->twitter_url;?></td>
<td><?php echo $item->instagram_url;?></td>
<td><?php echo $item->pinterest_url;?></td>
<td><?php echo $item->linkedin_url;?></td>
<td><?php echo $item->vk_url;?></td>
<td><?php echo $item->youtube_url;?></td>
<td><?php echo $item->last_seen;?></td>
<td><?php echo $item->show_rss_feeds;?></td>
<td><?php echo $item->intivited_code;?></td>
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