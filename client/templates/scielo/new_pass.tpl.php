<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<body>
	<h3><span><?=$trans->getTrans($_REQUEST["action"],'TITLE')?></span></h3>
	<form method="post" action="<?=RELATIVE_PATH?>/controller/new_pass">
		<input type="hidden" name="control" value="business" />
		<input type="hidden" name="action" value="new_pass" />
	    <table>
	        <tr>
	            <td><label><?=$trans->getTrans($_REQUEST["action"],'LOGIN')?></label>:</td>
	            <td><input type="text" name="userID" maxlenght="50" class="expression"/></td>
	        </tr>	        
	        <tr>
                    <td>&#160;</td>
	            <td>
                        <input class="submit" type="submit" value="<?=$trans->getTrans($_REQUEST["action"],'SUBMIT')?>"/>
                        <input type="button" value="<?=$trans->getTrans($_REQUEST["action"],'CANCEL')?>" class="submitFalse" onClick="window.close(); " />
                    </td>
	        </tr>
	    </table>		
	</form>
	<?if ($response["status"] === false){?>
	    <div class="alert"><?=$trans->getTrans($_REQUEST["action"],'INVALID_LOGIN')?></div>
	<?}?>
</body>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>
