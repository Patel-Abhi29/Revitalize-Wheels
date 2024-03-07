<?php
session_start();

$conn = new mysqli('localhost','root','','revitalize_wheels');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST["name"];
$number = $_POST["number"];
$adhar = $_POST["adhar"];
$license = $_POST["license"];
$cardNumber = $_POST["cardNumber"];
$expirationDate = $_POST["expirationDate"];
$cvv = $_POST["cvv"];
$cardName = $_POST["cardName"];



            

        $sql = "INSERT INTO checkout (name, number, adhar,license,cardNumber,expirationDate,cvv,cardName) VALUES ('$name', '$number', '$adhar', '$license', '$cardNumber','$expirationDate', '$cvv', '$cardName')";
        
        
        if ($conn->query($sql) === TRUE) {
           
            if(is_array($_SESSION['product_arr'])){
                foreach($_SESSION['product_arr'] as $productid){
                
                    
                $sql1="UPDATE cart SET status='Scheduled' where product_id=$productid";
                $conn->query($sql1);
                header("location:cart.php");
                }
            }

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

       
    






