<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 1);

class Di
{
  static $di = null;
  public static function get()
  {
    if (! self::$di) {
        self::$di = new Di();
    }
    return self::$di;
  }
  
  public function db()
  {
    
    try {
      $db = new PDO(  
        "mysql:host=localhost;dbname=diplom", "admin", "admin"
      );
    } catch (PDOException $e) {
        die('Database error: '.$e->getMessage().'<br/>');
    }
    return $db;
  }
}

include 'router\router_cases.php';