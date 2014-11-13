<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-11
 * Time: 10:52
 */
session_start();

define("__ROOT__","C:/Users/Chrille/PhpstormProjects/Workshop_2");

require_once(__ROOT__ . "/Model/MemberModel.php");
require_once(__ROOT__."/Controller/BoatController.php");

$controller = new BoatController();
echo $controller->getHTML();