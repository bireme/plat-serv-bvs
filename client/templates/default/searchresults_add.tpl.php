<?php if ( $response["status"] == null or $response["status"] == false ) : ?>

    <?php if ( 'edit' == $_REQUEST["task"] ) : ?>
        <form id="editRSS" name="editRSS" class="col s12" method="post" action="<?php echo RELATIVE_PATH; ?>/controller/searchresults">
            <div class="modal-content">
                <h4><?php echo $trans->getTrans($_REQUEST["action"],'EDIT_RSS'); ?></h4>
                <div class="row">
                    <input type="hidden" name="control" value="business"/>
                    <input type="hidden" name="task" value="<?php echo $_REQUEST["task"]; ?>"/>
                    <input type="hidden" name="rss" value="<?php echo $_REQUEST["rss"]; ?>"/>
                    <input type="hidden" name="persist" value="true"/>
                    <div class="input-field col s12">
                        <input id="name" name="name" class="bgInputs" type="text" autocomplete="off" value="<?php echo $response["values"]["name"]; ?>">
                        <label for="name" class="active"><?php echo $trans->getTrans($_REQUEST["action"],'TITLE'); ?></label>
                    </div>
                    <div class="input-field col s12">
                        <textarea class="materialize-textarea bgInputs" id="url" name="url" style="height: auto;"><?=$response["values"]["url"]?></textarea>
                        <label id="xxx" for="url" class="active"><?php echo $trans->getTrans($_REQUEST["action"],'URL'); ?></label>
                    </div>
                </div>
            </div>
            <?php if ( $response["status"] === false ) : ?>
                <div class="col s12 alert" style="display: none;">
                    <div class="card-panel red success-text">
                        <span class="white-text" style="white-space: pre;"><?php echo $trans->getTrans($_REQUEST["action"],'ADD_RSS_ERROR'); ?></span>
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
        <form id="addRSS" name="addRSS" class="col s12" method="post" action="<?php echo RELATIVE_PATH; ?>/controller/searchresults">
            <div class="modal-content">
                <h4><?php echo $trans->getTrans($_REQUEST["action"],'ADD_RSS'); ?></h4>
                <div class="row">
                    <input type="hidden" name="control" value="business"/>
                    <input type="hidden" name="task" value="<?php echo $_REQUEST["task"]; ?>"/>
                    <div class="input-field col s12">
                        <input id="name" name="name" class="bgInputs" type="text" autocomplete="off" value="">
                        <label for="name"><?php echo $trans->getTrans($_REQUEST["action"],'TITLE'); ?></label>
                    </div>
                    <div class="input-field col s12">
                        <textarea class="materialize-textarea bgInputs" id="url" name="url"></textarea>
                        <label for="url"><?php echo $trans->getTrans($_REQUEST["action"],'URL'); ?></label>
                    </div>
                </div>
            </div>
            <?php if ( $response["status"] === false ) : ?>
                <div class="col s12 alert" style="display: none;">
                    <div class="card-panel red success-text">
                        <span class="white-text" style="white-space: pre;"><?php echo $trans->getTrans($_REQUEST["action"],'ADD_RSS_ERROR'); ?></span>
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
        <?php $href = RELATIVE_PATH.'/controller/searchresults/control/business/rss/'.$response['values']; ?>
        <?php header("location:".$href); exit; ?>
    <?php endif; ?>

    <?php if ( 'edit' == $_REQUEST['task'] ) : ?>
        <?php $href = RELATIVE_PATH.'/controller/searchresults/control/business/rss/'.$_REQUEST["rss"]; ?>
        <?php header("location:".$href); exit; ?>
    <?php endif; ?>

<?php endif; ?>


<script type="text/javascript">
    M.textareaAutoResize($('#url')); // textarea auto resize

    $("#addRSS, #editRSS").validate({
        rules: {
            name: "required",
            url: {
                required: true,
                url: true
            },
        },
        messages: {
            name: {
                required: labels[LANG]['EMPTY']
            },
            url: {
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