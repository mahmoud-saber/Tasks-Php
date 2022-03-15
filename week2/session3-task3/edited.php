<?php
include_once('dbconnect.php');


# Fetch Id Data ......
$id = $_GET['id'];

$sql = "select * from info where id = $id";
$quary = mysqli_query($conn,$sql);
# Fetch Data
$data = mysqli_fetch_assoc($quary);





function Clean($data){
    $input =trim($data);
    $input = strip_tags($input);
    $input =stripslashes($input);
    return $input;
    }


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $title = Clean($_POST['title']);
    $content =Clean( $_POST['content']);
    $errors  =[];

# Validate ......

if(empty($title)){
    $errors['title']= 'The title is required';
}
elseif (filter_var($title,FILTER_SANITIZE_STRING)===FALSE) {
   $errors['title']='title is not string'; 
}
if(empty($content)){
    $errors['content']= 'The content is required';
}
elseif (filter_var($content,FILTER_SANITIZE_STRING )===FALSE) {
    $errors['content']='content is not string'; 
 }

elseif (strlen($content) <5) {//>50
    $errors['content']= 'The content length is >50'."<br>";
}
///////////////////
if (!empty($_FILES['image']['name'])) {

    $imgName    = $_FILES['image']['name'];
    $imgTemName = $_FILES['image']['tmp_name'];
    $imgType    = $_FILES['image']['type'];
    $imgSize    = $_FILES['image']['size'];

    $allowedExtensions = ['jpg', 'png','jpeg'];

    $imgArray = explode('/', $imgType);

    $imageExtension = end($imgArray);
    if (in_array($imageExtension, $allowedExtensions)) {

        $FinalName = time() . rand() . '.' . $imageExtension;

        $disPath = 'upload/' . $FinalName;


        if (move_uploaded_file($imgTemName, $disPath)) {
            // echo 'Image Uploaded Succ';
        } else {
            $errors['image']= 'Error try Again';
        }
    } else {
        $errors['image']= 'InValid Extension .... ';
    }

 


    # Check ......
    if (count($errors) > 0) {
    // print errors ....

    foreach ($errors as $key => $value) {
    # code...

    echo '* ' . $key . ' : ' . $value . '<br>';
    }
    } else {

    // code ......

    $sql = "update info set title = '$title' , content = '$content' , image = ' $disPath' where id = $id";


    $quary = mysqli_query($conn,$sql);

    if($quary){
        unlink($data['image']); 

        $message = 'Raw Updated';

        # SET SESSION .....
        $_SESSION['Message'] = $message;

        header("Location: display.php");

        }else{
        echo 'Error Try Again '.mysqli_error($conn);
        }


        mysqli_close($conn);

 
 
   }//end errors
  }//end image
 else {
    $errors['image']= '* Image Required';
} 

}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Update Account</h2>

        <form action="edited.php?id=<?php echo $data['id'];?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control" required id="exampleInputTitle" aria-describedby="" name="title"
                    placeholder="Enter Title" value="<?php echo $data['title']?>">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Content</label>
                <input type="text" class="form-control" required id="Content" aria-describedby="emailHelp"
                    name="content" placeholder="Enter Content" value="<?php echo $data['content']?>">
            </div>

            <div class="mb-3">
                <input type="file" class="form-control" aria-label="file example" name="image"
                    value="<?php echo $data['image']?>">
            </div>



            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


</body>

</html>