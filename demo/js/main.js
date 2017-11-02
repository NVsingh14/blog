/* Javascript funciton are here*/

  //insert function with validation code start here
  function validate()
    {
      var name = document.getElementById("name").value;
      var email = document.getElementById("email").value;
      var mobile= document.getElementById("mobile").value;
      var add = document.getElementById("address").value;
      if(name=="")
      {
        document.getElementById("name").style.border="1px solid red";
        document.getElementById("errname").innerHTML="Please Enter Name";
        return false;
      }
      if(email=="")
      {
        document.getElementById("name").style.border="none";
        document.getElementById("errname").innerHTML="";
        document.getElementById("email").style.border="1px solid red";
        document.getElementById("erremail").innerHTML="Please Enter Email Address";
        return false;
      }
      else if(! email.match(/^[a-zA-Z0-9.]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$/))
      {
        document.getElementById("name").style.border="none";
        document.getElementById("errname").innerHTML="";
        document.getElementById("email").style.border="1px solid red";
        document.getElementById("erremail").innerHTML="Please Enter Valid Email Address";

        return false;
      }
      if(mobile=="")
      {
        document.getElementById("name").style.border="none";
        document.getElementById("errname").innerHTML="";
        document.getElementById("email").style.border="none";
        document.getElementById("erremail").innerHTML="";
        document.getElementById("mobile").style.border="1px solid red";
        document.getElementById("errcont").innerHTML="Please Enter Mobile Number";
        return false;
      }
      if(add=="")
      {
        document.getElementById("name").style.border="none";
        document.getElementById("errname").innerHTML="";
        document.getElementById("email").style.border="none";
        document.getElementById("erremail").innerHTML="";
        document.getElementById("mobile").style.border="none";
        document.getElementById("errcont").innerHTML="";
        document.getElementById("address").style.border="1px solid red";
        document.getElementById("erradd").innerHTML="Please Enter Address";
        return false;
      }

      if(name!="" && email!="" && mobile!="" && address!="" )
      {
        //alert("hello");
        var dataString = 'name='+name+'&email='+email+'&mobile='+mobile+'&address='+add;
        $.ajax({
type: "POST",
url: "ajax/user_add.php",
data: dataString,
cache: false,
success: function(result){
alert(result);
//$("#msg").css('display':'block');
//$("#msg").css('display':'block');
//$("#msg").html(result);
$("#name").val('');
$("#email").val('');
$("#mobile").val('');
$("#address").val('');
}
});
    }
  }          



function update_status(str,st)
	{
		var id=str;
		var status = st;
		var dataString = 'id='+id+'&status='+status;
		
		$.ajax({
type: "POST",
url: "ajax/status_update.php",
data: dataString,
cache: false,
success: function(result){
//alert(result);
//$("#msg").show();
//$("#msg").html(result);
}
});
	}

	//delete user functionality
	function delete_user(id)
	{
		 var x = confirm("Are you sure you want to delete?");
  		if (x)
 {     //	return true;
  var dataString = 'id='+id;
  $.ajax({
  	type: "POST",
  	url: "ajax/delete_user.php",
  	data: dataString,
  	cache: false,
  	success: function(result) {
  		//alert(result);
  	}
  });
}
  		else
  		{
    	return false;
    }
	}

  //update function start here

    function update(str)
  {
    //var id=str;
    var name = $("#name").val();
    var email=$("#email").val();
    var mobile = $("#mobile").val();
    var address= $("#address").val();
    

    var dataString = 'uid='+str+'&name='+name+'&email='+email+'&mobile='+mobile+'&address='+address;
        $.ajax({
          type: "POST",
          url: "ajax/user_update.php",
          data: dataString,
          cache: false,
          success: function(result){
          //alert(result);

                      }
            });

  }
  function isNumberKey(evt){
         var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
         }