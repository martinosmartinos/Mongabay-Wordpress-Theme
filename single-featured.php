<?php get_header( 'featured' ); ?>
    <?php
        $post_id = get_the_ID();
        $tagline = get_post_meta($post_id,"mog_tagline",true);
        $translator = get_post_meta($post_id,"translated_by",true);
        $adaptor = get_post_meta($post_id,"adapted_by",true);
        $translated_adapted = get_post_meta($post_id,"translated_adapted",true);
        $commentary = get_post_meta($post_id,"commentary",true);
        $analysis = get_post_meta($post_id,"analysis_by",true);
        $topics = wp_get_post_terms($post_id, 'topic');
        $serial = wp_get_post_terms($post_id, 'serial');
    ?>
    <!-- post thumbnail -->
    <?php if ( has_post_thumbnail()) : ?>
    <div class="row no-gutters">
        <div class="col-lg-12 parallax-section full-height article-cover" data-parallax="scroll" data-image-src="<?php echo get_the_post_thumbnail_url($post_id, 'large')?>">
            <div class="featured-article-meta">
                <h1 class="title"><?php the_title(); ?></h1>
                <span class="subtitle">
                    <?php echo $tagline; ?>
                </span>
                <span class="featured-article-publish">
                    <?php if($commentary == '1' || $commentary == 'yes') _e('Commentary ', 'mongabay'); if($analysis == '1' || $analysis == 'yes') _e('Analysis ', 'mongabay'); _e('by ', 'mongabay'); ?><?php echo get_the_term_list( $post_id, 'byline', '', ', ', '' ); ?><?php _e(' on ', 'mongabay'); ?><?php the_time('j F Y'); ?>
                    <?php
                        if (!empty($translator)) {

                                if ($translated_adapted == 'adapted' && !empty($adaptor)) {
                                    $string_title = 'Adapted by';
                                    $translator_adaptor = $adaptor;
                                }
                                elseif (!empty($translator)) {
                                    $string_title = 'Translated by';
                                    $translator_adaptor = $translator;
                                }
                                echo '| ';
                                _e( $string_title ,'mongabay');
                                echo ' ';
                                echo '<a href="'.home_url( '/' ).'by/'.$translator_adaptor[slug].'">'.$translator_adaptor[name].'</a>';
                        }
                    ?>
                </span>
                <?php
                    if ($serial) {
                        echo '<p>';
                        _e('Mongabay Series: ', 'mongabay');
                        echo get_the_term_list( $post_id, 'serial', '', ', ', '' );
                        echo '</p>';
                    }
                ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php endif; ?>
    <!-- /post thumbnail -->

    <main role="main">
        <div class="container">
            <div class="row justify-content-center">
                <div id="main" class="col-lg-8 single">
                    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                    <!-- article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php
                            $mog_count = 0;
                            for ($n=0;$n < 4;$n++){
                                $single_bullet=get_post_meta($post_id,"mog_bullet_".$n."_mog_bulletpoint",true);
                                if(!empty($single_bullet)) {
                                    $mog_count=$mog_count+1;
                                }
                            }
                            if((int)$mog_count > 0 && get_post_meta($post_id,"mog_bullet_0_mog_bulletpoint",true)){
                                echo '<div class="bulletpoints"><ul>';
                                for($i=0;$i<$mog_count;$i++){
                                    
                                    echo "<li><em>".get_post_meta($post_id,"mog_bullet_".$i."_mog_bulletpoint",true)."</em></li>";                   
                                }
                                echo "</ul></div>"; 
                            } 
                        ?>
                        <?php mongabay_sanitized_content($post_id);?>
                        <div id="single-article-footer">
                            <div id="single-article-meta">
                                <span><?php _e( 'Article published by ', 'mongabay' ); the_author(); ?></span>
                                <span class="article-comments"><a href=""></a></span>
                            </div>
                            <div id="single-article-tags">
                                <?php echo get_the_term_list( $post_id, 'topic', '', ', ' ); ?>
                            </div>
                        </div>
                    </article>
                    <!-- /article -->
                    <?php endwhile; ?>
                    <?php else: ?>
                    <!-- article -->
                    <article>
                        <h1><?php _e( 'Sorry, nothing to display.', 'mongabay' ); ?></h1>
                    </article>
                    <!-- /article -->
                    <?php endif; ?>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
        <?php get_template_part( 'partials/section', 'series' ); ?>
    </main>
<?php get_footer(); ?>
