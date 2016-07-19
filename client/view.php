<?php
// VIEW controller
session_start();
if (($_REQUEST["action"] == 'authentication' or $_REQUEST["action"] == 'requestauth') and $_SESSION["userTK"] != ""){
    $_REQUEST["action"] = 'menu';
}
switch($_REQUEST["action"]){
    case "authentication":
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/authentication.tpl.php");
    break;
    case "requestauth":
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/requestauth.tpl.php");
    break;
    case "new_pass":
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/new_pass.tpl.php");
    break;
    case "menu":
        /*
         * fixme: if add to handle SSO, needs to be rearranged in the bussines file and removed when Shibbolized
         * reporter: Fabio Batalha (fabio.santos@bireme.org)
         * date: 20091012
         */
        if($_REQUEST["origin"] != ""){
            $origin = base64_decode($_REQUEST["origin"]);
            if(strpos($origin,"?")){
                $redirectCommand = ($origin."&userID=".$_SESSION["userTK"]."&firstName=".$_SESSION["userFirstName"]."&lastName=".$_SESSION["userLastName"]."&email=".$_SESSION["userMail"]."&tlng=en&lng=en");
            }else{
                $redirectCommand = ($origin."?userID=".$_SESSION["userTK"]."&firstName=".$_SESSION["userFirstName"]."&lastName=".$_SESSION["userLastName"]."&email=".$_SESSION["userMail"]."&tlng=en&lng=en");
            }
            echo '<script language="javascript">';
            echo 'window.open("'.$redirectCommand.'","_parent")';
            echo '</script>';
        }
               
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/menu.tpl.php");
    break;
    case "mydocuments":
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/mydocuments.tpl.php");
    break;
    case "directories":
        if ($_REQUEST["task"] == "add"){
            require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/directories_add.tpl.php");
        }elseif ($_REQUEST["task"] == "edit"){
            require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/directories_add.tpl.php");
        }elseif ($_REQUEST["task"] == "delete"){
            require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/directories_rem.tpl.php");
        }elseif ($_REQUEST["task"] == "movedoc"){
            require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/directories_movdoc.tpl.php");
        }elseif ($_REQUEST["task"] == "publish"){
            require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/directories_publish.tpl.php");
        }
    break;
    case "mylinks":
        if (($_REQUEST["task"] == "add") or ($_REQUEST["task"] == "edit")){
            require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/mylinks_add.tpl.php");
        }else{
            require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/mylinks.tpl.php");
        }
    break;
    case "mynews":
        if (($_REQUEST["task"] == "add") or ($_REQUEST["task"] == "edit")){
            require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/mynews_add.tpl.php");
        }else{
            require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/mynews.tpl.php");
        }
    break;
    case "myalerts":
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/myalerts.tpl.php");

    break;
    case "myprofiledocuments":
        if (($_REQUEST["task"] == "add") or ($_REQUEST["task"] == "edit")){
            require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/myprofiledocuments_add.tpl.php");
        }else{
            require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/myprofiledocuments.tpl.php");
        }
    break;
    case "logout":
        header("Location:".RELATIVE_PATH."/controller/".MAIN_PAGE);
        die();
        break;
    case "mig_id_confirmation":
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/mig_id_confirmation.tpl.php");
        break;
    default:
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/authentication.tpl.php");
    break;
}
?>
