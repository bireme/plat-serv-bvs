<?require_once(dirname(__FILE__)."/header.tpl.php");?>

                <div class="modal" id="squareSpaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <?if ($response["status"] == null or $response["status"] == false){?>
                        <div class="modal-header">
                          <h2 class="modal-title"><?=$trans->getTrans($_REQUEST["action"],'ADD')?> "<span id="docTitle"></span>" <?=$trans->getTrans($_REQUEST["action"],'TO_COLLECTION')?>:</h2>
                        </div>
                        <div class="modal-body">
                          <div class="radio">
                            <label>
                              <input type="radio" name="docsfolderlist" value="0" class="radio-btn"><span><?=$trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER')?></span>
                            </label>
                          </div>
                          <?php foreach ($docsFolders as $folder) : ?>
                          <div class="radio">
                            <label>
                              <input type="radio" name="docsfolderlist" value="<?php echo $folder['dirID'] ?>" class="radio-btn"><span><?php echo $folder['name']; ?></span>
                            </label>
                          </div>
                          <?php endforeach ?>
                        </div>

                        <div class="alert" style="display: none; white-space: pre-line;"></div>

                        <div class="modal-footer">
                          <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                            <div class="btn-group" role="group">
                              <button type="button" class="btn btn-default submitFalse" data-dismiss="modal" role="button" onclick="window.close();"><?=$trans->getTrans($_REQUEST["action"],'CANCEL')?></button>
                            </div>
                            <div class="btn-group" role="group">
                              <button id="docsfolderlist" class="btn btn-default btn-hover-green submitTrue" value="<?php echo $_REQUEST['similar']; ?>" role="button" disabled><?=$trans->getTrans($_REQUEST["action"],'ADD')?></button>
                            </div>
                          </div>
                        </div>
                      <?}?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        
        <!-- jQuery -->
        <script type="text/javascript" src="<?=RELATIVE_PATH?>/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script type="text/javascript" src="<?=RELATIVE_PATH?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Custom Theme Scripts -->
        <script type="text/javascript" src="<?=RELATIVE_PATH?>/build/js/custom.js"></script>
        <!-- Translations Scripts -->
        <script type="text/javascript" src="<?=RELATIVE_PATH?>/js/texts.js"></script>
        <!-- Theme Scripts -->
        <script type="text/javascript" src="<?=RELATIVE_PATH?>/js/functions.js"></script>
        <!-- Main Scripts -->
        <script type="text/javascript" src="<?=RELATIVE_PATH?>/js/scripts.js"></script>
        <script type="text/javascript">
          $( document ).ready(
              function(){
                  doc = $('#docsfolderlist').val();
                  _opener = $("#"+doc, window.opener.document);
                  title = _opener.find('div.record a').text();

                  if ( title.length > 50 ) {
                      title = title.substr(0, 50) + " [...]";
                  }

                  $('#docTitle').text(title);
              }
          );
        </script>
    </body>
</html>