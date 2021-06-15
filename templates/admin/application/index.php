<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
    <h1>App</h1>
    <div class="row">
   <?php
        foreach ($app as $key => $value) { ?>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <?php echo $value["name"];?>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo $value["urladmin"];?>" class="btn btn-sm btn-primary">Admin</a>
                        <a class="btn btn-sm btn-primary">Install</a>
                    </div>
                </div>
            </div>
        <?php }
   ?>
   </div>
<?php echo $this->endSection() ?>