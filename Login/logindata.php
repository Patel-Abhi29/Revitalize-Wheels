<?php
 session_start();
    include "../connect.php";
   
    $email = $_POST['email'];
   $password = $_POST['password'];
   
   if($email == 'admin@gmail.com' && $password =='1234' ){
    $_SESSION["email"] = $email;
    $stmt = "SELECT * FROM usersdata WHERE email = '$email' AND password = '$password'";
    $result=mysqli_query($conn,$stmt);
    $row = $result->fetch_assoc();
    $_SESSION["id"] = $row['id'];
    $_SESSION["status"] = 1;
    $_SESSION["admin"] = 1;
    header("Location:../index.php");
   }
 $stmt = "SELECT * FROM usersdata WHERE email = '$email' AND password = '$password'";
   $result=mysqli_query($conn,$stmt);
   $row = $result->fetch_assoc();
   if(mysqli_num_rows($result) == 1)
   {
    $_SESSION["email"] = $email;
    $_SESSION["status"] = 1;
    $_SESSION["id"] = $row['id'];
    header("Location:../index.php");

   }
   else
   {  

    $_SESSION["status"] = 0;
        echo "Invalid EmaiL"; 
    }

  $conn -> close(); 
?>