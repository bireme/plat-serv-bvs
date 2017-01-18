<?require_once(dirname(__FILE__)."/header.tpl.php");?>

                <div class="modal" id="squareSpaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <?if ($response["status"] == null or $response["status"] == false){?>
                        <form name="addDir" method="post" action="<?=RELATIVE_PATH?>/controller/myprofiledocuments">
                          <input type="hidden" name="control" value="business"/>
                          <input type="hidden" name="task" value="<?=$_REQUEST["task"]?>"/>
                          <?if ($_REQUEST["task"] == "edit") {?>
                            <input type="hidden" name="profile" value="<?=$_REQUEST["profile"]?>"/>
                            <input type="hidden" name="persist" value="true"/>
                          <?}?>
                            <div class="modal-header">
                                <h2 class="modal-title"><?=$trans->getTrans($_REQUEST["action"],'EDIT_PROFILE')?></h2>
                            </div>
                            <div class="modal-body">
                                  <div class="form-group">
                                    <label for="profileName"><?=$trans->getTrans($_REQUEST["action"],'PROFILE_NAME')?></label>
                                    <input type="text" class="form-control" id="profileName" name="profileName" value="<?=$response["values"]["profileName"]?>" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="profileText"><?=$trans->getTrans($_REQUEST["action"],'PROFILE_TEXT')?></label>
                                    <textarea class="form-control" id="profileText" name="profileText" required><?=$response["values"]["profileText"]?></textarea>
                                    <div class="help"><?=$trans->getTrans($_REQUEST["action"],'PROFILE_TEXT_HELP')?></div>
                                  </div>
                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="profileDefault" value="1" <?if ($response["values"]["profileDefault"] == 1){?>checked="true"<?}?>> <?=$trans->getTrans($_REQUEST["action"],'PROFILE_DEFAULT')?>
                                    </label>
                                  </div>
                            </div>
                            <?if ($response["status"] === false){?>
                                <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_PROFILE_ERROR')?></div>
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
                      <?}else{?>
                        <script language="javascript">
                            opener.location.reload(true);
                            window.close();
                        </script>
                        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_PROFILE_SUCESS')?></div>
                      <?}?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>