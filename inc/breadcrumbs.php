<?php
function sansara_breadcrumbs() {

	/* === ОПЦИИ === */
	$text['home'] = esc_html__('Home', 'sansara'); 
	$text['category'] = esc_html__('%s', 'sansara'); 
	$text['search'] = esc_html__('Search results for "%s"', 'sansara'); 
	$text['tag'] = esc_html__('Tagged with "%s"', 'sansara'); 
	$text['author'] = esc_html__('Author`s articles %s', 'sansara'); 
	$text['404'] = esc_html__('Error 404', 'sansara'); 
	$text['page'] = esc_html__('Page %s', 'sansara'); 
	$text['cpage'] = esc_html__('Comment page %s', 'sansara'); 

	$wrap_before = '<div class="breadcrumbs">'; 
	$wrap_after = '</div>'; 
	$sep = esc_html__('/', 'sansara'); 
	$sep_before = '<span class="sep">'; 
	$sep_after = '</span>'; 
	$show_home_link = 1; 
	$show_on_home = 0; 
	$show_current = 1; 
	$before = '<span class="current">'; 
	$after = '</span>'; 

	global $post;
	$home_url = home_url('/');
	$link_before = '<span>';
	$link_after = '</span>';
	$link_attr = '';
	$link_in_before = '<span>';
	$link_in_after = '</span>';
	$link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
	$frontpage_id = get_option('page_on_front');
	$parent_id = ($post) ? $post->post_parent : '';
	$sep = ' ' . $sep_before . $sep . $sep_after . ' ';
	$home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

	if (is_home() || is_front_page()) {

		if ($show_on_home) echo wp_kses_post($wrap_before . $home_link . $wrap_after);

	} else {

		echo wp_kses_post($wrap_before);
		if ($show_home_link) echo wp_kses_post($home_link);

		if ( is_category() ) {
			$cat = get_category(get_query_var('cat'), false);
			if ($cat->parent != 0) {
				$cats = get_category_parents($cat->parent, TRUE, $sep);
				$cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				if ($show_home_link) echo wp_kses_post($sep);
				echo wp_kses_post($cats);
			}
			if ( get_query_var('paged') ) {
				$cat = $cat->cat_ID;
				echo wp_kses_post($sep) . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo wp_kses_post($sep) . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
			}

		} elseif ( is_search() ) {
			if (have_posts()) {
				if ($show_home_link && $show_current) echo wp_kses_post($sep);
				if ($show_current) echo wp_kses_post($before) . sprintf($text['search'], get_search_query()) . $after;
			} else {
				if ($show_home_link) echo wp_kses_post($sep);
				echo wp_kses_post($before) . sprintf($text['search'], get_search_query()) . $after;
			}

		} elseif ( is_day() ) {
			if ($show_home_link) echo wp_kses_post($sep);
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
			if ($show_current) echo wp_kses_post($sep) . $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			if ($show_home_link) echo wp_kses_post($sep);
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
			if ($show_current) echo wp_kses_post($sep) . $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			if ($show_home_link && $show_current) echo wp_kses_post($sep);
			if ($show_current) echo wp_kses_post($before) . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ($show_home_link) echo wp_kses_post($sep);
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current) echo wp_kses_post($sep) . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $sep);
				if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				echo wp_kses_post($cats);
				if ( get_query_var('cpage') ) {
					echo wp_kses_post($sep) . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
				} else {
					if ($show_current) echo wp_kses_post($before) . get_the_title() . $after;
				}
			}


		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if ( get_query_var('paged') ) {
				echo wp_kses_post($sep) . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo wp_kses_post($sep) . $before . $post_type->label . $after;
			}

		} elseif ( is_attachment() ) {
			if ($show_home_link) echo wp_kses_post($sep);
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			if ($cat) {
				$cats = get_category_parents($cat, TRUE, $sep);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				echo wp_kses_post($cats);
			}
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current) echo wp_kses_post($sep) . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current) echo wp_kses_post($sep) . $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($show_home_link) echo wp_kses_post($sep);
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo wp_kses_post($breadcrumbs[$i]);
					if ($i != count($breadcrumbs)-1) echo wp_kses_post($sep);
				}
			}
			if ($show_current) echo wp_kses_post($sep) . $before . get_the_title() . $after;

		} elseif ( is_tag() ) {
			if ( get_query_var('paged') ) {
				$tag_id = get_queried_object_id();
				$tag = get_tag($tag_id);
				echo wp_kses_post($sep) . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo wp_kses_post($sep) . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
			}

		} elseif ( is_author() ) {
			global $author;
			$author = get_userdata($author);
			if ( get_query_var('paged') ) {
				if ($show_home_link) echo wp_kses_post($sep);
				echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_home_link && $show_current) echo wp_kses_post($sep);
				if ($show_current) echo wp_kses_post($before) . sprintf($text['author'], $author->display_name) . $after;
			}

		} elseif ( is_404() ) {
			if ($show_home_link && $show_current) echo wp_kses_post($sep);
			if ($show_current) echo wp_kses_post($before) . $text['404'] . $after;

		} elseif ( has_post_format() && !is_singular() ) {
			if ($show_home_link) echo wp_kses_post($sep);
			echo get_post_format_string( get_post_format() );
		}

		echo wp_kses_post($wrap_after);

	}
} 
