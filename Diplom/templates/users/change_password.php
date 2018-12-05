<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Поменять пароль</title>
</head>
<body>
<p><h3>Введите новый пароль для пользователя <?php echo $_POST['login'] ?></h3></p>
<form method = "POST">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="new_pass">
    <input type="hidden" name="login" value="<?php echo $_POST['login'] ?>">
    <input type="text" placeholder = "Новый пароль" name = "password">
    <input type = "submit" name = "change" value = 'Изменить'>
</form>
</body>
</html>