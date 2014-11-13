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

    public function __construct($view = null){
        $this->view = $view === null ? new ListmembersView() : $view;
        $this->memberList = new MemberList();
    }
    public function getHTML(){
        if($this->view->getmemberID()){
            $membernumber = $this->view->getmemberID();
            $memberRepository = new MemberRepository();

            $member = $memberRepository->getMemberByMemberNumber($membernumber);
            return $this->view->getListmemberView($member);
        }
        return $this->view->redirect();


    }
}

