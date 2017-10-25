/* This is the simplest ajax method you can use with jquery functionality*/
<script>
function contactme()
{
var name=$("#name").val();
var email=$("email").val();
var mobile = $("email").val();
var address = $("#address").val();
$.ajax({
    type:'GET',
    url:'ajax/contactme.php',
    data:{
    name:name,
    email:email,
    mobile:mobile,
    address:address
    },
    success : function(data)
    {
    alert(data); //you can track your result in the alert box
    $("#div").show();
    $("#div").html(data); //or you can show your success data in the div box
    //now empty all form field after the form success
    $("#name").val('');
    $("#email").val('');
    $("#mobile").val('');
    $("#address").val('');
    } //end of success controller
      
     });//end of ajax controller

} //end of function;
</script>
