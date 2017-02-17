<?
    if ( in_array( $_REQUEST["task"], array( 'rate', 'removedoc' ) ) )
        header("Location: " . $_SERVER['HTTP_REFERER']);
?>

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
                    <h2><?=$trans->getTrans($_REQUEST["action"],'MY_COLLECTION')?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="folder-data">
                        <h4><i class="fa fa-folder-o"></i> <?if ($resultDirName === null){ echo $trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER'); }?><?=$resultDirName?></h4>
                        <?if ($_REQUEST["directory"] != 0){?>
                            <a href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/edit/directory/<?=$_REQUEST["directory"]?>','','resizable=no,scrollbars=1,width=420,height=250')"><span class="label label-info"><?=$trans->getTrans($_REQUEST["action"],'EDIT_FOLDER')?></span></a>
                            <a href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/delete/directory/<?=$_REQUEST["directory"]?>','','resizable=no,scrollbars=1,width=420,height=295')"><span class="label label-danger"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_FOLDER')?></span></a>
                        <?}?>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
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
                                    <?if (! isset($register["dirID"])){$register["dirID"] = 0;}?>
                                <tr>
                                  <td>
                                    <div class="rank">
                                        <?if ($register["rate"] >= 1){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/0/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/1/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" border="0" /></a><?}?>
                                        <?if ($register["rate"] >= 2){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/1/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/2/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" border="0" /></a><?}?>
                                        <?if ($register["rate"] >= 3){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/2/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/3/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" border="0" /></a><?}?>
                                    </div>
                                    <div>
                                        <?php if ( $register["docURL"] ) : ?>
                                          <a href="<?php echo $register["docURL"]; ?>" target="_blank"><?php echo $register["title"]; ?></a>
                                        <?php else : ?>
                                          <?php echo $register["title"]; ?>
                                        <?php endif; ?>
                                        <small style="display: block;"><?php echo $register["authors"]; ?></small>
                                    </div>
                                    <?if ($register["dirID"] == null){ $dirID = 0;}?>
                                    <div>
                                        <a class="remove" href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/removedoc/document/<?=$register["docID"]?>/directory/<?=$register["dirID"]?>"><span class="label label-danger"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_FROM_COLLECTION')?></span></a>
                                        <a class="move" href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/movedoc/document/<?=$register["docID"]?>/directory/<?=$register["dirID"]?>','','resizable=no,width=420,height=270')"><span class="label label-info"><?=$trans->getTrans($_REQUEST["action"],'MOVE_TO')?></span></a>
                                        <a class="fulltext" href="<?=$register["docURL"]?>" target="_blank"><span class="label label-primary"><?=$trans->getTrans($_REQUEST["action"],'FULL_TEXT')?></span></a>
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
                            <?php echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                        <?php else : ?>
                            <p><?=$trans->getTrans($_REQUEST["action"],'ACCESS_LIST_NO_REGISTERS_FOUND')?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <section class="panel panel-folder">
                            <div class="panel-body">
                                <h5><?=$trans->getTrans($_REQUEST["action"],'MY_FOLDERS')?></h5>
                                <ul class="list-docs-unstyled project_files">
                                    <li><a href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/view/task/add','','resizable=no,width=420,height=250')"><i class="fa fa-plus-circle"></i><?=$trans->getTrans($_REQUEST["action"],'ADD_FOLDER')?></a></li>
                                    <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/directory/0"><i class="fa fa-folder-open-o"></i><?=$trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER')?></a></li>
                                    <?if ($responseListDirs["values"] != false ){?>
                                        <?foreach ($responseListDirs["values"] as $listDirs){?>
                                            <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/directory/<?=$listDirs["dirID"]?>"><i class="fa fa-folder-open-o"></i><?=$listDirs["name"]?></a></li>
                                        <?}?>
                                   <?}?>
                                </ul>
                            </div>
                        </section>
                        <?php $directory = $_REQUEST["directory"] ? $_REQUEST["directory"] : 0; ?>
                        <section class="panel panel-folder">
                            <div class="panel-body">
                                <h5><?=$trans->getTrans($_REQUEST["action"],'SHOW_BY')?></h5>
                                <ul class="list-docs-unstyled project_files">
                                    <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/directory/<?=$directory?>/sort/date"><?=$trans->getTrans($_REQUEST["action"],'DATE')?></a></li>
                                    <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/directory/<?=$directory?>/sort/rate"><?=$trans->getTrans($_REQUEST["action"],'MY_RANK')?></a></li>
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

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>