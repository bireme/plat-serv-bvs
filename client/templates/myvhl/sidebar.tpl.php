<?php
    $path = rtrim($_SERVER['PHP_SELF'], '/') . '/';
    $b64HttpHost = base64_encode(RELATIVE_PATH.'/controller/authentication');
?>

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=RELATIVE_PATH?>/controller/authentication" class="site_title logo-md"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/logo-md-<?=$_SESSION["lang"]?>.png" alt="VHL Logo"> <span><?=$trans->getTrans('menu','MY_VHL')?></span></a>
              <a href="<?=RELATIVE_PATH?>/controller/authentication" class="site_title logo-sm" style="display: none;"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/logo-sm-<?=$_SESSION["lang"]?>.png" alt="VHL Logo"></a>
            </div>

            <div class="collapse-menu hide"><i class="fa fa-bars"></i> <?=$trans->getTrans('menu','COLLAPSE_MENU')?></div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div id="step1" class="profile">
              <div class="profile_pic">
                <?php if ( $_SESSION['fb_data']['picture']['data']['url'] ) : ?>
                <img src="<?php echo $_SESSION['fb_data']['picture']['data']['url']; ?>" alt="avatar" class="img-circle profile_img">
                <?php elseif ( $_SESSION['google_data']['picture'] ) : ?>
                <img src="<?php echo $_SESSION['google_data']['picture']; ?>" alt="avatar" class="img-circle profile_img">
                <?php elseif ( $_SESSION['avatar'] && !in_array($_SESSION['source'], array('google','facebook')) ) : ?>
                <img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/uploads/<?=$_SESSION['avatar']?>" alt="avatar" class="img-circle profile_img">
                <?php else : ?>
                <img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/logged.png" alt="avatar" class="img-circle profile_img">
                <?php endif; ?>
              </div>
              <div class="profile_info">
                <span><?=$trans->getTrans('menu','WELCOME')?>,</span>
                <h2><?=$_SESSION["userFirstName"]?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu step2">
                  <li class="active step2"><a><i class="fa fa-dashboard"></i> <?=$trans->getTrans('menu','DASHBOARD')?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: block;">
                      <li class="child step3"><a href="<?=RELATIVE_PATH?>/controller/authentication"><?=$trans->getTrans('menu','HOME')?></a></li>
                      <li class="child step15"><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business"><?=$trans->getTrans('menu','MY_SHELF')?></a></li>
                      <li class="child step20"><a href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business"><?=$trans->getTrans('menu','MY_PROFILE_DOCUMENTS')?></a></li>
                      <!-- <li><a href="<?=RELATIVE_PATH?>/controller/suggesteddocs/control/business"><?=$trans->getTrans('menu','SUGGESTED_DOCS')?></a></li> -->
                      <li class="child step24"><a href="<?=RELATIVE_PATH?>/controller/mysearches/control/business"><?=$trans->getTrans('menu','MY_SEARCHES')?></a></li>
                      <li class="child step29"><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business"><?=$trans->getTrans('menu','MY_LINKS')?></a></li>
                      <li class="child step33"><a href="<?=RELATIVE_PATH?>/controller/orcidworks/control/business"><?=$trans->getTrans('menu','ORCID_WORKS')?></a></li>
                      <li class="child step35"><a href="<?=RELATIVE_PATH?>/controller/searchresults/control/business"><?=$trans->getTrans('menu','RSS')?></a></li>
                    </ul>
                  </li>
                  <li class="hide side step3"><a href="<?=RELATIVE_PATH?>/controller/authentication"><i class="fa fa-home"></i> <?=$trans->getTrans('menu','HOME')?></a></li>
                  <li class="hide side step15"><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business"><i class="fa fa-file"></i> <?=$trans->getTrans('menu','MY_SHELF')?></a></li>
                  <li class="hide side step20"><a href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business"><i class="fa fa-folder-open"></i> <?=$trans->getTrans('menu','MY_PROFILE_DOCUMENTS')?></a></li>
                  <li class="hide side step24"><a href="<?=RELATIVE_PATH?>/controller/mysearches/control/business"><i class="fa fa-search"></i> <?=$trans->getTrans('menu','MY_SEARCHES')?></a></li>
                  <li class="hide side step29"><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business"><i class="fa fa-link"></i> <?=$trans->getTrans('menu','MY_LINKS')?></a></li>
                  <li class="hide side step33"><a href="<?=RELATIVE_PATH?>/controller/orcidworks/control/business"><i class="fa fa-file-text"></i> <?=$trans->getTrans('menu','ORCID_WORKS')?></a></li>
                  <li class="hide side step35"><a href="<?=RELATIVE_PATH?>/controller/searchresults/control/business"><i class="fa fa-rss"></i> <?=$trans->getTrans('menu','RSS')?></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav role="navigation" style="display: flex;">
              <div class="nav toggle">
                <a id="menu_toggle">
                  <i class="fa fa-bars"></i>
                  <i class="fa fa-chevron-circle-left"></i>
                  <i class="fa fa-chevron-circle-right"></i>
                </a>
              </div>

              <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
              <form id="step4" action="<?php echo VHL_SEARCH_PORTAL_DOMAIN.'/portal/'; ?>" method="get" target="_blank" style="width: 100%; margin-bottom: 0;">
              <?php else : ?>
              <form id="step4" action="<?php echo $_SESSION['iahx']; ?>" method="get" target="_blank" style="width: 100%; margin-bottom: 0;">
              <?php endif; ?>
                <div class="search_bar">
                  <div class="col-xs-11 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" id="q" name="q" class="form-control" placeholder="<?=$trans->getTrans('menu','SEARCH_FOR')?>">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="submit" onclick="gtag('send','event','My VHL','VHL Search Bar',document.getElementById('q').value);"><?=$trans->getTrans('menu','SEARCH')?></button>
                        </span>
                        <input type="hidden" name="lang" value="<?=$_SESSION['lang']?>">
                    </div>
                  </div>
                </div>
              </form>

              <div class="top_menu">
                <ul id="step5" class="nav navbar-nav navbar-right profile_menu language_switcher">
                  <li>
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="padding-bottom: 21px;">
                      <i class="fa fa-flag"></i> <?php echo $languages[$_SESSION['lang']]; ?>
                      <span class="fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                      <?php foreach ($languages as $key => $value) : ?>
                        <?php if ( $key == $_SESSION['lang'] ) continue; ?>
                        <li><a href="<?php echo $path.'?lang='.$key; ?>"><?php echo $value; ?></a></li>
                      <?php endforeach; ?>
                    </ul>
                  </li>
                </ul>

                <ul id="step6" class="nav navbar-nav navbar-right profile_menu">
                  <li>
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="padding-bottom: 21px;">
                      <?php if ( $_SESSION['fb_data']['picture']['data']['url'] ) : ?>
                      <img src="<?php echo $_SESSION['fb_data']['picture']['data']['url']; ?>" alt="avatar"><?=$_SESSION["userFirstName"]?>
                      <?php elseif ( $_SESSION['google_data']['picture'] ) : ?>
                      <img src="<?php echo $_SESSION['google_data']['picture']; ?>" alt="avatar"><?=$_SESSION["userFirstName"]?>
                      <?php elseif ( $_SESSION['avatar'] && !in_array($_SESSION['source'], array('google','facebook')) ) : ?>
                      <img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/uploads/<?=$_SESSION['avatar']?>" alt="avatar"><?=$_SESSION["userFirstName"]?>
                      <?php else : ?>
                      <img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/logged.png" alt="avatar"><?=$_SESSION["userFirstName"]?>
                      <?php endif; ?>
                      <span class="fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right" style="width: 100%;">
                      <li><a href="<?=SERVICES_PLATFORM_DOMAIN?>/pub/userData.php?userTK=<?=urlencode($_SESSION["userTK"])?>&c=<?=$b64HttpHost?>"><?=$trans->getTrans('menu','MY_DATA')?></a></li>
                      <?php if ( empty($_SESSION["source"]) || 'ldap' == $_SESSION["source"] ) : ?>
                      <li><a href="<?=SERVICES_PLATFORM_DOMAIN?>/pub/changePassword.php?userTK=<?=urlencode($_SESSION["userTK"])?>&c=<?=$b64HttpHost?>"><?=$trans->getTrans('menu','CHANGE_PASSWORD')?></a></li>
                      <?php endif; ?>
                      <?php if ( 'menu' == $_REQUEST["action"] ) : ?>
                      <li><a href="<?=RELATIVE_PATH?>/controller/authentication/?tour=true"><?=$trans->getTrans('menu','START_TOUR')?></a></li>
                      <?php elseif ( 'searchresults' == $_REQUEST["action"] && $_REQUEST['rss'] ) : ?>
                      <li><a href="<?=RELATIVE_PATH?>/controller/<?=$_REQUEST['action']?>/control/business/rss/<?=$_REQUEST['rss']?>?multipage=true"><?=$trans->getTrans('menu','START_TOUR')?></a></li>
                      <?php else : ?>
                      <li><a href="<?=RELATIVE_PATH?>/controller/<?=$_REQUEST['action']?>/control/business/?multipage=true"><?=$trans->getTrans('menu','START_TOUR')?></a></li>
                      <?php endif; ?>
                      <li><a href="http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&site=servplat&lang=<?php echo $_SESSION['lang']; ?>" target="_blank"><?=$trans->getTrans('menu','LEAVE_COMMENT')?></a></li>
                      <li><a href="http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&error=1&site=servplat&lang=<?php echo $_SESSION['lang']; ?>" target="_blank"><?=$trans->getTrans('menu','REPORT_ERROR')?></a></li>
                      <li><a href="<?=RELATIVE_PATH?>/controller/logout/control/business"><i class="fa fa-sign-out pull-right"></i><?=$trans->getTrans('menu','LOGOUT')?></a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->