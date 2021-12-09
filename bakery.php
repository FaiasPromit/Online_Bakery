<?php
include('header.php');
include('database.inc.php');
include('constant.inc.php');
include('function.inc.php');
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id'] >0){
    $type=get_safe_value($_GET['type']);
    $id=get_safe_value($_GET['id']);
    if($type=='delete'){
        mysqli_query($con,"delete from bakery where id='$id'");
        redirect('bakery.php');
    }
    if($type=='active' || $type=='deactive'){
        $status=1;
        if($type=='deactive'){
            $status=0;
        }
        mysqli_query($con,"update bakery set status='$status' where id='$id'");
        redirect('bakery.php');
    }
}

$sql="select bakery.*,category.category from bakery,category where bakery.category_id=category.id order by bakery.id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Bakery Admin</h4>
                        </div>
                        <div class="card-body--">
                            <a href="manage_bakery.php" style="padding:20px;"><h4 style="padding-left:20px;">Add Bakery Items</h4></a>
                            
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="10%">S #</th>
                                       <th width="10%">Category</th>
                                       <th width="15%">Bakery Name</th>
                                       <th width="10%">Image</th>
                                       <th width="10%">Price</th>
                                       <th width="20%">Added On</th>
                                       <th width="50%">Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if (mysqli_num_rows($res)>0){
                                        $i=1;
                                        while($row=mysqli_fetch_assoc($res)){
                                            ?>
                                    <tr>
                                       <td><?php echo $i?></td>
                                       <td><?php echo $row['category']?></td>
                                       <td><?php echo $row['bakery']?></td>
                                       <td><img src="<?php echo SITE_BAKERY_IMAGE.$row['image']?>"></td>
                                       <td><?php echo $row['price']?></td>
                                       <td><?php echo $row['added_on']?></td>
                                       <td>
                                           <a href="manage_bakery.php?id=<?php echo $row['id']?>" <label class="badge badge-success">Edit </label></a>
                                           &nbsp;
                                           <?php 
                                           if($row['status']==1){
                                           ?> 
                                                <a href="?id=<?php echo $row['id']?>&type=deactive"> <label class="badge badge-info" style="cursor:pointer;">Active </label></a>
                                            <?php 
                                           }
                                           else{?>
                                                <a href="?id=<?php echo $row['id']?>&type=active"> <label class="badge badge-danger" style="cursor:pointer;">Deactive </label></a>
                                            <?php
                                           }?>
                                           &nbsp;
                                           <a href="?id=<?php echo $row['id']?>&type=delete"> <label class="badge badge-danger" style="cursor:pointer;">Delete </label></a>
                                           &nbsp;
                                       </td>
                                    </tr>   
                                    <?php $i++;} } else { ?>
                                        <tr>
                                            <td> No Data found</td>
                                        </tr>
                                    <?php } ?>                                
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php
include('footer.php');
?>