<?
    if ( 'rate' == $_REQUEST["task"] )
        header("Location: " . $_SERVER['HTTP_REFERER']);
    if ( 'delete' == $_REQUEST["task"] )
        header("Location: ".RELATIVE_PATH.'/controller/searchresults/control/business');
?>

        <?require_once(dirname(__FILE__)."/header.tpl.php");?>
        <?require_once(dirname(__FILE__)."/sidebar.tpl.php");?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-sm-12 col-md-12 col-xs-12 rss">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans($_REQUEST["action"],'RSS')?></h2>
                    <a id="step36" href="javascript:;" class="btn btn-success btn-xs btn-rss" onclick="window.open('<?=RELATIVE_PATH?>/controller/searchresults/control/view/task/add','','resizable=no,width=420,height=385')"><i class="fa fa-plus-circle"></i> <?=ucfirst($trans->getTrans($_REQUEST["action"],'ADD_RSS'))?></a>
                    <div class="clearfix"></div>
                  </div>
                  <div id="step37" class="x_content">
                    <?php if ( !$_REQUEST['rss'] ) : ?>
                      <?php if ( $response["values"] != false ) : ?>
                        <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * RSS_DOCUMENTS_PER_PAGE : 0; ?>
                        <div class="row x_rss">
                          <?php foreach ($response["values"] as $register) : $count++; ?>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                              <a href="<?=RELATIVE_PATH?>/controller/searchresults/control/business/rss/<?=$register['id']?>">
                                <div class="tile-stats">
                                  <?php if ( $register['image'] ) : ?>
                                  <img src="<?php echo $register['image']; ?>" alt="RSS">
                                  <?php else : ?>
                                  <i class="fa fa-rss-square"></i>
                                  <?php endif; ?>
                                  <h3><?php echo $register['name']; ?></h3>
                                </div>
                              </a>
                            </div>
                          <?php endforeach; ?>
                        </div>
                        <?php
                            if ( $objPaginator->totalPages > 1 ) {
                                echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS'));
                            }
                        ?>
                      <?php else : ?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'RSS_NOT_FOUND')?></p>
                        </div>
                      <?php endif; ?>
                    <?php else : ?>
                      <?php if ($responseSearch["values"] != false ) : ?>
                        <?php $registerSearch = $responseSearch["values"][0]; ?>
                        <div class="folder-data">
                            <h4><i class="fa fa-folder-o"></i> <?=$registerSearch["name"]?></h4>
                            <a class="edit" href="javascript:;" onclick="gtag('send','event','Search Results','Edit RSS','<?php echo htmlspecialchars($registerSearch["name"]); ?>'); window.open('<?=RELATIVE_PATH?>/controller/searchresults/control/business/task/edit/rss/<?=$registerSearch["id"]?>','','resizable=no,scrollbars=1,width=420,height=385')"><span class="label label-info"><?=$trans->getTrans($_REQUEST["action"],'EDIT_RSS')?></span></a>
                            <a class="remove" href="<?=RELATIVE_PATH?>/controller/searchresults/control/business/task/delete/rss/<?=$registerSearch["id"]?>" onclick="gtag('send','event','Search Results','Remove RSS','<?php echo htmlspecialchars($registerSearch["name"]); ?>');"><span class="label label-danger"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_RSS')?></span></a>
                        </div>
                        <div id="step38" class="col-md-9 col-sm-9 col-xs-12">
                            <!-- start project list -->
                            <table class="table table-striped table-list">
                              <!--thead>
                                <tr>
                                  <th>#</th>
                                </tr>
                              </thead-->
                              <tbody>
                                <?php foreach ( $items as $item ) : $count++; ?>
                                <tr id="<?php echo 'doc'.$count; ?>">
                                  <td>
                                    <div class="record">
                                        <a href="<?php echo $item["link"]; ?>" target="_blank"><?php echo $item["title"]; ?></a>
                                        <small style="display: block;"><?php echo $item["author"]; ?></small>
                                    </div>
                                    <div class="doc-actions">
                                        <?php if ( strpos( $registerSearch['url'], VHL_SEARCH_PORTAL_DOMAIN ) !== false ) : ?>
                                        <a class="label label-success add-collection" value="<?php echo $item["guid"]; ?>" onclick="gtag('send','event','Search Results','Favorite Documents','<?php echo htmlspecialchars($item["title"]); ?>'); window.open('<?=RELATIVE_PATH?>/controller/searchresults/control/business/task/addcol/similar/doc<?=$count?>','','resizable=no,scrollbars=1,width=420,height=310')"><?=$trans->getTrans($_REQUEST["action"],'ADD_COLLECTION')?></a>
                                        <?php endif; ?>
                                        <a class="label label-primary related-docs" href="javascript:;" onclick="gtag('send','event','Search Results','Related Documents','<?php echo htmlspecialchars($item["title"]); ?>');"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS'); ?></a>
                                    </div>
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
                        </div>
                      <?php else : ?>
                        <div id="step38" class="col-md-9 col-sm-9 col-xs-12">
                            <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'RSS_NO_REGISTERS_FOUND')?></p>
                        </div>
                      <?php endif; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <div id="docsfolderlist" style="display: none">
          <select name="docs-folder-list" class="form-control docsfolderlist">
            <option></option>
            <option value="0"><?=$trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER')?></option>
            <?php foreach ($docsFolders as $folder) : ?>
            <option value="<?php echo $folder['dirID'] ?>"><?php echo $folder['name']; ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <script type="text/javascript">
          if (RegExp('multipage', 'gi').test(window.location.search)) {
            var steps = [
              {
                element: 'li.side.step35',
                intro: "<?=$trans->getTrans('tour','STEP_35')?>",
                position: 'right'
              },
              {
                element: 'li.child.step35',
                intro: "<?=$trans->getTrans('tour','STEP_35')?>",
                position: 'right'
              },
              {
                element: '#step36',
                intro: "<?=$trans->getTrans('tour','STEP_36')?>",
                position: 'left'
              },
              <?php if ( !$_REQUEST['rss'] ) { ?>
              {
                element: '#step37',
                intro: "<?=$trans->getTrans('tour','STEP_37')?>",
                position: 'left'
              },
              <?php } else { ?>
              {
                element: '#step38',
                intro: "<?=$trans->getTrans('tour','STEP_38')?>",
                position: 'left'
              },
              <?php } ?>
              {
                intro: '<?=$trans->getTrans('tour','LAST')?>'
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
                  doneLabel: "<?=$trans->getTrans('menu','DONE')?>",
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
                        case 'step36':
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

                intro.start();
            }
            
            window.addEventListener('load', function() {
                startIntro();
            });
          }
        </script>

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>