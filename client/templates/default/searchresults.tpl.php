<?php
    if ( 'rate' == $_REQUEST["task"] )
        header("Location: " . $_SERVER['HTTP_REFERER']);
    if ( 'delete' == $_REQUEST["task"] )
        header("Location: ".RELATIVE_PATH.'/controller/searchresults/control/business');
?>
    <?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/sidebar.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/nav.tpl.php"); ?>
    <div id="wrap">
        <div class="row">
            <div class="col m12 ">
                <div class="box1">
                    <h5 class="title1"><i class="fas fa-rss left"></i> <?php echo $trans->getTrans($_REQUEST["action"],'RSS'); ?></h5>
                    <?php if ( $_REQUEST['rss'] ) : ?>
                        <?php if ($responseSearch["values"] != false ) : ?>
                            <?php $registerSearch = $responseSearch["values"][0]; ?>
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col s12 m6">
                                    <div class="tituloDropdown"><?php echo $trans->getTrans($_REQUEST["action"],'FEED'); ?>: <b><?php echo $registerSearch["name"]; ?></b>
                                        <!-- Dropdown Trigger -->
                                        <a class='dropdown-trigger btn2 btnSuccess' href='#' data-target='dropdown1'><i class="fas fa-angle-down"></i></a>
                                        <!-- Dropdown Structure -->
                                        <ul id='dropdown1' class='dropdown-content btn2Buttons'>
                                            <li><a href="#modal-ajax" class="modal-trigger modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/searchresults/control/business/task/edit/rss/<?php echo $registerSearch["id"]; ?>" onclick="__gaTracker('send','event','Search Results','Edit RSS','<?php echo htmlspecialchars($registerSearch["name"]); ?>');"><i class="far fa-edit right m1"></i> <?php echo $trans->getTrans($_REQUEST["action"],'EDIT_RSS'); ?></a></li>
                                            <li><a href="#modal-remove-rss" class="modal-trigger remove" data-source="<?php echo RELATIVE_PATH; ?>/controller/searchresults/control/business/task/delete/rss/<?php echo $registerSearch["id"]; ?>" data-title="<?php echo $registerSearch["name"]; ?>" onclick="__gaTracker('send','event','Search Results','Remove RSS','<?php echo htmlspecialchars($resultDirName); ?>');"><i class="fas fa-eraser right m1"></i><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_RSS'); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col s12 m6">
                                    <div class="tituloDropdown">
                                      <b><?php echo $trans->getTrans($_REQUEST["action"],'MY_RSS'); ?></b>
                                      <!-- Dropdown Trigger -->
                                      <a class='dropdown-trigger btn2 btnSuccess' href='#' data-target='dropdown2'><i class="fas fa-angle-down"></i></a>
                                      <!-- Dropdown Structure -->
                                      <ul id='dropdown2' class='dropdown-content'>
                                          <li><a href="#modal-ajax" class="modal-trigger modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/searchresults/control/view/task/add"><i class="material-icons right m1">add</i> <?php echo $trans->getTrans($_REQUEST["action"],'ADD_RSS'); ?></a></li>
                                          <?php if ( count($response["values"]) > 1 ) : ?>
                                              <li class="divider"></li>
                                              <?php foreach ($response["values"] as $register) : $count++; ?>
                                                  <li><a href="<?php echo RELATIVE_PATH; ?>/controller/searchresults/control/business/rss/<?php echo $register['id']; ?>"><?php echo $register['name']; ?></a></li>
                                              <?php endforeach; ?>
                                          <?php endif; ?>
                                      </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="col s12 m6">
                                <div class="tituloDropdown">
                                  <b><?php echo $trans->getTrans($_REQUEST["action"],'MY_RSS'); ?></b>
                                  <!-- Dropdown Trigger -->
                                  <a class='dropdown-trigger btn2 btnSuccess' href='#' data-target='dropdown2'><i class="fas fa-angle-down"></i></a>
                                  <!-- Dropdown Structure -->
                                  <ul id='dropdown2' class='dropdown-content'>
                                      <li><a href="#modal-ajax" class="modal-trigger modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/searchresults/control/view/task/add"><i class="material-icons right m1">add</i> <?php echo $trans->getTrans($_REQUEST["action"],'ADD_RSS'); ?></a></li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if ( $_REQUEST['rss'] ) : ?>
                    <?php if ($responseSearch["values"] != false ) : ?>
                        <?php $registerSearch = $responseSearch["values"][0]; ?>
                        <section class="row">
                            <?php foreach ( $responseSearchItems["values"] as $item ) : $count++; ?>
                                <div id="<?php echo 'doc'.$count; ?>" class="col s12">
                                    <div class="box1 hoverable">
                                        <div class="record">
                                            <a class="doctitle" href="<?php echo $item["link"]; ?>" target="_blank"><?php echo $item["title"]; ?></a><br />
                                            <small class="boxAutor"><?php echo ( is_array($item["author"]) ) ? implode("; ", $item["author"]) : $item["author"]; ?></small><br /><br />
                                        </div>
                                        <div class="btn2Buttons">
                                            <?php if ( strpos( $registerSearch['url'], VHL_SEARCH_PORTAL_DOMAIN ) !== false ) : ?>
                                            <a href="#modal-ajax" class="btn3 btnSuccess modal-trigger modal-ajax add-collection" data-similar="<?php echo $item["guid"]; ?>" data-source="<?php echo RELATIVE_PATH; ?>/controller/searchresults/control/business/task/addcol/similar/doc<?php echo $count; ?>" onclick="__gaTracker('send','event','Search Results','Favorite Documents','<?php echo htmlspecialchars($item["title"]); ?>');"><?=$trans->getTrans($_REQUEST["action"],'ADD_COLLECTION')?></a>
                                            <?php endif; ?>
                                            <a href="#modal-related-docs" class="btn3 btnPrimary modal-trigger related-docs" onclick="__gaTracker('send','event','Search Results','Related Documents','<?php echo addslashes(htmlspecialchars($item["title"])); ?>');"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </section>
                    <?php else : ?>
                        <div class="card-panel center-align">
                            <span class="blue-text text-darken-2"><?php echo $trans->getTrans($_REQUEST["action"],'RSS_NO_REGISTERS_FOUND'); ?></span>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <?php if ( $response["values"] != false ) : ?>
                        <section class="row">
                            <?php foreach ($response["values"] as $register) : $count++; ?>
                                <div class="col s12 l6 xl4">
                                    <a href="<?php echo RELATIVE_PATH; ?>/controller/searchresults/control/business/rss/<?php echo $register['id']; ?>">
                                        <div class="box2 hoverable">
                                            <div class="box2rss">
                                                <div class="col s3">
                                                    <?php $file_headers = @get_headers($register['image']); ?>
                                                    <?php if ( $register['image'] && $file_headers[0] != 'HTTP/1.0 404 Not Found' ) : ?>
                                                    <img class="responsive-img" src="<?php echo $register['image']; ?>" alt="RSS">
                                                    <?php else : ?>
                                                    <i class="fa fa-rss-square fa-2x"></i>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col s9">    
                                                    <b><?php echo $register['name']; ?></b>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </section>
                        <?php if ( $objPaginator->totalPages > 1 ) { echo $objPaginator->build(); } ?>
                    <?php else : ?>
                        <div class="card-panel center-align">
                            <span class="blue-text text-darken-2"><?php echo $trans->getTrans($_REQUEST["action"],'RSS_NOT_FOUND'); ?></span>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php require_once(dirname(__FILE__)."/info.tpl.php"); ?>
        <?php require_once(dirname(__FILE__)."/more.tpl.php"); ?>
    </div>
    <!--- Modal Ajax -->
    <div id="modal-ajax" class="modal"></div>
    <!-- Modal Similares -->
    <div id="modal-related-docs" class="modal">
        <form action="#" class="col s12">
            <div class="modal-content">
                <h4><?php echo ucwords($trans->getTrans('suggesteddocs','RELATED_DOCS')); ?></h4>
                <p class="center-align">
                    <b id="ref-title"></b>
                </p>
                <div class="related_docs">
                    <div class="related-loading center-align"><?php echo $trans->getTrans('suggesteddocs','LOADING'); ?></div>
                    <div class="related-loading row">
                        <div class="progress col s8 offset-s2">
                              <div class="indeterminate" style="width: 0"><?php echo $trans->getTrans('suggesteddocs','LOADING'); ?></div>
                          </div>
                      </div>
                    <div class="related-list"></div>
                    <div class="related-alert" style="display: none;"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS_ALERT'); ?></div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CLOSE'); ?></a>
            </div>
        </form>
    </div>
    <!-- Modal Excluir RSS -->
    <div id="modal-remove-rss" class="modal">
        <div class="modal-content">
            <h4><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_FEED'); ?></h4>
            <p class="center-align">
                <?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_FEED_CONFIRM'); ?>:<br />
                <b id="doc-title"></b>
            </p>
            <div class="divider"></div><br />
            <div class="center-align">
                <a href="#!" class="btn btnPrimary modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CANCEL'); ?></a>
                <a id="doc-url" href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE'); ?></a>
            </div>
        </div>
    </div>
    <?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>