<?php
$files_dir = (__DIR__ .DIRECTORY_SEPARATOR .'tests');
$files_list = scandir($files_dir);
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
<p><a href='admin.php'>Перейти к странице загрузке тестов</a></p>
</body>
</html>