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
    <?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/sidebar.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/nav.tpl.php"); ?>
    <div id="wrap">
        <div class="row">
            <!-- Inicio Caixas -->
            <article class="col s12 m6 l4 widget">
                <div class="card sticky-action">
                    <div class="card-image waves-effect waves-block waves-black">
                        <img class="activator" src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/favoritos-<?php echo $_SESSION["lang"]; ?>.jpg" alt="Título Documentos Favoritos">
                    </div>
                    <div class="card-action">
                        <a href="<?php echo RELATIVE_PATH; ?>/controller/mydocuments/control/business" onclick="__gaTracker('send','event','Overview','Favorite Documents','See All');"><b><?php echo $trans->getTrans($_REQUEST["action"],'MORE'); ?> [+]</b></a>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?php echo $trans->getTrans('menu','SHELF_WIDGET'); ?><i class="material-icons right">close</i></span>
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
                                <p><a href="<?php echo $docURL; ?>" class="record" target="_blank" onclick="__gaTracker('send','event','Overview','Favorite Documents','<?php echo htmlspecialchars($col['title']); ?>');"><?php echo $col['title'] ?></a></p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            <article class="col s12 m6 l4 widget">
                <div class="card sticky-action">
                    <div class="card-image waves-effect waves-block waves-black">
                        <img class="activator" src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/interesse-<?php echo $_SESSION["lang"]; ?>.jpg" alt="Título Temas de Interesses">
                    </div>
                    <div class="card-action">
                        <a href="<?php echo RELATIVE_PATH; ?>/controller/myprofiledocuments/control/business" onclick="__gaTracker('send','event','Overview','Interest Topics','See All');"><b><?php echo $trans->getTrans($_REQUEST["action"],'MORE'); ?> [+]</b></a>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?php echo $trans->getTrans('menu','PROFILE_WIDGET'); ?><i class="material-icons right">close</i></span>
                        <?php if ( $profiles ) : ?>
                            <?php foreach ( $profiles as $profile ) : ?>
                                <p><a href="<?php echo RELATIVE_PATH.'/controller/myprofiledocuments/control/business/profile/'.$profile["profileID"]; ?>" onclick="__gaTracker('send','event','Overview','Interest Topics','<?php echo htmlspecialchars($profile['profileName']); ?>');"><i class="fas fa-folder-open"></i> <?php echo $profile['profileName']; ?></a></p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            <article class="col s12 m6 l4 widget">
                <div class="card sticky-action">
                    <div class="card-image waves-effect waves-block waves-black">
                        <img class="activator" src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/historico-<?php echo $_SESSION["lang"]; ?>.jpg"  alt="Título Histórico de Buscas">
                    </div>
                    <div class="card-action">
                        <a href="<?php echo RELATIVE_PATH; ?>/controller/mysearches/control/business" onclick="__gaTracker('send','event','Overview','VHL Search History','See All');"><b><?php echo $trans->getTrans($_REQUEST["action"],'MORE'); ?> [+]</b></a>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?php echo $trans->getTrans($_REQUEST["action"],'SEARCH_WIDGET'); ?><i class="material-icons right">close</i></span>
                        <?php if ( $searches ) : $count = 0; ?>
                            <?php foreach ( $searches as $search ) : $count++; ?>
                                <p>
                                    <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
                                        <a id="v<?php echo $count; ?>" class="portal" value="portal" data-query="<?php echo $search['query']; ?>" data-filter="<?php echo $search['filter']; ?>" onclick="__gaTracker('send','event','Overview','VHL Search History','<?php echo htmlspecialchars($search['query']); ?>');"><i class="fas fa-search"></i> <?php echo CharTools::shortenedQueryString($search['query'], true); ?></a>
                                    <?php else : ?>
                                        <a id="v<?php echo $count; ?>" class="search" value="<?php echo $_SESSION['iahx']; ?>" data-label="<?php echo $label; ?>" data-query="<?php echo $search['query']; ?>" data-filter="<?php echo $search['filter']; ?>" onclick="__gaTracker('send','event','Overview','VHL Search History','<?php echo htmlspecialchars($search['query']); ?>');"><i class="fas fa-search"></i> <?php echo CharTools::shortenedQueryString($search['query'], true); ?></a>
                                   <?php endif; ?>
                                </p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            <!-- Inicio Caixas -->
            <div class="clearfix"></div>
            <!-- Parte 2 -->
            <section class="col s12">
                <div class="box1">
                    <h5>
                        <?php echo $trans->getTrans($_REQUEST["action"],'INFO_WIDGET'); ?>
                        <span id="btnClose" class="btn btnSuccess" style="padding: 0 3px;" ><i class="arrowClose material-icons <?php if ( isset($_COOKIE['hide_info']) && "on" == $_COOKIE['hide_info'] ) { echo "btnClose2"; } ?>">keyboard_arrow_up</i></span>
                    </h5>
                    <div class="divider"></div><br />
                    <div class="row" id="interessar" <?php if ( isset($_COOKIE['hide_info']) && "on" == $_COOKIE['hide_info'] ) { echo 'style="display: none;"'; } ?>>
                        <div class="col s12 l6 xl4 p1">
                            <h6><b><?php echo $trans->getTrans($_REQUEST["action"],'DOCUMENTS'); ?></b><a class="modal-trigger" href="#modal-suggestions"  title="Widget Info"><i class="fas fa-info-circle widget-info"></i></a></h6>
                            <div class="divider"></div>
                            <ul class="lista1">
                                <?php if ( $suggestedDocs ) : ?>
                                    <?php foreach ( $suggestedDocs as $docs ) : ?>
                                        <li><a href="<?php echo $docs['docURL'] ?>" target="_blank"><?php echo $docs['title'] ?></a></li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <?php echo $trans->getTrans($_REQUEST["action"],'SUGGESTIONS_NOT_FOUND'); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col s12 l6 xl4 p1">
                            <h6><b><?php echo $trans->getTrans($_REQUEST["action"],'EVENTS'); ?></b><a class="modal-trigger" href="#modal-events"  title="Widget Info"><i class="fas fa-info-circle widget-info"></i></a></h6>
                            <div class="divider"></div><br />
                            <?php if ( $events ) : ?>
                                <?php foreach ( $events as $event ) : ?>
                                    <?php $month = (int) substr($event->start_date, 5, 2); ?>
                                    <?php // $link = ( $event->link ) ? $event->link[0] : $DIREVE[$_SESSION['lang']] . 'resource/?id=' . $event->django_id; ?>
                                    <?php $link = $DIREVE[$_SESSION['lang']] . 'resource/?id=' . $event->django_id; ?>
                                    <article class="event">
                                        <a href="<?php echo $link; ?>" target="_blank">
                                            <div class="eventDate">
                                                <p class="eventMes"><?php echo Generic::month_name($month, TRUE); ?></p>
                                                <p class="eventDia"><?php echo substr($event->start_date, 8, 2); ?></p>
                                            </div>
                                            <div class="eventText"><?php echo $event->title; ?></div>
                                            <div class="clearfix"></div>
                                        </a>
                                    </article>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <?php echo $trans->getTrans($_REQUEST["action"],'EVENTS_NOT_FOUND'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="clearfix showMenor1200"></div>
                        <div class="col s12 l12 xl4 p1">
                            <div class="bannerHome">
                                <?php if ( $highlights ) : $count = 0; ?>
                                    <?php foreach ( $highlights as $slide ) : $count++; ?>
                                        <div class="bannerHomeInt"><a href="<?php echo $slide['link'] ?>" target="_blank"><img src="<?php echo $slide['image']; ?>" class="responsive-img" alt="Slide<?php echo $count; ?>"></a></div>
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- inicio multimidia -->
                        <div class="col s12"><br />
                            <div class="divider"></div>
                            <h6><b><?php echo $trans->getTrans($_REQUEST["action"],'MULTIMEDIA'); ?></b></h6>
                            <div class="row">
	                            <?php if ( $multimedia ) : ?>
	                                <?php foreach ( $multimedia as $media ) : $thumb = Multimedia::get_thumbnail($media); ?>
                                        <?php // $link = ( $media->link ) ? $media->link[0] : $MULTIMEDIA[$_SESSION['lang']] . 'resource/?id=' . $media->id; ?>
                                        <?php $link = $MULTIMEDIA[$_SESSION['lang']] . 'resource/?id=' . $media->id; ?>
			                            <div class="col s12 m4">
			                                <a href="<?php echo $link; ?>" target="_blank">
			                                    <p>
			                                        <span class="left"><img src="<?php echo Multimedia::get_thumbnail($media); ?>" alt="" style="padding: 0 20px 5px 0px"></span>
			                                        <?php if ( strlen($media->title) > 50 ) : ?>
			                                        	<b class="media-title"><?php echo mb_substr($media->title, 0, 50) . '...'; ?></b>
			                                        <?php else : ?>
			                                        	<b class="media-title"><?php echo $media->title; ?></b>
			                                        <?php endif; ?>
			                                    </p>
			                                	<div class="clearfix"></div>
			                                    <div class="divider"></div>
			                                </a>
			                            </div>
			                        <?php endforeach; ?>
		                            <div class="col s12 center-align" id="verMaisMidia" >
		                                <a href="https://bvsalud.org/multimedia/?q=<?php echo urlencode($query); ?>" target="_blank"><?php echo $trans->getTrans($_REQUEST["action"],'SEE_MORE'); ?></a>
		                            </div>
		                        <?php else : ?>
		                        	<div class="col s12">
	                                	<?php echo $trans->getTrans($_REQUEST["action"],'MEDIA_NOT_FOUND'); ?>
	                            	</div>
	                            <?php endif; ?>
	                        </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php require_once(dirname(__FILE__)."/info.tpl.php"); ?>
        <?php require_once(dirname(__FILE__)."/more.tpl.php"); ?>
    </div>
    <!-- Modal Widget Eventos -->
    <div id="modal-events" class="modal">
        <div class="modal-content"><?php echo $trans->getTrans($_REQUEST["action"],'EVENTS_WIDGET_INFO'); ?></div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat"><?php echo $trans->getTrans($_REQUEST["action"],'CLOSE'); ?></a>
        </div>
    </div>
    <!-- Modal Widget Sugestões -->
    <div id="modal-suggestions" class="modal">
        <div class="modal-content"><?php echo $trans->getTrans($_REQUEST["action"],'SUGGESTIONS_WIDGET_INFO'); ?></div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat"><?php echo $trans->getTrans($_REQUEST["action"],'CLOSE'); ?></a>
        </div>
    </div>
    <?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>