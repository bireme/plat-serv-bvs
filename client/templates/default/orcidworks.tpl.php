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
                    <h2><?=$trans->getTrans($_REQUEST["action"],'ORCID_WORKS')?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
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
                            <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                            <?php foreach ( $response["values"] as $register) : $count++; ?>
                            <tr>
                              <td id="ow<?php echo $count; ?>">
                                <?php if ( $register["docURL"] ) : ?>
                                  <a href="<?php echo $register["docURL"]; ?>" target="_blank"><?php echo $register["title"]; ?></a>
                                <?php else : ?>
                                  <?php echo $register["title"]; ?>
                                <?php endif; ?>
                                <small style="display: block;"><?php echo implode("; ", $register["authors"]); ?></small>
                              </td>
                              <td style="text-align: right;">
                                <button class="btn btn-success btn-xs"><?=$trans->getTrans($_REQUEST["action"],'GOOGLE_SCHOLAR')?></button>
                              </td>
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                        <!-- end project list -->
                        <?php echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                    <?php else : ?>
                        <p><?=$trans->getTrans($_REQUEST["action"],'ORCID_WORKS_NO_REGISTERS_FOUND')?></p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>