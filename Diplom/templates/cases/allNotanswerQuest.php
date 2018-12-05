<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все вопросы без ответов</title>
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
<p><h3>Все вопросы без ответов</h3></p>
<table border="1">
<thead>
    <tr>
        <td><h3><center>Дата создания</center></h3></td>
        <td><h3><center>Автор</center></h3></td>
        <td><h3><center>Категория</center></h3></td>
        <td><h3><center>Вопрос</center></h3></td>
        <td><h3><center>Действие</center></h3></td>
    </tr>
</thead>
<tbody>
<?php foreach ($allNotanswerQuest as $notanswerQuest) : ?>
<tr>
    <td><center><?php echo $notanswerQuest['date_added']  ?></center></td>
    <td><center><?php echo $notanswerQuest['author'] ?></center></td>
    <td><center><?php echo $notanswerQuest['name'] ?></center></td>
    <td><center><?php echo $notanswerQuest['description'] ?></center></td>
    <td><center>
    <form style="display: inline-block" method = "POST">
        <input type="hidden" name="c" value="cases">
        <input type="hidden" name="a" value="changeQuest">
        <input type="hidden" name="changeId" value="<?php echo $notanswerQuest['id'] ?>">
        <input type = "submit" name = "view_cat" value = 'Редактировать вопрос '>
    </form>
    <form style="display: inline-block" method = "POST">
        <input type="hidden" name="c" value="cases">
        <input type="hidden" name="a" value="delQuestion">
        <input type="hidden" name="delId" value="<?php echo $notanswerQuest['id'] ?>">
        <input type="hidden" name="description" value="<?php echo $notanswerQuest['description'] ?>">
        <input type = "submit" name = "dell_quest" value = 'Удалить вопрос'> 
    </form>
    </center></td>
</tr>
<?php endforeach; ?>
    </tbody>
    <form method = "POST">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="mainAdmin">
    <input type = "submit" name = "main" value = 'Вернуться на главную страницу'>
</form></br></br>
</body>
</html>