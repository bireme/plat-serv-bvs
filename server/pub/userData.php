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

if ( empty($_SESSION['userTK']) && !empty($_GET['userTK']) )
    header("Location: ".RELATIVE_PATH."/controller/authentication");

$src = $_SESSION['source'] ? $_SESSION['source'] : false;

if(!empty($_GET['userTK'])){
    if ( $src && 'bireme_accounts' == $src )
        $arrUserData = Token::unmakeUserTK($_GET['userTK'], true);
    else
        $arrUserData = Token::unmakeUserTK($_GET['userTK']);
}

$callerURL = !empty($_REQUEST['c'])?base64_decode($_REQUEST['c']):false;

/* variaveis do formulario */
$userID = isset($arrUserData)?$arrUserData['userID']:$_REQUEST['userID'];

$firstName = !empty($_REQUEST['firstName']) ? $_REQUEST['firstName'] : false;
$lastName = !empty($_REQUEST['lastName']) ? $_REQUEST['lastName'] : false;
$gender = !empty($_REQUEST['gender']) ? $_REQUEST['gender'] : false;
$email = !empty($_REQUEST['email']) ? $_REQUEST['email'] : false;
$login = !empty($_REQUEST['login']) ? $_REQUEST['login'] : false;
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
$terms = !empty($_REQUEST['terms']) ? $_REQUEST['terms'] : false;
$acceptMail = !empty($_REQUEST['accept_mail']) ? $_REQUEST['accept_mail'] : 0;
$acao = !empty($_REQUEST['acao']) ? $_REQUEST['acao'] : 'default';
$userKey = !empty($_REQUEST['key']) ? $_REQUEST['key'] : false;
$msg = null; /* system messages */
$birthday = false;

if ( !empty($_REQUEST['birthday']) ) {
    $birthday = str_replace('/', '-', $_REQUEST['birthday']);
    $birthday = date("Y-m-d", strtotime($birthday));
}

switch($acao){
    case "gravar":
        $usr = new User();
        $usr->setFirstName($firstName);
        $usr->setLastName($lastName);
        $usr->setGender($gender);
        $usr->setID($login);
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
        $usr->setBirthday($birthday);
        $usr->setAgreementDate($terms);
        $usr->setAcceptMail($acceptMail);

        if(Verifier::chkObjUser($usr)){
            $migrationResult = ToolsRegister::authenticateRegisteringUser($usr);
        }

        if ($migrationResult["status"] === true){
            $response["status"] = true;

            if ($migrationResult["error"] === "userexists")
                $response["msg"] = USER_ADD_SUCCESS;
            elseif ($migrationResult["error"] === "userconfirmed")
                $response["msg"] = USER_ADD_CONFIRMED;
            else
                $response["msg"] = USER_SEND_CONFIRMATION;

            $retValue = UserDAO::fillOrcidData($usr->getID(), $usr->getOrcid());
        }elseif (($migrationResult["status"] === false) &&
                ($migrationResult["error"] === "userexists")){
            $response["msg"] = USER_EXISTS;
            $response["status"] = false;
        }else{
            $response["msg"] = USER_ADD_ERROR;
            $response["status"] = false;
        }

        break;
    case "atualizar":
        $usr = UserDAO::getUser($userID);

        $usr->setID($userID);
        $usr->setFirstName($firstName);
        $usr->setLastName($lastName);
        $usr->setGender($gender);
        $usr->setDegree($grauDeFormacao);
        $usr->setAffiliation($afiliacao);
        $usr->setCountry($country);
        $usr->setSource($source);
        $usr->setLinkedin($linkedin);
        $usr->setResearchGate($researchGate);
        $usr->setOrcid($orcid);
        $usr->setResearcherID($researcherID);
        $usr->setLattes($lattes);
        $usr->setBirthday(date("Y-m-d", strtotime($birthday)));
        $usr->setAgreementDate($terms);
        $usr->setAcceptMail($acceptMail);

        if(Verifier::chkObjUser($usr)){
            $result = UserDAO::updateUser($usr);
        }

        if($result === true){
            $response["msg"] = USER_UPDATED;
            $response["status"] = true;
            $retValue = UserDAO::fillOrcidData($usr->getID(), $usr->getOrcid());
        }else{
            $response["msg"] = USER_UPDATE_ERROR;
            $response["status"] = false;
        }

        break;
    case "confirmar":
        $result = UserDAO::userConfirm($email, $userKey);

        if($result === true){
            $usr = UserDAO::getUser(trim($email));
            $addUser = UserDAO::addUser($usr, 1);

            if( $addUser ) {
                $response["msg"] = USER_CONFIRMED;
                $response["status"] = true;
                $retValue = UserDAO::createNewPassword($usr->getID());
                $retValue = UserDAO::fillOrcidData($usr->getID(), $usr->getOrcid());
            }
        }else{
            $response["msg"] = USER_CONFIRMATION_ERROR;
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
                            <img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/bvs_icon-<?=$_SESSION["lang"]?>.jpg" alt="VHL icon"> <span><?=MY_VHL?></span>
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
                              <div class="breadcrumb"><a href="<?=$callerURL?>"><?=INDEX?></a> &gt; <?=REGISTER_NEW_USER_TITLE?></div>
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
                    <?php if( $isUser && !$usr->getAgreementDate() ) : ?>
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong><?=UPDATE_INFO?></strong>
                    </div>
                    <?php endif; ?>

                    <?php if ($act == "registry") : ?>
                    <div class="help">
                      <h2><?=FREE_REGISTRY?></h2>
                      <?=FREE_REGISTRY_MESSAGE?>

                      <div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 9999; color: #73879C;">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                              <h2 class="modal-title"><?=MY_VHL?></h2>
                            </div>
                            <div class="modal-body">
                              <?=MY_VHL_DESCRIPTION?>
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
                      <input type="hidden" name="userID" value="<?=trim($usr->getID())?> " />
                      <input type="hidden" name="source" value="<?=trim($usr->getSource())?>" />
                      <input type="hidden" name="autoconn" value="" />

                      <span class="section"><?=PERSONAL_DATA?></span>

                      <div class="item field form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstName"><?=FIELD_FIRST_NAME?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="firstName" class="form-control col-md-7 col-xs-12" data-validate-length-range="0,150" name="firstName" required="required" type="text" value="<?=trim($usr->getFirstName())?>">
                        </div>
                      </div>
                      <div class="item field form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastName"><?=FIELD_LAST_NAME?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="lastName" class="form-control col-md-7 col-xs-12" data-validate-length-range="0,150" name="lastName" required="required" type="text" value="<?=trim($usr->getLastName())?>">
                        </div>
                      </div>
                      <?php if($showLoginField) : ?>
                        <div class="item field form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="login"><?=FIELD_LOGIN?> <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="login" name="login" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="0,50" value="<?=trim($usr->getID())?>">
                          </div>
                        </div>
                        <div class="item field form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirmLogin"><?=FIELD_LOGIN_CONFIRMATION?> <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="confirmLogin" name="confirmLogin" data-validate-linked="login" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                      <?php else : ?>
                        <div class="item field form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="login"><?=FIELD_LOGIN?></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="login" name="login" class="form-control col-md-7 col-xs-12" value="<?=trim($usr->getID())?>" disabled>
                          </div>
                        </div>
                      <?php endif; ?>
                      <div class="item field form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="afiliacao"><?=FIELD_AFILIATION?></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="afiliacao" type="text" name="afiliacao" class="optional form-control col-md-7 col-xs-12" value="<?=$usr->getAffiliation()?>">
                        </div>
                      </div>
                      <?php if ( $isUser ) : ?>
                        <div class="item field form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lattes"><?=FIELD_LATTES?></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="url" id="lattes" name="lattes" class="form-control col-md-7 col-xs-12" value="<?=$usr->getLattes()?>">
                          </div>
                        </div>
                        <div class="item field form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="linkedin"><?=FIELD_LINKEDIN?></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="url" id="linkedin" name="linkedin" class="form-control col-md-7 col-xs-12" value="<?=$usr->getLinkedin()?>">
                          </div>
                        </div>
                        <div class="item field form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="researchGate"><?=FIELD_RESEARCHGATE?></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="url" id="researchGate" name="researchGate" class="form-control col-md-7 col-xs-12" value="<?=$usr->getResearchGate()?>">
                          </div>
                        </div>
                        <div class="item field form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="orcid"><?=FIELD_ORCID?></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="orcid" type="text" name="orcid" class="optional form-control col-md-7 col-xs-12" value="<?=$usr->getOrcid()?>">
                          </div>
                        </div>
                        <div class="item field form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="researcherID"><?=FIELD_RESEARCHERID?></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="researcherID" type="text" name="researcherID" class="optional form-control col-md-7 col-xs-12" value="<?=$usr->getResearcherID()?>">
                          </div>
                        </div>
                      <?php endif; ?>
                      <div class="item field form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?=FIELD_COUNTRY?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="country" required="required">
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
                      <div class="item field form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="degree"><?=DEGREE?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="degree" name="degree" class="form-control" required="required">
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
                      <div class="item field form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender"><?=FIELD_GENDER?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php if ($usr->getGender() == "M") echo "active"; ?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="M" data-parsley-multiple="gender" <?php if ($usr->getGender() == "M") echo "checked"; ?> required> <?=FIELD_GENDER_MALE?>
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
                      <?php $birth = ( $usr->getBirthday() ) ? date("d/m/Y", strtotime($usr->getBirthday())) : ''; ?>
                      <div class="item field form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthday"><?=FIELD_BIRTHDAY?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" name="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?=$birth?>">
                        </div>
                      </div>
                      <div class="item field form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="checkbox">
                              <input id="accept_mail" name="accept_mail" type="checkbox" class="flat" value="1" <?php if ( $usr->getAcceptMail() ) echo "checked"; ?>>
                              <span class="accept-mail"><?=ACCEPT_MAIL?></span>
                          </div>
                        </div>
                      </div>
                      <?php if( !$usr->getAgreementDate() ) : ?>
                      <div class="ln_solid"></div>
                      <div class="item field form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="terms"><?=TERMS?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 20px;">
                          <div class="checkbox">
                              <input id="terms" name="terms" type="checkbox" class="flat" value="<?php echo date('Y-m-d'); ?>" required="required">
                              <span class="terms-agreement"><?=TERMS_AGREEMENT_MESSAGE?></span>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade bs-terms-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 9999;">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                              <h2 class="modal-title"><?=MY_VHL?></h2>
                            </div>
                            <div class="modal-body">
                              <?=TERMS_MESSAGE?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><?=BUTTON_CLOSE?></button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade bs-policy-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 9999;">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                              <h2 class="modal-title"><?=MY_VHL?></h2>
                            </div>
                            <div class="modal-body">
                              <?=DATA_POLICY_MESSAGE?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><?=BUTTON_CLOSE?></button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php else : ?>
                      <input type="hidden" name="terms" value="<?=$usr->getAgreementDate()?>" />
                      <?php endif; ?>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-xs-12 col-md-6 col-md-offset-3" style="text-align: center;">
                          <?php if($callerURL) : ?>
                              <input type="button" value="<?=BUTTON_CANCEL?>" class="btn btn-primary cancel" onclick="javascript:window.location='<?=$callerURL?>'; return false;" />
                          <?php endif; ?>
                          <?php if($isUser) : ?>
                              <input type="hidden" value="atualizar" name="acao" />
                              <input id="send" type="submit" value="<?=BUTTON_UPDATE_USER?>" class="btn btn-success submit" />
                          <?php else : ?>
                              <input type="hidden" value="gravar" name="acao" />
                              <input id="send" type="submit" value="<?=BUTTON_NEW_USER?>" class="btn btn-success submit" />
                          <?php endif; ?>
                        </div>
                      </div>
                      <?php if(!$isUser) : ?>
                      <div class="ln_solid"></div>
                      <div style="text-align: center; font-size: 14px;"><?=MY_VHL_ENTRY?> <a href="<?=RELATIVE_PATH?>/controller/authentication" style="text-decoration: underline;"><?=ENTER?></a></div>
                      <div class="form-group omb_login">
                          <div class="omb_loginOr">
                              <div>
                                  <hr class="ln_solid" />
                                  <span class="omb_spanOr">ou entre com</span>
                              </div>
                          </div>
                          <?php $build_query = '?origin=&iahx='.base64_encode('portal'); ?>
                          <div class="row omb_row-sm-offset-3 omb_socialButtons">
                              <div class="col-xs-6 col-sm-3">
                                  <a href="/connector/facebook/<?php echo $build_query; ?>" class="btn btn-lg btn-block omb_btn-facebook">
                                      <i class="fa fa-facebook visible-xs"></i>
                                      <span class="hidden-xs">Facebook</span>
                                  </a>
                              </div>
                              <div class="col-xs-6 col-sm-3">
                                  <a href="/connector/google/<?php echo $build_query; ?>" class="btn btn-lg btn-block omb_btn-google">
                                      <i class="fa fa-google visible-xs"></i>
                                      <span class="hidden-xs">Google</span>
                                  </a>
                              </div>
                          </div>
                      </div>
                      <?php endif; ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/footer.tpl.php"); ?>
