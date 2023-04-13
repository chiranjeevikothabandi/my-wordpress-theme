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
		<?php while ( have_posts() ) : the_post(); 
			$id = get_the_ID();

			$item = get_post($id);

			$thumb = get_post_meta( $id, '_thumbnail_id', true );

			$category = "";
			$category_name = "";
			$category_links_html = "";
			if(is_array(wp_get_post_terms( $id, 'fw-portfolio-category')) && count(wp_get_post_terms( $id, 'fw-portfolio-category')) > 0 && wp_get_post_terms( $id, 'fw-portfolio-category')) {
				foreach (wp_get_post_terms( $id, 'fw-portfolio-category') as $item) {
					$category .= $item->slug.' ';
					$category_name .= $item->name.' / ';
					$category_links_html .= '<a href="'.esc_url(get_term_link($item->term_id)).'">'.esc_html($item->name).'</a>, ';
				}
				$category_links_html = trim($category_links_html, ', ');
			}

			$desc = strip_tags(strip_shortcodes($item->post_content));
			if(iconv_strlen ($desc, 'UTF-8') > 200) {
				$desc = substr($desc, 0, 200);
			}

			$prev = get_permalink(get_adjacent_post(false,'',false));
			$next = get_permalink(get_adjacent_post(false,'',true));

			$prev_name = get_the_title(get_adjacent_post(false,'',false));
			$next_name = get_the_title(get_adjacent_post(false,'',true));

			$prev_img = $next_img = '';
			if(get_adjacent_post(false,'',false) && get_post_meta( get_adjacent_post(false,'',false)->ID, '_thumbnail_id', true )) {
				$prev_img = wp_get_attachment_image_src(get_post_meta( get_adjacent_post(false,'',false)->ID, '_thumbnail_id', true ), '')[0];
			}
			if(get_adjacent_post(false,'',true) && get_post_meta( get_adjacent_post(false,'',true)->ID, '_thumbnail_id', true )) {
				$next_img = wp_get_attachment_image_src(get_post_meta( get_adjacent_post(false,'',true)->ID, '_thumbnail_id', true ), '')[0];
			}
			
			$thumbnails = fw_ext_portfolio_get_gallery_images( $id );

			if(is_array($thumbnails)) {
				$count = count($thumbnails);
			} else {
				$count = '0';
			}

			if($count > 5) {
				$count = 5;
			}

			$project_style = sansara_styles()['project_style'];

			if(empty($thumbnails) && ($project_style == 'horizontal' || $project_style == 'right_side')) {
				$project_style = 'grid';
			}

			$container = 'container';

			if(empty($thumbnails) && $project_style != 'horizontal') {
				$container = 'container';
			} else if($project_style == 'horizontal') {
				$container = 'container-fluid';
			}

			if(sansara_styles()['project_image'] == 'adaptive') {
				$container .= ' adaptive-img';
			}

			switch (sansara_styles()['project_count_cols']) {
	            case 'col1':
	                $item_col = "col-xs-12";
	                break;
	            case 'col2':
	                $item_col = "col-xs-12 col-sm-6 col-md-6";
	                break;
	            case 'col3':
	                $item_col = "col-xs-12 col-sm-4 col-md-4";
	                break;
	            case 'col4':
	                $item_col = "col-xs-12 col-sm-4 col-md-3";
	                break;
	            
	            default:
	                $item_col = "";
	                break;
	        }

	        $i1=1;

	        $key2 = 0;
			?>

			<div class="<?php echo esc_attr($container) ?>">
				<div id="post-<?php the_ID(); ?>" <?php post_class('type-fw-portfolio-'.$project_style) ?>>
					<?php if($project_style == 'right_side') { ?>
						<?php wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/js/jquery.sticky-kit.min.js', array('jquery') ); ?>
						<div class="site-content">
							<div class="project-side-images <?php echo esc_attr($project_style) ?>">
								<div class="row" data-sticky_parent>
									<div class="content col-xs-12 col-sm-6" data-sticky_column>
										<div class="block">
											<div class="header-post-nav">
												<span class="num"><?php echo sansara_get_fw_index() ?></span>
												<span class="name"><?php echo wp_kses_post(get_the_title()) ?></span>
												<span class="arrows">
													<a href="<?php echo esc_url($prev) ?>" class="solid-arrow-collection-left-chevron-1<?php if(get_permalink() == $prev ) echo ' disabled'; ?>"></a>
													<a href="<?php echo esc_url($next) ?>" class="solid-arrow-collection-right-chevron-1<?php if(get_permalink() == $next ) echo ' disabled'; ?>"></a>
												</span>
											</div>
											<?php if(!empty(sansara_styles()['project_sub_heading'])) { ?>
												<h6 class="sub-h"><?php echo wp_kses_post(sansara_styles()['project_sub_heading']) ?></h6>
											<?php } ?>
											<h1 class="h2 page-title"><?php echo esc_html(single_post_title()); ?></h1>
											<div class="text">
												<?php the_content(''); ?>
												<?php if(function_exists('wp_link_pages')) { ?>
													<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>','link_before' => '<span>','link_after' => '</span>',)); ?>
												<?php } ?>
											</div>
											<div class="project-detail">
												<?php if(!empty(sansara_styles()['project_year'])) { ?>
													<div class="item">
														<div class="h"><?php echo esc_html__('Year', 'sansara') ?></div>
														<span><?php echo wp_kses_post(sansara_styles()['project_year']) ?></span>
													</div>
												<?php } if(!empty(sansara_styles()['project_location'])) { ?>
													<div class="item">
														<div class="h"><?php echo esc_html__('Location', 'sansara') ?></div>
														<span><?php echo wp_kses_post(sansara_styles()['project_location']) ?></span>
													</div>
												<?php } if(!empty(sansara_styles()['project_photography'])) { ?>
													<div class="item">
														<div class="h"><?php echo esc_html__('Photography', 'sansara') ?></div>
														<span><?php echo wp_kses_post(sansara_styles()['project_photography']) ?></span>
													</div>
												<?php } if(!empty(sansara_styles()['project_retouching'])) { ?>
													<div class="item">
														<div class="h"><?php echo esc_html__('Retouching', 'sansara') ?></div>
														<span><?php echo wp_kses_post(sansara_styles()['project_retouching']) ?></span>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="images col-xs-12 col-sm-6" data-sticky_column>
										<div class="items popup-gallery">
											<?php if(is_array($thumbnails)) {
												foreach($thumbnails as $key => $thumb) { 
													$class = '';
													if($key == count($thumbnails)-1) {
														$class = ' last';
													}
													if($project_style == 'left_side') { ?>
										    			<div class="item popup-item<?php echo esc_attr($class) ?>"><a href="<?php echo esc_url(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[0]) ?>" data-size="<?php echo esc_attr(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[1]) ?>x<?php echo esc_attr(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[2]) ?>"></a><?php echo wp_kses_post(wp_get_attachment_image($thumb['attachment_id'], 'full')); ?></div>
									    			<?php } else { ?>
									    				<div class="item popup-item<?php echo esc_attr($class) ?>"><a href="<?php echo esc_url(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[0]) ?>" data-size="<?php echo esc_attr(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[1]) ?>x<?php echo esc_attr(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[2]) ?>" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[0]) ?>)"></a></div>
								    				<?php } ?>
									    		<?php } 
									    	} ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } else if($project_style == 'slider') { ?>
						<div class="site-content project-slider-page">
							<?php if(is_array($thumbnails) && !empty($thumbnails) && count($thumbnails) > 0) { ?>
								<?php
									wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.css');
							        wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery') );
							    ?>
							    <div class="project-slider-area">
							    	<div class="project-slider">
							    		<?php foreach($thumbnails as $thumb) { ?>
							    			<div class="item"><div class="cell"><?php echo wp_kses_post(wp_get_attachment_image($thumb['attachment_id'], 'full')); ?></div></div>
							    		<?php } ?>
							    	</div>
							    	<div class="slider-navigation slider-navigation-style1">
							    		<div>
						                    <div class="count"></div>
					                        <div class="line"><div style="transition-duration: 5000ms;"></div></div>
					                        <div class="arrows">
					                            <div class="prev solid-arrow-collection-left-chevron-1"></div>
					                            <div class="next solid-arrow-collection-right-chevron-1"></div>
					                        </div>
				                        </div>
					                </div>
							    </div>
							<?php } else if(!empty($thumb) && empty($thumbnails) && sansara_styles()['project_image'] != 'disable') { ?>
								<div class="post-img"><?php echo wp_get_attachment_image($thumb, 'full'); ?></div>
							<?php } if(!empty(sansara_styles()['project_sub_heading'])) { ?>
								<h6 class="sub-h"><?php echo wp_kses_post(sansara_styles()['project_sub_heading']) ?></h6>
							<?php } ?>
							<h1 class="h3 page-title"><?php echo esc_html(single_post_title()); ?></h1>
							<div class="project-content">
								<?php the_content(''); ?>
								<?php if(function_exists('wp_link_pages')) { ?>
									<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>','link_before' => '<span>','link_after' => '</span>',)); ?>
								<?php } ?>
							</div>
							<div class="project-detail row">
								<?php if(!empty(sansara_styles()['project_year'])) { ?>
									<div class="col-xs-12 col-sm-6 col-md-3">
										<div class="item">
											<div class="h"><?php echo esc_html__('Year', 'sansara') ?></div>
											<span><?php echo wp_kses_post(sansara_styles()['project_year']) ?></span>
										</div>
									</div>
								<?php } if(!empty(sansara_styles()['project_location'])) { ?>
									<div class="col-xs-12 col-sm-6 col-md-3">
										<div class="item">
											<div class="h"><?php echo esc_html__('Location', 'sansara') ?></div>
											<span><?php echo wp_kses_post(sansara_styles()['project_location']) ?></span>
										</div>
									</div>
								<?php } if(!empty(sansara_styles()['project_photography'])) { ?>
									<div class="col-xs-12 col-sm-6 col-md-3">
										<div class="item">
											<div class="h"><?php echo esc_html__('Photography', 'sansara') ?></div>
											<span><?php echo wp_kses_post(sansara_styles()['project_photography']) ?></span>
										</div>
									</div>
								<?php } if(!empty(sansara_styles()['project_retouching'])) { ?>
									<div class="col-xs-12 col-sm-6 col-md-3">
										<div class="item">
											<div class="h"><?php echo esc_html__('Retouching', 'sansara') ?></div>
											<span><?php echo wp_kses_post(sansara_styles()['project_retouching']) ?></span>
										</div>
									</div>
								<?php } ?>
							</div>
							<div class="ps-bottom clearfix">
								<?php if($prev) { ?>
								    <a href="<?php echo esc_url($prev) ?>" class="ps-slider-arrow prev<?php if(get_permalink() == $prev ) echo ' disabled'; ?>">
								    	<i class="solid-arrow-collection-left-chevron-1"></i>
								        <div class="image" style="background-image: url(<?php echo esc_url($prev_img) ?>);"></div>
								        <div class="cell">
								            <div class="label"><?php echo esc_html__('prev', 'sansara') ?></div>
								            <div class="title"><span><?php echo esc_html($prev_name); ?></span></div>
								        </div>
								    </a>
							    <?php } if(!empty(sansara_styles()['project_portfolio_link'])) { ?>
								    <a href="<?php echo esc_url(sansara_styles()['project_portfolio_link']) ?>" target="_self" class="ps-b-button button-style1 gray2"><span><?php echo esc_html__('view full portfolio', 'sansara') ?></span></a>
								<?php } if($next) { ?>
								    <a href="<?php echo esc_url($next) ?>" class="ps-slider-arrow next<?php if(get_permalink() == $next ) echo ' disabled'; ?>">
								    	<i class="solid-arrow-collection-right-chevron-1"></i>
								        <div class="image" style="background-image: url(<?php echo esc_url($next_img) ?>);"></div>
								        <div class="cell">
								            <div class="label"><?php echo esc_html__('next', 'sansara') ?></div>
								            <div class="title"><span><?php echo esc_html($next_name); ?></span></div>
								        </div>
								    </a>
								<?php } ?>
							</div>
						</div>
					<?php } else if($project_style == 'parallax') { ?>
						<div class="site-content project-slider-page">
							<?php
								wp_enqueue_script( 'sansara-script', get_template_directory_uri() . '/js/script.js' );
						        wp_add_inline_script('sansara-script', "jQuery(document).ready(function(jQuery) {
						        	jQuery('.vertical-parallax-slider').pt_vertical_parallax();
						        });");
					        ?>
							<div class="vertical-parallax-area" data-vc-full-width-mod="true">
							    <div class="vertical-parallax-slider">
							    	<?php if(is_array($thumbnails) && !empty($thumbnails) && count($thumbnails) > 0) { ?>
									    <?php foreach($thumbnails as $thumb) { ?>
							    			<div class="vps-item" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[0]); ?>);"></div>
							    		<?php } ?>
									<?php } else if(!empty($thumb) && empty($thumbnails)) { ?>
										<div class="vps-item" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_src($thumb, 'full')[0]); ?>);"></div>
									<?php } ?>
									<div class="vps-item last">
										<div class="container">
											<?php if(!empty(sansara_styles()['project_sub_heading'])) { ?>
												<h6 class="sub-h"><?php echo wp_kses_post(sansara_styles()['project_sub_heading']) ?></h6>
											<?php } ?>
											<h1 class="h3 page-title"><?php echo esc_html(single_post_title()); ?></h1>
											<div class="project-content">
												<?php the_content(''); ?>
												<?php if(function_exists('wp_link_pages')) { ?>
													<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>','link_before' => '<span>','link_after' => '</span>',)); ?>
												<?php } ?>
											</div>
											<div class="project-detail row">
												<?php if(!empty(sansara_styles()['project_year'])) { ?>
													<div class="col-xs-12 col-sm-6 col-md-3">
														<div class="item">
															<div class="h"><?php echo esc_html__('Year', 'sansara') ?></div>
															<span><?php echo wp_kses_post(sansara_styles()['project_year']) ?></span>
														</div>
													</div>
												<?php } if(!empty(sansara_styles()['project_location'])) { ?>
													<div class="col-xs-12 col-sm-6 col-md-3">
														<div class="item">
															<div class="h"><?php echo esc_html__('Location', 'sansara') ?></div>
															<span><?php echo wp_kses_post(sansara_styles()['project_location']) ?></span>
														</div>
													</div>
												<?php } if(!empty(sansara_styles()['project_photography'])) { ?>
													<div class="col-xs-12 col-sm-6 col-md-3">
														<div class="item">
															<div class="h"><?php echo esc_html__('Photography', 'sansara') ?></div>
															<span><?php echo wp_kses_post(sansara_styles()['project_photography']) ?></span>
														</div>
													</div>
												<?php } if(!empty(sansara_styles()['project_retouching'])) { ?>
													<div class="col-xs-12 col-sm-6 col-md-3">
														<div class="item">
															<div class="h"><?php echo esc_html__('Retouching', 'sansara') ?></div>
															<span><?php echo wp_kses_post(sansara_styles()['project_retouching']) ?></span>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>
							    </div>
							</div>
						</div>
					<?php } else if($project_style == 'before_after') { ?>
						<div class="site-content project-before-after-page">
							<?php if(!empty(sansara_styles()['project_before_image']) && !empty(sansara_styles()['project_after_image'])) { ?>
								<div class="image-comparison-slider">
									<div class="new">
										<?php if(sansara_styles()['project_image'] == 'adaptive') { ?>
											<div class="img" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_src(sansara_styles()['project_after_image']['id'], 'full')[0]) ?>)"></div>
										<?php } elseif(isset(wp_get_attachment_image_src(sansara_styles()['project_after_image']['id'], 'full')[0])) { ?>
											<?php echo wp_get_attachment_image(sansara_styles()['project_after_image']['id'], 'full'); ?>
										<?php } ?>
									</div>
									<div class="resize">
										<div class="old">
											<?php if(sansara_styles()['project_image'] == 'adaptive') { ?>
												<div class="img" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_src(sansara_styles()['project_before_image']['id'], 'full')[0]) ?>)"></div>
											<?php } elseif(isset(wp_get_attachment_image_src(sansara_styles()['project_before_image']['id'], 'full')[0])) { ?>
												<?php echo wp_get_attachment_image(sansara_styles()['project_before_image']['id'], 'full'); ?>
											<?php } ?>
										</div>
									</div>
									<div class="line">
										<div><span><?php echo esc_html__('before', 'sansara') ?></span><span><?php echo esc_html__('after', 'sansara') ?></span></div>
									</div>
								</div>
							<?php } else if(!empty($thumb) && empty($thumbnails) && sansara_styles()['project_image'] != 'disable') { ?>
								<div class="post-img"><?php echo wp_get_attachment_image($thumb, 'full'); ?></div>
							<?php } if(!empty(sansara_styles()['project_sub_heading'])) { ?>
								<h6 class="sub-h"><?php echo wp_kses_post(sansara_styles()['project_sub_heading']) ?></h6>
							<?php } ?>
							<h1 class="h3 page-title"><?php echo esc_html(single_post_title()); ?></h1>
							<div class="project-content">
								<?php the_content(''); ?>
								<?php if(function_exists('wp_link_pages')) { ?>
									<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>','link_before' => '<span>','link_after' => '</span>',)); ?>
								<?php } ?>
							</div>
							<div class="project-detail row">
								<?php if(!empty(sansara_styles()['project_year'])) { ?>
									<div class="col-xs-12 col-sm-6 col-md-3">
										<div class="item">
											<div class="h"><?php echo esc_html__('Year', 'sansara') ?></div>
											<span><?php echo wp_kses_post(sansara_styles()['project_year']) ?></span>
										</div>
									</div>
								<?php } if(!empty(sansara_styles()['project_location'])) { ?>
									<div class="col-xs-12 col-sm-6 col-md-3">
										<div class="item">
											<div class="h"><?php echo esc_html__('Location', 'sansara') ?></div>
											<span><?php echo wp_kses_post(sansara_styles()['project_location']) ?></span>
										</div>
									</div>
								<?php } if(!empty(sansara_styles()['project_photography'])) { ?>
									<div class="col-xs-12 col-sm-6 col-md-3">
										<div class="item">
											<div class="h"><?php echo esc_html__('Photography', 'sansara') ?></div>
											<span><?php echo wp_kses_post(sansara_styles()['project_photography']) ?></span>
										</div>
									</div>
								<?php } if(!empty(sansara_styles()['project_retouching'])) { ?>
									<div class="col-xs-12 col-sm-6 col-md-3">
										<div class="item">
											<div class="h"><?php echo esc_html__('Retouching', 'sansara') ?></div>
											<span><?php echo wp_kses_post(sansara_styles()['project_retouching']) ?></span>
										</div>
									</div>
								<?php } ?>
							</div>
							<div class="ps-bottom clearfix">
								<?php if($prev) { ?>
								    <a href="<?php echo esc_url($prev) ?>" class="ps-slider-arrow prev<?php if(get_permalink() == $prev ) echo ' disabled'; ?>">
								    	<i class="solid-arrow-collection-left-chevron-1"></i>
								        <div class="image" style="background-image: url(<?php echo esc_url($prev_img) ?>);"></div>
								        <div class="cell">
								            <div class="label"><?php echo esc_html__('prev', 'sansara') ?></div>
								            <div class="title"><span><?php echo esc_html($prev_name); ?></span></div>
								        </div>
								    </a>
							    <?php } if(!empty(sansara_styles()['project_portfolio_link'])) { ?>
								    <a href="<?php echo esc_url(sansara_styles()['project_portfolio_link']) ?>" target="_self" class="ps-b-button button-style1 gray2"><span><?php echo esc_html__('view full portfolio', 'sansara') ?></span></a>
								<?php } if($next) { ?>
								    <a href="<?php echo esc_url($next) ?>" class="ps-slider-arrow next<?php if(get_permalink() == $next ) echo ' disabled'; ?>">
								    	<i class="solid-arrow-collection-right-chevron-1"></i>
								        <div class="image" style="background-image: url(<?php echo esc_url($next_img) ?>);"></div>
								        <div class="cell">
								            <div class="label"><?php echo esc_html__('next', 'sansara') ?></div>
								            <div class="title"><span><?php echo esc_html($next_name); ?></span></div>
								        </div>
								    </a>
								<?php } ?>
							</div>
						</div>
					<?php } else if($project_style == 'masonry' || $project_style == 'grid') { ?>
						<div class="site-content project-grid-page">
							<?php if(is_array($thumbnails) && !empty($thumbnails) && count($thumbnails) > 0) { ?>
						    	<div class="post-gallery-grid row popup-gallery">
									<?php foreach($thumbnails as $key => $thumb) { ?>
										<?php if(sansara_styles()['project_count_images'] > 0 && count($thumbnails) > sansara_styles()['project_count_images'] && sansara_styles()['project_count_images'] == $key) { ?>
											</div><div class="load-items load-items<?php echo esc_html($i1); ?>">
										<?php $key2 = $key; $i1++; } ?>
										<?php if(sansara_styles()['project_count_images'] > 0 && count($thumbnails) > sansara_styles()['project_count_images'] && sansara_styles()['project_count_images']+$key2 == $key) { ?>
											</div><div class="load-items load-items<?php echo esc_html($i1); ?>">
										<?php $key2 = $key; $i1++; } ?>

											<?php if($project_style == 'masonry') { ?>
												<div class="<?php echo esc_attr($item_col) ?> popup-item"><a href="<?php echo esc_url(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[0]); ?>" data-size="<?php echo esc_attr(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[1]); ?>x<?php echo esc_attr(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[2]); ?>"><?php echo wp_kses_post(wp_get_attachment_image($thumb['attachment_id'], 'full')); ?></a></div>
											<?php } else { ?>
												<div class="<?php echo esc_attr($item_col) ?> grid popup-item"><a href="<?php echo esc_url(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[0]); ?>" data-size="<?php echo esc_attr(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[1]); ?>x<?php echo esc_attr(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[2]); ?>" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_src($thumb['attachment_id'], 'full')[0]); ?>)"></a></div>
											<?php } ?>

									<?php } ?>
								</div>
								<?php if(sansara_styles()['project_count_images'] > 0 && count($thumbnails) > sansara_styles()['project_count_images']) { ?>
									<div class="project-image-load-button">
										<a href="#" class="button-style3 gray"><span><?php echo esc_html__('load more', 'sansara'); ?></span></a>
									</div>
								<?php } ?>
							<?php } else if(!empty($thumb) && empty($thumbnails) && sansara_styles()['project_image'] != 'disable') { ?>
								<div class="post-img"><?php echo wp_get_attachment_image($thumb, 'full'); ?></div>
							<?php } ?>
							<div class="project-content-area">
								<?php if(!empty(sansara_styles()['project_sub_heading'])) { ?>
									<h6 class="sub-h"><?php echo wp_kses_post(sansara_styles()['project_sub_heading']) ?></h6>
								<?php } ?>
								<h1 class="h3 page-title"><?php echo esc_html(single_post_title()); ?></h1>
								<div class="project-content">
									<?php the_content(''); ?>
									<?php if(function_exists('wp_link_pages')) { ?>
										<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>','link_before' => '<span>','link_after' => '</span>',)); ?>
									<?php } ?>
								</div>
								<div class="project-detail row">
									<?php if(!empty(sansara_styles()['project_year'])) { ?>
										<div class="col-xs-12 col-sm-6 col-md-3">
											<div class="item">
												<div class="h"><?php echo esc_html__('Year', 'sansara') ?></div>
												<span><?php echo wp_kses_post(sansara_styles()['project_year']) ?></span>
											</div>
										</div>
									<?php } if(!empty(sansara_styles()['project_location'])) { ?>
										<div class="col-xs-12 col-sm-6 col-md-3">
											<div class="item">
												<div class="h"><?php echo esc_html__('Location', 'sansara') ?></div>
												<span><?php echo wp_kses_post(sansara_styles()['project_location']) ?></span>
											</div>
										</div>
									<?php } if(!empty(sansara_styles()['project_photography'])) { ?>
										<div class="col-xs-12 col-sm-6 col-md-3">
											<div class="item">
												<div class="h"><?php echo esc_html__('Photography', 'sansara') ?></div>
												<span><?php echo wp_kses_post(sansara_styles()['project_photography']) ?></span>
											</div>
										</div>
									<?php } if(!empty(sansara_styles()['project_retouching'])) { ?>
										<div class="col-xs-12 col-sm-6 col-md-3">
											<div class="item">
												<div class="h"><?php echo esc_html__('Retouching', 'sansara') ?></div>
												<span><?php echo wp_kses_post(sansara_styles()['project_retouching']) ?></span>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="ps-bottom clearfix">
								<?php if($prev) { ?>
								    <a href="<?php echo esc_url($prev) ?>" class="ps-slider-arrow prev<?php if(get_permalink() == $prev ) echo ' disabled'; ?>">
								    	<i class="solid-arrow-collection-left-chevron-1"></i>
								        <div class="image" style="background-image: url(<?php echo esc_url($prev_img) ?>);"></div>
								        <div class="cell">
								            <div class="label"><?php echo esc_html__('prev', 'sansara') ?></div>
								            <div class="title"><span><?php echo esc_html($prev_name); ?></span></div>
								        </div>
								    </a>
							    <?php } if(!empty(sansara_styles()['project_portfolio_link'])) { ?>
								    <a href="<?php echo esc_url(sansara_styles()['project_portfolio_link']) ?>" target="_self" class="ps-b-button button-style1 gray2-t2"><span><?php echo esc_html__('view full portfolio', 'sansara') ?></span></a>
								<?php } if($next) { ?>
								    <a href="<?php echo esc_url($next) ?>" class="ps-slider-arrow next<?php if(get_permalink() == $next ) echo ' disabled'; ?>">
								    	<i class="solid-arrow-collection-right-chevron-1"></i>
								        <div class="image" style="background-image: url(<?php echo esc_url($next_img) ?>);"></div>
								        <div class="cell">
								            <div class="label"><?php echo esc_html__('next', 'sansara') ?></div>
								            <div class="title"><span><?php echo esc_html($next_name); ?></span></div>
								        </div>
								    </a>
								<?php } ?>
							</div>
						</div>
					<?php } else if($project_style == 'horizontal') { ?>
						<?php if(is_array($thumbnails) && !empty($thumbnails) && count($thumbnails) > 0) {
							wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.css');
					        wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery') );
					    ?>
					    	<div class="project-horizontal-slider">
					    		<div class="item content-item">
					    			<?php if(!empty(sansara_styles()['project_sub_heading'])) { ?>
										<h6 class="sub-h"><?php echo wp_kses_post(sansara_styles()['project_sub_heading']) ?></h6>
									<?php } ?>
					    			<h1 class="page-title h2"><?php echo esc_html(single_post_title()); ?></h1>
									<div class="project-content"><?php the_content(''); ?></div>
									<div class="project-detail">
										<?php if(!empty(sansara_styles()['project_year'])) { ?>
											<div class="item">
												<div class="h"><?php echo esc_html__('Year', 'sansara') ?></div>
												<span><?php echo wp_kses_post(sansara_styles()['project_year']) ?></span>
											</div>
										<?php } if(!empty(sansara_styles()['project_location'])) { ?>
											<div class="item">
												<div class="h"><?php echo esc_html__('Location', 'sansara') ?></div>
												<span><?php echo wp_kses_post(sansara_styles()['project_location']) ?></span>
											</div>
										<?php } if(!empty(sansara_styles()['project_photography'])) { ?>
											<div class="item">
												<div class="h"><?php echo esc_html__('Photography', 'sansara') ?></div>
												<span><?php echo wp_kses_post(sansara_styles()['project_photography']) ?></span>
											</div>
										<?php } if(!empty(sansara_styles()['project_retouching'])) { ?>
											<div class="item">
												<div class="h"><?php echo esc_html__('Retouching', 'sansara') ?></div>
												<span><?php echo wp_kses_post(sansara_styles()['project_retouching']) ?></span>
											</div>
										<?php } ?>
									</div>
					    		</div>
					    		<?php foreach($thumbnails as $thumb) { ?>
					    			<div class="item"><?php echo wp_kses_post(wp_get_attachment_image($thumb['attachment_id'], 'full')); ?></div>
					    		<?php } ?>
					    		<div class="item phs-nav">
					    			<div class="ps-bottom clearfix">
										<?php if($prev) { ?>
										    <a href="<?php echo esc_url($prev) ?>" class="ps-slider-arrow prev<?php if(get_permalink() == $prev ) echo ' disabled'; ?>">
										    	<i class="solid-arrow-collection-left-chevron-1"></i>
										        <div class="image" style="background-image: url(<?php echo esc_url($prev_img) ?>);"></div>
										        <div class="cell">
										            <div class="label"><?php echo esc_html__('prev', 'sansara') ?></div>
										            <div class="title"><span><?php echo esc_html($prev_name); ?></span></div>
										        </div>
										    </a>
									    <?php } if(!empty(sansara_styles()['project_portfolio_link'])) { ?>
										    <a href="<?php echo esc_url(sansara_styles()['project_portfolio_link']) ?>" target="_self" class="ps-b-button button-style1 gray2"><span><?php echo esc_html__('view full portfolio', 'sansara') ?></span></a>
										<?php } if($next) { ?>
										    <a href="<?php echo esc_url($next) ?>" class="ps-slider-arrow next<?php if(get_permalink() == $next ) echo ' disabled'; ?>">
										    	<i class="solid-arrow-collection-right-chevron-1"></i>
										        <div class="image" style="background-image: url(<?php echo esc_url($next_img) ?>);"></div>
										        <div class="cell">
										            <div class="label"><?php echo esc_html__('next', 'sansara') ?></div>
										            <div class="title"><span><?php echo esc_html($next_name); ?></span></div>
										        </div>
										    </a>
										<?php } ?>
									</div>
					    		</div>
					    	</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		<?php endwhile; ?>
	</main>

<?php
get_footer();
