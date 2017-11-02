<?php 
include('../class/class_main.php');
$id = $_REQUEST['id'];
$del = $objmain->delete_user($id);
if($del==1)
{
	echo "deleted succussfully";
}
else
{
	echo "error occur";
}

?>