<?php
// API controller

/* Favorite Documents */
if ( $_REQUEST['favorites'] ) {
	require_once(dirname(__FILE__)."/api/MyDocuments.php");
} else {
	die('default');
}

?>
