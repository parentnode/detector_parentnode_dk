<?php

/**
* This file contains definitions
*
* @package Config
*/
error_reporting(E_ALL);
header("Content-type: text/html; charset=UTF-8");

/**
* Site name
*/
define("SITE_UID", "DTCR");
define("SITE_NAME", "Detector");
define("SITE_URL", "detector.parentnode.dk");

define("DEFAULT_LANGUAGE_ISO", "en"); // Regional language English
define("DEFAULT_COUNTRY_ISO", "dk"); // Regional country Denmark
define("DEFAULT_PAGE_DESCRIPTION", "Detector devicesegmentation API presentation and documentation");


// Enable items model
//define("SITE_ITEMS", true);

// Enable notifications (send collection email after N notifications)
//define("SITE_COLLECT_NOTIFICATIONS", 50);
?>
