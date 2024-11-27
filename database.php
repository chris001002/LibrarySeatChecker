<?php
class Database
{
    private $conn = null;
    function __construct()
    {
        try {
            global $conn;
            $database_name = "LibrarySeat";
            $conn = mysqli_connect("localhost", "root", "");
            $sql = "CREATE DATABASE IF NOT EXISTS $database_name";
            $conn->query($sql);
            $conn->select_db($database_name);
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    function __destruct()
    {
        global $conn;
        $conn->close();
    }
}
