<div id="feedback">
	<div id="feedbackBox">
		<div id="feedbackFechar" class=""><i class="fas fa-times"></i></div>
		<h1><?php echo $trans->getTrans('feedback','TITLE'); ?></h1>
		<h2><?php echo $trans->getTrans('feedback','INVITE'); ?></h2>
		<hr>
		<a href="<?php echo $survey[$_SESSION['lang']]; ?>" class="waves-effect blue darken-4 waves-light btn-small" target="_blank"><?php echo $trans->getTrans('feedback','GO_TO_SURVEY'); ?></a>
	</div>
	<div id="feedbackIcone">
		<img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/iconFeedback-<?php echo $_SESSION["lang"]; ?>.svg" alt="Feedback">
	</div>
	<div class="clear"></div>
</div>