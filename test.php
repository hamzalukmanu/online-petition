<?php
//$p = time();
//sleep(5);
//$n = time();
//echo "<br>" . ($n - $p);

//
//session_start();
//
//echo "<pre>";
//print_r($_SESSION);


$dir = __DIR__;
$files1 = scandir($dir);
$files2 = scandir($dir, SCANDIR_SORT_DESCENDING);
echo "<pre>";
print_r($files1);
print_r($files2);
