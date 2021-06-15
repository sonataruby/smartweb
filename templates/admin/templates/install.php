<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
    <h1>Templates</h1>
    <div class="row">
        <div class="col-6">
            <img src="http://demo.joomlabuff.com/assurance/images/joomlabuff/hero-4.jpg" style="width:100%;">
        </div>
        <div class="col-6">
            <h3>Install Template Confirm</h3>
            <p>All Template form smart blockchain database</p>
            <a href="<?php echo $install_url;?>?cleardata=true" class="btn btn-xxl btn-primary">Install & Clear Data</a>
            <a href="<?php echo $install_url;?>?cleardata=false" class="btn btn-xxl btn-outline-primary">Install & No Data</a>
        </div>
    </div>

<?php echo $this->endSection() ?>