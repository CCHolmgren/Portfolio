<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-01
 * Time: 09:44
 */
require_once("Model.php");
require_once("MemberModel.php");

class Boat extends Model{
    private $length;
    private $boattype;

    public function __construct($length, $boattype){
        $this->length = $length;
        $this->boattype = $boattype;
    }
    public function getLength(){
        return $this->length;
    }
    public function getBoatType(){
        return $this->boattype;
    }
}