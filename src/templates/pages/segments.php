<div class="scene segments i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="name">Detector segmentation</h1>

		<dl class="info">
			<dt class="published_at">Date published</dt>
			<dd class="published_at" itemprop="datePublished" content="<?= date("Y-m-d", filemtime(__FILE__)) ?>"><?= date("Y-m-d, H:i", filemtime(__FILE__)) ?></dd>
			<dt class="author">Author</dt>
			<dd class="author" itemprop="author">Martin Kæstel Nielsen</dd>
		</dl>

		<div class="articlebody" itemprop="articleBody">
			<p>
				Detector is derived from an extensive, continuous and unparalleled analysis of browsers, conducted for more 
				than 10 years. It groups browsers and devices into 9 segments, based on common denominators for screen 
				resolution, input method, performance and scripting/styling capabilities.
			</p>

			<h2>The segments</h2>
			<dl class="segments">

				<dt>Desktop</dt>
				<dd>
					The most modern browsers. Chrome 5+, Firefox 4+ and Safari 5+. Support for modern technology, 
					like CSS3 transitions.
				</dd>

				<dt>Tablet</dt>
				<dd>
					Tablet computers. iPads and Android 2.2+ tablets with screen size of more than 5 inches.
				</dd>

				<dt>Mobile touch</dt>
				<dd>
					Smartphones with touch capabilities broad W3C recommendation support. A screen width of minimum 320 pixels. 
					All iOS version and Android &gt; 2.2.
				</dd>

				<dt>TV</dt>
				<dd>
					TV and console devices with internet access, using the remote control or gamepad for site navigation.
				</dd>

				<dt>Desktop IE</dt>
				<dd>
					Internet Explorer 9, 10 and 11. Lacking support for basic W3C recommendation, thus requiring workarounds and hack, 
					which will slow down standard compliant browsers.
				</dd>

				<dt>Desktop light</dt>
				<dd>
					All older browsers for desktop or laptop computers. Internet Explorer &lt; 8, 7, 6, Firefox &lt; 4, 
					Chrome &lt; 5, Safari &lt; 5, Netscape. You get the idea.
				</dd>

				<dt>Mobile</dt>
				<dd>
					Newer mobile and feature phones and smartphones with screen width of less than 320 pixels, or poor rendering
					capabilities.
				</dd>

				<dt>Mobile light</dt>
				<dd>
					All older mobile phones, with even the simplest HTML capable browser.
				</dd>

				<dt>Basic</dt>
				<dd>
					Semantic wellstructured content. No CSS or JavaScript extensions needed. For search engines, 
					content aggregators, screen readers for visually impaired and entirely text-based browsers.
				</dd>
			</dl>

			<p>
				The segments are efficiently backed by the minimalistic and semantic markup model described at 
				<a href="http://modulator.parentnode.dk">http://modulator.parentnode.dk</a> and empowered by the
				a complete javascript library found at 
				<a href="http://manipulator.parentnode.dk">http://manipulator.parentnode.dk.</a> To understand the full
				potential of Detector visit these websites.
			</p>
		</div>
	</div>

	<h2>More info</h2>
	<p>
		To aquire more information about the Detector segments, feel free to contact us.
	</p>
	<div class="vcard company" itemscope itemtype="http://schema.org/Organization">
		<div class="name fn org" itemprop="name">parentNode.dk</div>
		<div class="tel" itemprop="telephone"><a href="callto:+4520742819">+45 2074 2819</a></div>
		<div class="email" itemprop="email"><a href="mailto:info@parentnode.dk">info@parentnode.dk</a></div>
	</div>

</div>