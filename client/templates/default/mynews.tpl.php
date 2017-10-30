<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<?require_once(dirname(__FILE__)."/top.tpl.php");?>
<div class="breadCrumb">
    <a href="<?=RELATIVE_PATH?>/controller/authentication"><?=$trans->getTrans($_REQUEST["action"],'HOME')?></a>&gt; <?=$trans->getTrans($_REQUEST["action"],'MY_NEWS')?>
</div>
<div class="middle">
    <div class="content">
        <h3><span><?=$trans->getTrans($_REQUEST["action"],'MY_NEWS')?></span></h3>
        <div class="articlelist">
            <?if ($response["values"] != false ){
                echo $objPaginator->show($trans->getTrans($_REQUEST["action"],'PAGE'));
                ?>
                <ul>
                    <?foreach ($response["values"] as $register){
                      $count++;?>
                    <li>
                        <div class="rank">
                            <?if ($register["rate"] >= 1){?><a href="<?=RELATIVE_PATH?>/controller/mynews/control/business/task/rate/news/<?=$register["newsID"]?>/grade/0"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mynews/control/business/task/rate/news/<?=$register["newsID"]?>/grade/1"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" border="0" /></a><?}?>
                            <?if ($register["rate"] >= 2){?><a href="<?=RELATIVE_PATH?>/controller/mynews/control/business/task/rate/news/<?=$register["newsID"]?>/grade/1"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mynews/control/business/task/rate/news/<?=$register["newsID"]?>/grade/2"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" border="0" /></a><?}?>
                            <?if ($register["rate"] >= 3){?><a href="<?=RELATIVE_PATH?>/controller/mynews/control/business/task/rate/news/<?=$register["newsID"]?>/grade/2"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mynews/control/business/task/rate/news/<?=$register["newsID"]?>/grade/3"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" border="0" /></a><?}?>
                        </div>
                        <div class="articleBlock">
                            <!--div class="count"><?=$count?></div-->
                            <i><a href="<?=$register["url"]?>" target="_blank"><?=$register["name"]?></a></i>
                            <div class="url"><a href="<?=$register["url"]?>" target="_blank"><?=$register["url"]?></a></div>
                            <div class="description"><?=$register["description"]?></div>
                            <div class="actions">
                                <a class="remove" href="<?=RELATIVE_PATH?>/controller/mynews/control/business/task/delete/news/<?=$register["newsID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder_delete.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'REMOVE_NEWS')?></a> |
                                <a class="edit" href="javascript:;" onClick="window.open('<?=RELATIVE_PATH?>/controller/mynews/control/business/task/edit/news/<?=$register["newsID"]?>','','resizable=no,scrollbars=1,width=420,height=280')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder_edit.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'EDIT_NEWS')?></a>
                            </div>
                        </div>
                    </li>
                    <?}?>
                </ul>
            <?
                echo $objPaginator->show($trans->getTrans($_REQUEST["action"],'PAGE'));
            }else{?>
                <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'MY_NEWS_NO_REGISTERS_FOUND')?></div>
            <?}?>
        </div>
    </div>
</div>
<div class="serviceColumn">
    <div class="box">
        <h3><span><?=$trans->getTrans($_REQUEST["action"],'TOOLS')?></span></h3>
        <div id="rssFeeds">
            <ul>
                <li><a href="javascript:;" onclick="window.open('<?=RELATIVE_PATH?>/controller/mynews/control/view/task/add','','resizable=no,width=420,height=280')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/add-item-red.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'ADD_NEWS')?></a></li>
            </ul>
        </div>
    </div>
    <div class="box">
        <h3><span><?=$trans->getTrans($_REQUEST["action"],'SHOW_BY')?></span></h3>
        <div id="sortedBy">
            <ul>
                <li><a href="<?=RELATIVE_PATH?>/controller/mynews/control/business/sort/date"><?=$trans->getTrans($_REQUEST["action"],'DATE')?></a></li>
                <li><a href="<?=RELATIVE_PATH?>/controller/mynews/control/business/sort/rate"><?=$trans->getTrans($_REQUEST["action"],'MY_RANK')?></a></li>
            </ul>
        </div>
    </div> <!-- end webServices -->
</div> <!-- end serviceColumn -->
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>