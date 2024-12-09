<?php
include_once("database.php");
$database = new Database();
$database->deleteExpiredSeats();
