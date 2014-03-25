	</div>

<?php

function menuItem($title, $url) {
	global $page;

	$selected = false;
	$related_urls = func_get_args();
	array_shift($related_urls);
	foreach($related_urls as $value) {
		if(preg_match("/^".preg_replace("/\//", "\/", $value)."/", $page->url)) {
			$selected = true;
		}
	}
	return '<li'.HTML::attribute("class", ($selected ? "selected" : "")).'><a href="' . $url . '">' . $title . '</a></li>';
}
?>
	<div id="navigation">
		<ul>
			<?= menuItem("APIs", "/conductor/apis") ?>
			<?= menuItem("Segments", "/conductor/segments") ?>
			<?= menuItem("Pricing", "/conductor/pricing") ?>
			<?= menuItem("Implement", "/conductor/implement") ?>
			<?= menuItem("About", "/conductor/about") ?>
		</ul>
	</div>

	<div id="footer">
		<div class="vcard company cph" itemscope itemtype="http://schema.org/Organization">
			<div class="name fn org" itemprop="name">parentNode ApS</div>
			<div class="adr" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<!--div class="street-address" itemprop="streetAddress">Vesterbrogade 80B</div-->
				<div class="city"><!--span class="postal-code" itemprop="postal-code">2680</span--> <span class="locality" itemprop="addressLocality">Copenhagen</span></div>
				<div class="country-name" itemprop="addressCountry">Denmark</div>
				<!--div class="geo" itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">&phi; <span class="latitude" itemprop="latitude">55.52489</span>°; &lambda; <span class="longitude" itemprop="longitude">12.16278</span>°</div-->
			</div>
			<div class="tel" itemprop="telephone"><a href="callto:+4520742819">+45 2074 2819</a></div>
		</div>
	</div>

</div>

</body>
</html>