<?php
    function pr($arr){
        echo '<pre>';
        print_r($arr);
    }
    function prx($arr){
        echo '<pre>';
        print_r($arr);
        die();
    }
    function redirect($link){
        ?>
        <script>
            window.location.href='<?php echo $link?>';
        </script>
        <?php
        die();
    }
    function get_safe_value($str){
        global $con;
        $str=mysqli_real_escape_string($con,$str);
        return $str;
    }
    function getUserCart(){
        global $con;
        $arr=array();
        $id=$_SESSION['FOOD_USER_ID'];
        $res=mysqli_query($con,"select * from bakery_cart where user_id='$id'");
        while($row=mysqli_fetch_assoc($res)){
            $arr[]=$row;
        }
        return $arr;

    }
    function manageUserCart($uid,$qty,$attr){
        global $con;
        $res=mysqli_query($con,"select * from bakery_cart where user_id='$uid' and bakery_id='$attr'");
        if(mysqli_num_rows($res)>0){
          $row=mysqli_fetch_assoc($res);
          $cid=$row['id'];
          mysqli_query($con,"update bakery_cart set qty='$qty' where id='$cid'");
        }else{
          $added_on=date('Y-m-d h:i:s');
          mysqli_query($con,"insert into bakery_cart(user_id,bakery_id,qty,added_on) values('$uid','$attr','$qty','$added_on')");
        }
    }
    function getBakeryFromCart($cartId){
        global $con;
        $res=mysqli_query($con,"select * from bakery where id='$cartId'");
        $row=mysqli_fetch_assoc($res);
        return $row;
    }

    function getUserFullCart($attr_id=''){
        $cartArr=array();
        if(isset($_SESSION['FOOD_USER_ID'])){
            $getUserCart=getUserCart();
            foreach($getUserCart as $list){
                $cartArr[$list['bakery_id']]['qty']=$list['qty'];  
                // pr($list['bakery_id']);
                $getBakeryFromCart=getBakeryFromCart($list['bakery_id']);
                // pr($getBakeryFromCart);
                $cartArr[$list['bakery_id']]['price']=$getBakeryFromCart['price'];
                $cartArr[$list['bakery_id']]['bakery']=$getBakeryFromCart['bakery'];
                $cartArr[$list['bakery_id']]['image']=$getBakeryFromCart['image'];
                $cartArr[$list['bakery_id']]['bakery_detail']=$getBakeryFromCart['bakery_detail'];
            }
          }else{
            if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
                foreach($_SESSION['cart'] as $key=>$val){
                    $cartArr[$key]['qty']=$val['qty'];  
                    $getBakeryFromCart=getBakeryFromCart($key);
                    $cartArr[$key]['price']=$getBakeryFromCart['price'];
                    $cartArr[$key]['bakery']=$getBakeryFromCart['bakery'];
                    $cartArr[$key]['image']=$getBakeryFromCart['image'];
                    $cartArr[$key]['bakery_detail']=$getBakeryFromCart['bakery_detail'];
                  }
            }   
          }
          if($attr_id!=''){
              return $cartArr[$attr_id]['qty'];
          }else{
              return $cartArr;
          }
    }
    function getBakeryPriceById($id){
        global $con;
        $res=mysqli_query($con,"select price from bakery where id='$id'");
        if(mysqli_num_rows($res)>0){
          $row=mysqli_fetch_assoc($res);
          return $row['price'];
    }
}
    function removeBakeryFromCart($id){
        if(isset($_SESSION['FOOD_USER_ID'])){
            global $con;
            $res=mysqli_query($con,"delete from bakery_cart where bakery_id='$id' and user_id=".$_SESSION['FOOD_USER_ID']);
        }else{
          unset($_SESSION['cart'][$id]);  
        }
        
    }
    
    
?>