<?php
include('data/db.php'); 
$id=$_GET['id'];
$query=$conn->prepare("DELETE FROM `product` WHERE id_product='$id';");
$query->execute();
header("location:http://localhost/shopnow/adminUserface.php?poduct"); 
?>