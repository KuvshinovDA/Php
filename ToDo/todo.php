<?php 
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=global", "kuvshinov", "root");
$user_id = $_SESSION['user_id'];
$date = date('Y-m-d');
$my_case = "SELECT * FROM task WHERE user_id = '$user_id' ORDER BY date_added ";
$users = "SELECT * FROM user";
$all_users = $pdo->query($users);

if (isset($_POST['submit'])) {
  $description = $_POST['description'];
  $case = "INSERT INTO task (user_id, assigned_user_id, description, is_done, date_added) 
  VALUES ('$user_id', '$user_id', '$description', '0', '$date')";
  $new_case = $pdo->query($case);
}
if (isset($_POST['delete'])) {
  $delete_id = $_POST['case_id'];
  $delete = "DELETE FROM task WHERE user_id= '$user_id' AND id='$delete_id' LIMIT 1";
  $delete_case = $pdo->query($delete);
}
if (isset($_POST['is_done'])) {
  $change_id = $_POST['case_id'];
  $change = "UPDATE task SET is_done='1' WHERE user_id= '$user_id' AND id= '$change_id' LIMIT 1";
  $change_is_done = $pdo->query($change);
}
?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Список дел</title>
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
  <p>
  <input type="text" name="description" placeholder="Введите новое дело" size="40" />
  <input type="submit" name="submit" value="Внести в список">
  </p>
  
  <p>
  <input type = "submit" name = "my_list" value = "Список моих дел">
  </p></br>
</form>  

<?php if (isset($_POST['my_list'])) : ?>
<table border="1">
<thead>
  <tr>
    <td><h3><center>Дела</center></h3></td>
    <td><h3><center>Дата</center></h3></td>
    <td><h3><center>Выполнено/Не выполнено</center></h3></td>
    <td><h3><center>Исполнитель</center></h3></td>
    <td><h3><center>Действие</center></h3></td>
  </tr>
</thead>
<?php foreach ($pdo->query($my_case) as $row) :
  $my_case_data = $row['description'];
  $date_data = $row['date_added'];  
  $data_id = $row['id'];
  $data_assigned_user_id = $row['assigned_user_id'];
  $is_done = $row['is_done'];
  if ($is_done == 0) {
    $is_done = 'Не выполнено';
  } else {
    $is_done = 'Выполнено';
  }
?>
<tbody>
<tr>
  <td><center><?php echo $my_case_data ?></center></td>
  <td><center><?php echo $date_data ?></center></td>
  <td><center>
  <form method = "POST">
  <input type="hidden" name="case_id" value="<?php echo $data_id ?>">
  <input type = "submit" name = "is_done" value = "<?php echo $is_done ?>">
  </form>
  </center></td>
  <td><center> 
  <form method="POST">
<input name="task_id" type="hidden" value="<?php echo $data_id ?>"> 
<select name="assigned_user_id">
<?php foreach ($all_users as $assignedUser):?>
<option <?php if ($data_assigned_user_id == $assignedUser['id']):?>
  selected<?php endif; ?> value="<?= $assignedUser['id'] ?>">
  <?= $assignedUser['login'] ?>
</option>
<?php endforeach; ?>
</select>
<buttom type="submit">Делегировать</buttom>
</form>
  

  </center></td>
  <td>
  <form method = "POST">
  <input type="hidden" name="case_id" value="<?php echo $data_id ?>">
  <input type = "submit" name = "delete" value = "Удалить дело">
  </form>
  </td>
</tr>
</tbody>
<?php endforeach; ?>
<?php endif; ?>
</body>
</html>