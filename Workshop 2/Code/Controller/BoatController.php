<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-11
 * Time: 12:12
 */
require_once(__ROOT__ . "/Model/MemberModel.php");
require_once(__ROOT__."/View/BoatView.php");

class BoatController {
    private $view;
    private $memberList;

    public function __construct(BoatView $view = null){
        $this->memberList = new MemberList();
        $this->view = $view === null ? new BoatView() : $view;
    }
    public function getHTML(){
        $memberid = $this->view->getmemberID();
        $member = $this->memberList->getmemberById($memberid);

        if($this->view->getRequestMethod() === "POST"){
            $length = $this->view->getLength();
            $boattype = $this->view->getBoattype();

            if($this->view->getMethod() === BoatView::ADD_METHOD_NAME){
                $tempBoat = new Boat($length, $boattype);

                $member->addBoat($tempBoat);
            }
            if($this->view->getMethod() === BoatView::EDIT_METHOD_NAME){
                $oldBoat = new Boat($this->view->getOldLength(), $this->view->getOldBoattype());
                $newBoat = new Boat($length, $boattype);
                $member->editBoat($oldBoat, $newBoat);
            }
            if($this->view->getMethod() === BoatView::REMOVE_METHOD_NAME){
                $tempBoat = new Boat($length, $boattype);

                $member->removeBoat($tempBoat);
            }
            $this->memberList->savemembers();
            $this->view->redirect();
        }
        switch($this->view->getMethod()){
            case BoatView::ADD_METHOD_NAME:
                return $this->view->getAddView();
            case BoatView::EDIT_METHOD_NAME:
                return $this->view->getEditView();
            case BoatView::REMOVE_METHOD_NAME:
                return $this->view->getRemoveView();
            default:
                return $this->view->getDefaultView();
        }
    }
}