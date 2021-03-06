<?php session_start(); ?>
<?php
$_SESSION['user_id']=null;
$_SESSION['phone']=null;
$_SESSION['surname']=null;
$_SESSION['name'];
$_SESSION['admin_id']=null;
$_SESSION['admin_username']=null;
$_SESSION['admin_name']=null;
$_SESSION['admin_password']=null;
//
$_SESSION['doctor_id']=null;
$_SESSION['doctor_username']=null;
$_SESSION['doctor_name']=null;
header("Location: ../index.php");
?>
