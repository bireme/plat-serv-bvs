        <?require_once(dirname(__FILE__)."/header.tpl.php");?>
        <?require_once(dirname(__FILE__)."/sidebar.tpl.php");?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans($_REQUEST["action"],'MY_SEARCHES')?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $response["values"] != false ) : ?>
                        <?php //echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                        <!-- start project list -->
                        <table class="table table-striped table-list">
                          <thead>
                            <tr>
                              <th style="width: 10%">#</th>
                              <th style="width: 35%"><?=$trans->getTrans($_REQUEST["action"],'QUERY')?></th>
                              <th style="width: 35%"><?=$trans->getTrans($_REQUEST["action"],'FILTERS')?></th>
                              <th style="width: 20%"><?=$trans->getTrans($_REQUEST["action"],'ACTIONS')?></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                            <?php foreach ( $response["values"] as $register) : $count++; ?>
                            <tr>
                              <td id="s<?php echo $count; ?>"><?php echo $count; ?></td>
                              <td class="query"><?php echo $register['query']; ?></td>
                              <td class="filter"><?php echo $register['filter']; ?></td>
                              <td>
                                <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
                                <button id="v<?php echo $count; ?>" class="btn btn-primary btn-xs portal" value="portal"><i class="fa fa-search"></i> <?=$trans->getTrans($_REQUEST["action"],'VIEW')?></button>
                                <?php else : ?>
                                <button id="v<?php echo $count; ?>" class="btn btn-primary btn-xs search" value="<?php echo $_SESSION['iahx']; ?>" data-label="<?php echo $label; ?>"><i class="fa fa-search search"></i> <?=$trans->getTrans($_REQUEST["action"],'VIEW')?></button>
                                <?php endif; ?>
                                <button id="c<?php echo $count; ?>" class="btn btn-info btn-xs combine"><i class="fa fa-compress combine"></i> <?=$trans->getTrans($_REQUEST["action"],'COMBINE')?></button>
                              </td>
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        <!-- end project list -->
                        <?php echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                    <?php else : ?>
                        <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'MY_SEARCHES_NO_REGISTERS_FOUND')?></p>
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
            function startIntro(){
              var intro = introJs();
                intro.setOptions({
                  doneLabel: "<?=$trans->getTrans('menu','NEXT_PAGE')?>",
                  prevLabel: "<?=$trans->getTrans('menu','BACK')?>",
                  nextLabel: "<?=$trans->getTrans('menu','NEXT')?>",
                  skipLabel: "<?=$trans->getTrans('menu','SKIP')?>",
                  exitOnOverlayClick: false,
                  steps: [
                    {
                      element: '#step15',
                      intro: "Histórico de Buscas na BVS",
                      position: 'right'
                    },
                    {
                      intro: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mattis libero ut condimentum commodo. Pellentesque pellentesque lorem pellentesque, lobortis turpis sed, interdum velit. Integer ac massa sed nulla accumsan interdum."
                    }
                  ]
                });

                intro.start().oncomplete(function() {
                  window.location.href = '<?php echo RELATIVE_PATH."/controller/mylinks/control/business/?multipage=true"; ?>';
                });
            }
            
            startIntro();
          }
        </script>

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>