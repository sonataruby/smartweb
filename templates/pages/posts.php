<?php echo $this->extend($layout); ?>

<?php $this->section('bodyTop') ?>
<?php $this->endSection() ?>

<?php $this->section('body') ?>
   
        
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php foreach ($posts["items"] as $key => $value) { 
        
      ?>
      <div class="col">
        <div class="card">
          <img src="<?php echo $value->image;?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><a href="/<?php echo str_slug($value->title);?>-<?php echo $value->id;?>.html"><?php echo $value->title;?></a></h5>
            <p class="card-text"><?php echo $value->description;?>.</p>
          </div>
        </div>
      </div>
      <?php } ?>
      
    </div>
<?php $this->endSection() ?>