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
                                            <a href="#!" id="v<?php echo $count; ?>" class="btn1 waves-effect blue darken-4 tooltipped search-query portal" data-origin="portal" data-query="<?php echo $register['query']; ?>" data-filter="<?php echo $register['filter']; ?>" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'VIEW'); ?>" onclick="gtag('send','event','VHL Search History','Show Result','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="material-icons left">search</i></a>
                                            <?php else : ?>
                                            <a href="#!" id="v<?php echo $count; ?>" class="btn1 waves-effect blue darken-4 tooltipped search-query search" data-origin="<?php echo $_SESSION['iahx']; ?>" data-label="<?php echo $label; ?>" data-query="<?php echo $register['query']; ?>" data-filter="<?php echo $register['filter']; ?>" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'VIEW'); ?>" onclick="gtag('send','event','VHL Search History','Show Result','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="material-icons left">search</i></a>
                                            <?php endif; ?>
                                            <a href="#modal-combine" id="c<?php echo $count; ?>" class="btn1 waves-effect blue darken-2 tooltipped modal-trigger combine" data-query="<?php echo $register['query']; ?>" data-filter="<?php echo $register['filter']; ?>" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'COMBINE'); ?>" onclick="gtag('send','event','VHL Search History','Combine Queries','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="material-icons left">shuffle</i></a>
                                            <a href="#modal-remove-search" id="d<?php echo $count; ?>" class="btn1 waves-effect red darken-4 tooltipped modal-trigger remove" data-source="<?php echo $location.'/task/delete/?query='.$register['query'].'&filter='.$register['filter']; ?>" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'REMOVE'); ?>" onclick="gtag('send','event','VHL Search History','Delete Query','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="material-icons left">delete</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table><br />
                        <?php if ( $objPaginator->totalPages > 1 ) { echo $objPaginator->build(); } ?>
                    </section>
                <?php else : ?>
                    <div class="card-panel center-align">
                        <span class="blue-text text-darken-2"><?php echo $trans->getTrans($_REQUEST["action"],'MY_SEARCHES_NO_REGISTERS_FOUND'); ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="box1 video-box">
            <div class="row">
                <div class="col s12 m6 center-align">
                    <div class="box12">
                        <h6><b><?php echo $trans->getTrans('tutorial','MY_SEARCHES'); ?></b></h6>
                        <div class="video-container">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/XJoX65r6kRk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 center-align">
                    <div class="box12">
                        <h6><b><?php echo $trans->getTrans('tutorial','COMBINE_SEARCH'); ?></b></h6>
                        <div class="video-container">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/H7pqL_dkNTA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="center-align" id="verMaisMidia" >
                <a href="<?php echo RELATIVE_PATH; ?>/controller/tutorial/control/business"><?php echo $trans->getTrans('menu','SEE_MORE'); ?></a>
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
                                        <a href="#!" class="btn1 btnCombine waves-effect blue darken-2 tooltipped" data-query="<?php echo $register['query']; ?>" data-filter="<?php echo $register['filter']; ?>" data-position="top" data-tooltip="<?php echo $trans->getTrans($_REQUEST["action"],'COMBINE'); ?>" onclick="gtag('send','event','VHL Search History','Combine Queries','<?php echo htmlspecialchars($register["query"]); ?>');"><i class="material-icons left">shuffle</i></a>
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
    <?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>