<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-10
 * Time: 13:40
 */
require_once(__ROOT__ . "/Model/MemberModel.php");
require_once(__ROOT__."/View/EditView.php");

class ChangememberController {
    private $view;
    private $memberList;

    public function __construct(View $view = null){
        $this->view = $view === null ? new EditView() : $view;
        $this->memberList = new MemberList();
    }
    public function getHTML(){
        $membernumber = $this->view->getmemberID();
        $memberRepository = new MemberRepository();

        $member = $memberRepository->getMemberByMemberNumber($membernumber);

        if($this->view->getRequestMethod() === "POST"){
            $member->firstname = $this->view->getFirstName();
            $member->lastname = $this->view->getLastName();
            $member->ssn = $this->view->getSSN();
            $this->memberList->editmember($member);
            $this->memberList->savemembers();
            $this->view->redirect();
        }
        return $this->view->getEditView($member);
    }
}
