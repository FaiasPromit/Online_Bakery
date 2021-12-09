<?php
include('header.php');
include('database.inc.php');
include('function.inc.php');
if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id'] >0){
    $type=get_safe_value($_GET['type']);
    $id=get_safe_value($_GET['id']);
    if($type=='active' || $type=='deactive'){
        $status=1;
        if($type=='deactive'){
            $status=0;
        }
        mysqli_query($con,"update user set status='$status' where id='$id'");
        redirect('user.php');
    }
}

$sql="select * from user order by id";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">User Admin</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="10%">S #</th>
                                       <th width="25%">Name</th>
                                       <th width="25%">Email</th>
                                       <th width="25%">Mobile</th>
                                       <th width="15%">Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if (mysqli_num_rows($res)>0){
                                        $i=1;
                                        while($row=mysqli_fetch_assoc($res)){
                                            ?>
                                    <tr>
                                       <td><?php echo $i?></td>
                                       <td><?php echo $row['name']?></td>
                                       <td><?php echo $row['email']?></td>
                                       <td><?php echo $row['mobile']?></td>
                                       <td>
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