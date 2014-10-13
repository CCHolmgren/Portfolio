<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-11
 * Time: 13:45
 */
require_once("ListUsersView.php");
require_once("View.php");
require_once(__ROOT__."Model/UserModel.php");

class BoatView extends View{
    private $listusersview;
    private $userlist;

    public function __construct(){
        $this->userlist = new UserList();
        $this->listusersview = new ListUsersView();
    }
    public function getMethod(){
        if(isset($_GET["method"]))
            return htmlspecialchars($_GET["method"]);
        return "";
    }
    public function getUserID(){
        if(isset($_GET["userid"]))
            return htmlspecialchars($_GET["userid"]);
        return "";
    }
    public function getLength(){
        return htmlspecialchars($_POST["length"]);
    }
    public function getBoattype(){
        return htmlspecialchars($_POST["boattype"]);
    }
    public function getLengthGET(){
        return htmlspecialchars($_GET["length"]);
    }
    public function getBoattypeGET(){
        return htmlspecialchars($_GET["boattype"]);
    }
    public function getOldLength(){
        return htmlspecialchars($_GET["length"]);
    }
    public function getOldBoattype(){
        return htmlspecialchars($_GET["boattype"]);
    }
    public function getAddView(){
        $html = "
        <form method='post'>
        <input type='text' name='length' placeholder='Length' required='' pattern='[0-9]+[ ]?cm' title='Length in centimeter with cm on the end'>
        <input type='text' name='boattype' placeholder='Boattype' required='' pattern='[a-zA-Z0-9 ]+' title='Boattype, letters, numbers and spaces only'>
        <input type='submit' value='Add boat'>
        </form>
                ";
        return $html;
    }

    public function getEditView(){
        $html = "
        <form method='post'>
        <label for='length'>Length</label>
        <input type='text' name='length' placeholder='{$this->getLengthGET()}'>
        <label for='boattype'>Boattype</label>
        <input type='text' name='boattype' placeholder='{$this->getBoatTypeGET()}'>
        <input type='submit' value='Edit boat'>
        </form>
        ";
        return $html;
    }

    public function getRemoveView(){
        $html = "
        <form method='post'>
        <input type='hidden' name='length' value='{$this->getLengthGET()}'>
        <input type='hidden' name='boattype' value='{$this->getBoattypeGET()}'>
        <input type='submit' value='Remove'>
        </form>
        ";
        return $html;
    }

    public function getDefaultView(){
        $user = $this->userlist->getUserById($this->getUserID());
        return $this->listusersview->getListUserView($user);
    }
}