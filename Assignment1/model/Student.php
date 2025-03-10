<?php

    class Student{
        private $conn;
        public $id;
        public $name;
        public $email;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
            $query = "SELECT * FROM students";
            return $this->conn->query($query);
        }

        public function create(){
            $query = "INSERT INTO students(id, name, email) VALUES ('" . $this->id . "', '" . $this->name . "', '" . $this->email . "')";
            return $this->conn->query($query);
        }

        public function delete(){
            // $query = "DELETE FROM students WHERE id = " . $this->id;
            // return $this->conn->query($query);
            
            $query = "DELETE FROM students WHERE id = ?";
            $prepquery = $this->conn->prepare($query);
            $prepquery->bind_param("i", $this->id);
            return $prepquery->execute();
        }
    }
?>