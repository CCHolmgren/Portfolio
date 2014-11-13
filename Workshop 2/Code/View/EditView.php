<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-01
 * Time: 14:11
 */

require_once("View.php");
class EditView extends View{
    public function getEditView(Member $member){
        $html = "
        <form method='post'>
                <input type='text' name='".self::$firstname."' value='{$member->getFirstname()}'>
                <input type='text' name='".self::$lastname."' value='{$member->getLastname()}'>
                <input type='text' name='".self::$ssn."' value='{$member->getSSN()}'>
                <input type='submit' value='Change'>
                </form>
        ";
        return $html;
    }

    public function getFirstName() {
        return $_POST[self::$firstname];
    }

    public function getSSN() {
        return $_POST[self::$ssn];
    }

    public function getLastName() {
        return $_POST[self::$lastname];
    }
}