<?php
date_default_timezone_set('Asia/Jakarta');
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
                userID INT DEFAULT NULL,
                Location VARCHAR(255),
                expiry_time DATETIME DEFAULT NULL,
                mailed BOOLEAN DEFAULT FALSE,
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
        $email = strtolower($email);
        $sql = "INSERT INTO $this->TABLE1 (studentID, email, name, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $studentID, $email, $name, $password);
        $stmt->execute();
    }
    function userExistsEmail($email)
    {
        $email = strtolower($email);
        $sql = "SELECT * FROM $this->TABLE1 WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }
    function userExistsId($studentID)
    {
        $sql = "SELECT * FROM $this->TABLE1 WHERE studentId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $studentID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }
    function log_in($email, $password)
    {
        $email = strtolower($email);
        $password = hash("sha256", $password);
        $sql = "SELECT id, studentID, email, name FROM $this->TABLE1 WHERE email = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = [
                'id' => $row['id'],
                'studentID' => $row['studentID'],
                'email' => $row['email'],
                'name' => $row['name']
            ];
            return $user;
        } else {
            return -1;
        }
    }
    function getAllSeats()
    {
        $sql = "SELECT userId, location FROM $this->TABLE2";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 0) {
            $cols = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
            $rows = ['1', '2', '3', '4', '5'];
            foreach ($cols as $col) {
                foreach ($rows as $row) {
                    $sql2 = "INSERT INTO $this->TABLE2 (location) VALUES (?)";
                    $stmt = $this->conn->prepare($sql2);
                    $location = $col . $row;
                    $stmt->bind_param("s", $location);
                    $stmt->execute();
                    $stmt->close();
                }
            }
            $result = $this->conn->query($sql);
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    function takeSeat($userId, $location)
    {
        $sql = "UPDATE $this->TABLE2 SET userId = ?, expiry_time = ? WHERE location = ?";
        $_SESSION["test"] = "aaaa";
        $stmt = $this->conn->prepare($sql);
        $expiry = new DateTime();
        $expiry->modify("+1 hour");
        $expiry = $expiry->format("Y-m-d H:i:s");
        $stmt->bind_param("iss", $userId, $expiry, $location);
        $stmt->execute();
    }
    function hasTakenSeat($userId)
    {
        $sql = "SELECT * FROM $this->TABLE2 WHERE userId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->num_rows > 0;
    }
    function timeRemaining($userId)
    {
        $sql = "SELECT expiry_time FROM $this->TABLE2 WHERE userId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $row = $result->fetch_assoc();
        return $row["expiry_time"];
    }
    function deleteExpiredSeats()
    {
        $sql = "UPDATE $this->TABLE2 SET userId = NULL, expiry_time = NULL, mailed = FALSE WHERE expiry_time < ?";
        $stmt = $this->conn->prepare($sql);
        $date = new DateTime();
        $date = $date->format("Y-m-d H:i:s");
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $stmt->close();
    }
    function usersSessionAboutToExpire()
    {
        $minute = 5;
        $sql = "SELECT email, name FROM $this->TABLE2
        JOIN $this->TABLE1 ON $this->TABLE2.userId = $this->TABLE1.id
        WHERE expiry_time < ? AND mailed = 0";
        $stmt = $this->conn->prepare($sql);
        $date = new DateTime();
        $date->modify("+$minute minutes");
        $date = $date->format("Y-m-d H:i:s");
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $result = $stmt->get_result();
        $sql = "UPDATE $this->TABLE2 SET mailed = 1 WHERE expiry_time < ? AND mailed = 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $date);
        $stmt->execute();
        $stmt->close();
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    function extendTime($userId)
    {
        $current  = $this->timeRemaining($userId);
        $current = new DateTime($current);
        $diff = $current->diff(new DateTime());
        $minutes = ($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i;
        echo $minutes;
        if ($minutes < 5 && $minutes >= 0) {
            $sql = "UPDATE $this->TABLE2 SET expiry_time = ?, mailed = FALSE WHERE userId = ?";
            echo "$sql";
            $current = new DateTime();
            $current->modify("+1 hour");
            $current = $current->format("Y-m-d H:i:s");
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("si", $current, $userId);
            $stmt->execute();
            return true;
        }
        return false;
    }
    function stopSession($userId)
    {
        $sql = "UPDATE $this->TABLE2 SET userId = NULL, expiry_time = NULL, mailed = FALSE WHERE userId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
    }
}
