<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-10
 * Time: 13:40
 */
require_once(__ROOT__."/Model/UserModel.php");
require_once(__ROOT__."/View/CreateView.php");

class ListAllUsersController {
    private $view;
    private $userList;

    public function __construct($view = null){
        $this->view = $view === null ? new ListUsersView() : $view;
        $this->userList = new UserList();
    }
    public function getHTML(){
        return $this->view->getListAllUsersView();
    }
}