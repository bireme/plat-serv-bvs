<?php
    $location = RELATIVE_PATH.'/controller/mysearches/control/business';

    if ( isset($_REQUEST['page']) && $_REQUEST['page'] > 1 ) {
        $page = $_REQUEST['page'];

        if ( $response["values"] && count($response["values"]) == 1 ) {
            $page = $_REQUEST['page'] - 1;
        }

        $location = $location.'/page/'.$page;
    }

    if ( 'delete' == $_REQUEST["task"] ) {
        header("Location: ".$location);
    }
?>

        <?php parse_str($_SERVER['QUERY_STRING'], $output); ?>

        <?require_once(dirname(__FILE__)."/header.tpl.php");?>
        <?require_once(dirname(__FILE__)."/sidebar.tpl.php");?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 vhl-search">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>
                      <?=$trans->getTrans($_REQUEST["action"],'MY_SEARCHES')?>
                      <?php if ( !$response["values"] && isset($output['multipage']) ) : ?>
                        <small class="example"><?=$trans->getTrans('tour','TOUR_EXAMPLE')?></small>
                      <?php endif; ?>
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div id="step25" class="x_content">
                    <?php if ( $response["values"] != false ) : ?>
                        <?php //echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                        <!-- start project list -->
                        <table id="datatable-search" class="table table-striped table-list">
                          <thead>
                            <tr>
                              <th style="width: 10%" class="all">#</th>
                              <th style="width: 35%" class="all query"><?=$trans->getTrans($_REQUEST["action"],'QUERY')?></th>
                              <th style="width: 35%" class="min-tablet-l filter"><?=$trans->getTrans($_REQUEST["action"],'FILTERS')?></th>
                              <th style="width: 20%" class="min-tablet"><?=$trans->getTrans($_REQUEST["action"],'ACTIONS')?></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                            <?php foreach ( $response["values"] as $register) : $count++; ?>
                            <tr>
                              <td id="s<?php echo $count; ?>"><?php echo $count; ?></td>
                              <td class="query step26"><a href="<?php echo VHL_SEARCH_PORTAL_DOMAIN.'/portal/?q='.$register['query']; ?>" target="_blank"><?php echo CharTools::shortenedQueryString($register['query']); ?></a></td>
                              <td class="filter step27"><?php echo CharTools::shortenedQueryString($register['filter']); ?></td>
                              <td class="step28">
                                <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
                                <button id="v<?php echo $count; ?>" class="btn btn-primary btn-xs portal" value="portal" data-query="<?php echo $register['query']; ?>" data-filter="<?php echo $register['filter']; ?>" onclick="gtag('send','event','VHL Search History','Show Result','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="fa fa-search"></i> <?=$trans->getTrans($_REQUEST["action"],'VIEW')?></button>
                                <?php else : ?>
                                <button id="v<?php echo $count; ?>" class="btn btn-primary btn-xs search" value="<?php echo $_SESSION['iahx']; ?>" data-label="<?php echo $label; ?>" data-query="<?php echo $register['query']; ?>" data-filter="<?php echo $register['filter']; ?>" onclick="gtag('send','event','VHL Search History','Show Result','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="fa fa-search search"></i> <?=$trans->getTrans($_REQUEST["action"],'VIEW')?></button>
                                <?php endif; ?>
                                <button id="c<?php echo $count; ?>" class="btn btn-info btn-xs combine" data-query="<?php echo $register['query']; ?>" data-filter="<?php echo $register['filter']; ?>" onclick="gtag('send','event','VHL Search History','Combine Queries','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="fa fa-compress combine"></i> <?=$trans->getTrans($_REQUEST["action"],'COMBINE')?></button>
                                <a href="<?php echo $location.'/task/delete/?query='.$register['query'].'&filter='.$register['filter']; ?>" id="d<?php echo $count; ?>" class="btn btn-danger btn-xs" onclick="gtag('send','event','VHL Search History','Delete Query','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="fa fa-remove"></i> <?=$trans->getTrans($_REQUEST["action"],'REMOVE')?></a>
                              </td>
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        <!-- end project list -->
                        <?php if ( $objPaginator->totalPages > 1 ) : ?>
                        <div class="datatable-search-pagination">
                          <?php echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                        </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if ( isset($output['multipage']) ) : ?>
                          <table id="datatable-search" class="table table-striped table-list">
                            <thead>
                              <tr>
                                <th style="width: 10%" class="all">#</th>
                                <th style="width: 35%" class="all query"><?=$trans->getTrans($_REQUEST["action"],'QUERY')?></th>
                                <th style="width: 35%" class="filter"><?=$trans->getTrans($_REQUEST["action"],'FILTERS')?></th>
                                <th style="width: 20%"><?=$trans->getTrans($_REQUEST["action"],'ACTIONS')?></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td id="s1">1</td>
                                <td class="query step26">health</td>
                                <td class="filter step27">db:("MEDLINE")</td>
                                <td class="step28">
                                  <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
                                  <button id="v1" class="btn btn-primary btn-xs portal" value="portal" data-query="health" data-filter="db:('MEDLINE')"><i class="fa fa-search"></i> <?=$trans->getTrans($_REQUEST["action"],'VIEW')?></button>
                                  <?php else : ?>
                                  <button id="v1" class="btn btn-primary btn-xs search" value="<?php echo $_SESSION['iahx']; ?>" data-label="<?php echo $label; ?>" data-query="health" data-filter="db:('MEDLINE')"><i class="fa fa-search search"></i> <?=$trans->getTrans($_REQUEST["action"],'VIEW')?></button>
                                  <?php endif; ?>
                                  <button id="c1" class="btn btn-info btn-xs combine" data-query="health" data-filter="db:('MEDLINE')"><i class="fa fa-compress combine"></i> <?=$trans->getTrans($_REQUEST["action"],'COMBINE')?></button>
                                </td>
                              </tr>
                              <tr>
                                <td id="s2">2</td>
                                <td class="query step26">salud</td>
                                <td class="filter step27">db:("LILACS")</td>
                                <td class="step28">
                                  <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
                                  <button id="v2" class="btn btn-primary btn-xs portal" value="portal" data-query="salud" data-filter="db:('LILACS')"><i class="fa fa-search"></i> <?=$trans->getTrans($_REQUEST["action"],'VIEW')?></button>
                                  <?php else : ?>
                                  <button id="v2" class="btn btn-primary btn-xs search" value="<?php echo $_SESSION['iahx']; ?>" data-label="<?php echo $label; ?>" data-query="salud" data-filter="db:('LILACS')"><i class="fa fa-search search"></i> <?=$trans->getTrans($_REQUEST["action"],'VIEW')?></button>
                                  <?php endif; ?>
                                  <button id="c2" class="btn btn-info btn-xs combine" data-query="salud" data-filter="db:('LILACS')"><i class="fa fa-compress combine"></i> <?=$trans->getTrans($_REQUEST["action"],'COMBINE')?></button>
                                </td>
                              </tr>
                              <tr>
                                <td id="s3">3</td>
                                <td class="query step26">saúde</td>
                                <td class="filter step27">db:("BDENF")</td>
                                <td class="step28">
                                  <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
                                  <button id="v3" class="btn btn-primary btn-xs portal" value="portal" data-query="saúde" data-filter="db:('BDENF')"><i class="fa fa-search"></i> <?=$trans->getTrans($_REQUEST["action"],'VIEW')?></button>
                                  <?php else : ?>
                                  <button id="v3" class="btn btn-primary btn-xs search" value="<?php echo $_SESSION['iahx']; ?>" data-label="<?php echo $label; ?>" data-query="saúde" data-filter="db:('BDENF')"><i class="fa fa-search search"></i> <?=$trans->getTrans($_REQUEST["action"],'VIEW')?></button>
                                  <?php endif; ?>
                                  <button id="c3" class="btn btn-info btn-xs combine" data-query="saúde" data-filter="db:('BDENF')"><i class="fa fa-compress combine"></i> <?=$trans->getTrans($_REQUEST["action"],'COMBINE')?></button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        <?php else : ?>
                          <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'MY_SEARCHES_NO_REGISTERS_FOUND')?></p>
                        <?php endif; ?>
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
            var steps = [
              {
                element: 'li.side.step24',
                intro: "<?=$trans->getTrans('tour','STEP_24')?>",
                position: 'right'
              },
              {
                element: 'li.child.step24',
                intro: "<?=$trans->getTrans('tour','STEP_24')?>",
                position: 'right'
              },
              {
                element: '#step25',
                intro: "<?=$trans->getTrans('tour','STEP_25')?>",
                position: 'left'
              },
              {
                element: '.step26',
                intro: "<?=$trans->getTrans('tour','STEP_26')?>",
                position: 'bottom'
              },
              {
                element: '.step27',
                intro: "<?=$trans->getTrans('tour','STEP_27')?>",
                position: 'bottom'
              },
              {
                element: '.step28',
                intro: "<?=$trans->getTrans('tour','STEP_28')?>",
                position: 'left'
              },
              {
                element: '#s1',
                intro: "<?=$trans->getTrans('tour','STEP_S1')?>",
                position: 'bottom'
              }
            ];

            var sw = screen.width;
            var tooltipClass = '';

            if ( sw > 768 ) {
                steps.splice(0,1);
                steps.splice(-1,1);
            } else {
                tooltipClass = 'mobile';
                steps.splice(1,1);
                steps.splice(3,2);
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
                        case 'step25':
                            document.getElementById("body").className = "nav-md";
                        break;
                    }

                    switch (this._currentStep) { 
                        case 0:
                            if ( sw <= 768 ) {
                                document.getElementById("body").className = "nav-sm";
                            }
                        break;
                        case 3:
                            document.getElementById('s1').click();
                        break;
                    }
                });

                intro.start().oncomplete(function() {
                  window.location.href = '<?php echo RELATIVE_PATH."/controller/mylinks/control/business/?multipage=true"; ?>';
                });
            }
            
            window.addEventListener('load', function() {
                startIntro();
            });
          }
        </script>

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>