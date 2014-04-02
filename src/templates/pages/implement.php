<div class="scene i:implement implement">
	<h1>Implementation</h1>

	<p>
		Detector is easy to implement. We have collected a couple of implementation examples below.
		Please forward additional implementations, if you wish to share them with others.
	</p>

	<p>
		Make sure you store the received segment (in session or similar), too avoid redundant requests.
		The number of requests you make to our API defines which 
		<a href="/detector/pricing">pricing</a> category you will fit into.
	</p> 

	<h2>PHP</h2>
	<code>$request = "http://detector.dearapi.com/xml";
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


	<h2>Lasso</h2>
	<code>To be added - project in process</code>


	<h2>HTML</h2>
	<code>&lt;script type=&quot;text/javascript&quot; src=&quot;http://detector.dearapi.com/js-include&quot;&gt;&lt;/script&gt;</code>

</div>
