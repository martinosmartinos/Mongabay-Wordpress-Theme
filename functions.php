<?php

/*------------------------------------*\
    External Modules/Files
    \*------------------------------------*/
    include (get_template_directory().'/custom-code/url-rewrites.php');
    include (get_template_directory().'/custom-code/figure-caption.php');
    include (get_template_directory().'/custom-code/taxonomy-location.php');
    include (get_template_directory().'/custom-code/taxonomy-serial.php');
    include (get_template_directory().'/custom-code/taxonomy-topic.php');
    include (get_template_directory().'/custom-code/thumbnailed-recent-posts.php');


/*------------------------------------*\
    Theme Support
    \*------------------------------------*/

    if (function_exists('add_theme_support'))
    {
    // Add Menu Support
        add_theme_support('menus');

    // Add aside post format
        add_theme_support( 'post-formats', array( 'aside' ) );

    // Add Thumbnail Theme Support
    //add_theme_support('post-thumbnails');
    //add_image_size('large', 700, '', true); // Large Thumbnail
    //add_image_size('medium', 250, '', true); // Medium Thumbnail
    //add_image_size('small', 120, '', true); // Small Thumbnail
    //add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
    'default-image'         => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'           => false,
    'default-text-color'        => '000',
    'width'             => 1000,
    'height'            => 198,
    'random-default'        => false,
    'wp-head-callback'      => $wphead_cb,
    'admin-head-callback'       => $adminhead_cb,
    'admin-preview-callback'    => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    //add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('mongabay', get_template_directory() . '/languages');
}

/*------------------------------------*\
    Functions
    \*------------------------------------*/
// Get current host
    function mongabay_subdomain_name() {
        $parsedUrl = parse_url($_SERVER['SERVER_NAME']);
        $host = explode('.', $parsedUrl['path']);
        $domain = $host[0];
        return $domain;
    }

// Main WP_query modifier to process multiple vars

    function mongabay_mega_query($query) {

        if ($query->is_home() && $query->is_main_query() && ! is_admin()) {

            $home_url = esc_url( home_url( '/' ) );
            $section = get_query_var('section');
            $firstvar = get_query_var('nc1');
            $secondvar = get_query_var('nc2');

        // check if no first variable in url
            if($section == 'list' && empty($firstvar)) {
            wp_redirect( $home_url );//home sweet home
            exit;
        }


        if($section == 'list' && !empty($firstvar) && empty($secondvar)) {

            $item1 = get_terms(array('topic','location'), array('slug' => $firstvar));

            $tax_query = array(
                array(
                    'taxonomy' => $item1[0]->taxonomy,
                    'field' => 'slug',
                    'terms' => $item1[0]->slug
                    )
                );

            $query->set('tax_query', $tax_query);

        }

        if($section == 'list' && !empty($firstvar) && !empty($secondvar)) {

            $item1 = get_terms(array('topic','location'), array('slug' => $firstvar));
            $item2 = get_terms(array('topic','location'), array('slug' => $secondvar));

            $tax_query = array(
                'relation' => 'AND',
                array(
                    'taxonomy' => $item1[0]->taxonomy,
                    'field' => 'slug',
                    'terms' => $item1[0]->slug
                    ),

                array(
                    'taxonomy' => $item2[0]->taxonomy,
                    'field' => 'slug',
                    'terms' => $item2[0]->slug
                    )
                );

            $query->set('tax_query', $tax_query);

            if($item1[0]->taxonomy=='location' && $item2[0]->taxonomy=='topic') {

                wp_redirect( $home_url.'list/'.$secondvar.'/'.$firstvar );
                exit;

            }
        }


    }

}

add_filter( 'pre_get_posts', 'mongabay_mega_query' );

//fix topics links
function mongabay_topic_link( $link, $term, $taxonomy )
{
    if ( $taxonomy !== 'topic' )
        return $link;

    return str_replace( 'topic/', 'list/', $link );
}
add_filter( 'term_link', 'mongabay_topic_link', 10, 3 );


//fix locations links
function mongabay_location_link( $link, $term, $taxonomy )
{
    if ( $taxonomy !== 'location' )
        return $link;

    return str_replace( 'location/', 'list/', $link );
}
add_filter( 'term_link', 'mongabay_location_link', 10, 3 );

//fix byline links
function mongabay_byline_link( $link, $term, $taxonomy )
{
    if ( $taxonomy !== 'byline' )
        return $link;

    return str_replace( 'byline/', 'by/', $link );
}
add_filter( 'term_link', 'mongabay_byline_link', 10, 3 );

// Router
// RoutingWP\add_frontend_route('^list/([^/]+)/?$', function($matches) {
//     return [
//         'post_status'    => 'publish',
//         'post_type'      => 'post',
//         'tax_query'      => array(
//             'relation'   => 'OR',
//             array(                
//                 'taxonomy' => 'topic',
//                 'field' => 'slug',
//                 'terms' => $matches[1],
//                 'operator' => 'IN'
//             ),
//             array(                
//                 'taxonomy' => 'location',
//                 'field' => 'slug',
//                 'terms' => $matches[1],
//                 'operator' => 'IN'
//             )
//         )
//     ];
// });

// RoutingWP\add_frontend_route('^by/([^/]+)/?$', function($matches) {
//     return [
//         'post_status'    => 'publish',
//         'post_type'      => 'post',
//         'tax_query'      => array(
//             array(                
//                 'taxonomy' => 'byline',
//                 'field' => 'slug',
//                 'terms' => $matches[1],
//                 'operator' => 'IN'
//             )
//         )
//     ];
// });

//custom nav menu
// function mongabay_nav()
// {
//     wp_nav_menu(
//     array(
//         'theme_location'  => 'header-menu',
//         'menu'            => '',
//         'container'       => 'div',
//         'container_class' => 'menu-{menu slug}-container',
//         'container_id'    => '',
//         'menu_class'      => 'menu',
//         'menu_id'         => '',
//         'echo'            => true,
//         'fallback_cb'     => 'wp_page_menu',
//         'before'          => '',
//         'after'           => '',
//         'link_before'     => '',
//         'link_after'      => '',
//         'items_wrap'      => '<ul class="navbar-nav mr-auto">%3$s</ul>',
//         'depth'           => 0,
//         'walker'          => new bootstrap_walker()
//         )
//     );
// }

// special series section function. Usage mongabay_series_section (array('slug1','slug2','slug3'), 3) where 3 is number of posts
function mongabay_series_section ( $names, $number) {
    echo '<div id="special-series" class="container">';
    $count = 0;
    foreach ($names as $name) {
        $count = $count + 1;
        $title = ucfirst(str_replace('-', ' ', $name));

        switch ($count) {
            case '1': ?>
                <div class="row"><h2><?php _e( 'Special series', 'mongabay' ); ?></h2>
                <?php break;
            case '5': ?>
                <div class="spacer clearfix"></div>
                <div class="row">
                <?php break;
        } ?>

            <div class="col-lg-3">
                <h4><?php echo $title; ?></h4>
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $number,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'serial',
                        'field'    => 'slug',
                        'terms'    => $name,
                        ),
                    ),
                );

            $query = new WP_Query( $args );

            if ($query->have_posts()) { ?>

            <ul>
            <?php
                $counter = 0;
                while ( $query->have_posts() ) : $query->the_post();
                $counter = $counter + 1; ?>
                <li class="post-<?php the_ID(); ?>">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endwhile; ?>
            </ul>
            <div class="thumbnail-series">
                <img src="<?php echo get_template_directory_uri(); ?>/img/series/<?php echo $name; ?>.jpg" alt="<?php echo $title; ?>"/>
            </div>
            <?php
            }
            wp_reset_postdata(); ?>

            <div class="more-special">
                <a href="<?php echo esc_url( home_url( '/' ) ).'series/'.$name; ?>"><?php _e('More articles', 'mongabay'); ?></a>
            </div>
            </div>
        <?php if ($count == 4 || $count == 8) { ?>
            </div>
        <?php }
    } ?>
    </div>

<?php }


// Function to detect if we are dealing with featured aside article
function mongabay_layout() {
    if ( is_single() ) {
        $post_id = get_the_ID();
        $aside = get_post_format($post_id);
        $featured = get_post_meta( $post_id, 'featured_as', false );
        if ( $aside == 'aside' && in_array('featured', $featured) ) {
            $container = 'container-fluid';
        }
        else {
            $container = 'container';
        }
    }
    else {
        $container = 'container';
    }
    return $container;
}

// sanitize content
function mongabay_sanitized_content($post_id) {
    if (get_post_meta($post_id,"mongabay_post_legacy_status",true) == 'yes') {
        $content = get_the_content();
        $content = str_replace(']]>', '', $content);
        $content = str_replace(array("}","{"),'',$content);
        $content = str_replace(array('<br>','<BR>','<br/>','<BR/>'),"\n",$content);
        $content = apply_filters('the_content', $content);
        $content = str_replace('<p></p>', '', $content);
        /*if (strpos($content,'<br>') == FALSE) $content = nl2br($content); */
        echo $content;
    }
    else {
        the_content();
    }
}


// Load scripts
function mongabay_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('fittext', get_template_directory_uri() . '/js/lib/jquery.fittext.js', array('jquery'), '1.2', true);
        wp_enqueue_script('fittext');

        wp_register_script('bootstraputils', get_template_directory_uri() . '/js/lib/util.js', array('jquery'), '4.0.0', true);
        wp_enqueue_script('bootstraputils');

        wp_register_script('bootstraptabs', get_template_directory_uri() . '/js/lib/tabs.js', array('jquery'), '4.0.0', true);
        wp_enqueue_script('bootstraptabs');

        wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0');
        wp_enqueue_script('scripts');
    }
}

// Load conditional scripts
function mongabay_conditional_scripts()
{
    if ( is_front_page() ) {
        wp_register_script('axios', get_template_directory_uri() . '/js/lib/axios-0.16.2.min.js', array(), '0.16.2');
        wp_enqueue_script('axios');

        //include react component, site dependant
        if( get_current_blog_id() == 20 ) {
            // general news site
            wp_register_script('newsfetch_general', get_template_directory_uri() . '/js/lib/bundle.js', array(), '1.0.0', true);
            wp_enqueue_script('newsfetch_general');
        }

        if( get_current_blog_id() == 21 ) {
            // kids news site
            wp_register_script('newsfetch_kids', get_template_directory_uri() . '/js/lib/bundle_kids.js', array(), '1.0.0', true);
            wp_enqueue_script('newsfetch_kids');
        }

        if( get_current_blog_id() == 22 ) {
            // wildtech news site
            wp_register_script('newsfetch_wildtech', get_template_directory_uri() . '/js/lib/bundle_wildtech.js', array(), '1.0.0', true);
            wp_enqueue_script('newsfetch_wildtech');
        }

        if( get_current_blog_id() == 23 ) {
            // Chinese news site
            wp_register_script('newsfetch_cn', get_template_directory_uri() . '/js/lib/bundle_cn.js', array(), '1.0.0', true);
            wp_enqueue_script('newsfetch_cn');
        }

        if( get_current_blog_id() == 24 ) {
            // German news site
            wp_register_script('newsfetch_de', get_template_directory_uri() . '/js/lib/bundle_de.js', array(), '1.0.0', true);
            wp_enqueue_script('newsfetch_de');
        }

        if( get_current_blog_id() == 25 ) {
            // Spanish news site
            wp_register_script('newsfetch_es', get_template_directory_uri() . '/js/lib/bundle_es.js', array(), '1.0.0', true);
            wp_enqueue_script('newsfetch_es');
        }

        if( get_current_blog_id() == 26 ) {
            // French news site
            wp_register_script('newsfetch_fr', get_template_directory_uri() . '/js/lib/bundle_fr.js', array(), '1.0.0', true);
            wp_enqueue_script('newsfetch_fr');
        }

        if( get_current_blog_id() == 27 ) {
            // Italian news site
            wp_register_script('newsfetch_it', get_template_directory_uri() . '/js/lib/bundle_it.js', array(), '1.0.0', true);
            wp_enqueue_script('newsfetch_it');
        }

        if( get_current_blog_id() == 28 ) {
            // Japanese news site
            wp_register_script('newsfetch_jp', get_template_directory_uri() . '/js/lib/bundle_jp.js', array(), '1.0.0', true);
            wp_enqueue_script('newsfetch_jp');
        }

        if( get_current_blog_id() == 29 ) {
            // Portuguese news site
            wp_register_script('newsfetch_pt', get_template_directory_uri() . '/js/lib/bundle_pt.js', array(), '1.0.0', true);
            wp_enqueue_script('newsfetch_pt');
        }

    }

    if ( mongabay_layout() == 'container-fluid') {
        wp_register_script('parallax', get_template_directory_uri() . '/js/lib/parallax.min.js', array(), '1.4.2');
        wp_enqueue_script('parallax');

    }
}

// Featured articles template

function mongabay_featured() {
    if ( mongabay_layout() == "container-fluid" ) {
        include (TEMPLATEPATH . '/single-featured.php');
        exit;
    }
}
add_action('template_redirect', 'mongabay_featured');


// Load styles
function mongabay_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('boostrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0.0', 'all');
    wp_enqueue_style('boostrap'); // Enqueue it!

    wp_register_style('main', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('main'); // Enqueue it!
}

// Register Navigation
function register_mongabay_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'mongabay'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'mongabay'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'mongabay') // Extra Navigation if needed (duplicate as many as you need!)
        ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget
    register_sidebar(array(
        'name' => __('Sidebar Widget', 'mongabay'),
        'description' => __('All sidebar widgets should be placed here.', 'mongabay'),
        'id' => 'sidebar-widget',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
        ));

    // Define Footer Widget 1/4
    register_sidebar(array(
        'name' => __('Footer Widget 1/4', 'mongabay'),
        'description' => __('First column widget', 'mongabay'),
        'id' => 'footer-widget-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
        ));

    // Define Footer Widget 2/4
    register_sidebar(array(
        'name' => __('Footer Widget 2/4', 'mongabay'),
        'description' => __('Second column widget', 'mongabay'),
        'id' => 'footer-widget-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
        ));

    // Define Footer Widget 3/4
    register_sidebar(array(
        'name' => __('Footer Widget 3/4', 'mongabay'),
        'description' => __('Third column widget', 'mongabay'),
        'id' => 'footer-widget-3',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
        ));

    // Define Footer Widget 4/4
    register_sidebar(array(
        'name' => __('Footer Widget 4/4', 'mongabay'),
        'description' => __('Forth column widget', 'mongabay'),
        'id' => 'footer-widget-4',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
        ));
}

// Tabbed articles by topic/location

function mongabay_tabs() {
    register_widget( 'mongabay_topic_location' );
}
add_action( 'widgets_init', 'mongabay_tabs' );



class mongabay_topic_location extends WP_Widget {

    function __construct() {
        parent::__construct(
            'mongabay_topic_location', 
            __('Topic and location tabs', 'mongabay'), 
            array( 'description' => __( 'Listing topics and locations as tabbed content', 'mongabay' ), ) 
            );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        
        ?>
        <?php
            function mongabay_tabbed_content ($items) {
                $home_url = esc_url( home_url( '/' ) );
                foreach ($items as $item) { 
                    $title = ucfirst(str_replace('-', ' ', $item));
                    $slug = sanitize_title($item);?>
                    <a class="widget-term" href="<?php echo $home_url.'list/'.$slug ;?>"><?php echo $title; ?></a>
                <?php }
        }
        ?>
        <ul class="nav nav-tabs">
          <li><a data-toggle="tab" href="#topic"><h2><?php _e('By topic', 'mongabay'); ?></h2></a></li>
          <li><a data-toggle="tab" href="#location"><h2><?php _e('By location', 'mongabay'); ?></h2></a></li>
      </ul>
      <div class="tab-content">
        <div id="topic" class="tab-pane fade in active show">
            <?php
            switch (get_current_blog_id()) {
                case '20':
                    mongabay_tabbed_content(array('agriculture','animals','birds','climate-change','conservation','deforestation','energy','featured','forests','happy-upbeat-environmental','herps','indigenous-people','interviews','mammals','new-species','oceans','palm-oil','rainforests','technology','wildlife'));
                    break;
                case '25':
                    mongabay_tabbed_content(array('agricultura','animales','pájaros','climate-change','conservation','deforestation','energy','featured','forests','happy-upbeat-environmental','herps','indigenous-people','interviews','mammals','new-species','oceans','palm-oil','rainforests','technology','wildlife'));
                    break;
                
                default:
                    mongabay_tabbed_content(array('agriculture','animals','birds','climate-change','conservation','deforestation','energy','featured','forests','happy-upbeat-environmental','herps','indigenous-people','interviews','mammals','new-species','oceans','palm-oil','rainforests','technology','wildlife'));
                    break;
            }
                
            ?>
            <a href="<?php echo $home_url ;?>topics" class="plus-link"><?php _e('Many more topics', 'mongabay'); ?></a>
        </div>
        <div id="location" class="tab-pane fade">
            <?php
                switch (get_current_blog_id()) {
                    case '20':
                        mongabay_tabbed_content(array('africa','amazon','asia','australia','borneo','brazil','cameroon','central-america','china','colombia','congo','india','indonesia','latin-america','madagascar','malaysia','new-guinea','peru','sumatra','united-states'));
                        break;
                    
                    default:
                        mongabay_tabbed_content(array('africa','amazon','asia','australia','borneo','brazil','cameroon','central-america','china','colombia','congo','india','indonesia','latin-america','madagascar','malaysia','new-guinea','peru','sumatra','united-states'));
                        break;
                }
                
            ?>
            <a href="<?php echo $home_url ;?>locations" class="plus-link"><?php _e('Browse more locations', 'mongabay'); ?></a>
        </div>
    </div>
    <?php
    echo $args['after_widget'];
}

    // Widget Backend 
public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
    }
    else {
        $title = __( 'New title', 'mongabay' );
    }
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php 
}


public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
}

}



// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
        ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function mongabay_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
        ));
}

// Custom Excerpts
function mongabay_index($length) // Create 20 Word Callback for Index page Excerpts, call using mongabay_excerpt('mongabay_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using mongabay_excerpt('mongabay_custom_post');
function mongabay_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function mongabay_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function mongabay_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'mongabay') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function mongabay_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

function mongabay_query_var( $vars ) {
    $vars[] = 'section';
    $vars[] = 'nc1';
    $vars[] = 'nc2';

    return $vars;
}
add_filter( 'query_vars', 'mongabay_query_var' );


/*------------------------------------*\
    Actions + Filters
    \*------------------------------------*/

// Add Actions
add_action('init', 'mongabay_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'mongabay_conditional_scripts'); // Add Conditional Page Scripts
add_action('wp_enqueue_scripts', 'mongabay_styles'); // Add Theme Stylesheet
add_action('init', 'register_mongabay_menu'); // Add Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
//add_action('init', 'mongabay_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
//add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
//add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'mongabay_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'mongabay_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

?>