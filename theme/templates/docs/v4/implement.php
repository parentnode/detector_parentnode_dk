<div class="scene implement i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">Detector v4 <br />Implementation</h1>

		<?= $HTML->articleInfo(
			[
				"user_nickname" => "Martin Kæstel Nielsen",
			 	"published_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
				"modified_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
			 ], 
			 "/docs/v4/implement", 
			 [
				 "sharing" => false
			]
		) ?>

		<div class="articlebody" itemprop="articleBody">
			<p>
				The Detector v4 API is easy to use. We have collected a couple of simplified implementation 
				examples below. Please forward additional implementations, if you wish to share them with others.
			</p>
			<p>
				<a href="http://janitor.parentnode.dk">Janitor v0.7.8</a> uses Detector v4 - if you're using Janitor, all you need is
				the latest version.
			</p>
			<p>
				Make sure you store the received segment (in session or similar), to avoid redundant requests/identifications
				and provide the best possible user experience.
			</p> 
			<p>
				Be aware of our <a href="/terms">terms</a>.
			</p>
			<p class="note">
				As of Detector v3 it is also possible to <a href="/build">build a static version</a> of Detector
				for production implementations to reduce dependencies of the API.
			</p>
		</div>
	</div>

	<hr />


	<h2>PHP - API</h2>

	<div class="example">
		<h3>As simple as it gets</h3>
		<code>$request = "http://detector-v4.dearapi.com/text";
$request .= "?ua=".urlencode($_SERVER["HTTP_USER_AGENT"]);
$request .= "&amp;site=".urlencode($_SERVER["HTTP_HOST"]);
$request .= "&amp;file=".urlencode($_SERVER["SCRIPT_NAME"]);

$segment = file_get_contents($request);</code>
		<p>Now you have a <span class="var">$segment</span> variable you can insert in your code.</p>
	</div>

	<div class="example">
		<h3>With SESSION storage and <span class="var">segment</span> parameter override options.</h3>
		<code>session_start();

// segment parameter sent
if(isset($_GET["segment"])) {

	$segment = $_GET["segment"];

}
// no session value, look up segment
else if(!isset($_SESSION["segment"])) {

	$request = "http://detector-v4.dearapi.com/text";
	$request .= "?ua=".urlencode($_SERVER["HTTP_USER_AGENT"]);
	$request .= "&site=".urlencode($_SERVER["HTTP_HOST"]);
	$request .= "&file=".urlencode($_SERVER["SCRIPT_NAME"]);

	$segment = file_get_contents($request);

}

// update segment session value
if(isset($segment) && $segment) {
	$_SESSION["segment"] = $segment;
}</code>
		<p>
			Now you have a <span class="var">$_SESSION["segment"]</span> variable you can insert in your code – and the option to force
			a given segment by passing a <span class="var">segment</span> parameter to the page. Include this script in all your pages
			and you're good to go.
		</p>
	</div>

	<hr />


	<h2>PHP - Static Detector class</h2>

	<div class="example">
		<h3>As simple as it gets</h3>
		<p><a href="/build">Build a static version</a> of Detector and put the downloaded PHP class somewhere on your server.</p> 
		<code>include_once("#PATH-TO-DETECTOR#/detector.class.php");
$detector = new Detector();
$segment = $detector->identify((isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : ""));</code>
		<p>Now you have a <span class="var">$segment</span> variable you can insert in your code.</p>
	</div>

	<hr />


	<h2>Ruby on Rails</h2>

	<div class="example">
		<h3>Detector as a Gem</h3>
		<p>Include in Gemfile</p>
		<code>gem 'deardetector', '~> 0.2', :git => "ssh://git@github.com/parentnode/deardetector.git", :tag => "v0.2"</code>

		<p>Usage</p>
		<code>&lt;%= browser_segment %&gt;</code>
		<p>Now you have a <span class="var">browser_segment</span> variable you can insert in your code.</p>
		<p class="note">The gem always uses the latest version of the Detector API (http://detector.dearapi.com).</p>
	</div>

	<hr />


	<h2>HTML</h2>

	<div class="example">
		<h3>The "script tag"-detector</h3>
		<p>
			For static HTML sites, you have the option to place the following script tag in your <span class="htmltag">head</span>.
		</p>
		<code>&lt;script type=&quot;text/javascript&quot; src=&quot;http://detector-v4.dearapi.com/js-include&quot;&gt;&lt;/script&gt;</code>
		<p>
			This will inject a CSS (/css/seg_<span class="var">segment</span>.css) and JavaScript (/js/seg_<span class="var">segment</span>.js) 
			include with the segment of the current user's browser.
			See <a href="/docs/v4/apis">APIs</a> for additional settings.
		</p>
	</div>


	<ul class="subnavigation">
		<li class="apis"><a href="/docs/v4/apis">APIs</a></li>
		<li class="segments"><a href="/docs/v4/segments">Segments</a></li>
		<li class="implement"><a href="/docs/v4/implement">Implementation</a></li>
	</ul>

</div>
