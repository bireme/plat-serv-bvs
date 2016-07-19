<div class="bar">
    <div id="otherVersions">
        <ul>
            <?if ($_SESSION["lang"] != "pt"){?><li><span class="pt"><a href="<?=$_SERVER["REQUEST_URI"]?>/lang/pt">português</a></span></li><?}?>
            <?if ($_SESSION["lang"] != "es"){?><li><span class="es"><a href="<?=$_SERVER["REQUEST_URI"]?>/lang/es">español</a></span></li><?}?>
            <?if ($_SESSION["lang"] != "en"){?><li><span class="en"><a href="<?=$_SERVER["REQUEST_URI"]?>/lang/en">english</a></span></li><?}?>
        </ul>
    </div>
</div>
<div class="top">
    <div id="parent">
        <a href="/"><img alt="<?=$trans->getTrans('general','IDENTIFICATION')?>" title="<?=$trans->getTrans('general','IDENTIFICATION')?>" src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/<?=$trans->getTrans('general','LOGO')?>"/></a>
    </div>
    <div id="identification">
        <h1><span><?=$trans->getTrans('general','IDENTIFICATION')?></span></h1>
    </div>
</div>
<div class="spacer">&#160;</div>
