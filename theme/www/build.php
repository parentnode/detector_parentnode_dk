<?php
$access_item["/"] = false;
$access_item["/saveProject"] = true;
if(isset($read_access) && $read_access) {
	return;
}

include_once($_SERVER["FRAMEWORK_PATH"]."/config/init.php");


$action = $page->actions();
$IC = new Items();
$model = $IC->typeObject("project");


$page->bodyClass("build");
$page->pageTitle("Build your static Detector v3 script now");


$project_groups = stringOr(session()->value("project_groups"), "");
$project_name = stringOr(session()->value("project_name"), "");
$project_id = stringOr(session()->value("project_id"), "");
$project_language = stringOr(session()->value("project_language"), "");


// current version
if(count($action) > 0) {

	// reset entire group structure
	if(count($action) == 1 && $action[0] == "reset") {

		session()->reset("project_groups");
		session()->reset("project_id");
		session()->reset("project_name");
		session()->reset("project_language");

		print "1";
		exit();

	}
	else if(count($action) > 0 && $action[0] == "saveProject") {

		if(security()->validateCsrfToken() && preg_match("/^(saveProject)$/", $action[0])) {

			// check if custom function exists on User class
			if($model && method_exists($model, $action[0])) {

				$output = new Output();
				$output->screen($model->{$action[0]}($action));
				exit();
			}
		}

	}
	else if(count($action) == 1 && $action[0] == "setGroups") {

		print getVar("project_groups")."\n\n";
		session()->value("project_groups", json_decode(stripslashes(getVar("project_groups"))));
		session()->value("project_name", urldecode(getVar("project_name")));
		session()->value("project_id", getVar("project_id"));

		print_r($_SESSION);

		// return something to ensure JS has some response
		print "1";
		exit();

	}
	else if(count($action) == 1 && $action[0] == "setLanguage") {

		$project_language = getVar("project_language");
		session()->value("project_language", $project_language);

		// return something to ensure JS has some response
		print "1";
		exit();

	}
	// keepAlive for build process
	else if(preg_match("/^(keepAlive)$/", $action[0])) {

		print 1;
		exit();

	}
	// Download detector
	else if($action[0] == "download") {

		$values = array();
		$values["language"] = getVar("language");
		$values["grouping"] = getVar("grouping");


		// output file name
		if($values["language"] == "php") {
			$filename = "detector.class.php";
		}
		else if($values["language"] == "javascript") {
			$filename = "detector.js";
		}
		else if($values["language"] == "java") {
			$filename = "Detector.java";
		}


		$ch = curl_init();
		curl_setopt_array($ch, array(
			// CURLOPT_URL => "http://detector.api/build",
			CURLOPT_URL => "https://detector-v4.dearapi.com/build",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => 2,
			CURLOPT_POST => sizeof($values),
			CURLOPT_POSTFIELDS => $values,
			CURLOPT_ENCODING => 'gzip'
		));

		$result = curl_exec($ch);
		curl_close($ch);

		if($result != "invalid language") {

			header('Content-Description: File Transfer');
			header('Content-Type: text/text');
			header("Content-Type: application/force-download");
			header('Content-Disposition: attachment; filename='.$filename);
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . strlen($result));
			ob_clean();
			flush();
			print $result;

			// notify admin
			mailer()->send(["message" => "Detector was downloaded.\n\n".print_r(json_decode(urldecode($values["grouping"]), true), true)."\n\nLanguage: ".$values["language"]]);

			exit();
		}
		else {

			$page->page(array(
				"templates" => "build/error.php"
			));
			exit();
			
		}

	}
}

$page->page(array(
	"templates" => "build/index.php"
));
exit();

?>