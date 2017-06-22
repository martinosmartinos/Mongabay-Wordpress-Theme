<?php get_header(); ?>

	<main role="main">
		<!-- featured slider -->
		<div class="row featured-slider no-gutters">
	        <div class="col-lg-8" style="background: url(build/img/cheetah.jpg);background-size: cover">
	          <div class="slider-headline responsive-title" style="font-size: 32px;">Cheetahs return to Malawi after decades</div>
	        </div>
	        <div class="clearfix"></div>
	        <div class="col hidden-md-down">
	          <div class="col-lg-12 half-height" style="background: url(build/img/fishing.jpg);background-size: cover; border-left: 5px solid white; border-bottom: 5px solid white;">
	            <div class="slider-headline small responsive-title" style="font-size: 30.6953px;">Amid life and death risks, Brazil’s land defenders stand firm</div>
	          </div>
	          <div class="clearfix"></div>
	          <div class="col-lg-6 half-height" style="background: url(build/img/shark.jpg);background-size: cover; border-left: 5px solid white; position: absolute; left: 0; top: 50%">
	            <div class="slider-headline small responsive-title" style="font-size: 16px;">Singapore is world’s second largest shark-fin trader: TRAFFIC</div>
	          </div>
	          <div class="clearfix"></div>
	          <div class="col-lg-6 half-height small" style="background: url(build/img/snake.jpg);background-size: cover; border-left: 5px solid white; position: absolute; right: 0; top: 50%">
	            <div class="slider-headline small responsive-title" style="font-size: 16px;">Rugged innovation: Meeting the challenges of bringing high tech DNA analysis to the field</div>
	          </div>
	          <div class="clearfix"></div>
	        </div>
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
      	<div id="special-series">
      		<?php get_template_part( section, series ); ?>
    	</div>
	</main>
</div>
<!-- /container -->
<?php get_footer(); ?>
