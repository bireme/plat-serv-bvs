<?php require_once(dirname(__FILE__)."/header.tpl.php"); ?>

<?php $b64HttpHost = base64_encode($_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"].'/authentication'); ?>

<?php $build_query = '?origin='.$origin.'&iahx='.$iahx; ?>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <div class="container">
        <div class="omb_login">
            <h3 class="omb_authTitle"><?=$trans->getTrans($_REQUEST["action"],'TITLE')?></h3>
            <div class="row omb_row-sm-offset-3 omb_socialButtons">
                <div class="col-xs-4 col-sm-3">
                    <a href="/connector/facebook/<?php echo $build_query; ?>" class="btn btn-lg btn-block omb_btn-facebook">
                        <i class="fa fa-facebook visible-xs"></i>
                        <span class="hidden-xs">Facebook</span>
                    </a>
                </div>
                <!--div class="col-xs-4 col-sm-2">
                    <a href="/connector/linkedin" class="btn btn-lg btn-block omb_btn-linkedin">
                        <i class="fa fa-linkedin visible-xs"></i>
                        <span class="hidden-xs">LinkedIn</span>
                    </a>
                </div-->
                <div class="col-xs-4 col-sm-3">
                    <a href="/connector/google/<?php echo $build_query; ?>" class="btn btn-lg btn-block omb_btn-google">
                        <i class="fa fa-google visible-xs"></i>
                        <span class="hidden-xs">Google</span>
                    </a>
                </div>
            </div>
            <div class="row omb_row-sm-offset-3 omb_loginOr">
                <div class="col-xs-12 col-sm-6">
                    <hr class="omb_hrOr">
                    <span class="omb_spanOr"><?=$trans->getTrans($_REQUEST["action"],'OR')?></span>
                </div>
            </div>
            <div class="row omb_row-sm-offset-3">
                <div class="col-xs-12 col-sm-6">    
                    <form class="omb_loginForm" action="<?=RELATIVE_PATH?>/controller/authentication" autocomplete="off" method="POST">
                        <input type="hidden" name="origin" value="<?php echo $origin; ?>" />
                        <input type="hidden" name="control" value="business" />
                        <input type="hidden" name="action" value="authentication" />
                        <input type="hidden" name="lang" value="<?php echo $lang; ?>" />
                        <input type="hidden" name="iahx" value="<?php echo $iahx; ?>" />
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="userID" maxlenght="50" placeholder="<?=$trans->getTrans($_REQUEST['action'],'LOGIN')?>">
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
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                    </form>
                </div>
            </div>
            <div class="row omb_row-sm-offset-3">
                <!--div class="col-xs-12 col-sm-3">
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me">Remember Me
                    </label>
                </div-->
                <div class="col-xs-12 col-sm-3">
                    <p class="omb_registry">
                        <a target="_parent" href="<?=SERVICES_PLATFORM_DOMAIN.'/pub/userData.php?c='.$b64HttpHost ?>"><?=$trans->getTrans($_REQUEST["action"],'REGISTRY')?></a>
                    </p>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <p class="omb_forgotPwd">
                        <a target="_parent" href="<?=SERVICES_PLATFORM_DOMAIN.'/pub/forgotPassword.php?c='.$b64HttpHost ?>"><?=$trans->getTrans($_REQUEST["action"],'FORGOT_MY_PASSWORD')?></a>
                    </p>
                    <p class="omb_forgotPwd">
                        <a target="_parent" href="<?=BIR_ACCOUNTS_DOMAIN.'/accounts/password/reset/'?>"><?=$trans->getTrans($_REQUEST["action"],'FORGOT_MY_PASSWORD')?> (FI-ADMIN)</a>
                    </p>
                </div>
            </div>          
        </div>
    </div>

<?require_once(dirname(__FILE__)."/footer.tpl.php");?>
