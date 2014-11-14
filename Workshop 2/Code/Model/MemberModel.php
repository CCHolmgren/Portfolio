<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-01
 * Time: 09:44
 */
require_once("Model.php");
require_once("BoatModel.php");

class MemberRepository{
    /**
     * @return mixed|MemberList
     */
    public function getAllMembers(){

        if(file_exists(__ROOT__."/Members.txt")){
            $filecontents = file_get_contents(__ROOT__."/Members.txt");
            $memberList = unserialize($filecontents);
        }
        else {
            $memberList = new MemberList();
        }
        return $memberList;
    }

    /**
     * @param $id
     * @return Member
     */
    public function getMemberByMemberNumber($id){
        if(file_exists(__ROOT__."/Members.txt")){
            $filecontents = file_get_contents(__ROOT__."/Members.txt");
            $memberList = unserialize($filecontents);
            foreach($memberList->getmemberList() as $member){
                if($member->membernumber == $id){
                    return $member;
                }
            }
        }
    }
    public static function savemembers(MemberList $memberLIst){
        file_put_contents(__ROOT__."/Members.txt", serialize($memberLIst));
    }

}
class MemberList{
    private $members;

    public function __construct(array $members=[]){
        $this->members = $members;
    }

    /**
     * @return array
     */
    public function getmemberList(){
        return $this->members;
    }
    public function removemember(Member $member){
        foreach($this->members as $key=>$value){
            if($value->membernumber === $member->membernumber){
                array_splice($this->members, $key, 1);
                return true;
            }
        }
        return false;
    }
    public function editmember(Member $member){
        foreach($this->members as $key=>$value){
            if($value->membernumber === $member->membernumber){
                $this->members[$key] = $member;
                return true;
            }
        }
        return false;
    }
    public function addmember(Member $member){
        $this->members[] = $member;
    }

    /**
     * @param $index
     * @return Member
     */
    public function getmember($index){
        return $this->members[$index];
    }

    /**
     * @param $id
     * @return Member
     */
    public function getmemberById($id){
        foreach($this->members as $key=>$value){
            if($value->membernumber === $id){
                return $value;
            }
        }
    }
    public function savemembers(){
        MemberRepository::savemembers($this);
    }
}
class Member extends Model{
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
    public function countmembersBoats(){
        return count($this->boats);
    }
    public function addBoat(Boat $boat){
        $this->boats[] = $boat;
    }
    public function editBoat(Boat $oldBoatInfo, Boat $newBoatInfo){
        /** @var Boat $value */
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
        /** @var Boat $value */
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