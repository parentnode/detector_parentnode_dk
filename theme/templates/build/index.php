<?php
global $action;
global $IC;
global $model;


global $project_groups;
global $project_id;
global $project_name;
global $project_language;


$page_item = $IC->getItem(array("tags" => "page:build", "extend" => array("comments" => true, "user" => true, "mediae" => true, "tags" => true)));

if($page_item) {
	$this->sharingMetaData($page_item);
}

// get users projects
$projects = $IC->getItems(array("itemtype" => "project", "where" => "user_id = ".session()->value("user_id"), "extend" => true));

// all segments
$all_segments = array("desktop", "desktop_ie11", "desktop_ie10", "desktop_ie9", "desktop_light", "tablet", "tablet_light", "smartphone", "mobile", "mobile_light", "tv", "seo");


?>

<div class="scene build i:build">

<? if($this->segment() == "desktop"): ?>

<? if($page_item && $page_item["status"]): 
	$media = $IC->sliceMedia($page_item); ?>
	<div class="article i:article id:<?= $page_item["item_id"] ?>" itemscope itemtype="http://schema.org/Article">

		<? if($media): ?>
		<div class="image item_id:<?= $page_item["item_id"] ?> format:<?= $media["format"] ?> variant:<?= $media["variant"] ?>"></div>
		<? endif; ?>


		<?= $HTML->articleTags($page_item, [
			"context" => false
		]) ?>


		<h1 itemprop="headline"><?= $page_item["name"] ?></h1>

		<? if($page_item["subheader"]): ?>
		<h2 itemprop="alternativeHeadline"><?= $page_item["subheader"] ?></h2>
		<? endif; ?>


		<?= $HTML->articleInfo($page_item, "/build", [
			"media" => $media,
			"sharing" => true
		]) ?>


		<? if($page_item["html"]): ?>
		<div class="articlebody" itemprop="articleBody">
			<?= $page_item["html"] ?>
		</div>
		<? endif; ?>

	</div>

<? else:?>

	<h1>Build your own Detector</h1>

<? endif; ?>



	<div class="builder">
		<h2>Build your own Detector <br />in 3 simple steps.</h2>


		<h3>1: Group your segments</h3>
		<p>
			Drag the default segments to the grouping area to start making your segment groups (a new group will magically 
			appear when you need it).
		</p>


		<div class="customize" 
			data-project-id="<?= $project_id ?>"
			data-project-name="<?= rawurlencode($project_name) ?>"
			data-project-language="<?= $project_language ?>"
			data-save-project-url="<?= $this->validPath("/build/saveProject") ?>"
			>

			<div class="segments">
				<h3>Default segments</h3>
				<ul class="segments">
		<?		foreach($all_segments as $segment): ?>
					<li class="<?= $segment ?>"><?= $segment ?></li>
		<?		endforeach; ?>
				</ul>
			</div>

			<ul class="actions">
				<li class="reset"><a href="/build/reset" class="button">Reset</a></li>
			</ul>

		</div>

		<div class="defaults">
			<p>If you need a hint, you can start with one of these predefined layouts:</p>
		</div>


		<div class="projects">
			<p>Or work with one of your existing projects:</p>
<? if(session()->value("user_id") == 1): ?>
			<p class="note">
				You don't have any project yet.
				If you <a href="/login">login</a> or <a href="<?= SITE_SIGNUP ?>">sign up</a>, you can save your project on our server.
			</p>
<? else: ?>
			<ul class="projects actions">
<? 		if($projects): ?>
<?			foreach($projects as $project): ?>
				<li 
					data-project-groups="<?= rawurlencode($project["grouping"]) ?>" 
					data-project-name="<?= rawurlencode($project["name"]) ?>"
					data-project-language="<?= $project["language"] ?>"
					data-project-id="<?= $project["item_id"] ?>"
					><a class="button"><?= $project["name"] ?></a></li>
<?			endforeach; ?>
<? 		endif; ?>
				<li class="new"><a class="button primary">New project</a></li>
			</ul>

<? endif; ?>

		</div>



		<?= $model->formStart("download", array("class" => "download")) ?>
			<?= $model->input("grouping", array("type" => "hidden", "value" => $project_groups ? rawurlencode(json_encode($project_groups, true)) : "")) ?>

			<div class="language">

				<h3>2: Select language</h3>
				<fieldset>
					<?= $model->input("language", array("type" => "radiobuttons", "value" => ($project_language ? $project_language : "php"))) ?>
				</fieldset>

			</div>

			<div class="download">

				<h3>3: And download</h3>
				<ul class="actions">
					<?= $model->submit("Download", array("class" => "primary", "wrapper" => "li.submit")) ?>
				</ul>

			</div>

		<?= $model->formEnd() ?>
	</div>

<? else: ?>

	<h1>Build your own Detector</h1>
	<p class="note">Building a static Detector is not supported by your browser/device. Your browser is <strong><?= $this->segment() ?></strong> - Please upgrade or use a Desktop device for building Detector.</p>

<? endif; ?>

</div>