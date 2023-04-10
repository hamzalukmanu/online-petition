<?php
require_once("../config/db_config.php");

function createUser($details)
{
    $sql = "INSERT INTO users (user_email, user_password, user_name) VALUES ('" . $details["email"] . "', '" . $details["password"] . "', '" . $details["name"] . "')";
    $conn = connectDB();

    if ($conn->query($sql) === true) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    return false;
}

function authenticateUser($details)
{
    $sql = 'SELECT * FROM `users` WHERE `user_email` = "' . $details["email"] . '" AND `user_password` = "' . $details["password"] . '"';
    $conn = connectDB();

    $results = $conn->query($sql);

    if ($conn->query($sql)) {
        if ($results->num_rows > 0) {
            return $results;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    return false;
}