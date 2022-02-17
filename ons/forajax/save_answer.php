<?php
session_start();
include ('../connnection.php');
$questionno=$_GET["questionno"];
$value1=$_GET["value1"];
$_SESSION["answer"][$questionno]=$value1;
?>