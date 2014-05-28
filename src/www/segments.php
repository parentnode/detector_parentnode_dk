<?php
$access_item = false;
if(isset($read_access) && $read_access) {
	return;
}

include_once($_SERVER["FRAMEWORK_PATH"]."/config/init.php");

$action = $page->actions();


$page->bodyClass("segments");
$page->pageTitle("Giving your frontend peace");



$page->header();
$page->template("pages/segments.php");
$page->footer();

?>