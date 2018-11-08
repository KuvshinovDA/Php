<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=global", "kuvshinov", "root");

if (isset($_POST['submit'])) {
 if (!empty($_POST['login']) && !empty($_POST['password'])) {
   $new_login = $_POST['login'];
   $new_password = $_POST['password'];

   $old = "SELECT id FROM user WHERE login = '$new_login' AND password = '$new_password' ";
   $old_user = $pdo->query($old);
   $data = $old_user->fetch();

   $same = "SELECT id FROM user WHERE login = '$new_login' AND password != '$new_password' ";
   $same_user = $pdo->query($same);
   $data_same_user = $same_user->fetch();

    if ($data_same_user) {
      exit ('Пользователь с таким именем уже существует');
    }

if ($data) {
  $_SESSION['user_id'] = $data['id'];
} else {
  $new = "INSERT INTO user (login, password) VALUES ('$new_login', '$new_password')";
    $new_user = $pdo->query($new);
    $data_new_user = $new_user->fetch();
    $_SESSION['user_id'] = $data_new_user['id'];
  }  
} else {
    echo 'Для входа введите имя и пароль!';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Страница входа</title>
</head>
<body>
  <p><h2>Для входа введите Ваше имя и пароль</h2></p>
  <form method="POST">
    <label>
      <p><input type="text" placeholder="Имя" name="login"></p>
    </label>
    <label>
    <p><input type="text" placeholder="Пароль" name="password"></p>
    </label>
  <input type="submit" name ="submit" value="Войти">
  </form>
</body>
</html>