<?php get_header(); ?>
	<main role="main">
		<div class="row">
	    	<div id="main" class="col-lg-8">
	    		<div class="tag-line">
					<h1><?php _e( 'Articles by ', 'mongabay' ); echo get_the_author(); ?></h1>
					<?php echo wpautop( get_the_author_meta('description') ); ?>
	    		</div>
				<section>
					<div class="post-wrapper-news">
						<?php get_template_part('loop'); ?>
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