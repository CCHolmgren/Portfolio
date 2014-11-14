<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-10
 * Time: 13:40
 */
require_once(__ROOT__ . "/Model/MemberModel.php");
require_once(__ROOT__ . "/View/EditView.php");

class ChangememberController {
    private $view;
    private $memberList;

    public function __construct(EditView $view, MemberList $memberList) {
        $this->view = $view;
        $this->memberList = $memberList;
    }

    public function getHTML() {
        $membernumber = $this->view->getmemberID();

        $member = $this->memberList->getmemberById($membernumber);

        if ($this->view->getRequestMethod() === "POST") {
            $member->setFirstname($this->view->getFirstName());
            $member->setLastname($this->view->getLastName());
            $member->setSsn($this->view->getSSN());
            $this->memberList->editmember($member);
            $this->memberList->savemembers();
            $this->view->redirect();
        }

        return $this->view->getEditView($member);
    }
}
