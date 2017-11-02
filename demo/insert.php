<?php 
include('config/config.php');
include('class/class_main.php');

if(isset($_POST['submit']))
{
	$res=$objmain->add_user($_POST);

}
if(isset($_POST['update']))
{
	$res=$objmain->update_user($_POST);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
<div class="container">
<?php if(isset($_REQUEST['edit'])) { 
	$id=base64_decode($_REQUEST['edit']);
$sql=$dbo->prepare("select * from user where id='".$id."'");
$sql->execute();
$row=$sql->fetch(PDO::FETCH_ASSOC);
	?>

<div class="row">
	<h1 class="page-header">Edit User Details</h1> <a href="user_list.php" class="btn btn-primary pull-right">View User List</a>
	<?php if(isset($_POST['update'])) { if($res==1) { ?>
	<div class="alert alert-block alert-success">User Updated Succesfully</div>
	<?php } else{ ?>
	<div class="alert alert-block alert-danger">Something Went Wrong</div>
	<?php } 
	}?>
		<div class="row">
		<div class="form-group col-md-6">
  			<label class="control-label" for="inputSmall">Name</label>
		  	<input class="form-control input-sm" type="text" id="name" name="name" placeholder="Enter Your Name here" required="required" autocomplete="off"> value="<?=$row['name']?>" >
		</div>
		</div>

		<div class="row">
		<div class="form-group col-md-6">
  			<label class="control-label" for="inputSmall">Email Address</label>
  			<input class="form-control input-sm" type="text" id="email" name="email" placeholder="Enter Your Email here" autocomplete="off"> required="required" value="<?=$row['email']?>">
		</div>
		</div>

		<div class="row">
		<div class="form-group col-md-6">
  			<label class="control-label" for="inputSmall">Mobile</label>
  			<input class="form-control input-sm" type="text" id="mobile" name="mobile" maxlength="10" placeholder="Enter Your Mobile Number here" onkeypress="return isNumberKey(event)" autocomplete="off" value="<?=$row['mobile']; ?>" >
		</div>
		</div>
	
		<div class="row">
		<div class="form-group col-md-6">
  			<label class="control-label" for="inputSmall">address</label>
  			<textarea class="form-control" name="address" id="address"><?=$row['address']?></textarea>
		</div>
		</div>

		<div class="row">
		<div class="form-group col-md-6">
		<button class="btn btn-success" onclick="update(<?=base64_decode($_REQUEST['edit'])?>)">Update</button>
		</div>
		</div>
	</div>




<?php } else { ?>
	<div class="row">
	<h1 class="page-header">New User Registration</h1> <a href="user_list.php" class="btn btn-primary pull-right">View User List</a>
	<div class="alert alert-block alert-success" style="display: none;">User Added Succesfully</div>
	<?php if(isset($_POST['submit'])) { if($res==1) { ?>
	<div class="alert alert-block alert-success" >User Added Succesfully</div>
	<?php } else{ ?>
	<div class="alert alert-block alert-danger">Something Went Wrong</div>
	<?php } 
	}?>
	
		<div class="row">
			<span id="errname" style="color: red;"></span>
		<div class="form-group col-md-6">
	
  			<label class="control-label" for="inputSmall">Name</label>
  			<input class="form-control input-sm" type="text" id="name" name="name" placeholder="Enter Your Name here" autocomplete="off">
		</div>
		</div>

		<div class="row">
			<span id="erremail" style="color: red;"></span>
		<div class="form-group col-md-6">
  			<label class="control-label" for="inputSmall">Email Address</label>
  			<input class="form-control input-sm" type="text" id="email" name="email" placeholder="Enter Your Email here" autocomplete="off">
		</div>
		</div>

		<div class="row">
		<span id="errcont" style="color: red;"></span>
		<div class="form-group col-md-6">
  			<label class="control-label" for="inputSmall">Mobile</label>
  			<input class="form-control input-sm" type="text" id="mobile" name="mobile" maxlength="10" placeholder="Enter Your Mobile Number here" onkeypress="return isNumberKey(event)" autocomplete="off">
		</div>
		</div>

		<div class="row">
		<span id="erradd" style="color: red;"></span>
		<div class="form-group col-md-6">
  			<label class="control-label" for="inputSmall">address</label>
  			<textarea class="form-control" name="address" id="address"></textarea>
		</div>
		</div>

		<div class="row">
		<div class="form-group col-md-6">
			<button class="btn btn-success" onclick="validate()">Submit</button>
		</div>
		</div>
	</div>

	<?php } ?>
</div>
</body>
</html>