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

</head>
<body <?php body_class(); ?>>
	<header class="header fixed-top header-small" role="banner">
		<?php get_template_part( 'partials/navigation', 'featured' ); ?>
		<div class="logo-small" style="">
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo/mongabay_logo_black.png" class="mongabay-logo"></a>
		</div>
		<div class="social">
			<?php get_template_part( 'partials/section', 'social' ); ?>
		</div>
	</header>
	<?php if(wp_is_mobile()) {?>
	<div id="backdrop" class=""></div>
	<?php }?>