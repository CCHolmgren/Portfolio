<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-10
 * Time: 13:40
 */
require_once(__ROOT__ . "/Model/MemberModel.php");
require_once(__ROOT__ . "/View/CreateView.php");

class ListAllmembersController {
    private $view;
    private $memberList;
    private $memberRepository;

    public function __construct(ListmembersView $view, MemberList $memberList) {
        $this->view = $view;
        $this->memberList = $memberList;
    }

    public function getHTML() {
        return $this->view->getListAllmembersView($this->memberList);
    }
}