<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-10
 * Time: 13:40
 */
require_once(__ROOT__ . "/Model/MemberModel.php");
require_once(__ROOT__ . "/View/ListMembersView.php");

class ListmemberController {
    private $view;
    private $memberList;

    public function __construct(ListmembersView $view, MemberList $memberList) {
        $this->view = $view;
        $this->memberList = $memberList;
    }

    public function getHTML() {
        if ($this->view->getmemberID()) {
            $membernumber = $this->view->getmemberID();

            $member = $this->memberList->getmemberById($membernumber);

            return $this->view->getListmemberView($member);
        }

        $this->view->redirect();
    }
}

