<?php get_header(); ?>
	<main role="main">
		<!-- featured slider -->
		<div class="row featured-slider no-gutters">
			<?php get_template_part( section, slider ); ?>
	    </div>
	    <!-- featured slider end -->
		<div class="row">
	      	<div id="main" class="col-lg-8">
				<div class="tag-line">
					<h1><?php _e( 'Environmental headlines', 'mongabay' ); ?></h1>
					<p><?php _e( 'Mongabay is a non-profit provider of conservation and environmental science news. We aim to inspire, educate, and inform.', 'mongabay' ); ?></p>
				</div>
	          <!-- section -->
				<section>

					<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			      		<div id="app"></div>
			      		<div id="pager"></div>
		      		</article>
					<!-- /article -->

					<?php endwhile; ?>

					<?php else: ?>

					<!-- article -->
					<article>

						<h2><?php _e( 'Sorry, nothing to display.', 'mongabay' ); ?></h2>

					</article>
					<!-- /article -->

					<?php endif; ?>

	        </div>
	        <?php get_sidebar(); ?>
	    </div>
      	
      	<?php get_template_part( section, series ); ?>

	</main>
</div>
<!-- /container -->
<?php get_footer(); ?>
