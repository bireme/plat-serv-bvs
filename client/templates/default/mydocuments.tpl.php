<?php
    if ( in_array( $_REQUEST["task"], array( 'rate', 'removedoc' ) ) )
        header("Location: " . $_SERVER['HTTP_REFERER']);

    $directory = $_REQUEST["directory"] ? $_REQUEST["directory"] : 0;
    $public_link = "http://".$_SERVER['HTTP_HOST']."/".$_SESSION['lang']."/".base64_encode($_SESSION['userID'])."/".$directory;
?>

        <?require_once(dirname(__FILE__)."/header.tpl.php");?>
        <?require_once(dirname(__FILE__)."/sidebar.tpl.php");?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 fav-docs">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans($_REQUEST["action"],'MY_COLLECTION')?></h2>
                    <div class="toggle_icons">
                      <a id="toggle_list">
                        <i class="fa fa-bars"></i>
                        <i class="fa fa-list"></i>
                      </a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="folder-data col-md-9 col-sm-9 col-xs-12 col-list">
                        <h4><i class="fa fa-folder-o"></i> <?if ($resultDirName === null){ echo $trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER'); }?><?=$resultDirName?></h4>
                        <?if ($_REQUEST["directory"] != 0){?>
                            <a href="javascript:;" onclick="__gaTracker('send','event','Favorite Documents','Edit Collection','<?php echo htmlspecialchars($resultDirName); ?>'); window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/edit/directory/<?=$_REQUEST["directory"]?>','','resizable=no,scrollbars=1,width=420,height=250');"><span class="label label-info"><?=$trans->getTrans($_REQUEST["action"],'EDIT_FOLDER')?></span></a>
                            <a href="javascript:;" onclick="__gaTracker('send','event','Favorite Documents','Remove Collection','<?php echo htmlspecialchars($resultDirName); ?>'); window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/delete/directory/<?=$_REQUEST["directory"]?>','','resizable=no,scrollbars=1,width=420,height=295')"><span class="label label-danger"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_FOLDER')?></span></a>
                            <a href="javascript:;" class="public-link" data-toggle="modal" data-target=".bs-public-modal-lg" onclick="__gaTracker('send','event','Favorite Documents','Share Collection','<?php echo htmlspecialchars($resultDirName); ?>');"><span class="label"><i class="fa fa-share"></i><?=$trans->getTrans($_REQUEST["action"],'SHARE_COLLECTION')?></span></a>
                        <?}?>
                        <select id="step17" class="bulkactions">
                            <option><?=$trans->getTrans($_REQUEST["action"],'BULK_ACTIONS')?></option>
                            <option class="bulkremovedoc" value="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/removedoc/directory/<?=$directory?>"><?=$trans->getTrans($_REQUEST["action"],'BULK_REMOVE_DOCS')?></option>
                            <option class="bulkmovedoc" value="<?=RELATIVE_PATH?>/controller/directories/control/business/task/movedoc/directory/<?=$directory?>"><?=$trans->getTrans($_REQUEST["action"],'BULK_MOVE_DOCS')?></option>
                        </select>
                    </div>
                    <div id="step16" class="col-md-9 col-sm-9 col-xs-12 col-list">
                        <?php if ( $response["values"] != false ) : ?>
                            <?php //echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                            <!-- start project list -->
                            <table class="table table-striped table-list">
                              <!--thead>
                                <tr>
                                  <th>#</th>
                                </tr>
                              </thead-->
                              <tbody>
                                <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                                <?php foreach ( $response["values"] as $register) : $count++; ?>
                                    <?if (!isset($register["dirID"])){$register["dirID"] = 0;}?>
                                <tr>
                                  <td>
                                    <div class="checkbox">
                                      <label>
                                        <input id="doc<?php echo $count; ?>" type="checkbox" value="<?php echo $register["docID"]; ?>">
                                      </label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="rank">
                                        <?if ($register["rate"] >= 1){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/0/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/1/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                        <?if ($register["rate"] >= 2){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/1/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/2/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                        <?if ($register["rate"] >= 3){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/2/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/3/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                        <?if ($register["rate"] >= 4){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/3/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/4/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                        <?if ($register["rate"] >= 5){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/4/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/5/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                    </div>
                                    <div class="record">
                                        <?php if ( $register["docURL"] ) : ?>
                                          <a href="<?php echo $register["docURL"]; ?>" target="_blank"><?php echo $register["title"]; ?></a>
                                        <?php else : ?>
                                          <?php echo $register["title"]; ?>
                                        <?php endif; ?>
                                        <small style="display: block;"><?php echo $register["authors"]; ?></small>
                                    </div>
                                    <?if ($register["dirID"] == null){ $dirID = 0; }?>
                                    <div class="doc-actions">
                                        <a class="label label-danger remove" href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/removedoc/document/<?=$register["docID"]?>/directory/<?=$register["dirID"]?>" onclick="__gaTracker('send','event','Favorite Documents','Remove Document','<?php echo htmlspecialchars($register["title"]); ?>');"><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_FROM_COLLECTION'); ?></a>
                                        <a class="label label-info move" href="javascript:;" onclick="__gaTracker('send','event','Favorite Documents','Move Document','<?php echo htmlspecialchars($register["title"]); ?>'); window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/movedoc/document/<?=$register["docID"]?>/directory/<?=$register["dirID"]?>','','resizable=no,width=420,height=270');"><?php echo $trans->getTrans($_REQUEST["action"],'MOVE_TO'); ?></a>
                                        <a class="label label-primary related-docs" href="javascript:;" onclick="__gaTracker('send','event','Favorite Documents','Related Documents','<?php echo htmlspecialchars($register["title"]); ?>');"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS'); ?></a>
                                    </div>
                                    <!--div>
                                      <span class="label label-default">Default</span>
                                      <span class="label label-primary">Primary</span>
                                      <span class="label label-success">Success</span>
                                      <span class="label label-info">Info</span>
                                      <span class="label label-warning">Warning</span>
                                      <span class="label label-danger">Danger</span>
                                    </div-->
                                    <div class="related_docs">
                                        <div class="related-loading"><?php echo $trans->getTrans('suggesteddocs','LOADING'); ?></div>
                                        <div class="related-list">
                                            <p><?php echo ucwords($trans->getTrans('suggesteddocs','RELATED_DOCS')); ?>:</p>
                                        </div>
                                        <div class="related-alert"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS_ALERT'); ?></div>
                                    </div>
                                  </td>
                                </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                            <!-- end project list -->
                            <?php
                                if ( $objPaginator->totalPages > 1 ) {
                                    echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS'));
                                }
                            ?>
                        <?php else : ?>
                            <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'ACCESS_LIST_NO_REGISTERS_FOUND')?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-filter">
                        <section id="step18" class="panel panel-folder">
                            <div class="panel-body">
                                <h5><?=$trans->getTrans($_REQUEST["action"],'MY_FOLDERS')?></h5>
                                <ul class="list-docs-unstyled project_files documents">
                                    <li><a href="javascript:;" onclick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/view/task/add','','resizable=no,width=420,height=250')"><i class="fa fa-plus-circle"></i><?=$trans->getTrans($_REQUEST["action"],'ADD_FOLDER')?></a></li>
                                    <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/directory/0"><i class="fa fa-folder-open-o"></i><?=$trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER')?></a></li>
                                    <?if ($responseListDirs["values"] != false ){?>
                                        <?foreach ($responseListDirs["values"] as $listDirs){?>
                                            <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/directory/<?=$listDirs["dirID"]?>"><i class="fa fa-folder-open-o"></i><?=$listDirs["name"]?></a></li>
                                        <?}?>
                                   <?}?>
                                </ul>
                            </div>
                        </section>
                        <section id="step19" class="panel panel-folder">
                            <div class="panel-body">
                                <h5><?=$trans->getTrans($_REQUEST["action"],'SHOW_BY')?></h5>
                                <ul class="list-docs-unstyled project_files">
                                    <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/directory/<?=$directory?>/sort/date"><?=$trans->getTrans($_REQUEST["action"],'DATE')?></a></li>
                                    <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/directory/<?=$directory?>/sort/rate"><?=$trans->getTrans($_REQUEST["action"],'MY_RANK')?></a></li>
                                </ul>
                            </div>
                        </section>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <div class="modal fade bs-public-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="color: #73879C; z-index: 9999;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h2 class="modal-title"><?=$trans->getTrans($_REQUEST["action"],'SHARE_COLLECTION')?></h2>
                </div>
                <div class="modal-body" style="text-align: center; background: #f4f7fd; overflow-wrap: break-word;">
                    <?php echo $public_link; ?>
                    <script type="text/javascript">
                      var addthis_config = addthis_config||{};

                      var addthis_share = addthis_share||{};
                          addthis_share.title = "<?php echo $resultDirName; ?>";
                          addthis_share.url = "<?php echo $public_link; ?>";
                    </script>
                    <div class="addthis_toolbox addthis_32x32_style" addthis:url="<?php echo $public_link; ?>">
                        <a class="addthis_button_facebook"></a>
                        <a class="addthis_button_twitter"></a>
                        <a class="addthis_button_linkedin"></a>
                        <a class="addthis_button_email"></a>
                        <a class="addthis_button_link"></a>
                        <a class="addthis_button_whatsapp"></a>
                        <!--a class="addthis_button_compact"></a-->
                    </div>
                    <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#async=1"></script>
                </div>
                <div class="modal-footer"></div>
              </div>
            </div>
        </div>

        <script type="text/javascript">
          if (RegExp('multipage', 'gi').test(window.location.search)) {
            var steps = [
              {
                element: 'li.side.step15',
                intro: "<?=$trans->getTrans('tour','STEP_15')?>",
                position: 'right'
              },
              {
                element: 'li.child.step15',
                intro: "<?=$trans->getTrans('tour','STEP_15')?>",
                position: 'right'
              },
              {
                element: '#step16',
                intro: "<?=$trans->getTrans('tour','STEP_16')?>",
                position: 'left'
              },
              {
                element: '#step17',
                intro: "<?=$trans->getTrans('tour','STEP_17')?>",
                position: 'left'
              },
              {
                element: '#step18',
                intro: "<?=$trans->getTrans('tour','STEP_18')?>",
                position: 'left'
              },
              {
                element: '#step19',
                intro: "<?=$trans->getTrans('tour','STEP_19')?>",
                position: 'left'
              }
            ];

            var sw = screen.width;
            var tooltipClass = '';

            if ( sw > 768 ) {
                steps.splice(0,1);
            } else {
                tooltipClass = 'mobile';
                steps.splice(1,1);
            }

            function startIntro(){
              var intro = introJs();
                intro.setOptions({
                  doneLabel: "<?=$trans->getTrans('menu','NEXT_PAGE')?>",
                  prevLabel: "<?=$trans->getTrans('menu','BACK')?>",
                  nextLabel: "<?=$trans->getTrans('menu','NEXT')?>",
                  skipLabel: "<?=$trans->getTrans('menu','SKIP')?>",
                  exitOnOverlayClick: false,
                  showStepNumbers: false,
                  showBullets: false,
                  tooltipClass: tooltipClass,
                  steps: steps
                });

                intro.onchange(function(targetElement) {
                    switch (targetElement.id) { 
                        case 'step16':
                            document.getElementById("body").className = "nav-md";
                        break;
                    }

                    switch (this._currentStep) { 
                        case 0:
                            if ( sw <= 768 ) {
                                document.getElementById("body").className = "nav-sm";
                            }
                        break;
                    }
                });

                intro.start().oncomplete(function() {
                  window.location.href = '<?php echo RELATIVE_PATH."/controller/myprofiledocuments/control/business/?multipage=true"; ?>';
                });
            }
            
            window.addEventListener('load', function() {
                startIntro();
            });
          }
        </script>

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>