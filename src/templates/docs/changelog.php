<?php
$this->bodyClass("docs");
$this->pageTitle("It's just improvements");
?>
<div class="scene changelog i:scene">

	<h1>ChangeLog</h1>

	<h2>Version 3.1</h2>
	<p>
		Released in October 2015.
	</p>
	<ul class="changes">
		<li>Can now output static Detector in Java</li>
		<li>Advanced drag'n'drop Detector groupings builder</li>
		<li>New /text api endpoint - returning segment as just a text string</li>
	</ul>


	<h2>Version 3</h2>
	<p>
		Detector v3 was released in July 2015, introducing flexible segment grouping and 
		supporting static output for local implementations.
	</p>
	<p>
		The entire data set has been re-indexed in 13 <a href="/docs/segments">segments</a>,
		splitting <em>desktop_ie</em> into <em>desktop_ie9</em>, <em>desktop_ie10</em> and <em>desktop_ie11</em>, 
		adding <em>tablet_light</em>, and renaming <em>mobile_touch</em> to s<em>martphone</em>.
	</p>

	<ul class="changes">
		<li>Static Detector generation for API independent use</li>
		<li>Groupable segments</li>
		<li>Optional custom include settings</li>
		<li>New <em>/submit</em> <a href="/docs/api">API</a> endpoint</li>
		<li>New <em>/build</em> <a href="/docs/api">API</a> endpoint</li>
		<li>Improved overall performance</li>
		<li>New <a href="/docs/segments">segment definitions</a></li>
	</ul>


	<h2>Version 2</h2>
	<p>
		Detector v2 was released in 2014.
	</p>
	<ul class="changes">
		<li>Unique fragment identification for major devices.</li>
		<li>Improved overall performance</li>
	</ul>


	<h2>Version 1</h2>
	<p>
		Detector v1 was released in 2009. 
	</p>

</div>

