<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>
<style type="text/css">
.bd-buy {
    border-color: var(--bs-green) !important;
}
.bd-sell {
    border-color: var(--bs-red) !important;
}
.bd-target{
	border-color: var(--bs-blue) !important;
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
    			
        		<div class="border border-primary p-3 rounded">Pips : <?php echo $report->pip;?> pips</div>
			</div>

			<div class="col-md-3 col-6">
				
				<div class="border border-warning p-3 rounded">Member VIP : <?php echo $report->member;?></div>
    			
    		</div>
    		<div class="col-md-3 col-6">
    			
        		<div class="bg-success p-3 rounded"><a href="/members" class="text-light">Airdrop get free token</a></div>
			</div>

		</div>
	</div>
</section>

<section>
	<div class="container">
		
		<div class="row">
			
			<div class="col-md-9">
				
				<div style="max-height:1000px; overflow-y: auto;overflow-x: hidden;" id="loadSingals">
					
				</div>

				
			</div>
			<div class="col-md-3">
				<div class="bg-primary p-3 rounded text-center">
					<a href="/smarttrader/upvip"><h3 class="text-light">JOIN VIP</h3><h5 class="text-light">5$/month</h5></a>
				</div>
				<br>
				<h3>Service</h3>
				
				<ul class="list-group list-group-flush">
				  <li class="list-group-item"><a  href="/smarttrader/copytrade" class="link">COPY TRADE</a></li>
				  <li class="list-group-item"><a  href="/smarttrader/smartea" class="link">SMART EA</a></li>
				  <li class="list-group-item"><a  href="https://thinking-2win.com/indicator" target="_blank" class="link">Download Indicator</a></li>
				  
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
<script type="text/javascript">
	$("#loadSingals").load("/trader/signalsajax");
</script>

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
			<?php foreach ($video as $key => $value) { ?>
			<div class="col-md-3  col-6 pb-3">
				
				<a href="<?php echo $value["link"];?>" target="_blank">
					<div style="overflow: hidden; height:120px;">
	    				<img src="<?php echo $value["image"];?>" style="width:100%;" />
	    			</div>
    			</a>
    			
    		</div>
    		<?php } ?>
    		

		</div>
	</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.8/push.js" integrity="sha512-x0GVeKL5uwqADbWOobFCUK4zTI+MAXX/b7dwpCVfi/RT6jSLkSEzzy/ist27Iz3/CWzSvvbK2GBIiT7D4ZxtPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
	const socket = io("<?php echo $socket;?>/",{transports: ["websocket"]});
	socket.connect();
	socket.on("connect", () => {
		  console.log(socket.connected); // true
	});
	socket.on('open', (data) => {
		$("#loadSingals").load("/trader/signalsajax");
	    Push.create('Hi there!', {
		    body: 'New Signals Open.',
		    icon: 'icon.png',
		    timeout: 8000,               // Timeout before notification closes automatically.
		    vibrate: [100, 100, 100],    // An array of vibration pulses for mobile devices.
		    onClick: function() {
		        // Callback for when the notification is clicked. 
		        console.log(this);
		    }  
		});
	});

    
  </script>
<?php $this->endSection() ?>