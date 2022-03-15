<?php
session_start();
$server = "localhost";
$dbUser = "root";
$dbPassword= "";
$dbName = "task";

$conn = mysqli_connect($server,$dbUser,$dbPassword,$dbName);
if(!$conn){
    die('Error'. mysqli_connect_error());
}

?>