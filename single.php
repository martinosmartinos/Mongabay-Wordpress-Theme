<?php get_header(); ?>

	<main role="main">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div id="headline">
		        <div class="article-headline">
		          <p>Mongabay Series: <a href="">Global Forests, Amazon Infrastructure</a></p>
		          <h1><?php the_title(); ?></h1>
		        </div>
		        <div class="single-article-meta">
		          by Sue Branford and Maurício Torreson <?php the_time('F j Y'); ?>
		          <div class="social">
		            <a class="facebook" href=""></a>
		            <a class="google" href=""></a>
		            <a class="twitter" href=""></a>
		            <a class="sharethis" href=""></a>
		          </div>
		        </div>
			</div>
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
			<div class="row article-cover-image no-gutters">
		        <div class="col-lg-12" style="background: url('<?php get_the_post_thumbnail_url('large')?>';background-size: cover">
		        </div>
		        <div class="clearfix"></div>
			<?php endif; ?><!-- /post thumbnail -->
		    </div>
		    <div class="row">
		      	<div id="main" class="col-lg-8 single">
		        	<div class="bulletpoints"></div>
		        	<?php the_content();?>
		        </div>
		    </div>
			<!-- post details -->
			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<span class="author"><?php _e( 'Published by', 'mongabay' ); ?> <?php the_author_posts_link(); ?></span>
			<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
			<!-- /post details -->


			<?php the_tags( __( 'Tags: ', 'mongabay' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

			<p><?php _e( 'Categorised in: ', 'mongabay' ); the_category(', '); // Separated by commas ?></p>

			<p><?php _e( 'This post was written by ', 'mongabay' ); the_author(); ?></p>

			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>


		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
