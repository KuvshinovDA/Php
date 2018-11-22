<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Все категории</title>
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
<p><h3>Все категории</h3></p>
<form method = "POST">
  <input type = "submit" name = "add_cat" value = 'Создать новую категорию'>
</form></br>
<table border="1">
<thead>
  <tr>
    <td><h3><center>Название темы</center></h3></td>
    <td><h3><center>Кол-во вопросов</center></h3></td>
    <td><h3><center>Сколько опубликовано</center></h3></td>
    <td><h3><center>Кол-во без ответа </center></h3></td>
    <td><h3><center>Действие</center></h3></td>
  </tr>
</thead>
<tbody>
<tr>
  <td><center><?php echo 'Название темы' ?></center></td>
  <td><center><?php echo 'Кол-во вопросов' ?></center></td>
  <td><center><?php echo 'Сколько опубликовано' ?></center></td>
  <td><center><?php echo 'Кол-во без ответа' ?></center></td>
  <td><center>
  <form method = "POST">
  <input type = "submit" name = "view_cat" value = 'Открыть категорию '>
  <input type = "submit" name = "dell_cat" value = 'Удалить категорию'> 
  </form>
  </center></td>
  </tr>
  </tbody>
  </body>
  </html>