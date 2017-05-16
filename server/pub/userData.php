<?php
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

$src = $_SESSION['source'] ? $_SESSION['source'] : false;

if(!empty($_GET['userTK'])){
    if ( $src && 'bireme_accounts' == $src )
        $arrUserData = Token::unmakeUserTK($_GET['userTK'], true);
    else
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
$source = !empty($_REQUEST['source']) ? $_REQUEST['source'] : $src;
$linkedin = !empty($_REQUEST['linkedin']) ? $_REQUEST['linkedin'] : false;
$researchGate = !empty($_REQUEST['researchGate']) ? $_REQUEST['researchGate'] : false;
$orcid = !empty($_REQUEST['orcid']) ? $_REQUEST['orcid'] : false;
$researcherID = !empty($_REQUEST['researcherID']) ? $_REQUEST['researcherID'] : false;
$lattes = !empty($_REQUEST['lattes']) ? $_REQUEST['lattes'] : false;
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
        $usr->setLinkedin($linkedin);
        $usr->setResearchGate($researchGate);
        $usr->setOrcid($orcid);
        $usr->setResearcherID($researcherID);
        $usr->setLattes($lattes);

        if(Verifier::chkObjUser($usr)){
            $migrationResult = ToolsRegister::authenticateRegisteringUser($usr);
        }
        
        if ($migrationResult["status"] === true){          
            $response["msg"] = ADD_SUCCESS;
            $response["status"] = true;
            $orcidData = UserDAO::fillOrcidData($usr->getID(), $usr->getOrcid());
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
        //$usr->setEmail($email);
        $usr->setDegree($grauDeFormacao);
        $usr->setAffiliation($afiliacao);
        $usr->setCountry($country);
        $usr->setSource($source);
        $usr->setLinkedin($linkedin);
        $usr->setResearchGate($researchGate);
        $usr->setOrcid($orcid);
        $usr->setResearcherID($researcherID);
        $usr->setLattes($lattes);

        if(Verifier::chkObjUser($usr)){
            $result = UserDAO::updateUser($usr);
        }

        if($result === true){
            $response["msg"] = USER_UPDATED;
            $response["status"] = true;
            $orcidData = UserDAO::fillOrcidData($usr->getID(), $usr->getOrcid());
        }else{
            $response["msg"] = USER_UPDATE_ERROR;
            $response["status"] = false;
        }

        break;
}

if(isset($userID)){
    $isUser = UserDAO::isUser($userID);
    if($isUser){
        $usr = UserDAO::getUser($userID);
        $_SESSION["userFirstName"] = $usr->getFirstName();
        $_SESSION["userLastName"] = $usr->getLastName();
    }
}else{
    $usr = new User();
}

$DocTitle = $isUser?UPDATE_USER_TITLE:REGISTER_NEW_USER_TITLE;
?>

        <?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/header.tpl.php"); ?>

        <?php
            if($isUser) {
                require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/sidebar.tpl.php");
            } else { ?>
                <div class="col-md-3 left_col">
                  <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <div class="site_title">
                            <i class="fa fa-cloud"></i> <span>Services Platform</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
        <?php } ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <?php
                      if($isUser){
                          $showLoginField = false;
                          $act = "update";
                      }else{
                          if($callerURL) { ?>
                              <div class="breadcrumb"><a href="http://<?=$callerURL?>"><?=INDEX?></a> &gt; <?=REGISTER_NEW_USER_TITLE?></div>
                          <?php }
                          $showLoginField = true;
                          $act = "registry";
                      }
                  ?>
                  <?php if($isUser) : ?>
                      <div class="x_title">
                        <h2><?=MY_DATA?><small></small></h2>
                        <div class="clearfix"></div>
                      </div>
                  <?php endif; ?>
                  <div class="x_content">
                    <?php if ($response["status"] === true) : ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong><?=$response["msg"];?></strong>
                    </div>
                    <?php endif; ?>
                    <?php if ($response["status"] === false) : ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong><?=$response["msg"];?></strong>
                    </div>
                    <?php endif; ?>

                    <?php if ($act == "registry") : ?>
                    <div class="help">
                      <h2><?=FREE_REGISTRY?></h2>
                      <?=FREE_REGISTRY_MESSAGE?>

                      <!-- modal -->
                      <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg"><?=LEARN_MORE?></button>

                      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 9999;">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                              <h2 class="modal-title" id="myModalLabel"><?=NOTICE?></h2>
                            </div>
                            <div class="modal-body">
                              <?=NOTICE_MESSAGE?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><?=BUTTON_CLOSE?></button>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>

                    <form method="post" name="cadastro" class="form-horizontal form-label-left" novalidate>

                      <input type="hidden" name="postback" value="1" />                            
                      <input type="hidden" name="userid" value="<?=trim($usr->getID())?> " />
                      <input type="hidden" name="source" value="<?=trim($usr->getSource())?>" />

                      <span class="section"><?=PERSONAL_DATA?></span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstName"><?=FIELD_FIRST_NAME?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="firstName" class="form-control col-md-7 col-xs-12" data-validate-length-range="0,150" name="firstName" required="required" type="text" value="<?=trim($usr->getFirstName())?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastName"><?=FIELD_LAST_NAME?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="lastName" class="form-control col-md-7 col-xs-12" data-validate-length-range="0,150" name="lastName" required="required" type="text" value="<?=trim($usr->getLastName())?>">
                        </div>
                      </div>
                      <?php if($showLoginField) : ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="login"><?=FIELD_LOGIN?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="login" name="login" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="0,50" value="<?=trim($usr->getID())?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirmLogin"><?=FIELD_LOGIN_CONFIRMATION?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="confirmLogin" name="confirmLogin" data-validate-linked="login" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3"><?=FIELD_PASSWORD?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length-range="8,40" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="confirmPassword" class="control-label col-md-3 col-sm-3 col-xs-12"><?=FIELD_PASSWORD_CONFIRMATION?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="confirmPassword" type="password" name="confirmPassword" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <?php else : ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="login"><?=FIELD_LOGIN?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="login" name="login" class="form-control col-md-7 col-xs-12" value="<?=trim($usr->getID())?>" disabled>
                        </div>
                      </div>
                      <?php endif; ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="afiliacao"><?=FIELD_AFILIATION?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="afiliacao" type="text" name="afiliacao" class="optional form-control col-md-7 col-xs-12" value="<?=$usr->getAffiliation()?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lattes"><?=FIELD_LATTES?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="url" id="lattes" name="lattes" class="form-control col-md-7 col-xs-12" value="<?=$usr->getLattes()?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkedin"><?=FIELD_LINKEDIN?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="url" id="linkedin" name="linkedin" class="form-control col-md-7 col-xs-12" value="<?=$usr->getLinkedin()?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="researchGate"><?=FIELD_RESEARCHGATE?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="url" id="researchGate" name="researchGate" class="form-control col-md-7 col-xs-12" value="<?=$usr->getResearchGate()?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="orcid"><?=FIELD_ORCID?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="orcid" type="text" name="orcid" class="optional form-control col-md-7 col-xs-12" value="<?=$usr->getOrcid()?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="researcherID"><?=FIELD_RESEARCHERID?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="researcherID" type="text" name="researcherID" class="optional form-control col-md-7 col-xs-12" value="<?=$usr->getResearcherID()?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?=FIELD_COUNTRY?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="country">
                            <?php
                                foreach ($countries as $key => $value)
                                    $languageCountries[$key] = $value[$lang];

                                asort($languageCountries,SORT_STRING);
                            ?>
                            <option value=""><?=CHOOSE_COUNTRY?></option>
                            <?php foreach ($languageCountries as $key => $value) : ?>
                            <option value="<?php echo $key; ?>" <?php if ( $usr->getCountry() == $key ) echo 'selected'; ?>><?php echo $value; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?=DEGREE?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="degree" class="form-control">
                            <option value=""><?=CHOOSE_DEGREE?></option>
                            <?php
                                $arr = explode(",",FIELD_DEGREE);

                                foreach($arr as $item){
                                    $arr2 = explode("|",$item);

                                    if($arr2[0] == $usr->getDegree()){
                                        echo '<option selected value="'.$arr2[0].'">'.$arr2[1].'</option>'."\n";
                                    }else{
                                        echo '<option value="'.$arr2[0].'">'.$arr2[1].'</option>'."\n";
                                    }
                                }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?=FIELD_GENDER?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if ($usr->getGender() == "M") echo "active"; ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="M" data-parsley-multiple="gender" <?php if ($usr->getGender() == "M") echo "checked"; ?>> <?=FIELD_GENDER_MALE?>
                            </label>
                            <label class="btn btn-default <?php if ($usr->getGender() == "F") echo "active"; ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="F" data-parsley-multiple="gender" <?php if ($usr->getGender() == "F") echo "checked"; ?>> <?=FIELD_GENDER_FEMALE?>
                            </label>
                          </div>
                          <!--p>
                            Masculino: <input type="radio" class="flat" name="gender" id="genderM" value="M" />
                            Feminino: <input type="radio" class="flat" name="gender" id="genderF" value="F" />
                          </p-->
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <? if($callerURL){ ?>
                              <input type="button" value="<?=BUTTON_CANCEL?>" class="btn btn-primary cancel" onclick="javascript:window.location='http://<?=$callerURL?>'; return false;" />
                          <?}
                          if($isUser){?>
                              <input type="hidden" value="atualizar" name="acao" />
                              <input id="send" type="submit" value="<?=BUTTON_UPDATE_USER?>" class="btn btn-success submit" />
                          <?}else{?>
                              <input type="hidden" value="gravar" name="acao" />
                              <input id="send" type="submit" value="<?=BUTTON_NEW_USER?>" class="btn btn-success submit" />
                          <?}?>
                        </div>
                      </div>
                      <input type="hidden" name="autoconn" value=""/>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/footer.tpl.php"); ?>