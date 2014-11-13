<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-10
 * Time: 13:40
 */
require_once(__ROOT__ . "/Model/MemberModel.php");
require_once(__ROOT__."/View/RemoveView.php");

class RemovememberController {
    private $view;
    private $memberList;

    public function __construct($view = null){
        $this->view = $view === null ? new RemoveView() : $view;
        $this->memberList = new MemberList();
    }
    public function getHTML(){
        $memberRepository = new MemberRepository();
        $member = $memberRepository->getMemberByMemberNumber($this->view->getMemberNumber(false));

        if($this->view->getRequestMethod() === "POST" && $this->view->isSure()){
            $this->memberList->removemember($member);
            $this->memberList->savemembers();
            $this->view->redirect();
        }
        return $this->view->getRemoveView($member);
    }
}