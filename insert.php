<?php 

     require ('connect.php');

     $name = $_POST['name'];
     $email = $_POST['email'];
     $number = $_POST['number'];
     $message = $_POST['message'];
     
    $stmt = "insert into contact(name,email,phone,message)values('$name', '$email', '$number', '$message')";
   if($conn -> query($stmt)){
    header('location: index.php');
   }
    
   $conn -> close(); 


?>