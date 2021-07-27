<?php echo $this->extend($layout); ?>

<?php echo $this->section('bodyTop') ?>
<img src="<?php echo $posts->image;?>" class="img-fluid" title="<?php echo $posts->title;?>">
<br>
<h3><?php echo $posts->title;?></h3>
<p><?php echo $posts->contents_highlight;?></p>
<?php echo $this->endSection() ?>

<?php echo $this->section('body') ?>
   
        <p><?php echo $posts->description;?></p>
        <p><?php echo $posts->contents;?></p>
    
<?php echo $this->endSection() ?>