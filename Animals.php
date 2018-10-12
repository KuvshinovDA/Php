<?php

$continents = [
    "Africa" => ['Canis','Vulpes pallida'],
    "Australia" => ['Ornithorhynchus anatinus','Tachyglossus aculeatus'],
    "South America" => ['Cingulata','Myrmecophagidae'],
    "North America" => ['Lynx canadensis','Gulo gulo'],
    "Eurasia" => ['Nyctereutes procyonoides','Vulpes corsac'],
    "Antarctica" => ['Hydrurga leptonyx','Lobodon carcinophaga'],
];

$animalName = [];
$animalSurname = [];
foreach ($continents as $place =>$names) {
    foreach ($names as $name) {
        if (substr_count ($name, ' ') == 1) {
    $pieses = explode (" ", $name);
    $animalName[$place][] = $pieses[0];
    $animalSurname[] = $pieses[1];
    }
  }
}

shuffle($animalSurname);
$newNames = [];
$i = 0;
foreach ($animalName as $place => $newAnimals) {
  foreach ($newAnimals as $newAnimal) {
      $newNames[$place][] = $newAnimal ." ".$animalSurname[$i++];
    }
}

foreach ($newNames as $continents =>$animals) {
    echo "<h2>$continents</h2>";
    echo (implode(", ", $animals). '.');
}
?>