<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     4.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids ) {
	$loop 		= 0;
	$columns 	= 4;

	wp_enqueue_style( 'verticalCarousel', get_template_directory_uri() . '/css/jQuery.verticalCarousel.css');
    wp_enqueue_script( 'verticalCarousel', get_template_directory_uri() . '/js/jQuery.verticalCarousel.js', array('jquery'), true );
    wp_add_inline_script('sansara-script', "jQuery(document).ready(function(jQuery) {
        jQuery('.images .thumbnails').each(function(){
            var vertical_carousel = jQuery(this);
            vertical_carousel.verticalCarousel({
                showItems: 4
            });
            vertical_carousel.on('mousewheel', function (e) {
                if (e.originalEvent.deltaY>0) {
                    vertical_carousel.find('.vc_goDown').trigger('click');
                } else {
                    vertical_carousel.find('.vc_goUp').trigger('click');
                }
                e.preventDefault();
            });
        });
    });");
	?>
	<div class="thumbnails popup-gallery <?php echo 'columns-' . $columns; ?>">
		<a href="#" class="vc_goUp solid-arrow-collection-up-chevron-1"></a>
		<a href="#" class="vc_goDown solid-arrow-collection-down-chevron-1"></a>
		<ul class="vc_list">
			<?php
			if(function_exists('get_field') && get_field('product_video_url') && class_exists('VideoUrlParser')) {
				echo '<li class="popup-item"><a href="#" data-type="video" data-size="960x640" data-video="<div class=&quot;wrapper&quot;><div class=&quot;video-wrapper&quot;><iframe class=&quot;pswp__video&quot; width=&quot;1920&quot; height=&quot;1080&quot; src=&quot;'.VideoUrlParser::get_url_embed(get_field('product_video_url')).'&amp;controls=0&amp;showinfo=0&quot; frameborder=&quot;0&quot; allowfullscreen></iframe></div></div>" style="background-image: url('.VideoUrlParser::get_cover(get_field('product_video_url')).');"><i class="music-and-multimedia-linear-play-button"></i></a></li>';
			}

			foreach ( $attachment_ids as $attachment_id ) {

				$classes = array( 'zoom' );

				if ( $loop === 0 || $loop % $columns === 0 ) {
					$classes[] = 'first';
				}

				if ( ( $loop + 1 ) % $columns === 0 ) {
					$classes[] = 'last';
				}

				$image_class = implode( ' ', $classes );
				$props       = wc_get_product_attachment_props( $attachment_id, $post );

				if ( ! $props['url'] ) {
					continue;
				}

				$image_array = wp_get_attachment_image_src( $attachment_id , 'full' );

				echo apply_filters(
					'woocommerce_single_product_image_thumbnail_html',
					sprintf(
						'<li class="popup-item"><a href="%s" class="%s" title="%s" data-size="%s" style="background-image: url(%s);"></a></li>',
						esc_url( $props['url'] ),
						esc_attr( $image_class.' popup-item' ),
						esc_attr( $props['caption'] ),
						esc_attr( $image_array[1].'x'.$image_array[2] ),
						wp_get_attachment_image_src( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), 0, $props )[0]
					),
					$attachment_id,
					$post->ID,
					esc_attr( $image_class )
				);

				$loop++;
			} ?>
		</ul>
	</div>
	<?php
}
