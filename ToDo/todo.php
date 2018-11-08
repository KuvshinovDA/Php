<?php 
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=global", "kuvshinov", "root");

if (isset($_POST['main_submit'])) {
  if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $new_login = $_POST['login'];
    $new_password = $_POST['password'];
 
    $old = "SELECT id FROM user WHERE login = '$new_login' AND password = '$new_password' ";
    $old_user = $pdo->query($old);
    $data = $old_user->fetch();
 
    $same = "SELECT id FROM user WHERE login = '$new_login' AND password != '$new_password' ";
    $same_user = $pdo->query($same);
    $data_same_user = $same_user->fetch();
     if ($data_same_user) {
       exit ('Пользователь с таким именем уже существует');
     }
 
  if ($data) {
   $_SESSION['user_id'] = $data['id'];
  } else {
   $new = "INSERT INTO user (login, password) VALUES ('$new_login', '$new_password')";
     $new_user = $pdo->query($new);
     $data_new_user = $new_user->fetchAll();
     $select_id = "SELECT id FROM user WHERE login = '$new_login' AND password = '$new_password' ";
     $select_id_user = $pdo->query($select_id);
     $data_select_id_user = $select_id_user->fetch();
     $_SESSION['user_id'] = $data_select_id_user['id'];  
    }  
  } else {
     exit ('Для входа введите имя и пароль!');
    }
  }
  
$user_id = $_SESSION['user_id'];
$date = date('Y-m-d');
$my_case = "SELECT * FROM task WHERE user_id = '$user_id' ORDER BY date_added ";
$users = "SELECT * FROM user";
$all_users = $pdo->query($users)->fetchAll();

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
if (isset($_POST['set_user_id'])) {
  $case_id = $_POST['task_id'];
  $set_user_id = $_POST['assigned_user_id'];
  $set_user = "UPDATE task SET assigned_user_id='$set_user_id' WHERE id='$case_id' AND user_id='$user_id'";
  $change_set_user = $pdo->query($set_user);
}
if (isset($_POST['exit'])) {
  session_unset();
  session_destroy();
  header('location:registration.php');
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
  <input type = "submit" name = "my_list" value = "Мои дела">
  <input type = "submit" name = "my_cases" value = "Делегированные дела">
  <input type = "submit" name = "all_my_cases" value = "Все мои дела">
  <input type="submit" name="exit" value="Выход"> 
  </p></br>
</form>  

<?php if (isset($_POST['my_list'])) : ?>
<table border="1">
<thead>
  <tr>
    <td><h3><center>Дело</center></h3></td>
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
      selected<?php endif; ?> name = "set_id" value="<?= $assignedUser['id'] ?>">
      <?= $assignedUser['login'] ?>
    </option>
    <?php endforeach; ?>
    </select>
    <input type="submit" name = "set_user_id" value = "Делегировать">
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

<?php if (isset($_POST['my_cases'])) :
  $my_cases = "SELECT * FROM task t INNER JOIN user u ON u.id=t.user_id WHERE
  t.user_id != '$user_id' AND t.assigned_user_id = '$user_id'";
  $all_my_cases = $pdo->query($my_cases);
  ?>
<table border="1">
<thead>
  <tr>
    <td><h3><center>Дело</center></h3></td>
    <td><h3><center>Дата</center></h3></td>
    <td><h3><center>Выполнено/Не выполнено</center></h3></td>
    <td><h3><center>Автор</center></h3></td>
  </tr>
</thead>
<?php foreach ($all_my_cases as $all_cases) :
  $all_my_case = $all_cases['description'];
  $all_my_dates = $all_cases['date_added'];
  $all_my_dones = $all_cases['is_done'];
  $all_my_names = $all_cases['login'];
  if ($all_my_dones == 0) {
    $all_my_dones = 'Не выполнено';
  } else {
    $all_my_dones = 'Выполнено';
  }
?>
<tbody>
<tr>
  <td><center><?php echo $all_my_case ?></center></td>
  <td><center><?php echo $all_my_dates ?></center></td>
  <td><center><?php echo $all_my_dones ?></center></td>
  <td><center><?php echo $all_my_names ?></center></td>
</tr>
</tbody>
<?php endforeach; ?>
<?php endif; ?> 

<?php if (isset($_POST['all_my_cases'])) :
  $my_cases_all = "SELECT * FROM task t INNER JOIN user u ON u.id=t.assigned_user_id WHERE
  t.user_id = '$user_id' OR t.assigned_user_id = '$user_id'";
  $my_cases_total = $pdo->query($my_cases_all);
  ?>
<table border="1">
<thead>
  <tr>
    <td><h3><center>Дело</center></h3></td>
    <td><h3><center>Дата</center></h3></td>
    <td><h3><center>Выполнено/Не выполнено</center></h3></td>
    <td><h3><center>Исполнитель</center></h3></td>
  </tr>
</thead>
<?php foreach ($my_cases_total as $total_cases) :
  $all_total_case = $total_cases['description'];
  $all_total_dates = $total_cases['date_added'];
  $all_total_dones = $total_cases['is_done'];
  $all_total_names = $total_cases['login'];
  if ($all_total_dones == 0) {
    $all_total_dones = 'Не выполнено';
  } else {
    $all_total_dones = 'Выполнено';
  }
?>
<tbody>
<tr>
  <td><center><?php echo $all_total_case ?></center></td>
  <td><center><?php echo $all_total_dates ?></center></td>
  <td><center><?php echo $all_total_dones ?></center></td>
  <td><center><?php echo $all_total_names ?></center></td>
</tr>
</tbody>
<?php endforeach; ?>
<?php endif; ?> 

</body>
</html>