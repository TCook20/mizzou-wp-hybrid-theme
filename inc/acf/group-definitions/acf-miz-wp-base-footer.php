<?php
/**
 * Contains ACF Field Group settings/definitions for Footer settings and contact information used in the footer
 */

// footer option settings
if ( function_exists( 'acf_add_local_field_group' ) ) :
	acf_add_local_field_group(
		array(
			'key'                   => 'group_5f1f37b55e282',
			'title'                 => 'Footer options',
			'fields'                => array(
				array(
					'key'               => 'field_5f1f37bb9c806',
					'label'             => 'Theme',
					'name'              => 'footer_theme',
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
						'dark'  => 'Dark',
						'light' => 'Light',
					),
					'allow_null'        => 0,
					'other_choice'      => 0,
					'default_value'     => 'dark',
					'layout'            => 'horizontal',
					'return_format'     => 'value',
					'save_other_choice' => 0,
				),
				array(
					'key'               => 'field_contact_card_title',
					'label'             => 'Name',
					'name'              => 'footer_contact_card_title',
					'type'              => 'text',
					'instructions'      => 'Header for Contact Card',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => 'Contact us',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_5f1f3c139d93d',
					'label'             => 'Schema',
					'name'              => 'footer_schema',
					'type'              => 'button_group',
					'instructions'      => 'Enable schema information for SEO optimization on footer contacts?',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'           => array(
						'true'  => 'Yes',
						'false' => 'No',
					),
					'allow_null'        => 0,
					'other_choice'      => 0,
					'default_value'     => 'false',
					'layout'            => 'horizontal',
					'return_format'     => 'value',
					'save_other_choice' => 0,
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'acf-options-footer',
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
			'show_in_rest' => 1,
		)
	);
endif;
