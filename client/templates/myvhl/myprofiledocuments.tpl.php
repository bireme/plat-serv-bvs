<?
    if ( 'rate' == $_REQUEST["task"] )
        header("Location: " . $_SERVER['HTTP_REFERER']);
    if ( 'delete' == $_REQUEST["task"] )
        header("Location: ".RELATIVE_PATH.'/controller/myprofiledocuments/control/business');
?>

        <?require_once(dirname(__FILE__)."/header.tpl.php");?>
        <?require_once(dirname(__FILE__)."/sidebar.tpl.php");?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-sm-12 col-md-12 col-xs-12 col-themes themes">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans($_REQUEST["action"],'MY_PROFILES')?></h2>
                    <div class="toggle_icons">
                      <a id="toggle_list">
                        <i class="fa fa-bars"></i>
                        <i class="fa fa-list"></i>
                      </a>
                    </div>
                    <small class="update-alert"><?=$trans->getTrans($_REQUEST["action"],'UPDATE_ALERT')?></small>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ($responseProfile["values"] != false ) : ?>
                      <?php $registerProfile = $responseProfile["values"][0]; ?>
                      <div class="col-list">
                        <div class="folder-data">
                            <h4><i class="fa fa-folder-o"></i> <?=$registerProfile["profileName"]?></h4>
                            <a class="edit" href="javascript:;" onclick="gtag('send','event','Interest Topics','Edit Topic','<?php echo htmlspecialchars($registerProfile["profileName"]); ?>'); window.open('<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business/task/edit/profile/<?=$registerProfile["profileID"]?>','','resizable=no,scrollbars=1,width=420,height=385')"><span class="label label-info"><?=$trans->getTrans($_REQUEST["action"],'EDIT_PROFILE')?></span></a>
                            <a class="remove" href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business/task/delete/profile/<?=$registerProfile["profileID"]?>" onclick="gtag('send','event','Interest Topics','Remove Topic','<?php echo htmlspecialchars($registerProfile["profileName"]); ?>');"><span class="label label-danger"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_PROFILE')?></span></a>
                        </div>
                        <div class="keywords"><small><?=$trans->getTrans($_REQUEST["action"],'PROFILE_KEYWORDS')?>: <?=$registerProfile["profileText"]?></small></div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div id="step21" class="col-md-9 col-sm-9 col-xs-12">
                            <?php if ( 'on' == $responseSimilarDocs["values"]['status'] ) : ?>
                                <?php //echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                                <!-- start project list -->
                                <table class="table table-striped table-list">
                                  <!--thead>
                                    <tr>
                                      <th>#</th>
                                    </tr>
                                  </thead-->
                                  <tbody>
                                    <?php $count = 0; ?>
                                    <?php foreach ( $responseSimilarDocs["values"]['similars'] as $similar ) : $count++; ?>
                                    <tr id="<?php echo 'doc'.$count; ?>">
                                      <td>
                                        <div class="record">
                                            <a href="<?php echo $similar["docURL"]; ?>" onclick="gtag('send','event','Interest Topics','View Document','<?php echo addslashes(htmlspecialchars($similar["title"])); ?>');" target="_blank"><?php echo $similar["title"]; ?></a>
                                            <small style="display: block;"><?php echo $similar["authors"]; ?></small>
                                        </div>
                                        <div class="doc-actions">
                                            <a class="label label-success add-collection" value="<?php echo $similar["docID"]; ?>" onclick="gtag('send','event','Interest Topics','Favorite Documents','<?php echo htmlspecialchars($similar["title"]); ?>'); window.open('<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business/task/addcol/similar/doc<?=$count?>','','resizable=no,scrollbars=1,width=420,height=310')"><?=$trans->getTrans($_REQUEST["action"],'ADD_COLLECTION')?></a>
                                            <a class="label label-primary related-docs" href="javascript:;" onclick="gtag('send','event','Interest Topics','Related Documents','<?php echo htmlspecialchars($similar["title"]); ?>');"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS'); ?></a>
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
                              <?php if ( 'none' == $responseSimilarDocs["values"]['status'] ) : ?>
                                <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'MY_PROFILES_NO_SUGGESTIONS_FOUND')?></p>
                              <?php else : ?>
                                <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'SERVICE_TEMPORARY_UNAVAILABLE')?></p>
                              <?php endif; ?>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    <?php else : ?>
                      <div id="step21" class="col-md-9 col-sm-9 col-xs-12 col-list">
                          <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'MY_PROFILES_NO_REGISTERS_FOUND')?></p>
                      </div>
                    <?php endif; ?>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-filter">
                        <section id="step22" class="panel panel-folder">
                            <div class="panel-body">
                                <h5><?=$trans->getTrans($_REQUEST["action"],'TOOLS')?></h5>
                                <ul class="list-docs-unstyled project_files">
                                    <li><a href="javascript:;" onclick="window.open('<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/view/task/add','','resizable=no,width=420,height=385')"><i class="fa fa-plus-circle"></i><?=ucfirst($trans->getTrans($_REQUEST["action"],'ADD_PROFILE'))?></a></li>
                                </ul>
                            </div>
                        </section>
                        <section id="step23" class="panel panel-folder">
                            <div class="panel-body">
                                <h5><?=$trans->getTrans($_REQUEST["action"],'PROFILES')?></h5>
                                <?php if ($response["values"] != false ) : ?>
                                  <ul class="list-docs-unstyled project_files profiles">
                                      <?php foreach ($response["values"] as $register) : ?>
                                          <li><a href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business/profile/<?=$register["profileID"]?>"><?php echo $register["profileName"]; ?></a><?php if ($register["profileDefault"] == 1) { ?>&nbsp;<img class="starOn" src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0"/><?php } ?></li>
                                      <?php endforeach; ?>
                                  </ul>
                                <?php endif; ?>
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

        <script type="text/javascript">
          if (RegExp('multipage', 'gi').test(window.location.search)) {
            var steps = [
              {
                element: 'li.side.step20',
                intro: "<?=$trans->getTrans('tour','STEP_20')?>",
                position: 'right'
              },
              {
                element: 'li.child.step20',
                intro: "<?=$trans->getTrans('tour','STEP_20')?>",
                position: 'right'
              },
              {
                element: '#step21',
                intro: "<?=$trans->getTrans('tour','STEP_21')?>",
                position: 'left'
              },
              {
                element: '#step22',
                intro: "<?=$trans->getTrans('tour','STEP_22')?>",
                position: 'left'
              },
              {
                element: '#step23',
                intro: "<?=$trans->getTrans('tour','STEP_23')?>",
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
                        case 'step21':
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
                  window.location.href = '<?php echo RELATIVE_PATH."/controller/mysearches/control/business/?multipage=true"; ?>';
                });
            }
            
            window.addEventListener('load', function() {
                startIntro();
            });
          }
        </script>

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>