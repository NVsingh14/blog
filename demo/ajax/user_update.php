<?php 
include('../class/class_main.php');
$id=$_REQUEST['uid'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$mobile = $_REQUEST['mobile'];
 $address = $_REQUEST['address'];
$res = $objmain->update_user($id,$name,$email,$mobile,$address);
if($res)
{
	echo"updated succussfully";

}
else
{
	echo"try again ";
}
?>