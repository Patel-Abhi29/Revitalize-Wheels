<?php



$conn = new mysqli('localhost','root','','revitalize_wheels');
if($conn -> connect_error){
    die("Connection failed: " . $conn -> connect_error);
}


 
   ?>