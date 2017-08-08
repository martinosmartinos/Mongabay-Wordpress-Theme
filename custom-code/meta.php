<?php
/* Meta tags */
add_action( 'wp_head', 'mongabay_meta', 10 );

function mongabay_meta() {
	
	global $post;
	// article
	if ( is_single() && !is_front_page() && !is_home() ) {
;
		echo '<meta name="description" content="' .get_the_excerpt($post->ID). '" />'."\n";
		echo '<meta name="Tags" content="Mongabay, Mongabay Environmental News, Environmental News, Conservation News" />'."\n";
		echo '<meta property="keywords" content="Mongabay, Mongabay Environmental News, Environmental News, Conservation News" />'."\n";
		echo '<meta name="robots" content="index, follow" />'."\n";
		echo '<link rel="publisher" href="https://plus.google.com/+Mongabay/" />'."\n";
		echo '<meta property="article:publisher" content="https://www.facebook.com/mongabay/"/>'."\n";
		echo '<meta property="og:title" content="'.esc_attr(get_the_title()).'"/>'."\n";
		echo '<meta property="og:site_name" content="Mongabay Environmental News"/>'."\n";
		echo '<meta property="og:url" content="'.esc_url(get_permalink()).'"/>'."\n";
		echo '<meta property="og:type" content="article" />'."\n";
					
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		//if (!$thumbnail_src && function_exists('nelioefi_get_thumbnail_src'))  $thumbnail_src[0] = nelioefi_get_thumbnail_src( $post->ID );
		
		if(!empty($thumbnail_src[0])) {
			echo '<meta property="og:image" content="' . esc_url($thumbnail_src[0] ) . '"/>'."\n";
		}
		// else {
		// 	if (first_content_image()){
		// 		echo '<meta property="og:image" content="' . esc_attr(first_content_image() ) . '"/>';
		// 	}
		// }
		echo '<meta property="og:description" content="' .get_the_excerpt($post->ID). '"/>'."\n";
		
		$format = 'c';
		echo '<meta property="article:published_time" content="'.get_the_date( $format ).'" />'."\n";
		echo '<meta property="article:modified_time" content="'.get_the_modified_date( $format ).'" />'."\n";
		echo '<meta property="article:section" content="Environmental news" />'."\n";
		echo '<meta property="article:tag" content="Mongabay, Mongabay Environmental News, Environmental News, Conservation News" />'."\n";
		echo '<meta property="fb:admins" content="139042016164873" />'."\n";
		echo '<meta property="og:locale" content="'.get_locale().'" />'."\n";
		echo '<meta property="fb:app_id" content="1559969950974398"/>'."\n";
		echo '<meta name="twitter:card" content="summary"/>'."\n";
		echo '<meta name="twitter:description" content="'.get_the_excerpt($post->ID).'"/>'."\n";
		echo '<meta name="twitter:title" content="' . esc_attr(get_the_title()) . '"/>'."\n";
		echo '<meta name="twitter:site" content="@mongabay"/>';
		if(!empty($thumbnail_src[0])) {
			echo '<meta name="twitter:image" content="' . esc_url($thumbnail_src[0] ) . '"/>'."\n";
		}
		echo '<meta name="twitter:creator" content="@mongabay"/>'."\n";
		
		$coords = get_post_meta( get_the_ID(), 'coordinates', true );
		if (!empty($coords['lat']) && !empty($coords['lng'])) {
			$coords['lat'] = intval($coords['lat']);
			$coords['lng'] = intval($coords['lng']);
			
			echo '<meta name="ICBM" content="'.$coords['lat'].', '.$coords['lng'].'" />'."\n";
			echo '<meta name="geo.position" content="'.$coords['lat'].';'.$coords['lng'].'" />'."\n";
			
			echo '<meta property="latitude" content="'.$coords['lat'].'" />'."\n";
			echo '<meta property="longitude" content="'.$coords['lat'].'" />'."\n";
			
		}
	}
	
	else {
		echo "\n".'<meta name="description" content="'.__('Mongabay seeks to raise interest in and appreciation of wild lands and wildlife, while examining the impact of emerging trends in climate, technology, economics,and finance on conservation and development.','mongabay').'" />'."\n";
		echo '<meta name="Tags" content="Mongabay, Mongabay Environmental News, Environmental News, Conservation News" />'."\n";
		echo '<meta property="keywords" content="Mongabay, Mongabay Environmental News, Environmental News, Conservation News" />'."\n";
		echo '<meta name="robots" content="index, follow" />'."\n";
		echo '<link rel="publisher" href="https://plus.google.com/+Mongabay/" />'."\n";
		echo '<meta property="article:publisher" content="https://www.facebook.com/mongabay/"/>'."\n";
	}
		
}

