<?php
if (!isset($_GET['name'])) {
  header('location:404.php');
  exit;
}
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
<form action= "sert.php" method="GET">
<?php foreach ($data as $q) {
  $quest = $q['question'];
  $answers = $q['options'];
  $correctAnswerNum = $q['answer'];
  $name = $q['testNumber'];
  $userAnswerNum = $_POST[$name];
  if (empty($_POST) || $correctAnswerNum !== $userAnswerNum) {
    $a = FALSE;
  } 
?>
  <p><b><?php echo $quest?></b><br>
    <?php foreach ($answers as $answerNum => $answer) : ?>
      <label>
        <input type="radio" name="<?php echo $name ?>" value="<?php echo $answer ?>">
      </label>
    <?php echo $answer?>
  </p>
<?php endforeach;?>
<?php }?>
    <p>Ниже введите ваше имя</p>
    <input type="text" name="userName"><br/><br/>
  <input type="submit" name="submit" value="Выбрать" >
</form>
<?php
if (!empty($_POST) && !empty($_POST['userName'])) :
  $userName = $_POST['userName'];
  if ($a !== FALSE) : ?>
  <p><b><?php echo $userName?>, ответ правильный, тест пройден</b></p>
<?php else : ?>
  <p><b><?php echo $userName?>, ответ неправильный, тест не пройден</b></p>
  <?php endif; ?>
  <?php else : ?>
  <p><b>!!! Для прохождения теста необходимо заполнить все поля !!!</b></p>
<?php endif; ?>
<p><br/><a href='list.php'>Перейти к выбору тестов</a></p>
</body>
</html>