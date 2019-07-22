<?php get_header();
    $queried_object = get_queried_object();
    $term_id = $queried_object -> term_id;
    $avatar = get_term_meta($term_id,'cover_image_url',true);
    $title = $queried_object -> name;
    $description = $queried_object -> description;
    $tax = $queried_object -> taxonomy;
?>
    <main role="main">
        <?php
            
            $line_start = '';
            $line_end = '';
            if ($tax == 'byline') {
                $line_start = 'Articles by';
            }
            if ($tax == 'serial') {
                $line_start = 'Mongabay series: ';
            }
            if ($tax == 'topic' || $tax == 'location') {
                $line_end = ' News';
            }
            
        ?>
        <div class="row">
            <div id="main" class="col-lg-8">
                <div class="tag-line">
                    <h1><?php _e( $line_start, 'mongabay');?> <?php echo $title; ?><?php _e( $line_end, 'mongabay');?></h1>
                    <p><?php if($avatar) echo '<img src="'.$avatar.'" style="width: 150px;float: left;margin: 7px 15px 15px 0;"/>';?><?php echo $description; ?></p>
                </div>
                <!-- section -->
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
        <!-- /row -->
        <?php get_template_part( 'partials/section', 'series' ); ?>
    </main>
</div>
<!-- /container -->
<?php get_footer(); ?>
