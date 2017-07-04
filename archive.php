<?php get_header(); ?>
	<main role="main">
		<div class="row">
            <div id="main" class="col-lg-8">
				<h1><?php _e( 'Archives', 'mongabay' ); ?></h1>
				<?php get_template_part('loop'); ?>
				<?php get_template_part('pagination'); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</main>
</div>
<!-- /container -->
<?php get_footer(); ?>