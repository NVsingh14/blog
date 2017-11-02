<?php
include('../class/class_main.php'); 
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$mobile = $_REQUEST['mobile'];
$address = $_REQUEST['address'];
$res =$objmain->user_insert($name,$email,$mobile,$address);
if($res==1)
{
	echo "User Added Successfully";

}
else
{
	echo "try";
}

?>