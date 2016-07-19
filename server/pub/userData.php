<?
ob_start("ob_gzhandler");
session_start();
require_once(dirname(__FILE__)."/include/includes.php");
require_once(dirname(__FILE__)."/include/countriesLibrary.php");
require_once(dirname(__FILE__)."/translations.php");
require_once(dirname(__FILE__)."/../classes/User.php");
require_once(dirname(__FILE__)."/../classes/UserDAO.php");
require_once(dirname(__FILE__)."/../classes/Tools.php");
require_once(dirname(__FILE__)."/../classes/ToolsAuthentication.php");
require_once(dirname(__FILE__)."/../classes/Verifier.php");

if(!empty($_GET['userTK'])){
    $arrUserData = Token::unmakeUserTK($_GET['userTK']);
}

$callerURL = !empty($_REQUEST['c'])?base64_decode($_REQUEST['c']):false;

/* variaveis do formulario */
$userID = isset($arrUserData)?$arrUserData['userID']:$_REQUEST['id'];

$firstName = !empty($_REQUEST['firstName']) ? $_REQUEST['firstName'] : false;
$lastName = !empty($_REQUEST['lastName']) ? $_REQUEST['lastName'] : false;
$gender = !empty($_REQUEST['gender']) ? $_REQUEST['gender'] : false;
$email = !empty($_REQUEST['email']) ? $_REQUEST['email'] : false;
$login = !empty($_REQUEST['login']) ? $_REQUEST['login'] : false;
$password = !empty($_REQUEST['password']) ? $_REQUEST['password'] : false;
$profilesTexts = !empty($_REQUEST['profiletext']) ? $_REQUEST['profiletext'] : false;
$profilesNames = !empty($_REQUEST['profilename']) ? $_REQUEST['profilename'] : false;
$profilesIDs = !empty($_REQUEST['profileid']) ? $_REQUEST['profileid'] : false;
$grauDeFormacao = !empty($_REQUEST['degree']) ? $_REQUEST['degree'] : false;
$afiliacao = !empty($_REQUEST['afiliacao']) ? $_REQUEST['afiliacao'] : false;
$country = !empty($_REQUEST['country']) ? $_REQUEST['country'] : false;
$source = !empty($_REQUEST['source']) ? $_REQUEST['source'] : false;
$acao = !empty($_REQUEST['acao']) ? $_REQUEST['acao'] : 'default';
$msg = null; /* system messages */

switch($acao){
    case "gravar":
        $usr = new User();
        $usr->setFirstName($firstName);
        $usr->setLastName($lastName);
        $usr->setGender($gender);
        $usr->setID($login);
        $usr->setPassword($password);
        $usr->setEmail($login);
        $usr->setAffiliation($afiliacao);
        $usr->setCountry($country);
        $usr->setSource($source);
        $usr->setDegree($grauDeFormacao);

        if(Verifier::chkObjUser($usr)){
            $migrationResult = ToolsRegister::authenticateRegisteringUser($usr);
        }
        if ($migrationResult["status"] === true){          
            $response["msg"] = ADD_SUCSSESS;
            $response["status"] = true;

        }elseif (($migrationResult["status"] === false) &&
                ($migrationResult["error"] === "userexists")){
            $response["msg"] = USER_EXISTS;
            $response["status"] = false;
        }else{
            $response["msg"] = "ERROR!";
            $response["status"] = false;
        }

        break;
    case "atualizar":
        $usr = UserDAO::getUser($userID);

        $usr->setID($userID);
        $usr->setFirstName($firstName);
        $usr->setLastName($lastName);
        $usr->setGender($gender);
        $usr->setEmail($email);
        $usr->setDegree($grauDeFormacao);
        $usr->setAffiliation($afiliacao);
        $usr->setCountry($country);
        $usr->setSource($source);

        if(Verifier::chkObjUser($usr)){

            $result = UserDAO::updateUser($usr);
        }

        if($result === true){
            $response["msg"] = USER_UPDATED;
            $response["status"] = true;
        }else{
            $response["msg"] = USER_UPDATE_ERROR;
            $response["status"] = false;
        }
        break;
    default:
        break;
}

if(isset($userID)){
    $isUser = UserDAO::isUser($userID);
    if($isUser){
        $usr = UserDAO::getUser($userID);
    }
}else{
    $usr = new User();
}

$DocTitle = $isUser?UPDATE_USER_TITLE:REGISTER_NEW_USER_TITLE;

?>
<?=DOCTYPE?>
<html>
    <head>
        <title><?=$DocTitle?></title>
        <? require_once(dirname(__FILE__)."/include/head.php"); ?>
        <script language="javascript" src="js/gen_validatorv31.js" ></script>
        <link rel="stylesheet" type="text/css" href="css/styles/regional/main.css" />
    </head>
    <body>
        <div class="container">
            <div id="header">
                <h1 id="logo">
                    <a href="">
                        <span><?=BVSSIGLA?></span>
                    </a>
                </h1>
                <h2><?=BVS?></h2>
                <div id="profile" class="index"></div>
                <div id="idioma">                                        
                    <?if ($lang != "pt"){?><a href='<?=$_SERVER['REQUEST_URI']?>&lang=pt' title='Mudar para português'> Português </a> <?}?>
                    <?if ($lang != "en"){?><a href='<?=$_SERVER['REQUEST_URI']?>&lang=en' title='Switch to English'> English </a> <?}?>
                    <?if ($lang != "es"){?><a href='<?=$_SERVER['REQUEST_URI']?>&lang=es' title='Cambiar para Español'> Español </a> <?}?>
                </div>
                <div id="institutions">
                    <ul>
                        <li><a href="#"><img title="<?=BIREME?>" alt="<?=BIREME?>" src="images/pt/logobir.gif"/></a></li>
                    </ul>
                </div>
                <div id="empty"></div>
            </div>
            <div id="area" class="level2">
                <div id="cache" style="position:absolute;left:0;top:0;z-index:8;display:none;"></div>
                    <div class="secondLevel">
                        <? if($callerURL){ ?>
                            <a href="http://<?=$callerURL?>">home</a>&gt;
                        <?}?>
                        <?
                            if($isUser){
                                echo UPDATE_USER_TITLE;
                                $showLoginField = false;
                                $act = "update";
                            }else{
                                echo REGISTER_NEW_USER_TITLE;
                                $showLoginField = true;
                                $act = "registry";
                            }
                        ?>
                        
                        <?if (($response["status"] === false) || (empty($response["status"]))){?>
                        <?if ($response["status"] === false){?>
                        <div class="alert">
                            <div class="error">
                                <img src="images/warning.png" border="0" style="float: left; margin-right: 10px;"/> <?=$response["msg"];?>
                            </div>
                        </div>
                        <?}?>
                        <form method="post" name="cadastro" action="">
                            <input type="hidden" name="postback" value="1" />                            
                            <input type="hidden" name="userid" value="<?=trim($usr->getID())?> " />
                            <input type="hidden" name="source" value="<?=$_REQUEST["source"]?>" />
                            <fieldset>
                                <legend><?=PERSONAL_DATA?></legend>
                                <img src="images/exclaim.gif" border="0" /> <?=REQUIRED_FIELD_TEXT?><br />
                                <div class="fieldmandatory">
                                    <span class="legend"><?=FIELD_FIRST_NAME?>:</span>
                                    <input class="thinbox" name="firstName" value="<?=trim($usr->getFirstName())?>" maxlength="150" type="text"/>
                                    <div id='cadastro_firstName_errorloc' class="tfvNormal"></div>
                                </div>
                                <div class="spacer"></div>
                                <div class="fieldmandatory">
                                    <span class="legend"><?=FIELD_LAST_NAME?>:</span>
                                    <input class="thinbox" name="lastName" value="<?=trim($usr->getLastName())?>" maxlength="150" type="text"/>
                                    <div id='cadastro_lastName_errorloc' class="tfvNormal"></div>
                                </div>
                                <div class="spacer"></div>

                                <?php
                                    if($showLoginField){
                                ?>
                                    <div class="fieldmandatory">
                                        <span class="legend"><?=FIELD_LOGIN?>:</span>
                                        <input class="thinbox" name="login" value="<?=trim($usr->getID())?>" maxlength="64" type="text" />
                                        <div id='cadastro_login_errorloc' class="tfvNormal"></div>
                                    </div>
                                    <div class="spacer"></div>
                                    <div class="fieldmandatory">
                                        <span class="legend"><?=FIELD_PASSWORD?>:</span>
                                        <input class="thinbox" name="password" maxlength="16" type="password"/>
                                        <div id='cadastro_password_errorloc' class="tfvNormal"></div>
                                    </div>
                                    <div class="spacer"></div>
                                <?}else{?>
                                    <div class="field">
                                    <span class="legend"><?=FIELD_LOGIN?>:</span>
                                    <input class="thinbox" name="login" value="<?=trim($usr->getID())?>" disabled="true" style="color: #999;"/>
                                    </div>
                                <?}?>
                                <div class="field">
                                    <span class="legend"><?=FIELD_AFILIATION?>:</span>
                                    <input class="thinbox" name="afiliacao" maxlength="45" type="text"  value="<?=$usr->getAffiliation()?>"/>
                                </div>
                                <div class="spacer"></div>
                                <div class="field">
                                    <span class="legend"><?=FIELD_COUNTRY?>:</span>
                                    <select class="thinbox" name="country">
                                        <option value=""><?=CHOOSE_COUNTRY?></option>
                                        <?foreach ($countries as $key => $value){
                                            $languageCountries[$key] = $value[$lang];

                                        }
                                        asort($languageCountries,SORT_STRING);
                                        foreach ($languageCountries as $key => $value){ ?>
                                            <option value="<?=$key?>" <?if ($usr->getCountry() == $key){?>selected=""<?}?>><?=$value?></option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="spacer"></div>
                                <div class="field">
                                <span class="legend"><?=DEGREE?>:</span>
                                    <select name="degree" class="expression">
                                        <option value=""><?=CHOOSE_DEGREE?></option>
                                        <?
                                            $arr = split(",",FIELD_DEGREE);

                                            foreach($arr as $item){
                                                $arr2 = split("\|",$item);

                                                if($arr2[0] == $usr->getDegree()){
                                                    echo '<option SELECTED value="'.$arr2[0].'">'.$arr2[1].'</option>'."\n";
                                                }else{
                                                    echo '<option value="'.$arr2[0].'">'.$arr2[1].'</option>'."\n";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="spacer"></div>
                                <div class="fieldmandatory">
                                    <span class="legend"><?=FIELD_GENDER?>:</span>
                                    <input type="radio" <?if ($usr->getGender() == "M") echo "checked"; ?> name="gender" value="M" />
                                    <label for="genderM" /><?=FIELD_GENDER_MALE?><br />
                                    <input type="radio" <?if ($usr->getGender() == "F") echo "checked"; ?> name="gender" value="F" />
                                    <label for="genderF" /><?=FIELD_GENDER_FEMALE?>
                                    <div id='cadastro_gender_errorloc' class="tfvNormal"></div>
                                </div>
                                <div class="spacer"></div>
                            </fieldset>
                            <?if ($act == "registry"){?>
                            <div class="help">
                                <h5><span><?=FREE_REGISTRY?></span></h5>
                                <?=FREE_REGISTRY_MESSAGE?>
                                <a href="notice.php"><?=LEARN_MORE?></a>
                            </div>
                            <?}?>
                            <div class="actionBtn">
                                <? if($callerURL){ ?>
                                    <input type="button" value="<?=BUTTON_CANCEL?>" class="cancel" onCLick="javascript:window.location='http://<?=$callerURL?>'; return false;"/>
                                <?}
                                if($isUser){?>
                                    <input type="hidden" value="atualizar" name="acao" />
                                    <input type="submit" value="<?=BUTTON_UPDATE_USER?>" class="submit" />
                                <?}else{?>
                                    <input type="hidden" value="gravar" name="acao" />
                                    <input type="submit" value="<?=BUTTON_NEW_USER?>" class="submit" />
                                <?}?>

                                <div class="spacer">&#160;</div>
                            </div>

                            <div class="spacer"></div>
                            <input type="hidden" name="autoconn" value=""/>
                        </form>
                        <script language="JavaScript" type="text/javascript">
                            //You should create the validator only after the definition of the HTML form
                            var frmvalidator  = new Validator("cadastro");
                            frmvalidator.EnableOnPageErrorDisplay();
                            frmvalidator.EnableMsgsTogether();
                            <?php if($showLoginField){ ?>
                            frmvalidator.addValidation("login","maxlen=50");
                            frmvalidator.addValidation("login","req","<?=VALMSG_G_EMPTY?>");
                            frmvalidator.addValidation("login","email","<?=VALMSG_LOGIN?>");
                            frmvalidator.addValidation("password","maxlen=50");
                            frmvalidator.addValidation("password","req","<?=VALMSG_G_EMPTY?>");
                            <?php } ?>
                            frmvalidator.addValidation("firstName","req","<?=VALMSG_G_EMPTY?>");
                            frmvalidator.addValidation("lastName","req","<?=VALMSG_G_EMPTY?>");
                            frmvalidator.addValidation("gender","req");
                            frmvalidator.addValidation("gender","selone_radio","<?=VALMSG_G_EMPTY?>");
                            frmvalidator.addValidation("email","maxlen=50");
                            frmvalidator.addValidation("email","req","<?=VALMSG_G_EMPTY?>");
                            frmvalidator.addValidation("email","email","<?=VALMSG_EMAIL?>");
                        </script>
                        <?}else{?>
                        <div class="alert">
                            <div class="ok">
                                <img src="images/ok.png" border="0" style="float: left; margin-right: 10px;" /><?=$response["msg"];?>
                            </div>
                        </div>
                        <?}?>
                    </div>
                    <div class="spacer"></div>
            </div>
            <div id="footer">
                <?=FOOTER_MESSAGE?>
            </div>
        </div>
    </body>
</html>
