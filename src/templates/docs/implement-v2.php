<div class="scene implement i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="name">v2 Implementation</h1>

		<dl class="info">
			<dt class="published_at">Date published</dt>
			<dd class="published_at" itemprop="datePublished" content="<?= date("Y-m-d", filemtime(__FILE__)) ?>"><?= date("Y-m-d, H:i", filemtime(__FILE__)) ?></dd>
			<dt class="author">Author</dt>
			<dd class="author" itemprop="author">Martin Kæstel Nielsen</dd>
		</dl>

		<div class="articlebody" itemprop="articleBody">
			<p class="note">
				v2 is deprecated - support ends in 2016. 
				<a href="/docs/implement">v3</a> is newest verion - 
				<a href="/docs/upgrade-v2-to-v3">Upgrade now</a>.
			</p>
			<p>
				Detector is easy to implement. We have collected a couple of implementation examples below.
				Please forward additional implementations, if you wish to share them with others.
			</p>
			<p>
				Make sure you store the received segment (in session or similar), too avoid redundant requests.
			</p> 
			<p>
				Be aware of our <a href="/terms">terms</a>.
			</p>
		</div>
	</div>

	<h2>PHP</h2>
	<code>$request = "http://detector-v2.dearapi.com/xml";
$request .= "?ua=".urlencode($_SERVER["HTTP_USER_AGENT"]);
$request .= "&site=#SITE_ID#";
$request .= "&file=".urlencode($_SERVER["SCRIPT_NAME"]);

$response = @file_get_contents($request);
$device = simplexml_load_string($response);
$segment = $device["segment"];</code>


	<h2>Ruby on Rails</h2>
	<p>Include in Gemfile</p>
	<code>gem 'deardetector', '~> 0.1', :git => "ssh://git@github.com/parentnode/deardetector.git"</code>
	<p>Usage</p>
	<code>&lt;%= browser_segment %&gt;</code>


	<h2>HTML</h2>
	<code>&lt;script type=&quot;text/javascript&quot; src=&quot;http://detector-v2.dearapi.com/js-include&quot;&gt;&lt;/script&gt;</code>

</div>
