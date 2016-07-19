<?php
/* 
 *
 */
require_once(dirname(__FILE__).'/../classes/UserDAO.php');
require_once(dirname(__FILE__).'/../classes/DocumentDAO.php');

echo '<html><head><meta name="robots" content="noindex" /></head><body><pre>';

echo "***************************************\n";
echo "*                                     *\n";
echo "*  services platform migration stats  *\n";
echo "*                                     *\n";
echo "***************************************\n\n";


echo 'Total users: ' . UserDAO::getUsersCount();
echo '<br/>';
echo 'Total BIREME users: ' . UserDAO::getUsersCount(false, 'bireme.org');
echo '<br/>';
echo 'Total external users: ' . (UserDAO::getUsersCount() - UserDAO::getUsersCount(false, 'bireme.org'));
echo '<br/>';
echo 'Total migrated users: ' . UserDAO::getUsersCount(true);
echo '<br/>';
echo 'Total BIREME users migrated: ' . UserDAO::getUsersCount(true, 'bireme.org');
echo '<br/>';
echo 'Total external users migrated: ' . (UserDAO::getUsersCount(true) - UserDAO::getUsersCount(true, 'bireme.org'));
echo '<br/><br/>';
echo 'Total documents: ' . DocumentDAO::getDocsCount();
echo '<br/>';
echo 'Total documents from IAHx: ' . DocumentDAO::getDocsCount("NOT LIKE 'S%'");
echo '<br/>';
echo 'Total documents from SciELO: ' . DocumentDAO::getDocsCount("LIKE 'S%'");
echo '</pre></body></html>';
?>