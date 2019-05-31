<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создать нового администратора</title>
</head>
<body>
<p><h2>Создать нового администратора</h2></p>
<?php echo @$error?>
<form action = "index.php" method="POST">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="addNewAdmin">
    <label>
        <p><input type="text" placeholder="Введите новый логин" name="login"></p>
    </label>
    <label>
        <p><input type="text" placeholder="Введите новый пароль" name="password"></p>
    </label>
    <input type="submit" name ="addAdmin" value="Подтвердить создание">
</form></br>
<form method = "GET">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="mainAdmin">
    <input type = "submit" name = "main" value = 'Вернуться на главную страницу'>
</form>
</body>
</html>