<?php
require_once("../config/db_config.php");

function createPetition($details)
{
    $sql = "INSERT INTO petition (petition_title, petition_details, petition_category_id, petition_image, user_id) VALUES ('" . $details["title"] . "', '" . $details["details"] . "', '" . $details["category_id"] . "', '" . $details["image"] . "', '". $details["user_id"] ."')";
    $conn = connectDB();

    if ($conn->query($sql) === true) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    return false;
}

function getPetitons()
{
    $sql = 'SELECT * FROM petition';
    return getResults($sql);
}

function getPetiton($id)
{
    $sql = 'SELECT * FROM petition WHERE petition_id = $id';
    return getResults($sql);
}


/**
 * @param string $sql
 * @return bool|mysqli_result
 */
function getResults(string $sql)
{
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