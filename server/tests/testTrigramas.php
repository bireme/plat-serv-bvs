<b>Params:</b> search[string], source [SciELO.org,LILACS.org]<br/>
<?
require_once("../config.php");
$_REQUEST["search"];
$url = str_replace("#COLLECTION_MODE#",$_REQUEST["source"],TRIGRAMAS_SIMILARS_STRING).$_REQUEST["search"];
echo "<b>URL CONF: </b>".TRIGRAMAS_SIMILARS_STRING."<br/>";
echo "<b>URL: </b>".$url."<br/>";
echo "<hr>";
echo file_get_contents($url);
?>
