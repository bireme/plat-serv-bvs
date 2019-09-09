<?php if ( $response["status"] == null or $response["status"] == false ) : ?>

    <?php if ( 'edit' == $_REQUEST["task"] ) : ?>
        <form name="editDir" class="col s12" method="post" action="<?php echo RELATIVE_PATH; ?>/controller/directories">
            <div class="modal-content">
                <h4><?php echo $trans->getTrans($_REQUEST["action"],'EDIT_FOLDER'); ?></h4>
                <div class="row">
                    <input type="hidden" name="control" value="business"/>
                    <input type="hidden" name="task" value="edit"/>
                    <input type="hidden" name="directory" value="<?php echo $_REQUEST["directory"]; ?>"/>
                    <input type="hidden" name="mode" value="persist"/>
                    <div class="input-field col s12">
                        <input id="directoryName" name="directoryName" class="bgInputs" type="text" autocomplete="off" value="<?php echo $responseDirName["values"]; ?>">
                        <label for="directoryName" class="active"><?php echo $trans->getTrans('mydocuments','COLLECTION_NAME'); ?></label>
                    </div>
                </div>
            </div>
            <?php if ( $response["status"] === false ) : ?>
                <div class="col s12 alert" style="display: none;">
                    <div class="card-panel red success-text">
                        <span class="white-text" style="white-space: pre;"><?php echo $trans->getTrans($_REQUEST["action"],'ADD_DIR_ERROR'); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <div class="modal-footer">
                <input type="submit" class="btn green darken-1 modal-close" value="<?php echo $trans->getTrans($_REQUEST["action"],'SAVE'); ?>">
                <a href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CANCEL'); ?></a>
            </div>
        </form>
    <?php endif; ?>

    <?php if ( 'add' == $_REQUEST["task"] ) : ?>
        <form name="addDir" class="col s12" method="post" action="<?php echo RELATIVE_PATH; ?>/controller/directories">
            <div class="modal-content">
                <h4><?php echo $trans->getTrans($_REQUEST["action"],'ADD_FOLDER'); ?></h4>
                <div class="row">
                    <input type="hidden" name="control" value="business"/>
                    <input type="hidden" name="task" value="add"/>
                    <input type="hidden" name="mode" value="persist"/>
                    <div class="input-field col s12">
                        <input id="directoryName" name="directoryName" class="bgInputs" type="text" autocomplete="off">
                        <label for="directoryName"><?php echo $trans->getTrans($_REQUEST["action"],'COLLECTION_NAME'); ?></label>
                    </div>
                </div>
            </div>
            <?php if ( $response["status"] === false ) : ?>
                <div class="col s12 alert" style="display: none;">
                    <div class="card-panel red success-text">
                        <span class="white-text" style="white-space: pre;"><?php echo $trans->getTrans($_REQUEST["action"],'ADD_DIR_ERROR'); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <div class="modal-footer">
                <input type="submit" class="btn green darken-1 modal-close" value="<?php echo $trans->getTrans($_REQUEST["action"],'SAVE'); ?>">
                <a href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CANCEL'); ?></a>
            </div>
        </form>
    <?php endif; ?>

<?php else : ?>

    <?php if ( 'add' == $_REQUEST['task'] ) : ?>
        <?php $href = RELATIVE_PATH.'/controller/mydocuments/control/business/directory/'.$response['values'][0]->_data['dirID']; ?>
        <?php header("location:".$href); exit; ?>
    <?php endif; ?>

    <?php if ( 'edit' == $_REQUEST['task'] ) : ?>
        <?php $href = RELATIVE_PATH.'/controller/mydocuments/control/business/directory/'.$_REQUEST["directory"]; ?>
        <?php header("location:".$href); exit; ?>
    <?php endif; ?>

<?php endif; ?>