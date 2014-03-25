<?php
$access_item = false;
if(isset($read_access) && $read_access) {
	return;
}

include_once($_SERVER["FRAMEWORK_PATH"]."/config/init.php");

$action = $page->actions();


$page->bodyClass("front");
$page->pageTitle("Conductor - Giving your frontend head");


// APIs
if(count($action) > 0 && $action[0] == "apis") {

	$page->header();
	$page->template("pages/apis.php");
	$page->footer();
	exit();

}
// segments
else if(count($action) > 0 && $action[0] == "segments") {

	$page->header();
	$page->template("pages/segments.php");
	$page->footer();
	exit();

}
// pricing
else if(count($action) > 0 && $action[0] == "pricing") {

	$page->header();
	$page->template("pages/pricing.php");
	$page->footer();
	exit();

}
// implementation
else if(count($action) > 0 && $action[0] == "implement") {

	$page->header();
	$page->template("pages/implement.php");
	$page->footer();
	exit();

}
// implementation
else if(count($action) > 0 && $action[0] == "about") {

	$page->header();
	$page->template("pages/about.php");
	$page->footer();
	exit();

}
else {

	$page->header();
	$page->template("pages/front.php");
	$page->footer();
	exit();

}

?>