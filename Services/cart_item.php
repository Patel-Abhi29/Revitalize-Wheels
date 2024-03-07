<?php
session_start();

include('../connect.php');


$product_id= $_POST["product_id"];
$from_date = $_POST["from_date"];
$to_date = $_POST["to_date"];
$status= 'Pending';
$user_id = $_SESSION["id"];

if(!isset($_SESSION['id'])){
  header('location: ../login/login_signup.php');
}

$stmt = "insert into cart(product_id,user_id,from_date,to_date,status) values( '$product_id','$user_id','$from_date','$to_date','$status')";
  
if( $conn -> query($stmt)){
 
  header('location: cart.php');
}
 
$conn -> close(); 


?>