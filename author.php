<?php get_header(); ?>

	<main role="main">

		<div class="row">
	    	<div id="main" class="col-lg-8">
	    		<div class="tag-line">
				

						<h1><?php _e( 'Articles by ', 'mongabay' ); echo get_the_author(); ?></h1>

						<?php echo wpautop( get_the_author_meta('description') ); ?>
	    		</div>
				<!-- section -->
				<section>
					<div class="post-wrapper-news">
						

						<?php if (have_posts()): while (have_posts()) : the_post(); ?>

							<!-- article -->
							<article id="post-<?php the_ID(); ?>" class="post-news">
								<?php if ( has_post_thumbnail()) : ?>
									<div class="hidden-md-up">
									<?php echo get_the_post_thumbnail($post_id, 'medium')?>
									</div>
								<?php endif; ?>
					      		<h2 class="post-title-news"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					      		<div class="entry-meta-news">
					      			<?php _e('by ', 'mongabay'); ?><?php echo get_the_term_list( $post_id, 'byline', '', ', ' ); ?> <?php the_time('j F Y'); ?>
					      		</div>
								<div class="excerpt-news">
					      			<?php mongabay_excerpt('mongabay_index'); ?>
					      		</div>
					      		<?php if ( has_post_thumbnail()) : ?>
									<div class="thumbnail-news hidden-md-down">
									<?php echo get_the_post_thumbnail($post_id, 'thumbnail')?>
									</div>
								<?php endif; ?>
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
					<div class="counter">
						<?php mongabay_pagination(); ?>
					</div>
				</section>
				<!-- /section -->
			</div>
			<?php
                if(!wp_is_mobile()) {
                    get_sidebar();
                }
            ?>
		</div>
		<?php get_template_part( section, series ); ?>
	</main>
</div>
<!-- /container -->
<?php get_footer(); ?>