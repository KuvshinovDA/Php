<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Создать новую категорию</title>
</head>
<body>
<p><h2>Создать новую категорию</h2></p>
<? echo $error ?>
<form action = "index.php" method="POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="addCategory">
    <input type="hidden" name="login" value="<?php echo $admLogin ?>">
    <label>
        <p><input type="text" placeholder="Введите новую категорию" name="newCategory"></p>
    </label>
    <input type="submit" name ="add_admin" value="Подтвердить создание">
</form></br>
<form method = "POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="allCategories">
    <input type = "submit" name = "main" value = 'Отменить'>
</form>
</body>
</html>