<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<h1 class="border-bottom d-flex justify-content-between">
    <div><i data-feather="server"></i> File Manager</div>
    <div>
        <a href="/admin/upload?path=uploads" class="btn btn-primary">Upload</a>
        <a href="/admin/upload?path=templates" class="btn btn-primary">Template</a>
        
    </div>
</h1>

<div class="row">
	<div class="col-8">
		<div class="border" style="min-height:550px; max-height: 550px; overflow-x: auto; padding: 10px;">
			<div class="row row-cols-2 row-cols-md-5 g-4">
				<?php foreach ($files as $key => $value) { ?>
					
				<div class="col">
				    <div class="card">
				      <img src="<?php echo $url_view;?><?php echo $value;?>" class="card-img-top" alt="...">
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="col-4">
		

		<div class="mb-3">
		  <label for="imgName" class="form-label">Filename</label>
		  <input type="text" class="form-control" id="imgName" placeholder="file.jpg">
		</div>
		<div class="row">
			<div class="col-6">
				<div class="mb-3">
				  <label for="ImgWidth" class="form-label">Width</label>
				  <input type="text" class="form-control" id="ImgWidth" placeholder="0">
				</div>
			</div>
			<div class="col-6">
				<div class="mb-3">
				  <label for="imgHeight" class="form-label">Height</label>
				  <input type="text" class="form-control" id="imgHeight" placeholder="0">
				</div>
			</div>
		</div>
		<div class="mb-3 d-flex justify-content-between">
		  <input class="form-control" type="file" name="file" id="formFile">
		  
		</div>

		<div class="border" style="min-height:250px;" id="preview">
			<img src="" style="max-width:100%;">
		</div>
	</div>
</div>
<script type="text/javascript">
	$(".card img").on("click", function(){
		var url = $(this).attr("src");
		$.getJSON({
		    url: "/admin/upload/info?url="+url,
		    type: 'GET',
		    success: function(res) {
		        $("#imgName").val(res.name);
		        $("#ImgWidth").val(res.width);
		        $("#imgHeight").val(res.height);
		        $("#preview img").attr("src",res.name);
		        //$("#formFile").removeAttr("disabled");

		        $("#formFile").AjaxFileUpload({
			        action: "/admin/upload/images?name="+$("#imgName").val()+"&size="+$("#ImgWidth").val()+"x"+$("#imgHeight").val(),
			         
			        onComplete: function(filename, response) {
			          
			          $("#preview img").attr("src", response.url);
			        }
			    });
		        
		    }
		});

	});

	
</script>
<?php $this->endSection() ?>