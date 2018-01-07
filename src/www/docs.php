<?php
$access_item = false;
if(isset($read_access) && $read_access) {
	return;
}

include_once($_SERVER["FRAMEWORK_PATH"]."/config/init.php");


$action = $page->actions();


$page->bodyClass("docs");
$page->pageTitle("Giving your backend peace");


// v2
if(count($action) > 0 && preg_match("/v[\d]{1}/", $action[0])) {


	$page->page(array(
		"templates" => "docs/".$action[0]."/".$action[1].".php"
	));
	exit();

}
// current version
else if(count($action) > 0) {

	// changelog
	if($action[0] == "changelog") {

		$page->page(array(
			"templates" => "docs/changelog.php"
		));
		exit();

	}
	else {

		$page->page(array(
			"templates" => "docs/v4/".$action[0].".php"
		));
		exit();

	}

}


$page->page(array(
	"templates" => "docs/docs.php"
));
exit();

?>