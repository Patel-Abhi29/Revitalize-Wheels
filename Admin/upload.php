<?php


$conn = new mysqli('localhost','root','','revitalize_wheels');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$product_type = $_POST["product_type"];
$product_name = $_POST["name"];
$price = $_POST["price"];
$fuel_type = $_POST["fuel_type"];
$mileage = $_POST["mileage"];
$fuel_capacity = $_POST["fuel_capacity"];
$top_speed = $_POST["top_speed"];
$gears = $_POST["gears"];

// Image upload handling
if (isset($_POST["submit"])) {
    // Create a directory to store uploaded images
       $target_file1 =$_FILES["image1"]["name"];
       $target_file2 =$_FILES["image2"]["name"];
       $target_file3 =$_FILES["image3"]["name"];
       $uploadOk = 1;
       $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
       $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
       $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));

    if ($uploadOk == 1) {
            
        // Insert product information and image file path into the database
        $image_path1 = $target_file1;
        $tmp1=$_FILES["image1"]["tmp_name"];
        $location1='ProductImage/'.$image_path1;
        move_uploaded_file($tmp1,$location1);

        $image_path2 = $target_file2;
        $tmp2=$_FILES["image2"]["tmp_name"];
        $location2='ProductImage/'.$image_path2;
        move_uploaded_file($tmp2,$location2);

        $image_path3 = $target_file3;
        $tmp3=$_FILES["image3"]["tmp_name"];
        $location3='ProductImage/'.$image_path3;
        move_uploaded_file($tmp3,$location3);


        $sql = "INSERT INTO products (product_type, product_name, price,fuel_type,mileage,fuel_capacity,top_speed,gears ,image_path1,image_path2,image_path3) VALUES ('$product_type', '$product_name', '$price', '$fuel_type', '$mileage','$fuel_capacity', '$top_speed', '$gears', '$image_path1', '$image_path2', '$image_path3')";

        if ($conn->query($sql) === TRUE) {
            echo "Product uploaded successfully and added to the database.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
}






    }   