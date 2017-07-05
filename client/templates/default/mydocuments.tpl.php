<?php
    if ( in_array( $_REQUEST["task"], array( 'rate', 'removedoc' ) ) )
        header("Location: " . $_SERVER['HTTP_REFERER']);
?>

<?php $directory = $_REQUEST["directory"] ? $_REQUEST["directory"] : 0; ?>

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
                    <div class="folder-data col-md-9 col-sm-9 col-xs-12">
                        <h4><i class="fa fa-folder-o"></i> <?if ($resultDirName === null){ echo $trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER'); }?><?=$resultDirName?></h4>
                        <?if ($_REQUEST["directory"] != 0){?>
                            <a href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/edit/directory/<?=$_REQUEST["directory"]?>','','resizable=no,scrollbars=1,width=420,height=250')"><span class="label label-info"><?=$trans->getTrans($_REQUEST["action"],'EDIT_FOLDER')?></span></a>
                            <a href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/delete/directory/<?=$_REQUEST["directory"]?>','','resizable=no,scrollbars=1,width=420,height=295')"><span class="label label-danger"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_FOLDER')?></span></a>
                        <?}?>
                        <select id="step9" class="bulkactions">
                            <option><?=$trans->getTrans($_REQUEST["action"],'BULK_ACTIONS')?></option>
                            <option class="bulkremovedoc" value="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/removedoc/directory/<?=$directory?>"><?=$trans->getTrans($_REQUEST["action"],'BULK_REMOVE_DOCS')?></option>
                            <option class="bulkmovedoc" value="<?=RELATIVE_PATH?>/controller/directories/control/business/task/movedoc/directory/<?=$directory?>"><?=$trans->getTrans($_REQUEST["action"],'BULK_MOVE_DOCS')?></option>
                        </select>
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
                                <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                                <?php foreach ( $response["values"] as $register) : $count++; ?>
                                    <?if (! isset($register["dirID"])){$register["dirID"] = 0;}?>
                                <tr>
                                  <td>
                                    <div class="checkbox">
                                      <label>
                                        <input id="doc<?php echo $count; ?>" type="checkbox" value="<?php echo $register["docID"]; ?>">
                                      </label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="rank">
                                        <?if ($register["rate"] >= 1){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/0/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/1/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                        <?if ($register["rate"] >= 2){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/1/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/2/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                        <?if ($register["rate"] >= 3){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/2/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/3/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                        <?if ($register["rate"] >= 4){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/3/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/4/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                        <?if ($register["rate"] >= 5){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/4/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.png" border="0" class="star" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/5/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.png" border="0" class="star" /></a><?}?>
                                    </div>
                                    <div class="record">
                                        <?php if ( $register["docURL"] ) : ?>
                                          <a href="<?php echo $register["docURL"]; ?>" target="_blank"><?php echo $register["title"]; ?></a>
                                        <?php else : ?>
                                          <?php echo $register["title"]; ?>
                                        <?php endif; ?>
                                        <small style="display: block;"><?php echo $register["authors"]; ?></small>
                                    </div>
                                    <?if ($register["dirID"] == null){ $dirID = 0; }?>
                                    <div>
                                        <a class="label label-danger remove" href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/removedoc/document/<?=$register["docID"]?>/directory/<?=$register["dirID"]?>"><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_FROM_COLLECTION'); ?></a>
                                        <a class="label label-info move" href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/movedoc/document/<?=$register["docID"]?>/directory/<?=$register["dirID"]?>','','resizable=no,width=420,height=270')"><?php echo $trans->getTrans($_REQUEST["action"],'MOVE_TO'); ?></a>
                                        <a class="label label-primary related-docs" href="javascript:;"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS'); ?></a>
                                    </div>
                                    <!--div>
                                      <span class="label label-default">Default</span>
                                      <span class="label label-primary">Primary</span>
                                      <span class="label label-success">Success</span>
                                      <span class="label label-info">Info</span>
                                      <span class="label label-warning">Warning</span>
                                      <span class="label label-danger">Danger</span>
                                    </div-->
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
                            <?php echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                        <?php else : ?>
                            <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'ACCESS_LIST_NO_REGISTERS_FOUND')?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <section id="step10" class="panel panel-folder">
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
                        <section id="step11" class="panel panel-folder">
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
                      element: '#step8',
                      intro: "Documentos Favoritos",
                      position: 'right'
                    },
                    {
                      element: '#step9',
                      intro: "Ações em massa",
                      position: 'left'
                    },
                    {
                      element: '#step10',
                      intro: "Minhas Coleções",
                      position: 'left'
                    },
                    {
                      element: '#step11',
                      intro: "Visualizar Lista por",
                      position: 'left'
                    }
                  ]
                });

                intro.start().oncomplete(function() {
                  window.location.href = '<?php echo RELATIVE_PATH."/controller/myprofiledocuments/control/business/?multipage=true"; ?>';
                });
            }
            
            startIntro();
          }
        </script>

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>