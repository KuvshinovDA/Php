<?php
$json = file_get_contents(__DIR__ . '/adresses.json');
$adresses = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="ru">
 <head>
  <meta charset="utf-8">
  <title>Адреса</title>
 </head>
 <body>
       
  <h2>Адреса</h2>
  <table>
    <thead>
    <tr>
      <td><h2>Имя</h2></td>
      <td><h2>Фамилия</h2></td>
      <td><h2>Адрес</h2></td>
      <td><h2>Телефон</h2></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($adresses as $adress ) {
      $newAdress = implode(", ",$adress["adress"]);
      $phones = implode (", " ,$adress["phoneNumbers"]);
      ?>
      <tr>
      <td><?php echo $adress['firstName']; ?></td>
    	<td><?php echo $adress['lastName']; ?></td>
    	<td><?php echo $newAdress; ?></td>
    	<td><strong><?php echo $phones; ?></strong></td>
      </tr>
    <?php } ?>

    </tbody>
</table>

</body>
</html>