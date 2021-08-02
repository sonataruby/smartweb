<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>
 <?php echo form_open();?>
    <h1 class="d-flex justify-content-between">Templates EDIT <div><button class="btn btn-sm btn-primary">Save</button></div></h1>
    <hr>
    <div class="row">
        <div class="col-md-4 col-12">
            <div style="max-height:750px; overflow:auto;">
            <ul class="list-group">
                <?php foreach ($file as $key => $value) { 
                    if(strpos($key,"layout") !== false || strpos($key,"themes") !== false){
                    ?>
                    <li class="list-group-item">
                    <?php if(!is_array($value)){ ?>
                        <a href="/admin/templates/develop?file=<?php echo $value;?>"><?php echo $value;?></a>
                        <?php }else{
                            echo ulmake($value, $key);
                        }?>
                    </li>
                <?php } 
                    }
                ?>
            </ul>
            </div>
        </div>
        
        <div class="col-md-8 col-12">
          
           
            <textarea class="form-control" style="min-height:650px;" name="code" id="code"><?php echo ($_GET['file'] ? file_get_contents(FCPATH."templates/".$_GET['file']) : "");?></textarea>
            
        </div>
    </div>
<?php
function ulmake($arv=[], $path=""){
    foreach ($arv as $key => $value) {
        if(strpos($key,"images") === false ){
        ?>
        <ul style="padding:0; list-style: none;">
            <li><?php 
            if(!is_array($value)){
                echo "<a href='/admin/templates/develop?file=".$path.$value."'>".$path.$value.'</a>';
            }else{
                ulmake($value, $path.$key);
            }
            ?></li>
        </ul>
        <?php
        }
        // code...
    }
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/codemirror.min.js" integrity="sha512-6Q5cHfb86ZJ3qWx47Pw7P5CN1/pXcBMmz3G0bXLIQ67wOtRF7brCaK5QQLPz2CWLBqjWRNH+/bV5MwwWxFGxww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.2/codemirror.min.css" integrity="sha512-xIf9AdJauwKIVtrVRZ0i4nHP61Ogx9fSRAkCLecmE2dL/U8ioWpDvFCAy4dcfecN72HHB9+7FfQj3aiO68aaaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
  var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    lineNumbers: true,
    matchBrackets : true,
    tabMode: "indent"
  });
</script>
<style type="text/css">
    .CodeMirror {
  border: 1px solid #eee;
  height: 750px;
}

</style>
<?php echo form_close();?>
<?php $this->endSection() ?>