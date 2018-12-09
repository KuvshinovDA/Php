<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Изменить автора</title>
</head>
<body>
<p><h3>Изменить имя автора: <?php echo $_GET['oldAuthor']; ?></h3></p>
<form action = "index.php" method="POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="confirmChangeAuthor">
        <input type="hidden" name="changeId" value="<?php echo $_GET['changeId'] ?>">
        <input type="hidden" name="changeAuthor" value="<?php echo $_GET['oldAuthor'] ?>"> 
        <p><input type="text" placeholder="Введите новое имя" name="new_name"></p>
    <input type="submit" name ="add_new_admin" value="Изменить">
</form> 
</body>
</html>