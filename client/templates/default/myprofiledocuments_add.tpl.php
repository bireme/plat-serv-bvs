<?require_once(dirname(__FILE__)."/header.tpl.php");?>
    <body>
        <?if ($response["status"] == null or $response["status"] == false){?>
            <div class="form">
                <form name="addDir" method="post" action="<?=RELATIVE_PATH?>/controller/myprofiledocuments">
                    <input type="hidden" name="control" value="business"/>
                    <input type="hidden" name="task" value="<?=$_REQUEST["task"]?>"/>
                    <?if ($_REQUEST["task"] == "edit") {?>
                    <input type="hidden" name="profile" value="<?=$_REQUEST["profile"]?>"/>
                    <input type="hidden" name="persist" value="true"/>
                    <?}?>
                    <h4><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/add-folder-orange.gif" /><span><?=$trans->getTrans($_REQUEST["action"],'EDIT_PROFILE')?>:</span></h4>
                    <table class="form" cellspacing="0">
                        <tr>
                            <td valign="top"><?=$trans->getTrans($_REQUEST["action"],'PROFILE_NAME')?>:</td>
                            <td class="inputArea">
                                <input type="text" name="profileName" value="<?=$response["values"]["profileName"]?>" maxlength="50" size="20" class="textEntry"/>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top"><?=$trans->getTrans($_REQUEST["action"],'PROFILE_TEXT')?>:</td>
                            <td class="inputArea">
                                <textarea class="textEntry" name="profileText"><?=$response["values"]["profileText"]?></textarea>
                                <div class="help"><?=$trans->getTrans($_REQUEST["action"],'PROFILE_TEXT_HELP')?></div>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top"><?=$trans->getTrans($_REQUEST["action"],'PROFILE_DEFAULT')?>:</td>
                            <td class="inputArea">
                                <input type="checkbox" name="profileDefault" value="1" <?if ($response["values"]["profileDefault"] == 1){?>checked="true"<?}?>>
                            </td>
                        </tr>
                         <tr>
                            <td colspan="2">
                              <input type="submit" value="<?=$trans->getTrans($_REQUEST["action"],'SAVE')?>" class="submitTrue" />
                              <input type="button" value="<?=$trans->getTrans($_REQUEST["action"],'CANCEL')?>" class="submitFalse" onClick="window.close(); " />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <?if ($response["status"] === false){?>
                <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_PROFILE_ERROR')?></div>
            <?}?>
        <?}else{?>
        <script language="javascript">
            opener.location.reload(true);
            window.close();
        </script>
            <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_PROFILE_SUCESS')?></div>
        <?}?>
    </body>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>