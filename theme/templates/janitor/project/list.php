<?php
global $action;
global $IC;
global $model;
global $itemtype;

$items = $IC->getItems(array("itemtype" => $itemtype, "order" => "status DESC, modified_at DESC", "extend" => array("tags" => true, "user" => true)));
?>

<div class="scene i:scene defaultList <?= $itemtype ?>List">
	<h1>Projects</h1>

	<ul class="actions">
		<?= $JML->listNew(array("label" => "New project")) ?>
	</ul>

	<div class="all_items i:defaultList taggable filters"<?= $HTML->jsData(["tags", "search"]) ?>>
<?		if($items): ?>
		<ul class="items">
<?			foreach($items as $item): ?>
			<li class="item item_id:<?= $item["id"] ?>">
				<h3><?= strip_tags($item["name"]) ?></h3>
				<dl class="info">
					<dt>Owner</dt>
					<dd class="owner"><?= $item["user_nickname"] ?></dd>
				</dl>

				<?= $JML->tagList($item["tags"]) ?>

				<?= $JML->listActions($item) ?>
			 </li>
<?			endforeach; ?>
		</ul>
<?		else: ?>
		<p>No projects.</p>
<?		endif; ?>
	</div>

</div>
