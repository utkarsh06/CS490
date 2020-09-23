<?php
 include 'database/connection.php';
 include 'classes/user.php'; 
 include 'classes/follow.php';
 include 'classes/tweet.php';

 global $pdo;

 session_start();

 $getFromU = new User($pdo);
 $getFromT = new Follow($pdo);
 $getFromF = new Tweet($pdo);

 define("BASE_URL", "http://localhost/twitterclone/");
?>