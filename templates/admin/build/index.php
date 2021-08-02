<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>
    
    <h1 class="border-bottom d-flex justify-content-between">
        <div>Auto Build Code CI4 <a href="/admin/build?plugins=true" class="btn btn-sm btn-primary">Plugins Mode</a></div>
        <div>
            <a href="/admin/build" class="btn btn-primary">Module</a>
            <a href="/admin/build/layout" class="btn btn-primary">Layout</a>
            <a href="/admin/build/system" class="btn btn-primary">System</a>
        </div>
    </h1>
    <table class="table">
        <thead>
            <td>STT</td>
            <td>Tables</td>
            <td>Prikey</td>
            <td>Folder</td>
            <td>Administrator</td>
            <td>Client</td>
            <td>Sup Admin</td>
        </thead>
        <?php foreach($table as $k => $v){ 

            ?>
           
        <tr>
            <td><?php echo $k+1 ;?></td>
            <td><?php echo $v["table"] ;?></td>
            <td><?php echo $v["primary_key"];?></td>
            <td>Folder</td>
            <td width="15%">
                <a href="/admin/build/adminclt/<?php echo $v["table"] ;?>/<?php echo $v["primary_key"];?>?mode=<?php echo $_GET['plugins'];?>" class="btn btn-sm btn-primary">Controller</a>
                <a href="/admin/build/adminview/<?php echo $v["table"] ;?>/<?php echo $v["primary_key"];?>?mode=<?php echo $_GET['plugins'];?>"  class="btn btn-sm btn-info">Views</a>

            </td>
            <td  width="15%">
                <a href="#" class="btn btn-sm btn-primary">Controller</a>
                <a href="#"  class="btn btn-sm btn-info">Views</a>
            </td>
            <td  width="15%" class="text-end">
                <a href="#" class="btn btn-sm btn-primary">Controller</a>
                <a href="#"  class="btn btn-sm btn-info">Views</a>
            </td>
        </tr>
        <?php } ?>
    </table>
<?php $this->endSection() ?>