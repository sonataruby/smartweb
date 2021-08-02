<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title"><i data-feather="edit"></i> <?php echo lang("signals_access.create");?></h3>

<?php echo form_open();?>

<hr>
<div class="mb-3 row">
    <label for="textaccount_id" class="col-sm-2 col-form-label"><?php echo lang('signals_access.account_id');?></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="textaccount_id" name="post[account_id]" value="<?php echo $item->account_id;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textsymbol" class="col-sm-2 col-form-label"><?php echo lang('signals_access.symbol');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textsymbol" name="post[symbol]" value="<?php echo $item->symbol;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textstatus" class="col-sm-2 col-form-label"><?php echo lang('signals_access.status');?></label>
    <div class="col-sm-10">
      
      <select class="form-select" name="post[status]">
        <option value = "">Select Option</option>
        <option value="active" <?php echo ($item->status == "active" ? "selected" : "");?>>Active</option><option value="disable" <?php echo ($item->status == "disable" ? "selected" : "");?>>Disable</option>
      </select>
    </div>
</div>
<div class="mb-3 row">
    <label for="textcreated_at" class="col-sm-2 col-form-label"><?php echo lang('signals_access.created_at');?></label>
    <div class="col-sm-10">
      
      <div class="input-append date" id="datetimecreated_at" data-date="<?php echo $item->created_at;?>" data-date-format="yyyy-mm-dd">
        <input size="16" type="text" class="form-control" id="textcreated_at" name="post[created_at]" value="<?php echo $item->created_at;?>">  <span class="add-on"><i class="icon-th"></i></span>
      </div>
    </div>
</div>
<script type="text/javascript">
  $('#datetimecreated_at').datepicker({todayBtn : true});

</script>
<div class="mb-3 row">
    <label for="textstarttime" class="col-sm-2 col-form-label"><?php echo lang('signals_access.starttime');?></label>
    <div class="col-sm-10">
      
      <div class="input-append date" id="datetimestarttime" data-date="<?php echo $item->starttime;?>" data-date-format="yyyy-mm-dd">
        <input size="16" type="text" class="form-control" id="textstarttime" name="post[starttime]" value="<?php echo $item->starttime;?>">  <span class="add-on"><i class="icon-th"></i></span>
      </div>
    </div>
</div>
<script type="text/javascript">
  $('#datetimestarttime').datepicker({todayBtn : true});

</script>
<div class="mb-3 row">
    <label for="textendtime" class="col-sm-2 col-form-label"><?php echo lang('signals_access.endtime');?></label>
    <div class="col-sm-10">
      
      <div class="input-append date" id="datetimeendtime" data-date="<?php echo $item->endtime;?>" data-date-format="yyyy-mm-dd">
        <input size="16" type="text" class="form-control" id="textendtime" name="post[endtime]" value="<?php echo $item->endtime;?>">  <span class="add-on"><i class="icon-th"></i></span>
      </div>
    </div>
</div>
<script type="text/javascript">
  $('#datetimeendtime').datepicker({todayBtn : true});

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
<?php $this->endSection() ?>
