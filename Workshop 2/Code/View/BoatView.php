<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-11
 * Time: 13:45
 */
require_once("ListMembersView.php");
require_once("View.php");
require_once(__ROOT__ . "/Model/MemberModel.php");

class BoatView extends View{
    private $listmembersview;
    private $memberlist;
    public function __construct(){
        $this->listmembersview = new ListMembersView();
        $this->memberlist = new MemberList();
    }
    public function getAddView(){
        $html = "
        <form method='post'>
        <input type='text' name='".self::$length."' placeholder='Length' required='' pattern='[0-9]+[ ]?cm' title='Length in centimeter with cm on the end'>
        <input type='text' name='".self::$boattype."' placeholder='Boattype' required='' pattern='[a-zA-Z0-9 ]+' title='Boattype, letters, numbers and spaces only'>
        <input type='submit' value='Add boat'>
        </form>
                ";
        return $html;
    }

    public function getEditView(){
        $html = "
        <form method='post'>
        <label for='".self::$length."'>Length</label>
        <input type='text' name='".self::$length."' placeholder='{$this->getLengthGET()}'>
        <label for='".self::$boattype."'>Boattype</label>
        <input type='text' name='".self::$boattype."' placeholder='{$this->getBoatTypeGET()}'>
        <input type='submit' value='Edit boat'>
        </form>
        ";
        return $html;
    }

    public function getRemoveView(){
        $html = "
        <form method='post'>
        <input type='hidden' name='".self::$length."' value='{$this->getLengthGET()}'>
        <input type='hidden' name='".self::$boattype."' value='{$this->getBoattypeGET()}'>
        <input type='submit' value='Remove'>
        </form>
        ";
        return $html;
    }

    public function getDefaultView(){
        $member = $this->memberlist->getmemberById($this->getmemberID());
        return $this->listmembersview->getListmemberView($member);
    }
}