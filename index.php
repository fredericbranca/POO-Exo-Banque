<?php


spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$client1 = new Titulaire("Panetier", "Camille", "01-07-1985", "Strasbourg");
$client2 = new Titulaire("Gauling", "Jeremie", "13-01-2001", "Metz");

$compte1 = new CompteBancaire("Courant", 658.16, "euro", $client1);
$compte2 = new CompteBancaire("Livret A", 20000.54, "euro", $client1);
$compte3 = new CompteBancaire("Courant", 16.21, "euro", $client2);


echo $compte1->crediter(100.5);
echo $compte1->virement(300, $compte3);
echo $compte3->crediter(-16.4);
echo $compte1->virement(-500, $compte2);
echo $compte1->debiter(659);
echo $compte1->virement(658.17, $compte2);
echo $client1->infoTitulaire();
echo $client2->infoTitulaire();
echo $compte1->infoCompte();
echo $compte2->virement(5000.5, $compte1);
echo $compte3->infoCompte();


?>

