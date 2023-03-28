<?php
if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group(
		array(
			'key'                   => 'group_64232d4f917a1',
			'title'                 => 'DS-plus-decoration',
			'fields'                => array(
				array(
					'key'               => 'field_64232d4fb3cc0',
					'label'             => 'Decoration',
					'name'              => 'plus_decoration',
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
					'message'           => 'Add Plus Decoration',
					'default_value'     => 0,
					'ui'                => 0,
					'ui_on_text'        => '',
					'ui_off_text'       => '',
				),
				array(
					'key'               => 'field_64232d75b3cc1',
					'label'             => 'Decoration Location',
					'name'              => 'decoration_location',
					'aria-label'        => '',
					'type'              => 'checkbox',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_64232d4fb3cc0',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'           => array(
						'top-left'     => 'Top Left',
						'top-right'    => 'Top Right',
						'bottom-left'  => 'Bottom Left',
						'bottom-right' => 'Bottom Right',
					),
					'default_value'     => array(),
					'return_format'     => 'value',
					'allow_custom'      => 0,
					'layout'            => 'vertical',
					'toggle'            => 0,
					'save_custom'       => 0,
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'post',
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
