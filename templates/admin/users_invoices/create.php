<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title"><i data-feather="edit"></i> <?php echo lang("users_invoices.create");?></h3>

<?php echo form_open();?>

<hr>
<div class="mb-3 row">
    <label for="textuser_id" class="col-sm-2 col-form-label"><?php echo lang('users_invoices.user_id');?></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="textuser_id" name="post[user_id]" value="<?php echo $item->user_id;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textinvoice_id" class="col-sm-2 col-form-label"><?php echo lang('users_invoices.invoice_id');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textinvoice_id" name="post[invoice_id]" value="<?php echo $item->invoice_id;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textpayment_id" class="col-sm-2 col-form-label"><?php echo lang('users_invoices.payment_id');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textpayment_id" name="post[payment_id]" value="<?php echo $item->payment_id;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="texttype" class="col-sm-2 col-form-label"><?php echo lang('users_invoices.type');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="texttype" name="post[type]" value="<?php echo $item->type;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textstatus" class="col-sm-2 col-form-label"><?php echo lang('users_invoices.status');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textstatus" name="post[status]" value="<?php echo $item->status;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textamount" class="col-sm-2 col-form-label"><?php echo lang('users_invoices.amount');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textamount" name="post[amount]" value="<?php echo $item->amount;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textitems" class="col-sm-2 col-form-label"><?php echo lang('users_invoices.items');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textitems" name="post[items]" value="<?php echo $item->items;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textcreated_at" class="col-sm-2 col-form-label"><?php echo lang('users_invoices.created_at');?></label>
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
    <label for="textupdated_at" class="col-sm-2 col-form-label"><?php echo lang('users_invoices.updated_at');?></label>
    <div class="col-sm-10">
      
      <div class="input-append date" id="datetimeupdated_at" data-date="<?php echo $item->updated_at;?>" data-date-format="yyyy-mm-dd">
        <input size="16" type="text" class="form-control" id="textupdated_at" name="post[updated_at]" value="<?php echo $item->updated_at;?>">  <span class="add-on"><i class="icon-th"></i></span>
      </div>
    </div>
</div>
<script type="text/javascript">
  $('#datetimeupdated_at').datepicker({todayBtn : true});

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
