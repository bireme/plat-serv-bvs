<div class="top">
    <div class="left"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/banner.jpg" border="0"/></div>
    <div class="right">
    <?if ($_SESSION["lang"] != "pt"){?><span class="português"><a href="<?=$_SERVER["REQUEST_URI"]?>/lang/pt">português</a></span><?}?>
    <?if ($_SESSION["lang"] != "es"){?><span class="português"><a href="<?=$_SERVER["REQUEST_URI"]?>/lang/es">español</a></span><?}?>
    <?if ($_SESSION["lang"] != "en"){?><span class="português"><a href="<?=$_SERVER["REQUEST_URI"]?>/lang/en">english</a></span><?}?>
    </div>
    <div class="spacer">&#160;</div>
</div>