<?php
/**
 * RSS2 Feed Template for displaying RSS2 Posts feed.
 *
 * @package WordPress
 */
header('Content-Type: ' . feed_content_type('rss-http') . '; charset=' . get_option('blog_charset'), true);
$more = 1;
$type = get_query_var('feedtype');


echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';

/**
 * Fires between the xml and rss tags in a feed.
 *
 * @since 4.0.0
 *
 * @param string $context Type of feed. Possible values include 'rss2', 'rss2-comments',
 *                        'rdf', 'atom', and 'atom-comments'.
 */
do_action( 'rss_tag_pre', 'rss2' );
?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	<?php
	/**
	 * Fires at the end of the RSS root to add namespaces.
	 *
	 * @since 2.0.0
	 */
	do_action( 'rss2_ns' );
	?>
>

<channel>
	<title><?php bloginfo_rss('name'); ?></title>
	<atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
	<link><?php bloginfo_rss('url') ?></link>
	<description><?php bloginfo_rss("description") ?></description>
	<lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
	<language><?php bloginfo_rss( 'language' ); ?></language>
	<sy:updatePeriod><?php
		$duration = 'hourly';

		/**
		 * Filter how often to update the RSS feed.
		 *
		 * @since 2.1.0
		 *
		 * @param string $duration The update period. Accepts 'hourly', 'daily', 'weekly', 'monthly',
		 *                         'yearly'. Default 'hourly'.
		 */
		echo apply_filters( 'rss_update_period', $duration );
	?></sy:updatePeriod>
	<sy:updateFrequency><?php
		$frequency = '1';

		/**
		 * Filter the RSS update frequency.
		 *
		 * @since 2.1.0
		 *
		 * @param string $frequency An integer passed as a string representing the frequency
		 *                          of RSS updates within the update period. Default '1'.
		 */
		echo apply_filters( 'rss_update_frequency', $frequency );
	?></sy:updateFrequency>
	<?php
	/**
	 * Fires at the end of the RSS2 Feed Header.
	 *
	 * @since 2.0.0
	 */
	do_action( 'rss2_head');

	while( have_posts()) : the_post();
	?>
	<item>
		<title><?php the_title_rss() ?></title>
		<link><?php the_permalink_rss() ?></link>
		<comments><?php comments_link_feed(); ?></comments>
		<pubDate><?php echo get_the_date( 'D, d M Y H:i:s' ); ?></pubDate>
		<dc:creator><![CDATA[<?php $authors = wp_get_object_terms($post->ID, 'byline'); foreach ($authors as $author) {$author_name = $author -> name; echo $author_name;} ?>]]></dc:creator>
		<author><![CDATA[<?php echo get_the_author(); ?>]]></author>
		<?php the_category_rss('rss2') ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );  ?>
		<enclosure url="<?php echo $image[0]; ?>" type="image/jpeg" />
		<guid isPermaLink="false"><?php the_guid(); ?></guid>

		<?php $serials = wp_get_object_terms($post->ID, 'serial', array ( 'fields' => 'names' ));
		if ($serials):?>
		<reporting-project><![CDATA[<?php echo wp_sprintf_l( '%l', $serials ); ?>]]></reporting-project>
		<? endif;?>

		<?php $locations = wp_get_object_terms($post->ID, 'location', array ( 'fields' => 'names' ));
		if ( ! empty ( $locations ) ):?>
		<locations><![CDATA[<?php echo wp_sprintf_l( '%l', $locations ); ?>]]></locations>
		<? endif;?>

		<?php $topics = wp_get_object_terms($post->ID, 'topic', array ( 'fields' => 'names' ));
		if ( ! empty ( $topics ) ):?>
		<topic-tags><![CDATA[<?php echo wp_sprintf_l( '%l', $topics ); ?>]]></topic-tags>
		<? endif;?>

		<?php $grants = get_post_meta(get_the_ID(),'grant',true);
		if ($grants):?>
		<grant><![CDATA[<?php echo get_post_meta(get_the_ID(),'grant',true); ?>]]></grant>
		<? endif;?>

		<?php if ($type=='bulletpoints'):	
			$firstbullet = get_post_meta(get_the_ID(),"mog_bullet_0_mog_bulletpoint",true);
			if($firstbullet):?>
				<description><![CDATA[<?php
				for ($n=0;$n < 4;$n++){
					$single_bullet=get_post_meta(get_the_ID(),"mog_bullet_".$n."_mog_bulletpoint",true);
					if(!empty($single_bullet)) {
						echo "- ".get_post_meta(get_the_ID(),"mog_bullet_".$n."_mog_bulletpoint",true)."<br />";				
					}
				} ?>]]></description>		
		<?php else: ?>
    	<description><![CDATA[<?php the_excerpt_rss(); ?>]]></description>
		<? endif;
		elseif ($type=='gps'): 
			$coords = get_post_meta(get_the_ID(), 'coordinates', true );
			if (!empty($coords)){
				if (is_array($coords)) {
					$coords_f=array();
					if (isset($coords['address'])) $coords_f[] = 'Address: '.$coords['address'];
					if (isset($coords['lat'])) $coords_f[] = $coords['lat'];
					if (isset($coords['lng'])) $coords_f[] = $coords['lng'];
					$coords_formatted = implode(',',$coords_f).'<br /><br />';
					echo '<latitude>';
					echo '<name>'.$coords['lat'].'</name>';
					echo '</latitude>';
					echo '<longitude>';
					echo '<name>'.$coords['lng'].'</name>';
					echo '</longitude>';
				}
				else {
					$coords = explode(",",$coords,2);
					echo '<latitude>';
					echo '<name>'.$coords[0].'</name>';
					echo '</latitude>';
					echo '<longitude>';
					echo '<name>'.$coords[1].'</name>';
					echo '</longitude>';
				}
			}		
	?>
		<description><![CDATA[<?php the_excerpt_rss(); ?>]]></description>
	<?php else: ?>
    	<description><![CDATA[<?php the_excerpt_rss(); ?>]]></description>
    <?php endif; ?>
	<?php $content = wp_trim_words(get_the_content_feed('rss2'),250); ?>
	<?php if ( strlen( $content ) > 0 ) : ?>
		<content:encoded><![CDATA[<?php echo $content; ?>]]></content:encoded>
	<?php else : ?>
		<content:encoded><![CDATA[<?php the_excerpt_rss(); ?>]]></content:encoded>
	<?php endif; ?>
		<wfw:commentRss><?php echo esc_url( get_post_comments_feed_link(null, 'rss2') ); ?></wfw:commentRss>
		<slash:comments><?php echo get_comments_number(); ?></slash:comments>
<?php rss_enclosure(); ?>
	<?php
	/**
	 * Fires at the end of each RSS2 feed item.
	 *
	 * @since 2.0.0
	 */
	do_action( 'rss2_item' );
	?>
	</item>
	<?php endwhile; ?>
</channel>
</rss>