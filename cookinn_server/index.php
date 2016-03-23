<?php

require_once "models/Connection.php";
require_once "models/managers/Dishmanager.php";
require_once "models/Dish.php";
require_once "controllers/Homepagecontroller.php";
require_once "controllers/Frontcontrollerinterface.php";
require_once "controllers/Frontcontroller.php";

// $frontController = new FrontController(array(
//     "controller" => "Homepage", 
//     "action"     => "index", 
//     "params"     => array(1)
// ));

$frontController = new FrontController();
$frontController->run();


// $dishToUpdate = $dishManager->getDishById(2);
// var_dump($dishToUpdate);

// $dishManager->delete($dishToUpdate);

// $dishToUpdate->setTimeToCook("02:02:02");
// $dishManager->update($dishToUpdate);

// $d = new Dish(array("name" => "Carrot soup", "origin" => "continental", "time_to_cook" => "01:00:00" ));
// $dishManager->add($d);





