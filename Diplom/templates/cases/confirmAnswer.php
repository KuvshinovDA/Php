<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Ответить на вопрос</title>
</head>
<body>
<form action = "index.php" method="POST">
  <input type="hidden" name="c" value="cases">
  <input type="hidden" name="a" value="publish">
  <input type="hidden" name="changeId" value="<?php echo $_POST['changeId'] ?>">
  <input type="submit" name ="newAnswer" value="Опубликовать">
</form></br>
<form action = "index.php" method="POST">
  <input type="hidden" name="c" value="cases">
  <input type="hidden" name="a" value="hide">
  <input type="hidden" name="changeId" value="<?php echo $_POST['changeId'] ?>">
  <input type="submit" name ="newAnswer" value="Добавить ответ и скрыть вопрос ">
</form>

</body>
</html>