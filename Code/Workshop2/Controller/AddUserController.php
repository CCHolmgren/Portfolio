<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-10
 * Time: 12:52
 */
require_once(__ROOT__."/Model/UserModel.php");
require_once(__ROOT__."/View/CreateView.php");

class AddUserController {
    private $view;
    private $userList;

    public function __construct($view = null){
        $this->view = $view === null ? new CreateView() : $view;
        $this->userList = new UserList();
    }
    public function getHTML(){
        if($this->view->getRequestMethod() === "POST"){
            $tempUser = new User($this->view->getFirstname(),$this->view->getLastname(),$this->view->getSSN());
            $this->userList->addUser($tempUser);
            $this->userList->saveUsers();
            $this->view->redirect();
        }
        return $this->view->getCreateView();
    }
}