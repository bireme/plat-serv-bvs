<?require_once(dirname(__FILE__)."/header.tpl.php");?>

<? $b64HttpHost = base64_encode($_SERVER["HTTP_HOST"]); ?>

<body>    
    <h3><span><?=$trans->getTrans($_REQUEST["action"],'TITLE')?></span></h3>
    <form method="post" action="<?=RELATIVE_PATH?>/controller/authentication">
        <input type="hidden" name="control" value="business" />
        <input type="hidden" name="action" value="authentication" />
        <input type="hidden" name="lang" value="{$_REQUEST.lang}" />
        <table class="login">
            <tr>
                <td><label><?=$trans->getTrans($_REQUEST["action"],'LOGIN')?></label>:</td>
                <td>
                    <input type="text" name="userID" maxlenght="50" class="expression"/>
                    <img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/helpicon.png" border="0" onmouseover="javascript: document.getElementById('helplogin').style.display='block';" onmouseout="javascript: document.getElementById('helplogin').style.display='none';"/>
                    <div class="helplogin" id="helplogin" style="display: none;"><?=$trans->getTrans($_REQUEST["action"],'HELPLOGINMESSAGE')?></div>
                </td>
            </tr>
            <tr>
                <td><label><?=$trans->getTrans($_REQUEST["action"],'PASSWORD')?></label>:</td>
                <td><input type="password" name="userPass" maxlenght="15" class="expression"/></td>
            </tr>
            <tr>
                <td>&#160;</td>
                <td><input class="submit" type="submit" value="<?=$trans->getTrans($_REQUEST["action"],'LOGIN')?>"/></td>
            </tr>
        </table>
        <div class="toolsright">
            <div class="item"><a target="_parent" href="<?=SERVICES_PLATFORM_DOMAIN.'/pub/userData.php?c='.$b64HttpHost ?>"><?=$trans->getTrans($_REQUEST["action"],'REGISTRY')?></a></div> |
            <div class="item"><a target="_parent" href="<?=SERVICES_PLATFORM_DOMAIN.'/pub/forgotPassword.php?c='.$b64HttpHost ?>"><?=$trans->getTrans($_REQUEST["action"],'FORGOT_MY_PASSWORD')?></a></div>
        </div>
    </form>
    <?if ($response['values']['status'] === false){?>
        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'INVALID_LOGIN')?></div>
    <?}?>
    <?if ($response['values']['birLDAP'] === false){ ?>
        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'BIREME_LOGIN_LDAP')?></div>
    <?}?>    
</body>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>
