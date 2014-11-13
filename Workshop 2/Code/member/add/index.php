<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-10
 * Time: 11:22
 */
session_start();

define("__ROOT__","C:/Users/Chrille/PhpstormProjects/Workshop_2");

require_once(__ROOT__ . "/Model/MemberModel.php");
require_once(__ROOT__."/View/CreateView.php");
require_once(__ROOT__ . "/Controller/AddMemberController.php");

$controller = new AddmemberController();
echo $controller->getHTML();