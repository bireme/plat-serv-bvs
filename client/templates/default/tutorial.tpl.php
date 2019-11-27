	<?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/sidebar.tpl.php"); ?>
    <?php require_once(dirname(__FILE__)."/nav.tpl.php"); ?>
	<div id="wrap">
		<div class="row">
			<div class="col m12">
				<div class="box1">
					<h5 class="title1"><i class="fas fa-film left"></i> <?php echo $trans->getTrans($_REQUEST["action"],'TUTORIALS'); ?></h5>
				</div>
				<section class="row">
					<article class="col s12 m6 xl4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/ZmxupTsVlGE">
							<div class="box2 hoverable">
								<div class="row">
							        <div class="col s5 m4"><img src="https://img.youtube.com/vi/ZmxupTsVlGE/1.jpg" alt="tutorial" class="responsive-img"></div>
									<div class="col s7 m8">
										<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'HOME'); ?></b><br />
										<small>0:52</small>
									</div>
								</div>
							</div>
						</a>
					</article>
					<article class="col s12 m6 xl4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/rLaaq3vaz6s">
							<div class="box2 hoverable">
								<div class="row">
							        <div class="col s5 m4"><img src="https://img.youtube.com/vi/rLaaq3vaz6s/1.jpg" alt="tutorial" class="responsive-img"></div>
									<div class="col s7 m8">
										<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'MY_COLLECTION'); ?></b><br />
										<small>0:56</small>
									</div>
								</div>
							</div>
						</a>
					</article>
					<article class="col s12 m6 xl4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/ibSzk9G7ggg">
							<div class="box2 hoverable">
								<div class="row">
							        <div class="col s5 m4"><img src="https://img.youtube.com/vi/ibSzk9G7ggg/1.jpg" alt="tutorial" class="responsive-img"></div>
									<div class="col s7 m8">
										<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'MY_PROFILES'); ?></b><br />
										<small>1:09</small>
									</div>
								</div>
							</div>
						</a>
					</article>
					<article class="col s12 m6 xl4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/XJoX65r6kRk">
							<div class="box2 hoverable">
								<div class="row">
							        <div class="col s5 m4"><img src="https://img.youtube.com/vi/XJoX65r6kRk/1.jpg" alt="tutorial" class="responsive-img"></div>
									<div class="col s7 m8">
										<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'MY_SEARCHES'); ?></b><br />
										<small>1:00</small>
									</div>
								</div>
							</div>
						</a>
					</article>
					<article class="col s12 m6 xl4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/H7pqL_dkNTA">
							<div class="box2 hoverable">
								<div class="row">
							        <div class="col s5 m4"><img src="https://img.youtube.com/vi/H7pqL_dkNTA/1.jpg" alt="tutorial" class="responsive-img"></div>
									<div class="col s7 m8">
										<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'COMBINE_SEARCH'); ?></b><br />
										<small>1:17</small>
									</div>
								</div>
							</div>
						</a>
					</article>
					<article class="col s12 m6 xl4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/kxFK8UFfquw">
							<div class="box2 hoverable">
								<div class="row">
							        <div class="col s5 m4"><img src="https://img.youtube.com/vi/kxFK8UFfquw/1.jpg" alt="tutorial" class="responsive-img"></div>
									<div class="col s7 m8">
										<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'MY_LINKS'); ?></b><br />
										<small>0:48</small>
									</div>
								</div>
							</div>
						</a>
					</article>
					<article class="col s12 m6 xl4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/qcffIKLNFWg">
							<div class="box2 hoverable">
								<div class="row">
							        <div class="col s5 m4"><img src="https://img.youtube.com/vi/qcffIKLNFWg/1.jpg" alt="tutorial" class="responsive-img"></div>
									<div class="col s7 m8">
										<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'ORCID_WORKS'); ?></b><br />
										<small>1:01</small>
									</div>
								</div>
							</div>
						</a>
					</article>
					<article class="col s12 m6 xl4">
						<a href="#modal-video" class="modal-trigger modal-video" data-video="https://www.youtube.com/embed/Kl_MT6TulAU">
							<div class="box2 hoverable">
								<div class="row">
							        <div class="col s5 m4"><img src="https://img.youtube.com/vi/Kl_MT6TulAU/1.jpg" alt="tutorial" class="responsive-img"></div>
									<div class="col s7 m8">
										<b class="video-title"><?php echo $trans->getTrans($_REQUEST["action"],'FEED_RSS'); ?></b><br />
										<small>2:35</small>
									</div>
								</div>
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
				<div class="row">
					<div class="input-field col s12">
						<div class="video-container">
							<iframe width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php require_once(dirname(__FILE__)."/footer.tpl.php"); ?>