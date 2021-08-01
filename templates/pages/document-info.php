<?php echo $this->extend($layout); ?>

<?php  $this->section('bodyNav') ?>
        <ul class="list-group list-group-flush">
                <?php foreach ($listdoc["items"] as $key => $value) { ?>
                        <li class="list-group-item" style="padding-left:0;"><a href="/docs/<?php echo str_slug($value->title);?>-<?php echo $value->id;?>.html"><?php echo $value->title;?></a></li>
                <?php } ?>

        </ul>
<?php  $this->endSection() ?>

<?php  $this->section('bodyTop') ?>
        <img src="<?php echo $docs->image;?>" class="img-fluid rounded mx-auto d-block" style="width: 100%;" title="<?php echo $docs->title;?>">
        <br>
        <h3><?php echo $docs->title;?></h3>
        <p><?php echo $docs->contents_highlight;?></p>

<?php  $this->endSection() ?>

<?php  $this->section('body') ?>
   
        <p><?php echo $docs->description;?></p>
        <p><?php echo $docs->contents;?></p>
    <hr>
    <?php print_r($docs->next);?>
<?php  $this->endSection() ?>