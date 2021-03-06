<?php session_start(); ?>
<?php
$_SESSION['admin_id']=null;
$_SESSION['admin_username']=null;
$_SESSION['admin_name']=null;
$_SESSION['admin_password']=null;
$_SESSION['admin_time']=null;
header("Location: ../index.php");
?>
