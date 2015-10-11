<?php
$this->bodyClass("docs");
$this->pageTitle("It's just improvements");
?>
<div class="scene changelog i:scene">

	<div class="article" itemscope itemtype="http://schema.org/CreativeWork">
		<h1 itemprop="name">Upgade from v2 to v3</h1>

		<div class="articlebody" itemprop="text">

			<p>
				Detector v2 and v3 are quite different and yet very similar. Upgrading can typically be done in a couple of 
				hours. The benefit is dealing with less segments in your projects - well, and not being stranded when Detector v2
				is taken out of service (in 2016).
			</p>
			<p>
				Detector v3 comes with an updated set of segments but also allows you to flexibly group these segments to
				match the include-layout used in Detector v2 projects, making it perfectly compatible with your existing
				JavaScript and CSS layout. If you are using Manipulator in your project, you should consider updating 
				Manipulator as well, using the <a href="http://manipulator.parentnode.dk/build">Manipulator builder</a>,
				but this is by no means required.
			</p>
			<p><a href="http://janitor.parentnode.dk">Janitor v0.7.6</a> uses Detector v3.</p>

			<h2>Step 1</h2>
			<p>
				<a href="/build">Build</a> a custom Detector v3 script, which maps the new segments to the ones you 
				support in your existing project.
			</p>

			<h2>Step 2</h2>
			<p>
				Update your local Detector v2 request method to use the new static script for detection.
			</p>
			<p>
				Shifting from the API service to the static Detector v3 script, will be a matter of upgrading your CMS or
				make the update manually in your project. Instead of requesting the segment from the API, the static script
				provides a method which handles the segment detection.
			</p>

			<p class="note">
				Updating your CMS may have other implication on your projects. Refer to the CMS documentation
				for additional information. You can also contact us at 
				<a href="mailto:support@parentnode.dk">support@parentnode.dk</a> if you need help upgrading.
			</p>
		</p>
	</div>

</div>

