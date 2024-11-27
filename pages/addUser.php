<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/database.php');
echo print_r($_POST);
if (isset($_POST['submit'])) {
    $studentID = $_POST['student_id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = hash("sha256", $_POST['password']);
    $database = new Database();
    echo $studentID . " " . $email . " " . $name . " " . $password;
    $database->createUser($studentID, $email, $name, $password);
}
