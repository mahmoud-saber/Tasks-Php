<?php

include_once('dbconnect.php');

    function Clean($data){
    $input =trim($data);
    $input = strip_tags($input);
    $input =stripslashes($input);
    return $input;
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $title = Clean($_POST['title']);
        $content =Clean( $_POST['content']);

    $errors =[];
    if(isset($_POST['submit'])){
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

         // ///////////////image///////////////
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

     } else {
            $errors['image']= '* Image Required';
        } 

        if(count($errors) > 0){
            foreach ($errors as $key_errors => $value_errors) {
            echo $key_errors.': '.$value_errors."<br>";
            }
        }
        else{



            
            $sql = "insert into info (title,content,image) values (' $title',' $content','$disPath')";
            $quary = mysqli_query($conn,$sql);

            if(!$quary){
                // echo 'Raw Inserted';
                echo 'Error Try Again '.mysqli_error($conn);

            }
            mysqli_close($conn);
        }
    }


}
    include 'header.php';
    ?>


<body>

    <div class="container">
        <h2>Register</h2>

        <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">



            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="" name="title"
                    placeholder="Enter Title">
            </div>


            <div class="form-group">
                <label for="name">Content</label>
                <input type="text" class="form-control" id="content" aria-describedby="" name="content"
                    placeholder="Enter Content">
            </div>

            <div class="mb-3">
                <input type="file" class="form-control" aria-label="file example" name="image">
            </div>




            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>