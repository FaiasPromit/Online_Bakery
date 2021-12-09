<?php
include('header.php');
include('database.inc.php');
include('function.inc.php');
$msg="";
$category="";
$order_number="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from category where id='$id'"));
	$category=$row['category'];
	$order_number=$row['order_number'];
}

if(isset($_POST['submit'])){
	$category=get_safe_value($_POST['category']);
	$order_number=get_safe_value($_POST['order_number']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$sql="select * from category where category='$category'";
	}else{
		$sql="select * from category where category='$category' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Category already added";
	}else{
		if($id==''){
			mysqli_query($con,"insert into category(category,order_number,status,added_on) values('$category','$order_number',1,'$added_on')");
		}else{
			mysqli_query($con,"update category set category='$category', order_number='$order_number' where id='$id'");
		}
		
		redirect('category.php');
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Manage </strong><small>Category</small></div>
                        <div class="card-body card-block">
                            <form method="post">
                                <div class="form-group"><label for="category" class=" form-control-label">Category</label><input type="text" id="category" value="<?php echo $category?>" placeholder="Enter your company name" class="form-control" name="category" required></div>
                                <div class="form-group"><label for="order_number" class=" form-control-label">Order Number</label><input type="text" id="order_number" value="<?php echo $order_number?>" placeholder="Enter the Order Number " class="form-control" name="order_number" required></div>
                                <button id="submit" type="submit" name="submit" class="btn btn-lg btn-info btn-block">Submit</button>
                            </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php
include('footer.php');
?>