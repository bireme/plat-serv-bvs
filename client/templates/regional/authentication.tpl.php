<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<?require_once(dirname(__FILE__)."/top.tpl.php");?>

<? $b64HttpHost = base64_encode($_SERVER["HTTP_HOST"]); ?>
    <div class="breadCrumb">
        <a href="/"><?=$trans->getTrans($_REQUEST["action"],'HOME')?></a> &gt; <?=$trans->getTrans($_REQUEST["action"],'TITLE')?>
    </div>
    <form method="post" action="<?=RELATIVE_PATH?>/controller/authentication">
        <input type="hidden" name="control" value="business" />
        <input type="hidden" name="mode" value="<?=$_REQUEST["mode"];?>" />
        <input type="hidden" name="origin" value="<?=$_REQUEST["origin"];?>" />
        <input type="hidden" name="action" value="authentication" />
        <input type="hidden" name="lang" value="<?=$_REQUEST["lang"];?>" />
        <div class="login">
            <h3><span><?=$trans->getTrans($_REQUEST["action"],'TITLE')?></span></h3>
            <div class="form">
                <div class="formBlock">
                    <label><?=$trans->getTrans($_REQUEST["action"],'LOGIN_FIELD')?>:</label>
                    <input type="text" name="userID" maxlenght="50" class="expression"/>
                    <img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/helpicon.png" border="0" onmouseover="javascript: document.getElementById('helplogin').style.display='block';" onmouseout="javascript: document.getElementById('helplogin').style.display='none';"/>
                    <div class="helplogin" id="helplogin" style="display: none;">
                        <?=$trans->getTrans($_REQUEST["action"],'HELPLOGINMESSAGE')?>
                    </div>
                </div>
                <div class="formBlock">
                    <label><?=$trans->getTrans($_REQUEST["action"],'PASSWORD')?>:</label>
                    <input type="password" name="userPass" maxlenght="15" class="expression"/>
                </div>
                <div class="formBlock">
                    <label>&#160;</label>
                    <input class="submit" type="submit" value="<?=$trans->getTrans($_REQUEST["action"],'LOGIN')?>"/>
                </div>
            </div>
            <div class="toolsright">
                <div class="item"><a target="_parent" href="<?=SERVICES_PLATFORM_DOMAIN.'/pub/userData.php?c='.$b64HttpHost ?>"><?=$trans->getTrans($_REQUEST["action"],'REGISTRY')?></a></div> |
                <div class="item"><a target="_parent" href="<?=SERVICES_PLATFORM_DOMAIN.'/pub/forgotPassword.php?c='.$b64HttpHost ?>"><?=$trans->getTrans($_REQUEST["action"],'FORGOT_MY_PASSWORD')?></a></div>
            </div>
        </div>
	<br/>
    </form>
    <?if ($response['values']["status"] === false){?>
        <?if (preg_match(REGEXP_EMAIL,$_REQUEST["userID"])){?>
            <div class="alertlogin"><?=str_replace('HELP_FORM','<a href="'.SERVICES_PLATFORM_DOMAIN.'/pub/contact.php?c='.$b64HttpHost.'" target="_parent">'.$trans->getTrans($_REQUEST["action"],'PRESS_HERE').'</a>',$trans->getTrans($_REQUEST["action"],'INVALID_LOGIN_MAIL'))?></div>
        <?}else{?>
            <div class="alertlogin"><?=str_replace('HELP_FORM','<a href="'.SERVICES_PLATFORM_DOMAIN.'/pub/contact.php?c='.$b64HttpHost.'" target="_parent">'.$trans->getTrans($_REQUEST["action"],'PRESS_HERE').'</a>',$trans->getTrans($_REQUEST["action"],'INVALID_LOGIN_UNAME'))?></div>
        <?}?>
    <?}?>
    <?if ($response['values']['birLDAP'] === false){ ?>
        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'BIREME_LOGIN_LDAP')?></div>
    <?}?>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>
