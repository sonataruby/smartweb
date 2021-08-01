<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title"><i data-feather="edit"></i> <?php echo lang("windget.create");?></h3>

<?php echo form_open();?>

<hr>
<div class="mb-3 row">
    <label for="textkeyword" class="col-sm-2 col-form-label"><?php echo lang('windget.keyword');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textkeyword" name="post[keyword]" value="<?php echo $item->keyword;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textdisplay" class="col-sm-2 col-form-label"><?php echo lang('windget.display');?></label>
    <div class="col-sm-10">
      
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="post[display]" value="1" <?php echo ($item->display == 1 ? "checked" : "");?>>
        <label class="form-check-label" for="flexSwitchCheckChecked">On/off</label>
      </div>
    </div>
</div>
<div class="mb-3 row">
    <label for="textshort" class="col-sm-2 col-form-label"><?php echo lang('windget.short');?></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="textshort" name="post[short]" value="<?php echo $item->short;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textname" class="col-sm-2 col-form-label"><?php echo lang('windget.name');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textname" name="post[name]" value="<?php echo $item->name;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textlanguage" class="col-sm-2 col-form-label"><?php echo lang('windget.language');?></label>
    <div class="col-sm-10">
      <select type="text" class="form-select" id="textlanguage" name="post[language]">
          <option value="<?php echo session()->get("lang");?>">Default</option>
          <?php foreach ($supportlangauge as $key => $value) { ?>
            <option value="<?php echo $key;?>" <?php echo ($item->language == $key ? "selected" : "");?>><?php echo $value;?></option>
          <?php } ?>
          
      </select>
    </div>
</div>
<div class="mb-3 row">
    <label for="textformat" class="col-sm-2 col-form-label"><?php echo lang('windget.format');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textformat" name="post[format]" value="<?php echo $item->format;?>">
    </div>
</div>

<h3><?php echo lang('windget.contents');?></h3>
<div class="mb-3 row">
    
    <div class="col-sm-12">
      <textarea type="text" class="form-control" id="textcontents" name="post[contents]"><?php echo $item->contents;?></textarea>
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



<style type="text/css">
    #textcontents{
        height: 650px;
    }
</style>

<?php editer("textcontents");?>
<?php echo form_close();?>
<?php $this->endSection() ?>
