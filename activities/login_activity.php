<?php
session_start();
require_once ("../model/users_model.php");

if (!empty($_POST)) {
    $form_data = [
        "email" => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        "password" => hash("md5", filter_var($_POST['password'], FILTER_SANITIZE_STRING)),
    ];

    $authenticatedUser = authenticateUser($form_data);
    if ($authenticatedUser){
        $_SESSION["logon_msg"] = "success";
        $_SESSION["login_msg_time"] = time();

        $data = $authenticatedUser->fetch_row();
        $_SESSION["current_user"] = $data[3];
        header("Location: ../browse_petition.php");
    }
}