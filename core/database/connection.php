<?php
   $servername = 'localhost';
   $database = 'tweety'; 
   $username = 'b253828cee1fe7';
   $password = '86875cb0';

   $dsn = 'mysql:host=us-cdbr-east-02.cleardb.com; dbname=heroku_0204a9e86e1cf68';
   //$dsn = 'mysql:host=localhost; dbname=tweety';

   $user = 'root';
   $pass = '';

   try{
   	   $pdo = new PDO($dsn, $username, $password); //for heroku
         //$pdo = new PDO($dsn, $user, $pass);  //for local
   } catch(PDOException $e){
   		echo 'Connection error! ' . $e->getMessage();
   }
?>