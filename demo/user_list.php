<?php 
include('config/config.php');
include('class/class_main.php');
?>
<?php 
if(@$_REQUEST['sid']!='')
{
	$id=base64_decode($_REQUEST['sid']);
	$status=$_REQUEST['st'];
	if($status==0)
	{
		$status=1;
	}
	else
	{
		$status=0;
	}
	$res=$objmain->update_status($id,$status);

}
if(isset($_REQUEST['id']))
{
	$id=base64_decode($_REQUEST['id']);
	$res=$objmain->delete_user($id);
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
	<div class="row">
		<h1 class="page-header">Users List</h1>
	</div>

	<div class="row">
	
	<div class="alert alert-block alert-success" style="display: none;" id="msg">Status Updated Successfully</div>

	<table class="table table-striped table-hover ">
	<?php 
$sql=$dbo->prepare("select * from user order by id asc");
$sql->execute();
	?>
  <thead>
    <tr>
      <th>Sno.</th>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Address</th>
      <th>Status</th>
      <th>Action</th>

    </tr>
  </thead>
  <tbody>
  <?php $i=1;
while($row=$sql->fetch(PDO::FETCH_ASSOC)){
  ?>
    <tr>
      <td><?=$i;?></td>
      <td><?=$row['name'];?></td>
      <td><?=$row['email'];?></td>
      <td><?=$row['mobile']?></td>
      <td><?=$row['address']?></td>
      <td><?php if($row['status']==1){ ?>
      <a href="" class="btn btn-success" onclick="update_status(<?=$row['id']?>,<?=$row['status']?>)">Active</a>
      <?php } else { ?>
      <a href="" class="btn btn-danger" onclick="update_status(<?=$row['id']?>,<?=$row['status']?>)">InActive</a>
      <?php } ?>
      </td>
<td>
	<a href="insert.php?edit=<?=base64_encode($row['id']);?>" class="btn btn-primary">Edit</a>
	<a href="" class="btn btn-danger" onclick="delete_user(<?=$row['id']?>)">Delete</a>

</td>
    </tr>
    <?php $i++;
    } 
    ?>
  </tbody>
</table> 
	</div>
</div>
</body>
</html>