<?php
    if ( in_array( $_REQUEST["task"], array( 'rate', 'delete' ) ) )
        header("Location: " . $_SERVER['HTTP_REFERER']);
?>
    <?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/sidebar.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/nav.tpl.php"); ?>
    <div id="wrap">
        <div class="row">
            <div class="col m12 ">
                <div class="box1">
                    <h5 class="title"><i class="fas fa-link left"></i> <?php echo $trans->getTrans($_REQUEST["action"],'MY_LINKS'); ?></h5>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col s12">
                            <div class="tituloDropdown">
                                <b><?php echo $trans->getTrans($_REQUEST["action"],'TOOLS'); ?></b>
                                <!-- Dropdown Trigger -->
                                <a class='dropdown-trigger btn2 btnSuccess' href='#' data-target='dropdown1'><i class="fas fa-angle-down"></i></a>
                                <!-- Dropdown Structure -->
                                <ul id='dropdown1' class='dropdown-content'>
                                    <li><a href="#modal-ajax" class="modal-trigger modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/mylinks/control/view/task/add"><i class="material-icons right m1">add</i> <?php echo $trans->getTrans($_REQUEST["action"],'ADD_LINK'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="row">
                    <?php if ( $response["values"] != false ) : ?>
                        <?php foreach ( $response["values"] as $register) : ?>
                            <article class="col s12">
                                <div class="box5 hoverable">
                                    <!-- Limitar duas linhas -->
                                    <b><?php echo $register["name"]; ?></b><br />
                                    <div class="linkBreak">
                                        <a href="<?php echo $register["url"]; ?>" target="_blank"><?php echo $register["url"]; ?></a><br />
                                        <small><?php echo $register["description"]; ?></small>
                                    </div>
                                    <div class="btn2Botoes">
                                        <a href="#modal-remove-link" class="btn3 btnDanger modal-trigger remove" data-source="<?php echo RELATIVE_PATH; ?>/controller/mylinks/control/business/task/delete/link/<?php echo $register["linkID"]; ?>" data-title="<?php echo $register["name"]; ?>" onclick="__gaTracker('send','event','Favorite Links','Remove Link','<?php echo $register["url"]; ?>');"><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_LINK'); ?></a>
                                        <a href="#modal-ajax" class="btn3 btnWarning modal-trigger modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/mylinks/control/business/task/edit/link/<?php echo $register["linkID"]; ?>" onclick="__gaTracker('send','event','Favorite Links','Edit Link','<?php echo $register["url"]; ?>');"><i class="far fa-edit right m1"></i><?php echo $trans->getTrans($_REQUEST["action"],'EDIT_LINK'); ?></a>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="card-panel center-align">
                            <span class="blue-text text-darken-2"><?php echo $trans->getTrans($_REQUEST["action"],'MY_LINKS_NO_REGISTERS_FOUND'); ?></span>
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
    <!--- Modal Ajax -->
    <div id="modal-ajax" class="modal"></div>
    <!-- Modal Excluir Link -->
    <div id="modal-remove-link" class="modal">
        <div class="modal-content">
            <h4><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_LINK'); ?></h4>
            <p class="center-align">
                <?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_LINK_CONFIRM'); ?>:<br />
                <b id="doc-title"></b>
            </p>
            <div class="divider"></div><br />
            <div class="center-align">
                <a href="#!" class="btn btnPrimary modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CANCEL'); ?></a>
                <a id="doc-url" href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE'); ?></a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
      if (RegExp('multipage', 'gi').test(window.location.search)) {
        var steps = [
          {
            element: 'li.side.step29',
            intro: "<?=$trans->getTrans('tour','STEP_29')?>",
            position: 'right'
          },
          {
            element: 'li.child.step29',
            intro: "<?=$trans->getTrans('tour','STEP_29')?>",
            position: 'right'
          },
          {
            element: '#step30',
            intro: "<?=$trans->getTrans('tour','STEP_30')?>",
            position: 'left'
          },
          {
            element: '#step31',
            intro: "<?=$trans->getTrans('tour','STEP_31')?>",
            position: 'left'
          },
          {
            element: '#step32',
            intro: "<?=$trans->getTrans('tour','STEP_32')?>",
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
                    case 'step30':
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
              window.location.href = '<?php echo RELATIVE_PATH."/controller/orcidworks/control/business/?multipage=true"; ?>';
            });
        }
        
        window.addEventListener('load', function() {
            startIntro();
        });
      }
    </script>
    <?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>