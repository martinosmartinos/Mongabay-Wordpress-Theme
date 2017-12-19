<?php
    /* Template Name: Series */
    get_header();
?>
    <main role="main">
		<div class="row">
	        <div id="main" class="col-lg-8 single">
                <?php
                    $count = 0;
                    $site = mongabay_subdomain_name();
                    $posts_number = 6;

                    $serials_www = (array('','','','',''));
                    $serials_news = (array('endangered-environmentalists','global-forest-reporting-network','indonesian-coal','southeast-asian-infrastructure','amazon-infrastructure','asian-rhinos','indonesian-fisheries','global-environmental-impacts-of-u-s-policy','conservation-in-madagascar','conservation-effectiveness','global-agroforestry','global-forests','para-penjaga-hutan','almost-famous-animals'));
                    $serials_kidsnews = (array('','','','',''));
                    $serials_wildtech = (array('','','','',''));
                    $serials_cn = (array('','','','',''));
                    $serials_de = (array('','','','',''));
                    $serials_es = (array('','','','',''));
                    $serials_fr = (array('','','','',''));
                    $serials_it = (array('','','','',''));
                    $serials_jp = (array('','','','',''));
                    $serials_pt = (array('','','','',''));
                    $serials_india = (array('','','','',''));

                    $serials = ${'serials_'.$site};

                    if( get_current_blog_id() == 1 ) switch_to_blog(20);

                    foreach ($serials as $serial) {
                        $count = $count + 1;
                        $title = ucfirst(str_replace('-', ' ', $serial));

                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => $posts_number,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'serial',
                                    'field'    => 'slug',
                                    'terms'    => $serial,
                                    ),
                                ),
                        );

                        $query = new WP_Query( $args );

                        if ($query->have_posts()) { ?>
                            <section>
                                <div class="tag-line">
                                    <h2><?php echo $title; ?></h2>
                                    <?php
                                        $serial_term = get_term_by( 'slug', $serial, 'serial' );
                                        $serial_description = $serial_term->description;
                                        if ( !empty($serial_description) ) echo '<p>'.$serial_description.'</p>';
                                    ?>
                                </div>
                                <div id="post-wrapper-news" class="row" data-columns="2">
                                    <?php
                                        $counter = 0;
                                        while ( $query->have_posts() ) : $query->the_post();
                                        $counter = $counter + 1; ?>
                                        
                                            <article id="post-<?php the_ID(); ?>" class="post-news">
                                                <?php if ( has_post_thumbnail()) : ?>
                                                    <div class="hidden-md-up">
                                                    <?php echo get_the_post_thumbnail($post_id, 'medium')?>
                                                    </div>
                                                <?php endif; ?>
                                                <h2 class="post-title-news"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                <div class="entry-meta-news">
                                                    <?php
                                                        switch ($site) {
                                                            case 'www':
                                                                echo '';
                                                                break;

                                                            case 'wildtech':
                                                                echo '';
                                                                break;
                                                            
                                                            case 'kidsnews':
                                                                echo '';
                                                                break;

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
                                                    <?php mongabay_excerpt();?>
                                                </div>
                                                <?php if ( has_post_thumbnail()) : ?>
                                                <div class="thumbnail-news hidden-xs-down">
                                                    <?php echo get_the_post_thumbnail($post_id, 'thumbnail')?>
                                                </div>
                                                <?php endif; ?>
                                            </article>

                                    <?php endwhile; ?>
                                </diV>
                            </section>
                        
                        <?php }

                        if($count == $posts_number) {
                            wp_reset_postdata();
                        };

                    }
                ?>
	        </div>
            <?php
                if(!wp_is_mobile()) {
                        get_sidebar();
                }
            ?>
		</div> <!-- row -->
	</main><!-- main -->
</div><!-- /container -->
<?php get_footer(); ?>
