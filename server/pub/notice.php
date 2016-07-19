<?
ob_start("ob_gzhandler");
session_start();
require_once(dirname(__FILE__)."/include/includes.php");
require_once(dirname(__FILE__)."/translations.php");

$acao = isset($_REQUEST['acao'])?$_REQUEST['acao']:'default';

$callerURL = !empty($_REQUEST['c'])?base64_decode($_REQUEST['c']):false;
?>
<?=DOCTYPE?>
<html>
    <head>
        <title><?=$DocTitle?></title>
        <? require_once(dirname(__FILE__)."/include/head.php"); ?>
        <script language="javascript" src="js/gen_validatorv31.js" ></script>
        <link rel="stylesheet" type="text/css" href="css/styles/regional/main.css" />
    </head>
    <body>
        <div class="container">
            <div id="header">
                <h1 id="logo">
                    <a href="">
                        <span><?=BVSSIGLA?></span>
                    </a>
                </h1>
                <h2><?=BVS?></h2>
                <div id="profile" class="index"></div>
                <div id="idioma">
                    <?if ($lang != "pt"){?><a href='?lang=pt' title='Mudar para português'> Português </a> <?}?>
                    <?if ($lang != "en"){?><a href='?lang=en' title='Switch to English'> English </a> <?}?>
                    <?if ($lang != "es"){?><a href='?lang=es' title='Cambiar para Español'> Español </a> <?}?>

                </div>
                <div id="institutions">
                    <ul>
                        <li><a href="#"><img title="<?=BIREME?>" alt="<?=BIREME?>" src="images/pt/logobir.gif"/></a></li>
                    </ul>
                </div>
                <div id="empty"></div>
            </div>
            <div id="area" class="level2">
                <div class="secondLevel">
                    <? if($callerURL){ ?>
                        <a href="http://<?=$callerURL?>">home</a> &gt; <?=NOTICE?>
                    <?}?>
                    <div id="cache" style="position:absolute;left:0;top:0;z-index:8;display:none;"></div>
                    <span>
                        <? if($callerURL){ ?>
                            <a href="http://<?=$callerURL?>">home</a>&gt;
                        <?}?>
                    </span>
                    <div class="secondLevel">
                        <h3><?=NOTICE?></h3>
                        <?=NOTICE_MESSAGE?>
                    </div>
                    <div class="spacer"></div>
                </div>
                <div class="spacer"></div>
            </div>
            <div id="footer">
                <?=FOOTER_MESSAGE?>
            </div>
        </div>
    </body>
</html>