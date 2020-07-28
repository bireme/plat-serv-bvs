<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

ob_start("ob_gzhandler");
session_start();
require_once(dirname(__FILE__)."/include/includes.php");
require_once(dirname(__FILE__)."/translations.php");
require_once(dirname(__FILE__)."/../classes/UserDAO.php");
require_once(dirname(__FILE__)."/../classes/ToolsAuthentication.php");

$path = rtrim($_SERVER['PHP_SELF'], '/');

$acao = isset($_REQUEST['acao'])?$_REQUEST['acao']:'default';
$email = !empty($_REQUEST['email']) ? trim($_REQUEST['email']) : false;
$userKey = !empty($_REQUEST['key']) ? $_REQUEST['key'] : false;
$callerURL = !empty($_REQUEST['c'])?base64_decode($_REQUEST['c']):false;
$user = !empty($_REQUEST['user']) ? $_REQUEST['user'] : false;

switch($acao){
    case "enviar":
        $retValue = false;

        if( filter_var($user, FILTER_VALIDATE_EMAIL) ) {
            $retValue = UserDAO::sendNewPassConfirm(trim($user), 'pass');
     
            if( $retValue === false )
                $sysMsg = NEWPASS_CREATE_ERROR;
            elseif( 'DomainNotPermitted' === $retValue )
                $sysMsg = NEWPASS_DOMAIN_NOT_PERMITTED;
            else
                $sysMsg = NEWPASS_SEND_CONFIRMATION;
        } else {
            $sysMsg = NEWPASS_CREATE_ERROR;
        }

        break;
    case "confirmar":
        $result = UserDAO::userConfirm($email, $userKey, 'pass');

        if($result === true){
            $retValue = UserDAO::createNewPassword($email);

            if( $retValue === false )
                $sysMsg = NEWPASS_CREATE_ERROR;
            elseif( 'DomainNotPermitted' === $retValue )
                $sysMsg = NEWPASS_DOMAIN_NOT_PERMITTED;
            else
                $sysMsg = NEWPASS_PASSWORD_SENT;
        }

        break;
}

$DocTitle = FORGOT_PASSWORD;
?>

<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/header.tpl.php"); ?>

	<section  class="container">
		<div id="recover" class="col-12">
			<div id="lang">
   				<?php foreach ($languages as $key => $value) : ?>
                	<?php if ( $key == $_SESSION['lang'] ) continue; ?>
                	<a href="<?php echo '?c='.$_REQUEST['c'].'&lang='.$key; ?>"><?php echo $value; ?></a>
            	<?php endforeach; ?>
  			</div>
			<div class="row">
				<div class="col s12 l4" id="logoRecover">
					<a href="<?php echo RELATIVE_PATH; ?>/controller/authentication"><img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/logo-<?php echo $_SESSION["lang"]; ?>.png" alt="Logo MiBVS" class="responsive-img"></a>
				</div>
				<div class="col s12 l8" id="logoRecoverBireme">
					<img src="http://logos.bireme.org/img/<?php echo $_SESSION["lang"]; ?>/v_bir_color.svg" class="responsive-img" alt="Logo BIREME">
				</div>
			</div>
			<div class="divider"></div>
			<div class="row">
				<div class="col s12">
					<?php if ( $retValue === true ) : ?>
						<div class="card-panel green success-text">
							<i class="close material-icons right white-text dismiss" style="cursor: pointer;">close</i>
							<i class="material-icons white-text left" style="cursor: default;">check_circle</i>
		    				<span class="white-text"><?php echo $sysMsg; ?></span>
		  				</div>
					<?php endif; ?>
					<h4><?php echo RECOVER_PASSWORD; ?></h4>
					<?php echo FORGOT_PASSWORD_MESSAGE; ?>
				</div>
			</div>
			<div class="row">
				<form method="post" id="forgotpass" name="forgotpass" class="form-horizontal form-label-left" novalidate>
					<div class="input-field col s12 l6 offset-l3">
						<i class="material-icons prefix">email</i>
						<input id="user" name="user" type="email" data-validate-length-range="0,50">
						<input type="hidden" value="enviar" name="acao" />
						<label for="user"><?php echo FIELD_LOGIN; ?></label>
						<?php if ( $retValue === false || 'DomainNotPermitted' === $retValue ) : ?>
							<span class="helper-text red-text error-text"><?php echo $sysMsg; ?></span>
						<?php endif; ?>
					</div>
					<div class="col s12 center-align">
						<button class="btn waves-effect waves-light btnPrimary btn-send" type="submit" name="action"><?php echo BUTTON_SEND; ?></button>
					</div>
				</form>
			</div>
		</div>
	</section>

	<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/info.tpl.php"); ?>

<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/footer.tpl.php"); ?>