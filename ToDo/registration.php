<!-- <?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=global", "kuvshinov", "root");


?> -->

<!DOCTYPE html>
<html>
<head>
	<title>Страница входа</title>
</head>
<body>
  <p><h2>Для входа введите Ваше имя и пароль</h2></p>
  <form action = "todo.php" method="POST">
    <label>
      <p><input type="text" placeholder="Имя" name="login"></p>
    </label>
    <label>
    <p><input type="text" placeholder="Пароль" name="password"></p>
    </label>
  <input type="submit" name ="main_submit" value="Войти">
  </form>
</body>
</html>