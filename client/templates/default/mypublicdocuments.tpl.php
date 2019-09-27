<?php
    $directory = $_REQUEST["directory"] ? $_REQUEST["directory"] : 0;
    $public_link = "http://".$_SERVER['HTTP_HOST']."/".$_SESSION['lang']."/".$_REQUEST['uid']."/".$directory;
?>
    <?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>
    <section>
        <div id="recover" class="container col-12">
            <div id="lang">
                <?php foreach ($languages as $key => $value) : ?>
                    <?php if ( $key == $_SESSION['lang'] ) continue; ?>
                    <a href="<?php echo $path.'?lang='.$key; ?>"><?php echo $value; ?></a>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col s12 l4" id="logoRecover">
                    <a href="<?php echo RELATIVE_PATH; ?>/controller/authentication"><img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/logo-<?php echo $_SESSION["lang"]; ?>.png" alt="Logo MiBVS" class="responsive-img"></a>
                </div>
                <div class="col s12 l8" id="logoRecoverBireme">
                    <img src="http://logos.bireme.org/img/<?php echo $_SESSION["lang"]; ?>/v_bir_color.svg" class="responsive-img" alt="Logo BIREME">
                </div>
            </div>
            <div class="divider"></div>
            <h4><i class="far fa-folder-open left"></i> <?php echo $trans->getTrans($_REQUEST["action"],'COLLECTION_DOCS'); ?></h4>
            <div class="divider"></div>
            <?php if ( $response["values"] ) : ?>
                <div class="row">
                    <div class="col s12 m6">
                        <p>
                            <h5><b><?php echo $resultUserDir['dirName']?></b></h5>
                            <b><?php echo $trans->getTrans($_REQUEST["action"],'CREATED_BY'); ?></b> <?php echo $resultUserDir['userFirstName'].' '.$resultUserDir['userLastName']; ?> <br />
                            <b><?php echo $trans->getTrans($_REQUEST["action"],'PUBLISHED_IN'); ?></b> <?php echo date('d M Y', strtotime($resultUserDir['creation_date'])); ?> <br />
                            <b><?php echo $trans->getTrans($_REQUEST["action"],'UPDATED_IN'); ?></b> <?php echo date('d M Y', strtotime($resultUserDir['last_modified'])); ?> <br />
                            <b><?php echo $trans->getTrans($_REQUEST["action"],'TOTAL_DOCS'); ?></b> <?php echo $paginationData['items']; ?>
                        </p>
                    </div>
                    <div class="col s12 m6">
                        <div class="row">
                            <h5><b><?php echo $trans->getTrans($_REQUEST["action"],'SHARE'); ?></b></h5>
                            <script type="text/javascript">
                              var addthis_config = addthis_config||{};

                              var addthis_share = addthis_share||{};
                                  addthis_share.title = "<?php echo $resultDirName; ?>";
                                  addthis_share.url = "<?php echo $public_link; ?>";
                            </script>
                            <div class="addthis_toolbox addthis_60x60_style" addthis:url="<?php echo $public_link; ?>" style="margin-top: 1em;">
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
                </div>
                <div class="divider"></div><br />
                <div class="col s12">
                    <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                    <?php foreach ( $response["values"] as $register) : $count++; ?>
                        <article>
                            <div class="box5 hoverable grey lighten-5">
                                <!-- Limitar duas linhas -->
                                <div class="linkBreak record">
                                    <?php if ( is_array($register["docURL"]) ) : ?>
                                        <a href="<?php echo $register["docURL"]["portal"]; ?>" class="doctitle" onclick="__gaTracker('send','event','Public Collection','View Document','<?php echo addslashes(htmlspecialchars($register["title"])); ?>');" target="_blank"><?php echo $register["title"]; ?></a><br />
                                    <?php else : ?>
                                        <a href="<?php echo $register["docURL"]; ?>" class="doctitle" onclick="__gaTracker('send','event','Public Collection','View Document','<?php echo addslashes(htmlspecialchars($register["title"])); ?>');" target="_blank"><?php echo $register["title"]; ?></a><br />
                                    <?php endif; ?>

                                    <?php if ( $register["authors"] ) : ?>
                                        <?php $authors = explode('.', $register['authors']); ?>
                                        <small><?php echo $authors[0].'.'; ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="btn2Botoes">
                                    <a href="#modal-related-docs" class="btn3 btnPrimary modal-trigger related-docs public-related-docs" onclick="__gaTracker('send','event','Public Collection','Related Documents','<?php echo addslashes(htmlspecialchars($register["title"])); ?>');"><?php echo $trans->getTrans('suggesteddocs','RELATED_DOCS'); ?></a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
                <?php if ( $objPaginator->totalPages > 1 ) { echo $objPaginator->build(); } ?>
            <?php else : ?>
                <div class="card-panel center-align" style="margin-top: 2em;">
                    <span class="blue-text text-darken-2"><?php echo $trans->getTrans($_REQUEST["action"],'ACCESS_LIST_NO_REGISTERS_FOUND'); ?></span>
                </div>
            <?php endif; ?>
        </div>
        <?php require_once(dirname(__FILE__)."/info.tpl.php"); ?>
    </section>    
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
    <?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>