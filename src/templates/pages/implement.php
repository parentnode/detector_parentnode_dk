<div class="scene i:implement implement">
	<h1>Implementation examples</h1>

	<h2>Implementation in PHP</h2>
	<code>$request = "http://devices.dearapi.com/xml?ua=".urlencode($_SERVER["HTTP_USER_AGENT"]);
$request .= "&site=#SITE_ID#";
$request .= "&file=".urlencode($_SERVER["SCRIPT_NAME"]);

$response = @file_get_contents($request);
$device = simplexml_load_string($response);
$segment = $device["segment"];</code>

	<h2>Implementation in Rails</h2>

	<h2>Implementation in JavaScript</h2>
	<code>

	</code>

	<h2>Implementation in HTML</h2>
	<code>&lt;script type=&quot;text/javascript&quot; src=&quot;http://devices.dearapi.com/js-include&quot;&gt;&lt;/script&gt;</code>

	<h2>Implementation in .NET</h2>

	<h2>Implementation in Drupal</h2>

</div>
