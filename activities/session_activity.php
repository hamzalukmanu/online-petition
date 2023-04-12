<?php
session_start();

function setSession($name, $value, $ttl = 1000000)
{
    $_SESSION[$name] = $value;
    $_SESSION[$name . "_time"] = time();
    $_SESSION[$name . "_ttl"] = $ttl;
}

function getSession($name)
{
    return $_SESSION[$name];
}

function sessionHas($name): bool
{
    if (isset($_SESSION[$name]) && !empty($_SESSION[$name]) && (time() - (int)$_SESSION[$name . "_time"]) < (int)$_SESSION[$name . "_ttl"]) {
        return true;
    }

    return false;
}

function getCurrentFile()
{
    $script = explode("\\", __FILE__);
    return end($script);
}

function deleteArrayValue($del_value, $array)
{
    if (($key = array_search($del_value, $array)) !== false) {
        unset($array[$key]);
    }
    return $array;
}

function activeSession($file)
{
    $dir = __DIR__ . "\..";
    $pages = scandir($dir);
    $notIncluded = [
        ".",
        "..",
        ".git",
        ".idea",
        "widgets",
        "activities",
        "assets",
        "config",
        "models",
        "db.txt",
        "online_petition.sql",
        "README.md",
        "test.php",
        "index.php"
    ];

    foreach($notIncluded as $remove){
        $pages = deleteArrayValue($remove, $pages);
    }

    if (!sessionHas("current_user")) {
        if (in_array($file, $pages)) {
            header("location: ../login.php");
        }
    }
}
 //TODO add sessions and page redirections to all pages


