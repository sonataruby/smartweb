<?php echo $this->extend($layout); ?>

<?php echo $this->section('bodyTop') ?>
<img src="<?php echo $page->image;?>" class="img-fluid" title="<?php echo $page->title;?>">
<br>
<h3><?php echo $page->title;?></h3>
<p><?php echo $page->contents_highlight;?></p>
<?php echo $this->endSection() ?>

<?php echo $this->section('body') ?>
   
        <p><?php echo $page->description;?></p>
        <p><?php echo $page->contents;?></p>
    
<?php echo $this->endSection() ?>