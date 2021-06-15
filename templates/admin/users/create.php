<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>


<h3 class="title"><i data-feather="edit"></i> <?php echo lang("users.create");?></h3>

<?php echo form_open();?>

<hr>
<div class="mb-3 row">
    <label for="textusername" class="col-sm-2 col-form-label"><?php echo lang('users.username');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textusername" name="post[username]" value="<?php echo $item->username;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textslug" class="col-sm-2 col-form-label"><?php echo lang('users.slug');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textslug" name="post[slug]" value="<?php echo $item->slug;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textemail" class="col-sm-2 col-form-label"><?php echo lang('users.email');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textemail" name="post[email]" value="<?php echo $item->email;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textemail_status" class="col-sm-2 col-form-label"><?php echo lang('users.email_status');?></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="textemail_status" name="post[email_status]" value="<?php echo $item->email_status;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="texttoken" class="col-sm-2 col-form-label"><?php echo lang('users.token');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="texttoken" name="post[token]" value="<?php echo $item->token;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textpassword" class="col-sm-2 col-form-label"><?php echo lang('users.password');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textpassword" name="post[password]" value="<?php echo $item->password;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textrole" class="col-sm-2 col-form-label"><?php echo lang('users.role');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textrole" name="post[role]" value="<?php echo $item->role;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textuser_type" class="col-sm-2 col-form-label"><?php echo lang('users.user_type');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textuser_type" name="post[user_type]" value="<?php echo $item->user_type;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textfirstname" class="col-sm-2 col-form-label"><?php echo lang('users.firstname');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textfirstname" name="post[firstname]" value="<?php echo $item->firstname;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textlastname" class="col-sm-2 col-form-label"><?php echo lang('users.lastname');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textlastname" name="post[lastname]" value="<?php echo $item->lastname;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textmidname" class="col-sm-2 col-form-label"><?php echo lang('users.midname');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textmidname" name="post[midname]" value="<?php echo $item->midname;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textfacebook_id" class="col-sm-2 col-form-label"><?php echo lang('users.facebook_id');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textfacebook_id" name="post[facebook_id]" value="<?php echo $item->facebook_id;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textgoogle_id" class="col-sm-2 col-form-label"><?php echo lang('users.google_id');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textgoogle_id" name="post[google_id]" value="<?php echo $item->google_id;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="fileavatar" class="col-sm-2 col-form-label"><?php echo lang('users.avatar');?></label>
    <div class="col-sm-2">
        <div id="previewavatar" class="border" style="min-height: 80px;"><img src="<?php echo $item->avatar;?>" style="width: 100%;"/></div>
    </div>
    <div class="col-sm-8">
      
      <input type="file" class="form-control" id="fileavatar" name="file" value="<?php echo $item->avatar;?>">
      <input type="hidden" class="form-control" id="textavatar" name="post[avatar]" value="<?php echo $item->avatar;?>">
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function() {
      $("#fileavatar").AjaxFileUpload({
        action: "/upload/images?name=avatar",
         
        onComplete: function(filename, response) {
          $("#textavatar").val(response.url);
          $("#previewavatar img").attr("src", response.url).attr("width", 200);
        }
      });
    });

  </script>
<div class="mb-3 row">
    <label for="filebanner_img" class="col-sm-2 col-form-label"><?php echo lang('users.banner_img');?></label>
    <div class="col-sm-2">
        <div id="previewbanner_img" class="border" style="min-height: 80px;"><img src="<?php echo $item->banner_img;?>" style="width: 100%;"/></div>
    </div>
    <div class="col-sm-8">
      
      <input type="file" class="form-control" id="filebanner_img" name="file" value="<?php echo $item->banner_img;?>">
      <input type="hidden" class="form-control" id="textbanner_img" name="post[banner_img]" value="<?php echo $item->banner_img;?>">
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function() {
      $("#filebanner_img").AjaxFileUpload({
        action: "/upload/images?name=banner_img",
         
        onComplete: function(filename, response) {
          $("#textbanner_img").val(response.url);
          $("#previewbanner_img img").attr("src", response.url).attr("width", 200);
        }
      });
    });

  </script>
<div class="mb-3 row">
    <label for="textbanned" class="col-sm-2 col-form-label"><?php echo lang('users.banned');?></label>
    <div class="col-sm-10">
      
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="post[banned]" value="1" <?php echo ($item->banned == 1 ? "checked" : "");?>>
        <label class="form-check-label" for="flexSwitchCheckChecked">On/off</label>
      </div>
    </div>
</div>
<div class="mb-3 row">
    <label for="textphone_number" class="col-sm-2 col-form-label"><?php echo lang('users.phone_number');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textphone_number" name="post[phone_number]" value="<?php echo $item->phone_number;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textcountry_id" class="col-sm-2 col-form-label"><?php echo lang('users.country_id');?></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="textcountry_id" name="post[country_id]" value="<?php echo $item->country_id;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textstate_id" class="col-sm-2 col-form-label"><?php echo lang('users.state_id');?></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="textstate_id" name="post[state_id]" value="<?php echo $item->state_id;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textcity_id" class="col-sm-2 col-form-label"><?php echo lang('users.city_id');?></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="textcity_id" name="post[city_id]" value="<?php echo $item->city_id;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textaddress" class="col-sm-2 col-form-label"><?php echo lang('users.address');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textaddress" name="post[address]" value="<?php echo $item->address;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textzip_code" class="col-sm-2 col-form-label"><?php echo lang('users.zip_code');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textzip_code" name="post[zip_code]" value="<?php echo $item->zip_code;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textshow_email" class="col-sm-2 col-form-label"><?php echo lang('users.show_email');?></label>
    <div class="col-sm-10">
      
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="post[show_email]" value="1" <?php echo ($item->show_email == 1 ? "checked" : "");?>>
        <label class="form-check-label" for="flexSwitchCheckChecked">On/off</label>
      </div>
    </div>
</div>
<div class="mb-3 row">
    <label for="textshow_phone" class="col-sm-2 col-form-label"><?php echo lang('users.show_phone');?></label>
    <div class="col-sm-10">
      
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="post[show_phone]" value="1" <?php echo ($item->show_phone == 1 ? "checked" : "");?>>
        <label class="form-check-label" for="flexSwitchCheckChecked">On/off</label>
      </div>
    </div>
</div>
<div class="mb-3 row">
    <label for="textshow_location" class="col-sm-2 col-form-label"><?php echo lang('users.show_location');?></label>
    <div class="col-sm-10">
      
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="post[show_location]" value="1" <?php echo ($item->show_location == 1 ? "checked" : "");?>>
        <label class="form-check-label" for="flexSwitchCheckChecked">On/off</label>
      </div>
    </div>
</div>
<div class="mb-3 row">
    <label for="textfacebook_url" class="col-sm-2 col-form-label"><?php echo lang('users.facebook_url');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textfacebook_url" name="post[facebook_url]" value="<?php echo $item->facebook_url;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="texttwitter_url" class="col-sm-2 col-form-label"><?php echo lang('users.twitter_url');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="texttwitter_url" name="post[twitter_url]" value="<?php echo $item->twitter_url;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textinstagram_url" class="col-sm-2 col-form-label"><?php echo lang('users.instagram_url');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textinstagram_url" name="post[instagram_url]" value="<?php echo $item->instagram_url;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textpinterest_url" class="col-sm-2 col-form-label"><?php echo lang('users.pinterest_url');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textpinterest_url" name="post[pinterest_url]" value="<?php echo $item->pinterest_url;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textlinkedin_url" class="col-sm-2 col-form-label"><?php echo lang('users.linkedin_url');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textlinkedin_url" name="post[linkedin_url]" value="<?php echo $item->linkedin_url;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textvk_url" class="col-sm-2 col-form-label"><?php echo lang('users.vk_url');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textvk_url" name="post[vk_url]" value="<?php echo $item->vk_url;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textyoutube_url" class="col-sm-2 col-form-label"><?php echo lang('users.youtube_url');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textyoutube_url" name="post[youtube_url]" value="<?php echo $item->youtube_url;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textlast_seen" class="col-sm-2 col-form-label"><?php echo lang('users.last_seen');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textlast_seen" name="post[last_seen]" value="<?php echo $item->last_seen;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textshow_rss_feeds" class="col-sm-2 col-form-label"><?php echo lang('users.show_rss_feeds');?></label>
    <div class="col-sm-10">
      
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="post[show_rss_feeds]" value="1" <?php echo ($item->show_rss_feeds == 1 ? "checked" : "");?>>
        <label class="form-check-label" for="flexSwitchCheckChecked">On/off</label>
      </div>
    </div>
</div>
<div class="mb-3 row">
    <label for="textintivited_code" class="col-sm-2 col-form-label"><?php echo lang('users.intivited_code');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textintivited_code" name="post[intivited_code]" value="<?php echo $item->intivited_code;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textcreated_at" class="col-sm-2 col-form-label"><?php echo lang('users.created_at');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textcreated_at" name="post[created_at]" value="<?php echo $item->created_at;?>">
    </div>
</div>
<div class="form-group row border-top pt-3">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-10">
        <a href="<?php echo $link;?>" class="btn btn-md btn-outline-primary"><i data-feather="arrow-left"></i> <?php echo lang("globals.back");?></a>
       <button type="submit" class="btn btn-md btn-primary"><i data-feather="save"></i> <?php echo lang("globals.save");?></button>
    </div>
</div>
<?php echo form_close();?>
<?php echo $this->endSection() ?>
