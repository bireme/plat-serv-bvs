<?php
    $path = rtrim($_SERVER['PHP_SELF'], '/') . '/';
    $b64HttpHost = base64_encode($_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].'/authentication');
?>

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/authentication" class="site_title"><i class="fa fa-cloud"></i> <span>Services Platform</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/loggedin.png" alt="..." class="img-circle profile_img">
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
                <ul class="nav side-menu">
                  <li class="active"><a><i class="fa fa-dashboard"></i> <?=$trans->getTrans('menu','DASHBOARD')?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: block;">
                      <li><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>/authentication"><?=$trans->getTrans('menu','HOME')?></a></li>
                      <li><a href="<?=RELATIVE_PATH?>/controller/mydocuments/control/business"><?=$trans->getTrans('menu','MY_SHELF')?></a></li>
                      <li><a href="<?=RELATIVE_PATH?>/controller/myprofiledocuments/control/business"><?=$trans->getTrans('menu','MY_PROFILE_DOCUMENTS')?></a></li>
                      <!-- <li><a href="<?=RELATIVE_PATH?>/controller/suggesteddocs/control/business"><?=$trans->getTrans('menu','SUGGESTED_DOCS')?></a></li> -->
                      <li><a href="<?=RELATIVE_PATH?>/controller/mysearches/control/business"><?=$trans->getTrans('menu','MY_SEARCHES')?></a></li>
                      <li><a href="<?=RELATIVE_PATH?>/controller/mylinks/control/business"><?=$trans->getTrans('menu','MY_LINKS')?></a></li>
                      <li><a href="<?=RELATIVE_PATH?>/controller/orcidworks/control/business"><?=$trans->getTrans('menu','ORCID_WORKS')?></a></li>
                    </ul>
                  </li>
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
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <?php if ( 'portal' == $_SESSION['iahx'] ) : ?>
              <form action="<?php echo VHL_SEARCH_PORTAL_DOMAIN.'/portal/'; ?>" method="get" target="_blank" style="width: 100%; margin-bottom: 0;">
              <?php else : ?>
              <form action="<?php echo $_SESSION['iahx']; ?>" method="get" target="_blank" style="width: 100%; margin-bottom: 0;">
              <?php endif; ?>
                <div class="search_bar">
                  <div class="col-xs-11 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="<?=$trans->getTrans('menu','SEARCH_FOR')?>">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="submit"><?=$trans->getTrans('menu','SEARCH')?></button>
                        </span>
                        <input type="hidden" name="lang" value="<?=$_SESSION['lang']?>">
                    </div>
                  </div>
                </div>
              </form>

              <ul class="nav navbar-nav navbar-right profile_menu language_switcher">
                <li>
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="padding-bottom: 21px;">
                    <i class="fa fa-flag"></i> <?php echo $languages[$_SESSION['lang']]; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <?php foreach ($languages as $key => $value) : ?>
                      <?php if ( $key == $_SESSION['lang'] ) continue; ?>
                      <li><a href="<?php echo $path.'?lang='.$key; ?>"><?php echo $value; ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right profile_menu">
                <li>
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="padding-bottom: 21px;">
                    <img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/loggedin.png" alt=""><?=$_SESSION["userFirstName"]?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right" style="width: 100%;">
                    <li><a href="<?=SERVICES_PLATFORM_DOMAIN?>/pub/userData.php?userTK=<?=urlencode($_SESSION["userTK"])?>&c=<?=$b64HttpHost?>"><?=$trans->getTrans('menu','MY_DATA')?></a></li>
                    <!--li><a href="javascript:;"><?=$trans->getTrans('menu','CHANGE_PASSWORD')?></a></li-->
                    <li><a href="<?=RELATIVE_PATH?>/controller/logout/control/business"><i class="fa fa-sign-out pull-right"></i><?=$trans->getTrans('menu','LOGOUT')?></a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->