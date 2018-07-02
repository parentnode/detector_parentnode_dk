<div class="scene segments i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">Detector v4 <br />Segmentation</h1>

		<?= $HTML->articleInfo(
			[
				"user_nickname" => "Martin Kæstel Nielsen",
			 	"published_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
				"modified_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
			 ], 
			 "/docs/v4/segments", 
			 [
				 "sharing" => false
			]
		) ?>

		<div class="articlebody" itemprop="articleBody">
			<p>
				Detector is unique device identification derived from an extensive, continuous and unparalleled analysis 
				of browsers, conducted for more than 10 years. It groups browsers and devices into 12 segments, based on 
				common denominators for screen 
				resolution, input method, performance and scripting/styling capabilities. You can read more about
				segments and <a href="https://parentnode.dk/blog/tag/Segments" target="_blank">the segmentation model</a> on 
				parentnode.dk.
			</p>

			<h2>The segments</h2>
			<dl class="segments">

				<dt>desktop</dt>
				<dd>
					Modern browsers. Chrome 49+, Firefox 49+, Safari 10+ and Edge 13+. Support for advanced technology, 
					like fx. WebGL, Web Cryptography, ES6 Classes and much, much more.

					<br /><br />
					Read more about <a href="https://parentnode.dk/blog/the-desktop-segment" target="_blank">desktop</a>.
				</dd>

				<dt>desktop_ie11</dt>
				<dd>
					Internet Explorer 11. Not nearly as good as <em>dekstop</em>, due to only partial 3D transform support. 
					As a standalone segment, you decide where it belongs.

					<br /><br />
					Read more about <a href="https://parentnode.dk/blog/the-desktop_ie11-segment" target="_blank">desktop_ie11</a>.
				</dd>

				<dt>desktop_ie10</dt>
				<dd>
					Internet Explorer 10. Lost in between IE9 and IE 11. Will also typically need a lot of CSS and Javascript hacks.
					As a standalone segment, you decide where it belongs.

					<br /><br />
					Read more about <a href="https://parentnode.dk/blog/the-desktop_ie10-segment" target="_blank">desktop_ie10</a>.
				</dd>

				<dt>desktop_ie9</dt>
				<dd>
					Internet Explorer 9. Missing support for FormData, FileReader and CSS Transitions (among other things). 
					Despite the poor feature support it is still too important to permanently degrade it to desktop_light.
					As a standalone segment, you decide where it belongs.

					<br /><br />
					Read more about <a href="https://parentnode.dk/blog/the-desktop_ie9-segment" target="_blank">desktop_ie9</a>.
				</dd>

				<dt>desktop_light</dt>
				<dd>
					All older browsers for desktop or laptop computers. Internet Explorer &lt;= 8 , Firefox &lt;= 48, 
					Chrome &lt;= 48, Safari &lt;= 9, Edge 12, Non-blink Opera, Netscape. You get the idea. Just keep it simple and it's 
					all gonna work out fine.

					<br /><br />
					Read more about <a href="https://parentnode.dk/blog/the-desktop_light-segment" target="_blank">desktop_light</a>.
				</dd>



				<dt>tablet</dt>
				<dd>
					Advanced tablets with support for advanced technology, 
					like fx. WebGL, Web Cryptography, ES6 Classes and much, much more. 
					iPads using Safari 10+, Android tablets using Chrome 49+ or Firefox 49+.
					All tablets have a screen size larger than 6 inches.

					<br /><br />
					Read more about <a href="https://parentnode.dk/blog/the-tablet-segment" target="_blank">tablet</a>.
				</dd>

				<dt>tablet_light</dt>
				<dd>
					Less advanced tablets, but still supporting CSS Transitions and 2D Transforms. Includes early iPads 
					and Android tablets, some WebOS tablets and Kindle Fire.
					All tablets have a screen size larger than 6 inches.

					<br /><br />
					Read more about <a href="https://parentnode.dk/blog/the-tablet_light-segment" target="_blank">tablet_light</a>.
				</dd>


				<dt>smartphone</dt>
				<dd>
					Smartphones with touchscreen and support for advanced technology, 
					like fx. WebGL, Web Cryptography, ES6 Classes and much, much more. Minimum 
					screen width of 320 pixels in portrait mode. Includes iPhones/iPods with Safari 10+, Androids with
					Chrome 49+, Firefox mobile 49+ and Edge 13+ for mobile.

					<br /><br />
					Read more about <a href="https://parentnode.dk/blog/the-smartphone-segment" target="_blank">smartphone</a>.
				</dd>


				<dt>mobile</dt>
				<dd>
					Mobilephones released within the last ~5 years and smartphones with small screens 
					or otherwise degraded rendering capabilities or performance. These phones only support a basic 
					level of JavaScript and CSS.

					<br /><br />
					Read more about <a href="https://parentnode.dk/blog/the-mobile-segment" target="_blank">mobile</a>.
				</dd>

				<dt>mobile_light</dt>
				<dd>
					All older mobile phones, with even the simplest HTML capable browsers. This includes phones release
					in the past 15 years. They have very limited CSS support and typically no JavaScript support.

					<br /><br />
					Read more about <a href="https://parentnode.dk/blog/the-mobile_light-segment" target="_blank">mobile_light</a>.
				</dd>


				<dt>tv</dt>
				<dd>
					TV and console devices with internet access, using the remote control or game pad for 
					navigation and interaction. Like Playstation 3, Nintendo Wii and SMART-TVs.

					<br /><br />
					Read more about <a href="https://parentnode.dk/blog/the-tv-segment" target="_blank">tv</a>.
				</dd>


				<dt>seo</dt>
				<dd>
					Semantic wellstructured content with No CSS or JavaScript. This segment is designed for 
					search engines, content aggregators, screen readers for visually impaired and entirely 
					text-based browsers like Lynx.

					<br /><br />
					Read more about <a href="https://parentnode.dk/blog/the-seo-segment" target="_blank">seo</a>.
				</dd>
			</dl>

			<p>
				The segments are efficiently backed by the minimalistic and semantic markup model described at 
				<a href="https://templator.parentnode.dk" target="_blank">https://templator.parentnode.dk</a> and empowered by the
				a complete javascript library found at 
				<a href="https://manipulator.parentnode.dk" target="_blank">https://manipulator.parentnode.dk.</a> To understand the full
				potential of Detector visit these websites.
			</p>
		</div>
	</div>


	<ul class="subnavigation">
		<li class="apis"><a href="/docs/v4/apis">APIs</a></li>
		<li class="segments"><a href="/docs/v4/segments">Segments</a></li>
		<li class="implement"><a href="/docs/v4/implement">Implementation</a></li>
	</ul>
</div>

