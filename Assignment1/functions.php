<?php

function is_logged_in(){
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

function user_exists_email($conn, $email){
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

function user_exists_name($conn, $username){
    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

function redirect($page){
    header("Location: $page");
    exit;
}
