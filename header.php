<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?> class="no-js">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?> class="no-js">
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<?php
	if(wp_is_mobile()) {
		$html_style = 'margin-top: 46px!important';
	}
?>
<html <?php language_attributes(); ?> class="no-js" style="<?php echo $html_style; ?>">
<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php mongabay_custom_title(); ?></title>
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png" type="image/x-icon"/>
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/icons/ico-s2.jpg">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/icons/ico-l2.jpg">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/icons/ico-s.jpg">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/icons/ico-l.jpg">
		<meta name="referrer" content="always" />
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

		<!-- Facebook Pixel Code 20171207-->
		<script>
		  !function(f,b,e,v,n,t,s)
		  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		  n.queue=[];t=b.createElement(e);t.async=!0;
		  t.src=v;s=b.getElementsByTagName(e)[0];
		  s.parentNode.insertBefore(t,s)}(window, document,'script',
		  'https://connect.facebook.net/en_US/fbevents.js');
		  fbq('init', '1222207174458407');
		  fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		  src="https://www.facebook.com/tr?id=1222207174458407&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code 20171207 -->

		<!-- container -->
		<div class="container">
			<header class="header" role="banner">
				<?php
					if ( wp_is_mobile() ) {
						echo '<div class="top-nav fixed-top">';
						get_template_part( 'partials/navigation', 'mobile' );
						echo '<div class="logo-small">';
						echo '<a href="'.home_url().'">';
						echo '<svg width="120" height="26" aria-label="Mongabay">';
						echo '<image xlink:href="'.get_template_directory_uri().'/img/logo/mongabay_logo_black.svg" src="'.get_template_directory_uri().'/img/logo/mongabay_logo_black.png" width="120" height="26" alt="Mongabay"/>';
						echo '</svg>';
						echo '</a>';
						echo '</div>';
						echo '<div class="follow-mobile"><a href="#" class="follow-mobile-button">Follow</a></div>';
						echo '<div id="follow-modal"><a class="follow-modal-close" href="#">X</a>';
						wp_nav_menu(array('menu' => 'Social channels'));
						echo '</div>';
						echo '</div>';
				}
				?>
				<?php
					if ( !wp_is_mobile()) {
                        if ( mongabay_subdomain_name()!=='kidsnews' ) {
                            echo '<div id="language-bar">';
                            echo '<ul>';
                            echo '<li><a href="https://www.mongabay.com/">English</a></li>';
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
                        };
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
