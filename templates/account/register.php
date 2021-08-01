<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>
    
    
    <div class="ath-container" style="min-width:550px;">
        
        <div class="ath-body">
            <h5 class="ath-heading title">Sign Up <small class="tc-default">Create New <?php echo $settings->site_name;?> Account</small></h5>
            <?php echo form_open();?>
                <div class="field-item row">
                    <div class="col-6">
                        <input type="text" name="firstname" required class="input-bordered" placeholder="First Name">
                    </div>
                    <div class="col-6">
                        <input type="text" name="lastname" required class="input-bordered" placeholder="Last Name">
                    </div>
                </div>

                <div class="field-item">
                    <div class="field-wrap">
                        <input type="text" name="username" required class="input-bordered" placeholder="Username">
                    </div>
                </div>

                <div class="field-item">
                    <div class="field-wrap">
                        <input type="email" name="email" required class="input-bordered" placeholder="Your Email">
                    </div>
                </div>
                <div class="field-item">
                    <div class="field-wrap">
                        <input type="password" name="password" required class="input-bordered" placeholder="Password">
                    </div>
                </div>
                <div class="field-item">
                    <div class="field-wrap">
                        <input type="password" name="repassword" required class="input-bordered" placeholder="Repeat Password">
                    </div>
                </div>
                <div class="field-item">
                    <input class="input-checkbox" id="agree-term-2" type="checkbox" required>
                    <label for="agree-term-2">I agree to Icos <a href="/page/privacy-policy.html">Privacy Policy</a> &amp; <a href="#">Terms</a>.</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-md">Sign Up</button>
            <?php echo form_close();?>
            <div class="sap-text"><span>Or Sign Up With</span></div>

            <ul class="btn-grp gutter-20px gutter-vr-20px">
                <li class="col"><a href="/account/facebook" class="btn btn-md btn-facebook btn-block"><em class="icon fab fa-facebook-f"></em><span>Facebook</span></a></li>
                <li class="col"><a href="/account/google" class="btn btn-md btn-google btn-block"><em class="icon fab fa-google"></em><span>Google</span></a></li>
            </ul>
        </div>
        <div class="ath-note text-center pb-3">
            Already have an account? <a href="/account/login"> <strong>Sign in here</strong></a>
        </div>
    </div>
    
<?php $this->endSection() ?>