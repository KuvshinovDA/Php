<?php
if (!empty($_FILES)) {
  $uploadDir = 'tests';
  $name = $_FILES['testfile']['name'];
  move_uploaded_file ($_FILES['testfile']['tmp_name'], __DIR__  .DIRECTORY_SEPARATOR .$uploadDir .DIRECTORY_SEPARATOR .$name); 
  echo 'Файл успешно загружен' . '<br/>';
  echo "<a href='list.php'>Перейти на страницу тестов</a>";
}
?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Тест</title>
</head>

<body>
<h1>Загрузите файл с тестом</h1>
<form action="admin.php" enctype="multipart/form-data" method="post">
  <p><input name="testfile" type="file"></p>
  <input type="submit" value="Загрузить">
</form>
</body>
</html