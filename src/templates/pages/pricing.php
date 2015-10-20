<div class="scene pricing i:scene">

	<div class="article" itemscope itemtype="http://schema.org/Article">
		<h1 itemprop="headline">Pricing</h1>

		<dl class="info">
			<dt class="published_at">Published</dt>
			<dd class="published_at" itemprop="datePublished" content="<?= date("Y-m-d", filemtime(__FILE__)) ?>"><?= date("Y-m-d, H:i", filemtime(__FILE__)) ?></dd>
			<dt class="author">Author</dt>
			<dd class="author" itemprop="author">Martin Kæstel Nielsen</dd>
		</dl>
		<div itemprop="image" content="<?= SITE_URL ?>/img/logo.png"></div>

		<div class="articlebody" itemprop="articleBody">
			<p>
				Detector is free.
			</p>
			<p>
				However, we do offer a simple subscription service to clients with specific needs. A subscription
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

			<p>Contact <a href="mailto:info@parentnode.dk">info@parentnode.dk</a> for details.</p>

		</div>
	</div>

</div>
