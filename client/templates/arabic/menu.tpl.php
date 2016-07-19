<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<div class="content">
    <h3><span><?=$trans->getTrans($_REQUEST["action"],'USERS_SERVICES')?></span></h3>
    <div class="menu">
        <div class="invitation">
            <?=$trans->getTrans($_REQUEST["action"],'OLA')?> <?=$_SESSION["userFirstName"]?> |
            <a href="#"><?=$trans->getTrans($_REQUEST["action"],'MY_DATA')?></a> |
            <a href="#"><?=$trans->getTrans($_REQUEST["action"],'LOGOUT')?></a>
        </div>
        <ul>
            <li><a href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business" target="_parent"><?=$trans->getTrans($_REQUEST["action"],'MY_PROFILE_DOCUMENTS')?></a></li>
            <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business" target="_parent"><?=$trans->getTrans($_REQUEST["action"],'MY_SHELF')?></a></li>
            <li><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business" target="_parent"><?=$trans->getTrans($_REQUEST["action"],'MY_LINKS')?></a></li>
            <li><a href="<?=RELATIVE_PATH?>/controller/mynews/control/business" target="_parent"><?=$trans->getTrans($_REQUEST["action"],'MY_NEWS')?></a></li>
            <li><a href="<?=RELATIVE_PATH?>/controller/myalerts/control/business" target="_parent"><?=$trans->getTrans($_REQUEST["action"],'MY_ALERTS')?></a></li>
        </ul>
        <div class="alert"><?$trans->getTrans($_REQUEST["action"],'FORGOT_MY_PASSWORD')?></div>
    </div>
</div>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>


