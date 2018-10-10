<?php
    $name = 'Дмитрий';
    $age = 35;
    $email = 'kuvshinov_d_a@mail.ru';
    $city = 'Москва';
    $about ='Я учу PhP';
//---------------------------------------------------
    $x = rand (0,100);
    echo "Число $x <br /> ";

    $var1 = 10;
    $var2 = 15;

while ( $var1 <= $x )
    {
    if ( $var1 == $x ) 
        {
	    break;
        } 
        else 
        {
	    $var3 = $var1;
	    $var1 = $var1 + $var2;
	    $var2 = $var3;
    } 
}

if ($var1 == $x) 
    {
	    echo "Задуманное число входит в числовой ряд";
    } 
    else 
    {
	    echo "Задуманное число НЕ входит в числовой ряд";
    }
?>

<html lang="ru">
<head>
        <title>Страница обо мне</title>
        <meta charset="utf-8">
        <style>
            body {
                font-family: sans-serif;  
            }
            
            dl {
                display: table-row;
            }
            
            dt, dd {
                display: table-cell;
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h1>Страница пользователя Дмитрий</h1>
        <dl>
            <dt>Имя</dt>
            <dd><?= $name ?></dd>
        </dl>
        <dl>
            <dt>Возраст</dt>
            <dd><?= $age ?></dd>
        </dl>
        <dl>
            <dt>Адрес электронной почты</dt>
            <dd><a href="mailto:<?= $email ?>"><?= $email ?></a></dd>
        </dl>
        <dl>
            <dt>Город</dt>
            <dd><?= $city ?></dd>
        </dl>
        <dl>
            <dt>О себе</dt>
            <dd><?= $about ?></dd>
        </dl>
</body>
</html>