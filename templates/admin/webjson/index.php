<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
<?php 
    $obj = json_decode(file_get_contents(FCPATH."data/".($_GET["language"] ? $_GET["language"] : "en")."_app.json"));

?>
<br>
<form method="post" action="">
    <select class="form-select" onchange="window.location.href='admin/webjson?language='+this.value">
        <option value="en" <?php echo ($_GET['language'] == "en" ? "selected" : "");?>>Language</option>
        <option value="en" <?php echo ($_GET['language'] == "en" ? "selected" : "");?>>EN</option>
        <option value="fr" <?php echo ($_GET['language'] == "fr" ? "selected" : "");?>>FR</option>
        <option value="ch" <?php echo ($_GET['language'] == "ch" ? "selected" : "");?>>CH</option>
    </select> 
    <hr>
<h1 class="d-flex justify-content-between">Setup Global <button class="btn btn-sm btn-info" type="submit">Submit Save</button></h1>
<div class="mb-3 row">
    <label for="inputtitle" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputtitle" name="data[title]" value="<?php echo htmlentities($obj->title);?>">
    </div>
</div>
<div class="mb-3 row">
    <label for="inputdescription" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="inputtitle" name="data[description]"><?php echo htmlentities($obj->description);?></textarea>
    </div>
</div>

<div class="mb-3 row">
    <label for="inputkeyword" class="col-sm-2 col-form-label">Keyword</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="inputtitle" name="data[keyword]"><?php echo htmlentities($obj->keyword);?></textarea>
    </div>
</div>

<div class="mb-3 row">
    <label for="inputwitter" class="col-sm-2 col-form-label">Twitter</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputwitter" name="data[twitter]" value="<?php echo htmlentities($obj->twitter);?>">
    </div>
</div>

<div class="mb-3 row">
    <label for="inputwitter" class="col-sm-2 col-form-label">Banner</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="inputwitter">
      <input type="hidden" class="form-control" id="inputwitter" name="data[banner]" value="<?php echo htmlentities($obj->banner);?>">
    </div>
</div>



<h1 class="d-flex justify-content-between">Header <button class="btn btn-sm btn-info" type="submit">Submit Save</button></h1>
<?php foreach($obj->header as $key => $value){ ?>
<div class="mb-3 row">
    <label for="input<?php echo $key;?>" class="col-sm-2 col-form-label"><?php echo $key;?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input<?php echo $key;?>" name="data[header][<?php echo $key;?>]" value="<?php echo htmlentities($value);?>">
    </div>
</div>
<?php } ?>

<h1 class="d-flex justify-content-between">Footer<button class="btn btn-sm btn-info" type="submit">Submit Save</button></h1>
<?php foreach($obj->footer as $key => $value){ ?>
<div class="mb-3 row">
    <label for="input<?php echo $key;?>" class="col-sm-2 col-form-label"><?php echo $key;?></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input<?php echo $key;?>" name="data[footer][<?php echo $key;?>]" value="<?php echo htmlentities($value);?>">
    </div>
</div>
<?php } ?>

<h1 class="d-flex justify-content-between">Main<button class="btn btn-sm btn-info" type="submit">Submit Save</button></h1>
<?php foreach($obj->main as $key => $value){ ?>
<div class="mb-3 row">
    <label for="input<?php echo $key;?>" class="col-sm-2 col-form-label"><?php echo $key;?></label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="input<?php echo $key;?>" name="data[main][<?php echo $key;?>]"><?php echo htmlentities($value);?></textarea>
    </div>
</div>
<?php } ?>

<h1 class="d-flex justify-content-between">Images<button class="btn btn-sm btn-info" type="submit">Submit Save</button></h1>
<div class="row">
<?php foreach($obj->images as $key => $value){ ?>

<div class="col-sm-3 mb-3">
    
    <div>
      <img src="<?php echo $value;?>" style="max-width: 100%;">
      <input type="hidden" class="form-control" id="inputwitter" name="data[images][]" value="<?php echo $value;?>">
    </div>
</div>
<?php } ?>
</div>
</form>

<?php echo $this->endSection() ?>