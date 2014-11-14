<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-11
 * Time: 15:23
 */

class View {
    const ADD_METHOD_NAME = "add";
    const EDIT_METHOD_NAME = "edit";
    const REMOVE_METHOD_NAME = "remove";

    public static $length = "length";
    public static $method = "method";
    public static $memberid = "memberid";
    public static $boattype = "boattype";
    public static $firstname = "firstname";
    public static $lastname = "lastname";
    public static $ssn = "ssn";
    protected $home = "/labb2/member/";
    public function __get($key){
        $r = new ReflectionObject($this);
        if($r->hasConstant($key)){
            return $r->getConstant($key);
        }
    }
    public function getRequestMethod(){
        return $_SERVER["REQUEST_METHOD"];
    }
    public function redirect(){
        header("Location: ".$this->home);
        exit;
    }
    public function getMethod(){
        if(isset($_GET[self::$method]))
            return htmlspecialchars($_GET[self::$method]);
        return "";
    }
    public function memberIdSet(){
        return isset($_GET[self::$memberid]);
    }
    public function getmemberID(){
        if(isset($_GET[self::$memberid]))
            return htmlspecialchars($_GET[self::$memberid]);
        return "";
    }
    public function getLength(){
        return htmlspecialchars($_POST[self::$length]);
    }
    public function getBoattype(){
        return htmlspecialchars($_POST[self::$boattype]);
    }
    public function getLengthGET(){
        return htmlspecialchars($_GET[self::$length]);
    }
    public function getBoattypeGET(){
        return htmlspecialchars($_GET[self::$boattype]);
    }
    public function getOldLength(){
        return htmlspecialchars($_GET[self::$length]);
    }
    public function getOldBoattype(){
        return htmlspecialchars($_GET[self::$boattype]);
    }
    public function getFirstname(){
        return $_POST[self::$firstname];
    }
    public function getLastname(){
        return $_POST[self::$lastname];
    }
    public function getSSN(){
        return $_POST[self::$ssn];
    }
}