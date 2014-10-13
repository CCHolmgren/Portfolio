<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-01
 * Time: 14:11
 */

require_once("View.php");
class EditView extends View{
    public function getEditView(User $user){
        $html = "
        <form method='post'>
                <input type='text' name='firstname' value='{$user->getFirstname()}'>
                <input type='text' name='lastname' value='{$user->getLastname()}'>
                <input type='text' name='ssn' value='{$user->getSSN()}'>
                <input type='submit' value='Change'>
                </form>
        ";
        return $html;
    }
}