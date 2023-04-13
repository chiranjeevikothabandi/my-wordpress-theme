<?php 
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_coming-soom-settings',
		'title' => esc_html__('Coming soom settings', 'sansara'),
		'fields' => array (
			array (
				'key' => 'field_59bfb14f288cf',
				'label' => esc_html__('Date', 'sansara'),
				'name' => 'date',
				'type' => 'date_picker',
				'date_format' => 'yy/mm/dd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-coming-soon.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-settings',
		'title' => esc_html__('Page settings', 'sansara'),
		'fields' => array (
			array (
				'key' => 'field_58a43abba66153',
				'label' => esc_html__('Page color mode', 'sansara'),
				'name' => 'site_mode',
				'type' => 'select',
				'choices' => array (
					'default' => esc_html__('Default', 'sansara'),
					'light' => esc_html__('Light', 'sansara'),
					'dark' => esc_html__('Dark', 'sansara'),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_58a43bba66153',
				'label' => esc_html__('Header color mode', 'sansara'),
				'name' => 'header_color_mode',
				'type' => 'select',
				'choices' => array (
					'default' => esc_html__('Default', 'sansara'),
					'light' => esc_html__('Light', 'sansara'),
					'dark' => esc_html__('Dark', 'sansara'),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_58a43a8166152',
				'label' => esc_html__('Header style', 'sansara'),
				'name' => 'header_style',
				'type' => 'select',
				'choices' => array (
					'default' => esc_html__('Default', 'sansara'),
					'left_side' => esc_html__('Left Side', 'sansara'),
					'logo_left' => esc_html__('Logo left', 'sansara'),
				),
				'default_value' => 'default',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_58a592079667e',
				'label' => esc_html__('Navigation type', 'sansara'),
				'name' => 'navigation_type',
				'type' => 'select',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_58a43a8166152',
							'operator' => '!=',
							'value' => 'left_side',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'default' => esc_html__('Default', 'sansara'),
					'disabled' => esc_html__('Disabled', 'sansara'),
					'hidden_menu' => esc_html__('Hidden menu', 'sansara'),
					'visible_menu' => esc_html__('Visible menu', 'sansara'),
					'centered_menu' => esc_html__('Centered menu', 'sansara'),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_58a58ef19684e',
				'label' => esc_html__('Header container', 'sansara'),
				'name' => 'header_container',
				'type' => 'select',
				'choices' => array (
					'default' => esc_html__('Default', 'sansara'),
					'container' => esc_html__('Center container', 'sansara'),
					'container-fluid' => esc_html__('Full witdh', 'sansara'),
				),
				'default_value' => 'default',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_58a43c2266154',
				'label' => esc_html__('Header space', 'sansara'),
				'name' => 'header_space',
				'type' => 'radio',
				'choices' => array (
					'yes' => esc_html__('Yes', 'sansara'),
					'no' => esc_html__('No', 'sansara'),
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'yes',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_3498780913245',
				'label' => esc_html__('Grid lines', 'sansara'),
				'name' => 'grid_lines',
				'type' => 'radio',
				'choices' => array (
					'yes' => esc_html__('Yes', 'sansara'),
					'no' => esc_html__('No', 'sansara'),
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'no',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_34923413245',
				'label' => esc_html__('Wrap lines', 'sansara'),
				'name' => 'wrap_lines',
				'type' => 'radio',
				'choices' => array (
					'yes' => esc_html__('Yes', 'sansara'),
					'no' => esc_html__('No', 'sansara'),
				),
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_58a43a8166152',
							'operator' => '!=',
							'value' => 'left_side',
						),
					),
					'allorany' => 'all',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'no',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_3498709824245',
				'label' => esc_html__('Social links', 'sansara'),
				'name' => 'wl_social_links',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_34923413245',
							'operator' => '==',
							'value' => 'yes',
						),
					),
					'allorany' => 'all',
				),
				'type' => 'radio',
				'choices' => array (
					'yes' => esc_html__('Yes', 'sansara'),
					'no' => esc_html__('No', 'sansara'),
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'yes',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_2344523423',
				'label' => esc_html__('Custom mouse cursor', 'sansara'),
				'name' => 'custom_mouse_cursor',
				'type' => 'select',
				'choices' => array (
					'default' => esc_html__('Default', 'sansara'),
					'yes' => esc_html__('Yes', 'sansara'),
					'no' => esc_html__('No', 'sansara'),
				),
				'default_value' => 'default',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_58a45add62c81',
				'label' => esc_html__('Footer', 'sansara'),
				'name' => 'footer',
				'type' => 'select',
				'choices' => array (
					'default' => esc_html__('Default', 'sansara'),
					'minified' => esc_html__('Minified', 'sansara'),
					'show' => esc_html__('Show', 'sansara'),
					'hide' => esc_html__('Hide', 'sansara'),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-landing.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_project-settings',
		'title' => esc_html__('Project settings', 'sansara'),
		'fields' => array (
			array (
				'key' => 'field_34966239674',
				'label' => esc_html__('Sub heading', 'sansara'),
				'name' => 'project_sub_heading',
				'type' => 'text',
			),
			array (
				'key' => 'field_585653976745',
				'label' => esc_html__('Video url', 'sansara'),
				'name' => 'project_video_url',
				'type' => 'text',
			),
			array (
				'key' => 'field_59c0c8123r',
				'label' => esc_html__('Image position', 'sansara'),
				'name' => 'project_image_position',
				'type' => 'select',
				'choices' => array (
					'top' => esc_html__('Top', 'sansara'),
					'left' => esc_html__('Left', 'sansara'),
					'right' => esc_html__('Right', 'sansara'),
					'center' => esc_html__('Center', 'sansara'),
					'bottom' => esc_html__('Bottom', 'sansara'),
				),
				'default_value' => 'center',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59c0c83cdb361',
				'label' => esc_html__('Style', 'sansara'),
				'name' => 'project_style',
				'type' => 'select',
				'choices' => array (
					'default' => esc_html__('Default', 'sansara'),
					'grid' => esc_html__('Grid', 'sansara'),
					'slider' => esc_html__('Slider', 'sansara'),
					'masonry' => esc_html__('Masonry', 'sansara'),
					'parallax' => esc_html__('Parallax', 'sansara'),
					'horizontal' => esc_html__('Horizontal', 'sansara'),
					'before_after' => esc_html__('Before/After', 'sansara'),
					'right_side' => esc_html__('Images on right side', 'sansara'),
				),
				'default_value' => 'default',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_59c0c83nlg94',
				'label' => esc_html__('Cols count', 'sansara'),
				'name' => 'project_count_cols',
				'type' => 'select',
				'choices' => array (
					'default' => esc_html__('Default', 'sansara'),
					'col2' => esc_html__('Col 2', 'sansara'),
					'col3' => esc_html__('Col 3', 'sansara'),
					'col4' => esc_html__('Col 4', 'sansara'),
				),
				'default_value' => 'default',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_59c0c83cdb361',
							'operator' => '==',
							'value' => 'grid',
						),
						array (
							'field' => 'field_59c0c83cdb361',
							'operator' => '==',
							'value' => 'masonry',
						),
					),
					'allorany' => 'any',
				),
			),
			array (
				'key' => 'field_693267642',
				'label' => esc_html__('Count image (optional)', 'sansara'),
				'name' => 'project_count_images',
				'type' => 'text',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_59c0c83cdb361',
							'operator' => '==',
							'value' => 'grid',
						),
						array (
							'field' => 'field_59c0c83cdb361',
							'operator' => '==',
							'value' => 'masonry',
						),
					),
					'allorany' => 'any',
				),
			),
			array (
				'key' => 'field_56289563904',
				'label' => esc_html__('Before', 'sansara'),
				'name' => 'project_before_image',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_59c0c83cdb361',
							'operator' => '==',
							'value' => 'before_after',
						),
					),
					'allorany' => 'any',
				),
			),
			array (
				'key' => 'field_578765243897',
				'label' => esc_html__('After', 'sansara'),
				'name' => 'project_after_image',
				'type' => 'image',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_59c0c83cdb361',
							'operator' => '==',
							'value' => 'before_after',
						),
					),
					'allorany' => 'any',
				),
			),
			array (
				'key' => 'field_59c3a84023b44',
				'label' => esc_html__('Project image', 'sansara'),
				'name' => 'project_image',
				'type' => 'select',
				'choices' => array (
					'default' => esc_html__('Default', 'sansara'),
					'full' => esc_html__('Full', 'sansara'),
					'adaptive' => esc_html__('Adaptive', 'sansara'),
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_23498354',
				'label' => esc_html__('Year', 'sansara'),
				'name' => 'project_year',
				'type' => 'text',
			),
			array (
				'key' => 'field_4355923043',
				'label' => esc_html__('Location', 'sansara'),
				'name' => 'project_location',
				'type' => 'text',
			),
			array (
				'key' => 'field_23672324',
				'label' => esc_html__('Photography', 'sansara'),
				'name' => 'project_photography',
				'type' => 'text',
			),
			array (
				'key' => 'field_59234573234',
				'label' => esc_html__('Retouching', 'sansara'),
				'name' => 'project_retouching',
				'type' => 'text',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'fw-portfolio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_post-settings',
		'title' => esc_html__('Post settings', 'sansara'),
		'fields' => array (
			array (
				'key' => 'field_5a267b326916ab',
				'label' => esc_html__('Short description', 'sansara'),
				'name' => 'short_desc',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_product-settings',
		'title' => esc_html__('Product settings', 'sansara'),
		'fields' => array (
			array (
				'key' => 'field_175353125234',
				'label' => esc_html__('Video url', 'sansara'),
				'name' => 'product_video_url',
				'type' => 'text',
				'instructions' => esc_html__('Supported YouTube or Vimeo link', 'sansara'),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
