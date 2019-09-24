<?php $path = rtrim($_SERVER['PHP_SELF'], '/') . '/'; ?>
<div class="fixed-action-btn">
	<a class="btn-floating btn-large blue darken-3">
		<i class="large material-icons">more_horiz</i>
	</a>
	<ul>
		<!-- <li><a href="<?php echo RELATIVE_PATH; ?>/controller/authentication/?tour=true" class="btn-floating red tooltipped" data-position="left" data-tooltip="<?php echo TOUR; ?>"><i class="material-icons">computer</i></a></li> -->
		<li><a href="#" class="btn-floating cray tooltipped sidenav-trigger" data-target="slide-out" data-position="left" data-tooltip="<?php echo CONFIGURATIONS; ?>"><i class="material-icons">settings</i></a></li>
	</ul>
</div>
<!-- Menu configuraçãoes -->
<ul id="slide-out" class="sidenav">
	<li><div class="user-view">
		<div class="background">
			<img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/bgUser.jpg" alt="Imagem de Fundo">
		</div>
		<?php if ( $_SESSION['fb_data']['picture']['data']['url'] ) : ?>
		<a href="#"><img class="circle" src="<?php echo $_SESSION['fb_data']['picture']['data']['url']; ?>" alt="avatar"></a>
		<?php elseif ( $_SESSION['google_data']['picture'] ) : ?>
		<a href="#"><img class="circle" src="<?php echo $_SESSION['google_data']['picture']; ?>" alt="avatar"></a>
		<?php elseif ( $_SESSION['avatar'] && !in_array($_SESSION['source'], array('google','facebook')) ) : ?>
		<a href="#"><img class="circle" src="<?=RELATIVE_PATH; ?>/images/<?=$_SESSION["skin"]?>/uploads/<?=$_SESSION['avatar']?>" alt="avatar"></a>
		<?php else : ?>
		<a href="#"><img class="circle" src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/user.svg" alt="avatar"></a>
		<?php endif; ?>
		<a href="#name"><span class="white-text name"><?php echo $_SESSION["userFirstName"] . ' ' . $_SESSION["userLastName"]; ?></span></a>
		<a href="#email"><span class="white-text email"><?php echo $_SESSION["userID"]; ?></span></a>
	</div></li>
	<li><a href="<?php echo SERVICES_PLATFORM_DOMAIN; ?>/pub/userData.php?userTK=<?php echo urlencode($_SESSION["userTK"]); ?>&c=<?php echo $b64HttpHost; ?>"><?php echo MY_DATA; ?></a></li>
	<?php if ( empty($_SESSION["source"]) || 'ldap' == $_SESSION["source"] ) : ?>
	<li><a href="<?php echo SERVICES_PLATFORM_DOMAIN; ?>/pub/changePassword.php?userTK=<?php echo urlencode($_SESSION["userTK"]); ?>&c=<?php echo $b64HttpHost; ?>"><?php echo CHANGE_PASSWORD; ?></a></li>
	<?php endif; ?>
	<!-- <li><a href="<?php echo RELATIVE_PATH; ?>/controller/authentication/?tour=true"><?php echo START_TOUR; ?></a></li> -->
	<li><a href="http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&site=servplat&lang=<?php echo $_SESSION['lang']; ?>" target="_blank"><?php echo LEAVE_COMMENT; ?></a></li>
	<li><a href="http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&error=1&site=servplat&lang=<?php echo $_SESSION['lang']; ?>" target="_blank"><?php echo REPORT_ERROR; ?></a></li>
	<li class="divider" tabindex="-1"></li>
	<?php foreach ($languages as $key => $value) : ?>
        <?php if ( $key == $_SESSION['lang'] ) continue; ?>
        <li><a href="<?php echo $path.'?lang='.$key; ?>"><?php echo $value; ?></a></li>
    <?php endforeach; ?>
	<li class="divider" tabindex="-1"></li>
	<li class="row">
		<div class="col s4">
			<a href="#" id="cor0">
				Default
				<div class="light-blue darken-3" style="height: 20px;"></div>
				<div class="blue-grey lighten-5" style="height: 20px;"></div>
			</a>
		</div>
		<div class="col s4">
			<a href="#" id="cor1">
				Dark
				<div class="grey" style="height: 20px;"></div>
				<div class="black" style="height: 20px;"></div>
			</a>
		</div>
		<div class="col s4">
			<a href="#" id="cor2">
				Green
				<div class="green darken-3" style="height: 20px;"></div>
				<div class="green" style="height: 20px;"></div>
			</a>
		</div>
	</li>
	<li class="divider" tabindex="-1"></li>
	<li><a href="<?php echo RELATIVE_PATH; ?>/controller/logout/control/business"><?php echo LOGOFF; ?><i class="material-icons right m1">exit_to_app</i></a></li>
</ul>