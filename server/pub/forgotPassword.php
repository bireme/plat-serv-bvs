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

$callerURL = !empty($_REQUEST['c'])?base64_decode($_REQUEST['c']):false;

switch($acao){
    case 'enviar':
        $retValue = UserDAO::createNewPassword($_REQUEST['login']);
 
        if( 'DomainNotPermitted' == $retValue["status"] ){
            $sysMsg = NEWPASS_DOMAIN_NOT_PERMITTED;
        }else{            
            $sysMsg = NEWPASS_PASSWORD_SENT;
        }

        break;
    default:
        break;
}

$DocTitle = FORGOT_PASSWORD;
?>

        <?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/header.tpl.php"); ?>

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

        <!-- page content -->
        <div class="right_col" role="main">
          <div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <?php
                      if($callerURL) { ?>
                          <div class="breadcrumb"><a href="http://<?=$callerURL?>"><?=INDEX?></a> &gt; <?=FORGOT_PASSWORD?></div>
                      <?php }
                  ?>
                  <div class="x_content">
                    <?php if ($retValue["status"] === true) : ?>
                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong><?=$sysMsg;?></strong>
                    </div>
                    <?php endif; ?>
                    <?php if ( $retValue["status"] === false || 'DomainNotPermitted' == $retValue["status"] ) : ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong><?=$sysMsg;?></strong>
                    </div>
                    <?php endif; ?>

                    <form method="post" name="cadastro" class="form-horizontal form-label-left" novalidate>
                      <span class="section"><?=PERSONAL_DATA?></span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="login"><?=FIELD_LOGIN?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="login" name="login" required="required" class="form-control col-md-7 col-xs-12" data-validate-length-range="0,50">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <?php if($callerURL) : ?>
                              <input type="button" value="<?=BUTTON_CANCEL?>" class="btn btn-primary cancel" onclick="javascript:window.location='http://<?=$callerURL?>'; return false;" />
                          <?php endif; ?>
                          <input type="hidden" value="enviar" name="acao" />
                          <input id="send" type="submit" value="<?=BUTTON_SEND?>" class="btn btn-success submit" />
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/footer.tpl.php"); ?>
