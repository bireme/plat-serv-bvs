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
require_once(dirname(__FILE__)."/../classes/Tools.php");
require_once(dirname(__FILE__)."/../classes/ToolsAuthentication.php");

$acao = isset($_REQUEST['acao'])?$_REQUEST['acao']:'default';
$oldPassword = isset($_REQUEST['oldPassword'])?$_REQUEST['oldPassword']:false;
$newPassword = isset($_REQUEST['newPassword'])?$_REQUEST['newPassword']:false;
$callerURL = !empty($_REQUEST['c'])?base64_decode($_REQUEST['c']):false;
$source = $_SESSION['source'] ? $_SESSION['source'] : false;

if ( empty($_SESSION['userTK']) || ( $source && !in_array($source, array('default', 'ldap')) ) ) {
    header("Location: ".RELATIVE_PATH."/controller/authentication");
}

if ( !empty($_GET['userTK']) ) {
    $arrUserData = Token::unmakeUserTK($_GET['userTK']);
}

$userID = isset($arrUserData)?$arrUserData['userID']:false;

if ( 'atualizar' == $acao && $oldPassword && $newPassword && $userID ) {
    $retValue = false;

    if( $userID && filter_var($userID, FILTER_VALIDATE_EMAIL) ) {
        $retValue = UserDAO::changePassword($userID, $oldPassword, $newPassword);
 
        if( $retValue === false )
            $sysMsg = NEWPASS_CHANGE_ERROR;
        elseif( 'DomainNotPermitted' === $retValue )
            $sysMsg = NEWPASS_DOMAIN_NOT_PERMITTED;
        elseif( 'invalidpass' === $retValue )
            $sysMsg = NEWPASS_INVALID_PASSWORD;
        else
            $sysMsg = USER_PASSWORD_UPDATE;
    } else {
        $sysMsg = NEWPASS_CHANGE_ERROR;
    }
}

$DocTitle = CHANGE_PASSWORD;

require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/header.tpl.php");
require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/sidebar.tpl.php");
require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/nav.tpl.php");
?>

	<div id="wrap">
		<div class="row box1">
			<div class="col s12">
				<h5 class="title1"><i class="fas fa-unlock-alt left"></i> <?php echo CHANGE_PASSWORD; ?></h5>
				<div class="divider"></div>
			</div>
			<?php if ( $retValue === true ) : ?>
				<div class="col s12">
					<div class="card-panel green success-text">
						<i class="close material-icons right white-text dismiss" style="cursor: pointer;">close</i>
						<i class="material-icons white-text left" style="cursor: default;">check_circle</i>
						<span class="white-text"><?php echo $sysMsg; ?></span>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( $retValue === false || 'DomainNotPermitted' === $retValue || 'invalidpass' === $retValue ) : ?>
				<div class="col s12">
					<div class="card-panel red success-text">
						<i class="close material-icons right white-text dismiss" style="cursor: pointer;">close</i>
						<i class="material-icons white-text left" style="cursor: default;">report_problem</i>
						<span class="white-text"><?php echo $sysMsg; ?></span>
					</div>
				</div>
			<?php endif; ?>
			<section class="col s12">
				<div class="box1">
                    <form method="post" id="changepass" name="changepass" class="col s12" novalidate>
                        <input type="hidden" value="atualizar" name="acao" />
						<div class="row">
							<div class="input-field col s12 center-align">
								<img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/user.svg" class="circle" width="150" alt="Avatar User">
							</div>
							<div class="input-field col s12">
								<input id="oldPassword" name="oldPassword" type="password" class="bgInputs" autocomplete="off" required="">
								<label for="oldPassword">* <?php echo FIELD_OLD_PASSWORD; ?></label>
							</div>
							<div class="input-field col s12">
								<input id="newPassword" name="newPassword" type="password" class="bgInputs" autocomplete="off" required="">
								<label for="newPassword">* <?php echo FIELD_NEW_PASSWORD; ?></label>
							</div>
							<div class="input-field col s12">
								<input id="confirmPassword" name="confirmPassword" type="password" class="bgInputs" autocomplete="off" required="">
								<label for="confirmPassword">* <?php echo FIELD_NEW_PASSWORD_CONFIRM; ?></label>
							</div>
							<div class="right">
								<input type="submit" class="btn btnSuccess hoverable" value="<?php echo BUTTON_UPDATE_USER; ?>">
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>
		<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/info.tpl.php"); ?>
		<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/more.tpl.php"); ?>
	</div>

	<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/footer.tpl.php"); ?>