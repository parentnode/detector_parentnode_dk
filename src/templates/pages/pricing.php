<div class="scene pricing i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">Pricing</h1>

		<ul class="info">
			<li class="published_at" itemprop="datePublished" content="<?= date("Y-m-d", filemtime(__FILE__)) ?>"><?= date("Y-m-d, H:i", filemtime(__FILE__)) ?></li>
			<li class="modified_at" itemprop="dateModified" content="<?= date("Y-m-d", filemtime(__FILE__)) ?>"></li>
			<li class="author" itemprop="author">Martin Kæstel Nielsen</li>
			<li class="main_entity share" itemprop="mainEntityOfPage" content="<?= SITE_URL."/pricing" ?>"></li>
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
				Detector is free.
			</p>
			<p>
				However, through <a href="http://think.dk">think.dk</a> we offer a simple subscription service to clients with specific needs. A subscription
				entails a custom update cycle matching the needs of your business.
			</p>

			<p>
				These subscriptions cover hosting expenses and time required for continuous
				maintenance (indexing new devices) and other improvements, but Detector is not based on an 
				economy centered businessplan. It is more important to provide solutions, than to make money. I 
				believe this to be true in all aspects of life.
			</p>

			<h2>Update subscriptions</h2>

			<div class="plan">
				<h3>Standard</h3>
				<ul>
					<li>2 annual standard updates</li>
					<li>3 annual updates on demand</li>
				</ul>

				<dl class="price">
					<dt>Price</dt>
					<dd>750€ / year</dd>
				</dl>
			</div>

			<div class="plan">
				<h3>Priority</h3>
				<ul>
					<li>2 annual standard updates</li>
					<li>10 annual updates on demand</li>
				</ul>

				<dl class="price">
					<dt>Price</dt>
					<dd>2.000€ / year</dd>
				</dl>
			</div>

			<p>Contact <a href="mailto:start@think.dk">start@think.dk</a> for details.</p>

		</div>
	</div>

</div>
