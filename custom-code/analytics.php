<?php
// Google Analytics integration

add_action('wp_head','mongabay_google_analytics');
function mongabay_google_analytics() {
	
	$lines = array();
	//ga('create', 'UA-65671366-1', 'auto');
	
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

		
		if (isset($topics_f)) $lines[] = "ga('set', 'dimension1', '".implode(' ',$topics_f)." '); ";
		if (isset($locations_f)) $lines[] = "ga('set', 'dimension2', '".implode(' ',$locations_f)." '); ";
		if (isset($bylines_f)) $lines[] = "ga('set', 'dimension3', '".implode(' ',$bylines_f)." '); ";
		if (isset($serials_f)) $lines[] = "ga('set', 'dimension4', '".implode(' ',$serials_f)." '); ";
		if (isset($licenses_f)) $lines[] = "ga('set', 'dimension5', '".implode(' ',$licenses_f)." '); ";
		if (isset($editor)) $lines[] = "ga('set', 'dimension7', '".$editor." '); ";
	}

	?>
    <!-- Google Analytics -->
	<script>
  		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  		ga('create', 'UA-12973256-1', 'auto');
		<?php echo implode("\n",$lines); ?>
  		ga('send', 'pageview');
	</script>
    <!-- End Google Analytics -->
	<?php 
}
