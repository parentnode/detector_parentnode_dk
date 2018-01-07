<div class="scene implement i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">Detector v3 <br />Implementation</h1>

		<?= $HTML->articleInfo(
			[
				"user_nickname" => "Martin Kæstel Nielsen",
			 	"published_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
				"modified_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
			 ], 
			 "/docs/v3/implement", 
			 [
				 "sharing" => false
			]
		) ?>

		<div class="articlebody" itemprop="articleBody">
			<p class="note">
				v3 is deprecated - support ends in 2018. 
				<a href="/docs/v4/implement">v4</a> is newest version - 
				<a href="/docs/v4/upgrade-to-v4">Upgrade now</a>.
			</p>
			<p>
				The Detector v3 API is easy to use. We have collected a couple of simplified implementation 
				examples below. Please forward additional implementations, if you wish to share them with others.
			</p>
			<p>
				Make sure you store the received segment (in session or similar), to avoid redundant requests.
			</p> 
			<p>
				Be aware of our <a href="/terms">terms</a>.
			</p>
		</div>
	</div>

	<hr />

	<h2>PHP</h2>
	<code>$request = "http://detector-v3.dearapi.com/xml";
$request .= "?ua=".urlencode($_SERVER["HTTP_USER_AGENT"]);
$request .= "&amp;site=#SITE_ID#";
$request .= "&amp;file=".urlencode($_SERVER["SCRIPT_NAME"]);

$response = file_get_contents($request);
$device = simplexml_load_string($response);
$segment = $device["segment"];</code>
	<p>Now you have a <span class="var">$segment</span> variable you can insert in your code.</p>

	<hr />

	<h2>Ruby on Rails</h2>
	<p>Include in Gemfile</p>
	<code>gem 'deardetector', '~> 0.2', :git => "ssh://git@github.com/parentnode/deardetector.git", :tag => "v0.2"</code>
	<p>Usage</p>
	<code>&lt;%= browser_segment %&gt;</code>
	<p>Now you have a <span class="var">browser_segment</span> variable you can insert in your code.</p>

	<hr />

	<h2>HTML</h2>
	<code>&lt;script type=&quot;text/javascript&quot; src=&quot;http://detector-v3.dearapi.com/js-include&quot;&gt;&lt;/script&gt;</code>
	<p>
		This will inject a CSS (seg_<span class="var">segment</span>.css) and JavaScript (seg_<span class="var">segment</span>.js) include with the segment of the current user.
		See <a href="/docs/v3/apis">APIs</a> for additional settings.
	</p>


	<ul class="subnavigation">
		<li class="apis"><a href="/docs/v3/apis">APIs</a></li>
		<li class="segments"><a href="/docs/v3/segments">Segments</a></li>
		<li class="implement"><a href="/docs/v3/implement">Implementation</a></li>
	</ul>

</div>
