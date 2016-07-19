<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<div class="breadCrumb">
    <a href="/"><?=$trans->getTrans($_REQUEST["action"],'HOME')?></a>&gt; <?=$trans->getTrans($_REQUEST["action"],'MY_NEWS')?>
</div>
<div class="middle">
    <div class="content">
        <h3><span><?=$trans->getTrans($_REQUEST["action"],'MY_NEWS')?></span></h3>
        <div class="articlelist">
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
                            <!--div class="count"><?=$count?></div-->
                            <i><a href="<?=$register["url"]?>" target="_blank"><?=$register["name"]?></a></i>
                            <div class="url"><?=$register["url"]?></div>
                            <div class="description"><?=$register["description"]?></div>
                            <div class="actions">
                                <a class="remove" href="<?=RELATIVE_PATH?>/controller/mynews/control/business/task/delete/news/<?=$register["newsID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder_delete.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'REMOVE_NEWS')?></a> |
                                <a class="edit" href="javascript: void(0);" onClick="window.open('<?=RELATIVE_PATH?>/controller/mynews/control/business/task/edit/news/<?=$register["newsID"]?>','','resizable=no,scrollbars=1,width=420,height=280')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/folder_edit.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'EDIT_NEWS')?></a> |
                                <?if ($register["inHome"] == true){?>
                                    <a class="inhome" href="<?=RELATIVE_PATH?>/controller/mynews/control/business/task/notinhome/news/<?=$register["newsID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/removeFromHome.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'HIDE_FROM_HOME')?></a>
                                <?}else{?>
                                    <a class="notinhome" href="<?=RELATIVE_PATH?>/controller/mynews/control/business/task/inhome/news/<?=$register["newsID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/addToHome.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'SHOW_IN_HOME')?></a>
                                <?}?>
                            </div>
                        </div>
                    </li>
                    <?}?>
                </ul>
            <?}else{?>
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
                <li><a href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/mynews/control/view/task/add','','resizable=no,width=420,height=280')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/add-item-red.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'ADD_NEWS')?></a></li>
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