<?php
// VIEW controller
session_start();

if (($_REQUEST["action"] == 'authentication' or $_REQUEST["action"] == 'requestauth') and (isset($_SESSION['userTK']) and !empty($_SESSION['userTK']))){
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
        if( isset($_REQUEST['origin']) && !empty($_REQUEST['origin']) ){
            $origin = base64_decode($_REQUEST["origin"]);

            if(strpos($origin,"?"))
                $redirectCommand = $origin."&spauth=true";
            else
                $redirectCommand = $origin."?spauth=true";

            echo '<script language="javascript">';
            echo 'window.open("'.$redirectCommand.'","_parent")';
            echo '</script>';
            exit;
        } else {
            require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/menu.tpl.php");
        }
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
    case "mysearches":
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/mysearches.tpl.php");
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
    case "suggesteddocs":
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/suggesteddocs.tpl.php");
    break;
    case "orcidworks":
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/orcidworks.tpl.php");
    break;
    case "logout":
        if( isset($_REQUEST['origin']) && !empty($_REQUEST['origin']) ) {
            $origin = base64_decode($_REQUEST["origin"]);

            if(strpos($origin,"?"))
                $redirectCommand = $origin."&splogout=true";
            else
                $redirectCommand = $origin."?splogout=true";

            echo '<script language="javascript">';
            echo 'window.open("'.$redirectCommand.'","_parent")';
            echo '</script>';
            exit;
        } else {
            header("Location:".RELATIVE_PATH."/controller/".MAIN_PAGE);
            exit();
        }
        break;
    case "mig_id_confirmation":
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/mig_id_confirmation.tpl.php");
        break;
    default:
        require_once(dirname(__FILE__)."/templates/".$_SESSION["skin"]."/authentication.tpl.php");
    break;
}
?>
