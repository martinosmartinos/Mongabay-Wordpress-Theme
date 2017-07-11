<div id="special-series">

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
              <img src="<?php echo get_template_directory_uri(); ?>/img/endangered-environmentalists.jpg">
            </div>
            <div class="more-special">
              <a href="<?php echo home_url( '/', null ); ?>serial/endangered-environmentalists/">More articles</a>
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
              <img src="<?php echo get_template_directory_uri(); ?>/img/global-forest-reporting-network.jpg">
            </div>
            <div class="more-special">
              <a href="<?php echo home_url( '/', null ); ?>serial/global-forest-reporting-network/">More articles</a>
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
              <img src="<?php echo get_template_directory_uri(); ?>/img/almost-famous-animals.jpg">
            </div>
            <div class="more-special">
              <a href="<?php echo home_url( '/', null ); ?>serial/almost-famous-animals/">More articles</a>
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
              <img src="<?php echo get_template_directory_uri(); ?>/img/latam-wildlife-trade.jpg">
            </div>
            <div class="more-special">
              <a href="<?php echo home_url( '/', null ); ?>serial/latin-american-wildlife-trade/">More articles</a>
            </div>
        </div>

    </div>
    <!-- /first row of series -->

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
              <img src="<?php echo get_template_directory_uri(); ?>/img/amazon-infrastructure.jpg">
            </div>
            <div class="more-special">
              <a href="<?php echo home_url( '/', null ); ?>serial/amazon-infrastructure/">More articles</a>
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
              <img src="<?php echo get_template_directory_uri(); ?>/img/great-apes.jpg">
            </div>
            <div class="more-special">
              <a href="<?php echo home_url( '/', null ); ?>serial/great-apes/">More articles</a>
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
              <img src="<?php echo get_template_directory_uri(); ?>/img/latam-wildlife-trade.jpg">
            </div>
            <div class="more-special">
              <a href="<?php echo home_url( '/', null ); ?>serial/latin-american-wildlife-trade/">More articles</a>
            </div>
        </div>

        <div class="col-lg-3">
            <h4><?php _e( 'Indonesian fisheries', 'mongabay' ); ?></h4>
            <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => '3',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'serial',
                            'field'    => 'slug',
                            'terms'    => 'indonesian-fisheries',
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
              <img src="<?php echo get_template_directory_uri(); ?>/img/indonesian-fisheries.jpg">
            </div>
            <div class="more-special">
              <a href="<?php echo home_url( '/', null ); ?>serial/indonesian-fisheries/">More articles</a>
            </div>
        </div>

    </div>
    <!-- /second row of series -->
</div>