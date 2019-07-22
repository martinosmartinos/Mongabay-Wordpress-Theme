<?php get_header(); ?>

<main role="main">
    <?php
        $post_id = get_the_ID();
        $translator = get_post_meta($post_id,"translated_by",true);
        $adaptor = get_post_meta($post_id,"adapted_by",true);
        $translated_adapted = get_post_meta($post_id,"translated_adapted",true);
        $commentary = get_post_meta($post_id,"commentary",true);
        $analysis = get_post_meta($post_id,"analysis_by",true);
        $topics = wp_get_post_terms($post_id, 'topic');
        $serial = wp_get_post_terms($post_id, 'serial');
        $legacy = get_post_meta($post_id, 'mongabay_post_legacy_status',true);
        $img_url = wp_get_attachment_url( get_post_thumbnail_id() );
    ?>

    <div id="headline">
        <div class="article-headline">
            <?php
            if ($serial) {
                echo '<p>';
                _e('Mongabay Series: ', 'mongabay');
                echo get_the_term_list( $post_id, 'serial', '', ', ', '' );
                echo '</p>';
            }
            ?>
            <h1><?php the_title(); ?></h1>
            <?php
            if(mongabay_wp_is_mobile()) {
                echo '<div class="social">';
                get_template_part( 'partials/section', 'social' );
                echo '</div>';
            }
            ?>
        </div>
        <div class="single-article-meta">
            <?php if($commentary == '1' || $commentary == 'yes') _e('Commentary ', 'mongabay'); if($analysis == '1' || $analysis == 'yes') _e('Analysis ', 'mongabay'); _e('by ', 'mongabay'); ?><?php echo get_the_term_list( $post_id, 'byline', '', ', ', '' ); ?><?php _e(' on ', 'mongabay'); ?><?php the_time('j F Y'); ?>
            <?php
                if ($translated_adapted == 'adapted' || $translated_adapted == 'translated') {

                        if ($translated_adapted == 'adapted' && !empty($adaptor)) {
                            $string_title = 'Adapted by';
                            $translator_adaptor = $adaptor;
                        }
                        elseif ($translated_adapted == 'translated' && !empty($translator)) {
                            $string_title = 'Translated by';
                            $translator_adaptor = $translator;
                        }
                        echo '| ';
                        _e( $string_title ,'mongabay');
                        echo ' ';
                        echo '<a href="'.home_url( '/' ).'by/'.$translator_adaptor[slug].'">'.$translator_adaptor[name].'</a>';
                }
            ?>
            <?php
                if(!mongabay_wp_is_mobile()) {
                    echo '<div class="social">';
                    get_template_part( 'partials/section', 'social' );
                    echo '</div>';
                }
            ?>
        </div>
    </div>
    <?php if ( !empty($img_url) )  : ?>
        <div class="row article-cover-image no-gutters">
            <?php
                if(wp_is_mobile()) {
                    $coversize = 'medium';
                }
                else {
                    $coversize = 'large';
                }
            ?>
            <div class="col-lg-12" style="background: url('<?php echo get_the_post_thumbnail_url($post_id, $coversize)?>');background-size: cover; background-position: center"></div>
            
        </div>
    <?php endif; ?>

    <div class="row">
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
                            <span><?php _e( 'Article published by ', 'mongabay' ); ?><?php the_author_posts_link(); ?></span>
                            <span class="article-comments"><a href=""></a></span>
                        </div>
                        <div id="single-article-tags">
                            <?php echo get_the_term_list( $post_id, 'topic', '', ', ' ); ?>
                        </div>
                    </div>

                    <?php mongabay_comments(); ?>
                    
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
    <?php
        if(!wp_is_mobile()) {
            get_sidebar();
        }
        ?>
    </div>
    <!-- /row -->
    <?php get_template_part( 'partials/section', 'series' ); ?>
</main>
</div>
<!-- /container -->
<?php get_footer(); ?>
