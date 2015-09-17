<?php
$model = new Model();
global $detector_groups;

// all segments
$all_segments = array("desktop_edge", "desktop_ie11", "desktop", "desktop_ie10", "desktop_ie9", "desktop_light", "tablet", "tablet_light", "smartphone", "mobile", "mobile_light", "tv", "seo");

// already allocated segments
$used_segments = array();
if($detector_groups) {
	foreach($detector_groups as $existing_group => $existing_segments) {
		foreach($existing_segments as $segment) {
			$used_segments[] = $segment;
		}
	}
}


$available_segments = array();
foreach($all_segments as $segment) {
	if(array_search($segment, $used_segments) === false) {
		$available_segments[$segment] = $segment;
	}
}


?>
<div class="scene build i:build">

	<h1>Build your script</h1>
	<p>
		Build your static Detector v3 script in 3 easy steps.
	</p>


	<h2>1: Group your segments</h2>
	<p>
		Create your own groups and arrange the segments to fit your needs.
		This allows you to minimize the number of supported UIs based on the requirements of your projcets.
	</p>
	<p>
		Create as many groups as you need:
	</p>


	<div class="customize">

		<?= $model->formStart("addGroup", array("class" => "group labelstyle:inject")) ?>

			<fieldset>
				<?= $model->input("_group", array("type" => "string", "label" => "Group")) ?>
			</fieldset>

			<ul class="actions">
				<?= $model->submit("Create", array("class" => "primary", "wrapper" => "li.submit")) ?>
			</ul>

		<?= $model->formEnd() ?>

<?		if($detector_groups): ?>
		<h3>Groups</h3>
		<ul class="groups">
<?	 		foreach($detector_groups as $group => $segments): ?>

			<li class="group">
				<h4><?= $group ?></h4>
				<ul class="actions">
					<li class="delete"><a href="/build/removeGroup/<?= $group ?>">Delete</a></li>
				</ul>
<?				if($segments): ?>
				<h5>Segments</h5>
				<ul class="segments">
<?	 				foreach($segments as $segment): ?>

					<li class="segment">
						<h6><?= $segment ?></h6>
						<ul class="actions">
							<li class="delete"><a href="/build/removeSegment/<?= $group ?>/<?= $segment ?>">Delete</a></li>
						</ul>
					</li>
<?					endforeach; ?>
				</ul>
<?				else: ?>
				<p>Add some segments to <em><?= $group ?></em></p>
<?				endif; ?>

				<?= $model->formStart("addSegment/$group", array("class" => "segment")) ?>

					<fieldset>
						<?= $model->input("_segment", array("type" => "select", "label" => "Add segment", "options" => $available_segments)) ?>
					</fieldset>

					<ul class="actions">
						<?= $model->submit("Add segment", array("class" => "primary", "wrapper" => "li.submit")) ?>
					</ul>

				<?= $model->formEnd() ?>

			<li>
<?			endforeach; ?>
<?		endif; ?>
		</ul>

<?		if($detector_groups): ?>
		<h3>Available segments</h3>
		<ul class="available_segments">
<?		foreach($all_segments as $segment): ?>
			<li class="<?= $segment ?><?= array_search($segment, $used_segments) !== false ? " used" : "" ?>"><?= $segment ?></li>
<?		endforeach; ?>
		</ul>

		<ul class="actions">
			<li class="reset"><a href="/build/resetGroups" class="button">Reset</a></li>
		</ul>

<?		endif; ?>


	</div>


	<?= $model->formStart("download", array("class" => "download")) ?>
		<?= $model->input("grouping", array("type" => "hidden", "value" => $detector_groups ? json_encode($detector_groups) : "")) ?>

		<div class="language">

			<h2>2: Select script language</h2>
			<fieldset>
				<?= $model->input("language", array("label" => "Programming language", "type" => "radiobuttons", "options" => array("php" => "PHP", "javascript" => "JavaScript", "java" => "Java"), "value" => "php")) ?>
			</fieldset>

		</div>

		<div class="download">

			<h2>3: And download ...</h2>
			<ul class="actions">
				<?= $model->submit("Download script", array("class" => "primary", "wrapper" => "li.submit")) ?>
			</ul>

		</div>
	<?= $model->formEnd() ?>

</div>