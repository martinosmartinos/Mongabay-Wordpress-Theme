<?php get_header(); ?>

    <main role="main">

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <?php
            $post_id = get_the_ID();
            $featured = get_post_meta($post_id,"featured_as");
            $translator = get_post_meta($post_id,"translated_by",true);
            $adaptor = get_post_meta($post_id,"adapted_by",true);
            $translated_adapted = get_post_meta($post_id,"translated_adapted",true);
            $topics = wp_get_post_terms($post_id, 'topic');
            $serial = wp_get_post_terms($post_id, 'serial');
            //var_dump($serial);
        ?>
        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div id="headline">
                <div class="article-headline">
                    <?php
                        if ($serial) {
                            echo '<p>'.get_the_term_list( $post_id, 'serial', __('Mongabay Series: ', 'mongabay'), ', ' ).'</p>';
                        }
                    ?>
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="single-article-meta">
                  by <?php echo get_the_term_list( $post_id, 'byline', '', ', ' ); ?> on <?php the_time('j F Y'); ?>
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
                <div class="col-lg-12" style="background: url('<?php echo get_the_post_thumbnail_url($post_id, 'large')?>');background-size: cover">
                </div>
                <div class="clearfix"></div>
            <?php endif; ?><!-- /post thumbnail -->
            </div>
            <div class="row">
                <div id="main" class="col-lg-8 single">
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
                        <?php the_content();?>
                    <div id="single-article-footer">
                        <div id="single-article-meta">
                            <span><?php _e( 'Article published by ', 'mongabay' ); the_author(); ?></span>
                            <span class="article-comments"><a href="">11 comments</a></span>
                        </div>
                        <div id="single-article-tags">
                            <?php echo get_the_term_list( $post_id, 'topic', '', ', ' ); ?>
                        </div>
                    </div>
                </div>
                <?php get_sidebar(); ?>
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
    </main>
<?php get_footer(); ?>