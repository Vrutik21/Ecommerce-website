<?php
 require 'helper.php';

//error variable
$error = array();

$firstName = validate_text($_POST['firstName']);
if (empty($firstName)){
    $error[] = "You forgot to enter your first name";
}

$lastName = validate_text($_POST['lastName']);
if (empty($lastName)){
    $error[] = "You forgot to enter your last name";
}

$email = validate_email($_POST['email']);
if (empty($email)){
    $error[] = "You forgot to enter your email";
}

$password = validate_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}

$confirmPwd = validate_text($_POST['confirm_pwd']);
if (empty($confirmPwd)){
    $error[] = "You forgot to enter your confirm password";
}

if (empty($error)){

//    Register a new user
    $hashed_pass = password_hash($password,PASSWORD_DEFAULT);
    require 'connection.php';

//    implement a query
    $query = "INSERT INTO login (user_id,firstName,lastName,email,password,registerDate)";
    $query .= "VALUES ('',?,?,?,?,NOW())";

//    initialize a statment
    $q=mysqli_stmt_init($con);

//    prepare statement
    mysqli_stmt_prepare($q,$query);

//    bind values
    mysqli_stmt_bind_param($q,'ssss',$firstName,$lastName,$email,$hashed_pass);

//    execute stmt
    mysqli_stmt_execute($q);

    if (mysqli_stmt_affected_rows($q)==1){

//        start a new session
        session_start();

//        create session variable
        $_SESSION['user_id']=mysqli_insert_id($con);
        header('Location:login.php');
        exit();
    }
    else{
        print "Error while registration";
    }

}else{
    echo "not validate";
}

