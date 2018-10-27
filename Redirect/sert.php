<?php
header('Content-Type: image/png');
$userName = $_GET['userName'];
$image = imagecreatetruecolor(550, 450);

$backColor = imagecolorallocate($image, 203, 210, 212);
$textColor = imagecolorallocate($image, 0, 0, 0);

$boxFile = __DIR__ . '\sert.png';
if(!file_exists($boxFile)) {
	echo 'Катринка не найдена!';
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

$text = "$userName, все правильно!";

imagettftext($image, 20, 0, 80, 400, $textColor, $fontFile, $text);


imagepng($image);
imagedestroy($image);
?>