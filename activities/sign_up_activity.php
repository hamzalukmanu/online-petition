<?php
session_start();
require_once ("../model/users_model.php");
// echo "<pre>";
//
// var_dump($_POST);
//exit;
if (!empty($_POST)) {
    $form_data = [
        "email" => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        "password" => hash("md5", filter_var($_POST['password'], FILTER_SANITIZE_STRING)),
        "name" => filter_var($_POST['name'], FILTER_SANITIZE_STRING),
    ];

    if (createUser($form_data)){
        $_SESSION["sign_up_msg"] = "success";
        $_SESSION["sign_up_msg_time"] = time();
        echo "here";
        header("Location: ../login.php");
    }
}
