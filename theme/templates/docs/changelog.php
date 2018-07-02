<?php
$this->bodyClass("docs");
$this->pageTitle("It's just improvements");
?>
<div class="scene changelog i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">ChangeLog</h1>

		<?= $HTML->articleInfo(
			[
				"user_nickname" => "Martin Kæstel Nielsen",
			 	"published_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
				"modified_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
			 ], 
			 "/docs/changelog", 
			 [
				 "sharing" => false
			]
		) ?>

		<div class="articlebody" itemprop="articleBody">
			<h2>Version 4.0</h2>
			<p>
				Released in June 2018, with updated segment definitions and another round of performance improvements. 
			</p>
			<ul class="changes">
				<li>12 <a href="/docs/v4/segments">segments</a> to cover every browser on earth.</li>
				<li>New <em>/json</em> <a href="/docs/v4/api">API</a> endpoint</li>
				<li>Performance improvements and useragent trimming</li>
				<li>Updated identification priority</li>
				<li>Smaller footprint</li>
				<li>Updated indexing UI, for much faster re-indexing of segment base</li>
				<li>New maintannence tools, to minimize UA deduction database</li>
			</ul>
			<p>
				The <em>desktop_edge</em> segment, introduced in v3.0, had become superfluous due to automatic updating 
				being built into most browsers.
			</p>


			<h2>Version 3.1</h2>
			<p>
				Released in January 2016.
			</p>
			<ul class="changes">
				<li>Can now output static Detector in Java</li>
				<li>Advanced drag'n'drop Detector groupings builder</li>
				<li>New /text api endpoint - returning segment as just a text string</li>
			</ul>


			<h2>Version 3.0</h2>
			<p>
				Detector v3.0 was released in July 2015, introducing flexible segment grouping and 
				supporting static output for local implementations.
			</p>
			<p>
				The entire data set has been re-indexed in 13 segments,
				splitting <em>desktop_ie</em> into <em>desktop_ie9</em>, <em>desktop_ie10</em> and <em>desktop_ie11</em>, 
				adding <em>tablet_light</em>, renaming <em>mobile_touch</em> to s<em>martphone</em> and introducing a
				new <em>desktop_edge</em> segment for the newest browsers.
			</p>

			<ul class="changes">
				<li>Static Detector generation for API independent use</li>
				<li>Groupable segments</li>
				<li>Optional custom include settings</li>
				<li>New <em>/submit</em> <a href="/docs/v3/api">API</a> endpoint</li>
				<li>New <em>/build</em> <a href="/docs/v3/api">API</a> endpoint</li>
				<li>Improved overall performance (again)</li>
				<li>New segment definitions</li>
			</ul>


			<h2>Version 2.0</h2>
			<p>
				Detector v2 was released in 2014, primarily to improve performance and ease of indexing new devices, 
				as the number of sites using the service had outgrown the initial service.
			</p>
			<ul class="changes">
				<li>Unique fragment identification for major devices</li>
				<li>Improved overall performance</li>
				<li>Improved indexing UI</li>
			</ul>


			<h2>Version 1.0</h2>
			<p>
				Detector v1.0 was released in 2009. 
			</p>
		</div>

	</div>

</div>

