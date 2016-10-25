<?
    if ( in_array( $_REQUEST["task"], array( 'rate', 'delete' ) ) )
            header("Location: " . $_SERVER['HTTP_REFERER']);
?>

<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<?require_once(dirname(__FILE__)."/top.tpl.php");?>

<div class="breadCrumb">
    <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/authentication"><?=$trans->getTrans($_REQUEST["action"],'HOME')?></a>&gt; <?=$trans->getTrans($_REQUEST["action"],'MY_LINKS')?>
</div>
<div class="middle">
    <div class="content">
        <h3><span><?=$trans->getTrans($_REQUEST["action"],'MY_LINKS')?></span></h3>
        <div class="articlelist">
            <?if ($response["values"] != false ){
                echo $objPaginator->show($trans->getTrans($_REQUEST["action"],'PAGE'));
                ?>
                <ul>
                    <?foreach ($response["values"] as $register){
                      $count++;?>
                    <li>
                        <div class="rank">
                            <?if ($register["rate"] >= 1){?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/0"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/1"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" border="0" /></a><?}?>
                            <?if ($register["rate"] >= 2){?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/1"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/2"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" border="0" /></a><?}?>
                            <?if ($register["rate"] >= 3){?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/2"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0" /></a><?}else{?><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/rate/link/<?=$register["linkID"]?>/grade/3"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOff.gif" border="0" /></a><?}?>
                        </div>
                        <div class="articleBlock">
                            <!--div class="count"><?=$count?></div-->
                            <i><a href="<?=$register["url"]?>" target="_blank"><?=$register["name"]?></a></i>
                            <div class="url"><a href="<?=$register["url"]?>" target="_blank"><?=$register["url"]?></a></div>
                            <div class="description"><?=$register["description"]?></div>
                            <div class="actions">
                                <a class="remove" href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/delete/link/<?=$register["linkID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/link_delete.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'REMOVE_LINK')?></a> |
                                <a class="edit" href="javascript: void(0);" onClick="window.open('<?=RELATIVE_PATH?>/controller/mylinks/control/business/task/edit/link/<?=$register["linkID"]?>','','resizable=no,scrollbars=1,width=420,height=280')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/link_edit.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'EDIT_LINK')?></a>
                            </div>
                        </div>
                    </li>
                    <?}?>
                </ul>
            <?
                echo $objPaginator->show($trans->getTrans($_REQUEST["action"],'PAGE'));
            }else{?>
                <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'MY_LINKS_NO_REGISTERS_FOUND')?></div>
            <?}?>
        </div>
    </div>
</div>
<div class="serviceColumn">
    <div class="box">
        <h3><span><?=$trans->getTrans($_REQUEST["action"],'TOOLS')?></span></h3>
        <div id="rssFeeds">
            <ul>
                <li><a href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/mylinks/control/view/task/add','','resizable=no,width=420,height=280')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/link_add.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'ADD_LINK')?></a></li>
            </ul>
        </div>
    </div>
    <div class="box">
        <h3><span><?=$trans->getTrans($_REQUEST["action"],'SHOW_BY')?></span></h3>
        <div id="sortedBy">
            <ul>
                <li><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/sort/date"><?=$trans->getTrans($_REQUEST["action"],'DATE')?></a></li>
                <li><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business/sort/rate"><?=$trans->getTrans($_REQUEST["action"],'MY_RANK')?></a></li>
            </ul>
        </div>
    </div> <!-- end webServices -->
</div> <!-- end serviceColumn -->
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>