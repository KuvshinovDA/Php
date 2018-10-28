<?php
$fileName = $_GET['name'];
$uploadDir = 'tests';
$userName = $_GET['userName'];
$data = json_decode(file_get_contents(__DIR__ .DIRECTORY_SEPARATOR .$uploadDir .DIRECTORY_SEPARATOR .$fileName), true);
foreach ($data as $q) {
  $correctAnswerNum = $q['answer'];
  $name = $q['testNumber'];
  $userAnswerNum = $_GET[$name];
  if ($userAnswerNum !== $correctAnswerNum){
	$a = FALSE;	
  }
}
if ($a !== FALSE) {
$text = "$userName, все правильно!";
$image = imagecreatetruecolor(550, 450);
$backColor = imagecolorallocate($image, 203, 210, 212);
$textColor = imagecolorallocate($image, 0, 0, 0);
$boxFile = __DIR__ . '\sert.png';
if(!file_exists($boxFile)) {
	echo 'Изображение не найдено!';
	exit;
}

$imBox = imagecreatefrompng($boxFile);
imagefill($image, 0, 0, $backColor);
imagecopy($image, $imBox, 0, 0, 10, 10, 600, 500);
$fontFile = __DIR__ . '\AssuanBrk.ttf';
if(!file_exists($fontFile)) {
	echo 'Шрифт не найден!';
	exit;
}

header ('Content-Type: image/png');
imagettftext($image, 20, 0, 80, 400, $textColor, $fontFile, $text);
imagepng($image);
imagedestroy($image);

} else {
	echo "<p><b>$userName, вы ответили не верно, попробуйте еще раз.</b></p>";
	echo "<p><br/><a href='list.php'>Перейти к выбору теста.</a></p>";
}
?>