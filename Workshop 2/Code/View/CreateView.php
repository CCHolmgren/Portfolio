<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-01
 * Time: 14:11
 */

require_once("View.php");
class CreateView extends View{
    public function getCreateView(){
        $html = '<form method="post">
                <input type="text" name="'.self::$firstname.'" placeholder="Firstname">
                <input type="text" name="'.self::$lastname.'" placeholder="Lastname">
                <input type="text" name="'.self::$ssn.'" placeholder="Social security number">
                <input type="submit" value="Add">
                </form>';
        return $html;
    }
}