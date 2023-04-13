<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Sansara
 */

get_header(); ?>

	<main class="main-row">
		<div class="container">
			<h1 class="h2 page-title"><?php echo esc_html(single_post_title()); ?></h1>
			<?php if(is_active_sidebar('sidebar')) { ?>
				<div class="row index-sidebar-row">
					<div class="col-xs-12 col-md-8">
			<?php } ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class() ?>>
						<?php 
							$id = get_the_ID();

							$item = get_post($id);

							$thumb = get_post_meta( $id, '_thumbnail_id', true );

							$category = "";
							$category_name = "";
							$category_links_html = "";
							if(is_array(get_the_category($id)) && count(get_the_category($id)) > 0 && get_the_category($id)) {
								foreach (get_the_category($id) as $item) {
									$category .= $item->slug.' ';
									$category_name .= $item->name.', ';
									$category_links_html .= '<a href="'.esc_url(get_category_link($item->cat_ID)).'">'.esc_html($item->name).'</a>&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;';
								}
								$category_links_html = trim($category_links_html, '&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;');
								$category_name = trim($category_name, ', ');
							}

							$tags_html = "";
							if(is_array(get_the_tags($id)) && count(get_the_tags($id)) > 0 && get_the_tags($id)) {
								foreach (get_the_tags($id) as $tag){
									$tag_link = get_tag_link($tag->term_id);

									$tags_html .= '<a href="'.$tag_link.'">'.$tag->name.'</a>, ';
								}
								$tags_html = trim($tags_html, ', ');
							}

							$prev = get_permalink(get_adjacent_post(false,'',false));
							$next = get_permalink(get_adjacent_post(false,'',true));
						?>
						<div class="site-content">
							<?php if(!empty($thumb) && sansara_styles()['single_post_image_show'] == 'yes') { ?>
								<div class="post-img"><?php echo wp_kses_post(wp_get_attachment_image($thumb, '')); ?></div>
							<?php } ?>
							<div class="blog-detail">
								<?php if(is_sticky()) { ?>
									<div class="sticky-a"><i class="fa fa-lock"></i> <span><?php echo esc_html__('Sticky ', 'sansara') ?></span></div>
								<?php } ?>
								<div class="date"><i class="ui-interface-calendar"></i> <span><?php the_date() ?></span></div>
								<div class="categories"><i class="ui-interface-tag"></i> <span><?php echo wp_kses_post($category_name); ?></span></div>
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
						<div class="post-bottom">
							<?php if(function_exists('zilla_likes')) { ?>
								<div class="pb-like"><?php echo zilla_likes($id) ?></div>
							<?php } ?>
							<div class="pb-comments"><i class="ui-interface-chat"></i> <a href="#comments"><?php echo get_comments_number_text() ?></a></div>
							<?php if(get_permalink() != $prev ) { ?>
								<a href="<?php echo esc_url($prev); ?>" class="post-nav prev"><i class="solid-arrow-collection-left-chevron-1"></i> <span><?php echo esc_html__('previous post', 'sansara') ?></span></a>
							<?php } ?>
							<?php if(get_permalink() != $next ) { ?>
								<a href="<?php echo esc_url($next); ?>" class="post-nav next"><span><?php echo esc_html__('next post', 'sansara') ?></span> <i class="solid-arrow-collection-right-chevron-1"></i></a>
							<?php } ?>
						</div>
					</div>
					<?php if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif; ?>
				<?php endwhile; ?>
			<?php if(is_active_sidebar('sidebar')) { ?>
					</div>
					<div class="s-sidebar col-xs-12 col-md-4">
						<div class="w">
							<?php dynamic_sidebar('sidebar'); ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</main>

<?php
get_footer();
