<?php
// API controller

// prevent XSS (cross-site scripting)
$_REQUEST = array_map(function ($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}, $_REQUEST);

/* Favorite Documents */
if ( $_REQUEST['favorites'] ) {
	require_once(dirname(__FILE__)."/api/MyDocuments.php");
} else {
	die('default');
}

?>
