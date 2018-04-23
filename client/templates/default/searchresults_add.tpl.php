<?require_once(dirname(__FILE__)."/header.tpl.php");?>

                <div class="modal" id="squareSpaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <? if ( $response["status"] == null || $response["status"] == false ) { ?>
                        <form name="addSearchResults" method="post" action="<?=RELATIVE_PATH?>/controller/searchresults">
                          <input type="hidden" name="control" value="business"/>
                          <input type="hidden" name="task" value="<?=$_REQUEST["task"]?>"/>
                          <?if ($_REQUEST["task"] == "edit") {?>
                            <input type="hidden" name="rss" value="<?=$_REQUEST["rss"]?>"/>
                            <input type="hidden" name="persist" value="true"/>
                          <?}?>
                            <div class="modal-header">
                              <?php if ( 'edit' == $_REQUEST['task'] ) : ?>
                              <h2 class="modal-title"><?=$trans->getTrans($_REQUEST["action"],'EDIT_RSS')?>: <?=$response["values"]["name"]?></h2>
                              <?php else : ?>
                              <h2 class="modal-title"><?=$trans->getTrans($_REQUEST["action"],'ADD_RSS')?></h2>
                              <?php endif; ?>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="profileName"><?=$trans->getTrans($_REQUEST["action"],'TITLE')?></label>
                                <input type="text" class="form-control" id="name" name="name" value="<?=$response["values"]["name"]?>" required>
                              </div>
                              <div class="form-group">
                                <label for="profileText"><?=$trans->getTrans($_REQUEST["action"],'URL')?></label>
                                <textarea class="form-control" id="url" name="url" required><?=$response["values"]["url"]?></textarea>
                              </div>
                            </div>
                            <?if ($response["status"] === false){?>
                                <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_RSS_ERROR')?></div>
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
                          <?php $href = RELATIVE_PATH.'/controller/searchresults/control/business/rss/'.$response['values']; ?>
                          <script language="javascript">
                            window.opener.location = "<?php echo $href ?>";
                            window.close();
                          </script>
                        <?php else : ?>
                          <script language="javascript">
                            window.opener.location.reload(true);
                            window.close();
                          </script>
                        <?php endif; ?>
                        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ADD_RSS_SUCCESS')?></div>
                      <?}?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>