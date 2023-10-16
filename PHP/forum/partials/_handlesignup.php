<?php
$showError = "false";
if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){
    include '_db_connect.php';
    $username = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $exsitsql= "SELECT * FROM `users_table` WHERE `username` = '$username' ";
    $result = mysqli_query($conn, $exsitsql);
    $numrow = mysqli_num_rows($result);
    if($numrow > 0){
        $showError = "Email already exsists try other username";
    }
    else{
        if($password == $cpassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users_table` (`username`, `password`, `timestamp`) 
            VALUES ('$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: =true");
                exit();
            }
            
        }else{
            $showError = "Both passwords should be same";
           
        }
    }
     header("Location: ../index.php?signup=false&error=$showError");
}