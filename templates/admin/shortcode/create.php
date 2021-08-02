<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title"><i data-feather="edit"></i> <?php echo lang("shortcode.create");?></h3>

<?php echo form_open();?>

<hr>
<div class="mb-3 row">
    <label for="textkeyword" class="col-sm-2 col-form-label"><?php echo lang('shortcode.keyword');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textkeyword" name="post[keyword]" value="<?php echo $item->keyword;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textreplace_data" class="col-sm-2 col-form-label"><?php echo lang('shortcode.replace_data');?></label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="textreplace_data" name="post[replace_data]"><?php echo $item->replace_data;?></textarea>
    </div>
</div>
<?php echo editer('textreplace_data');?>
<div class="mb-3 row">
    <label for="textformat" class="col-sm-2 col-form-label"><?php echo lang('shortcode.format');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textformat" name="post[format]" value="<?php echo $item->format;?>">
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
