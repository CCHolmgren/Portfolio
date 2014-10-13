<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-11
 * Time: 10:52
 */
session_start();

define("__ROOT__","C:/Users/Chrille/PhpstormProjects/Workshop_2/");

require_once(__ROOT__."/Model/UserModel.php");
require_once(__ROOT__."/Controller/BoatController.php");

$controller = new BoatController();
echo $controller->getHTML();
/*
$userlist = new UserList();
$member = $userlist->getUserById($_GET["userid"]);

$member->addBoat(new Boat(uniqid(),uniqid()));

$userlist->saveUsers();
var_dump($userlist);

echo "Oh fuck. This is not implemented, but it should be. Damn.";*/