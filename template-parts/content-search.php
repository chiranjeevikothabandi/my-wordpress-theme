<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sansara
 */

$id = get_the_ID(); 
$item = get_post($id);
$name = $item->post_title;
$thumb = get_post_meta( $id, '_thumbnail_id', true );
$link = get_permalink($id);

$desc = strip_tags(strip_shortcodes($item->post_content));
$desc = substr($desc, 0, 530);
$desc = rtrim($desc, "!,.-");
$desc = substr($desc, 0, strrpos($desc, ' '))."...";

$category_name = "";
foreach (get_the_category($id) as $item) {
$category_name .= $item->name.' / ';
}
if($desc == '...') {
	$desc = '';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item col-xs-12') ?>>
	<div class="wrap">
		<div class="content">
			<h5><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($name); ?></a></h5>
			<div class="blog-detail">
                <div class="date"><i class="ui-interface-calendar"></i> <span><?php echo get_the_date() ?></span></div>
            </div>
			<?php if(!class_exists('WPBakeryShortCode')) { ?>
				<div class="text"><?php the_content(); ?></div>
			<?php } else { ?>
				<p><?php echo esc_html($desc); ?></p>
			<?php } if(function_exists('wp_link_pages')) { ?>
				<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>')); ?>
			<?php } ?>
			<a href="<?php echo esc_url($link); ?>" class="button-style2"><?php echo esc_html__('Read More', 'sansara') ?></a>
		</div>
	</div>
</article>