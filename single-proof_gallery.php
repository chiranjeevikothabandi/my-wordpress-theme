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
        <?php if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif; ?>
      <?php endwhile; ?>
		</div>
	</main>

<?php
get_footer();
