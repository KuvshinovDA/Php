<?php
if (!isset($_GET['name'])) {
  exit ("<a href='list.php'>Выберите корректный тест</a>");
}
if (isset($_GET['name'])) {
  $uploadDir = 'tests';
  $fileName = $_GET['name'];
  $data = json_decode(file_get_contents(__DIR__ .DIRECTORY_SEPARATOR .$uploadDir .DIRECTORY_SEPARATOR .$fileName), true);
  $a = '';
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
<form method="POST">

<?php foreach ($data as $q) {
  $quest = $q['question'];
  $answers = $q['options'];
  $correctAnswerNum = $q['answer'];
  $name = $q['testNumber'];
  if (!empty($_POST[$name])) {
    $userAnswerNum = $_POST[$name];
  }
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
  <input type="submit" value="Выбрать" >
</form>
<?php
if (!empty($_POST)) :
  if ($a !== FALSE) : ?>
  <p><b>Ответ правильный, тест пройден</b></p>
<?php else : ?>
  <p><b>Ответ неправильный, тест не пройден</b></p>
  <?php endif; ?>
<?php endif; ?>
<p><br/><a href='list.php'>Перейти к выбору тестов</a></p>
</body>
</html>