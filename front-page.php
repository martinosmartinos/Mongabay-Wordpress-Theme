<?php get_header(); ?>
	<?php
		$queried_object = get_queried_object();
		$section = get_query_var('section');
		$firstvar = get_query_var('nc1');
		$secondvar = get_query_var('nc2');

		if($section == 'moved') {
			$post = $wp_query -> posts[0];
            $id = $post -> ID;
            $permalink = get_permalink($id);
            wp_redirect( $permalink, 301 ); 
            exit;
		}


		$line_end = '';
		if ($section == 'list' && !empty($firstvar) && empty($secondvar)) {
			
			$item1 = get_terms(array('topic','location'), array('slug' => $firstvar));
			$title = $item1[0] -> name;
			//$description = $item1[0] -> description;
			$line_end = ' News';
		}

		if ($section == 'list' && !empty($firstvar) && !empty($secondvar)) {
			$item1 = get_terms(array('topic','location'), array('slug' => $firstvar));
			$item2 = get_terms(array('topic','location'), array('slug' => $secondvar));
			$title1 = $item1[0] -> name;
			$title2 = $item2[0] -> name;
			$title = $title1.' and '.$title2;
			$line_end = ' News';
		}

		if (empty($section)) {
			$title = 'Environmental headlines';
			$description = 'Mongabay is a non-profit provider of conservation and environmental science news.';
		}
	?>
	<main role="main">
        <?php
        	if(empty($section)) {
        ?>
        <div class="row featured-slider no-gutters">
            <?php get_template_part( 'partials/section', 'slider' ); ?>
        </div>
        <?php
        	}
        ?>
        <div class="row">
            <div id="main" class="col-lg-8">
                <div class="tag-line">
                	<h1><?php echo _e($title, 'mongabay'); ?><?php _e( $line_end, 'mongabay');?></h1>
					<p><?php echo _e($description, 'mongabay'); ?></p>
				</div>
                <!-- section -->
                <section>

                    <div id="post-wrapper-news" class="row" data-columns>
                    	<?php
                    	
                    		$site_id = get_current_blog_id();
                    		$switched = FALSE;
                    		switch ($site_id) {
                    			case '1':
                    				switch_to_blog(20);
                    				$switched = TRUE;
                    				break;

                    			case '20':
                    				$switched = FALSE;
                    				break;
                    			
                    		}

                    	?>
						<?php get_template_part('loop'); ?>
						<?php
                    		if($switched = TRUE) {
                    			restore_current_blog();
                    		}
                    	?>
                    </div>

                    <div class="counter">
                        <?php mongabay_pagination(); ?>
                    </div>

                </section>
            </div>
            <?php
                if(!wp_is_mobile()) {
                    get_sidebar();
                }
            ?>
        </div>
        <!-- /row -->
        <?php get_template_part( 'partials/section', 'series' ); ?>
    </main>
</div>
<!-- /container -->
<?php get_footer(); ?>