<?php

function validate_text($textValue){
    if (!empty($textValue)){
        $trim_text = trim($textValue);
//        remove illegal characters
        $sanitize_str = filter_var($trim_text,FILTER_SANITIZE_STRING);
        return $sanitize_str;
    }
    return '';
}

function validate_email($emailValue){
    if (!empty($emailValue)){
        $trim_text = trim($emailValue);
//        remove illegal characters
        $sanitize_str = filter_var($trim_text,FILTER_SANITIZE_EMAIL);
        return $sanitize_str;
    }
    return '';
}

function get_user_info($con,$userID){
    $query = "SELECT firstName,lastName,email FROM login WHERE user_id=?";
    $q = mysqli_stmt_init($con);

    mysqli_stmt_prepare($q,$query);

    mysqli_stmt_bind_param($q,'i',$userID);

    mysqli_stmt_execute($q);
    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result);

    return empty($row) ? false : $row;
}