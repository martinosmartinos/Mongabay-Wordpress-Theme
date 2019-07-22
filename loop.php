<?php
	//if(get_current_blog_id() == 1) switch_to_blog(20);
	if (have_posts()): while (have_posts()) : the_post();
	$post_id = get_the_ID();
	$subdomain = mongabay_subdomain_name();
?>

<article id="post-<?php the_ID(); ?>" class="post-news">
	<?php if ( has_post_thumbnail()) : ?>
		<div class="hidden-md-up">
		<?php echo get_the_post_thumbnail($post_id, 'medium')?>
		</div>
	<?php endif; ?>
		<h2 class="post-title-news">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
		<div class="entry-meta-news">
			<?php
				switch ($subdomain) {
					// case 'www':
					// 	echo '';
					// 	break;

					// case 'wildtech':
					// 	echo '';
					// 	break;
					



					default:
						_e('by ', 'mongabay');
						echo get_the_term_list( $post_id, 'byline', '', ', ', '' );
						echo ' ';
						break;
				}
				the_time('j F Y');
			?>
		</div>
		<div class="excerpt-news">
			<?php
				mongabay_excerpt();
			?>
		</div>
		<?php if ( has_post_thumbnail()) : ?>
		<div class="thumbnail-news hidden-xs-down">
		<?php echo get_the_post_thumbnail($post_id, 'thumbnail')?>
		</div>
	<?php endif; ?>

</article>
<?php endwhile; ?>
<?php else: ?>

<article>
	<h2><?php _e( 'Sorry, nothing to display.', 'mongabay' ); ?></h2>
</article>
<?php endif;?>
