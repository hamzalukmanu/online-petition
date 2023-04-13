<?php
require_once ("../config/env.php");
require_once (BASE_PATH."/activities/session_activity.php");
require_once (BASE_PATH."/model/users_model.php");

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
        setSession("user_data", $data);
        header("Location: ../start_petition.php");
    } else {
        setSession("login_error", "error", 3);
        header("Location: ../login.php");
    }
}