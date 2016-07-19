<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<?require_once(dirname(__FILE__)."/top.tpl.php");?>
<div class="breadCrumb">
    <a href="/"><?=$trans->getTrans($_REQUEST["action"],'HOME')?></a> &gt; <?=$trans->getTrans($_REQUEST["action"],'MY_ALERTS')?>
</div>
<div class="middle">
    <div class="content">
        <h3><span><?=$trans->getTrans($_REQUEST["action"],'MY_ALERTS')?></span></h3>
        <div class="articlelist">
            <?if ($_REQUEST["task"] != "cited"){?>
                <div class="topicFolder">
                    <H4><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/stats2.gif"/><span><?=$trans->getTrans($_REQUEST["action"],'ACCESS_LIST')?></span></H4>
                    <div class="spacer">&#160;</div>
                </div>
                <?if ($response["values"]["accessList"] != false ){?>
                    <ul>
                        <?foreach ($response["values"]["accessList"] as $register){
                          $count++;?>
                        <li>
                            <div class="articleBlock">
                                <i><?=$register["authors"]?></i>
                                <a href="<?=$register["docURL"]?>" target="_blank"><b><?=$register["title"]?></b></a>
                                <i><?=$register["serial"]?><?php if(!empty($register["year"])){echo ', ' . $register["year"];} ?><?=$register["year"]?><?php if(!empty($register["volume"])){echo ', vol:' . $register["volume"];} ?><?php if(!empty($register["number"])){echo ', n.' . $register["number"];} ?><?php if(!empty($register["suppl"])){echo ', suppl.' . $register["suppl"];} ?><?php if(!empty($register["issn"])){echo ', ISSN:' . $register["issn"];} ?>.</i>
                                <div class="actions">
                                    <a class="remove" href="<?=RELATIVE_PATH?>/controller/myalerts/control/business/task/deleteaccess/alert/<?=$register["docID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/doc_delete.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'REMOVE_ALERT')?></a> |
                                    <a class="fulltext" href="<?=$register["docURL"]?>" target="_blank"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/fullText.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'FULL_TEXT')?></a>
                                </div>
                            </div>
                        </li>
                        <?}?>
                    </ul>
                <?}else{?>
                    <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ACCESS_LIST_NO_REGISTERS_FOUND')?></div>
                <?}?>
            <?}?>
            <?if ($_REQUEST["task"] != "access"){?>
                <div class="topicFolder">
                    <H4><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/history.gif"/><span><?=$trans->getTrans($_REQUEST["action"],'CITED_LIST')?></span></H4>
                    <div class="spacer">&#160;</div>
                </div>                
                <?if ($response["values"]["citedList"] != false ){?>
                    <ul>
                        <?foreach ($response["values"]["citedList"] as $register){
                          $count++;?>
                        <li>
                            <div class="articleBlock">
                                <i><?=$register["authors"]?></i>
                                <a href="<?=$register["docURL"]?>" target="_blank"><b><?=$register["title"]?></b></a>
                                <i><?=$register["serial"]?><?php if(!empty($register["year"])){echo ', ' . $register["year"];} ?><?=$register["year"]?><?php if(!empty($register["volume"])){echo ', vol:' . $register["volume"];} ?><?php if(!empty($register["number"])){echo ', n.' . $register["number"];} ?><?php if(!empty($register["suppl"])){echo ', suppl.' . $register["suppl"];} ?><?php if(!empty($register["issn"])){echo ', ISSN:' . $register["issn"];} ?>.</i>
                                <div class="actions">
                                    <a class="remove" href="<?=RELATIVE_PATH?>/controller/myalerts/control/business/task/deletecited/alert/<?=$register["docID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/doc_delete.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'REMOVE_ALERT')?></a> |
                                    <a class="fulltext" href="<?=$register["docURL"]?>" target="_blank"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/fullText.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'FULL_TEXT')?></a>
                                </div>
                            </div>
                        </li>
                        <?}?>
                    </ul>
                <?}else{?>
                    <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'ACCESS_LIST_NO_REGISTERS_FOUND')?></div>
                <?}?>
            <?}?>
        </div>
    </div>
</div>
<div class="serviceColumn">
    <div class="box">
        <h3><span><?=$trans->getTrans($_REQUEST["action"],'TOOLS')?></span></h3>
        <div id="rssFeeds">
            <ul>
                <li><a href="<?=RELATIVE_PATH?>/controller/myalerts/control/business/task/access"><?=$trans->getTrans($_REQUEST["action"],'SHOW_ACCESS_LIST')?></a></li>
                <li><a href="<?=RELATIVE_PATH?>/controller/myalerts/control/business/task/cited"><?=$trans->getTrans($_REQUEST["action"],'SHOW_CITED_LIST')?></a></li>
                <li><a href="<?=RELATIVE_PATH?>/controller/myalerts/control/business"><?=$trans->getTrans($_REQUEST["action"],'SHOW_ALL')?></a></li>
            </ul>
        </div>
    </div>
</div> <!-- end serviceColumn -->
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>