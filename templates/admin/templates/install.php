<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
    <h1>Templates</h1>
    <div class="row">
        <div class="col-6">
            <img class="img-thumbnail" src="templates/themes/<?php echo $info->name;?>/thumb.jpg" style="width:100%;">
        </div>
        <div class="col-6">
            <h3>Install Template <?php echo $info->name;?></h3>

            <p><?php echo $info->description;?></p>
            <p>Version : <?php echo $info->version;?></p>
            <p>Author : <?php echo $info->author;?></p>
            <div>
            <a href="<?php echo $install_url;?>?validate=true&cleardata=true" class="btn btn-sm btn-primary">Install & Clear Data</a>
            <a href="<?php echo $install_url;?>?validate=true&cleardata=false" class="btn btn-sm btn-outline-primary">Install & No Data</a>
        </div>
        </div>
    </div>

<?php echo $this->endSection() ?>