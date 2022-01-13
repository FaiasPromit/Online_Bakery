jQuery('#id_form_register').on('submit',function(e){
  jQuery('.error_field').html('');
  jQuery('#register_submit').attr('disabled',true);
  jQuery('#form_msg').html('Please wait...');
  jQuery.ajax({
    url:'front_register_submit.php',
    type:'post',
    data:jQuery('#id_form_register').serialize(),
    success:function(result){
      jQuery('#form_msg').html('');
      jQuery('#register_submit').attr('disabled',false);
      var data=jQuery.parseJSON(result);
      if(data.status=='error'){
        jQuery('#'+data.field).html(data.msg);
      }
      if(data.status=='success'){
        jQuery('#form_msg').html('Thank you for registering. Please check your email to verify your email id.');
        // window.location.href='front_index.php';
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
        // jQuery('#form_login_msg').html(data.msg);
      }
    }
  });
  e.preventDefault();
});
jQuery('#frmForgotPassword').on('submit',function(e){
  jQuery('#forgot_submit').attr('disabled',true);
  jQuery('.login_field').html('');
  jQuery('#form_forgot_msg').html('Please Wait ...');
  jQuery.ajax({
    url:'front_register_submit.php',
    type:'post',
    data:jQuery('#frmForgotPassword').serialize(),
    success:function(result){
      var data=jQuery.parseJSON(result);
      if(data.status=='error'){
        jQuery('#form_forgot_msg').html(data.msg);
      }
      if(data.status=='success'){
        jQuery('#form_forgot_msg').html(data.msg);
      }
    }
  });
  e.preventDefault();
});
function add_to_cart(id,type){
  var qty=jQuery('#qty'+id).val();
  var attr=id;
  if(type=='update'){
    jQuery.ajax({
      url:'manage_cart.php',
      type:'post',
      data:'qty='+qty+'&attr='+attr+'&type=add',
      success:function(result){
        // window.location.href=window.location.href; 
        var data=jQuery.parseJSON(result);
        // alert("Successful Message");
        // $_SESSION['MSG']="Your data is saved";
        // Header( 'Location: front_cart.php');
        window.location.reload();
       
        // jQuery('#totalCartBakery').html('['+data.totalCartBakery+']');
        // jQuery('#totalPrice').html(' '+data.totalPrice+[' Taka']); 
      }
    });
  }else{
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
          jQuery('#totalCartBakery').html('['+data.totalCartBakery+']');
          jQuery('#totalPrice').html(' '+data.totalPrice+[' Taka']); 
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
  
  
}
  function delete_cart(id,is_type){
    jQuery.ajax({
      url:'manage_cart.php',
      type:'post',
      data:'attr='+id+'&type=delete',
      success:function(result){
        if(is_type=='load'){
          window.location.reload();
        }else{
          var data=jQuery.parseJSON(result);
        // console.log(data);
          jQuery('#totalCartBakery').html('['+data.totalCartBakery+']');
          jQuery('#totalPrice').html(' '+data.totalPrice+[' Taka']); 
          jQuery('#shop_added_msg_'+id).html(' --- ');
        }
        
      }
    });
  }


  jQuery('#frmProfile').on('submit',function(e){
    jQuery('#profile_submit').attr('disabled',true);
    jQuery('#form_msg').html('Please wait...');
    jQuery.ajax({
      url:'update_profile.php',
      type:'post',
      data:jQuery('#frmProfile').serialize(),
      success:function(result){
        var data=jQuery.parseJSON(result);
        if(data.status=='success'){
          swal("Congratulations,Your Account has been updated")
          .then((value) => {
          window.location.reload();
        });
          
        }
        jQuery('#profile_submit').attr('disabled',false);
        jQuery('#form_msg').html(data.msg);
      }
    });
    e.preventDefault();
  });
  jQuery('#frmPassword').on('submit',function(e){
    jQuery('#password_form_msg').html('Please wait...');
    jQuery.ajax({
      url:'update_profile.php',
      type:'post',
      data:jQuery('#frmPassword').serialize(),
      success:function(result){
        var data=jQuery.parseJSON(result);
        if(data.status=='success'){
          swal({
            title: "Congratulations",
            text: "Profile has been updated",
            icon: "success",
          });
          jQuery('#password_form_msg').html(data.msg);
          jQuery('#password_form_msg_2').html('');
        }else{
          jQuery('#password_form_msg_2').html(data.msg);
          jQuery('#password_form_msg').html('');
          swal("Error Message",data.msg,"error");
        }
        
      }
    });
    e.preventDefault();
  });
  