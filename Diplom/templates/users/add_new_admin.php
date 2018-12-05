<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создать нового администратора</title>
</head>
<body>
<p><h2>Создать нового администратора</h2></p>
<? echo $error?>
<form action = "index.php" method="POST">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="add_new_admin">
    <label>
        <p><input type="text" placeholder="Введите новый логин" name="login"></p>
    </label>
    <label>
        <p><input type="text" placeholder="Введите новый пароль" name="password"></p>
    </label>
    <input type="submit" name ="add_admin" value="Подтвердить создание">
</form></br>
<form method = "POST">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="mainAdmin">
    <input type = "submit" name = "main" value = 'Вернуться на главную страницу'>
</form>
</body>
</html>