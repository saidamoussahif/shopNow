
<?php
include('data/db.php'); 


if($_SERVER['REQUEST_METHOD']=="POST"){

    $namepr = $_POST['Name'];
    $decriptionpr = $_POST['Description'];
    $pricepr = $_POST['Price'];
    $catepr = $_POST['Category'];
    $stock = $_POST['Stock'];

    // file properties
    $file=$_FILES["image"]["tmp_name"];
    $name=$_FILES["image"]["name"];
    $extention=explode(".",$name);
    $newNmae=uniqid()."images".".".$extention[1];
    $fileUpload="uploads/".$newNmae;
    move_uploaded_file($file,$fileUpload);

    $query_prd=$conn->prepare( "INSERT INTO product (nom,description,prix,image,category,stock) VALUES
    ('$namepr','$decriptionpr',$pricepr,'$newNmae','$catepr','$stock')");
    $query_prd->execute(); 

     header("location:http://localhost/shopnow/adminUserface.php?poduct");

}

  ?>