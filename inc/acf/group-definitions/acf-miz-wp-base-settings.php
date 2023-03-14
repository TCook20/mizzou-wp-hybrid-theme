<?php

if ( function_exists( 'acf_add_local_field_group' ) ) :
	acf_add_local_field_group(array(
		'key' => 'group_63c969570a009',
		'title' => 'General',
		'fields' => array(
			array(
				'key' => 'field_63c96957b6607',
				'label' => 'Google Tag Manager ID',
				'name' => 'google_tag_manager_id',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'maxlength' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_64108e178816c',
				'label' => 'Include Breadcrumbs',
				'name' => 'include_breadcrumbs',
				'aria-label' => '',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
				'ui' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'theme-general-settings',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 1,
	));

	acf_add_local_field_group(
		array(
			'key'                   => 'group_5f6e19adc1904',
			'title'                 => 'Calendar',
			'fields'                => array(
				array(
					'key'               => 'field_5f6e1beb55f49',
					'label'             => 'Notes',
					'name'              => '',
					'type'              => 'message',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'message'           => 'This will allow you to include events from the <a href="https://calendar.missouri.edu/" target="_blank">Mizzou Calendar</a>. Events from the Mizzou Calendar will not appear in the WordPress Dashboard. These events must be added up and updated through the Mizzou Calendar.',
					'new_lines'         => 'wpautop',
					'esc_html'          => 0,
				),
				array(
					'key'               => 'field_5f6e19df2a63e',
					'label'             => 'Calendar Exception Email Address',
					'name'              => 'calendar_exception_email',
					'type'              => 'email',
					'instructions'      => 'Should be the person that should receive the notice that a calendar issue has occurred. Usually, it\'s the site Admin',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => get_bloginfo('admin_email'),
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
				),
				array(
					'key'               => 'field_5f6e1a0b2a63f',
					'label'             => 'How to Filter Calendar Results',
					'name'              => 'method',
					'type'              => 'select',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'           => array(
						'search'     => 'Search',
						'department' => 'Department',
						'type'       => 'Type',
						'keyword'    => 'Keyword',
					),
					'default_value'     => false,
					'allow_null'        => 0,
					'multiple'          => 0,
					'ui'                => 0,
					'return_format'     => 'value',
					'ajax'              => 0,
					'placeholder'       => '',
				),
				array(
					'key'               => 'field_5f6e1a7f2a640',
					'label'             => 'Term',
					'name'              => 'term',
					'type'              => 'text',
					'instructions'      => '<p>If you selected <strong>Department</strong> previously then this field will have the group_id. If you selected <strong>Type</strong> earlier then this field will have the Event Type.</p>
	<p>If you selected either <strong>Type</strong> or <strong>Keyword</strong> then this field can accept multiple values separated by a single space.</p>',
					'required'          => 0,
					'conditional_logic' => 0,
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
			'label_placement'       => 'left',
			'instruction_placement' => 'field',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => '',
			'show_in_rest' => true,
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
			'show_in_rest' => 1,
		)
	);

	acf_add_local_field_group(array(
		'key' => 'group_6407840da8b11',
		'title' => 'Templating',
		'fields' => array(
			array(
				'key' => 'field_6407840d31137',
				'label' => 'Use Header Template Part',
				'name' => 'header_part',
				'aria-label' => '',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_6407843131138',
				'label' => 'Use Footer Template Part',
				'name' => 'footer_part',
				'aria-label' => '',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'theme-general-settings',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
endif;
