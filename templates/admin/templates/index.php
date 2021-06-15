<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
    <h1>Templates</h1>
    <div class="row">
   <?php
        foreach ($app as $key => $value) { ?>
            <div class="col-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <?php echo $value;?>
                    </div>
                    <div class="card-footer">
                        <a href="/admin/templates/install/<?php echo $value;?>" class="btn btn-sm btn-primary">Install</a>
                    </div>
                </div>
            </div>
        <?php }
   ?>
   </div>
<?php echo $this->endSection() ?>