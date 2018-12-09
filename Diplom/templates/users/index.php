<!DOCTYPE html>
<html>
<head>
	<title>Страница входа</title>
</head>
<body>
    <p><h3>Для авторизации введите имя и пароль</h3></p>
    <? echo @$error?>
    <form action = "index.php" method="POST">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="auth">
        <label>
        <p><input type="text" placeholder="Имя" name="login"></p>
        </label>
        <label>
        <p><input type="text" placeholder="Пароль" name="password"></p>
        </label>
    <input type="submit" name ="submit_reg" value="Войти как администратор">
    </form>
    <p><h3>Или войдите как гость</h3></p>

    <form action = "index.php" method="GET">
        <input type="hidden" name="c" value="users">
        <input type="hidden" name="a" value="user">
        <input type="submit" name ="submit" value="Войти как гость">
    </form>
    
</body>
</html>