<!doctype html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Все администраторы</title>
<style>
    thead {
        background: lightgrey;
    }
    table { 
        border-collapse: collapse;
    }
</style>
</head>
<body>
<p><h3>Все администраторы</h3></p>
<form method = "GET">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="add_admin">
    <input type = "submit" name = "add_admin" value = 'Создать нового администратора'>
</form></br>
<form method = "GET">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="mainAdmin">
    <input type = "submit" name = "main" value = 'Вернуться на главную страницу'>
</form>

</br></br>
<table border="1">
<thead>
    <tr>
        <td><h3><center>Логин</center></h3></td>
        <td><h3><center>Пароль</center></h3></td>
        <td><h3><center>Действие</center></h3></td>
    </tr>
</thead>
<tbody>

<?php 

foreach ($show_admin as $adm) { ?>
<tr>
    <td><center><?=$adm['login'] ?></center></td>
    <td><center><?=$adm['password'] ?></center></td>
    <td><center>
    <form style="display: inline-block" method = "GET">
        <input type="hidden" name="c" value="users">
        <input type="hidden" name="a" value="change_password">
        <input type="hidden" name="login" value="<?php echo $adm['login'] ?>">
        <input type = "submit" name = "change_pass" value = 'Изменить пароль'>
    </form>
    <form style="display: inline-block" method = "GET">
        <input type="hidden" name="c" value="users">
        <input type="hidden" name="a" value="delAdmin">
        <input type="hidden" name="login" value="<?php echo $adm['login'] ?>">
        <input type = "submit" name = "deleteAdm" value = 'Удалить администратора'>
    </form>
    </center></td>
</tr>
<?php } ?>
</tbody>
</body>
</html>