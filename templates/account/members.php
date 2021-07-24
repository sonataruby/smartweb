<?php echo $this->extend($layout); ?>

<?php echo $this->section('body') ?>
	<h3>Intivite URL</h3>
	<div>

		<div class="input-group mb-3">
		  <input type="text" class="form-control" id="myCode" readonly="true" value="<?php echo base_url("account/intivite/".$code);?>" >
		  <button class="btn btn-primary btn-sm" id="basic-addon2" onclick="myFunction();">Copy</button>
		</div>
	</div>
	<h3>Your Member</h3>
	<table class="table">
		<thead>
			<th>Full Name</th>
			<th>Email</th>
			<th>Join Date</th>
			<th>Reward</th>
			<th></th>
		</thead>
		<tbody>
			<?php foreach ($membership as $key => $value) { ?>
				
			<tr>
				<td><?php echo $value->firstname;?> <?php echo $value->lastname;?></td>
				<td><?php echo $value->email;?></td>
				<td><?php echo $value->created_at;?></td>
				<td><?php echo $value->reward;?></td>
				<td></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<script type="text/javascript">
	function myFunction() {
		  /* Get the text field */
		  var copyText = document.getElementById("myCode");

		  /* Select the text field */
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); /* For mobile devices */

		  /* Copy the text inside the text field */
		  document.execCommand("copy");

		  /* Alert the copied text */
		  alert("Copied the url: " + copyText.value);
		} 
</script>
<?php echo $this->endSection() ?>