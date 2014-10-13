<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-01
 * Time: 10:17
 */
session_start();
define("__ROOT__","C:/Users/Chrille/PhpstormProjects/Workshop_2/");
require_once("Model/BoatModel.php");
require_once("Model/UserModel.php");
require_once("View/ListUsersView.php");

$html = "<a href='./user/?method=add'>Create member</a>
<a href='./user/'>List all members compact list</a>
<a href='./user/'>List all members complete list</a>
<a href='./user/?method=remove'>Remove member</a>
<a href='./user/?method=change'>Change member</a>
<a href='./user/?method=lookat'>Look at members info</a>
<a>Register a new boat on a member</a>
<a>Remove a boat</a>
<a>Change a boat</a>
";
echo $html;