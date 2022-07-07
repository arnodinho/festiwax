<?php

    /*-------------__Contact Page-------------------------*/
	$wp_customize->add_section('drop_shipping_pro_contact_page',array(
		'title'	=> __('Contact Page Settings','dropshipping-store-pro'),
		'description'	=> __('Add Contact Page Content Here....','dropshipping-store-pro'),
		'priority'	=> null,
		'panel' => 'drop_shipping_pro_panel_id',
	));

	$wp_customize->add_setting( 'drop_shipping_pro_contact_page_content_box_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));

	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_contact_page_content_box_settings',
	    array(
	    'label' => __('Contact Box Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_contact_page'
	)));

	$wp_customize->add_setting('drop_shipping_pro_contact_page_block_main_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_contact_page_block_main_title',array(
		'label' => __('Contact Block Title ','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'setting'	=> 'drop_shipping_pro_contact_page_block_main_title',
		'type'	=> 'text'
	));	

   	$wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_contact_box_number', array(
	    'selector' => '#contact .section-title',
	    'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_contact_box_number',
	));	 

	$wp_customize->add_setting('drop_shipping_pro_contact_box_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_contact_box_number',array(
		'label'	=> __('Number of Blocks to show','dropshipping-store-pro'),
		'section'	=> 'drop_shipping_pro_contact_page',
		'type'		=> 'number'
	));
	$block_number_count =  get_theme_mod('drop_shipping_pro_contact_box_number', 4);
	for($i=1;$i<=$block_number_count;$i++) {

        $wp_customize->add_setting( 'drop_shipping_pro_contact_box_image_separator_option'.$i,
            array(
                'default' => '',
                'transport' => 'postMessage',
                'sanitize_callback' => 'sanitize_textarea_field'
            )
        );
        $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_contact_box_image_separator_option'.$i,
            array(
                'label' => __('Block Settings ','dropshipping-store-pro').$i,
                'section' => 'drop_shipping_pro_contact_page'
            )
        ) );

		$wp_customize->add_setting('drop_shipping_pro_contact_box_heading'.$i,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));		
		$wp_customize->add_control('drop_shipping_pro_contact_box_heading'.$i,array(
			'label'	=> __('Block Title','dropshipping-store-pro'),
			'section'=> 'drop_shipping_pro_contact_page',
			'type'	=> 'text'
		));

		$wp_customize->add_setting('drop_shipping_pro_contact_box_text'.$i,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));		
		$wp_customize->add_control('drop_shipping_pro_contact_box_text'.$i,array(
			'label'	=> __('Block Text','dropshipping-store-pro'),
			'section'=> 'drop_shipping_pro_contact_page',
			'type'	=> 'text'
		));

	    $wp_customize->add_setting(
	      'drop_shipping_pro_contact_box_icon'.$i,
	      array(
	        'default'     => '',
	        'sanitize_callback' => 'sanitize_text_field'
	      )
	    );
	    $wp_customize->add_control(
	      new drop_shipping_pro_Fontawesome_Icon_Chooser(
	        $wp_customize,
	        'drop_shipping_pro_contact_box_icon'.$i,
	        array(
	          'settings'    => 'drop_shipping_pro_contact_box_icon'.$i,
	          'section'   => 'drop_shipping_pro_contact_page',
	          'type'      => 'icon',
	          'label'     => esc_html__( 'Choose Icon ', 'dropshipping-store-pro' ).$i,
	        )
	      )
	    );
	}

    $wp_customize->add_setting( 'drop_shipping_pro_contact_page_section_form_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_contact_page_section_form_setting',
        array(
          'label' => __('Contact Form Setting','dropshipping-store-pro'),
          'section' => 'drop_shipping_pro_contact_page'
        )
    ) );

	$wp_customize->add_setting('drop_shipping_pro_contact_page_main_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_contact_page_main_title',array(
		'label' => __('Contact Form Main Title ','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'setting'	=> 'drop_shipping_pro_contact_page_main_title',
		'type'	=> 'text'
	));	

	$wp_customize->add_setting('drop_shipping_pro_contact_page_shortcode',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	$wp_customize->add_control('drop_shipping_pro_contact_page_shortcode',array(
		'label'	=> __('Contact Form Shortcode','dropshipping-store-pro'),
		'section'	=> 'drop_shipping_pro_contact_page',
		'setting'	=> 'drop_shipping_pro_contact_page_shortcode',
		'type'		=> 'text'
		)
	);

    $wp_customize->add_setting( 'drop_shipping_pro_contact_page_section_map_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_contact_page_section_map_setting',
        array(
          'label' => __('Section Map Setting','dropshipping-store-pro'),
          'section' => 'drop_shipping_pro_contact_page'
        )
    ) );

    $wp_customize->add_setting('drop_shipping_pro_address_longitude',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('drop_shipping_pro_address_longitude',array(
        'label' => __('Longitude','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_contact_page',
        'setting'   => 'drop_shipping_pro_address_longitude',
        'type'=>'text'
    ));
    $wp_customize->add_setting('drop_shipping_pro_address_latitude',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('drop_shipping_pro_address_latitude',array(
        'label' => __('Latitude','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_contact_page',
        'setting'   => 'drop_shipping_pro_address_latitude',
        'type'=>'text'
    ));


	$wp_customize->add_setting( 'drop_shipping_pro_contact_page_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));

	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_contact_page_content_settings',
	    array(
	    'label' => __('Contact Color and Font Setting Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_contact_page'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_contact_main_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_contact_main_title_color', array(
		'label' => __('Main Title Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'settings' => 'drop_shipping_pro_contact_main_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_contact_main_title_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	  'drop_shipping_pro_contact_main_title_font_family', array(
	  'section'  => 'drop_shipping_pro_contact_page',
	  'label'    => __( 'Main Title Fonts','dropshipping-store-pro'),
	  'type'     => 'select',
	  'choices'  => $font_array,
	));
	
	$wp_customize->add_setting('drop_shipping_pro_contact_main_title_font_size',array(
		'default'   => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_contact_main_title_font_size',array(
		'label' => __('Main Title Font Size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'setting'   => 'drop_shipping_pro_contact_main_title_font_size',
		'type'  => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_contact_page_block_content_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_contact_page_block_content_color', array(
		'label' => 'Block Content Color',
		'section' => 'drop_shipping_pro_contact_page',
		'settings' => 'drop_shipping_pro_contact_page_block_content_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_contact_page_block_Heading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_contact_page_block_Heading_font_family', array(
	    'section'  => 'drop_shipping_pro_contact_page',
	    'label'    => __( 'Block Heading Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_contact_page_block_Heading_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_contact_page_block_Heading_font_size',array(
		'label' => __('Block Heading Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'setting' => 'drop_shipping_pro_contact_page_block_Heading_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting('drop_shipping_pro_contact_page_block_text_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_contact_page_block_text_font_family', array(
	    'section'  => 'drop_shipping_pro_contact_page',
	    'label'    => __( 'Block Text Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_contact_page_block_text_font_size',array(
	  'default' => '',
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_contact_page_block_text_font_size',array(
		'label' => __('Block Text Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'setting' => 'drop_shipping_pro_contact_page_block_text_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_contact_page_block_icon_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_contact_page_block_icon_color', array(
		'label' => 'Block Icon Color',
		'section' => 'drop_shipping_pro_contact_page',
		'settings' => 'drop_shipping_pro_contact_page_block_icon_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_contact_page_block_icon_font_size',array(
	  'default' => '',
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_contact_page_block_icon_font_size',array(
		'label' => __('Block Icon Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'setting' => 'drop_shipping_pro_contact_page_block_icon_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_contact_page_block_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_contact_page_block_hover_color', array(
		'label' => 'Block Hover Color',
		'section' => 'drop_shipping_pro_contact_page',
		'settings' => 'drop_shipping_pro_contact_page_block_hover_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_contact_form_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_contact_form_title_color', array(
		'label' => __('Form Title Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'settings' => 'drop_shipping_pro_contact_form_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_contact_form_title_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	  'drop_shipping_pro_contact_form_title_font_family', array(
	  'section'  => 'drop_shipping_pro_contact_page',
	  'label'    => __( 'Form Title Fonts','dropshipping-store-pro'),
	  'type'     => 'select',
	  'choices'  => $font_array,
	));
	
	$wp_customize->add_setting('drop_shipping_pro_contact_form_title_font_size',array(
		'default'   => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_contact_form_title_font_size',array(
		'label' => __('Form Title Font Size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'setting'   => 'drop_shipping_pro_contact_form_title_font_size',
		'type'  => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_contact_form_input_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_contact_form_input_color', array(
		'label' => __('Form Input Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'settings' => 'drop_shipping_pro_contact_form_input_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_contact_form_input_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	  'drop_shipping_pro_contact_form_input_font_family', array(
	  'section'  => 'drop_shipping_pro_contact_page',
	  'label'    => __( 'Form Input Fonts','dropshipping-store-pro'),
	  'type'     => 'select',
	  'choices'  => $font_array,
	));
	
	$wp_customize->add_setting('drop_shipping_pro_contact_form_input_font_size',array(
		'default'   => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_contact_form_input_font_size',array(
		'label' => __('Form Input Font Size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'setting'   => 'drop_shipping_pro_contact_form_input_font_size',
		'type'  => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_contact_small_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_contact_small_title_color', array(
		'label' => __('Small Title Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'settings' => 'drop_shipping_pro_contact_small_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_contact_small_title_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	  'drop_shipping_pro_contact_small_title_font_family', array(
	  'section'  => 'drop_shipping_pro_contact_page',
	  'label'    => __( 'Small Title Fonts','dropshipping-store-pro'),
	  'type'     => 'select',
	  'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_contact_small_title_font_size',array(
		'default'   => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_contact_small_title_font_size',array(
		'label' => __('Small Title Font Size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'setting'   => 'drop_shipping_pro_contact_small_title_font_size',
		'type'  => 'number'
	));

	

	$wp_customize->add_setting( 'drop_shipping_pro_contact_submit_btn_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_contact_submit_btn_color', array(
		'label' => __('Submit Button Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'settings' => 'drop_shipping_pro_contact_submit_btn_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_contact_submit_btn_bg_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_contact_submit_btn_bg_color', array(
		'label' => __('Submit Button Background Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'settings' => 'drop_shipping_pro_contact_submit_btn_bg_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_contact_submit_btn_bg_hover_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_contact_submit_btn_bg_hover_color', array(
		'label' => __('Submit Button Background Hover Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'settings' => 'drop_shipping_pro_contact_submit_btn_bg_hover_color',
	)));


	$wp_customize->add_setting('drop_shipping_pro_contact_submit_btn_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	  'drop_shipping_pro_contact_submit_btn_font_family', array(
	  'section'  => 'drop_shipping_pro_contact_page',
	  'label'    => __( 'Submit Button Fonts','dropshipping-store-pro'),
	  'type'     => 'select',
	  'choices'  => $font_array,
	));
	
	$wp_customize->add_setting('drop_shipping_pro_contact_submit_btn_font_size',array(
		'default'   => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_contact_submit_btn_font_size',array(
		'label' => __('Submit Button Font Size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_contact_page',
		'setting'   => 'drop_shipping_pro_contact_submit_btn_font_size',
		'type'  => 'number'
	));

	/*----------- 404 Settings -----------------------*/
	$wp_customize->add_section('drop_shipping_pro_error_page',array(
		'title'	=> __('404 Page Settings','dropshipping-store-pro'),
		'description'	=> __('Add 404 Page Content Here....','dropshipping-store-pro'),
		'priority'	=> null,
		'panel' => 'drop_shipping_pro_panel_id',
	));

    $wp_customize->add_setting( 'drop_shipping_pro_error_page_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_error_page_setting',
        array(
          'label' => __('404 Content Settings','dropshipping-store-pro'),
          'section' => 'drop_shipping_pro_error_page'
        )
    ) );


   $wp_customize->add_setting('drop_shipping_pro_error_page_title',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('drop_shipping_pro_error_page_title',array(
        'label' => __('Add Title','dropshipping-store-pro'),
        'input_attrs' => array(
                'placeholder' => __( '404 Not Found', 'dropshipping-store-pro' ),
            ),
        'section'=> 'drop_shipping_pro_error_page',
        'type'=> 'text'
    ));

   $wp_customize->add_setting('drop_shipping_pro_error_page_small_head',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('drop_shipping_pro_error_page_small_head',array(
        'label' => __('Add Small Title','dropshipping-store-pro'),
        'section'=> 'drop_shipping_pro_error_page',
        'type'=> 'text'
    ));

   $wp_customize->add_setting('drop_shipping_pro_error_page_content',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('drop_shipping_pro_error_page_content',array(
        'label' => __('Add Text','dropshipping-store-pro'),
        'section'=> 'drop_shipping_pro_error_page',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('drop_shipping_pro_error_page_button_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('drop_shipping_pro_error_page_button_text',array(
        'label' => __('Add Button Text','dropshipping-store-pro'),
        'input_attrs' => array(
                'placeholder' => __( 'GO BACK', 'dropshipping-store-pro' ),
            ),
        'section'=> 'drop_shipping_pro_error_page',
        'type'=> 'text'
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_error_page_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_error_page_setting',
        array(
          'label' => __('404 Content Color and Font Settings','dropshipping-store-pro'),
          'section' => 'drop_shipping_pro_error_page'
        )
    ));

	$wp_customize->add_setting( 'drop_shipping_pro_error_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_error_title_color', array(
		'label' => __('Title Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_error_page',
		'settings' => 'drop_shipping_pro_error_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_error_title_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	  'drop_shipping_pro_error_title_font_family', array(
	  'section'  => 'drop_shipping_pro_error_page',
	  'label'    => __( 'Title Fonts','dropshipping-store-pro'),
	  'type'     => 'select',
	  'choices'  => $font_array,
	));
	
	$wp_customize->add_setting('drop_shipping_pro_error_title_font_size',array(
		'default'   => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_error_title_font_size',array(
		'label' => __('Title Font Size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_error_page',
		'setting'   => 'drop_shipping_pro_error_title_font_size',
		'type'  => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_error_small_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_error_small_title_color', array(
		'label' => __('Small Title Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_error_page',
		'settings' => 'drop_shipping_pro_error_small_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_error_small_title_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	  'drop_shipping_pro_error_small_title_font_family', array(
	  'section'  => 'drop_shipping_pro_error_page',
	  'label'    => __( 'Small Title Fonts','dropshipping-store-pro'),
	  'type'     => 'select',
	  'choices'  => $font_array,
	));
	
	$wp_customize->add_setting('drop_shipping_pro_error_small_title_font_size',array(
		'default'   => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_error_small_title_font_size',array(
		'label' => __('Small Title Font Size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_error_page',
		'setting'   => 'drop_shipping_pro_error_small_title_font_size',
		'type'  => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_error_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_error_text_color', array(
		'label' => __('Text Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_error_page',
		'settings' => 'drop_shipping_pro_error_text_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_error_text_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	  'drop_shipping_pro_error_text_font_family', array(
	  'section'  => 'drop_shipping_pro_error_page',
	  'label'    => __( 'Text Fonts','dropshipping-store-pro'),
	  'type'     => 'select',
	  'choices'  => $font_array,
	));
	
	$wp_customize->add_setting('drop_shipping_pro_error_text_font_size',array(
		'default'   => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_error_text_font_size',array(
		'label' => __('Text Font Size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_error_page',
		'setting'   => 'drop_shipping_pro_error_text_font_size',
		'type'  => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_error_btn_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_error_btn_color', array(
		'label' => __('Button Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_error_page',
		'settings' => 'drop_shipping_pro_error_btn_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_error_btn_bg_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_error_btn_bg_color', array(
		'label' => __('Button Background Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_error_page',
		'settings' => 'drop_shipping_pro_error_btn_bg_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_error_btn_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	  'drop_shipping_pro_error_btn_font_family', array(
	  'section'  => 'drop_shipping_pro_error_page',
	  'label'    => __( 'Button Fonts','dropshipping-store-pro'),
	  'type'     => 'select',
	  'choices'  => $font_array,
	));
	
	$wp_customize->add_setting('drop_shipping_pro_error_btn_font_size',array(
		'default'   => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_error_btn_font_size',array(
		'label' => __('Button Font Size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_error_page',
		'setting'   => 'drop_shipping_pro_error_btn_font_size',
		'type'  => 'number'
	));

	/*----------- FAQ Settings -----------------------*/
	$wp_customize->add_section('drop_shipping_pro_faq_page',array(
		'title'	=> __('FAQ Page Settings','dropshipping-store-pro'),
		'description'	=> __('Add FAQ Page Content Here....','dropshipping-store-pro'),
		'priority'	=> null,
		'panel' => 'drop_shipping_pro_panel_id',
	));

    $wp_customize->add_setting( 'drop_shipping_pro_faq_page_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_faq_page_setting',
        array(
          'label' => __('FAQ Content Settings','dropshipping-store-pro'),
          'section' => 'drop_shipping_pro_faq_page'
        )
    ) );

	$wp_customize->add_setting('drop_shipping_pro_faq_page_main_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_faq_page_main_title',array(
		'label' => __('Faq Main Title ','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_faq_page',
		'setting'	=> 'drop_shipping_pro_faq_page_main_title',
		'type'	=> 'text'
	));	

    $wp_customize->add_setting('drop_shipping_pro_faq_temp_faq_number', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('drop_shipping_pro_faq_temp_faq_number',array(
        'label' => __('Number of Faq','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_faq_page',
        'type' => 'number'
    ));
    $faq_count = get_theme_mod("drop_shipping_pro_faq_temp_faq_number");
    for ($i=1; $i<= $faq_count; $i++) {
        $wp_customize->add_setting('drop_shipping_pro_faq_temp_faq_que'.$i, array(
          'default' => '',
          'sanitize_callback' => 'sanitize_text_field',
          ));
        $wp_customize->add_control('drop_shipping_pro_faq_temp_faq_que'.$i,array(
          'label' => __('Faq Question','dropshipping-store-pro').$i,
          'section' => 'drop_shipping_pro_faq_page',
          'type' => 'text'
        ));
        $wp_customize->add_setting('drop_shipping_pro_faq_temp_faq_ans'.$i, array(
          'default' => '',
          'sanitize_callback' => 'sanitize_text_field',
          ));
        $wp_customize->add_control('drop_shipping_pro_faq_temp_faq_ans'.$i,array(
          'label' => __('Faq Answer','dropshipping-store-pro').$i,
          'section' => 'drop_shipping_pro_faq_page',
          'type' => 'text'
        ));
    }

    $wp_customize->add_setting( 'drop_shipping_pro_faq_page_color_setting',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_faq_page_color_setting',
        array(
          'label' => __('FAQ Content Color and Font Settings','dropshipping-store-pro'),
          'section' => 'drop_shipping_pro_faq_page'
        )
    ) );

	$wp_customize->add_setting( 'drop_shipping_pro_faq_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_faq_title_color', array(
		'label' => __('Title Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_faq_page',
		'settings' => 'drop_shipping_pro_faq_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_faq_title_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	  'drop_shipping_pro_faq_title_font_family', array(
	  'section'  => 'drop_shipping_pro_faq_page',
	  'label'    => __( 'Title Fonts','dropshipping-store-pro'),
	  'type'     => 'select',
	  'choices'  => $font_array,
	));
	
	$wp_customize->add_setting('drop_shipping_pro_faq_title_font_size',array(
		'default'   => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_faq_title_font_size',array(
		'label' => __('Title Font Size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_faq_page',
		'setting'   => 'drop_shipping_pro_faq_title_font_size',
		'type'  => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_faq_que_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_faq_que_color', array(
		'label' => __('Question Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_faq_page',
		'settings' => 'drop_shipping_pro_faq_que_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_faq_que_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	  'drop_shipping_pro_faq_que_font_family', array(
	  'section'  => 'drop_shipping_pro_faq_page',
	  'label'    => __( 'Question Fonts','dropshipping-store-pro'),
	  'type'     => 'select',
	  'choices'  => $font_array,
	));
	
	$wp_customize->add_setting('drop_shipping_pro_faq_que_font_size',array(
		'default'   => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_faq_que_font_size',array(
		'label' => __('Question Font Size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_faq_page',
		'setting'   => 'drop_shipping_pro_faq_que_font_size',
		'type'  => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_faq_ans_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_faq_ans_color', array(
		'label' => __('Answer Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_faq_page',
		'settings' => 'drop_shipping_pro_faq_ans_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_faq_ans_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
	  'drop_shipping_pro_faq_ans_font_family', array(
	  'section'  => 'drop_shipping_pro_faq_page',
	  'label'    => __( 'Answer Fonts','dropshipping-store-pro'),
	  'type'     => 'select',
	  'choices'  => $font_array,
	));
	
	$wp_customize->add_setting('drop_shipping_pro_faq_ans_font_size',array(
		'default'   => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_faq_ans_font_size',array(
		'label' => __('Answer Font Size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_faq_page',
		'setting'   => 'drop_shipping_pro_faq_ans_font_size',
		'type'  => 'number'
	));

