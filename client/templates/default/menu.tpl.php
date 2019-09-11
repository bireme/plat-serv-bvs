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
			<article class="col s12 m6 l4">
				<div class="card sticky-action">
					<div class="card-image waves-effect waves-block waves-black">
						<img class="activator" src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/favoritos-<?php echo $_SESSION["lang"]; ?>.jpg" alt="Título Documentos Favoritos">
					</div>
					<div class="card-action">
						<a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business" onclick="__gaTracker('send','event','Overview','Favorite Documents','See All');"><b><?php echo $trans->getTrans($_REQUEST["action"],'MORE'); ?> [+]</b></a>
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
                                <p><a href="<?php echo $docURL; ?>" target="_blank" onclick="__gaTracker('send','event','Overview','Favorite Documents','<?php echo htmlspecialchars($col['title']); ?>');"><?php echo $col['title'] ?></a></p>
                            <?php endforeach; ?>
                        <?php endif; ?>
					</div>
				</div>
			</article>
			<article class="col s12 m6 l4">
				<div class="card sticky-action">
					<div class="card-image waves-effect waves-block waves-black">
						<img class="activator" src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/interesse-<?php echo $_SESSION["lang"]; ?>.jpg" alt="Título Temas de Interesses">
					</div>
					<div class="card-action">
						<a href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business" onclick="__gaTracker('send','event','Overview','Interest Topics','See All');"><b><?php echo $trans->getTrans($_REQUEST["action"],'MORE'); ?> [+]</b></a>
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
			<article class="col s12 m6 l4">
				<div class="card sticky-action">
					<div class="card-image waves-effect waves-block waves-black">
						<img class="activator" src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/historico-<?php echo $_SESSION["lang"]; ?>.jpg"  alt="Título Histórico de Buscas">
					</div>
					<div class="card-action">
						<a href="<?=RELATIVE_PATH?>/controller/mysearches/control/business" onclick="__gaTracker('send','event','Overview','VHL Search History','See All');"><b><?php echo $trans->getTrans($_REQUEST["action"],'MORE'); ?> [+]</b></a>
					</div>
					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4"><?php echo $trans->getTrans($_REQUEST["action"],'SEARCH_WIDGET'); ?><i class="material-icons right">close</i></span>
						<?php if ( $searches ) : ?>
							<?php foreach ( $searches as $search ) : $count++ ?>
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
						<span id="btnClose" class="btn btnSuccess" style="padding: 0 3px;" ><i class="arrowClose material-icons">keyboard_arrow_up</i></span>
					</h5>
					<div class="divider"></div><br />
					<div class="row" id="interessar">
						<div class="col s12 l6 xl4 p1">
							<h6><b><?php echo $trans->getTrans($_REQUEST["action"],'SUGGESTIONS'); ?></b></h6>
							<div class="divider"></div><br />
							<ul class="lista1">
								<li><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis vel, minima rem odit ipsa autem..</a></li>
								<li><a href="">Lorem ipsum dolor sit amet.</a></li>
								<li><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus reiciendis .</a></li>
								<li><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus reiciendis voluptate corporis dolores ad est in deserunt labore quod, sapiente, inventore nesciunt.</a></li>
								<li><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus reiciendis voluptate corporis dolores ad est in deserunt labore quod, sapiente, inventore nesciunt.</a></li>
							</ul>
						</div>
						<div class="col s12 l6 xl4 p1">
							<h6><b><?php echo $trans->getTrans($_REQUEST["action"],'EVENTS'); ?></b></h6>
							<div class="divider"></div><br />
							<article class="event">
								<a href="http://www.enfermeria2019.sld.cu/index.php/enfermeria/2019" target="_blank">
									<div class="eventDate">
										<p class="eventMes">JUL</p>
										<p class="eventDia">01</p>
									</div>
									<div class="eventText">
										9as. Jornadas Internacionales de Patología Cardiovascular Integrada
									</div>
									<div class="clearfix"></div>
								</a>
							</article>
							<article class="event">
								<a href="http://www.enfermeria2019.sld.cu/index.php/enfermeria/2019" target="_blank">
									<div class="eventDate">
										<p class="eventMes">AGO</p>
										<p class="eventDia">27</p>
									</div>
									<div class="eventText">
										VIII Congresso de Infecções Osteoarticulares do IOT
									</div>
									<div class="clearfix"></div>
								</a>
							</article>
							<article class="event">
								<a href="http://www.enfermeria2019.sld.cu/index.php/enfermeria/2019" target="_blank">
									<div class="eventDate">
										<p class="eventMes">DEZ</p>
										<p class="eventDia">20</p>
									</div>
									<div class="eventText">
										VI Congreso Nacional y V Internacional de Atención al Paciente con Heridas
									</div>
									<div class="clearfix"></div>
								</a>
							</article>
							<article class="event">
								<a href="http://www.enfermeria2019.sld.cu/index.php/enfermeria/2019" target="_blank">
									<div class="eventDate">
										<p class="eventMes">JAN</p>
										<p class="eventDia">11</p>
									</div>
									<div class="eventText">
										VI Congreso Nacional y V Internacional de Atención al Paciente con Heridas
									</div>
									<div class="clearfix"></div>
								</a>
							</article>
						</div>
						<div class="clearfix showMenor1200"></div>
						<div class="col s12 l12 xl4 p1">
							<div class="bannerHome">
								<div class="bannerHomeInt"><a href="" target="_blank"><img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/home1.jpg" class="responsive-img" alt="Banner1"></a></div>
								<div class="bannerHomeInt"><a href="" target="_blank"><img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/home2.jpg" class="responsive-img" alt="Banner2"></a></div>
								<div class="bannerHomeInt"><a href="" target="_blank"><img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/home3.jpg" class="responsive-img" alt="Banner3"></a></div>
								<div class="bannerHomeInt"><a href="" target="_blank"><img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/home4.jpg" class="responsive-img" alt="Banner4"></a></div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php require_once(dirname(__FILE__)."/info.tpl.php"); ?>
		<?php require_once(dirname(__FILE__)."/more.tpl.php"); ?>
	</div>
	<?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>