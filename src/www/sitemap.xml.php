<?php
$access_item = false;
if(isset($read_access) && $read_access) {
	return;
}

include_once($_SERVER["FRAMEWORK_PATH"]."/config/init.php");
$query = new Query();
$IC = new Items();

print '<?xml version="1.0" encoding="UTF-8"?>';
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?
// FRONT PAGE
$item = $IC->getItem(array("tags" => "page:front"));
?>
	<url>
		<loc><?= SITE_URL ?>/</loc>
		<lastmod><?= date("Y-m-d", strtotime($item["modified_at"])) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>1</priority>
	</url>
<?
// BUILD PAGE
$item = $IC->getItem(array("tags" => "page:build"));
?>
	<url>
		<loc><?= SITE_URL ?>/build</loc>
		<lastmod><?= date("Y-m-d", strtotime($item["modified_at"])) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>1</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/docs</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/docs.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/docs/v4/segments</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/v4/segments.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/docs/v4/apis</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/v4/apis.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/docs/v4/implement</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/v4/implement.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/docs/changelog</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/changelog.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
<?
// FRONT PAGE
$item = $IC->getItem(array("tags" => "page:pricing"));
?>
	<url>
		<loc><?= SITE_URL ?>/pricing</loc>
		<lastmod><?= date("Y-m-d", strtotime($item["modified_at"])) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.5</priority>
	</url>
<?
// FRONT PAGE
$item = $IC->getItem(array("tags" => "page:about"));
?>
	<url>
		<loc><?= SITE_URL ?>/about</loc>
		<lastmod><?= date("Y-m-d", strtotime($item["modified_at"])) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/terms</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/pages/terms.php")) ?></lastmod>
		<changefreq>monthly</changefreq>
		<priority>0.3</priority>
	</url>
</urlset>