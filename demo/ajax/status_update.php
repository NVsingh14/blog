<?php 
include('../class/class_main.php');
$id = $_REQUEST['id'];
$status = $_REQUEST['status'];

if($status==0)
{
	$status=1;
}
else
{
	$status=0;
}
$res=$objmain->update_status($id,$status);
if($res==1)
{
	echo "Status Updated Succesfully";
}
else
{
	echo "Something Went Wrong";
}
?>