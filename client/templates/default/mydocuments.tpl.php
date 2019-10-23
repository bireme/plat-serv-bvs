<?php
    if ( in_array( $_REQUEST["task"], array( 'rate', 'removedoc' ) ) )
        header("Location: " . $_SERVER['HTTP_REFERER']);

    $docURL = '';
    $site   = '';
    $label  = '';

    if ( strpos($_SESSION['iahx'], VHL_SEARCH_PORTAL_DOMAIN) !== false ) {
        $chunks = explode('/', $_SESSION['iahx']);
        $chunks = array_values(array_filter($chunks));

        if ( count($chunks) > 2 && !empty($chunks[2]) ) {
            $site  = $chunks[2];
            $label = $trans->getTrans("mysearches", strtoupper($site));

            if ( strpos($label, 'translate_') !== false ) {
                $label = strtoupper($site);
            }
        }
    }

    $directory   = $_REQUEST["directory"] ? $_REQUEST["directory"] : 0;
    $public_link = "http://".$_SERVER['HTTP_HOST']."/".$_SESSION['lang']."/".base64_encode($_SESSION['userID'])."/".$directory;
?>
    <?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/sidebar.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/nav.tpl.php"); ?>
    <div id="wrap">
        <div class="row">
            <div class="col m12 ">
                <div class="box1">
                    <h5 class="title1"><i class="far fa-folder-open left"></i> <?php echo $trans->getTrans($_REQUEST["action"],'MY_COLLECTION'); ?></h5>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="tituloDropdown"><?php echo $trans->getTrans($_REQUEST["action"],'COLLECTION'); ?>: <b><?php if ( !$resultDirName ) { echo $trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER'); } ?><?php echo $resultDirName; ?></b>
                                <?php if ( $resultDirName ) : ?>
                                    <!-- Dropdown Trigger -->
                                    <a class='dropdown-trigger btn2 btnSuccess' href='#' data-target='dir-actions'><i class="fas fa-angle-down"></i></a>
                                    <!-- Dropdown Structure -->
                                    <ul id='dir-actions' class='dropdown-content'>
                                        <li><a href="#modal-ajax" class="modal-trigger modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/directories/control/business/task/edit/directory/<?php echo $_REQUEST["directory"]; ?>" onclick="__gaTracker('send','event','Favorite Documents','Edit Collection','<?php echo htmlspecialchars($resultDirName); ?>');"><i class="far fa-edit right m1"></i><?php echo $trans->getTrans($_REQUEST["action"],'EDIT_FOLDER'); ?></a></li>
                                        <li><a href="#modal-ajax" class="modal-trigger modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/directories/control/business/task/delete/directory/<?php echo $_REQUEST["directory"]; ?>" onclick="__gaTracker('send','event','Favorite Documents','Remove Collection','<?php echo htmlspecialchars($resultDirName); ?>');"><i class="fas fa-eraser right m1"></i><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_FOLDER'); ?></a></li>
                                        <li><a href="#modal-share" class="modal-trigger" onclick="__gaTracker('send','event','Favorite Documents','Share Collection','<?php echo htmlspecialchars($resultDirName); ?>');"><i class="fas fa-share-alt right m1"></i><?php echo $trans->getTrans($_REQUEST["action"],'SHARE_COLLECTION'); ?></a></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="tituloDropdown"><b><?php echo $trans->getTrans($_REQUEST["action"],'MY_FOLDERS'); ?></b>
                                <!-- Dropdown Trigger -->
                                <a class='dropdown-trigger btn2 btnSuccess' href='#' data-target='dir-list'><i class="fas fa-angle-down"></i></a>
                                <!-- Dropdown Structure -->
                                <ul id='dir-list' class='dropdown-content'>
                                    <li><a href="#modal-ajax" class="modal-trigger modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/directories/control/view/task/add"><i class="material-icons right m1">add</i> <?php echo $trans->getTrans($_REQUEST["action"],'ADD_FOLDER'); ?></a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo RELATIVE_PATH; ?>/controller/mydocuments/control/business/directory/0"><?php echo $trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER'); ?></a></li>
                                    <?php if ($responseListDirs["values"] != false ) : ?>
                                        <?php foreach ($responseListDirs["values"] as $listDirs) : ?>
                                            <li><a href="<?php echo RELATIVE_PATH; ?>/controller/mydocuments/control/business/directory/<?php echo $listDirs["dirID"]; ?>"><?php echo $listDirs["name"]; ?></a></li>
                                        <?php endforeach; ?>
                                   <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="row fav-docs">
                    <?php if ( $response["values"] ) : ?>
                        <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                        <?php foreach ( $response["values"] as $register) : $count++; ?>
                            <?php if (!isset($register["dirID"])){$register["dirID"] = 0;} ?>
                            <article class="col s12 l6 xl4">
                                <div class="box3 hoverable">
                                    <div class="box3P record">
                                        <?php if ( is_array($register["docURL"]) ) : ?>
                                            <?php if ( 'portal' != $_SESSION['iahx'] && !empty($site) && array_key_exists($site, $register['docURL']) ) : ?>
                                                <a href="<?php echo $register["docURL"][$site]; ?>" class="doctitle" onclick="__gaTracker('send','event','Favorite Documents','View Document','<?php echo addslashes(htmlspecialchars($register["title"])); ?>');" target="_blank"><?php echo $register["title"]; ?></a>
                                            <?php else : ?>
                                                <a href="<?php echo $register["docURL"]["portal"]; ?>" class="doctitle" onclick="__gaTracker('send','event','Favorite Documents','View Document','<?php echo addslashes(htmlspecialchars($register["title"])); ?>');" target="_blank"><?php echo $register["title"]; ?></a>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <a href="<?php echo $register["docURL"]; ?>" class="doctitle" onclick="__gaTracker('send','event','Favorite Documents','View Document','<?php echo addslashes(htmlspecialchars($register["title"])); ?>');" target="_blank"><?php echo $register["title"]; ?></a>
                                        <?php endif; ?>

                                        <?php if ( $register["authors"] ) : ?>
                                            <?php $authors = explode('.', $register['authors']); ?>
                                            <div class="boxAutor"><?php echo $authors[0].'.'; ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($register["dirID"] == null) { $dirID = 0; } ?>
                                    <div class="btn2Botoes">
                                        <a href="#modal-remove-doc" class="btn3 btnDanger modal-trigger remove" data-source="<?php echo RELATIVE_PATH; ?>/controller/mydocuments/control/business/task/removedoc/document/<?php echo $register["docID"]; ?>/directory/<?php echo $register["dirID"]; ?>" data-title="<?php echo $register["title"]; ?>" onclick="__gaTracker('send','event','Favorite Documents','Remove Document','<?php echo addslashes(htmlspecialchars($register["title"])); ?>');"><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_FROM_COLLECTION'); ?></a>
                                        <a href="#modal-ajax" class="btn3 btnSuccess modal-trigger modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/directories/control/business/task/movedoc/document/<?php echo $register["docID"]; ?>/directory/<?php echo $register["dirID"]; ?>/docsrc/<?php echo base64_encode($register["srcID"]); ?>" onclick="__gaTracker('send','event','Favorite Documents','Move Document','<?php echo addslashes(htmlspecialchars($register["title"])); ?>');"><?php echo $trans->getTrans($_REQUEST["action"],'MOVE_TO'); ?></a>
                                        <a href="#modal-related-docs" class="btn3 btnPrimary modal-trigger related-docs" onclick="__gaTracker('send','event','Favorite Documents','Related Documents','<?php echo addslashes(htmlspecialchars($register["title"])); ?>');"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS'); ?></a>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="card-panel center-align">
                            <span class="blue-text text-darken-2"><?php echo $trans->getTrans($_REQUEST["action"],'ACCESS_LIST_NO_REGISTERS_FOUND'); ?></span>
                        </div>
                    <?php endif; ?>
                </section>
                <?php if ( $objPaginator->totalPages > 1 ) { echo $objPaginator->build(); } ?>
            </div>
        </div>
        <div class="box1">
            <div class="col-12 center-align">
                <div class="box12">
                    <h6><b><?php echo $trans->getTrans('menu','TUTORIAL'); ?></b></h6>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/Fe4cW3B0q_U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="center-align" id="verMaisMidia" >
                        <a href="#!"><?php echo $trans->getTrans('menu','SEE_MORE'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once(dirname(__FILE__)."/info.tpl.php"); ?>
        <?php require_once(dirname(__FILE__)."/more.tpl.php"); ?>
    </div>
    <!--- Modal Ajax -->
    <div id="modal-ajax" class="modal"></div>
    <!-- Modal Compartilhar -->
    <div id="modal-share" class="modal">
        <form action="#" class="col s12">
            <div class="modal-content">
                <h4><?php echo $trans->getTrans($_REQUEST["action"],'SHARE_COLLECTION'); ?></h4>
                <p class="center-align">
                    <b><?php echo $resultDirName; ?></b>
                </p>
                <div class="row center-align">
                    <p class="center-align linkBreak"><?php echo $public_link; ?></p>
                    <hr>
                    <script type="text/javascript">
                      var addthis_config = addthis_config||{};

                      var addthis_share = addthis_share||{};
                          addthis_share.title = "<?php echo $resultDirName; ?>";
                          addthis_share.url = "<?php echo $public_link; ?>";
                    </script>
                    <div class="addthis_toolbox addthis_60x60_style" addthis:url="<?php echo $public_link; ?>">
                        <a class="addthis_button_facebook"></a>
                        <a class="addthis_button_twitter"></a>
                        <a class="addthis_button_linkedin"></a>
                        <a class="addthis_button_email"></a>
                        <a class="addthis_button_link"></a>
                        <a class="addthis_button_whatsapp"></a>
                        <!--a class="addthis_button_compact"></a-->
                    </div>
                    <script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#async=1"></script>
                    <script type="text/javascript">addthis.init();</script>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CLOSE'); ?></a>
            </div>
        </form>
    </div>
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
    <!-- Modal Excluir Item -->
    <div id="modal-remove-doc" class="modal">
        <div class="modal-content">
            <h4><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_FROM_COLLECTION'); ?></h4>
            <p class="center-align">
                <?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_FROM_COLLECTION_CONFIRM'); ?>:<br />
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