<?php 
// $con=mysqli_connect('localhost','root','','ecommerce_1');
$con = new mysqli('localhost','root','','tnb');
if(!$con){
    die(mysqli_error($con));
}
?>