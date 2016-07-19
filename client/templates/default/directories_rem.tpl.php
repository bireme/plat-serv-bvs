<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<div class="form">
    <?if ($response["status"] == null or $response["status"] == false){?>
    <form name="form" method="post" action="<?=RELATIVE_PATH?>/controller/directories">
        <input type="hidden" name="control" value="business"/>
        <input type="hidden" name="task" value="<?=$_REQUEST["task"]?>"/>
        <input type="hidden" name="removeDir" value="<?=$_REQUEST["directory"]?>"/>
        <h4><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/doc_move.gif" /> <span><?=$trans->getTrans($_REQUEST["action"],'REMOVE_FOLDER')?> (<?=trim($responseGetDirName["values"])?>):</span></h4>
        <h5><input type="radio" name="mode" value="delete" /> <?=$trans->getTrans($_REQUEST["action"],'REMOVE_CONTENT')?></span></h5>
        <h5><input type="radio" name="mode" value="move" checked="true" /> <?=$trans->getTrans($_REQUEST["action"],'MOVE_CONTENT_TO_OTHER_FOLDER')?></span></h5>
        <table class="form" cellspacing="0">
            <tr>
                <td>
                    <input type="radio" name="moveToDirectory" value="0" checked="true"><label for="folderCheck"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder.gif" /><?=$trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER')?></label>
                </td>
            </tr>
            <?for ($i=0 ; $i<count($responseListDirs["values"]) ; $i++){?>
                <?if ($_REQUEST["directory"] != $responseListDirs["values"][$i]["dirID"]){?>
                <tr>
                    <td>
                        <input type="radio" name="moveToDirectory" value="<?=$responseListDirs["values"][$i]["dirID"]?>"><label for="folderCheck"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder.gif" /><?=$responseListDirs["values"][$i]["name"]?></label>
                    </td>
                </tr>
                <?}?>
            <?}?>
            <tr>
                <td>
                    <input type="submit" value="<?=$trans->getTrans($_REQUEST["action"],'REMOVE')?>" class="submitTrue"/>
                    <input type="button" value="<?=$trans->getTrans($_REQUEST["action"],'CANCEL')?>" class="submitFalse" onClick="window.close(); " />
                </td>
            </tr>
        </table>
    </form>
    <?if ($response["status"] === false){?>
        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_DIR_ERROR')?></div>
    <?}?>
</div>
    <?}else{?>
        <script language="javascript">
            opener.location.reload(true);
            window.close();
        </script>
        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_DIR_SUCESS')?></div>
    <?}?>

<?require_once(dirname(__FILE__)."/footer.tpl.php");?>
