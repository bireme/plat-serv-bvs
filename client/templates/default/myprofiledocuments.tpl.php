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
              <div class="col-sm-12 col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans($_REQUEST["action"],'MY_PROFILES')?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ($responseProfile["values"] != false ) : ?>
                      <?php $registerProfile = $responseProfile["values"][0]; ?>
                      <div class="folder-data">
                          <h4><i class="fa fa-folder-o"></i> <?=$registerProfile["profileName"]?></h4>
                          <a class="edit" href="javascript: void(0);" onClick="window.open('<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business/task/edit/profile/<?=$registerProfile["profileID"]?>','','resizable=no,scrollbars=1,width=420,height=385')"><span class="label label-info"><?=$trans->getTrans($_REQUEST["action"],'EDIT_PROFILE')?></span></a>
                          <a class="remove" href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business/task/delete/profile/<?=$registerProfile["profileID"]?>"><span class="label label-danger"><?=$trans->getTrans($_REQUEST["action"],'REMOVE_PROFILE')?></span></a>
                      </div>
                      <div class="keywords"><small><?=$trans->getTrans($_REQUEST["action"],'PROFILE_KEYWORDS')?>: <?=$registerProfile["profileText"]?></small></div>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          <?php if ( $responseSimilarDocs["values"] != false ) : ?>
                              <?php //echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                              <!-- start project list -->
                              <table class="table table-striped table-list">
                                <!--thead>
                                  <tr>
                                    <th>#</th>
                                  </tr>
                                </thead-->
                                <tbody>
                                  <?php foreach ( $responseSimilarDocs["values"] as $similar) : ?>
                                  <tr>
                                    <td>
                                      <div>
                                          <a href="<?php echo $similar["ur"]; ?>" target="_blank"><?php echo implode(" / ", $similar["ti"]); ?></a>
                                          <small style="display: block;"><?php echo implode("; ", $similar["au"]); ?></small>
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
                                    <td style="text-align: right;">
                                        <button class="btn btn-success btn-xs add-collection" value="<?php echo $similar["id"]; ?>"><?=$trans->getTrans($_REQUEST["action"],'ADD_COLLECTION')?></button>
                                    </td>
                                  </tr>
                                  <?php endforeach; ?>
                                </tbody>
                              </table>
                              <!-- end project list -->
                              <?php echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                          <?php else : ?>
                              <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'SERVICE_TEMPORARY_UNAVAILABLE')?></p>
                          <?php endif; ?>
                      </div>
                    <?php else : ?>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          <p class="none-docs"><?php echo $trans->getTrans($_REQUEST["action"],'MY_PROFILES_NO_REGISTERS_FOUND'); ?></p>
                      </div>
                    <?php endif; ?>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <section class="panel panel-folder">
                            <div class="panel-body">
                                <h5><?=$trans->getTrans($_REQUEST["action"],'TOOLS')?></h5>
                                <ul class="list-docs-unstyled project_files">
                                    <li><a href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/view/task/add','','resizable=no,width=420,height=385')"><i class="fa fa-plus-circle"></i><?=$trans->getTrans($_REQUEST["action"],'ADD_PROFILE')?></a></li>
                                </ul>
                            </div>
                        </section>
                        <section class="panel panel-folder">
                            <div class="panel-body">
                                <h5><?=$trans->getTrans($_REQUEST["action"],'PROFILES')?></h5>
                                <?php if ($response["values"] != false ) : ?>
                                  <ul class="list-docs-unstyled project_files">
                                      <?php foreach ($response["values"] as $register) : ?>
                                          <li><a href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business/profile/<?=$register["profileID"]?>"><?=$register["profileName"]?></a><?if ($register["profileDefault"] == 1){?>&nbsp;<img class="starOn" src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0"/><?}?></li>
                                      <?php endforeach; ?>
                                  </ul>
                                <?php endif; ?>
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