<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $showAlert = false;
    $showError = false;
    include 'partials/_db_connect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $existSql = "SELECT * FROM `users_table` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $num = mysqli_num_rows($result);

    if($num >0){
        $exists = true; 
        $showError = "username is already taken"; 
    }else{
        $exists = false;
        
        if (($password == $cpassword) && $username!=null) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users_table` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp());";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                $showAlert = true;
                }
        }else{
            $showError= "Passwords don't match";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Signup</title>
</head>

<body>
    <?php require "partials/_nav.php"; ?>

    <?php

    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }
    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success!</strong>   '. $showError .'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }


    ?>
    <div class="main container my-4">
        <h1 class="text-center">Signup to our website</h1>
        <form class="my-4" action="signup.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="userHelp" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
            </div>
            <button type="submit" class="btn btn-primary">Signup</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>