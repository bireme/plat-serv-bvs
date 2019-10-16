    <?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/sidebar.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/nav.tpl.php"); ?>
    <div id="wrap">
        <div class="row">
            <div class="col m12 ">
                <div class="box1">
                    <h5 class="title1"><i class="far fa-file-alt left"></i> <?php echo $trans->getTrans($_REQUEST["action"],'ORCID_WORKS'); ?></h5>
                </div>
                <section class="row">
                    <?php if ( $response["values"] != false ) : ?>
                        <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                        <?php foreach ( $response["values"] as $put_code => $register) : $count++; ?>
                            <article id="ow<?php echo $count; ?>" class="col s12 l6 xl4">
                                <div class="box4 hoverable">
                                    <div class="box4P record">
                                        <?php if ( $register["docURL"] ) : ?>
                                            <a class="doctitle" href="<?php echo $register["docURL"]; ?>" target="_blank"><?php echo $register["title"]; ?></a>
                                        <?php else : ?>
                                            <a class="doctitle no-url" href="#!"><?php echo $register["title"]; ?></a>
                                        <?php endif; ?>
                                        <?php if ( $register["authors"] ) : ?>
                                            <div class="boxAutor"><?php echo implode("; ", $register["authors"]); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="btn2Botoes">
                                        <?php $google_scholar = GOOGLE_SCHOLAR_WS . urlencode($register["title"]); ?>
                                        <?php // $gs_links = SimilarDocs::getGoogleScholarLinks($_SESSION['userTK'], $put_code, $google_scholar); ?>
                                        <a class="btn3 btnSuccess google-scholar" href="<?php echo $google_scholar; ?>" target="_blank" onclick="__gaTracker('send','event','ORCID','Google Scholar','<?php echo htmlspecialchars($register["title"]); ?>');"><?php echo $trans->getTrans($_REQUEST["action"],'GOOGLE_SCHOLAR'); ?></a>
                                        <a href="#modal-related-docs" class="btn3 btnPrimary modal-trigger related-docs" onclick="__gaTracker('send','event','ORCID','Related Documents','<?php echo addslashes(htmlspecialchars($register["title"])); ?>');"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS'); ?></a>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="card-panel center-align">
                            <span class="blue-text text-darken-2"><?php echo $trans->getTrans($_REQUEST["action"],'ORCID_WORKS_NO_REGISTERS_FOUND'); ?></span>
                        </div>
                    <?php endif; ?>
                </section>
                <?php if ( $objPaginator->totalPages > 1 ) { echo $objPaginator->build(); } ?>
            </div>
        </div>
        <div class="box1">
            <div class="col-12 center-align">
                <div class="box12">
                    <h6><b><?php echo $trans->getTrans('menu','TUTORIAL'); ?></b></h6>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/Fe4cW3B0q_U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="center-align" id="verMaisMidia" >
                        <a href="#!"><?php echo $trans->getTrans('menu','SEE_MORE'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once(dirname(__FILE__)."/info.tpl.php"); ?>
        <?php require_once(dirname(__FILE__)."/more.tpl.php"); ?>
    </div>
    <!-- Modal Similares -->
    <div id="modal-related-docs" class="modal">
        <form action="#" class="col s12">
            <div class="modal-content">
                <h4><?php echo ucwords($trans->getTrans('suggesteddocs','RELATED_DOCS')); ?></h4>
                <p class="center-align">
                    <b id="ref-title"></b>
                </p>
                <div class="related_docs">
                    <div class="related-loading center-align"><?php echo $trans->getTrans('suggesteddocs','LOADING'); ?></div>
                    <div class="related-loading row">
                        <div class="progress col s8 offset-s2">
                            <div class="indeterminate" style="width: 0"><?php echo $trans->getTrans('suggesteddocs','LOADING'); ?></div>
                        </div>
                    </div>
                    <div class="related-list"></div>
                    <div class="related-alert" style="display: none;"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS_ALERT'); ?></div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CLOSE'); ?></a>
            </div>
        </form>
    </div>
    <script type="text/javascript">
      if (RegExp('multipage', 'gi').test(window.location.search)) {
        var steps = [
          {
            element: 'li.side.step33',
            intro: "<?php echo $trans->getTrans('tour','STEP_33'); ?>",
            position: 'right'
          },
          {
            element: 'li.child.step33',
            intro: "<?php echo $trans->getTrans('tour','STEP_33'); ?>",
            position: 'right'
          },
          {
            element: '#step34',
            intro: "<?php echo $trans->getTrans('tour','STEP_34'); ?>",
            position: 'left'
          }
        ];

        var sw = screen.width;
        var tooltipClass = 'orcid-works';

        if ( sw > 768 ) {
            steps.splice(0,1);
        } else {
            tooltipClass += ' mobile';
            steps.splice(1,1);
        }

        function startIntro(){
          var intro = introJs();
            intro.setOptions({
              doneLabel: "<?php echo $trans->getTrans('menu','NEXT_PAGE'); ?>",
              prevLabel: "<?php echo $trans->getTrans('menu','BACK'); ?>",
              nextLabel: "<?php echo $trans->getTrans('menu','NEXT'); ?>",
              skipLabel: "<?php echo $trans->getTrans('menu','SKIP'); ?>",
              exitOnOverlayClick: false,
              showStepNumbers: false,
              showBullets: false,
              tooltipClass: tooltipClass,
              steps: steps
            });

            intro.onchange(function(targetElement) {
                switch (targetElement.id) { 
                    case 'step34':
                        document.getElementById("body").className = "nav-md <?php echo $lang_class; ?>";
                    break;
                }

                switch (this._currentStep) { 
                    case 0:
                        if ( sw <= 768 ) {
                            document.getElementById("body").className = "nav-sm <?php echo $lang_class; ?>";
                        }
                    break;
                }
            });

            intro.start().oncomplete(function() {
              window.location.href = '<?php echo RELATIVE_PATH."/controller/searchresults/control/business/?multipage=true"; ?>';
            });
        }
        
        window.addEventListener('load', function() {
            startIntro();
        });
      }
    </script>
    <?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>