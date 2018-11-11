<?php
$pdo = new PDO("mysql:host=localhost;dbname=global", "kuvshinov", "root");
$n_table = "CREATE TABLE `all_users` (
  `id` int NOT NULL AUTO_INCREMENT, 
  `first_name` varchar(20) NOT NULL, 
  `last_name`varchar(20) NOT NULL,
  `age` tinyint(3) NOT NULL DEFAULT '0', 
  PRIMARY KEY (`id`) 
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
if (isset($_POST['submit'])) {
    $new_table = $pdo->query($n_table);
    echo 'Новая таблица успешно создана';
  }
if (isset($_POST['new_name'])) {
  if (!empty($_POST['name'])) {
  $field = $_POST['choose_field'];
  $table_name = $_POST['table_name'];
  $new_name = $_POST['name'];
  $type = $_POST['type'];
  $rename_field = "ALTER TABLE $table_name CHANGE $field $new_name $type ";
  $rename = $pdo->query($rename_field); 
  echo 'Поле успешно переименовано';
  } else {
  echo 'Не ввели новое название для поля!';
  }
}
if (isset($_POST['change_type'])) {
  if (!empty($_POST['new_type'])) {
  $table_name = $_POST['table_name'];
  $field = $_POST['choose_field'];
  $new_type = $_POST['new_type'];
  $r_type = "ALTER TABLE $table_name MODIFY $field $new_type";
  $rename_type = $pdo->query($r_type);
  echo 'Тип поля успешно изменен!';
  } else {
  echo 'Не ввели новый тип поля!';
  }
}
if (isset($_POST['delete'])) {
  $table_name = $_POST['table_name'];
  $field = $_POST['choose_field'];
  $delete = "ALTER TABLE $table_name DROP COLUMN $field";
  $del = $pdo->query($delete);
  echo 'Поле успешно удалено';
}
?>

<!doctype html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Таблицы</title>
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
<form method="POST">
  <p><input type="submit" name="submit" value="Создать таблицу"></p> 
  <p><input type="submit" name="show" value="Показать все таблицы"></p> 
</form>
<?php if (isset($_POST['show'])) :
  $show = "SHOW TABLES";
  $show_all = $pdo->query($show);
?>
<table border="1">
<thead>
  <tr>
    <td><h3><center>Доступные таблицы</center></h3></td>
    <td><h3><center>Выбрать таблицу</center></h3></td>
  </tr>
</thead>
<tbody>
<?php foreach ($show_all as $v) :
  $table_name = $v[0];
?>
<tr>
  <td><center><?php echo $table_name ?></center></td>
  <td><center>
  <form method = "POST">
    <input type="hidden" name="choose" value="<?php echo $table_name ?>">
    <input type = "submit" name = "choose_table" value = "Выбрать">
  </center></td>
  </form>
</tr>
</tbody>

<?php endforeach; ?>
<?php endif; ?>

<?php if (isset($_POST['choose_table'])) : 
  $choose = $_POST['choose'];
  $c_table = "DESCRIBE $choose ";
  $choose_table = $pdo->query($c_table);
  $table_name = $_POST['choose'];
?>

<table border="1">
<thead>
  <tr>
    <td><h3><center>Название поля</center></h3></td>
    <td><h3><center>Тип поля</center></h3></td>
    <td><h3><center>Действие</center></h3></td>
  </tr>
</thead>
<?php foreach ($choose_table as $row) :
  $field = $row['Field'];
  $type = $row['Type'];  
?>
<tbody>
<tr>
  <td><center><?php echo $field ?></center></td>
  <td><center><?php echo $type ?></center></td>
  <td><center>
    <form method = "POST">
      <input type="hidden" name="type" value="<?php echo $type ?>">
      <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
      <input type="hidden" name="choose_field" value="<?php echo $field ?>">
      <p>
      <input type = "text" placeholder = "Новое название для поля" name = "name">
      <input type = "submit" name = "new_name" value = "Изменить название">
      </p>
      <p>
      <input type = "text" placeholder = "Новый тип поля" name = "new_type">
      <input type = "submit" name = "change_type" value = "Изменить тип поля">
      </p>
      <input type = "submit" name = "delete" value = "Удалить поле">
    </form>
  </center></td>
</tr>
</tbody>

<?php endforeach; ?>
<?php endif; ?>
</table>
</html> 