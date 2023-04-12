<?php
require_once ("activities/session_activity.php");

if(sessionHas("sign_up_msg"))
{
    echo "<script>alert('Your account has been created successfully');</script>";
}

if(sessionHas("login_msg"))
{
    echo "<script>alert('You have logged successfully');</script>";
}