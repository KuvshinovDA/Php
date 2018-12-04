<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Редактировать ответ</title>
</head>
<body>
<p><h3>Редактировать ответ на вопрос: </h3> <?php echo $_POST['description'] ?></p>
<form action = "index.php" method="POST">
<label>
  <p><textarea rows="4" cols="45" placeholder = "Редактировать ответ" 
   name="answer"></textarea></p>
</label>
  <input type="hidden" name="c" value="cases">
  <input type="hidden" name="a" value="confirmChangeAnswer">
  <input type="hidden" name="changeId" value="<?php echo $_POST['changeId'] ?>">
  <input type="submit" name ="changeAnswer" value="Изменить">
</form></br>
<form method  = "POST">
  <input type="hidden" name="c" value="cases">
  <input type="hidden" name="a" value="allCategories">
  <input type = "submit" name = "allCat" value = 'Вернуться к списку категорий'>
</form>
</body>
</html>