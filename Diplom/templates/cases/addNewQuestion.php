<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Задать новый вопрос</title>
</head>
<body>
<p><h2>Заполните все поля чтобы задать новый вопрос</h2></p>
<form action = "" method="POST">
  <input type="hidden" name="" value="">
  <input type="hidden" name="" value="">
  <label>
    <p><input type="text" placeholder="Ваше имя" name="login"></p>
  </label>
  <label>
    <p><input type="text" placeholder="Ваш email" name="email"></p>
  </label>
  <p><select size="1" name="">
    <option selected disabled>Выберите тему</option>
    <option value="Чебурашка">Чебурашка</option>
    <option value="Шапокляк">Шапокляк</option>
    <option value="Крыса Лариса">Крыса Лариса</option>
   </select></p>
  <label>
    <p><textarea rows="2" cols="45" placeholder="Ваш вопрос" name="question"></textarea></p>
  </label>
  <input type="submit" name ="add_question" value="Задать новый вопрос">
</form>
</body>
</html>