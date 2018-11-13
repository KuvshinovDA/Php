<?php
if (count($argv) == 1) {
  echo 'Не указана страна.';
  exit;
}
$data = $argv;

$row = 1;
if (($handle = @fopen("https://data.gov.ru/opendata/7704206201-country/data-20180609T0649-structure-20180609T0649.csv?encoding=UTF-8", "r")) !== FALSE) {
  while (($newData = fgetcsv($handle, 1000, ",")) !== FALSE) {
    if (count($newData) !== 0 && $newData[1] === $data[1]) {
      echo $newData[4];  
      $row++;
      exit;
    }    
  }
  if ( $newData[1] !== $data[1]) {
      exit ('Страна не найдена');
  } 
  fclose($handle);
} else {
  exit ('Сервис временно недоступен.');
}
