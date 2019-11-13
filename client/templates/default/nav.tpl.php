<?php $path = rtrim($_SERVER['PHP_SELF'], '/') . '/'; ?>
<header id="header">
	<div class="right" style="margin-top: 10px;">
		<!-- botão 1 -->
		<a href='#' id="flag" class='customize dropdown-trigger' data-target='idioma'><i class="material-icons">flag</i> <?php echo $languages[$_SESSION['lang']]; ?></a>
		<ul id='idioma' class='dropdown-content' style="min-width: 200px !important;">
			<?php foreach ($languages as $key => $value) : ?>
	            <?php if ( $key == $_SESSION['lang'] ) continue; ?>
	            <li><a href="<?php echo $path.'?lang='.$key; ?>"><?php echo $value; ?></a></li>
	        <?php endforeach; ?>
		</ul>
		<!-- botão 2 -->
		<a href='#' id="usuario" class='customize dropdown-trigger' data-target='perfil'><i class="material-icons">face</i> <?php echo $_SESSION["userFirstName"]; ?></a>
		<ul id='perfil' class='dropdown-content' style="min-width: 200px !important;">
			<li><a href="<?php echo SERVICES_PLATFORM_DOMAIN; ?>/pub/userData.php?userTK=<?php echo urlencode($_SESSION["userTK"]); ?>&c=<?php echo $b64HttpHost; ?>"><?php echo $trans->getTrans('menu','MY_DATA'); ?></a></li>
			<?php if ( empty($_SESSION["source"]) || 'ldap' == $_SESSION["source"] ) : ?>
			<li><a href="<?php echo SERVICES_PLATFORM_DOMAIN; ?>/pub/changePassword.php?userTK=<?php echo urlencode($_SESSION["userTK"]); ?>&c=<?php echo $b64HttpHost; ?>"><?php echo $trans->getTrans('menu','CHANGE_PASSWORD'); ?></a></li>
			<?php endif; ?>
			<li><a href="<?php echo RELATIVE_PATH; ?>/controller/tutorial/control/business"><?php echo $trans->getTrans('menu','TUTORIALS'); ?></a></li>
			<li><a href="http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&site=servplat&lang=<?php echo $_SESSION['lang']; ?>" target="_blank"><?php echo $trans->getTrans('menu','LEAVE_COMMENT'); ?></a></li>
			<li><a href="http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&error=1&site=servplat&lang=<?php echo $_SESSION['lang']; ?>" target="_blank"><?php echo $trans->getTrans('menu','REPORT_ERROR'); ?></a></li>
			<li class="divider" tabindex="-1"></li>
			<li><a href="<?php echo RELATIVE_PATH; ?>/controller/logout/control/business"><?php echo $trans->getTrans('menu','LOGOUT'); ?><i class="material-icons right m1">exit_to_app</i></a></li>
		</ul>
	</div>
	<?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
	<form id="step4" class="row pm0" action="<?php echo VHL_SEARCH_PORTAL_DOMAIN.'/portal/'; ?>" method="get" target="_blank" style="width: 100%; margin-bottom: 0;">
	<?php else : ?>
	<form id="step4" class="row pm0" action="<?php echo $_SESSION['iahx']; ?>" method="get" target="_blank" style="width: 100%; margin-bottom: 0;">
	<?php endif; ?>
		<div class="col s9 m8 l7 input-field pm0">
			<input id="q" name="q" type="text" class="pm1 inputHeader" autocomplete="off">
		</div>
		<div class="col s3 m4 l5" id="boxBtSearch">
			<button id="btSearch" class="btn btnSuccess" onclick="__gaTracker('send','event','My VHL','VHL Search Bar',document.getElementById('q').value);"><i class="fas fa-search"></i></button>
		</div>
	</form>
</header>