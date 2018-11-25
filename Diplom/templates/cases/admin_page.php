<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Страница администратора</title>
</head>
<body>
<p><h2>Страница администратора</h2></p>
<form action = "index.php" name = "all_adm" method="POST">
  <input type="hidden" name="c" value="users">
  <input type="hidden" name="a" value="all_admin">
  <p><input type="submit" name="all_admin" value = "Все администраторы"></p>
</form>
<form action = "index.php" method="POST">
  <p><input type="submit" name="all_cat" value = "Список всех категорий"></p>
</form>
<form action = "index.php" method="POST">
  <p><input type="submit" name="all_notanswer_quest" value = "Cписок всех вопросов без ответа"></p>
</form>
<form method = "POST">
  <input type = "submit" name = "exit" value = 'Выход'>
</form>
</body>
</html>