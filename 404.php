<?php get_header(); ?>
	<main role="main">
		<div class="row">
	      	<div id="main" class="col-lg-8">
				<section>
					<article id="post-404">
						<h1><?php _e( 'Page not found', 'mongabay' ); ?></h1>
						<h2>
							<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'mongabay' ); ?></a>
						</h2>
					</article>
				</section>
			</div>
			<?php
	            if(!wp_is_mobile()) {
	                get_sidebar();
	            }
	        ?>
		</div>
		<?php get_template_part( 'partials/section', 'series' ); ?>
	</main>
</div>
<?php get_footer(); ?>
