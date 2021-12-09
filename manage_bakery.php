<?php 
include('header.php');
include('database.inc.php');
include('constant.inc.php');
include('function.inc.php');
// prx(SERVER_BAKERY_IMAGE);
$msg="";
$category_id="";
$bakery="";
$bakery_detail="";
$image="";
$id="";
$price="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from bakery where id='$id'"));
	$category_id=$row['category_id'];
	$bakery=$row['bakery'];
	$bakery_detail=$row['bakery_detail'];
	$image=$row['image'];
	$price=$row['price'];
}

if(isset($_POST['submit'])){
	$category_id=get_safe_value($_POST['category_id']);
	$bakery=get_safe_value($_POST['bakery']);
	$bakery_detail=get_safe_value($_POST['bakery_detail']);
	$image=get_safe_value($_POST['image']);
	$price=get_safe_value($_POST['price']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$sql="select * from bakery where bakery='$bakery'";
	}else{
		$sql="select * from bakery where bakery='$bakery' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Bakery already added";
	}else{
		if($id==''){
			$image=$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],SERVER_BAKERY_IMAGE.$_FILES['image']['name']);
			mysqli_query($con,"insert into bakery(category_id,bakery,bakery_detail,added_on,image,price) values('$category_id','$bakery','$bakery_detail','$added_on','$image','$price')");
		}else{
			if($image==""){
				mysqli_query($con,"update bakery set category_id='$category_id', bakery='$bakery',bakery_detail='$bakery_detail',price='$price' where id='$id'");
			}else{
				$image=$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],SERVER_BAKERY_IMAGE.$_FILES['image']['name']);
				mysqli_query($con,"update bakery set category_id='$category_id', bakery='$bakery',bakery_detail='$bakery_detail',image='$image',price='$price' where id='$id'");
			}
			
		}
		
		redirect('bakery.php');
	}
}

$res_category=mysqli_query($con,"select * from category where status='1' order by category asc")
?>
<div class="row">
			<h4 class="grid_title ml10 ml15">Manage Bakeries</h4>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Category</label>
                      <select name="category_id" class="form-control" required>
												<option value="">Select Category</option>
												<?php
												while($row_category=mysqli_fetch_assoc($res_category)){
													if($row_category['id']==$category_id){
														echo "<option value='".$row_category['id']."'selected>".$row_category['category']."</option>";
													}
													else{
														echo "<option value='".$row_category['id']."'>".$row_category['category']."</option>";
													}
												}
												?>
											</select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Bakery</label>
                      <input type="textbox" class="form-control" placeholder="Bakery" name="bakery"  value="<?php echo $bakery?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Bakery Details</label>
                      <textarea name="bakery_detail" class="form-control" placeholder="Details" cols="30" rows="5"><?php echo $bakery_detail?> </textarea>
										</div>
										<div class="form-group">
                      <label for="exampleInputEmail3" required>Bakery Image</label>
                      <input type="file" class="form-control" placeholder="Image" name="image" value="<?php echo $row['image']?>">
										</div>
										<div class="form-group">
                      <label for="exampleInputEmail3" required>Bakery Price</label>
                      <input type="textbox" class="form-control" placeholder="Item Price" name="price" value="<?php echo $price?>">
                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
        
<?php include('footer.php');?>