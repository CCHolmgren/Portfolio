<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-10
 * Time: 11:22
 */
session_start();

define("__ROOT__","C:/Users/Chrille/PhpstormProjects/Workshop_2/");

require_once(__ROOT__."/Controller/ChangeUserController.php");

$controller = new ChangeUserController();
echo $controller->getHTML();