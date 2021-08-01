<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>
    
    <div class="my-auto py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-7 col-sm-9">
                <div class="position-relative">
                    <h2 class="title-xxl-grad">404</h2>
                    <h5 class="pb-2">Opps! Why you’re here?</h5>
                    <p class="">We are very sorry for inconvenience. It looks like you’re try to access a page that either has been deleted or never existed.</p>
                    <a href="/" class="btn btn-grad btn-md btn-round">Back to home</a>
                </div> 
            </div>
        </div>
    </div>
   
 <?php $this->endSection() ?>