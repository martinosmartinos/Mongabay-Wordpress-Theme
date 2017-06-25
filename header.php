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
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
			        <div class="dropdown">
			          <button class="btn btn-secondary dropdown-toggle" type="button" id="language-picker" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			            English
			          </button>
			          <div class="dropdown-menu" aria-labelledby="language-picker">
			            <button class="dropdown-item" type="button">Deutsch</button>
			            <button class="dropdown-item" type="button">Español</button>
			            <button class="dropdown-item" type="button">Français</button>
			          </div>
			        </div>
			      </div>
				<div class="site-identity">
					<div class="logo">
						<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/mongabay_logo_full.png" alt="Mongabay Environmental News"/></a>
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