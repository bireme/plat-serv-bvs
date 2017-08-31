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
require_once(dirname(__FILE__)."/../classes/ToolsAuthentication.php");

$acao = isset($_REQUEST['acao'])?$_REQUEST['acao']:'default';
$email = !empty($_REQUEST['email']) ? trim($_REQUEST['email']) : false;
$userKey = !empty($_REQUEST['key']) ? $_REQUEST['key'] : false;
$callerURL = !empty($_REQUEST['c'])?base64_decode($_REQUEST['c']):false;

switch($acao){
    case "enviar":
        $retValue = false;

        if( filter_var($_REQUEST['login'], FILTER_VALIDATE_EMAIL) ) {
            $retValue = UserDAO::sendNewPassConfirm(trim($_REQUEST['login']), 'pass');
     
            if( $retValue === false )
                $sysMsg = NEWPASS_CREATE_ERROR;
            elseif( 'DomainNotPermitted' === $retValue )
                $sysMsg = NEWPASS_DOMAIN_NOT_PERMITTED;
            else
                $sysMsg = NEWPASS_SEND_CONFIRMATION;
        } else {
            $sysMsg = NEWPASS_CREATE_ERROR;
        }

        break;
    case "confirmar":
        $result = UserDAO::userConfirm($email, $userKey, 'pass');

        if($result === true){
            $retValue = UserDAO::createNewPassword($email);

            if( $retValue === false )
                $sysMsg = NEWPASS_CREATE_ERROR;
            elseif( 'DomainNotPermitted' === $retValue )
                $sysMsg = NEWPASS_DOMAIN_NOT_PERMITTED;
            else
                $sysMsg = NEWPASS_PASSWORD_SENT;
        }

        break;
}

$DocTitle = FORGOT_PASSWORD;
?>

        <?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/header.tpl.php"); ?>

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=RELATIVE_PATH?>/controller/authentication" class="site_title logo-md"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/logo-md-<?=$_SESSION["lang"]?>.png" alt="VHL Logo"> <span><?=MY_VHL?></span></a>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <?php
                      if($callerURL) { ?>
                          <div class="breadcrumb"><a href="<?=$callerURL?>"><?=INDEX?></a> &gt; <?=FORGOT_PASSWORD?></div>
                      <?php }
                  ?>
                  <div class="x_content">
                    <?php if ( $retValue === true ) : ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong><?=$sysMsg?></strong>
                    </div>
                    <?php else : ?>
                        <?php if ( $retValue === false || 'DomainNotPermitted' === $retValue ) : ?>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong><?=$sysMsg?></strong>
                        </div>
                        <?php endif; ?>

                        <form method="post" name="cadastro" class="form-horizontal form-label-left" novalidate>
                          <span class="section"><?=RECOVER_PASSWORD?></span>
                          <?=FORGOT_PASSWORD_MESSAGE?>
                          <div class="item field form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="login"><?=FIELD_LOGIN?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="email" id="login" name="login" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="0,50">
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3" style="text-align: center;">
                              <?php if($callerURL) : ?>
                                  <input type="button" value="<?=BUTTON_CANCEL?>" class="btn btn-primary cancel" onclick="javascript:window.location='<?=$callerURL?>'; return false;" />
                              <?php endif; ?>
                              <input type="hidden" value="enviar" name="acao" />
                              <input id="send" type="submit" value="<?=BUTTON_SEND?>" class="btn btn-success submit" />
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
