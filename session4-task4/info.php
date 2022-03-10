<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Form</title>
</head>

<body>
    <div class="container">
        <h2>Register</h2>

        <form action="backend.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="" name="name"
                    placeholder="Enter Name">

            </div>


            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                    placeholder="Enter email">


            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">

            </div>

            <div class="form-group">
                <label for="address">address</label>
                <input type="text" class="form-control" id="address" aria-describedby="" name="address"
                    placeholder="Enter Address">
            </div>

            <!-- ==================== -->
            <div class="form-check mb-3">
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="male">Male
                <!-- <input type="radio" class="form-check-input" id="validationFormCheck3" name="gender">
                <label class="form-check-label" for="gender" value="Male">Male</label>
                <br>
                <input type="radio" class="form-check-input" id="validationFormCheck3" name="gender">
                <label class="form-check-label" for="Gender" value="Famle">Famle</label> -->
            </div>
            <!-- ======================= -->
            <div class="form-group p-1">
                <label for="name">URL</label>
                <input type="url" class="form-control" id="url" aria-describedby="" name="url" placeholder="Enter Url">

            </div>
            <!-- ========= -->
            <div class="mb-3">
                <input type="file" class="form-control" aria-label="file example" name="file">
            </div>
            <!-- ======================= -->
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>