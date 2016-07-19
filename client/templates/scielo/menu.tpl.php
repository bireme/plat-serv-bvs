<?require_once(dirname(__FILE__)."/iframe_header.tpl.php");?>

<? $b64HttpHost = base64_encode($_SERVER["HTTP_HOST"]); ?>

<div class="content">
    <div class="menu">
        <div class="invitation">
            <?=$_SESSION["userFirstName"]?> |
            <div class="item"><a target="_parent" href="<?=SERVICES_PLATFORM_DOMAIN?>/pub/userData.php?userTK=<?=urlencode($_SESSION["userTK"])?>&c=<?=$b64HttpHost?>&lang=<?=$_SESSION['lang']?>"><?=$trans->getTrans($_REQUEST["action"],'MY_DATA')?> </a></div> |
            <div class="item"><a href="<?=RELATIVE_PATH?>/controller/logout/control/business"><?=$trans->getTrans($_REQUEST["action"],'LOGOUT')?></a></div>
        </div>
        <ul>
            <li><a href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business" target="_parent"><?=$trans->getTrans($_REQUEST["action"],'MY_PROFILE_DOCUMENTS')?></a></li>
            <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business" target="_parent"><?=$trans->getTrans($_REQUEST["action"],'MY_SHELF')?></a></li>
            <li><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business" target="_parent"><?=$trans->getTrans($_REQUEST["action"],'MY_LINKS')?></a></li>
            <li><a href="<?=RELATIVE_PATH?>/controller/mynews/control/business" target="_parent"><?=$trans->getTrans($_REQUEST["action"],'MY_NEWS')?></a></li>
            <li><a href="<?=RELATIVE_PATH?>/controller/myalerts/control/business" target="_parent"><?=$trans->getTrans($_REQUEST["action"],'MY_ALERTS')?></a></li>
        </ul>
    </div>
</div>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>


