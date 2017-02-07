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
                    <h2><?=$trans->getTrans('menu','MY_SEARCHES')?></h2>
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
                              <th style="width: 35%">Query</th>
                              <th style="width: 35%">Filters</th>
                              <th style="width: 20%">Actions</th>
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
                                <button id="v<?php echo $count; ?>" class="btn btn-primary btn-xs search" value="<?php echo $register['site']; ?>"><i class="fa fa-search search"></i> View</button>
                                <button id="c<?php echo $count; ?>" class="btn btn-info btn-xs combine"><i class="fa fa-compress combine"></i> Combine</button>
                              </td>
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        <!-- end project list -->
                        <?php echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                    <?php else : ?>
                        <p><?=$trans->getTrans($_REQUEST["action"],'MY_SEARCHES_NO_REGISTERS_FOUND')?></p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>