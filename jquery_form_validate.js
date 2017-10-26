$(document).ready(function(){
  $("#formCont").validate({  
    errorElement: "span",
    ignore:[],
    rules:{
      name: "required",
      email:{
        required:true,
        email:true
      },
      phone:{
        required:true,
        minlength:10,
        maxlength:15
      },
      subject:"required",
      message:"required"
    },
    submitHandler : function() {
      var name=$("#name").val();
      var email = $("#email").val();
      var phone = $("#phone").val();
      var sub = $("#subject").val();
      var msg = $("#message").val();
      $.ajax({
        type:'GET',
        url: 'ajax_contactus.php',
        data : {
          name:name,
          email:email,
          phone:phone,
          subject:sub,
          message:msg
        },
        success: function(data)
        {
          alert(data);
        }
      })
    }
  })
});

//phone number validation

function isNumberKey(evt){
         var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
         }
