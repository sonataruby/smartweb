<?php echo $this->extend($layout); ?>

<?php $this->section('body') ?>


<section class="nb-contents" style="padding-top:10px; padding-bottom: 50px;">
	<div class="container">
		<h3>Balancer</h3>
		<div class="row">
			
			<div class="col-md-6 col-6 pb-3">
				<div class="border rounded p-4">Your Balance : <?php echo $balance_token;?> <b><?php echo $tokenname;?></b></div>
			</div>

			<div class="col-md-6 col-6 pb-3">
				<div class="border rounded p-4"><a href="/wallet/deposit" class="btn btn-sm btn-info">Deposit</a>  <a class="btn btn-sm btn-danger" href="/wallet/withdraw">Withdraw</a></div>
			</div>
		</div>
	</div>
	<div class="container">
		<?php if(intval($balance_token) > 0 && intval($balance_token) >= $price_signals){ ?>
		<?php echo form_open();?>
		<h3>Select Symbol</h3>
		<select class="form-select" name="symbol">
			<option value="">Select Symbol</option>
			<?php foreach ($symbol as $key => $value) { ?>
				<option value="<?php echo $key;?>"><?php echo $key;?></option>
			<?php } ?>
			
		</select>
		<br>
		<h6>Signal price : <?php echo $price_signals;?> <?php echo $tokenname;?> / Month</h6>
		<br>
		<button class="btn btn-primary btn-sm">Update</button>
		<?php echo form_close();?>
		<?php }else{?>
				<div class="alert alert-danger" role="alert">
				   Your account balance is not enough. You can buy <b><?php echo $tokenname;?></b> in the options below
				</div>
				<h3>Buy <?php echo $tokenname;?> Token </h3>
				<div class="row">
					<div class="col-12">
						<b>Amount</b>
						<div class="pb-3"><input type="number" class="form-control" name="numbertoken" value="1000"></div>
					</div>

					<div class="col-12">
						<b>Price : </b>
						<?php echo $price_token;?> USD
					</div>

					<div class="col-md-4 col-6 pb-3">
						<div class="border rounded p-4">
							
							<h5 class="priceusd">0 USD</h5>
							<hr>
							<div class="text-center"><a data-payment="paypal" class="btn btn-primary btn-sm">Payment Paypal</a></div>
						</div>
					</div>
					<div class="col-md-4 col-6 pb-3">
						<div class="border rounded p-4">
							
							<h5 class="pricebtc">0.0000 BTC</h5>
							<hr>
							<div class="text-center"><a data-payment="btc" class="btn btn-primary btn-sm">Payment BTC</a></div>
						</div>
					</div>

					<div class="col-md-4 col-6 pb-3">
						<div class="border rounded p-4">
							
							<h5 class="priceeth">0.000 ETH</h5>
							<hr>
							<div class="text-center"><a data-payment="eth" class="btn btn-primary btn-sm">Payment ETH</a></div>
						</div>
					</div>

				</div>

				<div class="paymentdata"></div>
			
		<?php } ?>
	</div>
</section>
<script type="text/javascript">
	var priceusd = <?php echo $price_token;?>;
	var pricebtc = <?php echo $price_btc;?>;
	var priceeth = <?php echo $price_eth;?>;
	$(document).ready(function(){
		
		function makeMoney(numbertoken){

			$(".priceusd").html(parseFloat(numbertoken * priceusd).toFixed(2) + " USD");
			$(".pricebtc").html(parseFloat(numbertoken * (priceusd/pricebtc)).toFixed(8) + " BTC");
			$(".priceeth").html(parseFloat(numbertoken * (priceusd/priceeth)).toFixed(4) + " ETH");
		}
		makeMoney(1000);
		$("input[name=numbertoken]").on("input", function(){
			var numbertoken = $(this).val();
			makeMoney(numbertoken);
		});

		$("a[data-payment]").on("click", function(){

			var service = $(this).attr("data-payment");
			var totals = $("input[name=numbertoken]").val();
			
			$.ajax({
		        url: "/payment/genservice/"+service+"/"+totals,
		        type: 'GET',
		        dataType: 'html', // added data type
		        success: function(res) {
		        	if(res == "paypal"){
		        		window.location.href="/payment/paypal";
		        		$(".paymentdata").html("Loadding...");
		        	}else{
		        		$(".paymentdata").html(res);
		        	}
		           
		            
		        }
		    });
		});
	});
		
	
</script>
<?php $this->endSection() ?>