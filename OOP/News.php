<?php

class News 
{
	public $tytle;
	public $header;
	public $text;
	public $autor;

	public function getTytle() 
	{
      echo $this -> tytle;
	}

	public function getHeader() 
	{
	  echo $this -> header;
	}

	public function getText() 
	{
	  echo $this -> text;
	} 
	public function getautor() 
	{
	  echo $this -> autor;
	}  
}

$news = new News();
$news->tytle = "Главные новости дня.";
$news->header = "Погода в столице.";
$news->text = "С завтрашнего дня в столице ожидается похолодание.";
$news->autor = "Главный метеоролог";

?>


<!DOCTYPE html>
<html>
<head>
	<title><?php echo $news->getTytle()?></title>
</head>
<body>
<div>
	<p><h1><?php echo $news->getHeader()?></h1></p>
</div>
<div>
	<p><h2><?php echo $news->getText()?></h2></p>
</div>
<div>
	<p>Информацию предоставил <?php echo $news->getAutor()?>.</p>
</div>
</body>
</html>