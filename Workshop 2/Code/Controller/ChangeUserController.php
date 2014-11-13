<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-10
 * Time: 13:40
 */
require_once(__ROOT__."/Model/UserModel.php");
require_once(__ROOT__."/View/EditView.php");

class ChangeUserController {
    private $view;
    private $userList;

    public function __construct($view = null){
        $this->view = $view === null ? new EditView() : $view;
        $this->userList = new UserList();
    }
    public function getHTML(){
        if(isset($_GET["userid"]))
            $membernumber = $_GET["userid"];
        $userRepository = new UserRepository();

        $member = $userRepository->getUserById($membernumber);
        if($this->view->getRequestMethod() === "POST"){
            $member->firstname = $_POST["firstname"];
            $member->lastname = $_POST["lastname"];
            $member->ssn = $_POST["ssn"];
            $this->userList->editUser($member);
            $this->userList->saveUsers();
            $this->view->redirect();
        }
        return $this->view->getEditView($member);
    }
}
