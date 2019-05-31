<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать вопрос</title>
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
<p><h3>Редактировать вопрос </h3></p>
<table border="1">
<thead>
    <tr>
        <td><h3><center>Дата создания</center></h3></td>
        <td><h3><center>Автор</center></h3></td>
        <td><h3><center>Вопрос</center></h3></td>
        <td><h3><center>Ответ</center></h3></td>
        <td><h3><center>Опубликован/Скрыт</center></h3></td>
        <td><h3><center>Изменить категорию</center></h3></td>
    </tr>
</thead>
<tbody>
<?php foreach ($editQuestion as $editQuest) :
    if ($editQuest['hide'] == 0) {
        $hide = 'Скрыт';
    } else {
        $hide = 'Опубликован';
    }  
  ?>
<tr>
<td><center><?php echo $editQuest['date_added'] ?></center></td>
<td><center><?php echo $editQuest['author'] ?>
<form action = "index.php" method = "GET">
    <input type="hidden" name="c" value="newUser">
    <input type="hidden" name="a" value="changeAuthor">
    <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
    <input type="hidden" name="oldAuthor" value="<?php echo $editQuest['author'] ?>">
    <p><input type="submit" name ="editAuth" value="Изменить имя"></p> 
    </form> 
</center></td>
<td><center><?php echo $editQuest['description'] ?>
    <form action = "index.php" method = "GET">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="changeDesc">
    <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
    <input type="hidden" name="changeDesc" value="<?php echo $editQuest['description'] ?>">
    <p><input type="submit" name ="editQuest" value="Редактировать"></p>
    </form>
</center></td>
<td><center><?php foreach ($showAnswer as $answer) 
    {
        echo $answer['description'];
    }
?>
<form action = "index.php" method = "GET">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="editAnswer">
    <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
    <input type="hidden" name="description" value="<?php echo $editQuest['description'] ?>">
    <p><input type="submit" name ="editAnsw" value="Ответить"></p>
</form>
<form action = "index.php" method = "GET">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="editOldAnswer">
    <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
    <input type="hidden" name="description" value="<?php echo $editQuest['description'] ?>">
    <p><input type="submit" name ="changeAnsw" value="Редактировать"></p>
</form>

</center></td>
<td><center><?php echo $hide ?>
    <form action = "index.php" method = "POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="publish">
    <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
    <p><input type="submit" name ="answer" value="Опубликовать"></p>
</form>
<form action = "index.php" method = "POST">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="hide">
    <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
    <p><input type="submit" name ="hide" value="Скрыть"></p>
</form>   
</center></td>
  
<td><center>
<form action = "index.php" method = "POST"> 
<p><select name="categoryEdit">
<?php foreach ($editCategory as $editCat) : ?>
    <option value="<?php echo $editCat['id'] ?>"><?php echo $editCat['name'] ?></option>
<?php endforeach; ?>
</select></p>
      <input type="hidden" name="c" value="cases">
      <input type="hidden" name="a" value="changeCategory">
      <input type="hidden" name="changeId" value="<?php echo $editQuest['id'] ?>">
      <p><input type="submit" name ="changeCat" value="Изменить"></p>
</form>

</center></td>
</tr>
<?php endforeach; ?>
</tbody>
<form method  = "GET">
      <input type="hidden" name="c" value="cases">
      <input type="hidden" name="a" value="allCategories">
      <input type = "submit" name = "allCat" value = 'Вернуться к списку категорий'>
</form></br></br>

<form method  = "GET">
      <input type="hidden" name="c" value="cases">
      <input type="hidden" name="a" value="allNotanswerQuest">
      <input type = "submit" name = "notAnswer" value = 'Вернуться к вопросам без ответов'>
</form></br></br>
</body>
</html>