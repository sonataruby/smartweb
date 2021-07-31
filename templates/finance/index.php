<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
	
	<div class="row row-cols-1 row-cols-md-3 g-4">
		<?php foreach ($app["items"] as $key => $item) { ?>
			
		
		<div class="col">
		    <div class="card h-100" style="padding:0;">
		      <img src="<?php echo $item->image;?>" class="card-img-top" alt="...">
		      <div class="card-body border">
		        <h5 class="card-title"><?php echo $item->name;?></h5>
		        <p class="card-text"><?php echo $item->description;?>.</p>
		        <a href="<?php echo $item->link;?>" class="btn btn-sm btn-info">Go</a>
		      </div>
		    </div>
		</div>
		<?php } ?>
		
	</div>
	<?php echo $app["page"];?>
<?php echo $this->endSection() ?>