<?php
require_once ("../activities/session_activity.php");
require_once ("../model/users_model.php");

if (!empty($_POST)) {
    $form_data = [
        "email" => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
        "password" => hash("md5", filter_var($_POST['password'], FILTER_SANITIZE_STRING)),
    ];

    $authenticatedUser = authenticateUser($form_data);
    if ($authenticatedUser){
        setSession("login_msg", "success", 3);

        $data = $authenticatedUser->fetch_row();
        setSession("current_user", $data[3]);
        header("Location: ../browse_petition.php");
    }
}