<?php
	$wp_customize->add_section('drop_shipping_pro_slider_section',array(
		'title'	=> __('Slider Settings','dropshipping-store-pro'),
		'description'	=> __('Add slider content here.','dropshipping-store-pro'),
		'priority'	=> null,
		'panel' => 'drop_shipping_pro_panel_id',
	));

	$wp_customize->add_setting('drop_shipping_pro_slider_enabledisable',array(
    'default'=> 'Enable',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
	$wp_customize->add_control('drop_shipping_pro_slider_enabledisable', array(
    'type' => 'radio',
    'label' => 'Do you want this section',
    'section' => 'drop_shipping_pro_slider_section',
    'choices' => array(
        'Enable' => 'Enable',
        'Disable' => 'Disable'
    ),
  ));

  $wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_slider_enabledisable', array(
    'selector' => '#slider #slidemainbox',
    'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_slider_enabledisable',
	));

	$wp_customize->add_setting('drop_shipping_pro_slide_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_slide_number',array(
		'label'	=> __('Number of slides to show','dropshipping-store-pro'),
		'section'	=> 'drop_shipping_pro_slider_section',
		'type'		=> 'number'
	));
	
	$count =  get_theme_mod('drop_shipping_pro_slide_number');
	for($i=1; $i<=$count; $i++) {
		
		$wp_customize->add_setting( 'drop_shipping_pro_slider_section_settings'.$i,
		    array(
		    'default' => '',
		    'transport' => 'postMessage',
		    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
		 ));
		 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_slider_section_settings'.$i,
		    array(
		    'label' => __('Slider Settings ','dropshipping-store-pro').$i,
		    'section' => 'drop_shipping_pro_slider_section'
		)));

		$wp_customize->add_setting('drop_shipping_pro_slide_image'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_slide_image'.$i,
	        array(
            'label' => __('Slider Background Image ','dropshipping-store-pro').$i.__(' (1600px * 562px)','dropshipping-store-pro'),
            'section' => 'drop_shipping_pro_slider_section',
            'settings' => 'drop_shipping_pro_slide_image'.$i
		)));

		$wp_customize->add_setting('drop_shipping_pro_slide_right_image'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_slide_right_image'.$i,
	        array(
            'label' => __('Slider Right Image ','dropshipping-store-pro').$i.__(' (440px * 550px)','dropshipping-store-pro'),
            'section' => 'drop_shipping_pro_slider_section',
            'settings' => 'drop_shipping_pro_slide_right_image'.$i
		)));
		
		$wp_customize->add_setting('drop_shipping_pro_slide_small_heading'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		$wp_customize->add_control('drop_shipping_pro_slide_small_heading'.$i,array(
			'label' => __('Slide Small Heading ','dropshipping-store-pro').$i,
			'section' => 'drop_shipping_pro_slider_section',
			'setting'	=> 'drop_shipping_pro_slide_small_heading'.$i,
			'type'	=> 'text'
		));
		
		$wp_customize->add_setting('drop_shipping_pro_slide_main_heading'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));
		$wp_customize->add_control('drop_shipping_pro_slide_main_heading'.$i,array(
			'label' => __('Slide Main Heading ','dropshipping-store-pro').$i,
			'section' => 'drop_shipping_pro_slider_section',
			'setting'	=> 'drop_shipping_pro_slide_main_heading'.$i,
			'type'	=> 'text'
		));	

		$wp_customize->add_setting('drop_shipping_pro_slide_text'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_textarea_field',
		));
		$wp_customize->add_control('drop_shipping_pro_slide_text'.$i,array(
			'label' => __('Slide Text ','dropshipping-store-pro').$i,
			'section' => 'drop_shipping_pro_slider_section',
			'setting'	=> 'drop_shipping_pro_slide_text'.$i,
			'type'	=> 'textarea'
		));

		$wp_customize->add_setting('drop_shipping_pro_slide_btntext'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_textarea_field',
		));
		$wp_customize->add_control('drop_shipping_pro_slide_btntext'.$i,array(
			'label' => __('Slider Button Text ','dropshipping-store-pro').$i,
			'section' => 'drop_shipping_pro_slider_section',
			'setting'	=> 'drop_shipping_pro_slide_btntext'.$i,
			'type'	=> 'text'
		));
		$wp_customize->add_setting('drop_shipping_pro_slide_btnurl'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control('drop_shipping_pro_slide_btnurl'.$i,array(
			'label' => __('Button URL ','dropshipping-store-pro').$i,
			'section' => 'drop_shipping_pro_slider_section',
			'setting'	=> 'drop_shipping_pro_slide_btnurl'.$i,
			'type'	=> 'text'
		));

	}	
	$wp_customize->add_setting( 'drop_shipping_pro_slider_other_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_slider_other_settings',
	    array(
	    'label' => __('Slider Other Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_slider_section'
	)));



	$wp_customize->add_setting('drop_shipping_pro_slide_delay',array(
		'default'	=> '1000',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_slide_delay',array(
		'label'	=> __('Slide Delay','dropshipping-store-pro'),
		'section'	=> 'drop_shipping_pro_slider_section',
		'description' => __('interval is in milliseconds. 1000 = 1 second -> so 1000 * 10 = 10 seconds', 'dropshipping-store-pro'),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_slide_remove_fade',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
  ));
   
  $wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_slide_remove_fade',
	   array(
	      'label' => esc_html__( 'Remove Fade Effect', 'dropshipping-store-pro' ),
	      'section' => 'drop_shipping_pro_slider_section'
	)));	

	$wp_customize->add_setting( 'drop_shipping_pro_slider_arrows',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
   	));
 
	$wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_slider_arrows',
   array(
      'label' => esc_html__( 'Show/Hide Slider Nav', 'dropshipping-store-pro' ),
      'section' => 'drop_shipping_pro_slider_section'
  )));

	$wp_customize->add_setting( 'drop_shipping_pro_slider_dots',
   array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
   	));
 
	$wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_slider_dots',
   array(
      'label' => esc_html__( 'Show/Hide Slider Dot', 'dropshipping-store-pro' ),
      'section' => 'drop_shipping_pro_slider_section'
  ))); 

	$wp_customize->add_setting( 'drop_shipping_pro_slider_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_slider_content_settings',
	    array(
	    'label' => __('Font and Color Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_slider_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_slide_content_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_slide_content_color', array(
		'label' => 'Slider Content Color',
		'section' => 'drop_shipping_pro_slider_section',
		'settings' => 'drop_shipping_pro_slide_content_color',
	)));

	//This is Slider Heading FontFamily picker setting
	$wp_customize->add_setting('drop_shipping_pro_slider_Heading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_slider_Heading_font_family', array(
	    'section'  => 'drop_shipping_pro_slider_section',
	    'label'    => __( 'Slider Heading Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_slider_Heading_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_slider_Heading_font_size',array(
		'label' => __('Slider Heading Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_slider_section',
		'setting' => 'drop_shipping_pro_slider_Heading_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting('drop_shipping_pro_slider_small_Heading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_slider_small_Heading_font_family', array(
    'section'  => 'drop_shipping_pro_slider_section',
    'label'    => __( 'Slider Small Heading Font Family','dropshipping-store-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_slider_small_Heading_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_slider_small_Heading_font_size',array(
    'label' => __('Slider Small Heading Font size','dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_slider_section',
    'setting' => 'drop_shipping_pro_slider_small_Heading_font_size',
    'type'    => 'number'
  ));

	//This is Slider Text FontFamily picker setting
	$wp_customize->add_setting('drop_shipping_pro_slider_text_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_slider_text_font_family', array(
    'section'  => 'drop_shipping_pro_slider_section',
    'label'    => __( 'Slider Text Font Family','dropshipping-store-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_slider_text_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_slider_text_font_size',array(
    'label' => __('Slider Text Font size','dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_slider_section',
    'setting' => 'drop_shipping_pro_slider_text_font_size',
    'type'    => 'number'
  ));

	//This is Slider Button FontFamily picker setting
	$wp_customize->add_setting('drop_shipping_pro_slider_btn_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_slider_btn_font_family', array(
    'section'  => 'drop_shipping_pro_slider_section',
    'label'    => __( 'Slider Button Font Family','dropshipping-store-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_slider_btn_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_slider_btn_font_size',array(
    'label' => __('Slider Button Font size','dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_slider_section',
    'setting' => 'drop_shipping_pro_slider_btn_font_size',
    'type'    => 'number'
  ));

	$wp_customize->add_setting( 'drop_shipping_pro_slide_btn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_slide_btn_color', array(
		'label' => 'Slider Button Color',
		'section' => 'drop_shipping_pro_slider_section',
		'settings' => 'drop_shipping_pro_slide_btn_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_slide_btn_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_slide_btn_bg_color', array(
		'label' => 'Slider Button Background Color',
		'section' => 'drop_shipping_pro_slider_section',
		'settings' => 'drop_shipping_pro_slide_btn_bg_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_slide_btn_bg_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_slide_btn_bg_hover_color', array(
		'label' => 'Slider Button Background Hover Color',
		'section' => 'drop_shipping_pro_slider_section',
		'settings' => 'drop_shipping_pro_slide_btn_bg_hover_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_slide_nav_arrow_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_slide_nav_arrow_color', array(
		'label' => 'Slider nav Color',
		'section' => 'drop_shipping_pro_slider_section',
		'settings' => 'drop_shipping_pro_slide_nav_arrow_color',
	)));
?>