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
<p><h3>Редактировать вопрос </h3></p>
<table border="1">
<thead>
  <tr>
    <td><h3><center>Дата создания</center></h3></td>
    <td><h3><center>Автор</center></h3></td>
    <td><h3><center>Вопрос</center></h3></td>
    <td><h3><center>Ответ</center></h3></td>
    <td><h3><center>Скрыт Да/Нет</center></h3></td>
    <td><h3><center>Категория</center></h3></td>
  </tr>
</thead>
<tbody>
<?php foreach ($editQuestion as $editQuest) :
          if ($editQuest['hide'] == 0) {
              $hide = 'Скрыто';
          } else {
            $hide = 'Опубликованно';
          }  
  ?>
<tr>
  <td><center><?php echo $editQuest['date_added'] ?></center></td>
  <td><center><?php echo $editQuest['author'] ?>
  <form action = "index.php" method = "POST">
    <input type="hidden" name="c" value="newUser">
    <input type="hidden" name="a" value="changeAuthor">
    <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
    <input type="hidden" name="oldAuthor" value="<?php echo $editQuest['author'] ?>">
    <p><input type="submit" name ="edit_auth" value="Изменить имя"></p> 
    </form>
  </center></td>
  <td><center><?php echo $editQuest['description'] ?>
    <form action = "index.php" method = "POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="changeDesc">
    <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
    <input type="hidden" name="changeDesc" value="<?php echo $editQuest['description'] ?>">
    <p><input type="submit" name ="edit_quest" value="Редактировать"></p>
    </form>
  </center></td>
  <td><center><?php  ?>
    <form action = "index.php" method = "POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="editAnswer">
    <input type="hidden" name="description" value="<?php echo $editQuest['description'] ?>">
    <p><input type="submit" name ="change_answ" value="Редактировать"></p>
    </form>
  </center></td>
  <td><center><?php echo $hide ?>
    <form action = "index.php" method = "POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="publish">
    <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
    <p><input type="submit" name ="answer" value="Опубликовать"></p>
  </form>
  <form action = "index.php" method = "POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="hide">
    <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
    <p><input type="submit" name ="hide" value="Скрыть"></p>
    </form>
    
  </center></td>
  
  <td><center>
  <form action = "index.php" method = "POST"> 
  <p><select name="categoryEdit">
  <option selected disabled>Выберите категорию</option>
  <?php foreach ($editCategory as $editCat) : ?>
    <option value="<?php echo $editCat['id'] ?>"><?php echo $editCat['name'] ?></option>
  <?php endforeach; ?>
  </select></p>
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="changeCategory">
    <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
    <p><input type="submit" name ="change_cat" value="Поменять категорию"></p>
  </form>
  </center></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
  <form method  = "POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="allCategories">
    <input type = "submit" name = "allCat" value = 'Вернуться к списку категорий'>
  </form></br></br>
  <form method  = "POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="allNotanswerQuest">
    <input type = "submit" name = "notAnswer" value = 'Вернуться к вопросам без ответов'>
  </form></br></br>
  </body>
  </html>