<?php 
$hostname="localhost";
$password="";
$username="root";
$database="student";

		try
		{
			$dbo = new PDO('mysql:host='.$hostname.';dbname='.$database,$username,$password);
		}
		catch(PDOException $e )
		{
			print"Error!:" . $e->getMessage() . "<br/>";
		}
?>