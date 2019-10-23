<aside id="aside" class="z-depth-4">
	<a href="#" id="menuMobile" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
	<div id="brand" class="center-align"><a href="<?php echo RELATIVE_PATH; ?>/controller/authentication"><img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/logo-<?php echo $_SESSION["lang"]; ?>.png" alt="" class="responsive-img"></a></div>
	<nav id="nav">
		<div class="nav-wrapper">
			<ul class="">
				<li><a href="<?php echo RELATIVE_PATH; ?>/controller/authentication"><i class="material-icons left">dashboard</i><span class="navtitulo"><?php echo $trans->getTrans('menu','HOME'); ?></span></a></li>
				<li><a href="<?php echo RELATIVE_PATH; ?>/controller/mydocuments/control/business"><i class="far fa-folder-open left"></i><span class="navtitulo"><?php echo $trans->getTrans('menu','MY_SHELF'); ?></span></a></li>
				<li><a href="<?php echo RELATIVE_PATH; ?>/controller/myprofiledocuments/control/business"><i class="fas fa-folder left"></i><span class="navtitulo"><?php echo $trans->getTrans('menu','MY_PROFILE_DOCUMENTS'); ?></span></a></li>
				<li><a href="<?php echo RELATIVE_PATH; ?>/controller/mysearches/control/business"><i class="fas fa-history left"></i><span class="navtitulo"><?php echo $trans->getTrans('menu','MY_SEARCHES'); ?></span></a></li>
				<li><a href="<?php echo RELATIVE_PATH; ?>/controller/mylinks/control/business"><i class="fas fa-link left"></i><span class="navtitulo"><?php echo $trans->getTrans('menu','MY_LINKS'); ?></span></a></li>
				<li><a href="<?php echo RELATIVE_PATH; ?>/controller/orcidworks/control/business"><i class="far fa-file-alt left"></i><span class="navtitulo"><?php echo $trans->getTrans('menu','ORCID_WORKS'); ?></span></a></li>
				<li><a href="<?php echo RELATIVE_PATH; ?>/controller/searchresults/control/business"><i class="fas fa-rss left"></i><span class="navtitulo"><?php echo $trans->getTrans('menu','RSS'); ?></span></a></li>
				<!-- <li><a href="<?php echo RELATIVE_PATH; ?>/controller/tutorial/control/business"><i class="fas fa-film left"></i><span class="navtitulo"><?php echo $trans->getTrans('menu','TUTORIALS'); ?></span></a></li> -->
				<li><a href="<?php echo SERVICES_PLATFORM_DOMAIN; ?>/pub/userData.php?userTK=<?php echo urlencode($_SESSION["userTK"]); ?>&c=<?php echo $b64HttpHost; ?>"><i class="fas fa-user-edit left"></i><span class="navtitulo"><?php echo $trans->getTrans('menu','PROFILE'); ?></span></a></li>
			</ul>
		</div>
	</nav>
	<ul class="sidenav" id="mobile-demo">
		<p id="brand" class="center-align"><a href="home.php"><img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/logo-<?php echo $_SESSION["lang"]; ?>.png" alt="" class="responsive-img"></a></p>
		<div class="divider"></div>
		<li><a href="<?php echo RELATIVE_PATH; ?>/controller/authentication"><?php echo $trans->getTrans('menu','HOME'); ?></a></li>
		<li><a href="<?php echo RELATIVE_PATH; ?>/controller/mydocuments/control/business"><?php echo $trans->getTrans('menu','MY_SHELF'); ?></a></li>
		<li><a href="<?php echo RELATIVE_PATH; ?>/controller/myprofiledocuments/control/business"><?php echo $trans->getTrans('menu','MY_PROFILE_DOCUMENTS'); ?></a></li>
		<li><a href="<?php echo RELATIVE_PATH; ?>/controller/mysearches/control/business"><?php echo $trans->getTrans('menu','MY_SEARCHES'); ?></a></li>
		<li><a href="<?php echo RELATIVE_PATH; ?>/controller/mylinks/control/business"><?php echo $trans->getTrans('menu','MY_LINKS'); ?></a></li>
		<li><a href="<?php echo RELATIVE_PATH; ?>/controller/orcidworks/control/business"><?php echo $trans->getTrans('menu','ORCID_WORKS'); ?></a></li>
		<li><a href="<?php echo RELATIVE_PATH; ?>/controller/searchresults/control/business"><?php echo $trans->getTrans('menu','RSS'); ?></a></li>
		<!-- <li><a href="<?php echo RELATIVE_PATH; ?>/controller/tutorial/control/business"><?php echo $trans->getTrans('menu','TUTORIALS'); ?></a></li> -->
		<li><a href="<?php echo SERVICES_PLATFORM_DOMAIN; ?>/pub/userData.php?userTK=<?php echo urlencode($_SESSION["userTK"]); ?>&c=<?php echo $b64HttpHost; ?>"><?php echo $trans->getTrans('menu','PROFILE'); ?></a></li>
		<li class="divider" tabindex="-1"></li>
		<li><a href="<?php echo RELATIVE_PATH; ?>/controller/logout/control/business"><?php echo $trans->getTrans('menu','LOGOUT'); ?><i class="material-icons right m1">exit_to_app</i></a></li>
	</ul>
</aside>