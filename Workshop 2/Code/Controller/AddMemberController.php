<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-10
 * Time: 12:52
 */
require_once(__ROOT__ . "/Model/MemberModel.php");
require_once(__ROOT__."/View/CreateView.php");

class AddmemberController {
    private $view;
    private $memberList;

    public function __construct($view = null){
        $this->view = $view === null ? new CreateView() : $view;
        $this->memberList = new MemberList();
    }
    public function getHTML(){
        if($this->view->getRequestMethod() === "POST"){
            $tempmember = new Member($this->view->getFirstname(),$this->view->getLastname(),$this->view->getSSN());
            $this->memberList->addmember($tempmember);
            $this->memberList->savemembers();
            $this->view->redirect();
        }
        return $this->view->getCreateView();
    }
}