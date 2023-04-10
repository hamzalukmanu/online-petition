<?php
session_start();

if(!empty($_SESSION["sign_up_msg"]) &&
    !empty($_SESSION["sign_up_msg_time"]) &&
    (time() - $_SESSION["sign_up_msg_time"] < 6))
{
    echo "<script>alert('Your account has been created successfully');</script>";
}

if(!empty($_SESSION["login_msg"]) &&
    !empty($_SESSION["login_msg_time"]) &&
    (time() - $_SESSION["login_msg_time"] < 3))
{
    echo "<script>alert('You have logged successfully');</script>";
}