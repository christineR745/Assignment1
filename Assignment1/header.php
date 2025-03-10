<?php 
session_start();

include "db.php";
include_once "config/Database.php";
include_once "functions.php";
include_once "controller/StudentController.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include_once "navigation.php";
?>