<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>
    <h1 class="border-bottom d-flex justify-content-between">
        <div>Auto Build Layout</div>
        <div>
            <a href="/admin/build" class="btn btn-primary">Module</a>
            <a href="/admin/build/layout" class="btn btn-primary">Layout</a>
            <a href="/admin/build/system" class="btn btn-primary">System</a>
        </div>
    </h1>
    <div class="row">
        
           
        <div class="col-6 pb-3">

            <select class="form-select" onchange="window.location='/admin/build/layout?preview='+this.value">
                <?php foreach ($image as $key => $value) { ?>
                    <option value="<?php echo $value;?>" <?php echo $value == $_GET["preview"] ? "selected" : "";?>><?php echo basename($value);?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-6 pb-3 text-end">
            <a href="/admin/build/layout?make=<?php echo basename($_GET["preview"]);?>" class="btn btn-primary">Make</a>
        </div>
    </div>
    <iframe src="<?php echo $_GET["preview"];?>" style="width: 100%; height: 1040px;"></iframe>

   
<?php $this->endSection() ?>