<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать вопрос</title>
</head>
<body>
<p><h2>Редактировать вопрос: <?php echo $_GET['changeDesc']; ?></h2></p>
<form action = "index.php" method="POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="confirmChangeDescription">
    <input type="hidden" name="changeId" value="<?php echo $_GET['changeId'] ?>">
<label>
    <p><textarea rows="4" cols="45" name="description"></textarea></p>
</label>
    <input type="submit" name ="editQuest" value="Изменить вопрос">
</form>
</body>
</html> 