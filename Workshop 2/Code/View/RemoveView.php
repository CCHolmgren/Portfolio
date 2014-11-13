<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-01
 * Time: 14:11
 */

require_once("View.php");
class RemoveView extends View{
    public function getRemoveView(Member $member){
        $html = "
        <form method='post'>
            <input type='hidden' name='totallysure'>
            <input type='hidden' name='".self::$memberid."' value='$member->membernumber'>
            <input type='submit' value='Remove this member'>
        </form>
        ";
        return $html;
    }
    public function isSure(){
        return isset($_POST["totallysure"]);
    }
    public function getMemberNumber($post=true){
        if($post){
            return $_POST[self::$memberid];
        }
        else{
            return $_GET[self::$memberid];
        }
    }
}