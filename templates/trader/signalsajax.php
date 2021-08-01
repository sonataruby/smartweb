<ul>
		<?php 
		if(!$signals){
		?>
		<li><div class="alert alert-danger" role="alert">Wait new signals public</div></li>
		<?php
		}
		foreach ($signals as $key => $value) {
			
			
		?>
		<li>
			
			<div class="bd-callout <?php echo ($value->type == "SELL"  ? "bd-sell" : "bd-buy");?> <?php echo ($value->status == "target" ? "bd-target" : "");?>">
				<h5 class="d-flex justify-content-between">
					<?php echo $value->symbol;?><?php echo ($value->is_free == "yes" || $value->access == "vip" ? " | ". $value->type : "");?>
					<div style="font-size:12px;"><?php echo $value->opendate;?></div>
				</h5>
				<hr>
				<div class="row">
					<?php if($value->status == "target"){ ?>
						<div class="col-2">Open<br><?php echo $value->open;?></div>
						
						<div class="col-3">Close<br>
							<?php echo $value->close;?>
						</div>
						<div class="col-4">Profit<br><?php echo $value->profits;?> (pip)</div>

						<div class="col-3 text-end">
							<b><?php echo ucfirst($value->status);?></b> <br>
							<?php echo $value->profits;?> (pip)
						</div>
					<?php }else{ ?>
					<?php if($value->is_free == "no" && $value->access == "guest"){ ?>
						<div class="col-9"><a href="/smarttrader/upvip">Unlock VIP <br>Join VIP 5$/Month</a></div>
						<div class="col-3 text-end"><?php echo ucfirst($value->status);?> <br><a href="https://one.exness.link/a/tjm6vjm6" class="btn btn-sm btn-danger" target="_bank">Trade Now</a></div>
						
					<?php }else{ ?>

					
					<div class="col-2">Open<br><?php echo $value->open;?></div>
					<div class="col-3">SL<br><?php echo $value->sl;?></div>
					<div class="col-4">TP<br>
						<?php echo $value->tp1;?>
						<?php echo $value->tp2;?>
						<?php echo $value->tp3;?>
					</div>

					<div class="col-3 text-end">
						<b><?php echo ucfirst($value->status);?></b> <br><a href="https://one.exness.link/a/tjm6vjm6" target="_bank" class="btn btn-sm btn-danger">Trade Now</a>
					</div>
					
					
					<?php } ?>
					<?php } ?>
				</div>
			</div>
			

		</li>
		<?php } ?>
	</ul>