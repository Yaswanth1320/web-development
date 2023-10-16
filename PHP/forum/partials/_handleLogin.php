<?php
$showError = "false";
if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){
    include '_db_connect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $sql = "SELECT * FROM `users_table` WHERE `username` = '$email'";
    $result = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($result);
    if($numrow == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $email;
            echo "logged in";
            header("Location: ../index.php");
        }
        header("Location: ../index.php");
        }
    }
    
    ?>