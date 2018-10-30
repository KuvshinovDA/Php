<?php
session_start();
$file = 'login.json';
$data = json_decode(file_get_contents(__DIR__ .DIRECTORY_SEPARATOR .$file), true);
foreach ($data as $v) {
  $admin = $v['login'];
  $password = $v['password'];
}
if (!isset($_SERVER['PHP_AUTH_USER']) || empty ($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    http_response_code (401);
    echo 'Необходимо ввести имя!';
    echo "<p><br/><a href='index.php'>Войти еще раз</a></p>";
    exit;
} else {
  if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    if ($_SERVER['PHP_AUTH_USER'] == $admin && $_SERVER['PHP_AUTH_PW'] == $password) {
      $_SESSION['pass'] = TRUE;      
      header('location:admin.php');
      exit;
    } else {
      $_SESSION['pass'] = FALSE;
      header('location:list.php');
    }
  } 
}
?>