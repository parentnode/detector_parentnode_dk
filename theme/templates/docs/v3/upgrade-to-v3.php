<?php
$this->bodyClass("docs");
$this->pageTitle("It's just improvements");
?>
<div class="scene upgrade i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">Upgade to v3</h1>

		<?= $HTML->articleInfo(
			[
				"user_nickname" => "Martin Kæstel Nielsen",
			 	"published_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
				"modified_at" => date("Y-m-d, H:i", filemtime(__FILE__)),
			 ], 
			 "/docs/v3/upgrade-to-v3", 
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
				Detector v2 and v3 are quite different and yet very similar. Upgrading can typically be done in a couple of 
				hours. The benefit is dealing with less segments in your projects - well, and not being stranded when Detector v2
				is taken out of service (in 2016).
			</p>
			<p>
				Detector v3 comes with an updated set of segments but also allows you to flexibly group these segments to
				match the include-layout used in Detector v2 projects, making it perfectly compatible with your existing
				JavaScript and CSS layout.
			</p>
			<p><a href="http://janitor.parentnode.dk">Janitor v0.7.6</a> uses Detector v3.</p>

			<h2>Step 1</h2>
			<p>
				<a href="/build">Build</a> a custom Detector v3, which maps the new segments to the ones you 
				support in your existing project.
			</p>

			<h2>Step 2</h2>
			<p>
				Update your local Detector v2 request method to use the new static Detector v3 for detection.
			</p>
			<p>
				Shifting from the API service to the static Detector v3 is a matter of upgrading your CMS or
				make the update manually in your project. Instead of requesting the segment from the API, the static Detector v3
				provides a method which handles the segment detection.
			</p>

			<p class="note">
				Updating your CMS may have other implication on your projects. Refer to the CMS documentation
				for additional information. You can also contact us at 
				<a href="mailto:support@parentnode.dk">support@parentnode.dk</a> if you need help upgrading.
			</p>
		</div>
	</div>

</div>

