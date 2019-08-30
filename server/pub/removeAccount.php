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

$acao      = isset($_REQUEST['acao'])?$_REQUEST['acao']:'default';
$reason    = isset($_REQUEST['reason'])?$_REQUEST['reason']:false;
$details   = isset($_REQUEST['details'])?$_REQUEST['details']:false;
$callerURL = !empty($_REQUEST['c'])?base64_decode($_REQUEST['c']):false;
$source    = $_SESSION['source'] ? $_SESSION['source'] : false;

if ( empty($_SESSION['userTK']) )
    header("Location: ".RELATIVE_PATH."/controller/authentication");

if(!empty($_GET['userTK'])){
    if ( $source && 'bireme_accounts' == $source )
        $arrUserData = Token::unmakeUserTK($_GET['userTK'], true);
    else
        $arrUserData = Token::unmakeUserTK($_GET['userTK']);
}

$userID = isset($arrUserData)?$arrUserData['userID']:false;

if ( 'remover' == $acao && $userID ) {
    if( isset($_POST['acao']) && 'remover' == $_POST['acao'] ){
        if ( $_SESSION['userTK'] ) {
            if ( $source && 'bireme_accounts' == $source )
                $token = Token::unmakeUserTK($_SESSION['userTK'], true);
            else
                $token = Token::unmakeUserTK($_SESSION['userTK']);
        }

        $tokenID = isset($token) ? $token['userID'] : '';

        if( !empty($tokenID) ){
            $g_recaptcha_response = Token::recaptcha_validator($_POST['g-recaptcha-response']);

            if ( $g_recaptcha_response ) {
                $result = UserDAO::removeUser($tokenID, $reason, $details);

                if ( $result )
                    $retValue = true;
                else
                    $retValue = false;
            } else {
                $retValue = false;
            }
        }else{
            $retValue = false;
        }
    } else {
        $retValue = false;
    }

    if ( $retValue ) {
        $sysMsg = USER_REMOVE_ACCOUNT;
        require_once(dirname(__FILE__)."/include/logout.php");
    } else {
        $sysMsg = USER_REMOVE_ACCOUNT_ERROR;
    }
}

if(!empty($userID)){
    $isUser = UserDAO::isUser($userID);
}else{
    $isUser = false;
}

$DocTitle = REMOVE_ACCOUNT;

require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/header.tpl.php");
require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/sidebar.tpl.php");
require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/nav.tpl.php");
?>

	<div id="wrap">
		<div class="row box1">
			<div class="col s12">
				<h5 class="title1"><i class="fas fa-door-open left"></i> <?php echo REMOVE_ACCOUNT; ?></h5>
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
			<?php else : ?>
				<?php if ( $retValue === false ) : ?>
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
	                    <form method="post" id="removeaccount" name="removeaccount" class="col s12" novalidate>
	                    	<input type="hidden" value="remover" name="acao" />
							<div class="row">
								<div class="input-field col s12">
									<?php echo REMOVE_ACCOUNT_DESCRIPTION; ?>
								</div>
								<div class="input-field col s12">
	                                <?php echo REMOVE_ACCOUNT_REASON; ?>
									<div>
										<label><input class="with-gap" name="reason" type="radio" value="SAFETY" checked /><span><?php echo REMOVE_ACCOUNT_OPTION_A; ?></span></label>
									</div>
									<div>
										<label><input class="with-gap" name="reason" type="radio" value="USEFUL" /><span><?php echo REMOVE_ACCOUNT_OPTION_B; ?></span></label>
									</div>
									<div>
										<label><input class="with-gap" name="reason" type="radio" value="HACKED" /><span><?php echo REMOVE_ACCOUNT_OPTION_C; ?></span></label>
									</div>
									<div>
										<label><input class="with-gap" name="reason" type="radio" value="UNDERSTAND" /><span><?php echo REMOVE_ACCOUNT_OPTION_D; ?></span></label>
									</div>
									<div>
										<label><input class="with-gap" name="reason" type="radio" value="OTHERACCOUNTS" /><span><?php echo REMOVE_ACCOUNT_OPTION_E; ?></span></label>
									</div>
									<div>
										<label><input class="with-gap" name="reason" type="radio" value="EMAIL" /><span><?php echo REMOVE_ACCOUNT_OPTION_F; ?></span></label>
									</div>
									<div>
										<label><input class="with-gap" name="reason" type="radio" value="PRIVACY" /><span><?php echo REMOVE_ACCOUNT_OPTION_G; ?></span></label>
									</div>
									<div>
										<label><input class="with-gap" name="reason" type="radio" value="OTHER" /><span><?php echo REMOVE_ACCOUNT_OPTION_H; ?></span></label>
									</div>
								</div>
								<div class="input-field col s12" style="display: none;">
									<textarea id="details" name="details" class="materialize-textarea bgInputs"></textarea>
									<label for="details"><?php echo REMOVE_ACCOUNT_DETAILS; ?></label>
								</div>
								<div class="col s12 recaptcha">
	                                <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="<?=RECAPTCHA_SITE_KEY?>"></div>
	                            </div>
								<div class="right">
									<a href="#modal" id="recaptcha" class=" modal-trigger waves-effect waves-light btn btnDanger hoverable" disabled><?php echo BUTTON_DELETE; ?></a>
								</div>
							</div>
						</form>
					</div>
				</section>
			<?php endif; ?>
		</div>
		<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/info.tpl.php"); ?>
		<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/more.tpl.php"); ?>
	</div>
	<div id="modal" class="modal">
	    <div class="modal-content">
	        <h5><?php echo REMOVE_ACCOUNT; ?></h5>
	        <p><?php echo REMOVE_ACCOUNT_POPUP; ?></p>
	    </div>
	    <div class="modal-footer">
	        <a href="#!" id="remove-account" class="modal-action modal-close waves-effect btn-flat"><?php echo BUTTON_CONFIRM; ?></a>
	        <a href="#!" class="modal-action modal-close waves-effect btn-flat"><?php echo BUTTON_CANCEL; ?></a>
	    </div>
    </div>
	<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/footer.tpl.php"); ?>