<?php
session_start();
$folder = 'tests';
$files_dir = (__DIR__ .DIRECTORY_SEPARATOR .$folder);
$files_list = scandir($files_dir);
if (isset($_POST['submit'])) {
  $file_name = $_POST['$value'];
  unlink(__DIR__ .DIRECTORY_SEPARATOR .$folder.DIRECTORY_SEPARATOR.$file_name);
  echo 'Файл успешно удален';
  echo "<p><br/><a href='list.php'>Перейти к выбору тестов</a></p>";
  echo "<p><br/><a href='admin.php'>Перейти к загрузке тестов</a></p>";
  exit();
} 
?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Выбор теста</title>
</head>
<body>
<h1>Выберите тест для прохождения</h1>
<?php foreach ($files_list as $value) :
  if ($value !='.' && $value !='..') : ?>
    <ul>
      <li><a href="test.php?name=<?php echo $value ?>"><?php echo $value ?>.</a></li>
    </ul>
  <?php endif;?>
<?php endforeach;?>
<?php if($_SESSION['pass'] == TRUE) : ?>
<form action = "list.php" method = "POST">
  <p>Введите имя теста для удаления</p>
    <input type="text" name="$value">
    <input type="submit" name="submit" value="Выбрать" ></br></br>
  <p><a href='admin.php'>Перейти к странице загрузке тестов</a></p>
<?php endif; ?>
</body>
</html>