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
		<loc>http://detector.parentnode.dk/</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/pages/front.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>1</priority>
	</url>
	<url>
		<loc>http://detector.parentnode.dk/build</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/build/index.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc>http://detector.parentnode.dk/docs</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/docs.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc>http://detector.parentnode.dk/docs/segments</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/segments.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc>http://detector.parentnode.dk/docs/apis</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/apis.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc>http://detector.parentnode.dk/docs/implement</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/implement.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc>http://detector.parentnode.dk/docs/changelog</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/docs/changelog.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc>http://detector.parentnode.dk/pricing</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/pages/pricing.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc>http://detector.parentnode.dk/about</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/pages/about.php")) ?></lastmod>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>
	<url>
		<loc>http://detector.parentnode.dk/terms</loc>
		<lastmod><?= date("Y-m-d", filemtime(LOCAL_PATH."/templates/pages/terms.php")) ?></lastmod>
		<changefreq>monthly</changefreq>
		<priority>0.3</priority>
	</url>
</urlset>