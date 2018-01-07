<div class="scene segments i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">Detector v3 <br />Segmentation</h1>

		<?= $HTML->articleInfo(
			[
				"user_nickname" => "Martin Kæstel Nielsen",
			 	"published_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
				"modified_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
			 ], 
			 "/docs/v3/segments", 
			 [
				 "sharing" => false
			]
		) ?>

		<div class="articlebody" itemprop="articleBody">
			<p class="note">
				v3 is deprecated - support ends in 2018. 
				<a href="/docs/v4/segments">v4</a> is newest version - 
				<a href="/docs/v4/upgrade-to-v4">Upgrade now</a>.
			</p>
			<p>
				Detector is unique device identification derived from an extensive, continuous and unparalleled analysis 
				of browsers, conducted for more than 10 years. It groups browsers and devices into 13 segments, based on 
				common denominators for screen 
				resolution, input method, performance and scripting/styling capabilities. You can read more about
				segments and <a href="http://parentnode.dk/blog/tag/Segments" target="_blank">the segmentation model</a> on 
				parentnode.dk.
			</p>

			<h2>The segments</h2>
			<dl class="segments">

				<dt>desktop_edge</dt>
				<dd>
					The most modern desktop browsers. Chrome 25+, Firefox 22+, Safari 7+ and Edge 12+. 
					Support for edge technology, like 3D transforms and WebGL.

					<br /><br />
					<em>This segment has been removed from the global index with the release of v4, and can no longer be used.</em>
				</dd>

				<dt>desktop_ie11</dt>
				<dd>
					Internet Explorer 11. Not as good as <em>dekstop_edge</em>, due to only partial 3D transform support. 
					As a standalone segment, you decide where it belongs.

					<br /><br />
					Read more about <a href="http://parentnode.dk/blog/the-desktop_ie11-segment" target="_blank">desktop_ie11</a>.
				</dd>

				<dt>desktop</dt>
				<dd>
					Modern browsers. Chrome 7+, Firefox 7+ and Safari 6+. Support for modern technology, 
					like CSS3 transitions, FormData and FileReader.

					<br /><br />
					Read more about <a href="http://parentnode.dk/blog/the-desktop-segment" target="_blank">desktop</a>.
				</dd>

				<dt>desktop_ie10</dt>
				<dd>
					Internet Explorer 10. Missing support for Dataset which disqualifies it for
					the <em>desktop</em> segment. Will also typically need a few CSS hacks.
					As a standalone segment, you decide where it belongs.

					<br /><br />
					Read more about <a href="http://parentnode.dk/blog/the-desktop_ie10-segment" target="_blank">desktop_ie10</a>.
				</dd>

				<dt>desktop_ie9</dt>
				<dd>
					Internet Explorer 9. Missing support for FormData, FileReader and CSS Transitions (among other things). 
					Despite the poor feature support it is still too important to permanently degrade it to desktop_light.
					As a standalone segment, you decide where it belongs.

					<br /><br />
					Read more about <a href="http://parentnode.dk/blog/the-desktop_ie9-segment" target="_blank">desktop_ie9</a>.
				</dd>

				<dt>desktop_light</dt>
				<dd>
					All older browsers for desktop or laptop computers. Internet Explorer &lt;= 8 , Firefox &lt;= 6, 
					Chrome &lt;= 6, Safari &lt;= 5, Opera, Netscape. You get the idea. Just keep it simple and it's 
					all gonna work out fine.

					<br /><br />
					Read more about <a href="http://parentnode.dk/blog/the-desktop_light-segment" target="_blank">desktop_light</a>.
				</dd>



				<dt>tablet</dt>
				<dd>
					Advanced tablets with 3D Transform and WebGL support. iPads using Safari 8+, Android tablets using Chrome 30+ or Firefox 22+.
					All tablets have a screen size larger than 6 inches.

					<br /><br />
					Read more about <a href="http://parentnode.dk/blog/the-tablet-segment" target="_blank">tablet</a>.
				</dd>

				<dt>tablet_light</dt>
				<dd>
					Less advanced tablets, but still supporting CSS Transitions and 2D Transforms. Includes early iPads 
					and Android tablets, some WebOS tablets and Kindle Fire.
					All tablets have a screen size larger than 6 inches.

					<br /><br />
					Read more about <a href="http://parentnode.dk/blog/the-tablet_light-segment" target="_blank">tablet_light</a>.
				</dd>


				<dt>smartphone</dt>
				<dd>
					Smartphones with touchscreen and support for 3D Transforms and FileReader. Minimum 
					screen width of 320 pixels in portrait mode. Includes iPhones/iPods with Safari 6+, Androids with
					Chrome 12+ or the Android browser for Android 3+ and IE11 on Windows Phone 8+.

					<br /><br />
					Read more about <a href="http://parentnode.dk/blog/the-smartphone-segment" target="_blank">smartphone</a>.
				</dd>


				<dt>mobile</dt>
				<dd>
					Mobilephones released within the last ~5 years and smartphones with small screens 
					or otherwise degraded rendering capabilities or performance. These phones only support a basic 
					level of JavaScript and CSS.

					<br /><br />
					Read more about <a href="http://parentnode.dk/blog/the-mobile-segment" target="_blank">mobile</a>.
				</dd>

				<dt>mobile_light</dt>
				<dd>
					All older mobile phones, with even the simplest HTML capable browsers. This includes phones release
					in the past 15 years. They have very limited CSS support and typically no JavaScript support.

					<br /><br />
					Read more about <a href="http://parentnode.dk/blog/the-mobile_light-segment" target="_blank">mobile_light</a>.
				</dd>


				<dt>tv</dt>
				<dd>
					TV and console devices with internet access, using the remote control or gamepad for 
					navigation and interaction. Like Playstation 3, Nintendo Wii and SMART-TVs.

					<br /><br />
					Read more about <a href="http://parentnode.dk/blog/the-tv-segment" target="_blank">tv</a>.
				</dd>


				<dt>seo</dt>
				<dd>
					Semantic wellstructured content with No CSS or JavaScript. This segment is designed for 
					search engines, content aggregators, screen readers for visually impaired and entirely 
					text-based browsers like Lynx.

					<br /><br />
					Read more about <a href="http://parentnode.dk/blog/the-seo-segment" target="_blank">seo</a>.
				</dd>
			</dl>

			<p>
				The segments are efficiently backed by the minimalistic and semantic markup model described at 
				<a href="http://templator.parentnode.dk" target="_blank">http://templator.parentnode.dk</a> and empowered by the
				a complete javascript library found at 
				<a href="http://manipulator.parentnode.dk" target="_blank">http://manipulator.parentnode.dk.</a> To understand the full
				potential of Detector visit these websites.
			</p>
		</div>
	</div>


	<ul class="subnavigation">
		<li class="apis"><a href="/docs/v3/apis">APIs</a></li>
		<li class="segments"><a href="/docs/v3/segments">Segments</a></li>
		<li class="implement"><a href="/docs/v3/implement">Implementation</a></li>
	</ul>
</div>

