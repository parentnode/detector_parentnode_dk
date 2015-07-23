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
if(count($action) > 0 && $action[0] == "v2") {

	if($action[1] == "implement") {

		$page->page(array(
			"templates" => "docs/implement-v2.php"
		));
		exit();

	}
	else if($action[1] == "apis") {

		$page->page(array(
			"templates" => "docs/apis-v2.php"
		));
		exit();

	}
	else if($action[1] == "segments") {

		$page->page(array(
			"templates" => "docs/segments-v2.php"
		));
		exit();

	}

}
// current version
else if(count($action) > 0) {

	if($action[0] == "implement") {

		$page->page(array(
			"templates" => "docs/implement.php"
		));
		exit();

	}
	else if($action[0] == "apis") {

		$page->page(array(
			"templates" => "docs/apis.php"
		));
		exit();

	}
	else if($action[0] == "segments") {

		$page->page(array(
			"templates" => "docs/segments.php"
		));
		exit();

	}

	// changelog
	else if($action[0] == "changelog") {

		$page->page(array(
			"templates" => "docs/changelog.php"
		));
		exit();

	}
	// upgrade v2 to v3
	else if($action[0] == "upgrade-v2-to-v3") {

		$page->page(array(
			"templates" => "docs/upgrade-v2-to-v3.php"
		));
		exit();

	}

}


$page->page(array(
	"templates" => "docs/docs.php"
));
exit();

?>