<?php if ( $response["status"] == null or $response["status"] == false ) : ?>

    <?php if ( 'edit' == $_REQUEST["task"] ) : ?>
        <form id="editTopic" name="editTopic" class="col s12" method="post" action="<?php echo RELATIVE_PATH; ?>/controller/myprofiledocuments">
            <div class="modal-content">
                <h4><?php echo $trans->getTrans($_REQUEST["action"],'EDIT_PROFILE'); ?></h4>
                <div class="row">
                    <input type="hidden" name="control" value="business"/>
                    <input type="hidden" name="task" value="<?php echo $_REQUEST["task"]; ?>"/>
                    <input type="hidden" name="profile" value="<?php echo $_REQUEST["profile"]; ?>"/>
                    <input type="hidden" name="persist" value="true"/>
                    <div class="input-field col s12">
                        <input id="profileName" name="profileName" class="bgInputs" type="text" autocomplete="off" value="<?php echo $response["values"]["profileName"]; ?>">
                        <label for="profileName" class="active"><?php echo $trans->getTrans($_REQUEST["action"],'PROFILE_NAME'); ?></label>
                    </div>
                    <div class="input-field col s12">
                        <input id="profileText" name="profileText" class="bgInputs" type="text" autocomplete="off" value="<?php echo $response["values"]["profileText"]; ?>">
                        <label for="profileText" class="active"><?php echo $trans->getTrans($_REQUEST["action"],'PROFILE_TEXT'); ?></label>
                        <small><?php echo $trans->getTrans($_REQUEST["action"],'PROFILE_TEXT_HELP'); ?></small>
                    </div>
                    <div class="input-field col s12">
                        <p>
                            <label>
                                <input type="checkbox" name="profileDefault" value="1" <?php if ( $response["values"]["profileDefault"] == 1 ) { ?> checked <?php } ?> />
                                <span><?php echo $trans->getTrans($_REQUEST["action"],'PROFILE_DEFAULT'); ?></span>
                            </label>
                        </p>
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
                <input type="submit" class="btn green darken-1" value="<?php echo $trans->getTrans($_REQUEST["action"],'SAVE'); ?>">
                <a href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CANCEL'); ?></a>
            </div>
        </form>
    <?php endif; ?>

    <?php if ( 'add' == $_REQUEST["task"] ) : ?>
        <form id="addTopic" name="addTopic" class="col s12" method="post" action="<?php echo RELATIVE_PATH; ?>/controller/myprofiledocuments">
            <div class="modal-content">
                <h4><?php echo $trans->getTrans($_REQUEST["action"],'ADD_PROFILE'); ?></h4>
                <div class="row">
                    <input type="hidden" name="control" value="business"/>
                    <input type="hidden" name="task" value="<?php echo $_REQUEST["task"]; ?>"/>
                    <input type="hidden" name="persist" value="true"/>
                    <div class="input-field col s12">
                        <input id="profileName" name="profileName" class="bgInputs" type="text" autocomplete="off">
                        <label for="profileName"><?php echo $trans->getTrans($_REQUEST["action"],'PROFILE_NAME'); ?></label>
                    </div>
                    <div class="input-field col s12">
                        <input id="profileText" name="profileText" class="bgInputs" type="text" autocomplete="off" value="<?php echo $responseDirName["values"]; ?>">
                        <label for="profileText"><?php echo $trans->getTrans($_REQUEST["action"],'PROFILE_TEXT'); ?></label>
                        <small><?php echo $trans->getTrans($_REQUEST["action"],'PROFILE_TEXT_HELP'); ?></small>
                    </div>
                    <div class="input-field col s12">
                        <p>
                            <label>
                                <input type="checkbox" name="profileDefault" value="1" />
                                <span><?php echo $trans->getTrans($_REQUEST["action"],'PROFILE_DEFAULT'); ?></span>
                            </label>
                        </p>
                    </div>
                </div>
            </div>
            <?php if ( $response["status"] === false ) : ?>
                <div class="col s12 alert">
                    <div class="card-panel red success-text">
                        <span class="white-text" style="white-space: pre;"><?php echo $trans->getTrans($_REQUEST["action"],'ADD_DIR_ERROR'); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <div class="modal-footer">
                <input type="submit" class="btn green darken-1" value="<?php echo $trans->getTrans($_REQUEST["action"],'SAVE'); ?>">
                <a href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CANCEL'); ?></a>
            </div>
        </form>
    <?php endif; ?>

<?php else : ?>

    <?php if ( 'add' == $_REQUEST['task'] ) : ?>
        <?php $href = RELATIVE_PATH.'/controller/myprofiledocuments/control/business/profile/'.$response['values']; ?>
        <?php header("location:".$href); exit; ?>
    <?php endif; ?>

    <?php if ( 'edit' == $_REQUEST['task'] ) : ?>
        <?php $href = RELATIVE_PATH.'/controller/myprofiledocuments/control/business/profile/'.$_REQUEST["profile"]; ?>
        <?php header("location:".$href); exit; ?>
    <?php endif; ?>

<?php endif; ?>

<script type="text/javascript">
    $("#addTopic, #editTopic").validate({
        rules: {
            profileName: "required",
            profileText: "required",
        },
        messages: {
            profileName: {
                required: labels[LANG]['EMPTY']
            },
            profileText: {
                required: labels[LANG]['EMPTY']
            },
        },
        // errorClass: "invalid form-error error",
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
    });
</script>