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
<form method = "POST">
  <input type = "submit" name = "add_admin" value = 'Создать нового администратора'>
</form></br>
<table border="1">
<thead>
  <tr>
    <td><h3><center>Логин</center></h3></td>
    <td><h3><center>Пароль</center></h3></td>
    <td><h3><center>Действие</center></h3></td>
  </tr>
</thead>
<tbody>
<tr>
  <td><center><?php echo 'Логин' ?></center></td>
  <td><center><?php echo 'Пароль' ?></center></td>
  <td><center>
  <form method = "POST">
  <input type = "submit" name = "change_pass" value = 'Изменить пароль'>
  <input type = "submit" name = "delete" value = 'Удалить администратора'>
  </form>
  </center></td>
  </tr>
  </tbody>
  </body>
  </html>