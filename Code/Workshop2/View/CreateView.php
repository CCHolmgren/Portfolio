<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-01
 * Time: 14:11
 */

require_once("View.php");
class CreateView extends View{
    public function getFirstname(){
        return $_POST["firstname"];
    }
    public function getLastname(){
        return $_POST["lastname"];
    }
    public function getSSN(){
        return $_POST["ssn"];
    }
    public function getCreateView(){
        $html = '<form method="post">
                <input type="text" name="firstname" placeholder="Firstname">
                <input type="text" name="lastname" placeholder="Lastname">
                <input type="text" name="ssn" placeholder="Social security number">
                <input type="submit" value="Add">
                </form>';
        return $html;
    }
}