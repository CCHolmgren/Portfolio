<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-01
 * Time: 09:44
 */
require_once("Model.php");
require_once("BoatModel.php");

class UserRepository{
    /**
     * @return mixed|UserList
     */
    public function getAllUsers(){
        if(file_exists(__ROOT__."Users.txt")){
            $filecontents = file_get_contents(__ROOT__."Users.txt");
            $userList = unserialize($filecontents);
        }
        else {
            return new UserList(array());
        }
        return $userList;
    }

    /**
     * @param $id
     * @return User
     */
    public function getUserById($id){
        if(file_exists(__ROOT__."Users.txt")){
            $filecontents = file_get_contents(__ROOT__."Users.txt");
            $userList = unserialize($filecontents);
            foreach($userList->getUserList() as $user){
                if($user->membernumber == $id){
                    return $user;
                }
            }
        }

    }
}
class UserList{
    private $users;

    public function getType(){
        return "userList";
    }
    public function __construct(array $users=null){

        if($users !== null) {
            $this->users = $users;
        }
        else {
            $ur = new UserRepository();
            $this->users = $ur->getAllUsers()->getUserList();
        }
    }

    /**
     * @return array
     */
    public function getUserList(){
        return $this->users;
    }
    public function removeUser(User $user){
        foreach($this->users as $key=>$value){
            if($value->membernumber === $user->membernumber){
                array_splice($this->users, $key, 1);
                return true;
            }
        }
        return false;
    }
    public function editUser(User $user){
        foreach($this->users as $key=>$value){
            if($value->membernumber === $user->membernumber){
                $this->users[$key] = $user;
                return true;
            }
        }
        return false;
    }
    public function addUser(User $user){
        $this->users[] = $user;
    }

    /**
     * @param $index
     * @return User
     */
    public function getUser($index){
        return $this->users[$index];
    }

    /**
     * @param $id
     * @return User
     */
    public function getUserById($id){
        foreach($this->users as $key=>$value){
            if($value->membernumber === $id){
                return $value;
            }
        }
    }
    public function saveUsers(){
        file_put_contents(__ROOT__."Users.txt", serialize($this));
    }
}
class User {
    public $firstname;
    public $lastname;
    public $ssn;
    public $membernumber;
    public $boats;

    public function __construct($firstname = "", $lastname = "", $ssn = "", $membernumber = ""){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->ssn = $ssn;
        $this->membernumber = $membernumber === "" ? uniqid() : $membernumber;
        $this->boats = array();

    }
    public function getFirstName(){
        return $this->firstname;
    }
    public function getLastName(){
        return $this->lastname;
    }
    public function getSSN(){
        return $this->ssn;
    }
    public function countUsersBoats(){
        return count($this->boats);
    }
    public function addBoat(Boat $boat){
        $this->boats[] = $boat;
    }
    public function editBoat(Boat $oldBoatInfo, Boat $newBoatInfo){
        foreach($this->boats as $key=>$value){
            if($value->getLength() === $oldBoatInfo->getLength() && $value->getBoatType() === $oldBoatInfo->getBoatType()){
                unset($this->boats[$key]);
                $this->boats[$key] = $newBoatInfo;
                return true;
            }
        }
        return false;
    }
    public function removeBoat(Boat $boat){
        foreach($this->boats as $key=>$value){
            if($value->getLength() === $boat->getLength() && $value->getBoatType() === $boat->getBoatType()){
                array_splice($this->boats,$key, 1);
                return true;
            }
        }
        return false;
    }
    /**
     * @return string
     */
    public function getMemberNumber(){
        return $this->membernumber;
    }

    /**
     * @return int
     */
    public function countBoats(){
        return count($this->boats);
    }

    /**
     * @return array
     */
    public function getBoatList(){
        return $this->boats;
    }
}