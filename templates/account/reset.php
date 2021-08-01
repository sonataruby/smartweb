<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>
    
    
    <div class="ath-container">
        
        <div class="ath-body">
            <h5 class="ath-heading title">Reset <small class="tc-default">with your Email</small></h5>
            <form action="./">
                <div class="field-item">
                    <div class="field-wrap">
                        <input type="text" class="input-bordered" placeholder="Your Email">
                    </div>
                </div>
                <button class="btn btn-primary btn-block btn-md">Reset Password</button>
            </form>
        </div>
        <div class="ath-note text-center tc-light">
            Remembered? <a href="page-login.html"> <strong>Sign in here</strong></a>
        </div>
    </div>
   
<?php $this->endSection() ?>