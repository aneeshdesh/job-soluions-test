<?php
session_start();
if(!isset($_SESSION['Id'])){
	header('Location: ./logout.php' );
}
require('./phpincludes/connection.php');



$TaskDescription=$_POST['TaskDescription'];
$TaskDueDate=date('Y-m-d',strtotime($_POST['TaskDueDate']));
$Status=$_POST['Status'];
$Modified_date=date('Y-m-d H:i:s');
$Modified_by=$_SESSION['Id'];
$Id=$_POST['Id'];
if($_SESSION['AccessLevel']=='Manager'){
$AssignedTo=$_POST['AssignedTo']; 
}
//echo "<pre>";
//print_r($_POST);
//exit();
if($_SESSION['AccessLevel']=='Manager'){
	$sql = "UPDATE tbl_tasks SET TaskDescription='$TaskDescription',TaskDueDate='$TaskDueDate',Status='$Status', Modified_date='$Modified_date', Modified_by='$Modified_by', AssignedTo='$AssignedTo' WHERE Id=".$Id;
}else{
	$sql = "UPDATE tbl_tasks SET TaskDescription='$TaskDescription',TaskDueDate='$TaskDueDate',Status='$Status', Modified_date='$Modified_date', Modified_by='$Modified_by' WHERE Id=".$Id;
}
//exit();
if ($connection->query($sql) === TRUE) {
	
	$_SESSION['successmsg']="Task Updated successfully";
	?>
	<script>
		alert('Task Updated successfully');
		location.href="./tasks-list.php";
	</script>
	<?php
} else {
    //echo "Error: " . $sql . "<br>" . $connection->error;
	$_SESSION['errormsg']="Error: " . $sql . "<br>" . $connection->error;
	?>
	<script>
		alert('Error while Updating Task!!!');
		location.href="./edit-task.php?val="+<?php echo base64_decode($_GET['Id']); ?>;
	</script>
	<?php
}

?>
