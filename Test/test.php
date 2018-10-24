<?php
  if (isset($_GET['name'])) {
    $uploadDir = '\tests';
    $name = $_GET['name'];
    $data = json_decode(file_get_contents(__DIR__ . "$uploadDir\\$name"), true);
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
  $userAnswerNum = $_POST[$name];
?>
  <p><b><?php echo $quest?></b> <br>
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
  if($correctAnswerNum == $userAnswerNum): ?>
    <p><b>Ответ правильный, тест пройден</b></p>
  <?php else : ?>
    <p><b>Ответ неправильный, тест не пройден</b></p>
  <?php endif; ?>
<?php endif; ?>
</body>
</html>