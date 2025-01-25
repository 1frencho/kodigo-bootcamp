<?php

class DBConnection
{

  public static function connect()
  {
    try {
      $dsn = "mysql:localhost;dbname=manager_task;charset=utf8";
      $user = 'root';
      // Without env
      $pdo = new PDO($dsn, $user, '');
      return $pdo;
    } catch (PDOException $e) {
      echo "Cannot connect with database: " . $e->getMessage();
      exit();
    }
  }
}
