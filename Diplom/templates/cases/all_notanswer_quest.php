<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Все вопросы без ответов</title>
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
<p><h3>Все вопросы без ответов</h3></p>
<table border="1">
<thead>
  <tr>
    <td><h3><center>Дата создания</center></h3></td>
    <td><h3><center>Автор</center></h3></td>
    <td><h3><center>Категория</center></h3></td>
    <td><h3><center>Вопрос</center></h3></td>
    <td><h3><center>Действие</center></h3></td>
  </tr>
</thead>
<tbody>
<tr>
  <td><center><?php echo 'Дата создания' ?></center></td>
  <td><center><?php echo 'Автор' ?></center></td>
  <td><center><?php echo 'Категория' ?></center></td>
  <td><center><?php echo 'Вопрос' ?></center></td>
  <td><center>
  <form method = "POST">
  <input type = "submit" name = "view_cat" value = 'Редактировать вопрос '>
  <input type = "submit" name = "dell_cat" value = 'Удалить вопрос'> 
  </form>
  </center></td>
  </tr>
  </tbody>
  </body>
  </html>