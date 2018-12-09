<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задать новый вопрос</title>
</head>
<body>
<p><h2>Задать новый вопрос</h2></p>
<p>Ваш вопрос появится после проверки администратором</p>
<h2><? echo @$error ?></h2>
<form action = "index.php" method="POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="newUserQuestion">
    <label>
        <p><input type="text" placeholder="Введите свое имя" name="userName"></p>
    </label>
    <label>
        <p><input type="text" placeholder="Введите свой email" name="userEmail"></p>
    </label>
    <p><h3>Выберите категорию вопроса</h3></p>
        <p><select name="category">
        <?php foreach ($editCategory as $editCat) : ?>
        <option value="<?php echo $editCat['id'] ?>"><?php echo $editCat['name'] ?></option>
        <?php endforeach; ?>
        </select></p>  
    <label>
        <p><textarea rows="4" cols="45" placeholder = "Задайте вопрос" name="question"></textarea></p>     
    </label>
    <input type="submit" name ="edit" value="Опубликовать">
</form></br>
    <form method = "GET">
        <input type="hidden" name="c" value="users">
        <input type="hidden" name="a" value="user">
        <input type = "submit" name = "exit" value = 'Отменить'>
    </form>
</body>
</html>