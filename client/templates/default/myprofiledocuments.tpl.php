<?php
    if ( 'rate' == $_REQUEST["task"] )
        header("Location: " . $_SERVER['HTTP_REFERER']);
    if ( 'delete' == $_REQUEST["task"] )
        header("Location: ".RELATIVE_PATH.'/controller/myprofiledocuments/control/business');
?>
	<?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/sidebar.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/nav.tpl.php"); ?>
	<div id="wrap">
		<div class="row">
			<div class="col m12 ">
				<div class="box1">
					<div data-target="modal-alert" class="modal-trigger" style="cursor: pointer;"><i class="fas fa-info-circle fa-lg right"></i></div>
					<h5 class="title1"><i class="fas fa-folder left"></i> <?php echo $trans->getTrans($_REQUEST["action"],'MY_PROFILES'); ?></h5>
					<div class="divider"></div>
					<div class="row">
                        <?php if ( $responseProfile["values"] ) : ?>
                            <?php $registerProfile = $responseProfile["values"][0]; ?>
    						<div class="col s12 m6">
    							<div class="tituloDropdown"><?php echo $trans->getTrans($_REQUEST["action"],'PROFILE'); ?>: <b class="topictitle"><?php echo $registerProfile["profileName"]; ?></b>
    								<!-- Dropdown Trigger -->
    								<a class='dropdown-trigger btn2 btnSuccess' href='#' data-target='profile-actions'><i class="fas fa-angle-down"></i></a>
    								<!-- Dropdown Structure -->
    								<ul id='profile-actions' class='dropdown-content'>
                                        <li><a class="modal-trigger modal-ajax" href="#modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/myprofiledocuments/control/business/task/edit/profile/<?php echo $registerProfile["profileID"]; ?>" onclick="__gaTracker('send','event','Interest Topics','Edit Topic','<?php echo htmlspecialchars($registerProfile["profileName"]); ?>');"><i class="far fa-edit right m1"></i> <?php echo $trans->getTrans($_REQUEST["action"],'EDIT_PROFILE'); ?></a></li>
                                        <li><a class="modal-trigger remove" href="#modal-remove-topic" data-source="<?php echo RELATIVE_PATH; ?>/controller/myprofiledocuments/control/business/task/delete/profile/<?php echo $registerProfile["profileID"]; ?>" onclick="__gaTracker('send','event','Interest Topics','Remove Topic','<?php echo htmlspecialchars($registerProfile["profileName"]); ?>');"><i class="fas fa-eraser right m1"></i> <?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_PROFILE'); ?></a></li>
    								</ul>
    							</div>
    						</div>
                        <?php endif; ?>
						<div class="col s12 m6">
							<div class="tituloDropdown"><b><?php echo ucwords($trans->getTrans($_REQUEST["action"],'TOOLS')); ?></b>
								<!-- Dropdown Trigger -->
								<a class='dropdown-trigger btn2 btnSuccess' href='#' data-target='profile-list'><i class="fas fa-angle-down"></i></a>
								<!-- Dropdown Structure -->
								<ul id='profile-list' class='dropdown-content'>
                                    <li><a href="#modal-ajax" class="modal-trigger modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/myprofiledocuments/control/view/task/add"><i class="material-icons right m1">add</i> <?php echo $trans->getTrans($_REQUEST["action"],'ADD_PROFILE'); ?></a></li>
									<li class="divider"></li>
                                    <?php if ( $response["values"] ) : ?>
                                        <?php foreach ($response["values"] as $register) : ?>
                                            <li><a href="<?php echo RELATIVE_PATH; ?>/controller/myprofiledocuments/control/business/profile/<?php echo $register["profileID"]; ?>"><?php if ( $register["profileDefault"] == 1 ) : ?><i class="material-icons right m1">star_border</i><?php endif; ?> <?php echo $register["profileName"]; ?></a></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<section class="row themes">
                    <?php if ( $responseProfile["values"] ) : ?>
                        <?php if ( 'on' == $responseSimilarDocs["values"]['status'] ) : $count = 0; ?>
                            <?php foreach ( $responseSimilarDocs["values"]['similars'] as $similar ) : $count++; ?>
        						<article id="<?php echo 'doc'.$count; ?>" class="col s12 l6 xl4">
        							<div class="box2 hoverable">
                                        <div class="box2P record">
                                            <a class="doctitle" href="<?php echo $similar["docURL"]; ?>" onclick="__gaTracker('send','event','Interest Topics','View Document','<?php echo addslashes(htmlspecialchars($similar["title"])); ?>');" target="_blank"><?php echo $similar["title"]; ?></a><br />
            								<div class="boxAutor"><?php echo $similar["authors"]; ?></div>
                                        </div>
        								<div class="btn2Botoes">
                                            <a href="#modal-ajax" class="btn3 btnSuccess modal-trigger modal-ajax add-collection" data-similar="<?php echo $similar["docID"]; ?>" data-source="<?php echo RELATIVE_PATH; ?>/controller/myprofiledocuments/control/business/task/addcol/similar/doc<?php echo $count; ?>" onclick="__gaTracker('send','event','Interest Topics','Favorite Documents','<?php echo htmlspecialchars($similar["title"]); ?>');"><?=$trans->getTrans($_REQUEST["action"],'ADD_COLLECTION')?></a>
                                            <a href="#modal-related-docs" class="btn3 btnPrimary modal-trigger related-docs" onclick="__gaTracker('send','event','Interest Topics','Related Documents','<?php echo addslashes(htmlspecialchars($similar["title"])); ?>');"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS'); ?></a>
        								</div>
        							</div>
        						</article>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php if ( 'none' == $responseSimilarDocs["values"]['status'] ) : ?>
                                <div class="card-panel center-align">
                                    <span class="blue-text text-darken-2"><?php echo $trans->getTrans($_REQUEST["action"],'MY_PROFILES_NO_SUGGESTIONS_FOUND'); ?></span>
                                </div>
                            <?php else : ?>
                                <div class="card-panel center-align">
                                    <span class="blue-text text-darken-2"><?php echo $trans->getTrans($_REQUEST["action"],'SERVICE_TEMPORARY_UNAVAILABLE'); ?></span>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <div class="card-panel center-align">
                            <span class="blue-text text-darken-2"><?php echo $trans->getTrans($_REQUEST["action"],'MY_PROFILES_NO_REGISTERS_FOUND'); ?></span>
                        </div>
                    <?php endif; ?>
				</section>
				<?php // if ( $objPaginator->totalPages > 1 ) { echo $objPaginator->build(); } ?>
			</div>
		</div>
		<?php require_once(dirname(__FILE__)."/info.tpl.php"); ?>
        <?php require_once(dirname(__FILE__)."/more.tpl.php"); ?>
	</div>
	<!--- Modal Ajax -->
    <div id="modal-ajax" class="modal"></div>
    <!-- Modal Alert -->
	<div id="modal-alert" class="modal">
		<div class="modal-content">
            <div><?php echo $trans->getTrans($_REQUEST["action"],'ALERT'); ?></div>
			<div><?php echo $trans->getTrans($_REQUEST["action"],'UPDATE_ALERT'); ?></div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat"><?php echo $trans->getTrans($_REQUEST["action"],'CLOSE'); ?></a>
		</div>
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
    <!-- Modal Excluir Tema -->
    <div id="modal-remove-topic" class="modal">
        <div class="modal-content">
            <h4><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_TOPIC'); ?></h4>
            <p class="center-align">
                <?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_TOPIC_CONFIRM'); ?>:<br />
                <b id="topic-title"></b>
            </p>
            <div class="divider"></div><br />
            <div class="center-align">
                <a href="#!" class="btn btnPrimary modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CANCEL'); ?></a>
                <a id="topic-url" href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE'); ?></a>
            </div>
        </div>
    </div>
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
    <?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>