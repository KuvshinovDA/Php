<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Редактировать вопрос</title>
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
<p><h3>Редактировать вопрос</h3></p>
<table border="1">
<thead>
  <tr>
    <td><h3><center>Дата создания</center></h3></td>
    <td><h3><center>Автор</center></h3></td>
    <td><h3><center>Вопрос</center></h3></td>
    <td><h3><center>Ответ</center></h3></td>
    <td><h3><center>Статус</center></h3></td>
    <td><h3><center>Скрыт Да/Нет</center></h3></td>
    <td><h3><center>Категория</center></h3></td>
  </tr>
</thead>
<tbody>
<tr>
  <td><center><?php echo 'Дата создания' ?></center></td>
  <td><center><?php echo 'Автор' ?>
    <p><input type="submit" name ="red_auth" value="Изменить имя"></p> 
  </center></td>
  <td><center><?php echo 'Вопрос' ?>
    <p><input type="submit" name ="red_quest" value="Редактировать"></p>
  </center></td>
  <td><center><?php echo 'Ответ' ?>
    <p><input type="submit" name ="red_answ" value="Редактировать"></p>
  </center></td>
  <td><center><?php echo 'Статус' ?>
    <p><input type="submit" name ="answer" value="Ответить"></p>
  </center></td>
  <td><center><?php echo 'Скрыт Да/Нет' ?>
    <p><input type="submit" name ="hide" value="Изменить"></p>
  </center></td>
  <td><center>
  <form method = "POST">
  <p><select size="1" name="">
    <option selected disabled>Выберите категорию</option>
    <option value="Чебурашка">Чебурашка</option>
    <option value="Шапокляк">Шапокляк</option>
    <option value="Крыса Лариса">Крыса Лариса</option>
   </select></p>
   <p><input type="submit" name ="change_cat" value="Поменять категорию"></p>
   
  </form>
  </center></td>
  </tr>
  </tbody>
  </body>
  </html>