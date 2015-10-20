<div class="scene implement i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">Detector v3 - Implementation</h1>

		<dl class="info">
			<dt class="published_at">Published</dt>
			<dd class="published_at" itemprop="datePublished" content="<?= date("Y-m-d", filemtime(__FILE__)) ?>"><?= date("Y-m-d, H:i", filemtime(__FILE__)) ?></dd>
			<dt class="author">Author</dt>
			<dd class="author" itemprop="author">Martin Kæstel Nielsen</dd>
		</dl>
		<div itemprop="image" content="<?= SITE_URL ?>/img/logo.png"></div>

		<div class="articlebody" itemprop="articleBody">
			<p class="note">
				As of Detector v3 we recommend you build your own static version for local implementation.
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

	<h2>PHP</h2>
	<code>$request = "http://detector-v3.dearapi.com/xml";
$request .= "?ua=".urlencode($_SERVER["HTTP_USER_AGENT"]);
$request .= "&amp;site=#SITE_ID#";
$request .= "&amp;file=".urlencode($_SERVER["SCRIPT_NAME"]);

$response = file_get_contents($request);
$device = simplexml_load_string($response);
$segment = $device["segment"];</code>


	<h2>Ruby on Rails</h2>
	<p>Include in Gemfile</p>
	<code>gem 'deardetector', '~> 0.3', :git => "ssh://git@github.com/parentnode/deardetector.git"</code>
	<p>Usage</p>
	<code>&lt;%= browser_segment %&gt;</code>



	<h2>HTML</h2>
	<code>&lt;script type=&quot;text/javascript&quot; src=&quot;http://detector-3.dearapi.com/js-include&quot;&gt;&lt;/script&gt;</code>

	<ul class="subnavigation">
		<li class="apis"><a href="/docs/apis">APIs</a></li>
		<li class="segments"><a href="/docs/segments">Segments</a></li>
		<li class="implement"><a href="/docs/implement">Implementation</a></li>
	</ul>

</div>
