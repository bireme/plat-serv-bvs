<?php
    if ( in_array( $_REQUEST["task"], array( 'rate', 'delete' ) ) )
        header("Location: " . $_SERVER['HTTP_REFERER']);
?>

        <?require_once(dirname(__FILE__)."/header.tpl.php");?>
        <?require_once(dirname(__FILE__)."/sidebar.tpl.php");?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 fav-links">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans($_REQUEST["action"],'MY_LINKS')?></h2>
                    <div class="toggle_icons">
                      <a id="toggle_list">
                        <i class="fa fa-bars"></i>
                        <i class="fa fa-list"></i>
                      </a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="step30" class="col-md-9 col-sm-9 col-xs-12 col-list">
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
                                <?php foreach ( $response["values"] as $register) : ?>
                                <tr>
                                  <td>
                                    <div class="rank">
                                        <?if ($register["rate"] >= 1){?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/0"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/1"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                        <?if ($register["rate"] >= 2){?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/1"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/2"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                        <?if ($register["rate"] >= 3){?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/2"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/3"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                        <?if ($register["rate"] >= 4){?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/3"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/4"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                        <?if ($register["rate"] >= 5){?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/4"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/5"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                    </div>
                                    <div>
                                        <?php echo $register["name"]; ?>
                                        <a class="fav-link" href="<?php echo $register["url"]; ?>" target="_blank" style="display: block;"><i class="fa fa-external-link-square"></i> <?php echo $register["url"]; ?></a>
                                        <small style="display: block;"><?php echo $register["description"]; ?></small>
                                    </div>
                                    <div>
                                        <a class="remove" href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/delete/link/<?=$register["linkID"]?>" onclick="__gaTracker('send','event','Favorite Links','Remove Link','<?php echo $register["url"]; ?>');"><span class="label label-danger"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_LINK')?></span></a>
                                        <a class="edit" href="javascript:;" onclick="__gaTracker('send','event','Favorite Links','Edit Link','<?php echo $register["url"]; ?>'); window.open('<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/edit/link/<?=$register["linkID"]?>','','resizable=no,scrollbars=1,width=420,height=385')"><span class="label label-info"><?=$trans->getTrans($_REQUEST["action"],'EDIT_LINK')?></span></a>
                                    </div>
                                    <!--div>
                                      <span class="label label-default">Default</span>
                                      <span class="label label-primary">Primary</span>
                                      <span class="label label-success">Success</span>
                                      <span class="label label-info">Info</span>
                                      <span class="label label-warning">Warning</span>
                                      <span class="label label-danger">Danger</span>
                                    </div-->
                                  </td>
                                </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                            <!-- end project list -->
                            <?php
                                if ( $objPaginator->totalPages > 1 ) {
                                    echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS'));
                                }
                            ?>
                        <?php else : ?>
                            <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'MY_LINKS_NO_REGISTERS_FOUND')?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 col-filter">
                        <section id="step31" class="panel panel-folder">
                            <div class="panel-body">
                                <h5><?=$trans->getTrans($_REQUEST["action"],'TOOLS')?></h5>
                                <ul class="list-docs-unstyled project_files">
                                    <li><a href="javascript:;" onclick="window.open('<?=RELATIVE_PATH?>/controller/mylinks/control/view/task/add','','resizable=no,width=420,height=385')"><i class="fa fa-plus-circle"></i><?=ucfirst($trans->getTrans($_REQUEST["action"],'ADD_LINK'))?></a></li>
                                </ul>
                            </div>
                        </section>
                        <section id="step32" class="panel panel-folder">
                            <div class="panel-body">
                                <h5><?=$trans->getTrans($_REQUEST["action"],'SHOW_BY')?></h5>
                                <ul class="list-docs-unstyled project_files">
                                  <li><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/sort/date"><?=$trans->getTrans($_REQUEST["action"],'DATE')?></a></li>
                                  <li><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/sort/rate"><?=$trans->getTrans($_REQUEST["action"],'MY_RANK')?></a></li>
                              </ul>
                            </div>
                        </section>
                    </div>
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

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>