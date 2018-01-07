<div class="scene apis i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">Detector v2 <br />API Documentation</h1>

		<?= $HTML->articleInfo(
			[
				"user_nickname" => "Martin Kæstel Nielsen",
			 	"published_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
				"modified_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
			 ], 
			 "/docs/v2/apis", 
			 [
				 "sharing" => false
			]
		) ?>

		<div class="articlebody" itemprop="articleBody">
			<p class="note">
				v2 is deprecated - support ended in 2016. 
				<a href="/docs/v4/apis">v4</a> is newest version - 
				<a href="/docs/v4/upgrade-to-v4">Upgrade now</a>.
			</p>
			<p>
				The Detector API provides a range of tools for different needs. The preferred method is using a 
				server-side request and storing the segment in the users session, as this provides the best user
				experience and fewest possible requests to the Detector server. See 
				<a href="/docs/v2/implement">our implementation guide</a> for simplified examples.
			</p>
			<p>
				If you are restrained from implementing
				a server-side request, a simple JavaScript include method is also available.
			</p>
			<p>
				Be aware of our <a href="/terms">terms</a>.
			</p>
			<p>
				The API is available at <a href="http://detector-v2.dearapi.com" target="_blank">http://detector-v2.dearapi.com</a>.
			</p>
		</div>
	</div>

	<hr />


	<h2>Identification</h2>

	<div class="plain">
		<h3>http://detector-v2.dearapi.com/</h3>
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
			<code>http://detector-v2.dearapi.com/</code>
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
			<li><a href="http://detector-v2.dearapi.com" target="_blank" rel="nofollow" class="button primary">Test this endpoint</a></li>
		</ul>
	</div>

	<hr />

	<div class="xml">
		<h3>http://detector-v2.dearapi.com/xml</h3>
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
			<code>http://detector-v2.dearapi.com/xml</code>

			<p>Returns XML formatted segment.</p>
			<code>&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;
&lt;device&gt;
    &lt;segment&gt;<?= $this->segment() ?>&lt;/segment&gt;
&lt;/device&gt;</code>
		</div>

		<ul class="actions">
			<li><a href="http://detector-v2.dearapi.com/xml" target="_blank" rel="nofollow" class="button primary">Test this endpoint</a></li>
		</ul>
	</div>

	<hr />

	<div class="jsonp">
		<h3>http://detector-v2.dearapi.com/jsonp</h3>
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
			<code>http://detector-v2.dearapi.com/jsonp</code>

			<p>Returns JSONP callback function with segment.</p>
			<code>callback({"segment":"<?= $this->segment() ?>"});</code>
		</div>

		<ul class="actions">
			<li><a href="http://detector-v2.dearapi.com/jsonp" target="_blank" rel="nofollow" class="button primary">Test this endpoint</a></li>
		</ul>
	</div>

	<hr />

	<div class="js_include">
		<h3>http://detector-v2.dearapi.com/js-include</h3>
		<div class="description">
			<p>
				Performs segment identification based on device useragent, with the purpose of returning appropriate 
				JavaScript and CSS segment includes without using local server-side technology. 
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
			<code>http://detector-v2.dearapi.com/js-include</code>

			<p>Returns JavaScript document.write's with JavaScript and CSS segment includes.</p>
			<code>document.write(&#x27;&lt;link type=&quot;text/css&quot; rel=&quot;stylesheet&quot; media=&quot;all&quot; href=&quot;/css/seg_<?= $this->segment() ?>.css&quot; /&gt;&#x27;);
document.write(&#x27;&lt;script type=&quot;text/javascript&quot; src=&quot;/js/seg_<?= $this->segment() ?>.js&quot;&gt;&lt;/script&gt;&#x27;);</code>
		</div>

		<ul class="actions">
			<li><a href="http://detector-v2.dearapi.com/js-include" target="_blank" rel="nofollow" class="button primary">Test this endpoint</a></li>
		</ul>
	</div>

	<hr />


	<h2>Debugging</h2>

	<div class="debug">
		<h3>http://detector-v2.dearapi.com/debug</h3>
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
			<code>http://detector-v2.dearapi.com/debug</code>

			<p>Returns extended set of device details, and sends email with debug information to development team.</p>
		</div>
	</div>


	<ul class="subnavigation">
		<li class="apis"><a href="/docs/v2/apis">APIs</a></li>
		<li class="segments"><a href="/docs/v2/segments">Segments</a></li>
		<li class="implement"><a href="/docs/v2/implement">Implementation</a></li>
	</ul>

</div>