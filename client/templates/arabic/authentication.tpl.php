<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<body>
<?=$trans->getTrans($_REQUEST["action"],'TITLE')?>
<form method="post" action="<?=RELATIVE_PATH?>/controller/authentication">
<input type="hidden" name="control" value="business" />
<input type="hidden" name="action" value="authentication" />
<input type="hidden" name="lang" value="{$_REQUEST.lang}" />
    <table>
        <tr>
            <td><?=$trans->getTrans($_REQUEST["action"],'EMAIL')?>:</td>
            <td><input type="text" name="userID" maxlenght="50"/></td>
        </tr>
        <tr>
            <td><?=$trans->getTrans($_REQUEST["action"],'PASSWORD')?>:</td>
            <td><input type="password" name="userPass" maxlenght="15"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="<?=$trans->getTrans($_REQUEST["action"],'LOGIN')?>"/></td>
        </tr>
    </table>
</form>
<?if ($response["status"] === false){?>
    <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'INVALID_LOGIN')?></div>
<?}?>
</body>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>
