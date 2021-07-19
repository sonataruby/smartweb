<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
    
    
    <div class="ath-container">
        
        <div class="ath-body">
            <h5 class="ath-heading title">Sign in <small class="tc-default">With your <?php echo $settings->site_name;?> Account</small></h5>
            <?php echo form_open();?>
                <div class="field-item">
                    <div class="field-wrap">
                        <input type="text" name="email" class="input-bordered" placeholder="Your Email">
                    </div>
                </div>
                <div class="field-item">
                    <div class="field-wrap">
                        <input type="password" name="password" class="input-bordered" placeholder="Password">
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center pdb-r">
                    <div class="field-item pb-0">
                        <input class="input-checkbox" id="remember-me-2" type="checkbox">
                        <label for="remember-me-2">Remember Me</label>
                    </div>
                    <div class="forget-link fz-6">
                        <a href="/account/reset">Forgot password?</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-md">Sign In</button>
            <?php echo form_close();?>
            <div class="sap-text"><span>Or Sign In With</span></div>

            <ul class="row gutter-20px gutter-vr-20px">
                <li class="col"><a href="/account/facebook" class="btn btn-md btn-facebook btn-block"><em class="icon fab fa-facebook-f"></em><span>Facebook</span></a></li>
                <li class="col"><a href="/account/google" class="btn btn-md btn-google btn-block"><em class="icon fab fa-google"></em><span>Google</span></a></li>
            </ul>
        </div>
        <div class="ath-note text-center pb-3">
            Don’t have an account? <a href="/account/register"> <strong>Sign up here</strong></a>
        </div>

    </div>
   
   
<?php echo $this->endSection() ?>