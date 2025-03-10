<?php

//include_once "../model/Student.php";
include_once __DIR__ . "/../model/Student.php";
include_once __DIR__ . "/../config/Database.php";

class StudentController{

    private $conn;
    private $studentModel;

    public function __construct(){
        $database = new Database();
        $db= $database->connect();
        $this->conn = $db;

        $this->studentModel = new Student($db);
    }

    public function index(){
        $students = $this->studentModel->read();
        return $students;
    }

    public function addStudent($id, $name, $email){
        $student = new Student($this->conn);
        $student->id = $id;
        $student->name = $name;
        $student->email = $email;
        $result = $student->create();

        if ($result) {
            echo "Student added successfully!";
        } else {
            echo "Error: " . $this->conn->error;
        }
    }

    public function deleteStudent($id){

        //$this->studentModel->id = $id;
        $student = new Student($this->conn);
        $student->id = $id;
        $result = $student->delete();
        //$result = $studentModel->delete();

        if ($result) {
            echo "Student deleted successfully!";
            exit();
        } else {
            echo "Error: " . $this->conn->error;
        }
    }
}

