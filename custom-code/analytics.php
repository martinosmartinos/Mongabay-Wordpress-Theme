<?php
// Google Analytics integration

add_action('wp_head','mongabay_google_analytics');
function mongabay_google_analytics() {
	
	$lines = array();
		
	if(is_single()) {
		$args = array('orderby' => 'count', 'order' => 'DESC');
		$topics = wp_get_object_terms(get_the_ID(), 'topic' , $args);
		$locations = wp_get_object_terms(get_the_ID(), 'location' , $args);
		$bylines =  wp_get_object_terms(get_the_ID(), 'byline' , $args);
		$serials =  wp_get_object_terms(get_the_ID(), 'serial' , $args);
		$licenses =  wp_get_object_terms(get_the_ID(), 'license' , $args);
		$editor = get_the_author();
		
		foreach ($topics as $topic) $topics_f[]= $topic -> slug;
		foreach ($locations as $location) $locations_f[]= $location -> slug;
		foreach ($bylines as $byline) $bylines_f[]= $byline -> slug;
		foreach ($serials as $serial) $serials_f[]= $serial -> slug;
		foreach ($licenses as $license) $licenses_f[]= $license -> slug;

		
		if (isset($topics_f)) $lines[] = "'dimension1': '".implode(' ',$topics_f)." ', ";
		if (isset($locations_f)) $lines[] = "'dimension2': '".implode(' ',$locations_f)." ', ";
		if (isset($bylines_f)) $lines[] = "'dimension3': '".implode(' ',$bylines_f)." ', ";
		if (isset($serials_f)) $lines[] = "'dimension4': '".implode(' ',$serials_f)." ', ";
		if (isset($licenses_f)) $lines[] = "'dimension5': '".implode(' ',$licenses_f)." ', ";
		if (isset($editor)) $lines[] = "'dimension7': '".$editor." '";
	}

	?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-12973256-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-12973256-1', {
			<?php echo implode("\n",$lines); ?>
		});
	</script>
	<?php
}
