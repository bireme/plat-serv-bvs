	<?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/sidebar.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/nav.tpl.php"); ?>
	<div id="wrap">
		<div class="row">
			<div class="col m12 ">
				<div class="box1">
					<h5 class="title1"><i class="fas fa-film left"></i> <?php echo $trans->getTrans($_REQUEST["action"],'TUTORIALS'); ?></h5>
				</div>
				<section class="row">
					<article class="col s12 m4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/Fe4cW3B0q_U">
							<div class="box1 hoverable">
								<p>
									<span class="left"><img src="https://img.youtube.com/vi/Fe4cW3B0q_U/1.jpg" alt="tutorial" style="padding:0 20px 5px 0px"></span>
									<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'HOME'); ?></b>
									<div class="clearfix"></div>
								</p>
							</div>
						</a>
					</article>
					<article class="col s12 m4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/Fe4cW3B0q_U">
							<div class="box1 hoverable">
								<p>
									<span class="left"><img src="https://img.youtube.com/vi/Fe4cW3B0q_U/1.jpg" alt="tutorial" style="padding:0 20px 5px 0px"></span>
									<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'MY_COLLECTION'); ?></b>
									<div class="clearfix"></div>
								</p>
							</div>
						</a>
					</article>
					<article class="col s12 m4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/Fe4cW3B0q_U">
							<div class="box1 hoverable">
								<p>
									<span class="left"><img src="https://img.youtube.com/vi/Fe4cW3B0q_U/1.jpg" alt="tutorial" style="padding:0 20px 5px 0px"></span>
									<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'MY_PROFILES'); ?></b>
									<div class="clearfix"></div>
								</p>
							</div>
						</a>
					</article>
					<article class="col s12 m4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/Fe4cW3B0q_U">
							<div class="box1 hoverable">
								<p>
									<span class="left"><img src="https://img.youtube.com/vi/Fe4cW3B0q_U/1.jpg" alt="tutorial" style="padding:0 20px 5px 0px"></span>
									<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'MY_SEARCHES'); ?></b>
									<div class="clearfix"></div>
								</p>
							</div>
						</a>
					</article>
					<article class="col s12 m4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/Fe4cW3B0q_U">
							<div class="box1 hoverable">
								<p>
									<span class="left"><img src="https://img.youtube.com/vi/Fe4cW3B0q_U/1.jpg" alt="tutorial" style="padding:0 20px 5px 0px"></span>
									<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'MY_LINKS'); ?></b>
									<div class="clearfix"></div>
								</p>
							</div>
						</a>
					</article>
					<article class="col s12 m4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/Fe4cW3B0q_U">
							<div class="box1 hoverable">
								<p>
									<span class="left"><img src="https://img.youtube.com/vi/Fe4cW3B0q_U/1.jpg" alt="tutorial" style="padding:0 20px 5px 0px"></span>
									<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'ORCID_WORKS'); ?></b>
									<div class="clearfix"></div>
								</p>
							</div>
						</a>
					</article>
					<article class="col s12 m4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/Fe4cW3B0q_U">
							<div class="box1 hoverable">
								<p>
									<span class="left"><img src="https://img.youtube.com/vi/Fe4cW3B0q_U/1.jpg" alt="tutorial" style="padding:0 20px 5px 0px"></span>
									<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'FEED_RSS'); ?></b>
									<div class="clearfix"></div>
								</p>
							</div>
						</a>
					</article>
					<article class="col s12 m4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/Fe4cW3B0q_U">
							<div class="box1 hoverable">
								<p>
									<span class="left"><img src="https://img.youtube.com/vi/Fe4cW3B0q_U/1.jpg" alt="tutorial" style="padding:0 20px 5px 0px"></span>
									<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'PROFILE'); ?></b>
									<div class="clearfix"></div>
								</p>
							</div>
						</a>
					</article>
				</section>
			</div>
		</div>
		<?php require_once(dirname(__FILE__)."/info.tpl.php"); ?>
        <?php require_once(dirname(__FILE__)."/more.tpl.php"); ?>
    </div>
	<!--- Modal Video -->
	<div id="modal-video" class="modal">
		<form action="#" class="col s12">
			<div class="modal-content">
				<h6><b id="modal-video-title"></b></h6>
				<div class="row">
					<div class="input-field col s12">
						<div class="video-container">
							<iframe width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<a href="#!" class="btn btnDanger modal-close"><?php echo $trans->getTrans($_REQUEST["action"],'CLOSE'); ?></a>
			</div>
		</form>
	</div>
	<?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>