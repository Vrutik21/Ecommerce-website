<?php
require 'connection.php';

//error variable
$error = array();

$email = validate_email($_POST['email']);
if (empty($email)){
    $error[] = "You forgot to enter your email";
}

$password = validate_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

if (empty($error)){

//    sql query
    $query = "SELECT user_id,firstName,lastName,email,password FROM login WHERE email=?";

//    initialize a statement
    $q = mysqli_stmt_init($con);

//    prepare the statement
    mysqli_stmt_prepare($q,$query);

//    bind parameter
    mysqli_stmt_bind_param($q,'s',$email);

//    execute query
    mysqli_stmt_execute($q);

    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if (!empty($row)){
//        verify password
        if(password_verify($password,$row['password'])){
            header("Location: index.php");
            exit();
        }
        else{
            header("Refresh:0;   login.php");
            echo "<script>alert('Email or password incorrect!');</script>";
        }
    }
}
else{
    echo "<script>alert('Please fill out the details to continue.');</script>";
}