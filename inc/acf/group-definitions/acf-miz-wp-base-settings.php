<?php

if ( function_exists( 'acf_add_local_field_group' ) ) :
	acf_add_local_field_group(
		array(
			'key'                   => 'group_63c969570a009',
			'title'                 => 'General',
			'fields'                => array(
				array(
					'key'               => 'field_63c96957b6607',
					'label'             => 'Google Tag Manager ID',
					'name'              => 'google_tag_manager_id',
					'aria-label'        => '',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'maxlength'         => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
				),
				array(
					'key'               => 'field_64108e178816c',
					'label'             => 'Include Breadcrumbs',
					'name'              => 'include_breadcrumbs',
					'aria-label'        => '',
					'type'              => 'true_false',
					'instructions'      => 'This will only include breadcrumbs on Twig driven templates.',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'message'           => '',
					'default_value'     => 0,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
					'ui'                => 1,
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'theme-general-settings',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
			'show_in_rest'          => 1,
		)
	);

	acf_add_local_field_group(
		array(
			'key'                   => 'group_5f1b0c2f0b1e0',
			'title'                 => 'Search',
			'fields'                => array(
				array(
					'key'               => 'field_5f1b0c9e8e61b',
					'label'             => 'Google Custom Search Engine',
					'name'              => 'gcse',
					'type'              => 'button_group',
					'instructions'      => 'Select \'on\' to turn on the GCSE integration, \'off\' to disable it.',
					'required'          => 1,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'           => array(
						'on'  => 'On',
						'off' => 'Off',
					),
					'allow_null'        => 0,
					'other_choice'      => 0,
					'default_value'     => 'off',
					'layout'            => 'horizontal',
					'return_format'     => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key'               => 'field_5f1b0e91e425f',
					'label'             => 'Google Custom Search ID',
					'name'              => 'google_cse_id',
					'type'              => 'text',
					'instructions'      => 'Paste your GCSE ID as provided from Digital Service',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_5f1b0c9e8e61b',
								'operator' => '==',
								'value'    => 'on',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_5f1b3045ffaf8',
					'label'             => 'Show Legacy settings',
					'name'              => 'gsa_show_legacy_settings',
					'type'              => 'button_group',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'           => array(
						'Hide' => 'Hide',
						'Show' => 'Show',
					),
					'allow_null'        => 0,
					'other_choice'      => 0,
					'default_value'     => 'Hide',
					'layout'            => 'horizontal',
					'return_format'     => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key'               => 'field_5f1b0c6c8e61a',
					'label'             => 'client',
					'name'              => 'client',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_5f1b3045ffaf8',
								'operator' => '==',
								'value'    => 'Show',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_5f1b0cad8e61c',
					'label'             => 'output',
					'name'              => 'output',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_5f1b3045ffaf8',
								'operator' => '==',
								'value'    => 'Show',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_5f1b0cb78e61d',
					'label'             => 'proxystylesheet',
					'name'              => 'proxystylesheet',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_5f1b3045ffaf8',
								'operator' => '==',
								'value'    => 'Show',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_5f1b0cc18e61e',
					'label'             => 'site',
					'name'              => 'site',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_5f1b3045ffaf8',
								'operator' => '==',
								'value'    => 'Show',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_5f1b0ccb8e61f',
					'label'             => 'sitesearch',
					'name'              => 'sitesearch',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_5f1b3045ffaf8',
								'operator' => '==',
								'value'    => 'Show',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_5f1b0cd38e620',
					'label'             => 'url',
					'name'              => 'url',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_5f1b3045ffaf8',
								'operator' => '==',
								'value'    => 'Show',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'theme-general-settings',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => array(
				0 => 'custom_fields',
			),
			'active'                => true,
			'description'           => '',
			'show_in_rest'          => 1,
		)
	);

	acf_add_local_field_group(
		array(
			'key'                   => 'group_6407840da8b11',
			'title'                 => 'Templating',
			'fields'                => array(
				array(
					'key'               => 'field_6407840d31137',
					'label'             => 'Use Header Template Part',
					'name'              => 'header_part',
					'aria-label'        => '',
					'type'              => 'true_false',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'message'           => '',
					'default_value'     => 1,
					'ui'                => 1,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				),
				array(
					'key'               => 'field_6407843131138',
					'label'             => 'Use Footer Template Part',
					'name'              => 'footer_part',
					'aria-label'        => '',
					'type'              => 'true_false',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'message'           => '',
					'default_value'     => 1,
					'ui'                => 1,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'theme-general-settings',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
			'show_in_rest'          => 0,
		)
	);
endif;
