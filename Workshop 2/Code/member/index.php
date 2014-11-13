<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-10
 * Time: 11:12
 */
session_start();

define("__ROOT__","C:/Users/Chrille/PhpstormProjects/Workshop_2");

require_once(__ROOT__ . "/Model/MemberModel.php");
require_once(__ROOT__ . "/View/ListMembersView.php");
require_once(__ROOT__ . "/Controller/ListAllMembersController.php");

$controller = new ListAllmembersController();
echo $controller->getHTML();