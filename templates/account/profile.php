<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
	<?php echo form_open("profile/update");?>
	<h3>Profile</h3>

	<div class="mb-3 row">
	    <label class="col-sm-2 col-form-label">First Name</label>
	    <div class="col-sm-5">
	      <input type="text" class="form-control" name="post[firstname]"  value="<?php echo $profile->firstname;?>">
	    </div>

	    <div class="col-sm-5">
	      <input type="text" class="form-control" name="post[lastname]"  value="<?php echo $profile->lastname;?>">
	    </div>

	</div>

	<div class="mb-3 row">
    <label for="fileavatar" class="col-sm-2 col-form-label"><?php echo lang('users.avatar');?></label>
    <div class="col-sm-2">
        <div id="previewavatar" class="border" style="min-height: 80px;"><img src="<?php echo $profile->avatar;?>" style="width: 100%;"/></div>
    </div>
    <div class="col-sm-8">
      
      <input type="file" class="form-control" id="fileavatar" name="file" value="<?php echo $profile->avatar;?>">
      <input type="hidden" class="form-control" id="textavatar" name="post[avatar]" value="<?php echo $profile->avatar;?>">
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function() {
      $("#fileavatar").AjaxFileUpload({
        action: "/upload/member?name=avatar&size=100x100",
         
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
        <div id="previewbanner_img" class="border" style="min-height: 80px;"><img src="<?php echo $profile->banner_img;?>" style="width: 100%;"/></div>
    </div>
    <div class="col-sm-8">
      
      <input type="file" class="form-control" id="filebanner_img" name="file" value="<?php echo $profile->banner_img;?>">
      <input type="hidden" class="form-control" id="textbanner_img" name="post[banner_img]" value="<?php echo $profile->banner_img;?>">
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function() {
      $("#filebanner_img").AjaxFileUpload({
        action: "/upload/member?name=banner&size=1920x1080",
         
        onComplete: function(filename, response) {
          $("#textbanner_img").val(response.url);
          $("#previewbanner_img img").attr("src", response.url).attr("width", 200);
        }
      });
    });

  </script>


	

	

	<div class="mb-3 row">
	    <label class="col-sm-2 col-form-label">Phone Number</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="post[phone_number]"  value="<?php echo $profile->phone_number;?>">
	    </div>
	</div>

	<div class="mb-3 row">
	    <label class="col-sm-2 col-form-label">Address</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="post[address]"  value="<?php echo $profile->address;?>">
	    </div>
	</div>


	<div class="mb-3 row">
	    <label class="col-sm-2 col-form-label">Country</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="post[country_id]"  value="<?php echo $profile->country_id;?>">
	    </div>
	</div>


	<div class="mb-3 row">
	    <label class="col-sm-2 col-form-label">City</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="post[city_id]"  value="<?php echo $profile->city_id;?>">
	    </div>
	</div>


	<div class="mb-3 row">
	    <label class="col-sm-2 col-form-label">Zip Code</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="post[zip_code]"  value="<?php echo $profile->zip_code;?>">
	    </div>
	</div>

	<div class="mb-3 row">
	    <label class="col-sm-2 col-form-label"></label>
	    <div class="col-sm-10">
	      <button type="text" class="btn btn-sm btn-primary">Update Profile</button>
	    </div>
	</div>
	<?php echo form_close();?>
	<h3>Change Password</h3>
	<?php echo form_open("profile/changepass");?>
	<div class="mb-3 row">
	    <label class="col-sm-2 col-form-label">New Password</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" name="password">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label class="col-sm-2 col-form-label">Re-Password</label>
	    <div class="col-sm-10">
	      <input type="password" class="form-control" name="repassword">
	    </div>
	</div>

	<div class="mb-3 row">
	    <label class="col-sm-2 col-form-label"></label>
	    <div class="col-sm-10">
	      <button type="text" class="btn btn-sm btn-primary">Update Password</button>
	    </div>
	</div>
	<?php echo form_close();?>
<?php echo $this->endSection() ?>