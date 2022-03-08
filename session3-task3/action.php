<?php
 $name=$email=$password= $address="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $url = $_POST['url'];
}

if(isset($_POST['submit'])){
    if(empty($name)){
        $nameError="Name is required";
        echo $nameError."<br>";
    }
    elseif (filter_var($name, FILTER_SANITIZE_STRING)==FALSE) {
        echo("$name is not a valid name must be string address")."<br>";
    }
    else{
    echo "The Name is  : ".$name."<br>";
    }
    
    if(empty($email)){
        $emailError="Email is required.......";
        echo $emailError."<br>";
    }
    elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE ){
     echo("$email is not a valid email address")."<br>";
    }
    else{
    echo "The email is : ".$email."<br>";
    }
    
    if(empty($password)){
        $passwordError="password is required........";
        echo $passwordError."<br>";
    }
    elseif(strlen($password) == 6){
        echo "The password is  : ".$password."<br>";

    }
    else{
        echo "The password is lower than 6 ....... " ."<br>";
    }
    
    if(empty($address)){
        $addressError="address is required...........";
        echo $addressError."<br>";
    }
    elseif(strlen($address) !==10){
        echo("$address must be 10 char")."<br>";
    }
    else{
    echo "The address is  : ".$address."<br>";
    }
}
 
if(empty($url)){
    $UrlError="Url is required.......";
    echo $UrlError."<br>";
}
elseif(filter_var($url, FILTER_VALIDATE_URL)==FALSE ){
 echo("$url is not a valid URL address")."<br>";
}
else{
echo "The email is : ".$url."<br>";
}
?>
