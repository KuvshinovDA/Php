<!DOCTYPE html>
<html>
<head>
	<title>Тест</title>
</head>
<body>
    <h3>тест продвинутый</h3>
    
    <?php 

    $uploadDir = 'files';
    $fileName = $_SESSION['level'];
    $path = 'C:\OSPanel\domains\WindTest\files\advanced.json';
    //$data = json_decode(file_get_contents(__DIR__ .DIRECTORY_SEPARATOR .$uploadDir .DIRECTORY_SEPARATOR .$fileName), true);
    $data = json_decode(file_get_contents($path), true);
    echo '<pre>';

    var_dump ($data);

    $a = '';
    echo '<pre>';
        print_r ($_SESSION['login']); 
        echo '<pre>';
        print_r ($_SESSION['instructor']);
        echo '<pre>';
        print_r ($_SESSION['level']);
        

    ?>
      
</body>
</html>