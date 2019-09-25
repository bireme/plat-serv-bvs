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

    parse_str($_SERVER['QUERY_STRING'], $output);
?>
    <?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/sidebar.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/nav.tpl.php"); ?>
    <div id="wrap">
        <div class="row">
            <div class="col s12">
                <div class="box1">
                    <h5 class="title1"><i class="fas fa-history left"></i> <?php echo $trans->getTrans($_REQUEST["action"],'MY_SEARCHES'); ?></h5>
                </div>
                <?php if ( $response["values"] != false ) : ?>
                    <section class="box1">
                        <table class="highlight">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="query" style="width: 40%"><?php echo $trans->getTrans($_REQUEST["action"],'QUERY'); ?></th>
                                    <th class="filter" style="width: 40%"><?php echo $trans->getTrans($_REQUEST["action"],'FILTERS'); ?></th>
                                    <th class="center-align" style="width: 15%"><?php echo $trans->getTrans($_REQUEST["action"],'ACTIONS'); ?></th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 12px;">
                                <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                                <?php foreach ( $response["values"] as $register) : $count++; ?>
                                    <tr>
                                        <td id="s<?php echo $count; ?>"><?php echo $count; ?></td>
                                        <td class="query"><a href="<?php echo VHL_SEARCH_PORTAL_DOMAIN.'/portal/?q='.$register['query']; ?>" target="_blank"><?php echo CharTools::shortenedQueryString($register['query'], false); ?></a></td>
                                        <td class="filter"><?php echo CharTools::shortenedQueryString($register['filter'], false); ?></td>
                                        <td class="center-align search-actions">
                                            <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
                                            <a href="#!" id="v<?php echo $count; ?>" class="btn1 waves-effect blue darken-4 tooltipped search-query portal" value="portal" data-query="<?php echo $register['query']; ?>" data-filter="<?php echo $register['filter']; ?>" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'VIEW'); ?>" onclick="__gaTracker('send','event','VHL Search History','Show Result','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="material-icons left">search</i></a>
                                            <?php else : ?>
                                            <a href="#!" id="v<?php echo $count; ?>" class="btn1 waves-effect blue darken-4 tooltipped search-query search" value="<?php echo $_SESSION['iahx']; ?>" data-label="<?php echo $label; ?>" data-query="<?php echo $register['query']; ?>" data-filter="<?php echo $register['filter']; ?>" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'VIEW'); ?>" onclick="__gaTracker('send','event','VHL Search History','Show Result','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="material-icons left">search</i></a>
                                            <?php endif; ?>
                                            <a href="#modal-combine" id="c<?php echo $count; ?>" class="btn1 waves-effect blue darken-2 tooltipped modal-trigger combine" data-query="<?php echo $register['query']; ?>" data-filter="<?php echo $register['filter']; ?>" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'COMBINE'); ?>" onclick="__gaTracker('send','event','VHL Search History','Combine Queries','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="material-icons left">shuffle</i></a>
                                            <a href="#modal-remove-search" id="d<?php echo $count; ?>" class="btn1 waves-effect red darken-4 tooltipped modal-trigger remove" data-source="<?php echo $location.'/task/delete/?query='.$register['query'].'&filter='.$register['filter']; ?>" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'REMOVE'); ?>" onclick="__gaTracker('send','event','VHL Search History','Delete Query','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="material-icons left">delete</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table><br />
                        <?php if ( $objPaginator->totalPages > 1 ) { echo $objPaginator->build(); } ?>
                    </section>
                <?php else : ?>
                    <?php if ( isset($output['multipage']) ) : ?>
                        <section class="box1">
                            <table class="highlight">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="query" style="width: 40%"><?php echo $trans->getTrans($_REQUEST["action"],'QUERY'); ?></th>
                                        <th class="filter" style="width: 40%"><?php echo $trans->getTrans($_REQUEST["action"],'FILTERS'); ?></th>
                                        <th class="center-align" style="width: 15%"><?php echo $trans->getTrans($_REQUEST["action"],'ACTIONS'); ?></th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px;">
                                    <tr>
                                        <td id="s1">1</td>
                                        <td class="query">health</td>
                                        <td class="filter">db:("MEDLINE")</td>
                                        <td class="center-align search-actions">
                                            <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
                                            <a href="#!" id="v1" class="btn1 waves-effect blue darken-4 tooltipped search-query portal" value="portal" data-query="health" data-filter="db:('MEDLINE')" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'VIEW'); ?>"><i class="material-icons left">search</i></a>
                                            <?php else : ?>
                                            <a href="#!" id="v1" class="btn1 waves-effect blue darken-4 tooltipped search-query search" value="<?php echo $_SESSION['iahx']; ?>" data-label="<?php echo $label; ?>" data-query="health" data-filter="db:('MEDLINE')" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'VIEW'); ?>"><i class="material-icons left">search</i></a>
                                            <?php endif; ?>
                                            <a href="#modal-combine" id="c1" class="btn1 waves-effect blue darken-2 tooltipped modal-trigger combine" data-query="health" data-filter="db:('MEDLINE')" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'COMBINE'); ?>"><i class="material-icons left">shuffle</i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="s2">2</td>
                                        <td class="query">salud</td>
                                        <td class="filter">db:("LILACS")</td>
                                        <td class="center-align search-actions">
                                            <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
                                            <a href="#!" id="v2" class="btn1 waves-effect blue darken-4 tooltipped search-query portal" value="portal" data-query="salud" data-filter="db:('LILACS')" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'VIEW'); ?>"><i class="material-icons left">search</i></a>
                                            <?php else : ?>
                                            <a href="#!" id="v2" class="btn1 waves-effect blue darken-4 tooltipped search-query search" value="<?php echo $_SESSION['iahx']; ?>" data-label="<?php echo $label; ?>" data-query="salud" data-filter="db:('LILACS')" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'VIEW'); ?>"><i class="material-icons left">search</i></a>
                                            <?php endif; ?>
                                            <a href="#modal-combine" id="c2" class="btn1 waves-effect blue darken-2 tooltipped modal-trigger combine" data-query="salud" data-filter="db:('LILACS')" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'COMBINE'); ?>"><i class="material-icons left">shuffle</i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="s3">3</td>
                                        <td class="query">saúde</td>
                                        <td class="filter">db:("BDENF")</td>
                                        <td class="center-align search-actions">
                                            <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
                                            <a href="#!" id="v3" class="btn1 waves-effect blue darken-4 tooltipped search-query portal" value="portal" data-query="saúde" data-filter="db:('BDENF')" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'VIEW'); ?>"><i class="material-icons left">search</i></a>
                                            <?php else : ?>
                                            <a href="#!" id="v3" class="btn1 waves-effect blue darken-4 tooltipped search-query search" value="<?php echo $_SESSION['iahx']; ?>" data-label="<?php echo $label; ?>" data-query="saúde" data-filter="db:('BDENF')" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'VIEW'); ?>"><i class="material-icons left">search</i></a>
                                            <?php endif; ?>
                                            <a href="#modal-combine" id="c3" class="btn1 waves-effect blue darken-2 tooltipped modal-trigger combine" data-query="saúde" data-filter="db:('BDENF')" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'COMBINE'); ?>"><i class="material-icons left">shuffle</i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    <?php else : ?>
                        <div class="card-panel center-align">
                            <span class="blue-text text-darken-2"><?php echo $trans->getTrans($_REQUEST["action"],'MY_SEARCHES_NO_REGISTERS_FOUND'); ?></span>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php require_once(dirname(__FILE__)."/info.tpl.php"); ?>
        <?php require_once(dirname(__FILE__)."/more.tpl.php"); ?>
    </div>
    <!-- Modal Combine -->
    <div id="modal-combine" class="modal bottom-sheet color2">
        <div class="modal-content">
            <div class="container">
                <div id="combine-header">
                    <h5><?php echo $trans->getTrans($_REQUEST["action"],'COMBINE'); ?></h5>
                    <a href="#" id="btnAnd" class="btn1 waves-effect blue darken-4 btnOperator">AND</a>
                    <a href="#" id="btnOr" class="btn1 waves-effect blue darken-4 btnOperator">OR</a>
                    <a href="#" id="btnAndNot" class="btn1 waves-effect blue darken-4 btnOperator">AND NOT</a>
                    <a href="#" id="Fechar" class="btn1 waves-effect red darken-4 modal-close"><?php echo ucfirst($trans->getTrans($_REQUEST["action"],'CLOSE')); ?></a>
                    <br /><br />
                    <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
                    <form id="combine-form" class="row pm0" action="<?php echo VHL_SEARCH_PORTAL_DOMAIN.'/portal/'; ?>" method="get" target="_blank">
                    <?php else : ?>
                    <form id="combine-form" class="row pm0" action="<?php echo $_SESSION['iahx']; ?>" method="get" target="_blank">
                    <?php endif; ?>
                        <div class="col s9 m8 l7 input-field pm0">
                            <input id="combine-q" name="q" type="text" class="pm1 inputHeader" autocomplete="off" value="">
                        </div>
                        <div class="col s3 m4 l5" id="boxbtSearchModal">
                            <button id="btSearchModal" class="btn btnSuccess disabled"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div id="combine-more">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="query" style="width: 45%"><?php echo $trans->getTrans($_REQUEST["action"],'QUERY'); ?></th>
                                <th class="filter" style="width: 45%"><?php echo $trans->getTrans($_REQUEST["action"],'FILTERS'); ?></th>
                                <th class="right-align"></th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;">
                            <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                            <?php foreach ( $response["values"] as $register) : $count++; ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td class="query"><?php echo CharTools::shortenedQueryString($register['query'], false); ?></td>
                                    <td class="filter"><?php echo CharTools::shortenedQueryString($register['filter'], false); ?></td>
                                    <td class="right-align search-actions">
                                        <a href="#!" class="btn1 btnCombine waves-effect blue darken-2 tooltipped" data-query="<?php echo $register['query']; ?>" data-filter="<?php echo $register['filter']; ?>" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'COMBINE'); ?>" onclick="__gaTracker('send','event','VHL Search History','Combine Queries','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="material-icons left">shuffle</i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Excluir Item -->
    <div id="modal-remove-search" class="modal">
        <div class="modal-content">
            <h4><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_SEARCH'); ?></h4>
            <p class="center-align">
                <?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_SEARCH_CONFIRM'); ?>:<br />
                <b id="search-query"></b>
            </p>
            <div class="divider"></div><br />
            <div class="center-align">
                <a href="#!" class="btn btnPrimary modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CANCEL'); ?></a>
                <a id="search-query-url" href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE'); ?></a>
            </div>
        </div>
    </div>
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
    <?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>