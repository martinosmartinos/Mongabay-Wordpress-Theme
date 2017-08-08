<?php get_header(); ?>

	<main role="main">
		<?php
			$section = get_query_var('section');
			$firstvar = get_query_var('nc1');
			$secondvar = get_query_var('nc2');

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
		?>
		<!-- featured slider -->
		<div class="row featured-slider no-gutters">
			<?php get_template_part( 'partials/section', 'slider' ); ?>
	    </div>
	    <!-- featured slider end -->
		<div class="row">
	      	<div id="main" class="col-lg-8">
				<div class="tag-line">
					<h1><?php echo $title; ?><?php _e( $line_end, 'mongabay');?></h1>
					<p><?php echo $description; ?></p>
				</div>
	          	<!-- section -->
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
		<?php get_template_part( 'partials/section', 'series' ); ?>
	</main>
</div>
<!-- /container -->
<?php get_footer(); ?>