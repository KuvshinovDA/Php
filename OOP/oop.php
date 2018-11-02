<?php 
class Product 
{
  public $name;
  public $category;
  public $price;
  public function show()
  {
    echo '<pre>';
    echo $this -> name .'</br>';
    echo $this -> category .'</br>';
    echo $this -> price .'</br>';
  }
  public function __construct($name, $category, $price) 
  {
    $this -> name = $name;
    $this -> category = $category;
    $this -> price = $price;
  }
}
$doll = new Product('Кукла','Игрушка', 50);
$doll -> show();

$bear = new Product('Медведь','Игрушка', 55);
$bear -> show();

class Car extends Product 
{
  public $color;
  public $type;
  public function showCar()
  {
    echo $this -> color .'</br>';
    echo $this -> type .'</br>';
  }
}
$bmw = new Car('BMW', 'Машина', 50000);
$bmw -> color = 'Черный';
$bmw -> type = 'Седан';
$bmw -> show();
$bmw -> showCar();

$audi = new Car('Audi', 'Машина', 80000);
$audi -> color = 'Серый';
$audi -> type = 'Универсал';
$audi -> show();
$audi -> showCar();

class Tv extends Product
{
  public $diagonal;
  public $weight;
  public function showTv()
  {
    echo $this -> diagonal .'</br>';
    echo $this -> weight .'</br>';
  }
}
$sony = new TV('Sony', 'Телевизор', 500);
$sony -> diagonal = 25;
$sony -> weight = 8;
$sony -> show();
$sony -> showTv();

$phillips = new TV('Phillips', 'Телевизор', 568);
$phillips -> diagonal = 20;
$phillips -> weight = 10;
$phillips -> show();
$phillips -> showTv();

class Pen extends Product
{
  public $model;
  public function showModel()
  {
    echo $this -> model .'</br>';
  }
}
$ballpen = new Pen('Ручка', 'Письменные принадлежности', 10);
$ballpen -> model = 'Шариковая ручка';
$ballpen -> show();
$ballpen -> showModel();

$pencil = new Pen('Карандаш', 'Письменные принадлежности', 7);
$pencil -> model = 'С кнопкой';
$pencil -> show();
$pencil -> showModel();

class Duck extends Product
{
  public $age;
  public function showAge()
  {
    echo $this -> age .'</br>';
  }
}
$wildduck = new Duck('Duffy', 'Дикая утка', 100);
$wildduck -> age = 1;
$wildduck -> show();
$wildduck -> showAge();

$homeduck = new Duck('Robin', 'Домашняя утка', 130);
$homeduck -> age = 0.5;
$homeduck -> show();
$homeduck -> showAge();
?>