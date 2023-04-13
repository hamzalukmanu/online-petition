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
    if(isset($_SESSION[$name]) && !empty($_SESSION[$name])){
        return $_SESSION[$name];
    }
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
    $script = explode("/", $_SERVER["REQUEST_URI"]);
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
        "index.php",
        "login.php",
        "sign_up.php"
    ];

    foreach($notIncluded as $remove){
        $pages = deleteArrayValue($remove, $pages);
    }

    if (!sessionHas("current_user")) {
        if (in_array($file, $pages)) {
            header("location: login.php");
        }
    }
}

function sendToast($header, $message, $type = "success")
{
    echo '<div class="toast- position-fixed top-0 end-0 p-3">
            <div id="liveToast" class="toast text-bg-'. $type .'" role="alert" aria-live="assertive" aria-atomic="true">
                 <div class="toast-header">
                 <strong class="me-auto">'.$header.'</strong>
                 <small>a few mins ago</small>
                 <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                 </div>
                 <div class="toast-body">
                 '. $message .'
                 </div>
                 </div>
                 </div>
            
            <script>
                let toastLiveExample = document.getElementById("liveToast")
                let toast = new bootstrap.Toast(toastLiveExample)
                toast.show()
            </script>';
}

function sendAlert($message, $type="success"){
    echo '<div class="alert alert-'. $type .' alert-dismissible" role="alert">
                '. $message .'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}

//TODO add sessions and page redirections to all pages


