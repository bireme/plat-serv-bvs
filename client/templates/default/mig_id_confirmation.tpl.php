<?require_once(dirname(__FILE__)."/header.tpl.php");?>
<body>    
    <? if (isset($response) && $response["status"] == false) { ?>
        <h2>Login inválido</h2>
        <a href="<?=RELATIVE_PATH?>/controller/authentication">Voltar</a>
    <?}?>
    <?if ($_REQUEST['userTK']){ ?>
        <h3><span><?=$trans->getTrans($_REQUEST["action"],'TITLE')?></span></h3>
        <form name="cadastro" method="post" action="<?=RELATIVE_PATH?>/controller/mig_id_confirmation">
            <input type="hidden" name="control" value="business" />
            <input type="hidden" name="action" value="mig_id_confirmation" />
            <input type="hidden" name="task" value="migrationConfirm" />
            <input type="hidden" name="lang" value="{$_REQUEST.lang}" />

            <input type="hidden" name="tmpTK" value="<?=base64_decode($_REQUEST['userTK'])?>" />

            <table>
                <tr>
                    <td><label><?=$trans->getTrans($_REQUEST["action"],'LOGIN')?></label>:</td>
                    <td><input type="text" name="userID" maxlenght="50" class="expression" value="<?=base64_decode($_REQUEST['userID'])?>"/></td>
                    <div id='cadastro_userID_errorloc' class="tfvNormal"></div>
                </tr>
                <tr>
                    <td>&#160;</td>
                    <td><input class="submit" type="submit" value="<?=$trans->getTrans($_REQUEST["action"],'CONFIRM')?>"/></td>
                </tr>
            </table>

        </form>
    <?}?>
    <?
    if ($response["status"] == true) {
        header('Location:'. RELATIVE_PATH .'/controller/authentication');
        die();
    }
    ?>
    <?if ($_REQUEST['userTK']){ ?>
        <script language="JavaScript" type="text/javascript">
            //You should create the validator only after the definition of the HTML form
            var frmvalidator  = new Validator("cadastro");
            //frmvalidator.EnableOnPageErrorDisplaySingleBox();
            frmvalidator.EnableOnPageErrorDisplay();
            frmvalidator.EnableMsgsTogether();

            frmvalidator.addValidation("userID","maxlen=50");
            frmvalidator.addValidation("userID","req","Preenchimento obrigatório.");
            frmvalidator.addValidation("userID","email","Login inválido. Digite um email válido que será usado como seu login.");
        </script>
    <?}?>
</body>
<?require_once(dirname(__FILE__)."/footer.tpl.php");?>