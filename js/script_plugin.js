jQuery(document).ready(function($){
  $("#submit").click(function(){


    alert("test script ok");



    var name = $("#name").val();
    var address = $("#address").val();
    var phone = $("#phone").val();
    var website = $("#website").val();
    var description = $("#description").val();

    $.ajax({
      type : "post",
      dataType : "json",
      // url : "<?php echo admin_url('admin-ajax.php');?>",
      url : ajaxobject.ajaxurl,
      data : {
          action: "form",
          name: name,
          address: address,
          phone: phone,
          website: website,
          description: description
      },
      beforeSend: function(){
          //$('#elm-load-data').html('Updating ...');
      },
      success: function(response) {
          
          // var a = JSON.parse(response.data);
          console.log(response.msg);
      },

      error: function( jqXHR, textStatus, errorThrown ){
          //$(this).val($val);
          //alert('Error: '+errorThrown);
          console.log( 'The following error occured: ' + textStatus, errorThrown );
          
      }
  });

    // alert(name+address+phone+website+description);
  });
});

