        <?require_once(dirname(__FILE__)."/header.tpl.php");?>
        <?require_once(dirname(__FILE__)."/sidebar.tpl.php");?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?=$trans->getTrans($_REQUEST["action"],'SUGGESTED_DOCS')?></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="tabs" class="nav nav-tabs bar_tabs right" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_docs" role="tab" id="docs_tab" data-toggle="tab" aria-controls="docs" aria-expanded="false"><i class="fa fa-files-o"></i> <?=$trans->getTrans($_REQUEST["action"],'DOCS')?></a>
                        </li>
                        <li role="presentation"><a href="#tab_config" id="config_tab" role="tab" data-toggle="tab" aria-controls="config" aria-expanded="true"><i class="fa fa-cogs"></i> <?=$trans->getTrans($_REQUEST["action"],'CONFIG')?></a>
                        </li>
                      </ul>
                      <div id="tab_content" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in" id="tab_config" aria-labelledby="config-tab">
                          <form class="form-horizontal form-label-left">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;"><?=$trans->getTrans($_REQUEST["action"],'DOCS_SOURCE')?></label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <select id="reference" name="reference" class="form-control">
                                  <option></option>
                                  <option value="orcidworks"><?=$trans->getTrans($_REQUEST["action"],'ORCID')?></option>
                                  <option value="mydocuments"><?=$trans->getTrans($_REQUEST["action"],'COLLECTIONS')?></option>
                                  <option value="myprofiledocuments"><?=$trans->getTrans($_REQUEST["action"],'PROFILES')?></option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group docs-folder" style="display: none;">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;"><?=$trans->getTrans($_REQUEST["action"],'FOLDERS_LIST')?></label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <select id="docsfolder" name="docsfolder" class="form-control">
                                  <option></option>
                                  <option value="0"><?=$trans->getTrans($_REQUEST["action"],'INCOMING_FOLDER')?></option>
                                  <?php foreach ($docsFolders as $folder) : ?>
                                  <option value="<?php echo $folder['dirID'] ?>"><?php echo $folder['name']; ?></option>
                                <?php endforeach ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group profiles" style="display: none;">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align: left;"><?=$trans->getTrans($_REQUEST["action"],'PROFILES_LIST')?></label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <select id="profile" name="profile" class="form-control">
                                  <option></option>
                                  <?php foreach ($profiles as $profile) : ?>
                                  <option value="<?php echo $profile['profileID'] ?>"><?php echo $profile['profileName']; ?></option>
                                <?php endforeach ?>
                                </select>
                              </div>
                            </div>
                          </form>
                          <div id="loading"><?=$trans->getTrans($_REQUEST["action"],'LOADING')?></div>
                          <div class="result">
                          <?php if ( $response["values"] != false ) : ?>
                            <p class="col-md-6 col-sm-6 col-xs-12" style="margin-top: 20px;"><?=$trans->getTrans($_REQUEST["action"],'REFERENCE')?></p>
                            <?php //echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                            <!-- start project list -->
                            <table class="table table-striped table-list">
                              <!--thead>
                                <tr>
                                  <th>#</th>
                                </tr>
                              </thead-->
                              <tbody>
                                <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                                <?php foreach ( $response["values"] as $register ) : $count++; ?>
                                  <?php $title = (is_array($register["title"])) ? implode(" / ", $register["title"]) : $register["title"]; ?>
                                  <?php $authors = (is_array($register["authors"])) ? implode("; ", $register["authors"]) : $register["authors"]; ?>
                                <tr>
                                  <td>
                                    <div class="checkbox">
                                      <label>
                                        <input id="doc<?php echo $count; ?>" type="checkbox" value="<?php echo $title; ?>">
                                      </label>
                                    </div>
                                  </td>
                                  <td>
                                    <?php if ( $register['docURL'] ) : ?>
                                      <a href="<?php echo $register["docURL"]; ?>" target="_blank"><?php echo $title; ?></a>
                                    <?php else : ?>
                                      <?php echo $title ?>
                                    <?php endif; ?>
                                    <small style="display: block;"><?php echo $authors; ?></small>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                            <!-- end project list -->
                            <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">
                              <button type="button" class="btn btn-primary submit"><?=$trans->getTrans($_REQUEST["action"],'SEND')?></button>
                              <span class="count">0</span> <?=$trans->getTrans($_REQUEST["action"],'SELECTED_DOCS')?>
                            </div>
                            <?php echo $objPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                          <?php else : ?>
                            <?php if ( $_REQUEST["type"] ) : ?>
                              <p class="none-docs"><?php echo $trans->getTrans($_REQUEST["action"],'NO_REFERENCES'); ?></p>
                            <?php endif; ?>
                          <?php endif; ?>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_docs" aria-labelledby="docs-tab">
                          <?php if ( $responseDocs["values"] != false ) : ?>
                            <?php //echo $sdPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                            <!-- start project list -->
                            <table class="table table-striped table-list">
                              <!--thead>
                                <tr>
                                  <th>#</th>
                                </tr>
                              </thead-->
                              <tbody>
                                <?php $count = $_REQUEST["page"] ? --$_REQUEST["page"] * DOCUMENTS_PER_PAGE : 0; ?>
                                <?php foreach ( $responseDocs["values"] as $register ) : $count++; ?>
                                <tr>
                                  <td id="sd<?php echo $count; ?>"><a href="<?php echo $register["docURL"]; ?>" target="_blank"><?php echo $register["title"]; ?></a><small style="display: block;"><?php echo $register["authors"]; ?></small></td>
                                  <td style="text-align: right;">
                                    <button class="btn btn-success btn-xs add-collection" value="<?php echo $register["docID"]; ?>"><?=$trans->getTrans($_REQUEST["action"],'ADD_COLLECTION')?></button>
                                  </td>
                                </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                            <!-- end project list -->
                            <?php echo $sdPaginator->render($trans->getTrans($_REQUEST["action"],'NEXT'), $trans->getTrans($_REQUEST["action"],'PREVIOUS')); ?>
                          <?php else : ?>
                            <p class="none-docs"><?=$trans->getTrans($_REQUEST["action"],'SUGGESTED_DOCS_NO_REGISTERS_FOUND')?></p>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?require_once(dirname(__FILE__)."/footer.tpl.php");?>