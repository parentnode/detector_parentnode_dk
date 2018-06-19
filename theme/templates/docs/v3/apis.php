<div class="scene apis i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">Detector v3 <br />API Documentation</h1>

		<?= $HTML->articleInfo(
			[
				"user_nickname" => "Martin Kæstel Nielsen",
			 	"published_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
				"modified_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
			 ], 
			 "/docs/v3/apis", 
			 [
				 "sharing" => false
			]
		) ?>

		<div class="articlebody" itemprop="articleBody">
			<p class="note">
				v3 is deprecated - support ends in 2018. 
				<a href="/docs/v4/apis">v4</a> is newest version - 
				<a href="/docs/v4/upgrade-to-v4">Upgrade now</a>.
			</p>
			
			<p>
				The Detector v3 API provides tools for identification, submission, building and debugging. 
			</p>
			<p>
				The recommended identification request method is made using a 
				server-side request and storing the segment in the users session, as this provides the best user
				experience and fewest possible requests to the Detector server. See 
				<a href="/docs/v3/implement">our implementation guide</a> for simplified examples.
			</p>
			<!--p>
				This is a free API - If you like it, please consider <a href="http://parentnode.dk/donate">donating</a> a penny or two.
			</p-->
			<p>
				Be aware of our <a href="/terms">terms</a>.
			</p>
			<p>
				The API is available at <a href="http://detector-v3.dearapi.com" target="_blank">http://detector-v3.dearapi.com</a>.
			</p>
		</div>
	</div>

	<hr />


	<h2>Identification</h2>

	<div class="plain">
		<h3>http://detector-v3.dearapi.com/</h3>
		<div class="description">
			<p>
				Performs segment identification based on device useragent, with the purpose of returning segment
				as a HTML snippet.
			</p>
			<p>
				Useragent defaults to requesting device
				but specific useragent can be sent using the <span class="parameter">ua</span> parameter.
			</p>
		</div>

		<div class="parameters">
			<p>POST or GET parameters</p>
			<dl class="parameters">
				<dt>ua</dt>
				<dd>Optional useragent to be identified. Defaults to requesting device useragent.</dd>
			
				<dt>site</dt>
				<dd>Optional origin site. We recommend you to add this parameter to your request to provide better usage statistics.</dd>

				<dt>file</dt>
				<dd>Optional origin file. We recommend you to add this parameter to your request to provide better usage statistics.</dd>
			</dl>
		</div>

		<div class="example">
			<h4>Request</h4>
			<code>http://detector-v3.dearapi.com/</code>

			<p>Returns HTML formatted segment.</p>
			<code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;
&lt;div id=&quot;device&quot;&gt;
	&lt;span id=&quot;segment&quot; class=&quot;proporty&quot;&gt;<?= $this->segment() ?>&lt;/span&gt;
&lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;</code>
		</div>

		<ul class="actions">
			<li><a href="http://detector-v3.dearapi.com" target="_blank" rel="nofollow" class="button primary">Test this endpoint</a></li>
		</ul>
	</div>

	<hr />

	<div class="text">
		<h3>http://detector-v3.dearapi.com/text</h3>
		<div class="description">
			<p>
				Performs segment identification based on device useragent, with the purpose of returning segment
				as a text string.
			</p>
			<p>
				Useragent defaults to requesting device
				but specific useragent can be sent using the <span class="parameter">ua</span> parameter.
			</p>
		</div>

		<div class="parameters">
			<p>POST or GET parameters</p>
			<dl class="parameters">
				<dt>ua</dt>
				<dd>Optional useragent to be identified. Defaults to requesting device useragent.</dd>
			
				<dt>site</dt>
				<dd>Optional origin site. We recommend you to add this parameter to your request to provide better usage statistics.</dd>

				<dt>file</dt>
				<dd>Optional origin file. We recommend you to add this parameter to your request to provide better usage statistics.</dd>
			</dl>
		</div>
	

		<div class="example">
			<h4>Request</h4>
			<code>http://detector-v3.dearapi.com/text</code>

			<p>Returns text string segment.</p>
			<code><?= $this->segment() ?></code>
		</div>

		<ul class="actions">
			<li><a href="http://detector-v3.dearapi.com/text" target="_blank" rel="nofollow" class="button primary">Test this endpoint</a></li>
		</ul>
	</div>

	<hr />

	<div class="xml">
		<h3>http://detector-v3.dearapi.com/xml</h3>
		<div class="description">
			<p>
				Performs segment identification based on device useragent, with the purpose of returning segment
				as a XML snippet.
			</p>
			<p>
				Useragent defaults to requesting device
				but specific useragent can be sent using the <span class="parameter">ua</span> parameter.
			</p>
		</div>

		<div class="parameters">
			<p>POST or GET parameters</p>
			<dl class="parameters">
				<dt>ua</dt>
				<dd>Optional useragent to be identified. Defaults to requesting device useragent.</dd>
			
				<dt>site</dt>
				<dd>Optional origin site. We recommend you to add this parameter to your request to provide better usage statistics.</dd>

				<dt>file</dt>
				<dd>Optional origin file. We recommend you to add this parameter to your request to provide better usage statistics.</dd>
			</dl>
		</div>
	
		<div class="example">
			<h4>Request</h4>
			<code>http://detector-v3.dearapi.com/xml</code>

			<p>Returns XML formatted segment.</p>
			<code>&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;
&lt;device&gt;
    &lt;segment&gt;<?= $this->segment() ?>&lt;/segment&gt;
&lt;/device&gt;</code>
		</div>

		<ul class="actions">
			<li><a href="http://detector-v3.dearapi.com/xml" target="_blank" rel="nofollow" class="button primary">Test this endpoint</a></li>
		</ul>
	</div>

	<hr />

	<div class="jsonp">
		<h3>http://detector-v3.dearapi.com/jsonp</h3>
		<div class="description">
			<p>
				Performs segment identification based on device useragent, with the purpose of returning segment
				to local callback function.
			</p>
			<p>
				Useragent defaults to requesting device
				but specific useragent can be sent using the <span class="parameter">ua</span> parameter.
			</p>
		</div>

		<div class="parameters">
			<p>POST or GET parameters</p>
			<dl class="parameters">
				<dt>ua</dt>
				<dd>Optional useragent to be identified. Defaults to requesting device useragent.</dd>
			
				<dt>site</dt>
				<dd>Optional origin site. We recommend you to add this parameter to your request to provide better usage statistics.</dd>

				<dt>file</dt>
				<dd>Optional origin file. We recommend you to add this parameter to your request to provide better usage statistics.</dd>

				<dt>callback</dt>
				<dd>Optional callback function. Defaults to &quot;callback&quot;</dd>
			</dl>
		</div>

		<div class="example">
			<h4>Request</h4>
			<code>http://detector-v3.dearapi.com/jsonp</code>

			<p>Returns JSONP callback function with segment.</p>
			<code>callback({"segment":"<?= $this->segment() ?>"});</code>
		</div>

		<ul class="actions">
			<li><a href="http://detector-v3.dearapi.com/jsonp" target="_blank" rel="nofollow" class="button primary">Test this endpoint</a></li>
		</ul>
	</div>

	<hr />

	<div class="js_include">
		<h3>http://detector-v3.dearapi.com/js-include</h3>
		<div class="description">
			<p>
				Performs segment identification based on device useragent, with the purpose of returning appropriate 
				segment without using local server-side technology. This method uses the
				original Detector/Janitor filenaming conventions.
			</p>
			<p>
				Requesting page should save segment in client-side cookie to avoid making repeating requests from same
				browsing session.
			</p>
			<p>
				Useragent defaults to requesting device
				but specific useragent can be sent using the <span class="parameter">ua</span> parameter.
			</p>
		</div>

		<div class="parameters">
			<p>GET parameters</p>
			<dl class="parameters">
				<dt>ua</dt>
				<dd>Optional useragent to be identified. Defaults to requesting device useragent.</dd>
			
				<dt>site</dt>
				<dd>Optional origin site. We recommend you to add this parameter to your request to provide better usage statistics.</dd>

				<dt>file</dt>
				<dd>Optional origin file. We recommend you to add this parameter to your request to provide better usage statistics.</dd>

				<dt>path</dt>
				<dd>Optional general include path. Defaults to /js and /css.</dd>

				<dt>css_path</dt>
				<dd>Optional CSS include path.</dd>

				<dt>css_param</dt>
				<dd>Optional CSS include file parameter.</dd>

				<dt>js_path</dt>
				<dd>Optional JavaScript include path.</dd>

				<dt>js_param</dt>
				<dd>Optional JavaScript include file parameter.</dd>

				<dt>dev</dt>
				<dd>
					Optional development include. Will include /css/lib/seg_<span class="var">segment</span>_include.css and /js/lib/seg_<span class="var">segment</span>_include.js 
					following the recommended structure from <a href="http://janitor.parentnode.dk">http://janitor.parentnode.dk</a>.
				</dd>
			</dl>
		</div>

		<div class="example">
			<h4>Request</h4>
			<code>http://detector-v3.dearapi.com/js-include</code>

			<p>Returns a JavaScript snippet with the appropriate JavaScript and CSS include statements.</p>
			<code>document.write(&#x27;&lt;link type=&quot;text/css&quot; rel=&quot;stylesheet&quot; media=&quot;all&quot; href=&quot;/css/seg_<?= $this->segment() ?>.css&quot; /&gt;&#x27;);
document.write(&#x27;&lt;script type=&quot;text/javascript&quot; src=&quot;/js/seg_<?= $this->segment() ?>.js&quot;&gt;&lt;/script&gt;&#x27;);</code>
		</div>

		<ul class="actions">
			<li><a href="http://detector-v3.dearapi.com/js-include" target="_blank" rel="nofollow" class="button primary">Test this endpoint</a></li>
		</ul>
	</div>


	<hr />


	<h2>Submission</h2>

	<div class="submit">
		<h3>http://detector-v3.dearapi.com/submit</h3>
		<div class="description">
			<p>
				Submit useragent to Detectors indexing system. Useragents submitted here will be considered
				when the Detector core is updated.
			</p>
		</div>

		<div class="parameters">
			<p>GET parameters</p>
			<dl class="parameters">
				<dt>ua</dt>
				<dd>Useragent to be submitted.</dd>
			
				<dt>site</dt>
				<dd>Optional origin site. We recommend you to add this parameter to your request to provide better usage statistics.</dd>

				<dt>file</dt>
				<dd>Optional origin file. We recommend you to add this parameter to your request to provide better usage statistics.</dd>
			</dl>
		</div>

		<div class="example">
			<h4>Request</h4>
			<code>http://detector-v3.dearapi.com/submit</code>

			<p>Returns</p>
			<code>success</code>
		</div>
	</div>

	<hr />


	<h2>Build</h2>

	<div class="build">
		<h3>http://detector-v3.dearapi.com/build</h3>
		<div class="description">
			<p>
				Build static Detector-v3, using the latest available data.
			</p>
			<p>
				Add optional custom grouping of segments to make the detection return exactly what you need.
				See the <a href="/build">build</a> page for more information.
			</p>
		</div>

		<div class="parameters">
			<p>POST or GET parameters</p>
			<dl class="parameters">
				<dt>language</dt>
				<dd>Required - programming language to export detector v3 in.</dd>
				<dt>grouping</dt>
				<dd>Optional custom segment grouping as JSON object.</dd>
			</dl>
		</div>

		<h4>Supported languages</h4>
		<p><em>PHP</em>, <em>JavaScript</em>. <em>Java</em> coming soon.</p>

		<h4>Grouping syntax</h4>
		<code>{
	"group-name":[
		"segment-name-1",
		"segment-name-2"
	]
}</code>

		<div class="example">
			<h4>Example</h4>
			<code>{
	"desktop":[
		"desktop_edge",
		"desktop_ie10",
		"desktop_ie11",
		"tablet"
	],
	"mobile":[
		"smartphone",
		"mobile",
		"tablet_light",
	],
	"unsupported":[
		"tv",
		"desktop_light",
		"desktop_ie9",
		"mobile_light"
	]
}</code>
			<p>
				Returns static standalone Detector v4 class in specified language, where detection will result in one of 4 custom 
				segments: <em>desktop</em>, <em>mobile</em>, <em>unsupported</em> and the unmentioned <em>seo</em>.
			</p>
		</div>

	</div>

	<hr />


	<h2>Debugging</h2>

	<div class="debug">
		<h3>http://detector-v3.dearapi.com/debug</h3>
		<div class="description">
			<p>
				Performs segment identification based on device useragent, but collects and sends additional 
				information to the development team.
			</p>
			<p>
				Useragent defaults to requesting device
				but specific useragent can be sent using the <span class="parameter">ua</span> parameter.
			</p>
		</div>

		<div class="parameters">
			<p>POST or GET parameters</p>
			<dl class="parameters">
				<dt>ua</dt>
				<dd>Optional useragent to be identified. Defaults to requesting device useragent.</dd>
			</dl>
		</div>

		<div class="example">
			<h4>Request</h4>
			<code>http://detector-v3.dearapi.com/debug</code>
			<p>Returns extended set of device details, and sends email with debug information to development team.</p>
		</div>
	</div>


	<ul class="subnavigation">
		<li class="apis"><a href="/docs/v3/apis">APIs</a></li>
		<li class="segments"><a href="/docs/v4/segments">Segments</a></li>
		<li class="implement"><a href="/docs/v3/implement">Implementation</a></li>
	</ul>

</div>