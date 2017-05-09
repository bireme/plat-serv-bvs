<?require_once(dirname(__FILE__)."/header.tpl.php");?>

                <div class="modal" id="squareSpaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <?if ($response["status"] == null or $response["status"] == false){?>
                        <form name="form" method="post" action="<?=RELATIVE_PATH?>/controller/directories">
                          <input type="hidden" name="control" value="business"/>
                          <input type="hidden" name="task" value="<?=$_REQUEST["task"]?>"/>
                          <input type="hidden" name="removeDir" value="<?=$_REQUEST["directory"]?>"/>
                            <div class="modal-header">
                                <h2 class="modal-title"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_FOLDER')?>: <?=trim($responseGetDirName["values"])?></h2>
                            </div>
                            <div class="modal-body">
                              <div class="radio">
                                <label>
                                    <input type="radio" name="mode" value="delete" /> <?=$trans->getTrans($_REQUEST["action"],'REMOVE_CONTENT')?>
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                    <input type="radio" name="mode" value="move" checked="true" /> <?=$trans->getTrans($_REQUEST["action"],'MOVE_CONTENT_TO_OTHER_FOLDER')?>
                                </label>
                              </div>
                              <div class="radio radio-child">
                                <label>
                                    <input type="radio" name="moveToDirectory" value="0" checked="true"> <?=$trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER')?>
                                </label>
                              </div>
                              <?for ($i=0 ; $i<count($responseListDirs["values"]) ; $i++){?>
                                <?if ($_REQUEST["directory"] != $responseListDirs["values"][$i]["dirID"]){?>
                                    <div class="radio radio-child">
                                        <label>
                                            <input type="radio" name="moveToDirectory" value="<?=$responseListDirs["values"][$i]["dirID"]?>"> <?=$responseListDirs["values"][$i]["name"]?>
                                        </label>
                                    </div>
                                <?}?>
                              <?}?>
                            </div>
                            <?if ($response["status"] === false){?>
                                <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_DIR_ERROR')?></div>
                            <?}?>
                            <div class="modal-footer">
                                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-default submitFalse" data-dismiss="modal" role="button" onclick="window.close();"><?=$trans->getTrans($_REQUEST["action"],'CANCEL')?></button>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <button type="submit" class="btn btn-default btn-hover-green submitTrue" data-action="save" role="button"><?=$trans->getTrans($_REQUEST["action"],'REMOVE')?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                      <?}else{?>
                        <?php $href = RELATIVE_PATH.'/controller/mydocuments/control/business'; ?>
                        <script language="javascript">
                            window.opener.location = "<?php echo $href; ?>";
                            window.close();
                        </script>
                        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_DIR_SUCESS')?></div>
                      <?}?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>