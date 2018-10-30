<?php
if (isset($_GET['name'])) {
  $uploadDir = 'tests';
  $fileName = $_GET['name'];
  $data = json_decode(file_get_contents(__DIR__ .DIRECTORY_SEPARATOR .$uploadDir .DIRECTORY_SEPARATOR .$fileName), true);
}
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Выполните тесты</title>
</head>
<body>
<h3>Выберите правильный ответ</h3>
<p><b>!!! Для прохождения теста необходимо заполнить все поля !!!</b></p>
<form action= "sert.php" method="GET">
<input type="hidden" name="name" value="<?php echo $_GET['name']?>">
<?php foreach ($data as $q) :
  $quest = $q['question'];
  $answers = $q['options'];
  $correctAnswerNum = $q['answer'];
  $name = $q['testNumber'];
  $userAnswerNum = $_POST[$name];
?>
<p><b><?php echo $quest?></b><br>
  <?php foreach ($answers as $answerNum => $answer) : ?>
    <label>
      <input type="radio" name="<?php echo $name ?>" value="<?php echo $answer ?>"> 
    </label>
    <?php echo $answer?>
  </p>
<?php endforeach;?>
<?php endforeach;?>
  <input type="submit" name="submit" value="Ответить" >
</form>
<p><br/><a href='list.php'>Перейти к выбору тестов</a></p>
</body>
</html>