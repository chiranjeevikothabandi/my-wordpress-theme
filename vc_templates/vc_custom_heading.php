<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $source
 * @var $text
 * @var $link
 * @var $google_fonts
 * @var $font_container
 * @var $el_class
 * @var $el_id
 * @var $css
 * @var $css_animation
 * @var $font_container_data - returned from $this->getAttributes
 * @var $google_fonts_data - returned from $this->getAttributes
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Custom_heading
 */
$source = $text = $link = $google_fonts = $font_container = $el_id = $el_class = $css = $css_animation = $font_container_data = $google_fonts_data = array();
// This is needed to extract $font_container_data and $google_fonts_data
extract( $this->getAttributes( $atts ) );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

/**
 * @var $css_class
 */
extract( $this->getStyles( $el_class . $this->getCSSAnimation( $css_animation ), $css, $google_fonts_data, $font_container_data, $atts ) );

$settings = get_option( 'wpb_js_google_fonts_subsets' );
if ( is_array( $settings ) && ! empty( $settings ) ) {
	$subsets = '&subset=' . implode( ',', $settings );
} else {
	$subsets = '';
}

if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && isset( $google_fonts_data['values']['font_family'] ) ) {
	wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
}

if ( ! empty( $styles ) ) {
	$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
} else {
	$style = '';
}

if ( 'post_title' === $source ) {
	$text = get_the_title( get_the_ID() );
}

if ( ! empty( $link ) ) {
	$link = vc_build_link( $link );
	$text = '<a href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . '>' . $text . '</a>';
}
$wrapper_attributes = array();
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output = '';

if(is_array(explode('|', $atts['font_container'])) && count(explode('|', $atts['font_container'])) > 0) {
	$settings = array();
	foreach (explode('|', $atts['font_container']) as $item) {
		$settings[explode(':', $item)[0]] = explode(':', $item)[1];
	}
}

if(isset($uppercase) && $uppercase == "on") {
	$css_class .= ' uppercase';
}

if($atts['decor_text_switch'] == 'on' && !empty($atts['decor_text'])) {
	$css_class .= ' with-bg-text';
}

if($atts['decor_line'] == 'on') {
	$css_class .= ' heading-decor';
}

if($settings['text_align'] == "left") {
	$css_class .= ' tal';
} elseif($settings['text_align'] == "right") {
	$css_class .= ' tar';
} elseif($settings['text_align'] == "center") {
	$css_class .= ' tac';
} elseif($settings['text_align'] == "justify") {
	$css_class .= ' taj';
} else {
	$css_class .= ' tal';
}

if ( apply_filters( 'vc_custom_heading_template_use_wrapper', false ) ) {
	$output .= '<div class="' . esc_attr( $css_class ) . '" ' . implode( ' ', $wrapper_attributes ) . '>';
		$output .= '<' . $font_container_data['values']['tag'] . ' ' . $style . ' class="h" >';
			if($atts['decor_text_switch'] == 'on' && !empty($atts['decor_text'])) {
				$output .= '<span class="bg-text" style="color: '.esc_attr($atts['decor_text_color']).'; font-size: '.esc_attr($atts['decor_font_size_text']).';">'.wp_kses_post($atts['decor_text']).'</span>';
			}
			$output .= '<span>'.$text.'</span>';
		$output .= '</' . $font_container_data['values']['tag'] . '>';
	$output .= '</div>';
} else {
	$output .= '<' . $font_container_data['values']['tag'] . ' ' . $style . ' class="h ' . esc_attr( $css_class ) . '" ' . implode( ' ', $wrapper_attributes ) . '>';
		if($atts['decor_text_switch'] == 'on' && !empty($atts['decor_text'])) {
			if(empty($atts['decor_font_size_text'])) {
				$atts['decor_font_size_text'] = '4.167em';
			}
			$output .= '<span class="bg-text" style="color: '.esc_attr($atts['decor_text_color']).'; font-size: '.esc_attr($atts['decor_font_size_text']).';">'.wp_kses_post($atts['decor_text']).'</span>';
		}
		$output .= '<span>'.$text.'</span>';
	$output .= '</' . $font_container_data['values']['tag'] . '>';
}

echo  $output;
