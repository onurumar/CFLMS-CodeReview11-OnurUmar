<?php
ob_start();
session_start();
require_once './login/dbconnect.php';
?>

<?php include './login/index.php';?>

<?php ob_end_flush(); ?>