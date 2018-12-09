<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Удалить категорию</title>
</head>
<body>
<p><h3>Подтвердите удаление категории <?php echo $_GET['category'] ?></h3></p>
<form method = "GET">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="confirmDelCategory">
    <input type="hidden" name="category" value="<?php echo $_GET['category'] ?>">
    <input type = "submit" name = "delCat" value = 'Удалить'>
</form></br>
<form method  = "GET">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="allCategories">
    <input type = "submit" name = "delCat" value = 'Отмена'>
</form>
</body>
</html>