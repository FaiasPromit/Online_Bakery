<?php
include('front_header.php');  
if(!isset($_SESSION['FOOD_USER_ID'])){
	redirect('front_index.php');
}
$uid=$_SESSION['FOOD_USER_ID'];
$sql="select order_master.*,order_status.order_status as order_status_str from order_master,order_status where order_master.order_status=order_status.id and order_master.user_id='$uid' order by order_master.id desc";
$res=mysqli_query($con,$sql);
?>
<div class="container">
  <h2>Order History</h2>
  <p>Your recent orders and their status:</p>            
  <table style="border:1px solid #964B00;padding:5px;">
    <thead>
		<tr style="background-color:#e7cfca;">
            <th style="width:10px;">Order No</th>
            <th style="width:100px;">Price</th>
			<!-- <th>Coupon</th> -->
            <th style="width:100px;">Address</th>
			<th>Zipcode</th>
            <th style="width:500px;">Ordered Items</th>
			<th>Order Status</th>
            <th>Payment Status</th>
			<th>Order Placement Time</th>
    	</tr>
    </thead>
    <tbody >
		<?php if(mysqli_num_rows($res)>0){
			$i=1;
			while($row=mysqli_fetch_assoc($res)){
			?>
				<tr style="background-color:#FFF8F2;">
                    <td>
						<div class="div_order_id"><a href="#"><?php echo $row['id']?></div></a>
					</td>
                    <td style="font-size:14px;">
						<?php echo $row['total_price']?> Taka
					</td>
					<td><?php echo $row['address']?></td>
					<td><?php echo $row['zipcode']?></td>
					<td>
						<table style="border:2px solid #85b0bd;width:500px;" >
							<tr style="background-color:#a6dced;">
								<th style="width:25px;" >Bakery</th>
								<!-- <th style="width:1px;">Bakery Id</th> -->
								<th style="width:5px;">Price per item</th>
								<th style="width:5px;">Qty</th>
							</tr>
							<?php
							$getOrderDetails=getOrderDetails($row['id']);
							foreach($getOrderDetails as $list){
							?>
								<tr style="height:30px;border:2px solid #85b0bd;background-color:#dff1f0">
									<td><?php echo $list['bakery']?></td>
									<!-- <td><?php echo $list['id']?></td> -->
									<td><?php echo $list['price']?></td>
									<td><?php echo $list['qty']?></td>
								</tr>
							<?php }  ?>
						</table>
					</td>
					<td><?php echo $row['payment_status']?></td>
					<td><?php echo $row['order_status_str']?></td>
					<td>
					<?php 
					$dateStr=strtotime($row['added_on']);
					echo date('d-m-Y h:s',$dateStr);
					?>
					</td>
                </tr>
			<?php }} ?>
    </tbody>
  </table>
  <br>
  <br>
</div>
<?php
include('front_footer.php');  
?>