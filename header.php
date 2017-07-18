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
		<!-- container -->
		<div class="container">
			<header class="header" role="banner">
				<?php
					if ( wp_is_mobile() ) {
						echo '<div class="top-nav fixed-top">';
						get_template_part( navigation, mobile );
						echo '<div class="logo-small" style="margin-top: 7px">';
						echo '<a href="'.home_url().'">';
						echo '<img src="'.get_template_directory_uri().'/img/logo/mongabay_logo_black.png" alt="Environmental headlines"/>';
						echo '</a>';
						echo '</div>';
						echo '</div>';
				}
				?>
				<?php
					if ( !wp_is_mobile() ) {
						echo '<div id="language-bar">';
						echo '<ul>';
						echo '<li><a href="https://cn.mongabay.com/">中文 (Chinese)</a></li>';
						echo '<li><a href="https://de.mongabay.com/">Deutsch (German)</a></li>';
						echo '<li><a href="https://es.mongabay.com/">Español (Spanish)</a></li>';
						echo '<li><a href="https://fr.mongabay.com/">Français (French)</a></li>';
						echo '<li><a href="https://www.mongabay.co.id/">Bahasa Indonesia (Indonesian)</a></li>';
						echo '<li><a href="https://it.mongabay.com/">Italiano (Italian)</a></li>';
						echo '<li><a href="https://jp.mongabay.com/">日本語 (Japanese)</a></li>';
						echo '<li><a href="https://pt.mongabay.com/">Português (Portuguese)</a></li>';
						echo '</ul>';
						echo '</div>';
						echo '<div class="site-identity">';
						echo '<div class="logo">';
						echo '<a href="'.home_url().'">';
						$subdomain = mongabay_subdomain_name();

						switch ($subdomain) {
							case 'es':
								$logo = 'mongabay_logo_full_es';
								break;
							
							default:
								$logo = 'mongabay_logo_full';
								break;
						}

						echo '<img src="'.get_template_directory_uri().'/img/logo/'.$logo.'.png" alt="Environmental headlines"/>';
						echo '</a>';
						echo '</div>';
						echo '</div>';
						echo '<div class="main-menu">';
						get_template_part( navigation, main );
						echo '</div>';
					}
				?>
			</header>
			<!-- /header -->
			<div id="backdrop" class=""></div>