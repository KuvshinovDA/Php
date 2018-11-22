<!DOCTYPE html>
<html>
<head>
	<title>Страница входа</title>
</head>
<body>
  <p><h3>Для авторизации введите имя и пароль</h3></p>
  <? echo $error_reg?>
  <form action = "index.php" method="POST">
  <input type="hidden" name="c" value="users">
  <input type="hidden" name="a" value="reg">
    <label>
      <p><input type="text" placeholder="Имя" name="login"></p>
    </label>
    <label>
    <p><input type="text" placeholder="Пароль" name="password"></p>
    </label>
  <input type="submit" name ="submit_reg" value="Создать нового пользователя">
  </form>
  <p><h3>Или войдите как гость</h3></p>
  <? echo $error_auth?>
  <form action = "index.php" method="POST">
  <input type="hidden" name="c" value="users">
  <input type="hidden" name="a" value="auth">
    <label>
      <p><input type="text" placeholder="Имя" name="login"></p>
    </label>
  <input type="submit" name ="submit" value="Войти">
  </form>
  
</body>
</html>