<?php
try{
  $sDatabaseUserName = 'root';
  $sDatabasePassword = 'root';
  $sDatabaseConnection = "mysql:host=localhost; dbname=topivote; charset=utf8mb4";

  // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  $aDatabaseOptions = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM
  );
  $db = new PDO( $sDatabaseConnection, $sDatabaseUserName, $sDatabasePassword, $aDatabaseOptions );
}catch( PDOException $e){
  http_response_code(500);
  exit();
}









