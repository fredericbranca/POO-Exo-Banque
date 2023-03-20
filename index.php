<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$client1 = new Titulaire("Panetier", "Camille", "01/07/1985", "Strasbourg");
$client2 = new Titulaire("Gauling", "Jeremie", "13/01/2001", "Metz");

$compte1 = new CompteBancaire("Courant", 658.16, "euro", $client1);
$compte2 = new CompteBancaire("Livret A", 20000.54, "euro", $client1);
$compte3 = new CompteBancaire("Courant", 16.21, "euro", $client2);

// $compte3->setTitulaire($client1);


echo $compte1->crediter(100.5);

?>

