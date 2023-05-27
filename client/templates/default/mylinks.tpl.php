<?php
    if ( in_array( $_REQUEST["task"], array( 'rate', 'delete' ) ) )
        header("Location: " . $_SERVER['HTTP_REFERER']);
?>
    <?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/sidebar.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/nav.tpl.php"); ?>
    <div id="wrap">
        <div class="row">
            <div class="col m12 ">
                <div class="box1">
                    <h5 class="title"><i class="fas fa-link left"></i> <?php echo $trans->getTrans($_REQUEST["action"],'MY_LINKS'); ?></h5>
                    <div class="divider"></div>
                    <div class="row">
                        <div class="col s12">
                            <div class="tituloDropdown">
                                <b><?php echo $trans->getTrans($_REQUEST["action"],'TOOLS'); ?></b>
                                <!-- Dropdown Trigger -->
                                <a class='dropdown-trigger btn2 btnSuccess' href='#' data-target='dropdown1'><i class="fas fa-angle-down"></i></a>
                                <!-- Dropdown Structure -->
                                <ul id='dropdown1' class='dropdown-content'>
                                    <li><a href="#modal-ajax" class="modal-trigger modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/mylinks/control/view/task/add"><i class="material-icons right m1">add</i> <?php echo $trans->getTrans($_REQUEST["action"],'ADD_LINK'); ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="row">
                    <?php if ( $response["values"] != false ) : ?>
                        <?php foreach ( $response["values"] as $register) : ?>
                            <article class="col s12">
                                <div class="box5 hoverable">
                                    <!-- Limitar duas linhas -->
                                    <b><?php echo $register["name"]; ?></b><br />
                                    <div class="linkBreak">
                                        <a href="<?php echo $register["url"]; ?>" target="_blank"><?php echo $register["url"]; ?></a><br />
                                        <small><?php echo $register["description"]; ?></small>
                                    </div>
                                    <div class="btn2Botoes">
                                        <a href="#modal-remove-link" class="btn3 btnDanger modal-trigger remove" data-source="<?php echo RELATIVE_PATH; ?>/controller/mylinks/control/business/task/delete/link/<?php echo $register["linkID"]; ?>" data-title="<?php echo $register["name"]; ?>" onclick="gtag('send','event','Favorite Links','Remove Link','<?php echo $register["url"]; ?>');"><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_LINK'); ?></a>
                                        <a href="#modal-ajax" class="btn3 btnWarning modal-trigger modal-ajax" data-source="<?php echo RELATIVE_PATH; ?>/controller/mylinks/control/business/task/edit/link/<?php echo $register["linkID"]; ?>" onclick="gtag('send','event','Favorite Links','Edit Link','<?php echo $register["url"]; ?>');"><i class="far fa-edit right m1"></i><?php echo $trans->getTrans($_REQUEST["action"],'EDIT_LINK'); ?></a>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="card-panel center-align">
                            <span class="blue-text text-darken-2"><?php echo $trans->getTrans($_REQUEST["action"],'MY_LINKS_NO_REGISTERS_FOUND'); ?></span>
                        </div>
                    <?php endif; ?>
                </section>
                <?php if ( $objPaginator->totalPages > 1 ) { echo $objPaginator->build(); } ?>
            </div>
        </div>
        <div class="box1 video-box">
            <div class="row">
                <div class="col s12 m12 l8 offset-l2 center-align">
                    <div class="box12">
                        <h6><b><?php echo $trans->getTrans('tutorial','MY_LINKS'); ?></b></h6>
                        <div class="video-container">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/kxFK8UFfquw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="center-align" id="verMaisMidia" >
                            <a href="#!"><?php echo $trans->getTrans('menu','SEE_MORE'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once(dirname(__FILE__)."/info.tpl.php"); ?>
        <?php require_once(dirname(__FILE__)."/more.tpl.php"); ?>
    </div>
    <!--- Modal Ajax -->
    <div id="modal-ajax" class="modal"></div>
    <!-- Modal Excluir Link -->
    <div id="modal-remove-link" class="modal">
        <div class="modal-content">
            <h4><?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_LINK'); ?></h4>
            <p class="center-align">
                <?php echo $trans->getTrans($_REQUEST["action"],'REMOVE_LINK_CONFIRM'); ?>:<br />
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