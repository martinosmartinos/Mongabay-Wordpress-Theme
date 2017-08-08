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
		<title><?php wp_title(''); ?></title>

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
		
		<!-- FB-added 2017-08-01 -->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=139042016164873";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<!-- //FB-added 2017-08-01 -->
		
		<!-- container -->
		<div class="container">
			<header class="header" role="banner">
				<?php
					if ( wp_is_mobile() ) {
						echo '<div class="top-nav fixed-top">';
						get_template_part( 'partials/navigation', 'mobile' );
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
						echo '<a href="https://'.mongabay_subdomain_name().'.mongabay.com">';
						$subdomain = mongabay_subdomain_name();
						echo '<svg width="410" height="75" aria-label="Mongabay">';
						echo '<image xlink:href="'.get_template_directory_uri().'/img/logo/mongabay_logo_'.$subdomain.'.svg" src="'.get_template_directory_uri().'/img/logo/mongabay_logo_'.$subdomain.'.png" width="410" height="75" alt="Mongabay"/>';
						echo '</svg>';
						echo '</a>';
						echo '</div>';
						echo '</div>';
						echo '<div class="main-menu">';
						get_template_part( 'partials/navigation', 'main' );
						echo '</div>';
					}
				?>

			</header>
			<div class="clearfix"></div>
			<?php if(wp_is_mobile()) {?>
			<div id="backdrop" class=""></div>
			<?php }?>