<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вопросы в категории</title>
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
<p><h3>Все вопросы в категории <?php echo $_GET['category'] ?></h3></p>
<table border="1">
<thead>
    <tr>
        <td><h3><center>Вопрос</center></h3></td>
        <td><h3><center>Дата создания</center></h3></td>
        <td><h3><center>Отвечен/нет</center></h3></td>
        <td><h3><center>Опубликован/нет</center></h3></td>
        <td><h3><center>Действие</center></h3></td>
    </tr>
</thead>
<tbody>
<?php foreach ($showCatQuest as $AllCatQuest) : 
    if ($AllCatQuest['is_done'] == 0) {
        $done = 'Без ответа';
    } else {
        $done = 'Отвечено';
    }
    if ($AllCatQuest['hide'] == 0) {
        $hide = 'Скрыт';
    } else {
        $hide = 'Опубликованно';
    }
?>
<tr>
    <td><center><?php echo $AllCatQuest['description'] ?></center></td>
    <td><center><?php echo $AllCatQuest['date_added'] ?></center></td>
    <td><center><?php echo $done ?></center></td>
    <td><center><?php echo $hide ?></center></td>
    <td><center>
    <form style="display: inline-block" method = "GET">
        <input type="hidden" name="c" value="cases">
        <input type="hidden" name="a" value="changeQuest">
        <input type="hidden" name="changeId" value="<?php echo $AllCatQuest['id'] ?>">
        <input type = "submit" name = "change_quest" value = 'Редактировать вопрос '>
    </form>
    <form style="display: inline-block" method = "GET">
        <input type="hidden" name="c" value="cases">
        <input type="hidden" name="a" value="delQuestion">
        <input type="hidden" name="delId" value="<?php echo $AllCatQuest['id'] ?>">
        <input type="hidden" name="description" value="<?php echo $AllCatQuest['description'] ?>">
        <input type = "submit" name = "del_quest" value = 'Удалить вопрос'> 
    </form>
    </center></td>
    </tr> 
    <?php endforeach; ?>
    <form method  = "GET">
        <input type="hidden" name="c" value="cases">
        <input type="hidden" name="a" value="allCategories">
        <input type = "submit" name = "allCat" value = 'Вернуться к списку категорий'>
    </form></br></br>
</tbody>
</body>
</html>