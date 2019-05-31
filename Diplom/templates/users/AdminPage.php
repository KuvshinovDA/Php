<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страница администратора</title>
</head>
<body>
<p><h2>Страница администратора</h2></p>
<form action = "index.php" name = "allAdm" method="GET">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="allAdmin">
    <p><input type="submit" name="allAdmin" value = "Все администраторы"></p>
</form>
<form action = "index.php" method="GET">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="allCategories">
    <p><input type="submit" name="allCat" value = "Список всех категорий"></p>
</form>
<form action = "index.php" method="GET">
    <input type="hidden" name="c" value="cases">
    <input type="hidden" name="a" value="allNotanswerQuest">
    <p><input type="submit" name="allNotanswerQuest" value = "Cписок всех вопросов без ответа"></p>
    </form>
<form method = "GET">
    <input type = "submit" name = "exit" value = 'Выход'>
</form>
</body>
</html>