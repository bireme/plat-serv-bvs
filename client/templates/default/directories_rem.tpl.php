<?php if ( $response["status"] == null or $response["status"] == false ) : ?>

    <form name="removeDir" class="col s12" method="post" action="<?php echo RELATIVE_PATH; ?>/controller/directories">
        <div class="modal-content">
            <h4><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_FOLDER'); ?></h4>
            <div class="row">
                <input type="hidden" name="control" value="business"/>
                <input type="hidden" name="task" value="<?php echo $_REQUEST["task"]; ?>"/>
                <input type="hidden" name="removeDir" value="<?php echo $_REQUEST["directory"]; ?>"/>
                <p>
                  <label>
                    <input class="with-gap" name="mode" type="radio" value="delete" />
                    <span><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_CONTENT'); ?></span>
                  </label>
                </p>
                <div class="divider"></div>
                <p>
                  <label>
                    <input class="with-gap" name="mode" type="radio" value="move" checked="true" />
                    <span><?php echo $trans->getTrans($_REQUEST["action"],'MOVE_CONTENT_TO_OTHER_FOLDER'); ?></span>
                  </label>
                </p>
                <p style="padding-left: 2em;">
                  <label>
                    <input class="with-gap" name="moveToDirectory" type="radio" value="0" checked="true" />
                    <span><?php echo $trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER'); ?></span>
                  </label>
                </p>
                <?php for ( $i=0 ; $i<count($responseListDirs["values"]) ; $i++ ) : ?>
                  <?php if ( $_REQUEST["directory"] != $responseListDirs["values"][$i]["dirID"] ) : ?>
                      <p style="padding-left: 2em;">
                        <label>
                          <input class="with-gap" name="moveToDirectory" type="radio" value="<?php echo $responseListDirs["values"][$i]["dirID"]; ?>" />
                          <span><?php echo $responseListDirs["values"][$i]["name"]; ?></span>
                        </label>
                      </p>
                  <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
        <?php if ( $response["status"] === false ) : ?>
            <div><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_DIR_ERROR'); ?></div>
        <?php endif; ?>
        <div class="modal-footer">
            <input type="submit" class="btn green darken-1 modal-close" value="<?php echo $trans->getTrans($_REQUEST["action"],'REMOVE'); ?>">
            <a href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CANCEL'); ?></a>
        </div>
    </form>

<?php else : ?>

    <?php $href = RELATIVE_PATH.'/controller/mydocuments/control/business'; ?>
    <?php header("location:".$href); exit; ?>
    <div class="alert"><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_DIR_SUCESS'); ?></div>

<?php endif; ?>