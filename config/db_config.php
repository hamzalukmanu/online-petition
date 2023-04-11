<?php

function connectDB()
{
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $db = "online_petition";
    // Create connection
    $conn = new mysqli($serverName, $username, $password, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}