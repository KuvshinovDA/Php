<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="styles/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="styles/css/style.css"> <!-- Resource style -->
	<script src="styles/js/modernizr.js"></script> <!-- Modernizr -->
	<title>FAQ</title>
</head>
<body>
<header>
	<h1>FAQ</h1>
</header>
</br><form method = "POST">
    <input type = "submit" name = "exit" value = 'Выход'>
</form></br>
<form action = "index.php" method = "POST">
	<input type="hidden" name="c" value="cases">
	<input type="hidden" name="a" value="newQuestion">
	<input type = "submit" name = "exit" value = 'Задать новый вопрос'>
</form>
<section class="cd-faq">
	<ul class="cd-faq-categories">
	    <?php foreach ($editCategory as $editCat) : ?>  
		<li><a  href="#<?php echo $editCat['name'] ?>"><?php echo $editCat['name'] ?></a></li>
        <?php endforeach; ?>
	</ul> <!-- cd-faq-categories -->

	<div class="cd-faq-items">
		<ul id="basics" class="cd-faq-group">
		<?php foreach ($allUserQuestions as $allQuestions) :?> 
			<li class="cd-faq-title"><h2><?php echo $allQuestions['category'] ?></h2></li>
			<li>
			<?php foreach ($allQuestions['questions'] as $questions) :?>
				<a class="cd-faq-trigger" href="#0"><?php echo $questions['question'] ?>?</a>
				<div class="cd-faq-content">
					<p><?php echo $questions['answer'] ?></p>
				</div> <!-- cd-faq-content -->
			<?php endforeach; ?>
			</li> 
        <?php endforeach; ?>
		</ul> <!-- cd-faq-group -->
	</div> <!-- cd-faq-items -->
	
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<script src="styles/js/jquery-2.1.1.js"></script>
<script src="styles/js/jquery.mobile.custom.min.js"></script>
<script src="styles/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>