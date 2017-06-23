<?php
    $args = array(
    	'posts_per_page' => '4',
        'meta_query' => array(
           'key' => 'featured_as',
           'value' => 'featured',
           'compare' => '='
	       )
	   );
    $query = new WP_Query( $args );
     
    if ($query->have_posts()) {
        	$i = 0;
            while ( $query->have_posts() ) : $query->the_post(); $i = $i + 1; ?>

            <?php 
            	switch ($i) {
            		case 1:
            			$slideclass = 'col-lg-8';
            			break;
            		case 2:
            			$slideclass = 'col-lg-4 half-height';
            			break;
            		case 3:
            			$slideclass = 'col-lg-2 half-height';
            			break;
            		case 4:
            			$slideclass = 'col-lg-2 half-height';
            			break;

            	}
            ?>
            <div id="post-<?php the_ID(); ?>" class="<?php echo $slideclass; ?>" style="background: url(<?php the_post_thumbnail_url( 'medium' ); ?>);background-size: cover;">
                <a href="<?php the_permalink(); ?>"><div class="slider-headline responsive-title"><?php the_title(); ?></div></a>
            </div>
            <?php endwhile;
    }
    wp_reset_postdata();

?>