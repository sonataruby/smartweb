<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title"><i data-feather="edit"></i> <?php echo lang("users_wallet.create");?></h3>

<?php echo form_open();?>

<hr>
<div class="mb-3 row">
    <label for="textuser_id" class="col-sm-2 col-form-label"><?php echo lang('users_wallet.user_id');?></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="textuser_id" name="post[user_id]" value="<?php echo $item->user_id;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textwallet_address" class="col-sm-2 col-form-label"><?php echo lang('users_wallet.wallet_address');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textwallet_address" name="post[wallet_address]" value="<?php echo $item->wallet_address;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textwallet_network" class="col-sm-2 col-form-label"><?php echo lang('users_wallet.wallet_network');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textwallet_network" name="post[wallet_network]" value="<?php echo $item->wallet_network;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textcreated_at" class="col-sm-2 col-form-label"><?php echo lang('users_wallet.created_at');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textcreated_at" name="post[created_at]" value="<?php echo $item->created_at;?>">
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
