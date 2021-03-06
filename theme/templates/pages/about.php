<?
global $action;
global $IC;

$page_item = $IC->getItem(array("tags" => "page:about", "status" => 1, "extend" => array("comments" => true, "user" => true, "mediae" => true, "tags" => true)));

if($page_item) {
	$this->sharingMetaData($page_item);
}

?>
<div class="scene about i:scene">

<? if($page_item): 
	$media = $IC->sliceMediae($page_item, "single_media"); ?>
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


		<?= $HTML->articleInfo($page_item, "/about", [
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

	<h1>About Detector</h1>
	<p>This page is currently being updated.</p>

<? endif; ?>


	<div itemtype="http://schema.org/Organization" itemscope class="vcard company">
		<h2 class="name fn org" itemprop="name">parentNode.dk</h2>

		<dl class="info basic">
			<dt class="address">Address</dt>
			<dd class="address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<ul>
					<li itemprop="streetAddress">Æbeløgade 4</li>
					<li><span class="postal" itemprop="postalCode">2100</span> <span class="locality" itemprop="addressLocality">København Ø</span></li>
					<li class="country" itemprop="addressCountry">Denmark</li>
				</ul>
			</dd>
		</dl>

		<dl class="info contact">
			<dt class="contact">Contact</dt>
			<dd class="contact">
				<ul>
					<li class="email"><a href="mailto:info@parentnode.dk" itemprop="email" content="info@parentnode.dk">info@parentnode.dk</a></li>
				</ul>
			</dd>
			<dt class="social">Social media</dt>
			<dd class="social">
				<ul>
					<li class="meetup"><a href="https://www.meetup.com/parentNode-copenhagen">Meetup</a></li>
					<li class="facebook"><a href="https://facebook.com/parentnode">Facebook</a></li>
					<li class="linkedin"><a href="https://www.linkedin.com/company/parentnode">LinkedIn</a></li>
				</ul>
			</dd>
		</dl>

	</div>

</div>