<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>
    <h1>Templates</h1>
    <div class="row">
   <?php
        
        foreach ($app as $key => $value) { ?>
            <div class="col-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo $value->thumb;?>">
                        <?php echo ucfirst($value->name);?>
                    </div>
                    <div class="card-footer">
                        <a href="/admin/templates/download/<?php echo $value->name;?>" class="btn btn-sm btn-primary">Download & Install</a>
                    </div>
                </div>
            </div>
        <?php }
   ?>
   </div>



   <h1>Templates Local</h1>
    <div class="row">
   <?php

        foreach ($local as $key => $value) { ?>
            <div class="col-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <img src="templates/themes/<?php echo $value;?>/thumb.jpg" style="width: 100%;">
                        <?php echo $value;?>
                    </div>
                    <div class="border-top pt-3">
                        <a href="/admin/templates/install/<?php echo $value;?>" class="btn btn-sm btn-primary">Install</a>
                    </div>
                </div>
            </div>
        <?php }
   ?>
   </div>

<?php $this->endSection() ?>