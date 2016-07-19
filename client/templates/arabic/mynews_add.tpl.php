<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<body>
    <?if ($response["status"] == null or $response["status"] == false){?>
        <div class="form">
            <form name="addDir" method="post" action="<?=RELATIVE_PATH?>/controller/mynews">
                <input type="hidden" name="control" value="business"/>
                <input type="hidden" name="task" value="<?=$_REQUEST["task"]?>"/>
                <?if ($_REQUEST["task"] == "edit") {?>
                <input type="hidden" name="news" value="<?=$_REQUEST["news"]?>"/>
                <input type="hidden" name="persist" value="true"/>
                <?}?>
                <h4><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder_edit.gif" border="0"/><span><?=$trans->getTrans($_REQUEST["action"],'EDIT_NEWS')?>:</span></h4>
                <table class="form" cellspacing="0">
                    <tr>
                        <td><?=$trans->getTrans($_REQUEST["action"],'NEWS_TITLE')?>:</td>
                        <td class="inputArea">
                            <input type="text" name="newsName" value="<?=$response["values"]["name"]?>" maxlength="50" size="20" class="textEntry"/>
                        </td>
                    </tr>
                    <tr>
                        <td><?=$trans->getTrans($_REQUEST["action"],'NEWS_URL')?>:</td>
                        <td class="inputArea">
                            <input type="text" name="newsUrl" value="<?=$response["values"]["url"]?>" maxlength="100" size="20" class="textEntry"/>
                        </td>
                    </tr>
                    <tr>
                        <td><?=$trans->getTrans($_REQUEST["action"],'NEWS_DESCRIPTION')?>:</td>
                        <td class="inputArea">
                            <input type="text" name="newsDescription" value="<?=$response["values"]["description"]?>" maxlength="200" size="20" class="textEntry"/>
                        </td>
                    </tr>
                    <tr>
                        <td><?=$trans->getTrans($_REQUEST["action"],'NEWS_IN_HOME')?>:</td>
                        <td class="inputArea">
                            <?if ($response["values"]["inHome"] == "1"){?>
                                <input type="checkbox" name="newsInHome" checked="true"/>
                            <?}else{?>
                                <input type="checkbox" name="newsInHome" />
                            <?}?>
                        </td>
                    </tr>
                     <tr>
                        <td colspan="2">
                          <input type="submit" value="<?=$trans->getTrans($_REQUEST["action"],'SAVE')?>" class="submitTrue" />
                          <input type="reset" value="<?=$trans->getTrans($_REQUEST["action"],'CANCEL')?>" class="submitFalse" onClick="window.close(); "/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?if ($response["status"] === false){?>
            <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_news_ERROR')?></div>
        <?}?>
    <?}else{?>
        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_news_SUCESS')?></div>
    <?}?>
</body>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>
