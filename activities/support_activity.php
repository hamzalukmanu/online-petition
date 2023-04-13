<?php
require_once("C:/xampp/htdocs/online-petition/config/env.php");
require_once(BASE_PATH . "model/petitions_model.php");

if (!empty($_POST)) {
    switch ($_POST["type"]) {
        case "support":
            $form_data = [
                "petition_id" => $_POST["petition_id"],
                "user_id" => $_POST["user_id"]
            ];
            if (support($form_data)) {
                echo json_encode(['msg' => "success"]);
            } else {
                echo json_encode(['msg' => "error"]);
            }
            break;

        case "retract":
            $form_data = [
                "petition_id" => $_POST["petition_id"],
                "user_id" => $_POST["user_id"]
            ];
            if (retract($form_data)) {
                echo json_encode(['msg' => "success"]);
            } else {
                echo json_encode(['msg' => "error"]);
            }
            break;

    }
}