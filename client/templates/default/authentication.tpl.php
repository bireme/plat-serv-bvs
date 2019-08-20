<?php
    require_once(dirname(__FILE__)."/header.tpl.php");
    
    $path = rtrim($_SERVER['PHP_SELF'], '/') . '/';
    $b64HttpHost = base64_encode(RELATIVE_PATH.'/controller/authentication');
    $build_query = '?origin='.$origin.'&iahx='.$iahx;
?>

	<section  class="container">
		<div id="login" class="col">
			<div id="lang">
   				<?php foreach ($languages as $key => $value) : ?>
                	<?php if ( $key == $_SESSION['lang'] ) continue; ?>
                	<a href="<?php echo $path.'?lang='.$key; ?>"><?php echo $value; ?></a>
            	<?php endforeach; ?>
  			</div>
			<img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/logo-<?php echo $_SESSION["lang"]; ?>.png" alt="" class="responsive-img">
			<h5><?php echo $trans->getTrans($_REQUEST["action"],'LOGIN_MESSAGE'); ?></h5>
			<form name="omb_loginForm" class="col s12" action="<?php echo RELATIVE_PATH; ?>/controller/authentication" method="POST">
				<input type="hidden" name="origin" value="<?php echo $origin; ?>" />
                <input type="hidden" name="control" value="business" />
                <input type="hidden" name="action" value="authentication" />
                <input type="hidden" name="lang" value="<?php echo $lang; ?>" />
                <input type="hidden" name="iahx" value="<?php echo $iahx; ?>" />
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input id="icon_prefix" type="text" name="userID" maxlenght="50">
						<label for="icon_prefix"><?php echo $trans->getTrans($_REQUEST["action"],'USER'); ?></label>
					</div>
					<div class="input-field col s12">
						<i class="material-icons prefix">lock</i>
						<input id="icon_telephone" type="password" name="userPass" maxlenght="15">
						<label for="icon_telephone"><?php echo $trans->getTrans($_REQUEST["action"],'PASSWORD'); ?></label>
						<?php if (($_GET['error'] && $_GET['error'] == 'access_denied') || $_GET['error_code'] ) : ?>
							<span class="helper-text red-text error-text"><?php echo $trans->getTrans($_REQUEST["action"],'ACCESS_DENIED'); ?></span>
                        <?php endif; ?>
                        <?php if ($response['values']['status'] === false) : ?>
							<span class="helper-text red-text error-text"><?php echo $trans->getTrans($_REQUEST["action"],'INVALID_LOGIN'); ?></span>
                        <?php endif; ?>
                        <?php if ($response['values']['birLDAP'] === false) : ?>
							<span class="helper-text red-text error-text"><?php echo $trans->getTrans($_REQUEST["action"],'BIREME_LOGIN_LDAP'); ?></span>
                        <?php endif; ?>
					</div>
					<div class="col s12 btn-login">
						<button class="btn waves-effect waves-light btnPrimary" type="submit" name="action"><?php echo $trans->getTrans($_REQUEST["action"],'LOGIN'); ?></button>
					</div>
					<div class="col s6 left-align">
						<label>
							<input type="checkbox" />
							<span><?php echo $trans->getTrans($_REQUEST["action"],'REMEMBER_ME'); ?></span>
						</label>
					</div>
					<div class="col s6 right-align">
						<a href="<?php echo RELATIVE_PATH; ?>/controller/authentication/task/recover"><?php echo $trans->getTrans($_REQUEST["action"],'FORGOT_MY_PASSWORD'); ?></a>
					</div>
				</div>
			</form>
			<div class="separator">
				<span class="loginOu"><?php echo $trans->getTrans($_REQUEST["action"],'OR'); ?></span>
			</div>
			<div class="col s12">
				<a href="/connector/google/<?php echo $build_query; ?>" class="btn waves-effect waves-light btn100 btnGoogle" name="action">GOOGLE</a>
			</div>
			<div class="col s12">
				<a href="/connector/facebook/<?php echo $build_query; ?>" class="btn waves-effect waves-light btn100 btnFacebook" name="action">FACEBOOK</a>
			</div>
			<hr>
			<div class="col 12">
				<a href="<?php echo SERVICES_PLATFORM_DOMAIN.'/pub/userData.php?c='.$b64HttpHost; ?>" class="btn waves-effect waves-light btn100 btnRegistre" href="registrar.php"><?php echo $trans->getTrans($_REQUEST["action"],'REGISTRY'); ?></a>
			</div>
		</div>
	</section>

<?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>