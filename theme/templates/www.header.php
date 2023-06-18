<!DOCTYPE html>
<html lang="<?= $this->language() ?>">
<head>
	<!-- (c) & (p) think.dk 2002-2016 -->
	<!-- For detailed copyright license, see /terms -->
	<!-- If you want to use or contribute to this code, visit https://parentnode.dk -->
	<title><?= $this->pageTitle() ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="keywords" content="device mobile tablet detection segment web development api desktop webservice" />
	<meta name="description" content="<?= $this->pageDescription() ?>" />
	<meta name="viewport" content="initial-scale=1, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

	<?= $this->sharingMetaData() ?>

	<link rel="apple-touch-icon" href="/touchicon.png">
	<link rel="icon" href="/favicon.png">

<? if(session()->value("dev")) { ?>
	<link type="text/css" rel="stylesheet" media="all" href="/css/lib/seg_<?= $this->segment() ?>_include.css" />
	<script type="text/javascript" src="/js/lib/seg_<?= $this->segment() ?>_include.js"></script>
<? } else { ?>
	<link type="text/css" rel="stylesheet" media="all" href="/css/seg_<?= $this->segment() ?>.css?rev=20230618-224548" />
	<script type="text/javascript" src="/js/seg_<?= $this->segment() ?>.js?rev=20230618-224548"></script>
<? } ?>

	<?= $this->headerIncludes() ?>
</head>

<body<?= $HTML->attribute("class", $this->bodyClass()) ?>>

<div id="page" class="i:page">
	<div id="header">
		<ul class="servicenavigation">
			<li class="keynav navigation nofollow"><a href="#navigation">To navigation</a></li>
<? if(defined("SITE_SHOP") && SITE_SHOP): ?>
			<li class="keynav cart nofollow<?= $cart && $cart["total_items"] ? " used" : "" ?>"><a href="/shop/cart">Cart<?= ($cart ? ' (<span class="total">'.$cart["total_items"].'</span>)' : '') ?></a></li>
<? endif; ?>
<? if(session()->value("user_id") && session()->value("user_group_id") == 2): ?>
			<li class="keynav admin nofollow"><a href="/janitor/admin/profile">Account</a></li>
<? elseif(session()->value("user_id") && session()->value("user_group_id") > 2): ?>
			<li class="keynav admin nofollow"><a href="/janitor">Janitor</a></li>
<? endif; ?>
<? if(session()->value("user_id") && session()->value("user_group_id") > 1): ?>
			<li class="keynav user logoff nofollow"><a href="?logoff=true">Logoff</a></li>
<? else: ?>
			<li class="keynav user login nofollow"><a href="<?= SITE_LOGIN_URL ?>">Login</a></li>
<? endif; ?>
		</ul>
	</div>

	<div id="content">
