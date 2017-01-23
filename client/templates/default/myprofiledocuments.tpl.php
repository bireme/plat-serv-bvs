<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<?require_once(dirname(__FILE__)."/sidebar.tpl.php");?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="middle">
        <div class="content">
            <h2><span><?=$trans->getTrans($_REQUEST["action"],'MY_PROFILES')?></span></h2>

            <div class="articlelist">
                <?if ($responseProfile["values"] != false ){
                    $registerProfile = $responseProfile["values"][0];?>
                    <div class="topicFolder">
                       <h3><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/articleFolder.gif"/><span><?=$registerProfile["profileName"]?></span></h3>
                    </div>
                    <div class="folderTools">
                        <ul>
                            <li><a class="edit" href="javascript: void(0);" onClick="window.open('<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business/task/edit/profile/<?=$registerProfile["profileID"]?>','','resizable=no,scrollbars=1,width=420,height=385')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/edit-page-yellow.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'EDIT_PROFILE')?></a></li>
                            <li><a class="remove" href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business/task/delete/profile/<?=$registerProfile["profileID"]?>"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/delete-folder-orange.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'REMOVE_PROFILE')?></a></li>
                        </ul>
                    </div>
                    <div class="articleBlock">
                        <div class="description"><?=$trans->getTrans($_REQUEST["action"],'PROFILE_KEYWORDS')?>: <?=$registerProfile["profileText"]?></div>
                    </div>
                    <h3><span><?=$trans->getTrans($_REQUEST["action"],'SIMILARS_IN')?>:</span></h3>
                    <?if ($responseSimilarDocs["status"] === true){?>
                    <ul>
                        <?foreach ($responseSimilarDocs["values"] as $similar){
                          $count++;
                        ?>
                        <li>
                            <div class="articleBlock">
                                <i><?php echo implode("; ", $similar["au"]); ?></i>
                                <a href="<?php echo $similar["ur"]; ?>" target="_blank"><b><?php echo implode(" / ", $similar["ti"]); ?></b></a>
                            </div>
                        </li>
                        <?}?>
                    </ul>
                    <?}else{?>
                        <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'SERVICE_TEMPORARY_UNAVAILABLE')?></div>
                    <?}?>
                <?}else{?>
                    <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'MY_PROFILES_NO_REGISTERS_FOUND')?></div>
                <?}?>
            </div>

        </div>
    </div>
    <div class="serviceColumn">
        <div class="box">
            <h3><span><?=$trans->getTrans($_REQUEST["action"],'TOOLS')?></span></h3>
            <div id="rssFeeds">
                <ul>
                    <li><a href="javascript: void(0);" onclick="window.open('<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/view/task/add','','resizable=no,width=420,height=385')"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/add-folder-orange.gif" border="0"/><?=$trans->getTrans($_REQUEST["action"],'ADD_PROFILE')?></a></li>
                </ul>
            </div>
        </div>
        <div class="box">
            <h3><span><?=$trans->getTrans($_REQUEST["action"],'PROFILES')?></span></h3>
            <?if ($response["values"] != false ){?>
                <ul>
                    <div id="rssFeeds">
                    <?foreach ($response["values"] as $register){
                         $count++;?>
                        <li><a href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business/profile/<?=$register["profileID"]?>/mode/<?=$_REQUEST["mode"]?>"><?=$register["profileName"]?></a><?if ($register["profileDefault"] == 1){?>&nbsp;<img class="starOn" src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/starOn.gif" border="0"/><?}?></li>
                    <?}?>
                    </div>
                </ul>
            <?}?>
            </div>
        </div>
    </div> <!-- end serviceColumn -->
</div>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>