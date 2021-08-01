<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h3 class="title"><i data-feather="edit"></i> <?php echo lang("users_wallet.create");?></h3>

<?php echo form_open();?>

<hr>

<div class="mb-3 row">
    <label for="textwallet_address" class="col-sm-2 col-form-label"><?php echo lang('users_wallet.wallet_address');?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="textwallet_address" name="post[wallet_address]" value="<?php echo $item->wallet_address;?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="textwallet_network" class="col-sm-2 col-form-label"><?php echo lang('users_wallet.wallet_network');?></label>
    <div class="col-sm-10">
      <select type="text" class="form-control" id="textwallet_network" name="post[wallet_network]">
          <option value="eth" <?php echo ($item->wallet_network == "eth" ? "selected" : "");?>>ETH Network</option>
          <option value="btc" <?php echo ($item->wallet_network == "btc" ? "selected" : "");?>>BTC Network</option>
          <option value="token" <?php echo ($item->wallet_network == "token" ? "selected" : "");?>><?php echo $tokenname;?> Network</option>
          <option value="paypal" <?php echo ($item->wallet_network == "paypal" ? "selected" : "");?>>Paypal Network</option>
      </select>
    </div>
</div>



<div class="form-group row border-top pt-3">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-10">
        <a href="/wallet" class="btn btn-md btn-primary"><i data-feather="arrow-left"></i> <?php echo lang("globals.back");?></a>
       <button type="submit" class="btn btn-md btn-primary"><i data-feather="save"></i> <?php echo lang("globals.save");?></button>
    </div>
</div>
<?php echo form_close();?>
<?php $this->endSection() ?>
