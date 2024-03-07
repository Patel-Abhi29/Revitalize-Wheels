<?php
    include "../connect.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
 
    $password = $_POST['password'];
    
   $stmt = "insert into usersdata(name,email,password) values('$name','$email', '$password')";
  
  if( $conn -> query($stmt)){
    header('location:login_signup.php');
  }
   
  $conn -> close(); 


?>