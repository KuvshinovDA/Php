<?php
if (count($argv) == 1  || (count($argv) == 2 && $argv[1] != '--today')) {
  exit('Ошибка! Аргументы не заданы. Укажите флаг --today или запустите скрипт с аргументами {цена} и {описание покупки}');
}
list(,$price) = array_pad($argv, 3, "");
$target = array_slice($argv, 2);
$targets = implode(" ", $target);
$date = date('Y-m-d');
$str = [$date, $price, $targets];
$newList = fopen('C:\OSPanel\domains\my-work\Php\3-rd lesson\money.csv', 'a+');

if ($price === '--today') {
  $sum = 0;
  if (($handle = fopen('money.csv', 'r')) !== FALSE) {
    while (($file = fgetcsv($handle, 1000)) !== FALSE) {
      if ($str[0] === $date){
        $sum += $file[1]; 
      }  
    }
    echo "$date Расход за день $sum рублей.";
    fclose($handle);
  }
}
else {
  fputcsv($newList, $str, ',', '"');
  echo "Добавлена строка: $date, $price, $targets" ."\n";
}
fclose($newList);
?>