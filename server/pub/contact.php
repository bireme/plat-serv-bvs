<?
ob_start("ob_gzhandler");
session_start();

require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__)."/include/includes.php");
require_once(dirname(__FILE__)."/../include/translations.php");
require_once(dirname(__FILE__)."/../classes/Tools.php");

$callerURL = !empty($_REQUEST['c'])?base64_decode($_REQUEST['c']):false;
switch($_REQUEST['acao']){
    case "sendmail":
        $subject  = "[USER CONTACT] ".$_REQUEST["subject"];
        $body     = $_REQUEST["description"];
        $fromMail = $_REQUEST["email"];
        $fromName = $_REQUEST["name"];
        $to       = array(EMAIL_FROM);
        $response = Mailer::sendMail($body,$subject,$to,$fromMail,$fromName);
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
                    <div class="secondLevel">
                        <? if($callerURL){ ?>
                            <a href="http://<?=$callerURL?>">home</a> &gt; <?=CONTACT_FORM?>
                        <?}?>
                        <?if (($response["status"] === false) || (empty($response["status"]))){?>
                        <?if ($response["status"] === false){?>
                        <div class="alert">
                            <div class="error">
                                <img src="images/warning.png" border="0" style="float: left; margin-right: 10px;"/> <?=$response["msg"];?>
                            </div>
                        </div>
                        <?}?>
                        <form method="post" name="contact" action="">
                            <input type="hidden" name="acao" value="sendmail" />
                            <input type="hidden" name="postback" value="1" />
                            <input type="hidden" name="source" value="<?=$_REQUEST["source"]?>" />
                            <fieldset>
                                <legend><?=CONTACT_FORM?></legend>
                                <img src="images/exclaim.gif" border="0" /> <?=REQUIRED_FIELD_TEXT?><br />
                                <div class="fieldmandatory">
                                    <span class="legend"><?=FIELD_CONTACT_NAME?>:</span>
                                    <input class="thinbox" name="name" maxlength="150" type="text"/>
                                    <div id='contact_name_errorloc' class="tfvNormal"></div>
                                </div>
                                <div class="spacer"></div>
                                <div class="fieldmandatory">
                                    <span class="legend"><?=FIELD_CONTACT_EMAIL?>:</span>
                                    <input class="thinbox" name="email" maxlength="150" type="text"/>
                                    <div id='contact_email_errorloc' class="tfvNormal"></div>
                                </div>
                                <div class="spacer"></div>
                                <div class="fieldmandatory">
                                    <span class="legend"><?=FIELD_CONTACT_SUBJECT?>:</span>
                                    <input class="thinbox" name="subject" maxlength="150" type="text"/>
                                    <div id='contact_subject_errorloc' class="tfvNormal"></div>
                                </div>
                                <div class="spacer"></div>
                                <div class="fieldmandatory">
                                    <span class="legend"><?=FIELD_CONTACT_DESCRIPTION?>:</span>
                                    <textarea class="thinbox" name="description"></textarea>
                                    <div id='contact_description_errorloc' class="tfvNormal"></div>
                                </div>
                                <div class="spacer"></div>
                            </fieldset>
                            <?if ($act == "registry"){?>
                            <div class="help">
                                <h5><span><?=CONTACT?></span></h5>
                                <?=CONTACT_MESSAGE?>
                            </div>
                            <?}?>
                            <div class="actionBtn">
                                <? if($callerURL){ ?>
                                    <input type="button" value="<?=BUTTON_CANCEL?>" class="cancel" onCLick="javascript:window.location='http://<?=$callerURL?>'; return false;"/>
                                <?}?>
                                <input type="submit" value="<?=BUTTON_SEND?>" class="submit" />
                            </div>
                            <div class="spacer"></div>
                        </form>
                        <script language="JavaScript" type="text/javascript">
                            //You should create the validator only after the definition of the HTML form
                            var frmvalidator  = new Validator("contact");
                            frmvalidator.EnableOnPageErrorDisplay();
                            frmvalidator.EnableMsgsTogether();
                            frmvalidator.addValidation("name","maxlen=150");
                            frmvalidator.addValidation("name","req","<?=VALMSG_G_EMPTY?>");
                            frmvalidator.addValidation("subject","maxlen=150");
                            frmvalidator.addValidation("subject","req","<?=VALMSG_G_EMPTY?>");
                            frmvalidator.addValidation("description","maxlen=500");
                            frmvalidator.addValidation("description","req","<?=VALMSG_G_EMPTY?>");
                            frmvalidator.addValidation("email","maxlen=150");
                            frmvalidator.addValidation("email","req","<?=VALMSG_G_EMPTY?>");
                            frmvalidator.addValidation("email","email","<?=VALMSG_EMAIL?>");
                        </script>
                        <?}else{?>
                        <div class="alert">
                            <div class="ok">
                                <img src="images/ok.png" border="0" style="float: left; margin-right: 10px;" /><?=EMAIL_SENT;?>
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
