<?php

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

ob_start("ob_gzhandler");

session_start();

require_once(dirname(__FILE__)."/include/includes.php");
require_once(dirname(__FILE__)."/translations.php");
require_once(dirname(__FILE__)."/../classes/UserDAO.php");
require_once(dirname(__FILE__)."/../classes/Tools.php");
require_once(dirname(__FILE__)."/../classes/ToolsAuthentication.php");

$acao      = isset($_REQUEST['acao'])?$_REQUEST['acao']:'default';
$reason    = isset($_REQUEST['reason'])?$_REQUEST['reason']:false;
$details   = isset($_REQUEST['details'])?$_REQUEST['details']:false;
$callerURL = !empty($_REQUEST['c'])?base64_decode($_REQUEST['c']):false;
$source    = $_SESSION['source'] ? $_SESSION['source'] : false;

if ( empty($_SESSION['userTK']) )
    header("Location: ".RELATIVE_PATH."/controller/authentication");

if(!empty($_GET['userTK'])){
    if ( $source && 'bireme_accounts' == $source )
        $arrUserData = Token::unmakeUserTK($_GET['userTK'], true);
    else
        $arrUserData = Token::unmakeUserTK($_GET['userTK']);
}

$userID = isset($arrUserData)?$arrUserData['userID']:false;

if ( 'remover' == $acao && $userID ) {
    if( isset($_POST['acao']) && 'remover' == $_POST['acao'] ){
        if ( $_SESSION['userTK'] ) {
            if ( $source && 'bireme_accounts' == $source )
                $token = Token::unmakeUserTK($_SESSION['userTK'], true);
            else
                $token = Token::unmakeUserTK($_SESSION['userTK']);
        }

        $tokenID = isset($token) ? $token['userID'] : '';

        if( !empty($tokenID) ){
            $g_recaptcha_response = Token::recaptcha_validator($_POST['g-recaptcha-response']);

            if ( $g_recaptcha_response ) {
                $result = UserDAO::removeUser($tokenID, $reason, $details);

                if ( $result )
                    $retValue = true;
                else
                    $retValue = false;
            } else {
                $retValue = false;
            }
        }else{
            $retValue = false;
        }
    } else {
        $retValue = false;
    }

    if ( $retValue ) {
        $sysMsg = USER_REMOVE_ACCOUNT;
        require_once(dirname(__FILE__)."/include/logout.php");
    } else {
        $sysMsg = USER_REMOVE_ACCOUNT_ERROR;
    }
}

if(!empty($userID)){
    $isUser = UserDAO::isUser($userID);
}else{
    $isUser = false;
}

$DocTitle = CHANGE_PASSWORD;

?>

        <?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/header.tpl.php"); ?>

        <?php
            if($isUser) {
                require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/sidebar.tpl.php");
            } else { ?>
                <div class="col-md-3 left_col">
                  <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                      <a href="<?=RELATIVE_PATH?>/controller/authentication" class="site_title logo-md"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/logo-md-<?=$_SESSION["lang"]?>.png" alt="VHL Logo"> <span><?=MY_VHL?></span></a>
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
                  <div class="x_content">
                    <?php if ( $retValue === true ) : ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong><?=$sysMsg?></strong>
                    </div>
                    <?php else : ?>
                        <?php if ( $retValue === false ) : ?>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong><?=$sysMsg?></strong>
                        </div>
                        <?php endif; ?>

                        <form method="post" name="cadastro" class="form-horizontal form-label-left" novalidate>
                          <span class="section"><?=REMOVE_ACCOUNT?></span>
                          <?php echo REMOVE_ACCOUNT_DESCRIPTION; ?>
                          <div class="item field form-group reason">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                              <?php echo REMOVE_ACCOUNT_REASON; ?>
                              <div class="radio">
                                  <input name="reason" type="radio" class="flat" value="SAFETY" required="required">
                                  <span><?php echo REMOVE_ACCOUNT_OPTION_A; ?></span>
                              </div>
                              <div class="radio">
                                  <input name="reason" type="radio" class="flat" value="USEFUL">
                                  <span><?php echo REMOVE_ACCOUNT_OPTION_B; ?></span>
                              </div>
                              <div class="radio">
                                  <input name="reason" type="radio" class="flat" value="HACKED">
                                  <span><?php echo REMOVE_ACCOUNT_OPTION_C; ?></span>
                              </div>
                              <div class="radio">
                                  <input name="reason" type="radio" class="flat" value="UNDERSTAND">
                                  <span><?php echo REMOVE_ACCOUNT_OPTION_D; ?></span>
                              </div>
                              <div class="radio">
                                  <input name="reason" type="radio" class="flat" value="OTHERACCOUNTS">
                                  <span><?php echo REMOVE_ACCOUNT_OPTION_E; ?></span>
                              </div>
                              <div class="radio">
                                  <input name="reason" type="radio" class="flat" value="EMAIL">
                                  <span><?php echo REMOVE_ACCOUNT_OPTION_F; ?></span>
                              </div>
                              <div class="radio">
                                  <input name="reason" type="radio" class="flat" value="PRIVACY">
                                  <span><?php echo REMOVE_ACCOUNT_OPTION_G; ?></span>
                              </div>
                              <div class="radio">
                                  <input name="reason" type="radio" class="flat" value="OTHER">
                                  <span><?php echo REMOVE_ACCOUNT_OPTION_H; ?></span>
                              </div>
                            </div>
                          </div>
                          <?php echo REMOVE_ACCOUNT_DETAILS; ?>
                          <div class="item field form-group">
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea id="details" class="form-control col-md-6 col-sm-6 col-xs-12" name="details"></textarea>
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3" style="text-align: center;">
                              <?php if($callerURL) : ?>
                                <button type="button" class="btn btn-primary" onclick="javascript:window.location='<?=$callerURL?>'; return false;"><?=BUTTON_CANCEL?></button>
                              <?php endif; ?>
                              <input type="hidden" value="remover" name="acao" />
                              <button id="reason" type="button" class="btn btn-success">Prosseguir</button>
                            </div>
                          </div>

                          <div class="modal fade bs-account-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 9999; color: #73879C; text-align: center;">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                  <h2 class="modal-title"><?=REMOVE_ACCOUNT?></h2>
                                </div>
                                <div class="modal-body">
                                  <?=REMOVE_ACCOUNT_POPUP?>
                                  <div class="item field form-group" style="display: inline-flex; align-items: center;">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="<?=RECAPTCHA_SITE_KEY?>"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal" style="float: left;"><?=BUTTON_CANCEL?></button>
                                  <button id="recaptcha" type="submit" class="btn btn-danger" disabled><?=BUTTON_DELETE?></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/footer.tpl.php"); ?>
