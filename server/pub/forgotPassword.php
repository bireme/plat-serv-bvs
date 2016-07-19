<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?
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
 
        if($retValue['status']==='DomainNotPermitted'){
            $sysMsg = NEWPASS_DOMAIN_NOT_PERMITTED;
        }else{            
            $sysMsg = NEWPASS_PASSWORD_SENT;
        }
        
        break;
    default:
        break;
}

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
                    <?if(!empty($callerURL)){ $sufixURL = '&c=' . base64_encode($callerURL); } ?>
                    <?if ($lang != "pt"){?><a href='?lang=pt<?=$sufixURL?>' title='Mudar para português'> Português </a> <?}?>
                    <?if ($lang != "en"){?><a href='?lang=en<?=$sufixURL?>' title='Switch to English'> English </a> <?}?>
                    <?if ($lang != "es"){?><a href='?lang=es<?=$sufixURL?>' title='Cambiar para Español'> Español </a> <?}?>
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
                <span>
                    <? if($callerURL){ ?>
                        <a href="http://<?=$callerURL?>">home</a>&gt;
                    <?}?>
                    Esqueceu sua senha?
                </span>
                <div class="secondLevel">
                    <? if(isset($retValue["status"])){ ?>
                        <div class="alert">
                            <div class="ok">
                                <img src="images/ok.png" border="0" style="float: left; margin-right: 10px;"/>
                                <?=$sysMsg?>
                            </div>
                        </div>
                    <?}else{?>                    
                        <form method="post" name="cadastro" action="">                    
                            <fieldset>
                                <legend><?=PERSONAL_DATA?></legend>

                                <div class="fieldmandatory">
                                    <span class="legend"><?=FIELD_LOGIN?>:</span>
                                    <input class="thinbox" name="login" maxlength="64" type="text" />
                                    <div id='cadastro_login_errorloc' class="tfvNormal"></div>
                                </div>
                                <? if($callerURL){ ?>
                                    <input type="button" value="<?=BUTTON_CANCEL?>" class="cancel" onCLick="javascript:window.location='http://<?=$callerURL?>'; return false;"/>
                                <?}?>
                                <input type="hidden" value="enviar" name="acao" />
                                <input type="submit" value="Enviar" class="submit" />
                            </fieldset>                         
                        </form>                        
                    <?}?>
                </div>
                <div class="spacer"></div>
            </div>
            <div id="footer">
                <?=FOOTER_MESSAGE?>
            </div>
        </div>
        <? if(!isset($retValue["status"])){ ?>
            <script language="JavaScript" type="text/javascript">
                //You should create the validator only after the definition of the HTML form
                var frmvalidator  = new Validator("cadastro");
                //frmvalidator.EnableOnPageErrorDisplaySingleBox();
                frmvalidator.EnableOnPageErrorDisplay();
                frmvalidator.EnableMsgsTogether();

                frmvalidator.addValidation("login","maxlen=50");
                frmvalidator.addValidation("login","req","<?=VALMSG_G_EMPTY?>");                
            </script>
        <?}?>
    </body>
</html>
