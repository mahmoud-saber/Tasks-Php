<?php
require 'dbconnect.php';
   if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `info` WHERE `id`='$id'";
    $quary = mysqli_query($conn,$sql); 

   
    if(!$quary){
        // echo 'Raw Inserted';
        echo 'Error Try Again '.mysqli_error($conn);

    }
    mysqli_close($conn);
   }
?>