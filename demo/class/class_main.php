<?php 
class Main 
{
public $dbo;
	
	public function __construct() 
	{
		global $dbo;
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$database = "student";
		try
		{
			$dbo = new PDO('mysql:host='.$hostname.';dbname='.$database,$username,$password);
		}
		catch(PDOException $e)
		{
			print"Error!: " .$e->getMessage(). "<br/>";
		}
	}


//functionality start here
public function user_insert($name,$email,$mobile,$address)
{
	global $dbo;
	$sql = $dbo->prepare("insert into user set name='".$name."',email='".$email."',mobile='".$mobile."',address='".$address."'");
	return $sql->execute();
}
	public function add_user($post)
	{
		global $dbo;
		$q = "insert into user set name=:a,email=:b,mobile=:c,address=:d";
		$sql=$dbo->prepare($q);
		$sql->bindParam(':a',$post['name'],PDO::PARAM_STR,200);
		$sql->bindParam(':b',$post['email'],PDO::PARAM_STR,200);
		$sql->bindParam(':c',$post['mobile'],PDO::PARAM_STR,200);
		$sql->bindParam(':d',$post['address'],PDO::PARAM_STR,200);
		$sql->execute();
		$no = $sql->rowCount();
		if($no>0)
		{
			return 1; 
		}
		else
		{
			return 0;
		}
	}

	public function update_status($id,$st)
	{
		global $dbo;
		$sql=$dbo->prepare("update user set status='".$st."' where id='".$id."'");
		return $sql->execute();

	}
	public function delete_user($id)
	{
		global $dbo;
		$sql=$dbo->prepare("delete from user where id='".$id."'");
		return $sql->execute();

	}

	public function update_user($id,$name,$email,$mobile,$address)
	{
		global $dbo;
		$sql=$dbo->prepare("update user set name='".$name."',email='".$email."',mobile='".$mobile."',address='".$address."' where id='".$id."'");
		//$sql->bindParam(':a',$post['name'],PDO::PARAM_STR,200);
		//$sql->bindParam(':b',$post['email'],PDO::PARAM_STR,200);
		//$sql->bindParam(':c',$post['mobile'],PDO::PARAM_STR,200);
		//$sql->bindParam(':d',$post['address'],PDO::PARAM_STR,200);
		return $sql->execute();
	}
	

}
$objmain = new Main;
?>