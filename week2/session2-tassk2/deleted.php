<?php
require 'dbconnect.php';
$id = $_GET['id'];

$sql = "select image FROM `info` WHERE `id`='$id'";
$quary = mysqli_query($conn,$sql); 
$data =mysqli_fetch_assoc($quary);


$sql = "DELETE FROM `info` WHERE `id`='$id'";
$quary = mysqli_query($conn,$sql); 
if($quary){
    
    unlink($data['image']); 

      $message =  'Raw Removed';
  }else{
      $message =  'Error Try Again';
  }
 
$_SESSION['Message'] = $message;
header("Location: display.php");
exit();
   
?>