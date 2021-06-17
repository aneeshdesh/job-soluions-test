<?php
session_start();
if(!isset($_SESSION['Id'])){
	header('Location: ./logout.php' );
}
require('./phpincludes/connection.php');
if(isset($_GET['val']) && $_GET['val']!=""){ 
    
$Id=base64_decode($_GET['val']);

$sql = "delete from tbl_tasks WHERE Id=".$Id;

//exit();
if ($connection->query($sql) === TRUE) {
	
	$_SESSION['successmsg']="Task Delete successfully";
	?>
	<script>
		alert('Task Deleted successfully');
		location.href="./tasks-list.php";
	</script>
	<?php
} else {
    //echo "Error: " . $sql . "<br>" . $connection->error;
	$_SESSION['errormsg']="Error: " . $sql . "<br>" . $connection->error;
	?>
	<script>
		alert('Error while Deleting Task!!!');
		location.href="./tasks-list.php";
	</script>
	<?php
}
}else{
?>
    <script>
		//alert('Error while Deleting Task!!!');
		location.href="./tasks-list.php";
	</script>
<?php } ?>
