<!DOCTYPE html>
<html>
<head>
	<title>Страница входа</title>
</head>
<body>
    <p><h3>Для начала теста введите свое имя</h3></p>
    <? echo @$error?>
    <form action = "index.php" method="POST">
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="auth">
        <label>
        <p><input type="text" placeholder="Имя" name="login"></p>
        </label>

        <p><h3>Выберите уровень сложности</h3></p>
        <p><select  name="level">
        <option selected value = "novice">Новичок</option>
        <option value = "advanced">Продвинутый</option>
        <option value = "pro">Гуру</option>
        </select></p>

        <p><h3>Выберите своего инструктора</h3></p>
        <p><select  name="instructor">
        <option selected value = "dima">Дима</option>
        <option value = "masha">Маша</option>
        <option value = "slava">Слава</option>
        </select></p>

        <input type="submit" name ="submit_reg" value="Начать тест">
    </form>
      
</body>
</html>