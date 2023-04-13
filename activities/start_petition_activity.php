<?php
require_once ("../activities/session_activity.php");
require_once("../model/petitions_model.php");

if (!empty($_POST)) {
    $form_data = [
        "title" => filter_var($_POST['petition_title'], FILTER_SANITIZE_EMAIL),
        "details" => filter_var($_POST['petition_details'], FILTER_SANITIZE_STRING),
        "category_id" => filter_var($_POST['petition_category'], FILTER_SANITIZE_STRING),
        "user_id" => getSession("user_data")[0]
    ];
    $target_dir = "../assets/img/uploads/";
//    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $name = basename($_FILES["image"]["name"]);
    $file = explode(".", $name);
    $ext = end($file);
    $file = random_int(86632, 9999999) . ".".$ext;
    $target_file = $target_dir . $file;
//    echo "<pre>";
//    print_r(getSession("user_data"));
//    exit;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $upload_checks = [
        "filetype" => true,
        "exist" => false,
        "too_large" => false,
        "file_format" => true,
    ];
    $upload_error = "";
    $upload_msg = "";

// Check if image file is an actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $upload_checks["filetype"] = true;
        } else {
            $upload_checks["filetype"] = false;
            $uploadOk = 0;
        }
    }

// Check if file already exists
    if (file_exists($target_file)) {
        $upload_checks["exist"] = true;
        $uploadOk = 0;
    }

// Check file size
    if ($_FILES["image"]["size"] > 5 * 1048576) {
        $upload_checks["too_large"] = true;
        $uploadOk = 0;
    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "webp") {
        $upload_checks["file_format"] = false;
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $upload_error = "Sorry, your file was not uploaded.";
        echo "<pre>";
        print_r($upload_checks);
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $upload_msg = "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";

            $form_data["image"] = $file;

            if (createPetition($form_data)) {
                setSession("create_petition_msg", "success", 3);
                setSession("upload_msg", $upload_msg, 3);
            } else {
                setSession("create_petition_error", "error", 3);
            }
        } else {
            $upload_error = "Sorry, there was an error uploading your file.";
            setSession("upload_error", $upload_error, 3);
            setSession("upload_checks", $upload_checks, 3);
        }
        header("Location: ../start_petition.php");
    }
}
