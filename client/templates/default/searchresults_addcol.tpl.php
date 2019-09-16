<?php if ( $response["status"] == null or $response["status"] == false ) : ?>

    <form class="col s12">
        <div class="modal-content">
            <h4><?php echo $trans->getTrans($_REQUEST["action"],'ADD');?> <?php echo $trans->getTrans($_REQUEST["action"],'TO_COLLECTION'); ?></h4>
            <div class="row">
                <div class="divider"></div>
                <p>
                    <label>
                        <input class="with-gap" name="docsfolderlist" type="radio" value="0" checked />
                        <span><?php echo $trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER'); ?></span>
                    </label>
                </p>
                <?php foreach ($docsFolders as $folder) : ?>
                    <p>
                        <label>
                            <input class="with-gap" name="docsfolderlist" type="radio" value="<?php echo $folder['dirID'] ?>" />
                            <span><?php echo $folder['name'] ?></span>
                        </label>
                    </p>
                <?php endforeach; ?>
            </div>
            <div class="col s12 alert" style="display: none;">
                <div class="card-panel success-text">
                    <span class="white-text" style="white-space: pre;"></span>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button id="docs-folder-list" class="btn green darken-1" data-similar="<?php echo $_REQUEST['similar']; ?>"><?php echo $trans->getTrans($_REQUEST["action"],'ADD'); ?></button>
            <a href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CANCEL'); ?></a>
        </div>
    </form>

<?php endif; ?>