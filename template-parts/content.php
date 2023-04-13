<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sansara
 */


$class = "";

$type = 'horizontal';

$id = get_the_ID(); 
$item = get_post($id);
setup_postdata($item);
$name = $item->post_title;
$thumb = get_post_meta( $id, '_thumbnail_id', true );
$link = get_permalink($id);

$desc_size = '180';

if(function_exists('get_field') && get_field('short_desc')) {
    $desc = get_field('short_desc', $id);
} else {
    $desc = strip_tags(strip_shortcodes($item->post_content));
}

$desc = substr($desc, 0, $desc_size);
$desc = rtrim($desc, "!,.-");
$desc = substr($desc, 0, strrpos($desc, ' '))."...";

if($desc == '...') {
	$desc = '';
}

$class = "";
if(!empty($thumb)) {
	$class = " with-image";
} else {
	$class = " with-out-image";
}

$category_links_html = $category = "";
if(is_array(get_the_category($id)) && count(get_the_category($id)) > 0 && get_the_category($id)) {
	foreach (get_the_category($id) as $item) {
		$category_links_html .= '<a href="'.esc_url(get_category_link($item->cat_ID)).'">'.esc_html($item->name).'</a>, ';
		$category .= $item->name.', ';
	}
	$category_links_html = trim($category_links_html, ', ');
	$category = trim($category, ', ');
}

if(class_exists('WPBakeryShortCode')) {
?>
	<article <?php post_class('blog-item category-portrait with-image col-xs-12 col-sm-6 '.$class) ?>>
	    <div class="wrap ">
	        <?php if(!empty($thumb)) { ?>
				<div class="img"><a href="<?php echo esc_url($link); ?>" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_src($thumb, 'large')[0]) ?>);"></a></div>
			<?php } ?>
	        <div class="content">
	            <h5><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($name); ?></a></h5>
	            <div class="blog-detail">
	                <div class="date"><i class="ui-interface-calendar"></i> <span><?php echo get_the_date() ?></span></div>
	                <?php if(!empty($category)) { ?>
		                <div class="categories"><i class="ui-interface-tag"></i> <span><?php echo wp_kses_post($category) ?></span></div>
		            <?php } ?>
	            </div>
	            <div class="text"><?php echo esc_html($desc); ?></div>
	            <div class="bottom">
	            	<?php if(function_exists('zilla_likes')) { ?>
	            		<div class="like"><?php echo zilla_likes($id) ?></div>
	            	<?php } ?>
	                <div class="comment-count"><i class="ui-interface-chat"></i> <a href="<?php echo esc_url(get_permalink($id)) ?>#comments"><?php echo wp_kses_post(get_comments_number_text()); ?></a></div>
	            </div>
	        </div>
	    </div>
	</article>
<?php } else { ?> 
	<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
		<div class="site-content">
			<h3 class="page-title"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($name); ?></a></h3>
			<?php if(!empty($thumb)) { ?>
				<div class="post-img"><?php echo wp_kses_post(wp_get_attachment_image($thumb, '')); ?></div>
			<?php } ?>
			<div class="blog-detail">
				<?php if(is_sticky()) { ?>
					<div class="sticky-a"><i class="fa fa-lock"></i> <span><?php echo esc_html__('Sticky ', 'sansara') ?></span></div>
				<?php } ?>
				<div class="date"><i class="ui-interface-calendar"></i> <span><?php echo get_the_date() ?></span></div>
				<div class="categories"><i class="ui-interface-tag"></i> <span><?php echo wp_kses_post($category_links_html); ?></span></div>
			</div>
			<div class="post-content">
				<div class="clearfix">
					<?php the_content(''); ?>
				</div>
				<?php if(function_exists('wp_link_pages')) { ?>
					<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>','link_before' => '<span>','link_after' => '</span>',)); ?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } wp_reset_postdata(); ?>