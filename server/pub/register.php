<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/header.tpl.php"); ?>
<?php $build_query = '?origin=&iahx='.base64_encode('portal'); ?>

	<div class="container" style="background: #fff; padding: 30px; ">
		<div class="row">
			<?php if ( $response["status"] === true ) : ?>
				<div class="col s12 l12">
					<div class="card-panel green success-text">
						<span class="white-text"><?php echo $response["msg"]; ?></span>
					</div>
				</div>
			<?php else : ?>
				<div class="col s12 l12">
					<div class="card-panel red success-text">
						<span class="white-text"><?php echo $response["msg"]; ?></span>
					</div>
				</div>
			<?php endif; ?>
			<div class="col s12 l4">
				<div class="center"><a href="<?php echo RELATIVE_PATH; ?>/controller/authentication"><img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/logo-<?php echo $_SESSION["lang"]; ?>.png" alt="" class="responsive-img"></a></div>
				<div class="divider"></div>
				<h5 class="title1"><i class="fas fa-users left"></i> <?php echo FREE_REGISTRY; ?></h5>
				<?php echo FREE_REGISTRY_MESSAGE; ?>
			</div>
			<div class="col s12 l8">
				<form id="cadastro" method="post" name="cadastro" enctype="multipart/form-data" novalidate>

                    <input type="hidden" name="postback" value="1" />
                    <input type="hidden" name="source" value="<?php echo ($isUser) ? trim($usr->getSource()) : 'ldap'; ?>" />
                    <input type="hidden" name="autoconn" value="" />

					<div class="input-field col s12 center-align">
						<img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/user.svg" alt="Avatar User" class="circle" width="150">
					</div>
					<div class="input-field col s12 m6">
						<input id="firstName" name="firstName" type="text" class="bgInputs" autocomplete="off" required="">
						<label for="firstName">* <?php echo FIELD_FIRST_NAME; ?></label>
					</div>
					<div class="input-field col s12 m6">
						<input id="lastName" name="lastName" type="text" class="bgInputs" autocomplete="off" required="">
						<label for="lastName">* <?php echo FIELD_LAST_NAME; ?></label>
					</div>
					<div class="input-field col s12 m6">
						<input id="user" name="user" type="email" class="bgInputs" autocomplete="off" required="">
						<label for="user">* <?php echo FIELD_LOGIN; ?></label>
					</div>
					<div class="input-field col s12 m6">
						<input id="confirmUser" name="confirmUser" type="email" class="bgInputs" autocomplete="off" required="">
						<label for="confirmUser">* <?php echo FIELD_LOGIN_CONFIRMATION; ?></label>
					</div>
					<div class="input-field col s12">
						<input id="afiliacao" name="afiliacao" type="text" class="bgInputs" autocomplete="off">
						<label for="afiliacao"><?php echo FIELD_AFILIATION; ?></label>
					</div>
<!--
					<div class="input-field col s12">
						<input id="lattes" name="lattes" type="url" class="bgInputs" autocomplete="off" value="">
						<label for="lattes"><?php echo FIELD_LATTES; ?></label>
						<span class="helper-text" data-error="wrong" data-success="right"></span>
					</div>
					<div class="input-field col s12">
						<input id="linkedin" name="linkedin" type="url" class="bgInputs" autocomplete="off" value="">
						<label for="linkedin"><?php echo FIELD_LINKEDIN; ?></label>
						<span class="helper-text" data-error="wrong" data-success="right"></span>
					</div>
					<div class="input-field col s12">
						<input id="researchGate" name="researchGate" type="url" class="bgInputs" autocomplete="off" value="">
						<label for="researchGate"><?php echo FIELD_RESEARCHGATE; ?></label>
						<span class="helper-text" data-error="wrong" data-success="right"></span>
					</div>
					<div class="input-field col s12 m6">
						<input id="orcid" name="orcid" type="text" class="bgInputs" autocomplete="off" value="">
						<label for="orcid"><?php echo FIELD_ORCID; ?></label>
						<span class="helper-text" data-error="wrong" data-success="right"><a class="modal-trigger" href="#modal"><?php echo WHAT_IS_IT; ?></a></span>
					</div>
					<div class="input-field col s12 m6">
						<input id="researcherID" name="researcherID" type="text" class=" bgInputs" autocomplete="off" value="">
						<label for="researcherID"><?php echo FIELD_RESEARCHERID; ?></label>
						<span class="helper-text" data-error="wrong" data-success="right"><a class="modal-trigger" href="#modal"><?php echo WHAT_IS_IT; ?></a></span>
					</div>
-->
					<div class="input-field col s12 m6">
						<select id="country" name="country" required="">
                            <?php
                                foreach ($countries as $key => $value) {
                                    $languageCountries[$key] = $value[$lang];
                                }

                                asort($languageCountries,SORT_STRING);
                            ?>
                            <option value="" disabled selected><?php echo CHOOSE_COUNTRY; ?></option>
                            <?php foreach ($languageCountries as $key => $value) : ?>
                            <option value="<?php echo $key; ?>" <?php if ( $usr->getCountry() == $key ) echo 'selected'; ?>><?php echo $value; ?></option>
                            <?php endforeach; ?>
                        </select>
						<label>* <?php echo FIELD_COUNTRY; ?></label>
					</div>
					<div class="input-field col s12 m6">
						<select id="degree" name="degree" required="">
                            <option value="" disabled selected><?php echo CHOOSE_DEGREE; ?></option>
                            <?php
                                foreach ( $degrees[$_SESSION['lang']] as $key => $value ) {
                                    if ( $key == $usr->getDegree() ){
                                        echo '<option selected value="'.$key.'">'.$value.'</option>'."\n";
                                    }else{
                                        echo '<option value="'.$key.'">'.$value.'</option>'."\n";
                                    }
                                }
                            ?>
                        </select>
						<label>* <?php echo DEGREE; ?></label>
					</div>
					<div class="input-field col s12 m6">
						<select id="profArea" name="profArea" required="">
                            <option value="" disabled selected><?php echo CHOOSE_PROFESSIONAL_AREA; ?></option>
                            <?php
                                foreach ( $professionalArea[$_SESSION['lang']] as $key => $value ) {
                                    if ( $key == $usr->getProfessionalArea() ){
                                        echo '<option selected value="'.$key.'">'.$value.'</option>'."\n";
                                    }else{
                                        echo '<option value="'.$key.'">'.$value.'</option>'."\n";
                                    }
                                }
                            ?>
                        </select>
                        <label>* <?php echo PROFESSIONAL_AREA; ?></label>
					</div>
					<div class="input-field col s12 m6">
						<select id="gender" name="gender" required="">
							<option value="" disabled selected><?php echo CHOOSE_GENDER; ?></option>
							<option value="M"><?php echo FIELD_GENDER_MALE; ?></option>
							<option value="F"><?php echo FIELD_GENDER_FEMALE; ?></option>
						</select>
						<label>* <?php echo FIELD_GENDER; ?></label>
					</div>
					<div class="input-field col s12">
						<input id="birthday" name="birthday" type="text" class="datepicker bgInputs" autocomplete="off" >
						<label for="birthday"><?php echo FIELD_BIRTHDAY; ?></label>
						<div class="clearfix"></div>
					</div>
<!--
					<div class="input-field col s12">
						<div class="file-field input-field">
							<div class="btn">
								<span><?php echo FIELD_AVATAR; ?></span>
								<input id="avatar" name="avatar" type="file" accept="image/*">
							</div>
							<div class="file-path-wrapper">
								<input id="file-path" name="file-path" class="file-path " type="text">
							</div>
						</div>
					</div>
-->
					<div class="checkbox-field col s12">
						<label>
							<input name="accept_mail" type="checkbox" value="1" />
							<span id="accept_mail"><?php echo ACCEPT_MAIL; ?></span>
						</label>
					</div>
					<div class="checkbox-field col s12">
						<label>
							<input name="terms" type="checkbox" value="<?php echo date('Y-m-d'); ?>" />
							<span id="terms"><?php echo TERMS_AGREEMENT_MESSAGE; ?></span>
						</label>
					</div>
					<div class="input-field col s12 center">
						<br /><div class="divider"></div>
						<br /><input id="send" type="submit" class="btn btnSuccess hoverable" value="<?=BUTTON_NEW_USER?>" />
						<input type="hidden" value="gravar" name="acao" />
					</div>

				</form>
				<div class="row ">
					<div class="col s12 center-align">
						<span class="loginOu"><?php echo OR_ENTER_WITH; ?></span>
					</div>
					<div class="col s12 m6">
						<a href="/connector/google/<?php echo $build_query; ?>" class="btn waves-effect waves-light btn100 btnGoogle" name="action">GOOGLE</a>
					</div>
					<div class="col s12 m6">
						<a href="/connector/facebook/<?php echo $build_query; ?>" class="btn waves-effect waves-light btn100 btnFacebook" name="action">FACEBOOK</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div id="modal" class="modal">
		<div class="modal-content"><?php echo WHAT_IS_IT_DESC; ?></div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat"><?php echo BUTTON_CLOSE; ?></a>
		</div>
	</div>

	<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/info.tpl.php"); ?>

<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/footer.tpl.php"); ?>