<?php
session_start();
$_SESSION = array();
unset($_SESSION["Login"]);
header("location: index.php");
exit;
?>