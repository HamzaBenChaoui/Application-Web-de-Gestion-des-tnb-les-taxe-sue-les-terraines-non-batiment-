<?php
session_start();
$date = $_POST['namout'];
$_SESSION['namout']=$date;
header('location: liste_T.php');

?>