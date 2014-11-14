<?php
/**
 * Created by PhpStorm.
 * member: Chrille
 * Date: 2014-10-01
 * Time: 14:24
 */

require_once("View.php");
require_once(__ROOT__ . "/Model/MemberModel.php");
require_once(__ROOT__ . "/View/ListMembersView.php");
class ListmembersView extends View{
    /**
     * @param MemberList $memberlist The members that we should generate the table for
     * @return string Table containing all members and the data
     */
    public function compactList(MemberList $memberlist){
        $members = $memberlist->getmemberList();
        if($members){
            $result = "<table>
                        <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Membernumber</th>
                                <th>Amount of boats</th>
                                <th colspan='3'>Methods</th>
                            </tr>
                        </thead>
                        <tbody>";

            foreach($members as $member){
                $result .= $this->generateTableRow($member);
            }
            $result .="</tbody></table>";
            return $result;
        }
        return "<p>There seems to be no members added yet and as such the compact list is not available</p>";
    }

    /**
     * @param Member $member The member to display data from
     * @param string $method A method that returns a string, that will be used to generate a cell in the table
     * @param bool $generateCRDLinks Generate Create Read Delete links
     * @param bool $printOutSSN Print out the SSN of the member
     * @return string Table row containing the $member data
     */
    public function generateTableRow(Member $member, $method = "countmembersBoats", $generateCRDLinks = true, $printOutSSN = false){
        $result = "<tr>
                    <td>" .
                        $member->firstname .
                    "</td>
                    <td>" .
                        $member->lastname .
                    "</td>
                    <td>" .
                        $member->membernumber .
                    "</td>";
        if($method !== "")
            $result .= "<td>" .
                            $member->$method() .
                        "</td>";
        if($printOutSSN)
            $result .= "<td>" .
                            $member->getSSN() .
                        "</td>";
        if($generateCRDLinks){
            $result .= "
                    <td><a href=./change/?memberid=" . $member->membernumber . ">Change</a></td>
                    <td><a href=./remove/?memberid=" . $member->membernumber . ">Remove</a></td>
                    <td><a href=./lookat/?memberid=" . $member->membernumber . ">Look at</a></td>";
        }
        $result .= "</tr>";
        return $result;
    }

    /**
     * @param MemberList $memberList The members to display data from
     * @return string An ugly list of people and their boats
     */
    public function fullList(MemberList $memberList){
        $members = $memberList->getmemberList();
        if($members){
            $result = "";
            foreach($members as $member){
                $result .= $member->firstname .
                    " " .
                    $member->lastname .
                    " " .
                    $member->ssn .
                    " " .
                    $member->membernumber .
                    " " .
                    $this->boatListInfo($member);
            }
            return $result;
        }
        return "<p>There seems to be no members added yet and as such the full list is not available</p>";
    }

    /**
     * @param Member $member The member of which we will generate a table to display the boats form
     * @return string Table containing all the boats of the member
     */
    public function boatListInfo(Member $member){
        $result = "";
        $result .= "<a href='".$this->home."boat/?memberid=$member->membernumber&method=".$this::ADD_METHOD_NAME."'>Add boat</a><br>";
        $result .= "<table>
                        <thead>
                            <tr>
                                <th>Length</th>
                                <th>Boattype</th>
                                <th colspan='2'></th>
                            </tr>
                        </thead>
                        <tbody>";
        /** @var Boat $boat */
        foreach($member->boats as $boat){
            $result .= "<tr>";
            $result .= "<td>" .
                            $boat->getLength() .
                        "</td>" .
                        "<td>" .
                            $boat->getBoatType() .
                        "</td>";

            $result .= "<td>
                            <a href='".$this->home."boat/?memberid=$member->membernumber&method=".$this::REMOVE_METHOD_NAME."&length={$boat->getLength()}&boattype={$boat->getBoatType()}'>
                            Remove boat</a>
                        </td>";
            $result .= "<td>
                            <a href='".$this->home."boat/?memberid=$member->membernumber&method=".$this::EDIT_METHOD_NAME."&length={$boat->getLength()}&boattype={$boat->getBoatType()}'>
                            Change boat</a>
                        </td>";
            $result .= "</tr>";
        }
        $result .= "</tbody></table>";
        return $result;
    }
    public function getListmemberView(Member $member){
        $result = "<table>
                        <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Membernumber</th>
                                <th>SSN</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>";

        $result .= $this->generateTableRow($member, "", false, true);
        $result .= "</tbody></table>";
        $result .= $this->boatListInfo($member);
        return $result;
    }
    public function getListAllmembersView(MemberList $memberList){
        //$memberRepositoyr = new MemberRepository();
        $allMembers = $memberList->getmemberList();
        $result = "";

        $result .= "<p><a href='./add/'>Add new member</a></p>";
        $result .= $this->compactList($allMembers);
        $result .= $this->fullList($allMembers);
        return $result;
    }

}