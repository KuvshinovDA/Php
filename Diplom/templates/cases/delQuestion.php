<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Удалить вопрос</title>
</head>
<body>
<p><h3>Подтвердите удаление вопроса: <?php echo $_GET['description'] ?></h3></p>
<form method = "GET">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="confirmDelQuestion">
    <input type="hidden" name="catId" value="<?php echo $_GET['delId'] ?>">
    <input type = "submit" name = "conDelQuestion" value = 'Удалить'>
</form></br>
<form method  = "GET">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="allCategories">
    <input type = "submit" name = "canDelAdmin" value = 'Вернуться ко всем категориям'>
</form></br>
<form method  = "GET">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="allNotanswerQuest">
    <input type = "submit" name = "notAnswer" value = 'Вернуться к вопросам без ответов'>
</form></br>
</body>
</html>