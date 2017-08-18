<?php get_header(); ?>
	<main role="main">
		<div class="row">
	        <div id="main" class="col-lg-8 single">
	            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
	                <!-- article -->
	                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	                	<h1><?php the_title(); ?></h1>
	                    <?php mongabay_sanitized_content($post_id);?>
	                </article>
	                <!-- /article -->
	            <?php endwhile; ?>
	        <?php else: ?>
	            <!-- article -->
	            <article>
	                <h1><?php _e( 'Sorry, nothing to display.', 'mongabay' ); ?></h1>
	            </article>
	            <!-- /article -->
	        <?php endif; ?>
	    	</div>
		    <?php
			    if(!wp_is_mobile()) {
			    	global $post;
			    	if(($post->post_parent=='186085') || is_page('statistics')) {
						echo '<aside class="sidebar col-lg-4" role="complementary"><div class="sidebar-widget">';
						dynamic_sidebar('stats-widget');
						echo '</div></aside>';
			    	}
			        else {
			        	get_sidebar();
			        }
			    }
		    ?>
		</div>
		<?php get_template_part( section, series ); ?>
	</main>
</div>
<!-- /container -->
<?php get_footer(); ?>