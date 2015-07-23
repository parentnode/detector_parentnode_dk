<?php
$this->bodyClass("docs");
$this->pageTitle("It's just improvements");
?>
<div class="scene changelog i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="name">Upgade from v2 to v3</h1>

		<dl class="info">
			<dt class="published_at">Date published</dt>
			<dd class="published_at" itemprop="datePublished" content="<?= date("Y-m-d", filemtime(__FILE__)) ?>"><?= date("Y-m-d, H:i", filemtime(__FILE__)) ?></dd>
			<dt class="author">Author</dt>
			<dd class="author" itemprop="author">Martin Kæstel Nielsen</dd>
		</dl>

		<div class="articlebody" itemprop="articleBody">

			<p>
				Detector v2 and v3 are quite different and yet very similar. Upgrading can typically be done in about
				an hour.
			</p>

			<h2>Step 1</h2>
			<p>
				Detector v3 comes with an updated set of segments but also allows you to flexibly group these segments to
				match the include-layout used in Detector v2 projects, making it perfectly compatible with your existing
				JavaScript and CSS layout.
			</p>
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

			<!--p><a href="http://janitor.parentnode.dk">Janitor v0.8</a> uses Detector v3.</p-->

			<p class="note">
				Updating your CMS may have other implication on your projects. Refer to the CMS documentation
				for additional information.
			</p>
		</p>
	</div>

</div>

