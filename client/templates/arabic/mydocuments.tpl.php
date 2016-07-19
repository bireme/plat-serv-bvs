<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<div class="breadCrumb">
    <a href="/"><?=$trans->getTrans($_REQUEST["action"],'HOME')?></a>&gt; <?=$trans->getTrans($_REQUEST["action"],'MY_COLLECTION')?>
</div>
<div class="middle">
    <div class="content">
        <h3><span><?=$trans->getTrans($_REQUEST["action"],'MY_COLLECTION')?> <?=$trans->getTrans($_REQUEST["action"],'BY_DATE')?></span></h3>
        <div class="articlelist">
            <div class="topicFolder">
                <H4><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/articleFolder.gif"/><span><?if ($resultDirName === null){ echo $trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER'); }?> <?=$resultDirName?></span></H4>
            </div>
            <?if ($_REQUEST["directory"] != 0){?>
                <div class="folderTools">
                    <ul>
                        <li><a href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/edit/directory/<?=$_REQUEST["directory"]?>','','resizable=no,scrollbars=1,width=420,height=280')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder_edit.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'EDIT_FOLDER')?></a></li>
                        <li><a href="javascript: void(0);" onClick="window.open('<?=RELATIVE_PATH?>/controller/directories/control/business/task/delete/directory/<?=$_REQUEST["directory"]?>','','resizable=no,scrollbars=1,width=420,height=280')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder_delete.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'REMOVE_FOLDER')?></a></li>
                    </ul>
                </div>
            <?}?>
            <?if ($response["values"] != false ){?>
                <ul>
                    <?foreach ($response["values"] as $register){
                      $count++;?>
                    <li>
                        <div class="rank">
                            <a href="javascript: void(0);"><img id="star0_1" src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" onClick="doImage('star0_1','<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif');doImage('star0_2','<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif');doImage('star0_3','<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif');callUpdateArticleRate(16979,1);" border="0" /></a>
                            <a href="javascript: void(0);"><img id="star0_2" src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" onClick="doImage('star0_1','<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif');doImage('star0_2','<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif');doImage('star0_3','<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif');callUpdateArticleRate(16979,2);" border="0" /></a>
                            <a href="javascript: void(0);"><img id="star0_3" src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" onClick="doImage('star0_1','<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif');doImage('star0_2','<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif');doImage('star0_3','<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif');callUpdateArticleRate(16979,3);" border="0" /></a>
                            <script>lightingStars(0,0);</script>
                        </div>
                        <div class="articleBlock">
                            <i><?=$register["authors"]?></i>
                            <a href="<?=$register["docURL"]?>" target="_blank"><b><?=$register["docTitle"]?></b></a>
                            <i><?=$register["serial"]?>, <?=$register["year"]?>, vol:<?=$register["volume"]?>, n. <?=$register["number"]?>, suppl. n. <?=$register["suppl"]?>, ISSN <?=$register["issn"]?></i>
                            <?if ($register["citedStat"] or $register["accessStat"]){?>
                            <div class="services">
                                <?if ($register["citedStat"] == true){?><span class="trackAccess"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/stats4.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'MONITOR_ACCESS')?></span><?}?>
                                <?if ($register["accessStat"] == true){?><span class="trackCitation"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/stats2.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'MONITOR_CITATION')?></span><?}?>
                            </div>
                            <?}?>
                            <div class="actions">
                                <a class="remove" href="javascript: void(0);" onclick="removeFromShelf('/applications/scielo-org/services/removeArticleFromShelf.php?PID=S1134-80462007000200003')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/doc_delete.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'REMOVE_FROM_COLLECTION')?></a> |
                                <a class="move" href="javascript: void(0);" onclick="window.open('moveToDirectory.php?shelf_id=16979','','resizable=no,width=420,height=420')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/doc_move.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'MOVE_TO')?></a> |
                                <a class="fulltext" href="<?=$register["docURL"]?>" target="_blank"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/fullText.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'FULL_TEXT')?></a>
                            </div>
                        </div>
                    </li>
                    <?}?>
                </ul>
            <?}else{?>
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
                <li><a href="sort/date/directory/0"><?=$trans->getTrans($_REQUEST["action"],'DATE')?></a></li>
                <li><a href="sort/rate/directory/0"><?=$trans->getTrans($_REQUEST["action"],'MY_RANK')?></a></li>
            </ul>
        </div>
    </div> <!-- end webServices -->
</div> <!-- end serviceColumn -->
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>