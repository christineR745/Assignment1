<?php
include_once "header.php";
include_once "navigation.php";

$controller = new StudentController();

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(isset($_POST['add_student'])){
        $id = $_POST['studentID'];
        $name = $_POST['studentName'];
        $email = $_POST['studentEmail'];
        $controller->addStudent($id, $name, $email);       
    }
    if(isset($_POST['delete_student'])){
        if (!isset($_POST['id']) || empty($_POST['id'])) {
            die("Error: ID is missing in POST request.");
        }
        $controller->deleteStudent($_POST['id']);
    }
}else{
    redirect("dashboard.php");
}

?>

<?php include "footer.php"; ?>