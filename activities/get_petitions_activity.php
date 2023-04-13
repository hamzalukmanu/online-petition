<?php
require_once("config/env.php");
require_once(BASE_PATH . "model/petitions_model.php");


function getAllPetitions()
{
    $petition = getPetitions();
    if ($petition) {
        return $petition->fetch_all();
    }
    return "";
}

function getMyPetitions($id)
{
    $petition = getPetitions($id);
    if ($petition) {
        return $petition->fetch_all();
    }
    return "";
}

function getSinglePetition($id)
{
    $petition = getPetition($id);
    if ($petition) {
        return $petition->fetch_row();
    }
    return "";
}