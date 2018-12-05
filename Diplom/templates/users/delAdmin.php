<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Удалить администратора</title>
</head>
<body>
<p><h3>Подтвердите удаление администратора <?php echo $_POST['login'] ?></h3></p>
<form method = "POST">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="confirmDelAdmin">
    <input type="hidden" name="login" value="<?php echo $_POST['login'] ?>">
    <input type = "submit" name = "confDelAdmin" value = 'Удалить'>
</form></br>
<form method = "POST">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="cancelDelAdmin">
    <input type = "submit" name = "canDelAdmin" value = 'Отмена'>
</form>