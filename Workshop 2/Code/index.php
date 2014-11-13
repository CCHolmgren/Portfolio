<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-01
 * Time: 10:17
 */
session_start();
define("__ROOT__","C:/Users/Chrille/PhpstormProjects/Workshop_2");
require_once("Model/BoatModel.php");
require_once("Model/MemberModel.php");
require_once("View/ListMembersView.php");

$html = "<a href='member/?method=add'>Create member</a>
<a href='member/'>List all members compact list</a>
<a href='member/'>List all members complete list</a>
<a href='member/?method=remove'>Remove member</a>
<a href='member/?method=change'>Change member</a>
<a href='member/?method=lookat'>Look at members info</a>
<a>Register a new boat on a member</a>
<a>Remove a boat</a>
<a>Change a boat</a>
";
echo $html;