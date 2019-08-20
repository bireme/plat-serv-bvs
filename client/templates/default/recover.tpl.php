<?php
	require_once(dirname(__FILE__)."/header.tpl.php");

	$path = rtrim($_SERVER['PHP_SELF'], '/') . '/';
    $b64HttpHost = base64_encode(RELATIVE_PATH.'/controller/authentication');
?>

	<section  class="container">
		<div id="recover" class="col-12">
			<div id="lang">
   				<?php foreach ($languages as $key => $value) : ?>
                	<?php if ( $key == $_SESSION['lang'] ) continue; ?>
                	<a href="<?php echo $path.'?lang='.$key; ?>"><?php echo $value; ?></a>
            	<?php endforeach; ?>
  			</div>
			<div class="row">
				<div class="col s12 l4" id="logoRecover">
					<a href="<?php echo RELATIVE_PATH; ?>/controller/authentication"><img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/logo-<?php echo $_SESSION["lang"]; ?>.png" alt="" class="responsive-img"></a>
				</div>
				<div class="col s12 l8" id="logoRecoverBireme">
					<img src="http://logos.bireme.org/img/<?php echo $_SESSION["lang"]; ?>/v_bir_color.svg" class="responsive-img" alt="">
				</div>
			</div>
			<div class="divider"></div>
			<div class="row">
				<div class="col s12">
					<?php echo $trans->getTrans($_REQUEST["action"],'MY_VHL_DESCRIPTION'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col s12 l6">
					<div class="card-panel hoverable">
						<p><?php echo $trans->getTrans($_REQUEST["action"],'RECOVER_ACCOUNTS'); ?></p>
						<a href="<?php echo BIR_ACCOUNTS_DOMAIN.'/accounts/password/reset/'; ?>" target="_blank"><?php echo $trans->getTrans($_REQUEST["action"],'RECOVER_ACCOUNTS_LINK'); ?></a>
					</div>
				</div>
				<div class="col s12 l6">
					<div class="card-panel hoverable">
						<p><?php echo $trans->getTrans($_REQUEST["action"],'RECOVER_PASSWORD'); ?></p>
						<a href="<?php echo SERVICES_PLATFORM_DOMAIN.'/pub/forgotPassword.php?c='.$b64HttpHost; ?>"><?php echo $trans->getTrans($_REQUEST["action"],'RECOVER_PASSWORD_LINK'); ?></a>
					</div>
				</div>
			</div>
			
		</div>
	</section>

<?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>