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

$acao = isset($_REQUEST['acao'])?$_REQUEST['acao']:'default';
$oldPassword = isset($_REQUEST['oldPassword'])?$_REQUEST['oldPassword']:false;
$newPassword = isset($_REQUEST['newPassword'])?$_REQUEST['newPassword']:false;
$callerURL = !empty($_REQUEST['c'])?base64_decode($_REQUEST['c']):false;
$source = $_SESSION['source'] ? $_SESSION['source'] : false;

if ( empty($_SESSION['userTK']) || ( $source && 'ldap' != $source ) )
    header("Location: ".RELATIVE_PATH."/controller/authentication");

if ( !empty($_GET['userTK']) )
    $arrUserData = Token::unmakeUserTK($_GET['userTK']);

$userID = isset($arrUserData)?$arrUserData['userID']:false;

if ( 'atualizar' == $acao && $oldPassword && $newPassword && $userID ) {
    $retValue = false;

    if( $userID && filter_var($userID, FILTER_VALIDATE_EMAIL) ) {
        $retValue = UserDAO::changePassword($userID, $oldPassword, $newPassword);
 
        if( $retValue === false )
            $sysMsg = NEWPASS_CHANGE_ERROR;
        elseif( 'DomainNotPermitted' === $retValue )
            $sysMsg = NEWPASS_DOMAIN_NOT_PERMITTED;
        elseif( 'invalidpass' === $retValue )
            $sysMsg = NEWPASS_INVALID_PASSWORD;
        else
            $sysMsg = USER_PASSWORD_UPDATE;
    } else {
        $sysMsg = NEWPASS_CHANGE_ERROR;
    }
}

$DocTitle = CHANGE_PASSWORD;
?>

        <?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/header.tpl.php"); ?>
        <?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/sidebar.tpl.php"); ?>

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
                        <?php if ( $retValue === false || 'DomainNotPermitted' === $retValue || 'invalidpass' === $retValue ) : ?>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong><?=$sysMsg?></strong>
                        </div>
                        <?php endif; ?>

                        <form method="post" name="cadastro" class="form-horizontal form-label-left" novalidate>
                          <span class="section"><?=CHANGE_PASSWORD?></span>
                          <div class="item field form-group">
                            <label for="oldPassword" class="control-label col-md-3 col-sm-3 col-xs-12"><?=FIELD_OLD_PASSWORD?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="oldPassword" type="password" name="oldPassword" data-validate-length-range="8,40" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                          </div>
                          <div class="item field form-group">
                            <label for="newPassword" class="control-label col-md-3 col-sm-3 col-xs-12"><?=FIELD_NEW_PASSWORD?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="newPassword" type="password" name="newPassword" data-validate-length-range="8,40" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                          </div>
                          <div class="item field form-group">
                            <label for="confirmPassword" class="control-label col-md-3 col-sm-3 col-xs-12"><?=FIELD_NEW_PASSWORD_CONFIRM?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="confirmPassword" type="password" name="confirmPassword" data-validate-linked="newPassword" class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3" style="text-align: center;">
                              <?php if($callerURL) : ?>
                                <input type="button" value="<?=BUTTON_CANCEL?>" class="btn btn-primary cancel" onclick="javascript:window.location='<?=$callerURL?>'; return false;" />
                              <?php endif; ?>
                              <input type="hidden" value="atualizar" name="acao" />
                              <input id="send" type="submit" value="<?=BUTTON_UPDATE_USER?>" class="btn btn-success submit" />
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
