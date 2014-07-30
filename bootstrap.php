<?php

// Hide errors
if ( ! DEV ) {
	ini_set("display_errors",0);
	error_reporting(0);
}

// Connection PDO
try {
	$PDO = new PDO('mysql:host='.BDD_HOST.';dbname='.BDD_DB_NAME, BDD_USER, BDD_PASSWORD, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
} catch(Exception $e) {
	echo 'Une erreur est survenue !';
	die();
}

// Encoding
mb_internal_encoding("UTF-8");

// Date Fr
setlocale(LC_TIME, 'fr','fr_FR','fr_FR@euro','fr_FR.utf8','fr-FR','fra');
date_default_timezone_set("Europe/Paris");



?>