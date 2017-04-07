        <?require_once(dirname(__FILE__)."/header.tpl.php");?>
        <?require_once(dirname(__FILE__)."/sidebar.tpl.php");?>

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            <div class="row tile_count">
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-file-o"></i> <?=$trans->getTrans('menu','MY_SHELF')?></span>
                <div class="count"><?php echo $totalCollections; ?></div>
                <span class="count_bottom"><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business"><?=$trans->getTrans('menu','SEE_ALL_DOCS')?></a></span>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-external-link"></i> <?=$trans->getTrans('menu','MY_LINKS')?></span>
                <div class="count green"><?php echo $totalLinks; ?></div>
                <span class="count_bottom"><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business"><?=$trans->getTrans('menu','SEE_ALL_LINKS')?></a></span>
              </div>
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-folder-open-o"></i> <?=$trans->getTrans('menu','MY_PROFILE_DOCUMENTS')?></span>
                <div class="count"><?php echo $totalProfiles; ?></div>
                <span class="count_bottom"><a href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business"><?=$trans->getTrans('menu','SEE_ALL_PROFILES')?></a></span>
              </div>
            </div>
            <!-- /top tiles -->

            <!-- Services Platform Dashboard -->
            <div class="row">
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','SUGGESTED_DOCS')?><small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $suggestedDocs ) : ?>
                      <?php foreach ( $suggestedDocs as $docs ) : ?>
                        <article class="media event">
                          <div class="media-body">
                            <a class="title" href="<?php echo $docs['docURL'] ?>" target="_blank"><i class="fa fa-file-o" aria-hidden="true"></i><?php echo $docs['title'] ?></a>
                          </div>
                        </article>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','SHELF_WIDGET')?><small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $collections ) : ?>
                      <?php foreach ( $collections as $col ) : ?>
                        <article class="media event">
                          <div class="media-body">
                            <a class="title" href="<?php echo $col['docURL'] ?>" target="_blank"><i class="fa fa-file-o" aria-hidden="true"></i><?php echo $col['title'] ?></a>
                          </div>
                        </article>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','PROFILE_WIDGET')?><small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $profiles ) : ?>
                      <?php foreach ( $profiles as $profile ) : ?>
                        <article class="media event">
                          <div class="media-body">
                            <a class="title" href="<?php echo RELATIVE_PATH.'/controller/myprofiledocuments/control/business/profile/'.$profile["profileID"]; ?>"><i class="fa fa-folder-open-o" aria-hidden="true"></i><?php echo $profile['profileName']; ?></a>
                            <p><span><?=$trans->getTrans('menu','KEYWORDS')?>: </span><?php echo $profile['profileText']; ?></p>
                          </div>
                        </article>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','RECENT_ACTIVITIES')?><small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $dataHistory ) : ?>
                      <div class="dashboard-widget-content">
                        <ul class="list-unstyled timeline widget">
                          <?php foreach ( $dataHistory as $trace ) : ?>
                            <?php $date = date("d/m/Y - H:i A", strtotime($trace['datetime'])); ?>
                            <?php $label = $trans->getTrans('menu',$trace['action'].'_'.$trace['type']); ?>
                            <li>
                              <div class="block">
                                <div class="block_content">
                                  <h2 class="title"></h2>
                                  <div class="byline">
                                    <span><?php echo $date; ?></span>
                                  </div>
                                  <p class="excerpt"><?php echo $label; ?>: <span><?php echo $trace['target']; ?></span></p>
                                </div>
                              </div>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','SEARCH_WIDGET')?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $searches ) : ?>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th><?=$trans->getTrans('menu','QUERY')?></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody style="word-break: break-word;">
                          <?php foreach ( $searches as $search ) : ?>
                            <tr>
                              <td class="query"><?php echo $search['query']; ?></td>
                              <td style="text-align: right;">
                                <button id="v1" class="btn btn-primary btn-xs search" value="<?php echo $search['site']; ?>" data-original-title="" title=""><i class="fa fa-search search"></i> <?=$trans->getTrans('menu','VIEW')?></button>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans('menu','MY_LINKS')?><small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php if ( $links ) : ?>
                      <?php foreach ( $links as $link ) : ?>
                        <article class="media event">
                          <div class="media-body">
                            <a class="title" href="<?php echo $link['url']; ?>" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i><?php echo $link['name']; ?></a>
                            <p><?php echo $link['description']; ?></p>
                          </div>
                        </article>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <!--div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Suggested Events<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Event One Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Event Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Event Three Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Event Four Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date">
                        <p class="month">April</p>
                        <p class="day">23</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Event Five Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                  </div>
                </div>
              </div-->
            </div>
        </div>
        <!-- /page content -->

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>