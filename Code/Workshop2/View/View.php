<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-11
 * Time: 15:23
 */

class View {
    public function getRequestMethod(){
        return $_SERVER["REQUEST_METHOD"];
    }
    public function redirect(){
        header("Location: "."/Workshop2/user/");
        exit;
    }
}