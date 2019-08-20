<?php
    $docURL = '';
    $site   = '';

    if ( strpos($_SESSION['iahx'], VHL_SEARCH_PORTAL_DOMAIN) !== false ) {
        $chunks = explode('/', $_SESSION['iahx']);
        $chunks = array_values(array_filter($chunks));

        if ( count($chunks) > 2 && !empty($chunks[2]) ) {
            $site  = $chunks[2];
        }
    }

    parse_str($_SERVER['QUERY_STRING'], $output);
?>

        <?require_once(dirname(__FILE__)."/header.tpl.php");?>
        <?require_once(dirname(__FILE__)."/sidebar.tpl.php");?>

        <!-- page content -->
        <div class="right_col widgets" role="main">
            <!-- top tiles -->
            <div class="row tile_count">
              <div id="step7" class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-file-o"></i> <?=$trans->getTrans('menu','MY_SHELF')?></span>
                <div class="count"><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business" onclick="__gaTracker('send','event','Overview','Favorite Documents','See All');"><?php echo $totalCollections; ?></a></div>
                <span class="count_bottom"><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business" onclick="__gaTracker('send','event','Overview','Favorite Documents','See All');"><?=$trans->getTrans('menu','SEE_ALL_DOCS')?></a></span>
              </div>
              <div id="step8" class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-external-link"></i> <?=$trans->getTrans('menu','MY_LINKS')?></span>
                <div class="count green"><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business" onclick="__gaTracker('send','event','Overview','Favorite Links','See All');"><?php echo $totalLinks; ?></a></div>
                <span class="count_bottom"><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business" onclick="__gaTracker('send','event','Overview','Favorite Links','See All');"><?=$trans->getTrans('menu','SEE_ALL_LINKS')?></a></span>
              </div>
              <div id="step9" class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-folder-open-o"></i> <?=$trans->getTrans('menu','MY_PROFILE_DOCUMENTS')?></span>
                <div class="count"><a href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business" onclick="__gaTracker('send','event','Overview','Interest Topics','See All');"><?php echo $totalProfiles; ?></a></div>
                <span class="count_bottom"><a href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business" onclick="__gaTracker('send','event','Overview','Interest Topics','See All');"><?=$trans->getTrans('menu','SEE_ALL_PROFILES')?></a></span>
              </div>
            </div>
            <!-- /top tiles -->

            <!-- Services Platform Dashboard -->
            <div class="row">
<!--
              <div class="col-md-8 col-sm-8 col-xs-12 similars">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','SUGGESTED_DOCS')?><small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $suggestedDocs ) : ?>
                      <?php foreach ( $suggestedDocs as $docs ) : ?>
                        <article class="media event">
                          <div class="media-body">
                            <a class="title" href="<?php echo $docs['docURL'] ?>" target="_blank"><i class="fa fa-file-text-o" aria-hidden="true"></i><?php echo $docs['title'] ?></a>
                          </div>
                        </article>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
-->
              <!-- <div id="step10" class="col-md-8 col-sm-8 col-xs-12 fav-docs"> -->
              <div id="step10" class="col-md-4 col-xs-12 fav-docs">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','SHELF_WIDGET')?><small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $collections ) : ?>
                      <?php foreach ( $collections as $col ) : ?>
                        <?php
                          if ( is_array($col["docURL"]) ) {
                            if ( 'portal' != $_SESSION['iahx'] && !empty($site) && array_key_exists($site, $col['docURL']) ) {
                              $docURL = $col['docURL'][$site];
                            } else {
                              $docURL = $col['docURL']['portal'];
                            }
                          } else {
                            $docURL = $col['docURL'];
                          }
                        ?>
                        <article class="media event">
                          <div class="media-body">
                            <a class="title" href="<?php echo $docURL; ?>" target="_blank" onclick="__gaTracker('send','event','Overview','Favorite Documents','<?php echo htmlspecialchars($col['title']); ?>');"><i class="fa fa-file-o" aria-hidden="true"></i><?php echo $col['title'] ?></a>
                          </div>
                        </article>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div id="step11" class="col-md-4 col-xs-12 themes">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','PROFILE_WIDGET')?><small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $profiles ) : ?>
                      <?php foreach ( $profiles as $profile ) : ?>
                        <article class="media event">
                          <div class="media-body">
                            <a class="title" href="<?php echo RELATIVE_PATH.'/controller/myprofiledocuments/control/business/profile/'.$profile["profileID"]; ?>" onclick="__gaTracker('send','event','Overview','Interest Topics','<?php echo htmlspecialchars($profile['profileName']); ?>');"><i class="fa fa-folder-open-o" aria-hidden="true"></i><?php echo $profile['profileName']; ?></a>
                            <p><span><?=$trans->getTrans('menu','KEYWORDS')?>: </span><?php echo $profile['profileText']; ?></p>
                          </div>
                        </article>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              
              <div id="step12" class="col-md-4 col-xs-12 fav-links">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','MY_LINKS')?><small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $links ) : ?>
                      <?php foreach ( $links as $link ) : ?>
                        <article class="media event">
                          <div class="media-body">
                            <a class="title" href="<?php echo $link['url']; ?>" target="_blank" onclick="__gaTracker('send','event','Overview','Favorite Links','<?php echo $link['url']; ?>');"><i class="fa fa-external-link" aria-hidden="true"></i><?php echo $link['name']; ?></a>
                            <p><?php echo $link['description']; ?></p>
                          </div>
                        </article>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row row-last">
              <div id="step13" class="col-md-4 col-xs-12 tasks">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','RECENT_ACTIVITIES')?><small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $dataHistory ) : ?>
                      <div class="dashboard-widget-content">
                        <ul class="list-unstyled timeline widget">
                          <?php foreach ( $dataHistory as $trace ) : ?>
                            <?php $date = date("d/m/Y - H:i A", strtotime($trace['datetime'])); ?>
                            <?php $label = $trans->getTrans('menu',$trace['action'].'_'.$trace['type']); ?>
                            <li>
                              <div class="block">
                                <div class="block_content">
                                  <h2 class="title"></h2>
                                  <div class="byline">
                                    <span><?php echo $date; ?></span>
                                  </div>
                                  <p class="excerpt"><?php echo $label; ?>: <span><?php echo $trace['target']; ?></span></p>
                                </div>
                              </div>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div id="step14" class="col-md-4 col-xs-12 vhl-search">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','SEARCH_WIDGET')?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $searches ) : ?>
                      <table class="table table-striped servplat-widget">
                        <thead>
                          <tr>
                            <th style="font-size: 13px;"><?=$trans->getTrans('menu','QUERY')?></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody style="word-break: break-word;">
                          <?php foreach ( $searches as $search ) : $count++ ?>
                            <tr>
                              <td class="query"><?php echo CharTools::shortenedQueryString($search['query']); ?></td>
                              <td style="text-align: right;">
                                <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
                                <button id="v<?php echo $count; ?>" class="btn btn-primary btn-xs portal" value="portal" data-query="<?php echo $search['query']; ?>" data-filter="<?php echo $search['filter']; ?>" onclick="__gaTracker('send','event','Overview','VHL Search History','<?php echo htmlspecialchars($search['query']); ?>');"><i class="fa fa-search"></i> <?=$trans->getTrans('menu','VIEW')?></button>
                                <?php else : ?>
                                <button id="v<?php echo $count; ?>" class="btn btn-primary btn-xs search" value="<?php echo $_SESSION['iahx']; ?>" data-label="<?php echo $label; ?>" data-query="<?php echo $search['query']; ?>" data-filter="<?php echo $search['filter']; ?>" onclick="__gaTracker('send','event','Overview','VHL Search History','<?php echo htmlspecialchars($search['query']); ?>');"><i class="fa fa-search search"></i> <?=$trans->getTrans('menu','VIEW')?></button>
                                <?php endif; ?>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="col-md-4 col-xs-12 events">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','EVENTS')?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $events ) : ?>
                      <?php foreach ( $events as $event ) : ?>
                        <?php $month = (int) substr($event->start_date, 5, 2); ?>
                        <?php $link = ( $event->link ) ? $event->link[0] : $DIREVE[$_SESSION['lang']] . 'resource/?id=' . $event->django_id; ?>
                        <article class="media event">
                          <a class="pull-left date">
                            <p class="month"><?php echo Generic::month_name($month, TRUE); ?></p>
                            <p class="day"><?php echo substr($event->start_date, 8, 2); ?></p>
                          </a>
                          <div class="media-body">
                            <a class="title" href="<?php echo $link; ?>" target="_blank"><?php echo $event->title; ?></a>
                            <p><?php // echo substr($event->start_date, 0, 10); ?></p>
                          </div>
                        </article>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->

        <?php if ( !$_SESSION['visited'] || isset($output['tour']) ) : $_SESSION['visited'] = true; ?>
        <script type="text/javascript">
          var steps = [
            { 
              intro: "<?=$trans->getTrans('tour','INTRO')?>"
            },
            { 
              intro: "<?=$trans->getTrans('tour','FIRST')?>"
            },
            {
              element: '#step1',
              intro: "<?=$trans->getTrans('tour','STEP_1')?>",
              position: 'right'
            },
            {
              element: 'li.step2',
              intro: "<?=$trans->getTrans('tour','STEP_2')?>",
              position: 'right'
            },
            {
              element: 'li.child.step3',
              intro: "<?=$trans->getTrans('tour','STEP_3')?>",
              position: 'right'
            },
            {
              element: 'ul.step2',
              intro: "<?=$trans->getTrans('tour','STEP_2')?>",
              position: 'right'
            },
            {
              element: 'li.side.step3',
              intro: "<?=$trans->getTrans('tour','STEP_3')?>",
              position: 'right'
            },
            {
              element: '#step4',
              intro: "<?=$trans->getTrans('tour','STEP_4')?>",
              position: 'bottom'
            },
            {
              element: '#step5',
              intro: "<?=$trans->getTrans('tour','STEP_5')?>",
              position: 'left'
            },
            {
              element: '#step6',
              intro: "<?=$trans->getTrans('tour','STEP_6')?>",
              position: 'left'
            },
            {
              element: '#step7',
              intro: "<?=$trans->getTrans('tour','STEP_7')?>",
              position: 'bottom'
            },
            {
              element: '#step8',
              intro: "<?=$trans->getTrans('tour','STEP_8')?>",
              position: 'bottom'
            },
            {
              element: '#step9',
              intro: "<?=$trans->getTrans('tour','STEP_9')?>",
              position: 'bottom'
            },
            {
              element: '#step10',
              intro: "<?=$trans->getTrans('tour','STEP_10')?>",
              position: 'right'
            },
            {
              element: '#step11',
              intro: "<?=$trans->getTrans('tour','STEP_11')?>",
              position: 'right'
            },
            {
              element: '#step12',
              intro: "<?=$trans->getTrans('tour','STEP_12')?>",
              position: 'left'
            },
            {
              element: '#step13',
              intro: "<?=$trans->getTrans('tour','STEP_13')?>",
              position: 'right'
            },
            {
              element: '#step14',
              intro: "<?=$trans->getTrans('tour','STEP_14')?>",
              position: 'right'
            }
          ];

          var sw = screen.width;
          var tooltipClass = '';

          if ( sw > 768 ) {
              steps.splice(5,2);
          } else {
              tooltipClass = 'mobile';
              steps.splice(2,3);
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
                      case 'step4':
                          document.getElementById("body").className = "nav-md";
                      break;
                  }

                  switch (this._currentStep) { 
                      case 0:
                      case 1:
                      case 2:
                      case 3:
                          if ( sw <= 768 ) {
                              document.getElementById("body").className = "nav-sm";
                          }
                      break;
                  }
              });

              intro.start().oncomplete(function() {
                window.location.href = '<?php echo RELATIVE_PATH."/controller/mydocuments/control/business/?multipage=true"; ?>';
              });
          }

          window.addEventListener('load', function() {
              startIntro();
          });
        </script>
        <?php endif; ?>

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>