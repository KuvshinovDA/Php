<?php
error_reporting(E_ALL);
ini_set('display_errors',true);
ini_set('html_errors',true);
ini_set('error_reporting',E_ALL);

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
          $db = new PDO (  
        // "mysql:host=localhost;dbname=kuvshinovd_net", "kuvshinovd_net", "kuvshinovd_net" -----для ftp
          "mysql:host=localhost;dbname=diplom", "admin", "admin"
          );
      } catch (PDOException $e) {
          die('Database error: '.$e->getMessage().'<br/>');
      }
      return $db;
    }
}

include 'router/RouterCases.php';
