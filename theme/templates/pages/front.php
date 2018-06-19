<?
global $action;
global $IC;

$page_item = $IC->getItem(array("tags" => "page:front", "extend" => array("comments" => true, "user" => true, "mediae" => true, "tags" => true)));

if($page_item) {
	$this->sharingMetaData($page_item);
}

?>
<div class="scene i:front front">

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


		<?= $HTML->articleInfo($page_item, "/", [
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

	<h1>Detector</h1>
	<p>This page is currently being updated.</p>

<? endif; ?>

	<ul class="actions">
		<li class="build"><a href="/build" class="button primary">Build your Detector now</a></li>
	</ul>

	<div class="usedby">
		<h2>Selected clients</h2>
		<ul>
			<li class="cphpix" title="CPH PIX">CPH PIX</li>
			<li class="metro" title="Copenhagen Metro">Copenhagen Metro</li>
			<li class="soulland" title="Soulland">Soulland</li>
			<li class="tuborg" title="Tuborg">Tuborg</li>
			<li class="distortion" title="Distortion">Distortion</li>
		</ul>
	</div>

</div>