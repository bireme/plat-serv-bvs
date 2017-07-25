        <?require_once(dirname(__FILE__)."/header.tpl.php");?>
        <?require_once(dirname(__FILE__)."/sidebar.tpl.php");?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 orcid">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans($_REQUEST["action"],'ORCID_WORKS')?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div id="step34" class="x_content">
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
                            <tr>
                              <td id="ow<?php echo $count; ?>">
                                <div class="record">
                                  <?php if ( $register["docURL"] ) : ?>
                                    <a href="<?php echo $register["docURL"]; ?>" target="_blank"><?php echo $register["title"]; ?></a>
                                  <?php else : ?>
                                    <?php echo $register["title"]; ?>
                                  <?php endif; ?>
                                  <small style="display: block;"><?php echo implode("; ", $register["authors"]); ?></small>
                                </div>
                                <div class="doc-actions">
                                  <a class="label label-success" href="https://scholar.google.com.br/scholar?as_q=&as_epq=<?php echo urlencode($register["title"]); ?>" target="_blank" onclick="__gaTracker('send','event','ORCID','Google Scholar','<?php echo $register["title"]; ?>');"><?=$trans->getTrans($_REQUEST["action"],'GOOGLE_SCHOLAR')?></a>
                                  <a class="label label-primary related-docs" href="javascript:;" onclick="__gaTracker('send','event','ORCID','Related Documents','<?php echo $register["title"]; ?>');"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS'); ?></a>
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
                        <?php echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                    <?php else : ?>
                        <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'ORCID_WORKS_NO_REGISTERS_FOUND')?></p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <script type="text/javascript">
          if (RegExp('multipage', 'gi').test(window.location.search)) {
            function startIntro(){
              var intro = introJs();
                intro.setOptions({
                  doneLabel: "<?=$trans->getTrans('menu','DONE')?>",
                  prevLabel: "<?=$trans->getTrans('menu','BACK')?>",
                  nextLabel: "<?=$trans->getTrans('menu','NEXT')?>",
                  skipLabel: "<?=$trans->getTrans('menu','SKIP')?>",
                  exitOnOverlayClick: false,
                  showStepNumbers: false,
                  steps: [
                    {
                      element: '#step33',
                      intro: "<?=$trans->getTrans('tour','STEP_33')?>",
                      position: 'right'
                    },
                    {
                      element: '#step34',
                      intro: "<?=$trans->getTrans('tour','STEP_34')?>",
                      position: 'left'
                    },
                    {
                      intro: '<?=$trans->getTrans('tour','LAST')?>'
                    }
                  ]
                });

                intro.start();
            }
            
            startIntro();
          }
        </script>

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>