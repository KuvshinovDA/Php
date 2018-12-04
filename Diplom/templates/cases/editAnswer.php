<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Ответить на вопрос</title>
</head>
<body>
<p><h3>Ответить на вопрос: </h3> <?php echo $_POST['description'] ?></p>
<form action = "index.php" method="POST">
<label>
  <p><textarea rows="4" cols="45" placeholder = "Напишите ответ на вопрос" 
   name="new_answer" value = ""></textarea></p>
</label>

    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="changeDesc">
    <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
    <input type="hidden" name="changeDesc" value="<?php echo $editQuest['description'] ?>">
    
    

  <input type="submit" name ="newAnswer" value="Опубликовать ответ">
  <input type="submit" name ="red_quest_hide" value="Опубликовать и скрыть вопрос">
</form>