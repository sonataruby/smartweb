<?php echo $this->extend($layout); ?>

<?php echo $this->section('bodyTop') ?>
<img src="<?php echo $docs->image;?>" class="img-fluid" title="<?php echo $docs->title;?>">
<br>
<h3><?php echo $docs->title;?></h3>
<p><?php echo $docs->contents_highlight;?></p>
<?php echo $this->endSection() ?>

<?php echo $this->section('body') ?>
   
        <p><?php echo $docs->description;?></p>
        <p><?php echo $docs->contents;?></p>
    
<?php echo $this->endSection() ?>