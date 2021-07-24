<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
<style type="text/css">
.bd-buy {
    border-color: var(--bs-green) !important;
}
.bd-sell {
    border-color: var(--bs-red) !important;
}
.bd-callout {
    padding: 1.25rem;
    
    margin-bottom: 1.25rem;
    border: 1px solid #eee;
    border-left-color: rgb(238, 238, 238);
    border-left-width: 1px;
    border-left-width: .25rem;
    border-radius: .25rem;
}
</style>



<section class="nb-contents" style="padding-top:10px; padding-bottom: 50px;">
	<div class="container">
		<h3>Report Week</h3>
		<div class="row">
			<div class="col-md-3 col-6 pb-3">
				
				<div class="bg-primary p-3 rounded text-light">Profit : <?php echo $report->usd;?>$</div>
    			
    		</div>
    		<div class="col-md-3 col-6">
    			
        		<div class="bg-primary p-3 rounded text-light">Pips : <?php echo $report->pip;?> pips</div>
			</div>

			<div class="col-md-3 col-6">
				
				<div class="bg-primary p-3 rounded text-light">Member VIP : <?php echo $report->member;?></div>
    			
    		</div>
    		<div class="col-md-3 col-6">
    			
        		<div class="bg-primary p-3 rounded text-light">Orders : <?php echo $report->signals;?></div>
			</div>

		</div>
	</div>
</section>

<section>
	<div class="container">
		<h3>Signal Trader</h3>
		<br>
		<div class="row">
			
			<div class="col-md-9">
				
				<div style="max-height:650px; overflow-y: auto;overflow-x: hidden;">
					
						<ul>
							<?php 
							foreach ($signals as $key => $value) {
								
								
							?>
							<li>
								
								<div class="bd-callout <?php echo ($value->type == "SELL" ? "bd-sell" : "bd-buy");?>">
									<h5 class="d-flex justify-content-between">
										<?php echo $value->symbol;?><?php echo ($value->is_free == "yes" || $value->access == "vip" ? " | ". $value->type : "");?>
										<div style="font-size:12px;"><?php echo $value->opendate;?></div>
									</h5>
									<hr>
									<div class="row">
										<?php if($value->is_free == "no" && $value->access == "guest"){ ?>
											<div class="col-9"><a href="/trader/upvip">Unlock VIP <br>Join VIP 5$/Month</a></div>
											<div class="col-3 text-end"><?php echo ucfirst($value->status);?> <br><a href="https://one.exness.link/a/tjm6vjm6?p=250x250_VI_Registration_AccessFunds" class="btn btn-sm btn-danger" target="_bank">Trade Now</a></div>
											
										<?php }else{ ?>

										
										<div class="col-2">Open<br><?php echo $value->open;?></div>
										<div class="col-3">SL<br><?php echo $value->sl;?></div>
										<div class="col-4">TP<br>
											<?php echo $value->tp1;?>
											<?php echo $value->tp2;?>
											<?php echo $value->tp3;?>
										</div>

										<div class="col-3 text-end">
											<b><?php echo ucfirst($value->status);?></b> <br><a href="https://one.exness.link/a/tjm6vjm6?p=250x250_VI_Registration_AccessFunds" target="_bank" class="btn btn-sm btn-danger">Trade Now</a>
										</div>
										
										
										<?php } ?>
									</div>
								</div>
								

							</li>
							<?php } ?>
						</ul>
					
				
				</div>

				
			</div>
			<div class="col-md-3">
				<div class="bg-primary p-3 rounded text-center">
					<a href="/smarttrader/upvip"><h3 class="text-light">JOIN VIP</h3><h5 class="text-light">5$/month</h5></a>
				</div>

				<h3>Service</h3>
				
				<ul class="list-group list-group-flush">
				  <li class="list-group-item"><a  href="/smarttrader/copytrade" class="link">COPY TRADE</a></li>
				  <li class="list-group-item"><a  href="/smarttrader/smartea" class="link">SMART EA</a></li>
				  <li class="list-group-item"><a  href="/trader/smartea" class="link">Mt4 Indicator</a></li>
				  <li class="list-group-item"><a  href="/trader/smartea" class="link">MT5 Indicator</a></li>
				  <li class="list-group-item"><a  href="/trader/smartea" class="link">Tech</a></li>
				</ul>
				
				<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<ins class="adsbygoogle"
				     style="display:block"
				     data-ad-format="fluid"
				     data-ad-layout-key="-7o+eu+14-5p+65"
				     data-ad-client="ca-pub-4099957745291159"
				     data-ad-slot="2339475614"></ins>
				<script>
				     (adsbygoogle = window.adsbygoogle || []).push({});
				</script>
				<h5>Symbol Support</h5>
				
				<ul class="list-group list-group-flush">
					<?php 
					$i = 0;
					foreach ($symbol as $key => $value) { 
					if($i < 10){
					?>
				  		<li class="list-group-item"><a  href="/smarttrader/copytrade" class="link"><?php echo $key;?></a></li>
				  	<?php 
				  		$i++;
				  	}
				  } ?>
				  
				</ul>
				
			</div>
		</div>
	</div>
</section>


<section class="nb-contents" style="padding-top:10px; padding-bottom: 50px;">
	<div class="container">
		<h3>Best Broker</h3>
		<div class="row">

			<?php foreach ($bestbroker as $key => $value) { ?>
				
			<div class="col-md-3 col-6 pb-3">
				
				<a href="<?php echo $value["link"];?>" target="_blank">
					<div style="overflow: hidden; height:100px;">
	    				<img src="<?php echo $value["image"];?>" style="width:100%;" />
	    			</div>
    			</a>
    			
    		</div>
    		<?php } ?>

		</div>
	</div>
</section>

<section class="nb-contents" style="padding-top:10px; padding-bottom: 50px;">
	<div class="container">
		<h3>Video Live Trade</h3>
		<div class="row">
			<div class="col-md-3  col-6 pb-3">
				
				<a href="https://secure.tickmill.com?utm_campaign=ib_link&utm_content=IB21222244&utm_medium=Banner&utm_source=%2430+Welcome+Account&lp=https%3A%2F%2Ftickmill.com%2Flp%2Ftrade-cfds-on-gold-with-ultra-fast-execution%2F" target="_blank">
					<div style="overflow: hidden; height:180px;">
	    				<img src="https://cdn.tickmill.com/promotional/3/banners/static/Welcome-Account_240x400_en.png" style="width:100%;" />
	    			</div>
    			</a>
    			
    		</div>
    		<div class="col-md-3  col-6">
    			
        		<a href="https://one.exness.link/a/tjm6vjm6?p=250x250_VI_Registration_AccessFunds">
        			<div style="overflow: hidden; height:180px;">
					  <img src="https://www.exness.com/media/banners/vi/static/250x250_VI_Registration_AccessFunds.png" width="100%"  alt=""/>
					</div>
				</a>
			</div>

			<div class="col-md-3  col-6">
				
				<a href="https://secure.tickmill.com?utm_campaign=ib_link&utm_content=IB21222244&utm_medium=Banner&utm_source=%2430+Welcome+Account&lp=https%3A%2F%2Ftickmill.com%2Flp%2Ftrade-cfds-on-gold-with-ultra-fast-execution%2F" target="_blank">
					<div style="overflow: hidden; height:180px;">
	    				<img src="https://cdn.tickmill.com/promotional/3/banners/static/Welcome-Account_240x400_en.png" style="width:100%;" />
	    			</div>
    			</a>
    			
    		</div>
    		<div class="col-md-3  col-6">
    			
        		<a href="https://one.exness.link/a/tjm6vjm6?p=250x250_VI_Registration_AccessFunds">
        			<div style="overflow: hidden; height:180px;">
					  <img src="https://www.exness.com/media/banners/vi/static/250x250_VI_Registration_AccessFunds.png" width="100%"  alt=""/>
					</div>
				</a>
			</div>

		</div>
	</div>
</section>

<?php echo $this->endSection() ?>