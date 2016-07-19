<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<body>
    <?if ($response["status"] == null or $response["status"] == false){?>
        <div class="form">
            <form name="addDir" method="post" action="<?=RELATIVE_PATH?>/controller/directories">
                <input type="hidden" name="control" value="business"/>
                <input type="hidden" name="task" value="<?=$_REQUEST["task"]?>"/>
                <?if ($_REQUEST["task"] == "edit") {?>
                <input type="hidden" name="directory" value="<?=$_REQUEST["directory"]?>"/>
                <?}?>
                <h4><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder_edit.gif" /><span><?=$trans->getTrans($_REQUEST["action"],'EDIT_FOLDER')?>:</span></h4>
                <table class="form" cellspacing="0">
                    <tr>
                        <td><?=$trans->getTrans($_REQUEST["action"],'FOLDER_NAME')?>:</td>
                        <td class="inputArea">
                            <input type="text" name="directoryName" value="<?=$responseDirName["values"]?>" maxlength="20" size="20" class="textEntry"/>
                        </td>
                    </tr>
                     <tr>
                        <td></td>
                        <td>
                          <input type="submit" value="<?=$trans->getTrans($_REQUEST["action"],'SAVE')?>" class="submitTrue" />
                          <input type="reset" value="<?=$trans->getTrans($_REQUEST["action"],'CANCEL')?>" class="submitFalse" onClick="window.close(); "/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?if ($response["status"] === false){?>
            <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_DIR_ERROR')?></div>
        <?}?>
    <?}else{?>
        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_DIR_SUCESS')?></div>
    <?}?>
</body>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>
