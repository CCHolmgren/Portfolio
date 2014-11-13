<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-10
 * Time: 13:40
 */
require_once(__ROOT__ . "/Model/MemberModel.php");
require_once(__ROOT__."/View/CreateView.php");

class ListAllmembersController {
    private $view;
    private $memberList;

    public function __construct($view = null){
        $this->view = $view === null ? new ListmembersView() : $view;
        $this->memberList = new MemberList();
    }
    public function getHTML(){
        return $this->view->getListAllmembersView();
    }
}