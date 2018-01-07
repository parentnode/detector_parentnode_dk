<?php
/**
* @package janitor.itemtypes
* This file contains itemtype functionality
*/

class TypeProject extends Itemtype {

	/**
	* Init, set varnames, validation rules
	*/
	function __construct() {

		// construct ItemType before adding to model
		parent::__construct(get_class());


		// itemtype database
		$this->db = SITE_DB.".item_project";
		$this->languages = ["php" => "PHP", "javascript" => "JavaScript", "java" => "Java"];

		// Name
		$this->addToModel("name", array(
			"type" => "string",
			"label" => "Project name",
			"required" => true,
			"hint_message" => "Name of the project", 
			"error_message" => "Name must be filled out."
		));

		// Class
		$this->addToModel("grouping", array(
			"type" => "text",
			"label" => "Project grouping layout",
			"required" => true,
			"hint_message" => "The JSON grouping object",
			"error_message" => "A project without any groupings isn't really a project?"
		));

		// description
		$this->addToModel("language", array(
			"type" => "select",
			"label" => "Language",
			"options" => $this->languages,
			"required" => true,
			"hint_message" => "Programming language for download",
			"error_message" => "No language? How weird."
		));

	}

	function saveProject($action) {

		$item = false;

		// update project
		if(count($action) > 1) {
//			print "should update";

			$project_id = $action[1];

			// check that project is is owned by current user
			$IC = new Items();
			$project = $IC->getItem(["id" => $project_id]);
			if($project["user_id"] == session()->value("user_id")) {
				$item = $this->update(["update", $project_id]);
			}
			else {
				message()->addMessage("You do not have permission to update this project.", ["type" => "error"]);
			}

		}
		// create new project
		else {

			// enable item as default
			$_POST["status"] = 1;
			$item = $this->save(["save"]);

			// store relevant values for potential reload
			session()->value("project_id", $item["id"]);
			session()->value("project_name", $item["name"]);
		}

		return $item;

	}

}

?>