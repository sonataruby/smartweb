<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title"><i data-feather="edit"></i> <?php echo lang("document.create");?></h3>

<?php echo form_open();?>

<hr>

<div class="mb-3 row">
    <label for="texttitle" class="col-sm-2 col-form-label"><?php echo lang('document.title');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="texttitle" name="post[title]" value="<?php echo $item->title;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="fileimage" class="col-sm-2 col-form-label"><?php echo lang('document.image');?></label>
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
    <label for="textcontents_highlight" class="col-sm-2 col-form-label"><?php echo lang('document.contents_highlight');?></label>
    <div class="col-sm-10">
      <textarea type="text" style="min-height:350px;"  class="form-control" id="textcontents_highlight" name="post[contents_highlight]"><?php echo $item->contents_highlight;?></textarea>
    </div>
</div>
<?php echo editer('textcontents_highlight');?>
<div class="mb-3 row">
    <label for="textcontents" class="col-sm-2 col-form-label"><?php echo lang('document.contents');?></label>
    <div class="col-sm-10">
      <textarea type="text" style="min-height:350px;" class="form-control" id="textcontents" name="post[contents]"><?php echo $item->contents;?></textarea>
    </div>
</div>
<?php echo editer('textcontents');?>
<div class="mb-3 row">
    <label for="texttags" class="col-sm-2 col-form-label"><?php echo lang('document.tags');?></label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="texttags" name="post[tags]"><?php echo $item->tags;?></textarea>
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
<?php $this->endSection() ?>
