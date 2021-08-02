<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>
    <h1 class="border-bottom d-flex justify-content-between">
        <div>System Build</div>
        <div>
            <a href="/admin/build" class="btn btn-primary">Module</a>
            <a href="/admin/build/layout" class="btn btn-primary">Layout</a>
            <a href="/admin/build/system" class="btn btn-primary">System</a>
        </div>
    </h1>
   <table class="table">
       <thead>
            <td>#</td>
            <td>File</td>
            <td></td>
       </thead>
       <?php foreach ($file as $key => $value) { ?>
           
       <tr>
           <td><input type="checkbox" name="path[]"></td>
           <td><?php echo $value;?></td>
           <td class="text-end"><a class="btn btn-sm btn-primary">Update</a></td>
       </tr>
        <?php } ?>
   </table>

   
<?php $this->endSection() ?>