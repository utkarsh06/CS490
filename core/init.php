<?php
 include 'database/connection.php';
 include 'classes/user.php'; 
 include 'classes/follow.php';
 include 'classes/post.php';
 include 'classes/message.php';

 global $pdo;

 session_start();

 $getFromU = new User($pdo);
 $getFromF = new Follow($pdo);
 $getFromT = new Post($pdo);
 $getFromM = new Message($pdo);
 
 //define("BASE_URL", "https://calm-ocean-67152.herokuapp.com/");
 define("BASE_URL", "http://localhost/twitterclone/");
?>