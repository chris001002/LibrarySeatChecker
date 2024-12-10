<?php
if (!isset($_SESSION['user'])) {
    header("Location: /log_in");
    exit();
}
include_once($_SERVER['DOCUMENT_ROOT'] . "/database.php");
$database = new Database();
if ($database->extendTime($_SESSION['user']['id'])) {
    $_SESSION["extend"] = "Success";
}
header("Location: /seats");
