<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title"><i data-feather="edit"></i> <?php echo lang("menu.create");?></h3>

<?php echo form_open();?>

<hr>
<div class="mb-3 row">
    <label for="textname" class="col-sm-2 col-form-label"><?php echo lang('menu.name');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textname" name="post[name]" value="<?php echo $item->name;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textparent" class="col-sm-2 col-form-label"><?php echo lang('menu.parent');?></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="textparent" name="post[parent]" value="<?php echo $item->parent;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textshort" class="col-sm-2 col-form-label"><?php echo lang('menu.short');?></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="textshort" name="post[short]" value="<?php echo $item->short;?>">
    </div>
</div>

<div class="mb-3 row">
    <label for="textmain_short" class="col-sm-2 col-form-label"><?php echo lang('menu.main_short');?></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="textmain_short" name="post[main_short]" value="<?php echo $item->main_short;?>">
    </div>
</div>

<div class="mb-3 row">
    <label for="textstatus" class="col-sm-2 col-form-label"><?php echo lang('menu.status');?></label>
    <div class="col-sm-10">
      
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="post[status]" value="1" <?php echo ($item->status == 1 ? "checked" : "");?>>
        <label class="form-check-label" for="flexSwitchCheckChecked">On/off</label>
      </div>
    </div>
</div>
<div class="mb-3 row">
    <label for="textlanguage" class="col-sm-2 col-form-label"><?php echo lang('menu.language');?></label>
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
    <label for="textrouter" class="col-sm-2 col-form-label"><?php echo lang('menu.router');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textrouter" name="post[router]" value="<?php echo $item->router;?>">
    </div>
</div>

<div class="mb-3 row">
    <label for="textdisplay" class="col-sm-2 col-form-label"><?php echo lang('menu.display');?></label>
    <div class="col-sm-10">
      <select type="text" class="form-control" id="textdisplay" name="post[display]">
          <option value="header" <?php echo $item->display == "header" ? "selected" : "";?>>Header</option>
          <option value="footer" <?php echo $item->display == "footer" ? "selected" : "";?>>Footer</option>
          <option value="left" <?php echo $item->display == "left" ? "selected" : "";?>>Left</option>
          <option value="right" <?php echo $item->display == "right" ? "selected" : "";?>>Right</option>
          <option value="member" <?php echo $item->display == "member" ? "selected" : "";?>>Member Panel</option>
      </select>
    </div>
</div>

<div class="mb-3 row">
    <label for="textstatus" class="col-sm-2 col-form-label"><?php echo lang('menu.oncepage');?></label>
    <div class="col-sm-10">
      
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="post[oncepage]" value="1" <?php echo ($item->oncepage == 1 ? "checked" : "");?>>
        <label class="form-check-label" for="flexSwitchCheckChecked">On/off</label>
      </div>
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
