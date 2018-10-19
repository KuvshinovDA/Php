<?php
if (count($argv) == 1) {
  echo "Не введены параметры.";
  exit;
}
list(,$price,$target) = $argv;
$date = date('Y-m-d');
$str = [$date, $price, $target];
$newList = fopen("C:\OSPanel\domains\my-work\Php\money.csv", 'a+');

if ($price === "--today" ) {
  $sum = 0;
  if (($handle = fopen("money.csv", "r")) !== FALSE) {
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
  echo "Добавлена строка: $date, $price, $target" ."\n";
}
fclose($newList);
?>