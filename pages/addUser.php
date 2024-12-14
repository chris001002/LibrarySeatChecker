<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/database.php');
if (isset($_POST['submit'])) {
    $studentID = $_POST['student_id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = hash("sha256", $_POST['password']);
    $database = new Database();
    if ($database->userExistsEmail($email)) {
        $_SESSION["error"] = "User with this email already exists";
        header("Location: /sign_up");
    } else if ($database->userExistsId($studentID)) {
        $_SESSION["error"] = "User with this student ID already exists";
        header("Location: /sign_up");
    } else {
        $database->createUser($studentID, $email, $name, $password);
        $_SESSION["success"] = "User created successfully";
        header("Location: /log_in");
    }
}
