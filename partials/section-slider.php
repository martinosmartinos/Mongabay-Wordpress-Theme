<?php
    $postnumber = 4;
    if(wp_is_mobile()) $postnumber = 1;
    $args = array(
    	'posts_per_page' => $postnumber,
        'meta_query' => array(
            array(
               'key' => 'featured_as',
               'value' => 'featured',
               'compare' => '='
            )
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
            			$slideclass = 'col-lg-12 half-height';
            			break;
            		case 3:
            			$slideclass = 'col-lg-6 half-height';
            			break;
            		case 4:
            			$slideclass = 'col-lg-6 half-height';
            			break;
            	}
            ?>
            <?php if ($i == 1): ?>
            	<div class="<?php echo $slideclass; ?>" style="background: url(<?php the_post_thumbnail_url('medium'); ?>);background-size: cover; background-position: 50% 50%;">
                    <a href="<?php the_permalink(); ?>">
                        <div class="slider-headline responsive-title"><?php the_title(); ?></div>
                    </a>
                </div>
            <?php endif; ?>
            <?php if ($i == 2): ?>
                <div class="clearfix"></div>
                <div class="col hidden-md-down">
                    <div class="<?php echo $slideclass; ?>" style="background: url(<?php the_post_thumbnail_url('medium'); ?>);background-size: cover;border-left: 5px solid #fff;border-bottom: 5px solid #fff;background-position: 50% 50%;">
                        <a href="<?php the_permalink(); ?>">
                            <div class="slider-headline responsive-title"><?php the_title(); ?></div>
                        </a>
                    </div>
            <?php endif; ?>
            <?php if ($i == 3): ?>
                    <div class="<?php echo $slideclass; ?>" style="background: url(<?php the_post_thumbnail_url('medium'); ?>);background-size: cover;border-left: 5px solid white;position: absolute;left: 0;top: 50%;background-position: 50% 50%;">
                        <a href="<?php the_permalink(); ?>">
                            <div class="slider-headline responsive-title"><?php the_title(); ?></div>
                        </a>
                    </div>
            <?php endif; ?>
            <?php if ($i == 4): ?>
                    <div class="<?php echo $slideclass; ?>" style="background: url(<?php the_post_thumbnail_url('medium'); ?>);background-size: cover;position: absolute;right: 0;top: 50%;border-left: 5px solid #fff;background-position: 50% 50%;">
                        <a href="<?php the_permalink(); ?>">
                            <div class="slider-headline responsive-title"><?php the_title(); ?></div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            <?php endif; ?>
            <?php endwhile;
    }
    wp_reset_postdata();

?>