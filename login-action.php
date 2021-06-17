<?php 
session_start();
require('./phpincludes/connection.php');


if(isset($_POST['cmdlogin'])){
//print_r($_POST);
$UserId=$_POST['UserId'];
$Password=$_POST['Password'];

$query1 = "SELECT Id,Name,UserType FROM tbl_users where UserId='$UserId' and Password='$Password' and Status='Active'"; 
$result1 = mysqli_query($connection, $query1); 
$row1 = mysqli_num_rows($result1); 

if($row1 > 0){
    $row = mysqli_fetch_assoc($result1); 
	$_SESSION['Id']= $row['Id'];
	$_SESSION['Name']= $row['Name'];
	$_SESSION['AccessLevel']= $row['UserType'];
	?>
	<script>
	location.href="./tasks-list.php";
	</script>
	<?php
}else{
	$_SESSION['errormsg']='Invalid Login Credentials';
	?>
	<script>
	location.href="./index.php";
	</script>
	<?php
}
	
}else{
	?>
	<script>
	location.href="./index.php";
	</script>
	<?php
}
?>