<?php
  session_start();
//User session in ['user']
if(isset($_SESSION['Id'])){

  session_unset();
  session_destroy();
 // session_write_close();
 // setcookie(session_name(),'',0,'/');
 // session_regenerate_id(true);
}
?>
<script>
location.href="./index.php";
</script>