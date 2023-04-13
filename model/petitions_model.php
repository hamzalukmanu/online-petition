<?php
require_once("C:/xampp/htdocs/online-petition/config/env.php");
require_once(BASE_PATH . "config/db_config.php");

function createPetition($details)
{
    $sql = "INSERT INTO petition (petition_title, petition_details, petition_category_id, petition_image, user_id) VALUES ('" . $details["title"] . "', '" . $details["details"] . "', '" . $details["category_id"] . "', '" . $details["image"] . "', '" . $details["user_id"] . "')";
    $conn = connectDB();

    if ($conn->query($sql) === true) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    return false;
}

function getPetitions()
{
    $sql = 'SELECT * FROM petition';
    return getResults($sql);
}

function getPetition($id)
{
    $sql = 'SELECT * FROM petition WHERE petition_id = ' . $id;
    return getResults($sql);
}

function getPetitionSupporters($id)
{
    $sql = 'SELECT * FROM petition_supporters WHERE petition_id = ' . $id;
    return getResults($sql);
}

function getPetitionSupporter($petition_id, $user_id)
{
    $sql = 'SELECT * FROM petition_supporters WHERE petition_id = "' . $petition_id .'" AND user_id = "'.$user_id .'"';
//    var_dump(getResults($sql)->fetch_all());
//    exit;
    if(getResults($sql)){
        return true;
    } else {
        return false;
    }
}

function support($details): bool
{
    if (!getPetitionSupporter($details["petition_id"], $details["user_id"])) {
        $sql = "INSERT INTO petition_supporters (petition_id, user_id) VALUES ('" . $details["petition_id"] . "', '" . $details["user_id"] . "')";;
        $conn = connectDB();

        if ($conn->query($sql) === true) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    return false;
}

function retract($details){
    $sql = "DELETE FROM `petition_supporters` WHERE `petition_id` = '". $details["petition_id"] ."' AND `user_id` = '". $details["user_id"] ."'";
    $conn = connectDB();

    if ($conn->query($sql) === true) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    return false;
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