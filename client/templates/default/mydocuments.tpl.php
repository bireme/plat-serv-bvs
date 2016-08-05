<?
    if ( in_array( $_REQUEST["task"], array( 'rate', 'removedoc' ) ) )
            header("Location: " . $_SERVER['HTTP_REFERER']);
?>

<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<?require_once(dirname(__FILE__)."/top.tpl.php");?>

    <div class="breadCrumb">
        <a href="/"><?=$trans->getTrans($_REQUEST["action"],'HOME')?></a>&gt; <?=$trans->getTrans($_REQUEST["action"],'MY_COLLECTION')?>
    </div>
    <div class="middle">
        <div class="content">
            <h3><span><?=$trans->getTrans($_REQUEST["action"],'MY_COLLECTION')?> <?=$trans->getTrans($_REQUEST["action"],'BY_DATE')?></span></h3>
            <div class="articlelist">
                <div class="topicFolder">
                    <H4><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/articleFolder.gif"/> <span> <?if ($resultDirName === null){ echo $trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER'); }?> <?=$resultDirName?></span></H4>
                </div>
                <?if ($_REQUEST["directory"] != 0){?>
                    <div class="folderTools">
                        <ul>
                            <li><a href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/edit/directory/<?=$_REQUEST["directory"]?>','','resizable=no,scrollbars=1,width=420,height=280')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder_edit.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'EDIT_FOLDER')?></a></li>
                            <li><a href="javascript: void(0);" onClick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/delete/directory/<?=$_REQUEST["directory"]?>','','resizable=no,scrollbars=1,width=420,height=280')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder_delete.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'REMOVE_FOLDER')?></a></li>
                            <!--li><a href="<?=RELATIVE_PATH?>/controller/directories/control/business/task/<?= $isCurrDirPublic ? 'nopublish' : 'publish' ?>/directory/<?=$_REQUEST["directory"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/network.png" border="0"/><?= $isCurrDirPublic ? $trans->getTrans($_REQUEST["action"],'MAKE_FOLDER_PRIVATE') : $trans->getTrans($_REQUEST["action"],'PUBLISH_FOLDER') ?></a></li-->
                        </ul>
                    </div>
                <?}?>
                <?if ($response["values"] != false ){
                    echo $objPaginator->show($trans->getTrans($_REQUEST["action"],'PAGE'));
                    ?>
                    <ul>
                        <?foreach ($response["values"] as $register){
                          $count++;?>

                          <?if (! isset($register["dirID"])){$register["dirID"] = 0;}?>
                        <li>
                            <div class="rank">
                                <?if ($register["rate"] >= 1){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/0/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/1/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" border="0" /></a><?}?>
                                <?if ($register["rate"] >= 2){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/1/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/2/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" border="0" /></a><?}?>
                                <?if ($register["rate"] >= 3){?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/2/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/rate/document/<?=$register["docID"]?>/grade/3/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" border="0" /></a><?}?>
                            </div>
                            <div class="articleBlock">
                                <i><?=$register["authors"]?></i>
                                <a href="<?=$register["docURL"]?>" target="_blank"><b><?=$register["title"]?></b></a>
                                <i><?=$register["serial"]?><?php if(!empty($register["year"])){echo ', ' . $register["year"];} ?><?=$register["year"]?><?php if(!empty($register["volume"])){echo ', vol:' . $register["volume"];} ?><?php if(!empty($register["number"])){echo ', n.' . $register["number"];} ?><?php if(!empty($register["suppl"])){echo ', suppl.' . $register["suppl"];} ?><?php if(!empty($register["issn"])){echo ', ISSN:' . $register["issn"];} ?>.</i>
                                <?if ($register["citedStat"] or $register["accessStat"]){?>
                                <div class="services">
                                    <?if ($register["citedStat"] == true){?><span class="trackAccess"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/stats4.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'MONITOR_ACCESS')?></span><?}?>
                                    <?if ($register["accessStat"] == true){?><span class="trackCitation"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/stats2.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'MONITOR_CITATION')?></span><?}?>
                                </div>
                                <?}?>
                                <?if ($register["dirID"] == null){ $dirID = 0;}?>
                                <div class="actions">
                                    <a class="remove" href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/task/removedoc/document/<?=$register["docID"]?>/directory/<?=$register["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/doc_delete.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'REMOVE_FROM_COLLECTION')?></a> |
                                    <a class="move" href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/movedoc/document/<?=$register["docID"]?>/directory/<?=$register["dirID"]?>','','resizable=no,width=420,height=420')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/doc_move.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'MOVE_TO')?></a> |
                                    <a class="fulltext" href="<?=$register["docURL"]?>" target="_blank"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/fullText.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'FULL_TEXT')?></a>
                                </div>
                            </div>
                        </li>
                        <?}?>
                    </ul>
                <?
                    echo $objPaginator->show($trans->getTrans($_REQUEST["action"],'PAGE'));
                }else{?>
                    <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ACCESS_LIST_NO_REGISTERS_FOUND')?></div>
                <?}?>
            </div>
        </div>
    </div>
    <div class="serviceColumn">
        <div class="box">
            <h3><span><?=$trans->getTrans($_REQUEST["action"],'MY_FOLDERS')?></span></h3>
            <div id="rssFeeds">
                <ul>
                    <li><a href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/view/task/add','','resizable=no,width=420,height=280')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/add-folder-orange.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'ADD_FOLDER')?></a></li>
                    <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/directory/0"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER')?></a></li>
                    <?if ($responseListDirs["values"] != false ){?>
                        <?foreach ($responseListDirs["values"] as $listDirs){?>
                            <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/directory/<?=$listDirs["dirID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder.gif" border="0"/><?=$listDirs["name"]?></a></li>
                        <?}?>
                   <?}?>
                </ul>
            </div>
        </div>
        <div class="box">
            <h3><span><?=$trans->getTrans($_REQUEST["action"],'SHOW_BY')?></span></h3>
            <div id="sortedBy">
                <ul>
                    <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/sort/date"><?=$trans->getTrans($_REQUEST["action"],'DATE')?></a></li>
                    <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business/sort/rate"><?=$trans->getTrans($_REQUEST["action"],'MY_RANK')?></a></li>
                </ul>
            </div>
        </div> <!-- end webServices -->
    </div> <!-- end serviceColumn -->
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>