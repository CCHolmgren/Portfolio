<?php
/**
 * Created by PhpStorm.
 * User: Chrille
 * Date: 2014-10-10
 * Time: 13:40
 */
require_once(__ROOT__."/Model/UserModel.php");
require_once(__ROOT__."/View/ListUsersView.php");

class ListUserController {
    private $view;
    private $userList;

    public function __construct($view = null){
        $this->view = $view === null ? new ListUsersView() : $view;
        $this->userList = new UserList();
    }
    public function getHTML(){
        if(isset($_GET["method"])){
            echo $_GET["method"];
        }
        if(isset($_GET["userid"])){
            $membernumber = $_GET["userid"];
            $userRepository = new UserRepository();

            $member = $userRepository->getUserById($membernumber);
            return $this->view->getListUserView($member);
        }
        header("Location: "."/Workshop2/user/");
        exit;


    }
}

