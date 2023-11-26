<?php
session_start();
include('includes/header.php');

$_SESSION = array();

session_destroy();

header("Location: login.php");
exit;



?>