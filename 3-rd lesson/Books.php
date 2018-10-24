<?php
if (count($argv) == 1) {
  exit('Нет параметров поиска.');
}
$query = urlencode($argv[1]);
$data = json_decode(file_get_contents("https://www.googleapis.com/books/v1/volumes?q=${query}"), true);

if (json_last_error()) {
  echo json_last_error_msg();
  exit;
}

$file = fopen('./books.csv', 'w+');

foreach ($data["items"] as $v) {
  $id = $v["id"];
  $title = $v["volumeInfo"]["title"];
  if (isset($v["volumeInfo"]["authors"])) {
    $authors = implode(" ", $v["volumeInfo"]["authors"]);
  } else {
    $authors = "";
  }

  $row = [$id, $title, $authors];
  fputcsv($file, $row);
}

fclose($file);


?>