<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-10
 * Time: 11:22
 */
session_start();

define("__ROOT__","C:/Users/Chrille/PhpstormProjects/Workshop_2");

require_once(__ROOT__ . "/Controller/ListMemberController.php");

$listMembersView = new ListmembersView();
$memberList = (new MemberRepository())->getAllMembers();

$controller = new ListmemberController($listMembersView, $memberList);
echo $controller->getHTML();