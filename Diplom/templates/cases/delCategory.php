<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Удалить категорию</title>
</head>
<body>
<p><h3>Подтвердите удаление категории <?php echo $_POST['category'] ?></h3></p>
<form method = "POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="confirmDelCategory">
    <input type="hidden" name="category" value="<?php echo $_POST['category'] ?>">
    <input type = "submit" name = "confDelAdmin" value = 'Удалить'>
</form></br>
<form method  = "POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="allCategories">
    <input type = "submit" name = "canDelAdmin" value = 'Отмена'>
</form>
</body>
</html>