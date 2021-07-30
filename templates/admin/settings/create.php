<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>


<h3 class="title"><i data-feather="edit"></i> <?php echo lang("settings.create");?></h3>

<?php echo form_open();?>

<hr>
<div class="mb-3 row">
    <label for="textname" class="col-sm-2 col-form-label"><?php echo lang('settings.name');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textname" name="post[name]" value="<?php echo $item->name;?>">
    </div>
</div>

<?php if($item->type == "image"){ ?>

  <div class="mb-3 row">
    <label for="file<?php echo $item->name;?>" class="col-sm-2 col-form-label"><?php echo lang('settings.value');?></label>
    <div class="col-sm-2">
        <div id="preview<?php echo $item->name;?>" class="border" style="min-height: 80px;"><img src="<?php echo $item->value;?>" style="width: 100%;"/></div>
    </div>
    <div class="col-sm-8">
      
      <input type="file" class="form-control" id="file<?php echo $item->name;?>" name="file" value="<?php echo $item->value;?>">
      <input type="hidden" class="form-control" id="text<?php echo $item->name;?>" name="post[value]" value="<?php echo $item->value;?>">
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function() {
      $("#file<?php echo $item->name;?>").AjaxFileUpload({
        action: "/upload/images?name=<?php echo $item->name;?>&size=<?php echo $item->default_value;?>",
         
        onComplete: function(filename, response) {
          $("#text<?php echo $item->name;?>").val(response.url);
          $("#preview<?php echo $item->name;?> img").attr("src", response.url).attr("width", 200);
        }
      });
    });

  </script>

<?php }else if($item->type == "textarea"){?>
  <div class="mb-3 row">
    <label for="textvalue" class="col-sm-2 col-form-label"><?php echo lang('settings.value');?></label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="textvalue" name="post[value]"><?php echo $item->value;?></textarea>
    </div>
</div>
<?php }else { ?>
<div class="mb-3 row">
    <label for="textvalue" class="col-sm-2 col-form-label"><?php echo lang('settings.value');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textvalue" name="post[value]" value="<?php echo $item->value;?>">
    </div>
</div>
<?php } ?>

<div class="mb-3 row">
    <label for="textlanguage" class="col-sm-2 col-form-label"><?php echo lang('settings.language');?></label>
    <div class="col-sm-10">
      <select type="text" class="form-select" id="textlanguage" name="post[language]">
          <option value="">All</option>
          <?php foreach ($supportlangauge as $key => $value) { ?>
            <option value="<?php echo $key;?>" <?php echo ($item->language == $key ? "selected" : "");?>><?php echo $value;?></option>
          <?php } ?>
          
      </select>
    </div>
</div>
<div class="mb-3 row">
    <label for="textgroups" class="col-sm-2 col-form-label"><?php echo lang('settings.groups');?></label>
    <div class="col-sm-10">
      <select class="form-select" name="post[groups]">
            <?php 
            $variable = ['global','email','system','users','module','social','security'];
            foreach ($variable as $key => $value) { ?>
              <option value="<?php echo $value;?>" <?php echo ($item->groups == $value ? "selected" : "");?>><?php echo $value;?></option>
            <?php } ?>
        </select>

      
    </div>
</div>
<div class="mb-3 row">
    <label for="texttype" class="col-sm-2 col-form-label"><?php echo lang('settings.type');?></label>
    <div class="col-sm-10">
      
        <select class="form-select" name="post[type]">
            <?php 
            $variable = ['text','yesno','textarea','select','image'];
            foreach ($variable as $key => $value) { ?>
              <option value="<?php echo $value;?>" <?php echo ($item->type == $value ? "selected" : "");?>><?php echo $value;?></option>
            <?php } ?>
        </select>
      
    </div>
</div>
<div class="mb-3 row">
    <label for="textdefault_value" class="col-sm-2 col-form-label"><?php echo lang('settings.default_value');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textdefault_value" name="post[default_value]" value="<?php echo $item->default_value;?>">
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
