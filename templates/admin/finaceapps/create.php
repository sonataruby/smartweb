<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>


<h3 class="title"><i data-feather="edit"></i> <?php echo lang("finaceapps.create");?></h3>

<?php echo form_open();?>

<hr>
<div class="mb-3 row">
    <label for="textname" class="col-sm-2 col-form-label"><?php echo lang('finaceapps.name');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textname" name="post[name]" value="<?php echo $item->name;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="fileimage" class="col-sm-2 col-form-label"><?php echo lang('finaceapps.image');?></label>
    <div class="col-sm-2">
        <div id="previewimage" class="border" style="min-height: 80px;"><img src="<?php echo $item->image;?>" style="width: 100%;"/></div>
    </div>
    <div class="col-sm-8">
      
      <input type="file" class="form-control" id="fileimage" name="file" value="<?php echo $item->image;?>">
      <input type="hidden" class="form-control" id="textimage" name="post[image]" value="<?php echo $item->image;?>">
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function() {
      $("#fileimage").AjaxFileUpload({
        action: "/upload/images<?php echo ($item->image ? "?name=".basename($item->image) : "");?>",
         
        onComplete: function(filename, response) {
          $("#textimage").val(response.url);
          $("#previewimage img").attr("src", response.url).attr("width", 200);
        }
      });
    });

  </script>
<div class="mb-3 row">
    <label for="textdescription" class="col-sm-2 col-form-label"><?php echo lang('finaceapps.description');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textdescription" name="post[description]" value="<?php echo $item->description;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textlink" class="col-sm-2 col-form-label"><?php echo lang('finaceapps.link');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textlink" name="post[link]" value="<?php echo $item->link;?>">
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
