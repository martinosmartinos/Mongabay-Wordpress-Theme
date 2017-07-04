<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?> class="no-js">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?> class="no-js">
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png" type="image/x-icon"/>
        <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/icons/ico-s2.jpg">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/icons/ico-l2.jpg">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/icons/ico-s.jpg">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/icons/ico-l.jpg">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>
		<!-- container -->
		<div class="container">
			<header class="header clear" role="banner">
				<div class="top-nav">
					<ul>
						<li><a href="https://cn.mongabay.com/">中文 (Chinese)</a></li>
						<li><a href="https://de.mongabay.com/">Deutsch (German)</a></li>
						<li><a href="https://www.mongabay.com/">English</a></li>
						<li><a href="https://es.mongabay.com/">Español (Spanish)</a></li>
						<li><a href="https://fr.mongabay.com/">Français (French)</a></li>
						<li><a href="https://www.mongabay.co.id/">Bahasa Indonesia (Indonesian)</a></li>
						<li><a href="https://it.mongabay.com/">Italiano (Italian)</a></li>
						<li><a href="https://jp.mongabay.com/">日本語 (Japanese)</a></li>
						<li><a href="https://pt.mongabay.com/">Português (Portuguese)</a></li>
					</ul>
			    </div>
				<div class="site-identity">
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/mongabay_logo_full.png" alt="Environmental headlines"/>
                        </a>
					</div>
				</div>
				<div class="main-menu">
					<nav class="navbar navbar-toggleable-md navbar-light" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
						<button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<?php mongabay_nav(); ?>
						<div class="top-search">
						  <img src="<?php echo get_template_directory_uri(); ?>/img/icons/search.png"/>
						</div>
						</div>
					</nav>
				</div>
			</header>
			<!-- /header -->
			<div id="backdrop" class=""></div>