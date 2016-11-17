<?php
// BUSINESS controller

switch($_REQUEST["action"]){
    case "authentication":
        require_once(dirname(__FILE__)."/business/authentication.php");
    break;
    case "new_pass":
        require_once(dirname(__FILE__)."/business/new_pass.php");
    break;
    case "mydocuments":
        require_once(dirname(__FILE__)."/business/mydocuments.php");
    break;
    case "directories":
        if ($_REQUEST["task"] == "add" or $_REQUEST["task"] == "edit" or
            $_REQUEST["task"] == "delete" or $_REQUEST["task"] == "publish"){
            require_once(dirname(__FILE__)."/business/directories.php");
        }
        if ($_REQUEST["task"] == "movedoc"){
            require_once(dirname(__FILE__)."/business/directories.php");
        }
    break;
    case "mylinks":
        require_once(dirname(__FILE__)."/business/mylinks.php");
    break;
    case "mysearches":
        require_once(dirname(__FILE__)."/business/mysearches.php");
    break;
    case "mynews":
        require_once(dirname(__FILE__)."/business/mynews.php");
    break;
    case "myalerts":
        require_once(dirname(__FILE__)."/business/myalerts.php");
    break;
    case "logout";        
        require_once(dirname(__FILE__)."/business/logout.php");
    break;
    case "myprofiledocuments";
        require_once(dirname(__FILE__)."/business/myprofiledocuments.php");
    break;
    case "mig_id_confirmation";
        require_once(dirname(__FILE__)."/business/mig_id_confirmation.php");
    break;
    case "servicesplatform":
        require_once(dirname(__FILE__)."/business/servicesplatform.php");
    break;
    default:
        die("default");
    break;
}
//header("Location: ../view/".$_REQUEST["action"]);
?>
