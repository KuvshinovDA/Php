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
    name="answer"></textarea></p>
</label>
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="newAnswer">
    <input type="hidden" name="changeId" value="<?php echo $_POST['changeId'] ?>">
    <input type="submit" name ="newAnswer" value="Ответить">
</form></br>
<form method  = "POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="allCategories">
    <input type = "submit" name = "allCat" value = 'Вернуться к списку категорий'>
</form>
</body>
</html>