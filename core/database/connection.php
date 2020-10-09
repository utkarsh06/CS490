<?php
   $servername = 'us-cdbr-east-02.cleardb.com';
   $database = 'heroku_0204a9e86e1cf68'; 
   $username = 'b253828cee1fe7';
   $password = '86875cb0';

   $dsn = 'mysql:host=$servername; dbname=$database';

   $user = 'root';
   $pass = '';

   try{
   	   $pdo = new PDO($dsn, $username, $password);
   } catch(PDOException $e){
   		echo 'Connection error! ' . $e->getMessage();
   }
?>