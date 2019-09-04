<?php if ( $response["status"] == null or $response["status"] == false ) : ?>

    <form name="moveDoc" class="col s12" method="post" action="<?php echo RELATIVE_PATH; ?>/controller/directories">
        <div class="modal-content">
            <h4><?php echo $trans->getTrans($_REQUEST["action"],'MOVE'); ?> <?php echo $trans->getTrans($_REQUEST["action"],'MOVE_DOCUMENT_TO'); ?></h4>
            <div class="row">
                <input type="hidden" name="control" value="business"/>
                <input type="hidden" name="task" value="<?php echo $_REQUEST["task"]; ?>"/>
                <input type="hidden" name="mode" value="persist" />
                <input type="hidden" name="fromDirectory" value="<?php echo $_REQUEST["directory"]; ?>" />
                <input type="hidden" name="document" value="<?php echo $_REQUEST["document"]; ?>" />
                <div class="divider"></div>
                <p>
                  <label>
                    <input class="with-gap" name="moveToDirectory" type="radio" value="0" checked="true" />
                    <span><?php echo $trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER'); ?></span>
                  </label>
                </p>
                <?php for ( $i=0 ; $i<count($responseListDirs["values"]) ; $i++ ) : ?>
                  <?php if ( $_REQUEST["directory"] != $responseListDirs["values"][$i]["dirID"] ) : ?>
                      <p>
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
            <input type="submit" class="btn green darken-1 modal-close" value="<?php echo $trans->getTrans($_REQUEST["action"],'MOVE'); ?>">
            <a href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CANCEL'); ?></a>
        </div>
    </form>

<?php else : ?>

    <?php header("location:".$_SERVER["HTTP_REFERER"]); exit; ?>
    <div class="alert"><?php echo $trans->getTrans($_REQUEST["action"],'MOVE_DOC_SUCCESS'); ?></div>

<?php endif; ?>