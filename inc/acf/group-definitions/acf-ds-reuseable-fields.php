<?php
/**
 * ACF Reuseable Fields
 *
 * @package WordPress
 * @subpackage Theme
 * @category functions
 * @author Travis Cook, Digital Service, University of Missouri
 * @copyright 2023 Curators of the University of Missouri
 */

if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group(
		array(
			'key'                   => 'group_64232d4f917a1',
			'title'                 => 'MizzouDS-layer-displayOptions',
			'fields'                => array(
				array(
					'key'               => 'field_64248336fd14b',
					'label'             => 'Layer Background',
					'name'              => 'layer_background',
					'aria-label'        => '',
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
						'miz-black'     => 'Black',
						'miz-black-100' => 'Black 100',
						'miz-white'     => 'White',
						'image'         => 'Image',
					),
					'default_value'     => '',
					'return_format'     => 'value',
					'allow_null'        => 0,
					'layout'            => 'horizontal',
				),
				array(
					'key'               => 'field_6424837bfd14c',
					'label'             => 'Background Image',
					'name'              => 'image',
					'aria-label'        => '',
					'type'              => 'image',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_64248336fd14b',
								'operator' => '==',
								'value'    => 'image',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'return_format'     => 'array',
					'library'           => 'all',
					'min_width'         => '',
					'min_height'        => '',
					'min_size'          => '',
					'max_width'         => '',
					'max_height'        => '',
					'max_size'          => '',
					'mime_types'        => '',
					'preview_size'      => 'medium',
				),
				array(
					'key'               => 'field_646b6e2d0299d',
					'label'             => 'Background Image Overlay',
					'name'              => 'background_overlay_two',
					'aria-label'        => '',
					'type'              => 'button_group',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_64248336fd14b',
								'operator' => '==',
								'value'    => 'image',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'           => array(
						'black' => 'Black',
						'none'  => 'No Overlay',
					),
					'default_value'     => '',
					'return_format'     => 'value',
					'allow_null'        => 0,
					'layout'            => 'horizontal',
				),
				array(
					'key'               => 'field_645bb99f8db02',
					'label'             => 'Background Image Overlay',
					'name'              => 'background_overlay_three',
					'aria-label'        => '',
					'type'              => 'button_group',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_64248336fd14b',
								'operator' => '==',
								'value'    => 'image',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'           => array(
						'gold'  => 'Gold',
						'black' => 'Black',
						'none'  => 'No Overlay',
					),
					'default_value'     => '',
					'return_format'     => 'value',
					'allow_null'        => 0,
					'layout'            => 'horizontal',
				),
				array(
					'key'               => 'field_642483c7fd14d',
					'label'             => 'Content Background',
					'name'              => 'content_background',
					'aria-label'        => '',
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
						'miz-black'     => 'Black',
						'miz-black-100' => 'Black 100',
						'miz-white'     => 'White',
					),
					'default_value'     => '',
					'return_format'     => 'value',
					'allow_null'        => 0,
					'layout'            => 'horizontal',
				),
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
					'key'                       => 'field_64232d75b3cc1',
					'label'                     => 'Decoration Location',
					'name'                      => 'decoration_location',
					'aria-label'                => '',
					'type'                      => 'radio',
					'instructions'              => 'Select 1 location.',
					'required'                  => 0,
					'conditional_logic'         => array(
						array(
							array(
								'field'    => 'field_64232d4fb3cc0',
								'operator' => '==',
								'value'    => '1',
							),
						),
					),
					'wrapper'                   => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'                   => array(
						'top-left'     => 'Top Left',
						'top-right'    => 'Top Right',
						'bottom-left'  => 'Bottom Left',
						'bottom-right' => 'Bottom Right',
					),
					'default_value'             => array(),
					'return_format'             => 'value',
					'allow_custom'              => 0,
					'layout'                    => 'horizontal',
					'toggle'                    => 0,
					'save_custom'               => 0,
					'custom_choice_button_text' => 'Add new choice',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'acf-field-group',
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
