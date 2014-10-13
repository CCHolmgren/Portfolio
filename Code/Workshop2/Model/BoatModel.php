<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-01
 * Time: 09:44
 */
require_once("UserModel.php");

class BoatList{
    public $boats;

    public function countUsersBoats(){
        return count($this->boats);
    }
    public function addBoat(Boat $boat){
        $this->boats[] = $boat;
    }
    public function editBoat(Boat $newBoatInfo, $index){
        $this->boats[$index] = $newBoatInfo;
    }
    public function removeBoat($index){
        array_splice($this->boats,$index, 1);
        return true;
    }
}
class Boat {
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