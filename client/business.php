<?php
// BUSINESS controller

if ( isset($_SESSION['userTK']) && !empty($_SESSION['userTK']) ) {
    require_once(dirname(__FILE__)."/classes/Authentication.php");

    $data = Authentication::getUserData($_SESSION["userTK"]);
    
    if ( !$data['agreement_date'] && 'logout' != $_REQUEST["action"] ) {
        if ( $_REQUEST['origin'] ) {
            $origin = base64_decode($_REQUEST['origin']);
            if ( substr($origin, 0, strlen(EBLUEINFO_DOMAIN)) === EBLUEINFO_DOMAIN ) {
                header('Location:'.$origin);
                exit();
            }
        }

        $b64HttpHost = base64_encode(RELATIVE_PATH.'/controller/authentication');
        header('Location:'.SERVICES_PLATFORM_DOMAIN.'/pub/userData.php?userTK='.urlencode($_SESSION["userTK"]).'&c='.$b64HttpHost);
        exit();
    }
} else {
    $fl = true; // force logout
    if ( $_REQUEST["action"] == 'authentication' ) $fl = false;
    if ( $_REQUEST["action"] == 'servicesplatform' ) $fl = false;
    if ( $_REQUEST["action"] == 'mydocuments' and $public ) $fl = false;
    if ( $_REQUEST["action"] == 'suggesteddocs' and $public ) $fl = false;
    if ( $fl ) $_REQUEST["action"] = 'logout';
}

switch($_REQUEST["action"]){
    case "authentication":
        require_once(dirname(__FILE__)."/business/authentication.php");
        if ( $_SESSION['userTK'] ) {
            require_once(dirname(__FILE__)."/business/widgets.php");
        } else {
            require_once(dirname(__FILE__)."/business/logout.php");
        }
    break;
    case "new_pass":
        require_once(dirname(__FILE__)."/business/new_pass.php");
    break;
    case "mydocuments":
        require_once(dirname(__FILE__)."/business/mydocuments.php");
    break;
    case "directories":
        if ( in_array($_REQUEST['task'], array('add', 'edit', 'delete', 'publish', 'movedoc')) ) {
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
    case "myprofiledocuments":
        require_once(dirname(__FILE__)."/business/myprofiledocuments.php");
    break;
    case "suggesteddocs":
        require_once(dirname(__FILE__)."/business/suggesteddocs.php");
    break;
    case "orcidworks":
        require_once(dirname(__FILE__)."/business/orcidworks.php");
    break;
    case "searchresults":
        require_once(dirname(__FILE__)."/business/searchresults.php");
    break;
    case "logout":
        require_once(dirname(__FILE__)."/business/logout.php");
    break;
    case "mig_id_confirmation":
        require_once(dirname(__FILE__)."/business/mig_id_confirmation.php");
    break;
    case "servicesplatform":
        require_once(dirname(__FILE__)."/business/servicesplatform.php");
    break;
    case 'tutorial': break;
    default:
        die("default");
    break;
}

?>
