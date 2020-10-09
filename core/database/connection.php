<?php
   $servername = 'localhost';
   $database = 'tweety'; 
   $username = 'b253828cee1fe7';
   $password = '86875cb0';

   $dsn = 'mysql:host=localhost; dbname=tweety';

   $user = 'root';
   $pass = '';

   try{
   	   $pdo = new PDO($dsn, $user, $pass);
   } catch(PDOException $e){
   		echo 'Connection error! ' . $e->getMessage();
   }
?>