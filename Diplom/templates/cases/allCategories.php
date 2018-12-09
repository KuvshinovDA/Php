<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все категории</title>
    <style>
    thead {
        background: lightgrey;
    }
    table { 
        border-collapse: collapse;
    }
    </style>
</head>
<body>
<p><h3>Все категории</h3></p>
<form method = "GET">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="addNewCategory">
    <input type = "submit" name = "add_cat" value = 'Создать новую категорию'>
</form></br>
<form method = "GET">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="mainAdmin">
    <input type = "submit" name = "main" value = 'Вернуться на главную страницу'>
</form></br>
<table border="1">
<thead>
    <tr>
        <td><h4><center>Категория вопроса</center></h4></td>
        <td><h4><center>Кол-во вопросов</center></h4></td>
        <td><h4><center>Сколько опубликовано</center></h4></td>
        <td><h4><center>Кол-во без ответа </center></h4></td>
        <td><h4><center>Действие</center></h4></td>
    </tr>
</thead>
<tbody>
<?php foreach ($showAllategories as $AllCat) : ?>
<tr>
    <td><center><?php echo $AllCat['categories'] ?></center></td>
    <td><center><?php echo $AllCat['total'] ?></center></td>
    <td><center><?php echo $AllCat['hide'] ?></center></td>
    <td><center><?php echo $AllCat['done'] ?></center></td>
    <td><center>
    <form style="display: inline-block" method = "GET">
        <input type="hidden" name="c" value="cases">
        <input type="hidden" name="a" value="openCategory">
        <input type="hidden" name="catId" value="<?php echo $AllCat['catId'] ?>">
        <input type="hidden" name="category" value="<?php echo $AllCat['categories'] ?>">
        <input type = "submit" name = "viewCat" value = 'Открыть категорию '>
    </form>
    <form style="display: inline-block" method = "GET">
        <input type="hidden" name="c" value="cases">
        <input type="hidden" name="a" value="delCategory">
        <input type="hidden" name="category" value="<?php echo $AllCat['categories'] ?>">
        <input type = "submit" name = "delCat" value = 'Удалить категорию'> 
    </form>
    </center></td>
</tr>
<?php endforeach; ?>
</tbody>
</body>
</html>