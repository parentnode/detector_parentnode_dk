<?php
$this->bodyClass("docs");
$this->pageTitle("It's just improvements");
?>
<div class="scene upgrade i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">Upgade to v4</h1>

		<?= $HTML->articleInfo(
			[
				"user_nickname" => "Martin Kæstel Nielsen",
			 	"published_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
				"modified_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
			 ], 
			 "/docs/v4/upgrade-to-v4", 
			 [
				 "sharing" => false
			]
		) ?>

		<div class="articlebody" itemprop="articleBody">

			<p>
				Detector v3 and v4 differ only in that <em>desktop_edge</em> has been merged back into the <em>desktop</em> segment. 
				Upgrading can typically be done in a matter of minutes.
			</p>
			<p>
				Detector allows you to create a static Detector class and flexibly group custom segments to
				match the include-layout of your choosing. If you are using the API for detection, you could
				consider if a local implementation is the way to go, since you're at it anyway.
			</p>
			<p>
				<a href="http://janitor.parentnode.dk">Janitor v0.8</a> uses Detector v4 - if you're using Janitor, all you need is
				is the latest version.
			</p>

			<h2>Upgrade to Detector v4 API</h2>
			<h3>Step 1</h3>
			<p>
				Change the request url from <span class="value">http(s)://detector-v3.dearapi.com</span> to 
				<span class="value">http(s)://detector-v4.dearapi.com</span> or to 
				<span class="value">http(s)://detector.dearapi.com</span> if you always want to use the latest version.
			</p>


			<h2>Upgrade to static Detector v4 class</h2>
			<h3>Step 1</h3>
			<p>
				<a href="/build">Build</a> a custom Detector v4, which maps the segments to the ones you 
				support in your existing project.
			</p>

			<h3>Step 2</h3>
			<p>
				Update your local Detector request method to use the new static Detector v4 for detection. This is done by
				replacing the API request with calling a method on the Detector class.
			</p>
			<p>
				Shifting from the API service to the static Detector v4 is a matter of upgrading your CMS (depending on which CMS you use)
				or making the update manually in your project. Instead of requesting the segment from the API, the static Detector v4
				provides a method which handles the segment detection and returns the segment as a string.
			</p>

			<p class="note">
				Updating your CMS may have other implication on your projects. Refer to the CMS documentation
				for additional information. You can also contact us at 
				<a href="mailto:support@parentnode.dk">support@parentnode.dk</a> if you need help upgrading.
			</p>
		</div>
	</div>

</div>

