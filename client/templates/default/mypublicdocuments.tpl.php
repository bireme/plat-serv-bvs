        <?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=RELATIVE_PATH?>/controller/authentication" class="site_title logo-md"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/logo-md-<?=$_SESSION["lang"]?>.png" alt="VHL Logo"> <span><?=MY_VHL?></span></a>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 fav-docs">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans($_REQUEST["action"],'MY_COLLECTION')?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="folder-data col-md-9 col-sm-9 col-xs-12">
                        <h4><i class="fa fa-folder-o"></i> <?if ($resultDirName === null){ echo $trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER'); }?><?=$resultDirName?></h4>
                    </div>
                    <!--div class="col-md-9 col-sm-9 col-xs-12"-->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php if ( $response["values"] != false ) : ?>
                            <?php //echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                            <!-- start project list -->
                            <table class="table table-striped table-list">
                              <tbody>
                                <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                                <?php foreach ( $response["values"] as $register) : $count++; ?>
                                    <?if (!isset($register["dirID"])){$register["dirID"] = 0;}?>
                                <tr>
                                  <td>
                                    <div class="record">
                                        <?php if ( $register["docURL"] ) : ?>
                                          <a href="<?php echo $register["docURL"]; ?>" target="_blank"><?php echo $register["title"]; ?></a>
                                        <?php else : ?>
                                          <?php echo $register["title"]; ?>
                                        <?php endif; ?>
                                        <small style="display: block;"><?php echo $register["authors"]; ?></small>
                                    </div>
                                    <?if ($register["dirID"] == null){ $dirID = 0; }?>
                                    <div class="doc-actions">
                                        <a class="label label-primary related-docs" href="javascript: void(0);" onclick="__gaTracker('send','event','Favorite Documents','Related Documents','<?php echo htmlspecialchars($register["title"]); ?>');"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS'); ?></a>
                                    </div>
                                    <div class="related_docs">
                                        <div class="related-loading"><?php echo $trans->getTrans('suggesteddocs','LOADING'); ?></div>
                                        <div class="related-list">
                                            <p><?php echo ucwords($trans->getTrans('suggesteddocs','RELATED_DOCS')); ?>:</p>
                                        </div>
                                        <div class="related-alert"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS_ALERT'); ?></div>
                                    </div>
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
                            <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'ACCESS_LIST_NO_REGISTERS_FOUND')?></p>
                        <?php endif; ?>
                    </div>
                    <!--div class="col-md-3 col-sm-3 col-xs-12"></div-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>