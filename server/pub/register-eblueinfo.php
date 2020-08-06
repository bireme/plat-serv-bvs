<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/header-eblueinfo.tpl.php"); ?>
<?php $birth = ( $usr->getBirthday() ) ? date("d/m/Y", strtotime($usr->getBirthday())) : ''; ?>

		<section class="row">
			<h4 class="center-align"><?php echo FREE_REGISTRY; ?></h4>
			<form id="cadastro" class="col s10 offset-s1 m6 offset-m3 l4 offset-l4" method="post" name="cadastro" novalidate>
				<div class="row">
                    <input type="hidden" name="postback" value="1" />
                    <input type="hidden" name="source" value="e-blueinfo" />
                    <input type="hidden" name="theme" value="e-blueinfo" />
					<input type="hidden" value="gravar" name="acao" />
                    <input type="hidden" name="autoconn" value="" />

                    <?php if ( $response["status"] === false ) : ?>
		            <div class="col s12">
						<div class="card-panel red success-text center-align">
							<span class="white-text"><?php echo $response["msg"]; ?></span>
						</div>
					</div>
		            <?php endif; ?>

					<div class="input-field col s12">
						<input id="firstName" name="firstName" type="text" class="bgInputs" value="<?php echo $usr->getFirstName(); ?>" autocomplete="off" required="">
						<label for="firstName"><?php echo FIELD_FIRST_NAME; ?></label>
					</div>

					<div class="input-field col s12">
						<input id="lastName" name="lastName" type="text" class="bgInputs" value="<?php echo $usr->getLastName(); ?>" autocomplete="off" required="">
						<label for="lastName"><?php echo FIELD_LAST_NAME; ?></label>
					</div>
					<div class="input-field col s12">
						<input id="user" name="user" type="email" class="bgInputs" value="<?php echo $usr->getID(); ?>" autocomplete="off" required="">
						<label for="user"><?php echo FIELD_LOGIN; ?></label>
					</div>
					<div class="input-field col s12">
						<input id="confirmUser" name="confirmUser" type="email" class="bgInputs" autocomplete="off" required="">
						<label for="confirmUser"><?php echo FIELD_LOGIN_CONFIRMATION; ?></label>
					</div>
					<div class="input-field col s12">
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
						<label><?php echo FIELD_COUNTRY; ?></label>
					</div>
					<div class="input-field col s12">
						<input id="birthday" name="birthday" type="text" class="datepicker bgInputs" value="<?php echo $birth; ?>" autocomplete="off" >
						<label for="birthday"><?php echo FIELD_BIRTHDAY; ?></label>
						<div class="clearfix"></div>
					</div>
					<div class="input-field col s12 center-align">
						<button class="btn waves-effect waves-light blue darken-4 bt100" type="submit" name="action"><?php echo BUTTON_NEW_USER; ?></button>
					</div>
				</div>
			</form>
		</section>

<?php require_once(dirname(__FILE__)."/../templates/".DEFAULT_SKIN."/footer-eblueinfo.tpl.php"); ?>