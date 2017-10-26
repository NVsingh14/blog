<?php 
include("thebluekite_library/all_include.php");
include('global_functions.php');
$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$subject = $_GET['subject'];
$msg = $_GET['message'];
$body="";
$body .='<table border="3" cellpadding="5" cellspacing="1" width="100%" style="font-size: 12px;" bgcolor="#ccc">';
$body .= '<thead>';
$body .='<th>Name</th>';
$body .= '<th>EmailAddress:</th>';
$body .= '<th>Phone</th>';
$body .= '<th>Subject</th>';
$body .= '<th>Message</th>';
$body .= '</thead>';
$body .= '<tbody>';
$body .= '<tr>';
$body .='<td>'.$name.'</td>';
$body .='<td>'.$email.'</td>';
$body .= '<td>'.$phone.'</td>';
$body .= '<td>'.$subject.'</td>';
$body .= '<td>'.$msg.'</td>';
$body .= '</tr>';
$body .= '</tbody>';
$body .='</table>';
$attach ="";

if($name!='' && $email !='' && $phone!='' && $subject!='' && $msg!='')
{
	$res = MailObject("vishalrajput862@gmail.com",$email,"sanuj5734@gmail.com","vishalrajput862@gmail.com",$subject,$body,$attach);
	if($res)
	{
		echo"mail";
	}
	else
	{
		echo"error";
	}
}

?>
