<?php
$access_item = false;
if(isset($read_access) && $read_access) {
	return;
}

include_once($_SERVER["FRAMEWORK_PATH"]."/config/init.php");

$action = $page->actions();


$page->bodyClass("apis");
$page->pageTitle("Giving your backend peace");


// implementation
if(count($action) > 0 && $action[0] == "implement") {

	$page->header();
	$page->template("pages/implement.php");
	$page->footer();
	exit();

}
else {

	$page->header();
	$page->template("pages/apis.php");
	$page->footer();

}

?>