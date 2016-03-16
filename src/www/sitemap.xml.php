<?php
$access_item = false;
if(isset($read_access) && $read_access) {
	return;
}

include_once($_SERVER["FRAMEWORK_PATH"]."/config/init.php");
print '<?xml version="1.0" encoding="UTF-8"?>';
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<url>
		<loc><?= SITE_URL ?>/</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/pages/front.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>1</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/build</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/build/index.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/docs</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/docs.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/docs/segments</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/segments.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/docs/apis</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/apis.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/docs/implement</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/implement.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/docs/changelog</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/changelog.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/pricing</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/pages/pricing.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/about</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/pages/about.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc><?= SITE_URL ?>/terms</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/pages/terms.php")) ?></lastmod>
		<changefreq>monthly</changefreq>
		<priority>0.3</priority>
	</url>
</urlset>