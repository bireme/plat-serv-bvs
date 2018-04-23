<?require_once(dirname(__FILE__)."/header.tpl.php");?>

                <?if ($response["status"] == null or $response["status"] == false){?>
                <div class="modal" id="squareSpaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <form name="addDir" method="post" action="<?=RELATIVE_PATH?>/controller/mylinks">
                          <input type="hidden" name="control" value="business"/>
                          <input type="hidden" name="task" value="<?=$_REQUEST["task"]?>"/>
                          <?if ($_REQUEST["task"] == "edit") {?>
                            <input type="hidden" name="link" value="<?=$_REQUEST["link"]?>"/>
                            <input type="hidden" name="persist" value="true"/>
                          <?}?>
                            <div class="modal-header">
                                <?php if ( 'edit' == $_REQUEST['task'] ) : ?>
                                <h2 class="modal-title"><?=$trans->getTrans($_REQUEST["action"],'EDIT_LINK_POPUP')?>: <?=$response["values"]["name"]?></h2>
                                <?php else : ?>
                                <h2 class="modal-title"><?=$trans->getTrans($_REQUEST["action"],'ADD_LINK')?></h2>
                                <?php endif; ?>
                            </div>
                            <div class="modal-body">
                                  <div class="form-group">
                                    <label for="linkName"><?=$trans->getTrans($_REQUEST["action"],'LINK_TITLE')?></label>
                                    <input type="text" class="form-control" id="linkName" name="linkName" value="<?=$response["values"]["name"]?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="linkUrl"><?=$trans->getTrans($_REQUEST["action"],'LINK_URL')?></label>
                                    <input type="text" class="form-control" id="linkUrl" name="linkUrl" value="<?=$response["values"]["url"]?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="linkDescription"><?=$trans->getTrans($_REQUEST["action"],'LINK_DESCRIPTION')?></label>
                                    <input type="text" class="form-control" id="linkDescription" name="linkDescription" value="<?=$response["values"]["description"]?>">
                                  </div>
                            </div>
                            <?if ($response["status"] === false){?>
                                <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_LINK_ERROR')?></div>
                            <?}?>
                            <div class="modal-footer">
                                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-default submitFalse" data-dismiss="modal" role="button" onclick="window.close();"><?=$trans->getTrans($_REQUEST["action"],'CANCEL')?></button>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <button type="submit" class="btn btn-default btn-hover-green submitTrue" data-action="save" role="button"><?=$trans->getTrans($_REQUEST["action"],'SAVE')?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
                <?}else{?>
                    <script language="javascript">
                        opener.location.reload(true);
                        window.close();
                    </script>
                    <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_LINK_SUCESS')?></div>
                <?}?>
            </div>
        </div>
    </body>
</html>