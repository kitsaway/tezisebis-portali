<?php

class Dbh {
  protected function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "university";

    try {
      $pdo = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
      $pdo->exec('SET NAMES utf8');
      return $pdo;
      } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
    }
}