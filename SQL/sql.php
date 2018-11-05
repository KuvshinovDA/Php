<?php 
$pdo = new PDO("mysql:host=localhost;dbname=global", "kuvshinov", "root");
$sql = "SELECT * FROM books";
?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Список книг</title>
  <style>
  thead {
    background: lightgrey;
  }
  table { 
    border-collapse: collapse;
  }
  </style>
</head>
<body>
<table border="1">
<thead>
  <tr>
    <td><h2><center>Название</center></h2></td>
    <td><h2><center>Автор</center></h2></td>
    <td><h2><center>Год выпуска</center></h2></td>
    <td><h2><center>Жанр</center></h2></td>
    <td><h2><center>ISBN</center></h2></td>
  </tr>
</thead>
<tbody>

<?php 
  foreach ($pdo->query($sql) as $row) :
  $name = $row['name'];
  $author = $row['author'];
  $year = $row['year'];
  $genre = $row['genre'];
  $isbn = $row['isbn'];        
?>
<tr>
  <td><?php echo $name; ?></td>
  <td><?php echo $author ?></td>
  <td><?php echo $year ?></td>
  <td><?php echo $genre ?></td>
  <td><?php echo $isbn ?></td>
</tr>
<?php endforeach; ?>
</body>
</html>