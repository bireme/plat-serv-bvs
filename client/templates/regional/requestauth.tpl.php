<?require_once(dirname(__FILE__)."/iframe_header.tpl.php");?>
<? $b64HttpHost = base64_encode($_SERVER["HTTP_HOST"]); ?>
<div class="login_btn">
    <a href="<?=RELATIVE_PATH?>/controller/authentication/origin/<?=base64_encode("http://".$_SERVER["HTTP_HOST"])?>" target="_parent"><span class="btn_l"><?=$trans->getTrans($_REQUEST["action"],'LOGIN')?></span><span class="btn_r"><?=$trans->getTrans($_REQUEST["action"],'FOR_SERVICES')?></span></a>
</div>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>
