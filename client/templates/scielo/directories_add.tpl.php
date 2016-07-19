<?require_once(dirname(__FILE__)."/header.tpl.php");?>
    <?if ($response["status"] == null or $response["status"] == false){?>
        <div class="form">
            <form name="addDir" method="post" action="<?=RELATIVE_PATH?>/controller/directories">
                <input type="hidden" name="control" value="business"/>
                <input type="hidden" name="task" value="<?=$_REQUEST["task"]?>"/>
                <?if ($_REQUEST["task"] == "edit") {?>
                    <input type="hidden" name="directory" value="<?=$_REQUEST["directory"]?>"/>
                    <input type="hidden" name="mode" value="persist"/>
                <?}?>
                <?if ($_REQUEST["task"] == "add") {?>
                    <input type="hidden" name="mode" value="persist"/>
                <?}?>
                <h4><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder_edit.gif" /><span><?=$trans->getTrans($_REQUEST["action"],'EDIT_FOLDER')?>:</span></h4>
                    <div class="formElements">
                        <div class="formBlock">
                            <label><?=$trans->getTrans($_REQUEST["action"],'FOLDER_NAME')?>:</label>
                            <input type="text" name="directoryName" value="<?=$responseDirName["values"]?>" maxlength="20" size="20" class="textEntry"/>
                        </div>
                        <div class="formBlock">
                            <label>&#160;</label>
	                        <input type="button" value="<?=$trans->getTrans($_REQUEST["action"],'CANCEL')?>" class="submitFalse" onClick="window.close(); " />
                            <input type="submit" value="<?=$trans->getTrans($_REQUEST["action"],'SAVE')?>" class="submitTrue" />
                        </div>
                    </div>
            </form>
        </div>
        <?if ($response["status"] === false){?>
            <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_DIR_ERROR')?></div>
        <?}?>
    <?}else{?>
        <script language="javascript">
            opener.location.reload(true);
            window.close();
        </script>
        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_DIR_SUCESS')?></div>
    <?}?>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>
