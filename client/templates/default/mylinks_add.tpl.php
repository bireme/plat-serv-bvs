<?php if ( $response["status"] == null or $response["status"] == false ) : ?>

    <?php if ( 'edit' == $_REQUEST["task"] ) : ?>
        <form id="editLink" name="editLink" class="col s12" method="post" action="<?php echo RELATIVE_PATH; ?>/controller/mylinks">
            <div class="modal-content">
                <h4><?php echo $trans->getTrans($_REQUEST["action"],'EDIT_LINK_POPUP'); ?></h4>
                <div class="row">
                    <input type="hidden" name="control" value="business"/>
                    <input type="hidden" name="task" value="<?php echo $_REQUEST["task"]; ?>"/>
                    <input type="hidden" name="link" value="<?php echo $_REQUEST["link"]; ?>"/>
                    <input type="hidden" name="persist" value="true"/>
                    <div class="input-field col s12">
                        <input id="linkName" name="linkName" class="bgInputs" type="text" autocomplete="off" value="<?php echo $response["values"]["name"]; ?>">
                        <label for="linkName" class="active"><?php echo $trans->getTrans($_REQUEST["action"],'LINK_TITLE'); ?></label>
                    </div>
                    <div class="input-field col s12">
                        <input id="linkUrl" name="linkUrl" class="bgInputs" type="url" autocomplete="off" value="<?php echo $response["values"]["url"]; ?>">
                        <label for="linkUrl" class="active"><?php echo $trans->getTrans($_REQUEST["action"],'LINK_URL'); ?></label>
                    </div>
                    <div class="input-field col s12">
                        <input id="linkDescription" name="linkDescription" class="bgInputs" type="text" autocomplete="off" value="<?php echo $response["values"]["description"]; ?>">
                        <label for="linkDescription" <?php if ( $response["values"]["description"] ) { echo 'class="active"'; } ?>><?php echo $trans->getTrans($_REQUEST["action"],'LINK_DESCRIPTION'); ?></label>
                    </div>
                </div>
            </div>
            <?php if ( $response["status"] === false ) : ?>
                <div class="col s12 alert" style="display: none;">
                    <div class="card-panel red success-text">
                        <span class="white-text" style="white-space: pre;"><?php echo $trans->getTrans($_REQUEST["action"],'ADD_LINK_ERROR'); ?></span>
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
        <form id="addLink" name="addLink" class="col s12" method="post" action="<?php echo RELATIVE_PATH; ?>/controller/mylinks">
            <div class="modal-content">
                <h4><?php echo $trans->getTrans($_REQUEST["action"],'ADD_LINK'); ?></h4>
                <div class="row">
                    <input type="hidden" name="control" value="business"/>
                    <input type="hidden" name="task" value="<?php echo $_REQUEST["task"]; ?>"/>
                    <div class="input-field col s12">
                        <input id="linkName" name="linkName" class="bgInputs" type="text" autocomplete="off" value="">
                        <label for="linkName"><?php echo $trans->getTrans($_REQUEST["action"],'LINK_TITLE'); ?></label>
                    </div>
                    <div class="input-field col s12">
                        <input id="linkUrl" name="linkUrl" class="bgInputs" type="url" autocomplete="off" value="">
                        <label for="linkUrl"><?php echo $trans->getTrans($_REQUEST["action"],'LINK_URL'); ?></label>
                    </div>
                    <div class="input-field col s12">
                        <input id="linkDescription" name="linkDescription" class="bgInputs" type="text" autocomplete="off" value="">
                        <label for="linkDescription"><?php echo $trans->getTrans($_REQUEST["action"],'LINK_DESCRIPTION'); ?></label>
                    </div>
                </div>
            </div>
            <?php if ( $response["status"] === false ) : ?>
                <div class="col s12 alert" style="display: none;">
                    <div class="card-panel red success-text">
                        <span class="white-text" style="white-space: pre;"><?php echo $trans->getTrans($_REQUEST["action"],'ADD_LINK_ERROR'); ?></span>
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

    <?php header("location:".$_SERVER["HTTP_REFERER"]); exit; ?>

<?php endif; ?>

<script type="text/javascript">
    $("#addLink, #editLink").validate({
        rules: {
            linkName: "required",
            linkUrl: {
                required: true,
                url: true
            },
        },
        messages: {
            linkName: {
                required: labels[LANG]['EMPTY']
            },
            linkUrl: {
                required: labels[LANG]['EMPTY'],
                url: labels[LANG]['URL']
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