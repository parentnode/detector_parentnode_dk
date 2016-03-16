<div class="scene about i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">About Detector</h1>

		<ul class="info">
			<li class="published_at" itemprop="datePublished" content="<?= date("Y-m-d", filemtime(__FILE__)) ?>"><?= date("Y-m-d, H:i", filemtime(__FILE__)) ?></li>
			<li class="modified_at" itemprop="dateModified" content="<?= date("Y-m-d", filemtime(__FILE__)) ?>"><?= date("Y-m-d, H:i", filemtime(__FILE__)) ?></li>
			<li class="author" itemprop="author">Martin Kæstel Nielsen</li>
			<li class="main_entity share" itemprop="mainEntityOfPage"><?= SITE_URL."/about" ?></li>
			<li class="publisher" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
				<ul class="publisher_info">
					<li class="name" itemprop="name">parentnode.dk</li>
					<li class="logo" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
						<span class="image_url" itemprop="url" content="<?= SITE_URL ?>/img/logo-large.png"></span>
						<span class="image_width" itemprop="width" content="720"></span>
						<span class="image_height" itemprop="height" content="405"></span>
					</li>
				</ul>
			</li>
			<li class="image_info" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
				<span class="image_url" itemprop="url" content="<?= SITE_URL ?>/img/logo-large.png"></span>
				<span class="image_width" itemprop="width" content="720"></span>
				<span class="image_height" itemprop="height" content="405"></span>
			</li>
		</ul>

		<div class="articlebody" itemprop="articleBody">
			<p>
				Detector was made open source in 2014 to make segments available to the public. 
				After having worked professionally with Detector for 6 years (since 2008), it had proved to be a 
				strong and valid concept, without any real competitors in the market. Now you can reap the benefits 
				as well.
			</p>
			<p>
				As of Detector v3, the detection is available as a static downloadable script/class to make detection 
				independent of the external service.
			</p>
			<p>
				Detector is made available to improve internet solutions around the world. It's not a business and it is
				not supposed to be a business. It is an idealistic approach, made real with a lot of patience and hard
				work. I believe that is the best way to implement real changes.
			</p>
			<p>
				In spite of this idealistic approach, the cost of running the updated live service needs to be covered. 
				This is done through sponsors and update subscriptions. Subscribing to updates is by no means required
				to leverage the advantages of Detector as updates are continuously made available on this website.
				The subscription approach instead includes an update on demand option, required by some clients.
			</p>
			<p>
				The Detector service is hosted in a load-balanced environment in cooporation with Rackspace. The servers
				are monitored and optimized for reliability and ultra fast responses, running on third year with 
				zero unscheduled downtime.
			</p>
			<p>
				Detector is part of the <a href="http://parentnode.dk">parentNode</a> open source projects.
			</p>

			<h2>Get in touch</h2>
			<p>
				We are always looking for new business or development partners, so feel free to contact us with any questions, suggestions or
				comments.
			</p>

		</div>
	</div>

	<div itemtype="http://schema.org/Organization" itemscope class="vcard company">
		<h2 class="name fn org" itemprop="name">parentNode.dk</h2>

		<dl class="info basic">
			<dt class="address">Address</dt>
			<dd class="address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<ul>
					<li itemprop="streetAddress">Æbeløgade 4</li>
					<li><span class="postal" itemprop="postalCode">2100</span> <span class="locality" itemprop="addressLocality">København Ø</span></li>
					<li class="country" itemprop="addressCountry">Denmark</li>
				</ul>
			</dd>
		</dl>

		<dl class="info contact">
			<dt class="contact">Contact</dt>
			<dd class="contact">
				<ul>
					<li class="email"><a href="mailto:info@parentnode.dk" itemprop="email" content="info@parentnode.dk">info@parentnode.dk</a></li>
				</ul>
			</dd>
			<dt class="social">Social media</dt>
			<dd class="social">
				<ul>
					<li class="facebook"><a href="https://facebook.com/parentnode">Facebook</a></li>
					<li class="linkedin"><a href="https://www.linkedin.com/company/parentnode">LinkedIn</a></li>
				</ul>
			</dd>
		</dl>

	</div>

</div>