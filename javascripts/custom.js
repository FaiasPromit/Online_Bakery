jQuery('#id_form_register').on('submit',function(e){
  jQuery('.error_field').html('');
  jQuery.ajax({
    url:'front_register_submit.php',
    type:'post',
    data:jQuery('#id_form_register').serialize(),
    success:function(result){
      var data=jQuery.parseJSON(result);
      if(data.status=='error'){
        jQuery('#'+data.field).html(data.msg);
      }
      if(data.status=='success'){
        window.alert('Congratulations!! Account created. Press OK to continue');
        window.location.href='front_index.php';
      }
    }
  });
  e.preventDefault();
});
jQuery('#frmLogin').on('submit',function(e){
  jQuery('.login_field').html('');
  jQuery.ajax({
    url:'front_register_submit.php',
    type:'post',
    data:jQuery('#frmLogin').serialize(),
    success:function(result){
      var data=jQuery.parseJSON(result);
      if(data.status=='error'){
        jQuery('#form_login_msg').html(data.msg);
      }
      if(data.status=='success'){
        window.location.href='front_index.php';
      }
    }
  });
  e.preventDefault();
});
function add_to_cart(id,type){
  var qty=jQuery('#qty'+id).val();
  var attr=id;
  if(qty>0 ){
    jQuery.ajax({
      url:'manage_cart.php',
      type:'post',
      data:'qty='+qty+'&attr='+attr+'&type='+type,
      success:function(result){
        // console.log(result);
        jQuery('#shop_added_msg_'+attr).html('[Added-'+qty+']');
        var data=jQuery.parseJSON(result);
        swal({
          title: "Congratulations",
          text: "Item Added to the cart",
          icon: "success",
        });
        // totalCartBakery=jQuery('#totalCartBakery').html();
        // totalCartBakery++;
        jQuery('#totalCartBakery').html(data.totalCartBakery);
        jQuery('#totalPrice').html(data.totalPrice);
        // alert(data.totalCartBakery);
      }
    });
  }else{
    swal({
      title: "Please",
      text: "Select quantity and then add to cart",
      icon: "error",
    });
  }
}
  function delete_cart(id){
    jQuery.ajax({
      url:'manage_cart.php',
      type:'post',
      data:'attr='+id+'&type=delete',
      success:function(result){
        
      }
    });
  }