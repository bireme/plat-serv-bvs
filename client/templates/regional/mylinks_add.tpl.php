<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<body>
    <?if ($response["status"] == null or $response["status"] == false){?>
        <div class="form">
            <form name="addDir" method="post" action="<?=RELATIVE_PATH?>/controller/mylinks">
                <input type="hidden" name="control" value="business"/>
                <input type="hidden" name="task" value="<?=$_REQUEST["task"]?>"/>
                <?if ($_REQUEST["task"] == "edit") {?>
                <input type="hidden" name="link" value="<?=$_REQUEST["link"]?>"/>
                <input type="hidden" name="persist" value="true"/>
                <?}?>
                <h4><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/link_edit.gif" /><span><?=$trans->getTrans($_REQUEST["action"],'EDIT_LINK')?>:</span></h4>
                <div class="formElements">
                    <div class="formBlock">
                        <label><?=$trans->getTrans($_REQUEST["action"],'LINK_TITLE')?>:</label>
                        <input type="text" name="linkName" value="<?=$response["values"]["name"]?>" maxlength="50" size="20" class="textEntry"/>                            
                    </div>
                    <div class="formBlock">
                        <label><?=$trans->getTrans($_REQUEST["action"],'LINK_URL')?>:</label>
                        <input type="text" name="linkUrl" value="<?=$response["values"]["url"]?>" maxlength="300" size="20" class="textEntry"/>
                    </div>
                    <div class="formBlock">
                        <label><?=$trans->getTrans($_REQUEST["action"],'LINK_DESCRIPTION')?>:</label>
                        <input type="text" name="linkDescription" value="<?=$response["values"]["description"]?>" maxlength="200" size="20" class="textEntry"/>
                    </div>
                    <div class="formBlock">
                        <label>&#160;</label>
                        <input type="submit" value="<?=$trans->getTrans($_REQUEST["action"],'SAVE')?>" class="submitTrue" />
                        <input type="button" value="<?=$trans->getTrans($_REQUEST["action"],'CANCEL')?>" class="submitFalse" onClick="window.close(); " />
                    </div>
                </div>
            </form>
        </div>
        <?if ($response["status"] === false){?>
            <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_LINK_ERROR')?></div>
        <?}?>
    <?}else{?>
        <script language="javascript">
            opener.location.reload(true);
            window.close();
        </script>
        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_LINK_SUCESS')?></div>
    <?}?>
</body>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>
