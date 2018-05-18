<?php
    require_once(dirname(__FILE__)."/header.tpl.php");
    
    $path = rtrim($_SERVER['PHP_SELF'], '/') . '/';
    $b64HttpHost = base64_encode(RELATIVE_PATH.'/controller/authentication');
    $build_query = '?origin='.$origin.'&iahx='.$iahx;
?>

    <div class="container">
        <div class="omb_login">
            <div class="languages">
                <div class="col-xs-12 col-sm-12">
                    <?php foreach ($languages as $key => $value) : ?>
                        <?php if ( $key == $_SESSION['lang'] ) continue; ?>
                        <span><a href="<?php echo $path.'?lang='.$key; ?>"><?php echo $value; ?></a></span>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h1 class="omb_authTitle">
                        <img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/logo-md-<?=$_SESSION["lang"]?>.png" alt="VHL Logo" class="logo">
                        <img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/logo-bireme-md-<?=$_SESSION["lang"]?>.png" alt="VHL Logo BIREME" class="logo-bireme">
                        <img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/bireme_vert_<?=$_SESSION["lang"]?>.png" alt="VHL Logo BIREME" class="logo-bireme-vert">
                        <span><?=$trans->getTrans($_REQUEST["action"],'MY_VHL')?></span>
                    </h1>
                </div>
            </div>
            <form class="public_search_bar" action="<?php echo VHL_SEARCH_PORTAL_DOMAIN.'/portal/'; ?>" method="get" target="_blank">
                <div class="search_bar">
                    <div class="col-xs-11 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="<?=$trans->getTrans('menu','SEARCH_FOR')?>">
                            <span class="input-group-btn"><button class="btn btn-default" type="submit"><?=$trans->getTrans('menu','SEARCH')?></button></span>
                            <input type="hidden" name="lang" value="<?=$_SESSION['lang']?>">
                        </div>
                    </div>
                </div>
            </form>
            <?php if ( 'recover' == $_REQUEST["task"] ) : ?>
            <div class="row omb_row-sm-offset-3 omb_description">
                <div class="col-xs-12 col-sm-6">
                    <p><?=$trans->getTrans($_REQUEST["action"],'MY_VHL_SUMMARY')?></p>
                </div>
                <div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="color: #73879C;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h2 class="modal-title"><?=$trans->getTrans($_REQUEST["action"],'MY_VHL')?></h2>
                        </div>
                        <div class="modal-body">
                          <?=$trans->getTrans($_REQUEST["action"],'MY_VHL_DESCRIPTION')?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal"><?=$trans->getTrans($_REQUEST["action"],'BUTTON_CLOSE')?></button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row omb_row-sm-offset-3 omb_recover">
                <div class="col-xs-12 col-sm-3">
                    <div class="recover">
                        <p><?=$trans->getTrans($_REQUEST["action"],'RECOVER_ACCOUNTS')?></p>
                        <p><a target="_blank" class="decor" href="<?=BIR_ACCOUNTS_DOMAIN.'/accounts/password/reset/'?>"><?=$trans->getTrans($_REQUEST["action"],'RECOVER_ACCOUNTS_LINK')?></a></p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="recover">
                        <p><?=$trans->getTrans($_REQUEST["action"],'RECOVER_PASSWORD')?></p>
                        <p><a target="_parent" class="decor" href="<?=SERVICES_PLATFORM_DOMAIN.'/pub/forgotPassword.php?c='.$b64HttpHost ?>"><?=$trans->getTrans($_REQUEST["action"],'RECOVER_PASSWORD_LINK')?></a></p>
                    </div>
                </div>
            </div>
            <?php elseif ( 'describe' == $_REQUEST["task"] ) : ?>
            <div class="row omb_row-sm-offset-3 omb_description">
                <div class="col-xs-12 col-sm-6">
                    <p><?=$trans->getTrans($_REQUEST["action"],'MY_VHL_DESCRIPTION')?></p>
                </div>
            </div>
            <?php else : ?>
            <div class="login-area">
                <div class="login-box">
                    <div class="row omb_loginOr">
                        <div class="col-xs-12 col-sm-12">
                            <span class="omb_spanOr omb_spanLogin"><?=$trans->getTrans($_REQUEST["action"],'LOGIN_MESSAGE')?></span>
                        </div>
                    </div>
                    <div class="row omb_loginOr">
                        <div class="col-xs-12 col-sm-12">
                            <hr class="omb_hrOr" />
                            <span class="omb_spanOr omb_spanLoginWith"><?=$trans->getTrans($_REQUEST["action"],'LOGIN_WITH')?></span>
                        </div>
                    </div>
                    <div class="row omb_row-sm-offset-3 omb_socialButtons">
                        <div class="col-xs-6 col-sm-3">
                            <a href="/connector/facebook/<?php echo $build_query; ?>" class="btn btn-lg btn-block omb_btn-facebook">
                                <i class="fa fa-facebook visible-xs"></i>
                                <span class="hidden-xs">Facebook</span>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <a href="/connector/google/<?php echo $build_query; ?>" class="btn btn-lg btn-block omb_btn-google">
                                <i class="fa fa-google visible-xs"></i>
                                <span class="hidden-xs">Google</span>
                            </a>
                        </div>
                    </div>
                    <div class="row omb_loginOr">
                        <div class="col-xs-12 col-sm-12">
                            <hr class="omb_hrOr" />
                            <span class="omb_spanOr"><?=$trans->getTrans($_REQUEST["action"],'OR')?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <form class="omb_loginForm" action="<?=RELATIVE_PATH?>/controller/authentication" method="POST">
                                <input type="hidden" name="origin" value="<?php echo $origin; ?>" />
                                <input type="hidden" name="control" value="business" />
                                <input type="hidden" name="action" value="authentication" />
                                <input type="hidden" name="lang" value="<?php echo $lang; ?>" />
                                <input type="hidden" name="iahx" value="<?php echo $iahx; ?>" />
                                <input type="submit" style="display:none" />
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="userID" maxlenght="50" placeholder="<?=$trans->getTrans($_REQUEST['action'],'USER')?>">
                                </div>
                                <span class="help-block"></span>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="userPass" maxlenght="15" class="form-control" placeholder="<?=$trans->getTrans($_REQUEST['action'],'PASSWORD')?>"/>
                                </div>
                                <span class="help-block"></span>
                                <? if ($_GET['error'] && $_GET['error'] == 'access_denied' ){ ?>
                                    <span class="help-block"><?=$trans->getTrans($_REQUEST["action"],'ACCESS_DENIED')?></span>
                                <? } ?>
                                <? if ($response['values']['status'] === false){ ?>
                                    <span class="help-block"><?=$trans->getTrans($_REQUEST["action"],'INVALID_LOGIN')?></span>
                                <? } ?>
                                <? if ($response['values']['birLDAP'] === false){ ?>
                                    <span class="help-block"><?=$trans->getTrans($_REQUEST["action"],'BIREME_LOGIN_LDAP')?></span>
                                <? } ?>
                            </form>
                        </div>
                    </div>
                    <div class="row omb_row-sm-offset-3">
                        <div class="col-xs-12 col-sm-4">
                            <!--label class="checkbox"><input type="checkbox" value="remember-me">mantenha-me conectado</label-->
                            <p class="omb_forgotPwd">
                                <a target="_parent" class="decor" href="<?=RELATIVE_PATH?>/controller/authentication/task/recover"><?=$trans->getTrans($_REQUEST["action"],'FORGOT_MY_PASSWORD')?></a>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <button class="btn btn-lg btn-primary btn-block btn-login" type="submit" onclick="document.forms[0].submit();"><?=$trans->getTrans($_REQUEST["action"],'LOGIN')?></button>
                        </div>
                    </div>
                    <div class="row omb_spacer">
                        <div class="col-xs-12 col-sm-12">
                            <hr />
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <p class="omb_registry">
                                <span><?=$trans->getTrans($_REQUEST["action"],'NOTICE')?></span>
                                <a target="_parent" class="decor" href="<?=SERVICES_PLATFORM_DOMAIN.'/pub/userData.php?c='.$b64HttpHost ?>"><?=$trans->getTrans($_REQUEST["action"],'REGISTRY')?></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row omb_description">
                    <div class="col-xs-12 col-md-12 col-sm-12">
                        <p><?=$trans->getTrans($_REQUEST["action"],'MY_VHL_SUMMARY')?></p>
                        <a href="<?php echo $my_vhl_playlist[$_SESSION['lang']] ?>" target="_blank"><img src="<?=RELATIVE_PATH?>/images/<?=$_SESSION["skin"]?>/youtube.png" alt="YouTube Logo" class="youtube-logo"></a>
                    </div>
                    <div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="color: #73879C;">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                              </button>
                              <h2 class="modal-title"><?=$trans->getTrans($_REQUEST["action"],'MY_VHL')?></h2>
                            </div>
                            <div class="modal-body">
                              <?=$trans->getTrans($_REQUEST["action"],'MY_VHL_DESCRIPTION')?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><?=$trans->getTrans($_REQUEST["action"],'BUTTON_CLOSE')?></button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

<?require_once(dirname(__FILE__)."/footer.tpl.php");?>
