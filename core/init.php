<?php
 include 'database/connection.php';
 include 'classes/user.php'; 
 include 'classes/follow.php';
 //include 'classes/tweet.php';
include 'classes/post.php';

 global $pdo;

 session_start();

 $getFromU = new User($pdo);
 $getFromF = new Follow($pdo);
 //$getFromT = new Tweet($pdo);
 $getFromT = new Post($pdo);

 define("BASE_URL", "https://calm-ocean-67152.herokuapp.com/");
// define("BASE_URL", "http://localhost/twitterclone/");
?>