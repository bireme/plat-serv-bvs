<?require_once(dirname(__FILE__)."/header.tpl.php");?>

                <div class="modal" id="squareSpaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <?if ($response["status"] == null or $response["status"] == false){?>
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
                            <div class="modal-header">
                                <?php if ( 'edit' == $_REQUEST['task'] ) : ?>
                                <h2 class="modal-title"><?=$trans->getTrans($_REQUEST["action"],'EDIT_FOLDER')?></h2>
                                <?php else : ?>
                                <h2 class="modal-title"><?=$trans->getTrans($_REQUEST["action"],'ADD_FOLDER')?></h2>
                                <?php endif; ?>
                            </div>
                            <div class="modal-body">
                                  <div class="form-group">
                                    <label for="directoryName"><?=$trans->getTrans($_REQUEST["action"],'FOLDER_NAME')?></label>
                                    <input type="text" class="form-control" id="directoryName" name="directoryName" value="<?=$responseDirName["values"]?>" required>
                                  </div>
                            </div>
                            <?if ($response["status"] === false){?>
                                <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_DIR_ERROR')?></div>
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
                        <?php if ( 'add' == $_REQUEST['task'] ) : ?>
                            <?php $href = RELATIVE_PATH.'/controller/mydocuments/control/business/directory/'.$response['values'][0]->_data['dirID']; ?>
                            <script language="javascript">
                                window.opener.location = "<?php echo $href; ?>";
                                window.close();
                            </script>
                        <?php else : ?>
                            <script language="javascript">
                                window.opener.location.reload(true);
                                window.close();
                            </script>
                        <?php endif; ?>
                        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_DIR_SUCESS')?></div>
                      <?}?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>