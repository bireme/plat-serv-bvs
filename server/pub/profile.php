<?php
	require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/header.tpl.php");
	require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/sidebar.tpl.php");
	require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/nav.tpl.php");

	$birth = ( $usr->getBirthday() ) ? date("d/m/Y", strtotime($usr->getBirthday())) : '';
?>

	<div id="wrap">
		<div class="row box1">
			<div class="col s12">
				<h5 class="title1"><i class="fas fa-user-edit left"></i> Editar Perfil</h5>
				<div class="divider"></div>
			</div>
			<?php if ( $response["status"] === true ) : ?>
				<div class="col s12">
					<div class="card-panel green success-text">
						<i class="close material-icons right white-text dismiss" style="cursor: pointer;">close</i>
						<i class="material-icons white-text left" style="cursor: default;">check_circle</i>
						<span class="white-text"><?php echo $response["msg"]; ?></span>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( $response["status"] === false ) : ?>
				<div class="col s12">
					<div class="card-panel red success-text">
						<i class="close material-icons right white-text dismiss" style="cursor: pointer;">close</i>
						<i class="material-icons white-text left" style="cursor: default;">report_problem</i>
						<span class="white-text"><?php echo $response["msg"]; ?></span>
					</div>
				</div>
			<?php endif; ?>
			<?php if( $isUser && !$usr->getAgreementDate() ) : ?>
				<div class="col s12">
					<div class="card-panel light-blue darken-1 success-text">
						<i class="close material-icons right white-text dismiss" style="cursor: pointer;">close</i>
						<i class="material-icons white-text left" style="cursor: default;">info</i>
						<span class="white-text"><?php echo UPDATE_INFO; ?></span>
					</div>
				</div>
			<?php endif; ?>
			<section class="col s12">
				<div class="box1">
					<form id="cadastro" class="col s12" method="post" name="cadastro" enctype="multipart/form-data" novalidate>
						<div class="row">
		                    <input type="hidden" name="postback" value="1" />
		                    <input type="hidden" name="source" value="<?php echo ($isUser) ? trim($usr->getSource()) : 'ldap'; ?>" />
		                    <input type="hidden" name="autoconn" value="" />
							<div class="input-field col s12 center-align">
								<?php if ($usr->getGender() == "M") : ?>
									<img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/male.svg" alt="Avatar User" class="circle" width="150">
								<?php else : ?>
									<img src="<?php echo RELATIVE_PATH; ?>/images/<?php echo $_SESSION["skin"]; ?>/female.svg" alt="Avatar User" class="circle" width="150">
								<?php endif; ?>
							</div>
		                    <div class="form-group">
								<div class="input-field col s12 m6">
									<input id="firstName" name="firstName" type="text" class="bgInputs" autocomplete="off" value="<?php echo trim($usr->getFirstName()); ?>" required="">
									<label for="firstName">* <?php echo FIELD_FIRST_NAME; ?></label>
								</div>
								<div class="input-field col s12 m6">
									<input id="lastName" name="lastName" type="text" class="bgInputs" autocomplete="off" value="<?php echo trim($usr->getLastName()); ?>" required="">
									<label for="lastName">* <?php echo FIELD_LAST_NAME; ?></label>
								</div>
								<div class="input-field col s12 m6">
									<input id="user" name="user" type="email" class="bgInputs" autocomplete="off" value="<?php echo trim($usr->getID()); ?>" required="" disabled>
									<label for="user">* <?php echo FIELD_LOGIN; ?></label>
								</div>
								<div class="input-field col s12 m6">
									<input id="afiliacao" name="afiliacao" type="text" class="bgInputs" autocomplete="off" value="<?php echo $usr->getAffiliation(); ?>">
									<label for="afiliacao"><?php echo FIELD_AFILIATION; ?></label>
								</div>
								<div class="input-field col s12 m6">
									<input id="lattes" name="lattes" type="url" class="bgInputs" autocomplete="off" value="<?php echo $usr->getLattes(); ?>">
									<label for="lattes"><?php echo FIELD_LATTES; ?></label>
								</div>
								<div class="input-field col s12 m6">
									<input id="linkedin" name="linkedin" type="url" class="bgInputs" autocomplete="off" value="<?php echo $usr->getLinkedin(); ?>">
									<label for="linkedin"><?php echo FIELD_LINKEDIN; ?></label>
								</div>
								<div class="input-field col s12 m6">
									<input id="researchGate" name="researchGate" type="url" class="bgInputs" autocomplete="off" value="<?php echo $usr->getResearchGate(); ?>">
									<label for="researchGate"><?php echo FIELD_RESEARCHGATE; ?></label>
								</div>
								<div class="input-field col s12 m6">
									<input id="orcid" name="orcid" type="text" class="bgInputs" autocomplete="off" value="<?php echo $usr->getOrcid(); ?>">
									<label for="orcid"><?php echo FIELD_ORCID; ?></label>
									<span class="helper-text"><a class="modal-trigger" href="#modal"><?php echo WHAT_IS_IT; ?></a></span>
								</div>
								<div class="input-field col s12 m6">
									<input id="researcherID" name="researcherID" type="text" class="bgInputs" autocomplete="off" value="<?php echo $usr->getResearcherID(); ?>">
									<label for="researcherID"><?php echo FIELD_RESEARCHERID; ?></label>
									<span class="helper-text"><a class="modal-trigger" href="#modal"><?php echo WHAT_IS_IT; ?></a></span>
								</div>
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
										<option value="M" <?php if ($usr->getGender() == "M") echo "selected"; ?>><?php echo FIELD_GENDER_MALE; ?></option>
										<option value="F" <?php if ($usr->getGender() == "F") echo "selected"; ?>><?php echo FIELD_GENDER_FEMALE; ?></option>
									</select>
									<label>* <?php echo FIELD_GENDER; ?></label>
								</div>
								<div class="input-field col s12 m6">
									<input id="birthday" name="birthday" type="text" class="datepicker bgInputs" autocomplete="off" value="<?php echo $birth; ?>">
									<label for="birthday"><?php echo FIELD_BIRTHDAY; ?></label>
									<div class="clearfix"></div>
								</div>
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
									<input name="accept_mail" type="checkbox" value="1" <?php if ( $usr->getAcceptMail() ) echo "checked"; ?>>
									<span id="accept_mail"><?php echo ACCEPT_MAIL; ?></span>
								</label>
							</div>
							<?php if( !$usr->getAgreementDate() ) : ?>
							<div class="checkbox-field col s12">
								<label>
									<input name="terms" type="checkbox" value="<?php echo date('Y-m-d'); ?>" />
									<span id="terms"><?php echo TERMS_AGREEMENT_MESSAGE; ?></span>
								</label>
							</div>
							<?php else : ?>
							<input type="hidden" name="terms" value="<?php echo $usr->getAgreementDate(); ?>" />
							<?php endif; ?>
							<div class="input-field col s12 center">
								<br /><div class="divider"></div>
								<br /><input id="send" type="submit" class="btn btnSuccess hoverable" value="<?php echo BUTTON_UPDATE_USER?>" />
                                <input type="hidden" value="atualizar" name="acao">
							</div>
							<div class="card-panel right blue-text text-darken-2 delete-account"><a href="<?php echo SERVICES_PLATFORM_DOMAIN; ?>/pub/removeAccount.php?userTK=<?=urlencode($_SESSION["userTK"])?>&c=<?=$b64HttpHost?>" class="remove-account"><?php echo DELETE_ACCOUNT_REQUEST; ?></a></div>
						</div>
					</form>
				</div>
			</section>
		</div>
		<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/info.tpl.php"); ?>
		<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/more.tpl.php"); ?>
	</div>
	<!-- Modal -->
	<div id="modal" class="modal">
		<div class="modal-content"><?php echo WHAT_IS_IT_DESC; ?></div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat"><?php echo BUTTON_CLOSE; ?></a>
		</div>
	</div>
	<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/footer.tpl.php"); ?>