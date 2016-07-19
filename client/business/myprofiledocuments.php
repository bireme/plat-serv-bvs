<?php
/**
 * Business my profiles handle
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Fabio Batalha C. Santos (fabio.santos@bireme.org)
 * @author      Gustavo Fonseca (gustavo.fonseca@bireme.org)
 * @copyright   BIREME
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */
require_once(dirname(__FILE__)."/../classes/MyProfiles.php");
require_once(dirname(__FILE__)."/../classes/Trigramas.php");

if ($_REQUEST["task"] === null){
    $_REQUEST["task"] = "list";
}
$response["status"] = false;

switch($_REQUEST["task"]){
    case "list":
        $result = MyProfiles::getProfileList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;

        // verifying if have any default profile
        $defaultProfile = 0;
        foreach ($response["values"] as $register){
            if ($register["profileDefault"] == 1){
                $defaultProfile = $register["profileID"];
                break;
            }
        }

        if ($_REQUEST["profile"] != null){
            $result = MyProfiles::getProfile($_SESSION["userTK"], $_REQUEST["profile"]);
        }else{
            $result = MyProfiles::getProfile($_SESSION["userTK"], $defaultProfile);
        }

        $responseProfile["values"] = $result;
        $responseProfile["status"] = true;
        $_REQUEST['mode'] = ($_REQUEST['mode']=="")?DEFAULT_TRIGRAMAS_MODE:$_REQUEST['mode'];
        $result = Trigramas::getSimilarsByStringISO($responseProfile["values"][0]["profileText"],$_REQUEST['mode']);
        if ($result === false){
            $responseTrigramas["status"] = false;
        }else{
            $responseTrigramas["values"] = $result;
            $responseTrigramas["status"] = true;
        }

    break;
    case "add":
        $inHome = ($_REQUEST["profileInHome"]=="on")?"1":"0";
        $xml  = '<docs>';
        $xml .= '    <doc>';
        $xml .= '        <field name="profile_name">'.$_REQUEST["profileName"].'</field>';
        $xml .= '        <field name="profile_text">'.$_REQUEST["profileText"].'</field>';
        $xml .= '        <field name="profile_default">'.$_REQUEST["profileDefault"].'</field>';
        $xml .= '     </doc>';
        $xml .= '</docs>';
        $result = MyProfiles::addProfile($_SESSION["userTK"],$xml);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "edit":
        $response["status"] = null;
        if ($_REQUEST["persist"] == true){
            $inHome = ($_REQUEST["profileInHome"]=="on")?"1":"0";
            $xml  = '<docs>';
            $xml .= '    <doc>';
            $xml .= '        <field name="profile_name">'.$_REQUEST["profileName"].'</field>';
            $xml .= '        <field name="profile_text">'.$_REQUEST["profileText"].'</field>';
            $xml .= '        <field name="profile_default">'.$_REQUEST["profileDefault"].'</field>';
            $xml .= '     </doc>';
            $xml .= '</docs>';
            $result = MyProfiles::updateProfile($_SESSION["userTK"],$_REQUEST["profile"],$xml);
            $response["status"] = true;
        }else{
            $result = MyProfiles::getProfile($_SESSION["userTK"],$_REQUEST["profile"]);
        }
        $response["values"] = $result[0];
    break;
    case "delete":
        $result = MyProfiles::removeProfile($_SESSION["userTK"],$_REQUEST["profile"]);
        $result = MyProfiles::getProfileList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "inhome":
        $result = MyProfiles::addInHome($_SESSION["userTK"],$_REQUEST["profile"]);
        $result = MyProfiles::getProfileList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    case "notinhome":
        $result = MyProfiles::deleteFromHome($_SESSION["userTK"],$_REQUEST["profile"]);
        $result = MyProfiles::getProfileList($_SESSION["userTK"],$params);
        $response["values"] = $result;
        $response["status"] = true;
    break;
    default:
        die("default");
    break;
}
?>
