<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-10
 * Time: 13:40
 */
require_once(__ROOT__."/Model/UserModel.php");
require_once(__ROOT__."/View/RemoveView.php");

class RemoveUserController {
    private $view;
    private $userList;

    public function __construct($view = null){
        $this->view = $view === null ? new RemoveView() : $view;
        $this->userList = new UserList();
    }
    public function getHTML(){
        $userRepository = new UserRepository();
        $user = $userRepository->getUserById($_GET["userid"]);

        if($this->view->getRequestMethod() === "POST" && $this->view->isSure()){
            $this->userList->removeUser($user);
            $this->userList->saveUsers();
            $this->view->redirect();
        }
        return $this->view->getRemoveView($user);
    }
}