<?php

function Clean($data){
$input =trim($data);
$input = strip_tags($input);
$input =stripslashes($input);
return $input;
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = Clean($_POST['name']);
    $email = Clean($_POST['email']);
    $password = Clean($_POST['password']);
    $address =Clean ($_POST['address']);
    $url = Clean($_POST['url']);
    $gender=Clean($_POST['gender']);

    $errors =[];
 if(isset($_POST['submit'])){
        if(empty($name)){
        $errors['name']="Name is required";
     }
     elseif (filter_var($name, FILTER_SANITIZE_STRING)==FALSE) {
        $errors['name'] ="The Name is not a valid name must be string address"."<br>";
     }

     if(empty($email)){
        $errors['email']="Email is required.......";
     }
     elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE ){
     echo("$email is not a valid email address")."<br>";
     }

        if(empty($password)){
            $errors['password']="password is required........";
        }
        elseif(strlen($password) < 6){
        $errors['password']= "password length must be >=6 ";
        }


        if(empty($address)){
            $errors['address']="address is required...........";
        }
        elseif(strlen($address) <10){
        $errors['address'] ="address length must be >=10";
        }


        if(empty($url)){
        $errors['url']="Url is required.......";
        }
        elseif(filter_var($url, FILTER_VALIDATE_URL)==FALSE ){
        $errors['url']="url is not a valid URL address"."<br>";
        }
        elseif(!strpos($url,"linkedin")){
            $errors['url']= 'url is not linkedin';
        }

        if(empty($gender)){
        $errors['gender']="gender is required";

        }
        elseif($gender =='male'){
            $gender="Gender :  male";
        }
        elseif ($gender =='female') {
            $gender="Gender : female";
        }
   
        ////////////////////////upload file///////////////

     if(!empty($_FILES['file']['name'] )){
        $fileName       = $_FILES['file']['name'];
        $fileTempName   = $_FILES['file']['tmp_name'];
        $fileType       = $_FILES['file']['type'];
        $fileSize       = $_FILES['file']['size'];

        $allowExtensions =['pdf'];
        $fileArray = explode('/',$fileType );
        $fileExtension = end($fileArray);
    
        if(in_array($fileExtension,$allowExtensions)){
            $FinalName = time() . rand() . '.' . $fileExtension;

            $disPath = 'upload/'.'.'.$FinalName;
                if (move_uploaded_file($fileTempName, $disPath)) {
                    echo 'File Uploaded Succ '."<br>";
                } else {
                    echo 'No file uploaded'; 
                }

            }       else{ $errors['file']= 'InValid Extension File .... ';}
            }else{
                $errors['file']=' file is required...............';

                }
                

                if(count($errors) > 0){
                    foreach ($errors as $key_errors => $value_errors) {
                        echo $key_errors.': '.$value_errors."<br>";
                    }
                }
                else{
                echo'Name :'.$name."<br>".'Email : '. $email."<br>".'Password :'.$password."<br>".
                'Adress :'.$address."<br>".'URL : '.$url."<br>".$gender;
                }
     }  
        
            
    } 
?>