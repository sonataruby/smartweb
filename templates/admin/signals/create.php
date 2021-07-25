<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>


<h3 class="title"><i data-feather="edit"></i> <?php echo lang("signals.create");?></h3>

<?php echo form_open();?>

<hr>

<div class="mb-3 row">
    <label for="textsymbol" class="col-sm-2 col-form-label"><?php echo lang('signals.symbol');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textsymbol" name="post[symbol]" value="<?php echo $item->symbol;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="texttype" class="col-sm-2 col-form-label"><?php echo lang('signals.type');?></label>
    <div class="col-sm-10">
        <div class="form-check-inline">
          <input type="radio" class="radio-control" id="inlineCheckbox1" name="post[type]" value="SELL" <?php echo ($item->type == "SELL" ? "checked" : "");?>>
          <label class="form-check-label" for="inlineCheckbox1">SELL</label>
        </div>

        <div class="form-check-inline">
          <input type="radio" class="radio-control" id="inlineCheckbox2" name="post[type]" value="BUY" <?php echo ($item->type == "BUY" ? "checked" : "");?>>
          <label class="form-check-label" for="inlineCheckbox2">BUY</label>
        </div>

        
    </div>
</div>
<div class="mb-3 row">
    <label for="textopen" class="col-sm-2 col-form-label"><?php echo lang('signals.open');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textopen" name="post[open]" value="<?php echo $item->open;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textsl" class="col-sm-2 col-form-label"><?php echo lang('signals.sl');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textsl" name="post[sl]" value="<?php echo $item->sl;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="texttp1" class="col-sm-2 col-form-label"><?php echo lang('signals.tp');?></label>
    <div class="col-sm-10">
      <div class="row">
          <div class="col-4">
              <input type="text" class="form-control" id="texttp1" name="post[tp1]" value="<?php echo $item->tp1;?>">
          </div>
          <div class="col-4">
              <input type="text" class="form-control" id="texttp2" name="post[tp2]" value="<?php echo $item->tp2;?>">
          </div>
          <div class="col-4">
              <input type="text" class="form-control" id="texttp3" name="post[tp3]" value="<?php echo $item->tp3;?>">
          </div>
      </div>
      
    </div>
</div>

<div class="mb-3 row">
    <label for="textstatus" class="col-sm-2 col-form-label"><?php echo lang('signals.status');?></label>
    <div class="col-sm-10">
      
      <select class="form-select" name="post[status]">
        <option value = "">Select Option</option>
        <option value="active" <?php echo ($item->status == "active" ? "selected" : "");?>>Active</option><option value="pending" <?php echo ($item->status == "pending" ? "selected" : "");?>>Pendding</option><option value="cancel" <?php echo ($item->status == "cancel" ? "selected" : "");?>>Cancel</option><option value="remove" <?php echo ($item->status == "remove" ? "selected" : "");?>>Remove</option>
      </select>
    </div>
</div>
<div class="mb-3 row">
    <label for="textactive" class="col-sm-2 col-form-label"><?php echo lang('signals.active');?></label>
    <div class="col-sm-10">
      
      <select class="form-select" name="post[active]">
        <option value = "">Select Option</option>
        <option value="active" <?php echo ($item->active == "active" ? "selected" : "");?>>Active</option><option value="pending" <?php echo ($item->active == "pending" ? "selected" : "");?>>Pendding</option>
      </select>
    </div>
</div>

<div class="mb-3 row">
    <label for="textis_free" class="col-sm-2 col-form-label"><?php echo lang('signals.is_free');?></label>
    <div class="col-sm-10">
      
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="post[is_free]" value="yes" <?php echo ($item->is_free == "yes" ? "checked" : "");?>>
        <label class="form-check-label" for="flexSwitchCheckChecked">Yes/No</label>
      </div>
    </div>
</div>

<div class="mb-3 row">
    <label for="textopendate" class="col-sm-2 col-form-label"><?php echo lang('signals.opendate');?></label>
    <div class="col-sm-10">
      
      <div class="input-append date" id="datetimeopendate" data-date="<?php echo $item->opendate;?>" data-date-format="yyyy-mm-dd">
        <input size="16" type="text" class="form-control" id="textopendate" name="post[opendate]" value="<?php echo $item->opendate;?>">  <span class="add-on"><i class="icon-th"></i></span>
      </div>
    </div>
</div>
<script type="text/javascript">
  $('#datetimeopendate').datepicker({todayBtn : true});

</script>

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
