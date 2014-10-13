<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-01
 * Time: 14:11
 */

require_once("View.php");
class RemoveView extends View{
    public function getRemoveView(User $user){
        $html = "
        <form method='post'>
            <input type='hidden' name='totallysure'>
            <input type='hidden' name='membernumber' value='$user->membernumber'>
            <input type='submit' value='Remove this user'>
        </form>
        ";
        return $html;
    }
    public function isSure(){
        return isset($_POST["totallysure"]);
    }
    public function getUserID(){
        return $_POST["membernumber"];
    }
}