<?php
function connectDB()
    {
        $host = "localhost";
        $user = "root";
        $pass = "1234";
        $database = "phpwebdb";

        $conn = mysqli_connect($host, $user, $pass, $database);
        mysqli_set_charset($conn, "utf8");
        return $conn;
    }
?>