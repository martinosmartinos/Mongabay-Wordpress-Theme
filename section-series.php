<h2><?php _e( 'Special series', 'mongabay' ); ?></h2>

<!-- first row of series -->
<div class="row">
    <div class="col-lg-3">
        <h4><?php _e( 'Endangered environmentalists', 'mongabay' ); ?></h4>
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => '3',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'serial',
                        'field'    => 'slug',
                        'terms'    => 'endangered-environmentalists',
                    ),
                ),
            );
            $query = new WP_Query( $args );
             
            if ($query->have_posts()) {
                echo '<ul>';
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile;
                    echo '</ul>';
            }
            wp_reset_postdata();

        ?>
        <div class="thumbnail-series">
          <img src="build/img/giraffes.jpg">
        </div>
        <div class="more-special">
          <a href="">More articles</a>
        </div>
    </div>

    <div class="col-lg-3">
        <h4><?php _e( 'Global forest reporting network', 'mongabay' ); ?></h4>
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => '3',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'serial',
                        'field'    => 'slug',
                        'terms'    => 'global-forest-reporting-network',
                    ),
                ),
            );
            $query = new WP_Query( $args );
             
            if ($query->have_posts()) {
                echo '<ul>';
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile;
                    echo '</ul>';
            }
            wp_reset_postdata();

        ?>
        <div class="thumbnail-series">
          <img src="build/img/giraffes.jpg">
        </div>
        <div class="more-special">
          <a href="">More articles</a>
        </div>
    </div>

    <div class="col-lg-3">
        <h4><?php _e( 'Almost famous animals', 'mongabay' ); ?></h4>
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => '3',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'serial',
                        'field'    => 'slug',
                        'terms'    => 'almost-famous-animals',
                    ),
                ),
            );
            $query = new WP_Query( $args );
             
            if ($query->have_posts()) {
                echo '<ul>';
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile;
                    echo '</ul>';
            }
            wp_reset_postdata();

        ?>
        <div class="thumbnail-series">
          <img src="build/img/giraffes.jpg">
        </div>
        <div class="more-special">
          <a href="">More articles</a>
        </div>
    </div>

    <div class="col-lg-3">
        <h4><?php _e( 'Haze beat', 'mongabay' ); ?></h4>
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => '3',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'serial',
                        'field'    => 'slug',
                        'terms'    => 'haze',
                    ),
                ),
            );
            $query = new WP_Query( $args );
             
            if ($query->have_posts()) {
                echo '<ul>';
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile;
                    echo '</ul>';
            }
            wp_reset_postdata();

        ?>
        <div class="thumbnail-series">
          <img src="build/img/giraffes.jpg">
        </div>
        <div class="more-special">
          <a href="">More articles</a>
        </div>
    </div>

</div>

<div class="spacer clearfix"></div>

<!-- second row of series -->
<div class="row">
    <div class="col-lg-3">
        <h4><?php _e( 'Amazon infrastructure', 'mongabay' ); ?></h4>
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => '3',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'serial',
                        'field'    => 'slug',
                        'terms'    => 'amazon-infrastructure',
                    ),
                ),
            );
            $query = new WP_Query( $args );
             
            if ($query->have_posts()) {
                echo '<ul>';
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile;
                    echo '</ul>';
            }
            wp_reset_postdata();

        ?>
        <div class="thumbnail-series">
          <img src="build/img/giraffes.jpg">
        </div>
        <div class="more-special">
          <a href="">More articles</a>
        </div>
    </div>

    <div class="col-lg-3">
        <h4><?php _e( 'Great apes', 'mongabay' ); ?></h4>
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => '3',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'serial',
                        'field'    => 'slug',
                        'terms'    => 'great-apes',
                    ),
                ),
            );
            $query = new WP_Query( $args );
             
            if ($query->have_posts()) {
                echo '<ul>';
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile;
                    echo '</ul>';
            }
            wp_reset_postdata();

        ?>
        <div class="thumbnail-series">
          <img src="build/img/giraffes.jpg">
        </div>
        <div class="more-special">
          <a href="">More articles</a>
        </div>
    </div>

    <div class="col-lg-3">
        <h4><?php _e( 'Latin american wildlife trade', 'mongabay' ); ?></h4>
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => '3',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'serial',
                        'field'    => 'slug',
                        'terms'    => 'latin-american-wildlife-trade',
                    ),
                ),
            );
            $query = new WP_Query( $args );
             
            if ($query->have_posts()) {
                echo '<ul>';
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile;
                    echo '</ul>';
            }
            wp_reset_postdata();

        ?>
        <div class="thumbnail-series">
          <img src="build/img/giraffes.jpg">
        </div>
        <div class="more-special">
          <a href="">More articles</a>
        </div>
    </div>

    <div class="col-lg-3">
        <h4><?php _e( 'Conservation and religion', 'mongabay' ); ?></h4>
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => '3',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'serial',
                        'field'    => 'slug',
                        'terms'    => 'conservation-and-religion',
                    ),
                ),
            );
            $query = new WP_Query( $args );
             
            if ($query->have_posts()) {
                echo '<ul>';
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile;
                    echo '</ul>';
            }
            wp_reset_postdata();

        ?>
        <div class="thumbnail-series">
          <img src="build/img/giraffes.jpg">
        </div>
        <div class="more-special">
          <a href="">More articles</a>
        </div>
    </div>

</div>