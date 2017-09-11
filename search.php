<?php get_header(); ?>
	<main role="main">
        <div class="row">
            <div id="main" class="col-lg-8">
                <div class="tag-line">
                    <h1><?php echo sprintf( __( '%s Search Results for ', 'mongabay' ), $wp_query->found_posts ); echo '"'.get_search_query().'"'; ?></h1>
                    <?php
                        function get_tax_by_search($search_text) {

                            $args = array(
                                'taxonomy'      => array( 'topic' ),
                                'orderby'       => 'id', 
                                'order'         => 'ASC',
                                'hide_empty'    => true,
                                'fields'        => 'all',
                                'name__like'    => $search_text
                            ); 

                            $terms = get_terms( $args );
                            $count = count( $terms );
                            if($count > 0) {
                                _e ( 'Related topic pages:', 'mongabay' );
                                echo '&nbsp;';
                                foreach ($terms as $term) {
                                    echo "<a href='".get_term_link( $term )."'>".$term->name."</a>";
                                    if (next( $terms )) {
                                        echo ', ';
                                    }
                                }
                            }

                        }
                        get_tax_by_search( get_search_query() );
                    ?>
                </div>
                <section>

                    <div id="post-wrapper-news" class="row" data-columns>
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
<?php get_footer(); ?>