<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sansara
 */


$class = "";

$id = get_the_ID(); 
$item = get_post($id);
setup_postdata($item);
$name = $item->post_title;
$thumb = get_post_meta( $id, '_thumbnail_id', true );
$link = get_permalink($id);
$image = wp_get_attachment_image_src( $thumb , 'full' );

$desc_size = '45';

$desc = strip_tags(strip_shortcodes($item->post_content));
$desc = substr($desc, 0, $desc_size);
$desc = rtrim($desc, "!,.-");
$desc = substr($desc, 0, strrpos($desc, ' '))."...";

if(sansara_styles()['project_in_popup'] == 'no') {
    $link = get_permalink($id);
} else {
    $link = wp_get_attachment_image_src( $thumb , 'full' )[0];
    $class .= ' popup-item';
}

?>
<article id="post-<?php the_ID(); ?>" class="portfolio-item col-xs-12 col-sm-6 col-md-4<?php echo esc_attr($class) ?>">
	<div class="wrap">
		<div class="a-img">
			<div style="background-image: url(<?php echo esc_url(wp_get_attachment_image_src($thumb, 'large')[0]) ?>);"></div>
		</div>
		<h6><span class="cell"><?php echo esc_html($name) ?></span></h6>
	</div>
	<a href="<?php echo esc_url($link) ?>" data-size="<?php echo esc_attr($image[1].'x'.$image[2]) ?>"></a>
</article>
<?php wp_reset_postdata(); ?> 