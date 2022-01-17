<?php
include('header.php');
include('database.inc.php');
include('function.inc.php');
$id=get_safe_value($_GET['id']);


?>
<div class="card">
	<div class="card-body">
		<h1 class="grid_title">Order Detail of <?php echo $id?> number order</h1>
		<div class="row grid_box">
			<form class="forms-sample" method="post" id="frmOrderStatus" action="order_detail_submit.php?id=<?php echo $id?>" >
				<div class="form-group">
					<label for="order_status">Order Status</label>
					<select name="order_status" class="form-control" id="order_status" required>
						<option value="1">Pending</option>
						<option value="2">Cooking </option>
						<option value="3">On the Way</option>
						<option value="4">Delivered</option>
						<option value="5">Cancel</option>
						
					</select>
					<label for="payment_status">Payment Status</label>
					<select name="payment_status" class="form-control" id="payment_status" required>
						<option value="Pending">Pending</option>
						<option value="Paid By Bkash">Paid By Bkash </option>
						<option value="Paid By Nagad">Paid By Nagad</option>
						<option value="Paid By Cash on Delivery">Paid By Cash on Delivery</option>
					</select>
					<!-- <input type="hidden" name="order_id" value="20" id="order_id"> -->
				</div>

				<button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
			</form>
		</div>
	</div>
</div>
              
<?php
include('footer.php');
?>