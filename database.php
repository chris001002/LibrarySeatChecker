<?php
class Database
{
    private $conn = null;
    private $database_name = "LibrarySeat";
    private $TABLE2 = "seats";
    private $TABLE1 = "users";
    function __construct()
    {
        try {
            $this->conn = mysqli_connect("localhost", "root", "");
            echo "Connected successfully";
            $sql = "CREATE DATABASE IF NOT EXISTS $this->database_name";
            $this->conn->query($sql);
            $this->conn->select_db($this->database_name);
            $sql = "CREATE TABLE IF NOT EXISTS $this->TABLE1 (
                id INT AUTO_INCREMENT PRIMARY KEY,
                studentID CHAR(12),
                email VARCHAR(255),
                name VARCHAR(255),
                password VARCHAR(255)
                )
                ";
            $this->conn->query($sql);
            $sql = "CREATE TABLE IF NOT EXISTS $this->TABLE2 (
                seatID INT AUTO_INCREMENT PRIMARY KEY,
                userID INT,
                Location VARCHAR(255),
                CONSTRAINT FK1_$this->TABLE2 FOREIGN KEY (userID) REFERENCES $this->TABLE1(id)
                )
                ";
            $this->conn->query($sql);
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    function __destruct()
    {
        $this->conn->close();
    }
    function createUser($studentID, $email, $name, $password)
    {
        $sql = "INSERT INTO $this->TABLE1 (studentID, email, name, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $studentID, $email, $name, $password);
        $stmt->execute();
    }
}
