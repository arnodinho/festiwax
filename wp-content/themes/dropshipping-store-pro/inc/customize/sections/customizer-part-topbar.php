<?php

	//Topbar Section
	$wp_customize->add_section('drop_shipping_pro_topbar_section',array(
		'title'	=> __('Topbar','dropshipping-store-pro'),
		'description'	=> __('Topbar Settings','dropshipping-store-pro'),
		'priority'	=> null,
		'panel' => 'drop_shipping_pro_panel_id',
	));	

	$wp_customize->add_setting('drop_shipping_pro_topbar_enabledisable',array(
    'default'=> 'Enable',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
	$wp_customize->add_control('drop_shipping_pro_topbar_enabledisable', array(
    'type' => 'radio',
    'label' => 'Do you want this section',
    'section' => 'drop_shipping_pro_topbar_section',
    'choices' => array(
        'Enable' => 'Enable',
        'Disable' => 'Disable'
    ),
  ));

	$wp_customize->add_setting( 'drop_shipping_pro_topbar_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_bg_color', array(
		'label' => 'Topbar Background Color',
		'section' => 'drop_shipping_pro_topbar_section',
		'settings' => 'drop_shipping_pro_topbar_bg_color',
	)));

	$wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_topbar_bg_color', array(
      'selector' => '.topbar-note p',
      'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_topbar_bg_color',
  ));

	$wp_customize->add_setting( 'drop_shipping_pro_topbar_setting', array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	));
	$wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_topbar_setting', array(
	      'label' => __('Topbar Content Setting','dropshipping-store-pro'),
	      'section' => 'drop_shipping_pro_topbar_section'
	)));

	$wp_customize->add_setting('drop_shipping_pro_topbar_notice',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_textarea_field'
	));
	$wp_customize->add_control('drop_shipping_pro_topbar_notice',array(
		'label'	=> __('Add Welcome Text','dropshipping-store-pro'),
		'section'	=> 'drop_shipping_pro_topbar_section',
		'setting'	=> 'drop_shipping_pro_topbar_notice ',
		'type'		=> 'text'
	));

  $wp_customize->add_setting('drop_shipping_pro_topbar_section_shipping_title',array(
    'default' => __('Track Your Order', 'dropshipping-store-pro'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_section_shipping_title',array(
    'label' => __('Shipping Title','dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_section_shipping_title',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('drop_shipping_pro_topbar_shipping_shortcode',array(
    'default' => __('[woocommerce_order_tracking]', 'dropshipping-store-pro'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_shipping_shortcode',array(
    'label' => __('Add Shipping Shortcode','dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_shipping_shortcode',
    'type'    => 'text'
  ));

$wp_customize->add_setting('drop_shipping_pro_topbar_compare',array(
    'default' => __('Compare', 'dropshipping-store-pro'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_compare',array(
    'label' => __('Compare Title','dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_compare',
    'type'    => 'text'
  ));
  
  $wp_customize->add_setting('drop_shipping_pro_topbar_compare_url',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_compare_url',array(
    'label' => __('Compare URL ','dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_compare_url',
    'type'  => 'text'
  ));

  $wp_customize->add_setting('drop_shipping_pro_topbar_location',array(
    'default' => __('Location', 'dropshipping-store-pro'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_location',array(
    'label' => __('Location Title','dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_location',
    'type'    => 'text'
  ));

  $wp_customize->add_setting('drop_shipping_pro_topbar_location_url',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_location_url',array(
    'label' => __('Location URL ','dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_location_url',
    'type'  => 'text'
  ));

  $wp_customize->add_setting(
    'drop_shipping_pro_topbar_location_icon',
    array(
      'default'     => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    new drop_shipping_pro_Fontawesome_Icon_Chooser(
      $wp_customize,
      'drop_shipping_pro_topbar_location_icon',
      array(
      'settings'    => 'drop_shipping_pro_topbar_location_icon',
      'section'   => 'drop_shipping_pro_topbar_section',
      'type'      => 'icon',
      'label'     => esc_html__( 'Choose Icon', 'dropshipping-store-pro' ),
  )));



  $wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_header_category_title', array(
      'selector' => '.header-search-bar',
      'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_header_category_title',
  ));

  $wp_customize->add_setting('drop_shipping_pro_header_category_title',array(
    'default' => __('All Categories', 'dropshipping-store-pro'),
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_header_category_title',array(
    'label' => __('All Categories Title','dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_header_category_title',
    'type'    => 'text'
  ));

  $wp_customize->add_setting(
    'drop_shipping_pro_category_title_icon',
    array(
      'default'     => 'fas fa-chevron-down',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    new drop_shipping_pro_Fontawesome_Icon_Chooser(
      $wp_customize,
      'drop_shipping_pro_category_title_icon',
      array(
      'settings'    => 'drop_shipping_pro_category_title_icon',
      'section'   => 'drop_shipping_pro_topbar_section',
      'type'      => 'icon',
      'label'     => esc_html__( 'Choose Icon', 'dropshipping-store-pro' ),
  )));

  $wp_customize->add_setting(
    'drop_shipping_pro_header_support_icon',
    array(
      'default'     => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    new drop_shipping_pro_Fontawesome_Icon_Chooser(
      $wp_customize,
      'drop_shipping_pro_header_support_icon',
      array(
      'settings'    => 'drop_shipping_pro_header_support_icon',
      'section'   => 'drop_shipping_pro_topbar_section',
      'type'      => 'icon',
      'label'     => esc_html__( 'Choose Icon', 'dropshipping-store-pro' ),
  )));

  $wp_customize->add_setting('drop_shipping_pro_header_support_text',array(
      'default'=> '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_header_support_text',array(
      'label' => __('Support Text','dropshipping-store-pro'),
      'section'=> 'drop_shipping_pro_topbar_section',
      'setting'=> 'drop_shipping_pro_header_support_text',
      'type'=> 'text'
  ));

  $wp_customize->add_setting('drop_shipping_pro_header_number',array(
      'default'=> '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_header_number',array(
      'label' => __('Add Number','dropshipping-store-pro'),
      'section'=> 'drop_shipping_pro_topbar_section',
      'setting'=> 'drop_shipping_pro_header_number',
      'type'=> 'number'
  ));

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_content_setting', array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_topbar_content_setting', array(
        'label' => __('Topbar Color and Font Setting','event-management-pro'),
        'section' => 'drop_shipping_pro_topbar_section'
  )));  

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_content_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_content_color', array(
    'label' => 'Topbar Content Color',
    'section' => 'drop_shipping_pro_topbar_section',
    'settings' => 'drop_shipping_pro_topbar_content_color',
  )));

  $wp_customize->add_setting('drop_shipping_pro_topbar_content_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
  $wp_customize->add_control(
    'drop_shipping_pro_topbar_content_font_family', array(
    'section'  => 'drop_shipping_pro_topbar_section',
    'label'    => __( 'Topbar Content Font Family','event-management-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('drop_shipping_pro_topbar_content_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_content_font_size',array(
    'label' => __('Topbar Content Font size','event-management-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_content_font_size',
    'type'    => 'number'
  ));

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_translator_list_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_translator_list_color', array(
    'label' => 'Topbar Traslator List Color',
    'section' => 'drop_shipping_pro_topbar_section',
    'settings' => 'drop_shipping_pro_topbar_translator_list_color',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_translator_list_border_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_translator_list_border_color', array(
    'label' => 'Topbar Traslator List Border Color',
    'section' => 'drop_shipping_pro_topbar_section',
    'settings' => 'drop_shipping_pro_topbar_translator_list_border_color',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_translator_list_hover_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_translator_list_hover_color', array(
    'label' => 'Topbar Traslator List Hover Color',
    'section' => 'drop_shipping_pro_topbar_section',
    'settings' => 'drop_shipping_pro_topbar_translator_list_hover_color',
  )));

  $wp_customize->add_setting('drop_shipping_pro_topbar_translatore_list_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
  $wp_customize->add_control(
    'drop_shipping_pro_topbar_translatore_list_font_family', array(
    'section'  => 'drop_shipping_pro_topbar_section',
    'label'    => __( 'Topbar Traslator List Font Family','event-management-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('drop_shipping_pro_topbar_translator_list_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_translator_list_font_size',array(
    'label' => __('Topbar Traslator List Font size','event-management-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_translator_list_font_size',
    'type'    => 'number'
  ));

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_category_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_category_color', array(
    'label' => 'Category Title Color',
    'section' => 'drop_shipping_pro_topbar_section',
    'settings' => 'drop_shipping_pro_topbar_category_color',
  )));

  $wp_customize->add_setting('drop_shipping_pro_topbar_category_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
  $wp_customize->add_control(
    'drop_shipping_pro_topbar_category_font_family', array(
    'section'  => 'drop_shipping_pro_topbar_section',
    'label'    => __( 'Category Title Font Family','event-management-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('drop_shipping_pro_topbar_category_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_category_font_size',array(
    'label' => __('Category Title Font size','event-management-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_category_font_size',
    'type'    => 'number'
  ));

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_search_input_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_search_input_color', array(
    'label' => 'Category Title Color',
    'section' => 'drop_shipping_pro_topbar_section',
    'settings' => 'drop_shipping_pro_topbar_search_input_color',
  )));

  $wp_customize->add_setting('drop_shipping_pro_topbar_search_input_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
  $wp_customize->add_control(
    'drop_shipping_pro_topbar_search_input_font_family', array(
    'section'  => 'drop_shipping_pro_topbar_section',
    'label'    => __( 'Category Title Font Family','event-management-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('drop_shipping_pro_topbar_search_input_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_search_input_font_size',array(
    'label' => __('Category Title Font size','event-management-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_search_input_font_size',
    'type'    => 'number'
  ));

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_search_icon_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_search_icon_color', array(
    'label' => 'Category Title Color',
    'section' => 'drop_shipping_pro_topbar_section',
    'settings' => 'drop_shipping_pro_topbar_search_icon_color',
  )));

  $wp_customize->add_setting('drop_shipping_pro_topbar_search_icon_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_search_icon_font_size',array(
    'label' => __('Category Title Font size','event-management-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_search_icon_font_size',
    'type'    => 'number'
  ));

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_search_bg_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_search_bg_color', array(
    'label' => 'Search Background Color',
    'section' => 'drop_shipping_pro_topbar_section',
    'settings' => 'drop_shipping_pro_topbar_search_bg_color',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_support_icon_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_support_icon_color', array(
    'label' => 'Support Icon Color',
    'section' => 'drop_shipping_pro_topbar_section',
    'settings' => 'drop_shipping_pro_topbar_support_icon_color',
  )));

  $wp_customize->add_setting('drop_shipping_pro_topbar_support_icon_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_support_icon_font_size',array(
    'label' => __('Support Icon Font size','event-management-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_support_icon_font_size',
    'type'    => 'number'
  ));

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_support_text_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_support_text_color', array(
    'label' => 'Support Text and Number Color',
    'section' => 'drop_shipping_pro_topbar_section',
    'settings' => 'drop_shipping_pro_topbar_support_text_color',
  )));

  $wp_customize->add_setting('drop_shipping_pro_topbar_support_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
  $wp_customize->add_control(
    'drop_shipping_pro_topbar_support_title_font_family', array(
    'section'  => 'drop_shipping_pro_topbar_section',
    'label'    => __( 'Support Title Font Family','event-management-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('drop_shipping_pro_topbar_support_title_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_support_title_font_size',array(
    'label' => __('Support Title Font size','event-management-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_support_title_font_size',
    'type'    => 'number'
  ));

  $wp_customize->add_setting('drop_shipping_pro_topbar_support_text_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
  $wp_customize->add_control(
    'drop_shipping_pro_topbar_support_text_font_family', array(
    'section'  => 'drop_shipping_pro_topbar_section',
    'label'    => __( 'Number Font Family','event-management-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('drop_shipping_pro_topbar_support_text_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_support_text_font_size',array(
    'label' => __('Number Font size','event-management-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_support_text_font_size',
    'type'    => 'number'
  ));

  $wp_customize->add_setting('drop_shipping_pro_topbar_user_icon_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_topbar_user_icon_font_size',array(
    'label' => __('User and Wishlist Icon Font size','event-management-pro'),
    'section' => 'drop_shipping_pro_topbar_section',
    'setting' => 'drop_shipping_pro_topbar_user_icon_font_size',
    'type'    => 'number'
  ));

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_user_icon_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_user_icon_color', array(
    'label' => 'User and Wishlist Icon Color',
    'section' => 'drop_shipping_pro_topbar_section',
    'settings' => 'drop_shipping_pro_topbar_user_icon_color',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_topbar_border_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_topbar_border_color', array(
    'label' => 'Border Color',
    'section' => 'drop_shipping_pro_topbar_section',
    'settings' => 'drop_shipping_pro_topbar_border_color',
  )));

  //Header Section
  $wp_customize->add_section('drop_shipping_pro_header_section',array(
    'title' => __('Header','dropshipping-store-pro'),
    'description' => __('Header Settings','dropshipping-store-pro'),
    'priority'  => null,
    'panel' => 'drop_shipping_pro_panel_id',
  )); 

  $wp_customize->add_setting( 'drop_shipping_pro_headerhomebg_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_headerhomebg_color', array(
    'label' => __('Header Background Color', 'event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_headerhomebg_color',
  )));

  $wp_customize->add_setting('drop_shipping_pro_header_title_color', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_header_title_color', array(
      'label' => __('Logo Title Color', 'event-management-pro'),
      'section' => 'drop_shipping_pro_header_section',
      'settings' => 'drop_shipping_pro_header_title_color',
  )));
    
  $wp_customize->add_setting('drop_shipping_pro_header_title_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
  $wp_customize->add_control( 'drop_shipping_pro_header_title_font_family', array(
      'section'  => 'drop_shipping_pro_header_section',
      'label'    => __( 'Logo Title Font Family','event-management-pro'),
      'type'     => 'select',
      'choices'  => $font_array
  ));

   $wp_customize->add_setting('drop_shipping_pro_header_title_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_header_title_font_size',array(
      'label' => __('Logo Title font size in','event-management-pro'),
      'section' => 'drop_shipping_pro_header_section',
      'setting' => 'drop_shipping_pro_header_title_font_size',
      'type'    => 'number'
    )
  );

  $wp_customize->add_setting('drop_shipping_pro_header_section_logo_subtitle_color', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_header_section_logo_subtitle_color', array(
      'label' => __('Logo Sub Title Color', 'event-management-pro'),
      'section' => 'drop_shipping_pro_header_section',
      'settings' => 'drop_shipping_pro_header_section_logo_subtitle_color',
  )));
    
  $wp_customize->add_setting('drop_shipping_pro_header_section_logo_subtitle_font_family',array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
  $wp_customize->add_control( 'drop_shipping_pro_header_section_logo_subtitle_font_family', array(
      'section'  => 'drop_shipping_pro_header_section',
      'label'    => __( 'Logo Sub Title Font Family','event-management-pro'),
      'type'     => 'select',
      'choices'  => $font_array
  ));

  $wp_customize->add_setting('drop_shipping_pro_header_section_logo_subtitle_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_header_section_logo_subtitle_font_size',array(
      'label' => __('Logo Sub Title font size','event-management-pro'),
      'section' => 'drop_shipping_pro_header_section',
      'setting' => 'drop_shipping_pro_header_section_logo_subtitle_font_size',
      'type'    => 'number'
    )
  );

  $wp_customize->add_setting( 'drop_shipping_pro_header_section_sticky',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
 ));
  $wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_header_section_sticky', array(
      'label' => esc_html__( 'Sticky Header On/Off', 'event-management-pro' ),
      'section' => 'drop_shipping_pro_header_section'
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_header_section_menu_color_setting', array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_header_section_menu_color_setting', array(
        'label' => __('Menu Color and Font Setting','event-management-pro'),
        'section' => 'drop_shipping_pro_header_section'
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_headermenu_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_headermenu_bgcolor', array(
    'label' => __('Menu Background Color', 'event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_headermenu_bgcolor',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_headermenu_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_headermenu_color', array(
    'label' => __('Menu Item Color', 'event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_headermenu_color',
  )));

  $wp_customize->add_setting('drop_shipping_pro_headermenu_font_family', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
   ));
  $wp_customize->add_control(
      'drop_shipping_pro_headermenu_font_family', array(
      'section'  => 'drop_shipping_pro_header_section',
      'label'    => __( 'Menu Item Fonts','event-management-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));

  $wp_customize->add_setting('drop_shipping_pro_headermenu_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_headermenu_font_size',array(
      'label' => __('font size','event-management-pro'),
      'section' => 'drop_shipping_pro_header_section',
      'setting' => 'drop_shipping_pro_headermenu_font_size',
      'type'    => 'number'
    )
  );

  $wp_customize->add_setting( 'drop_shipping_pro_header_menu_active_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_header_menu_active_color', array(
    'label' => __('Active Menu Item Color', 'event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_header_menu_active_color',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_header_menu_active_bgcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_header_menu_active_bgcolor', array(
    'label' => __('Active Menu Item Color', 'event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_header_menu_active_bgcolor',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_dropdownbg_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_dropdownbg_color', array(
    'label' => __('Menu DropDown Background Color', 'event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_dropdownbg_color',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_dropdown_border_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_dropdown_border_color', array(
    'label' => __('Menu DropDown Border Color', 'event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_dropdown_border_color',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_dropdownbg_itemcolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_dropdownbg_itemcolor', array(
    'label' => __('Menu DropDown Item Color', 'event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_dropdownbg_itemcolor',
  )));

  $wp_customize->add_setting('drop_shipping_pro_dropdownbg_item_font_family', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
   ));
  $wp_customize->add_control(
      'drop_shipping_pro_dropdownbg_item_font_family', array(
      'section'  => 'drop_shipping_pro_header_section',
      'label'    => __( 'Menu DropDown Item Fonts','event-management-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));

  $wp_customize->add_setting('drop_shipping_pro_dropdownbg_item_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_dropdownbg_item_font_size',array(
      'label' => __('font size','event-management-pro'),
      'section' => 'drop_shipping_pro_header_section',
      'setting' => 'drop_shipping_pro_dropdownbg_item_font_size',
      'type'    => 'number'
    )
  );

  $wp_customize->add_setting( 'drop_shipping_pro_header_resp_setting', array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_header_resp_setting', array(
        'label' => __('Responsive Media Menu Setting','event-management-pro'),
        'section' => 'drop_shipping_pro_header_section'
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_dropdownbg_responsivecolor', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_dropdownbg_responsivecolor', array(
    'label' => __('Responsive Menu Background Color', 'event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_dropdownbg_responsivecolor',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_headermenu_responsive_item_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_headermenu_responsive_item_color', array(
    'label' => __('Responsive Menu item Color', 'event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_headermenu_responsive_item_color',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_menu_open_bar_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_menu_open_bar_color', array(
    'label' => __('Responsive open Icon Color', 'event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_menu_open_bar_color',
  )));

  $wp_customize->add_setting('drop_shipping_pro_menu_open_bar_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_menu_open_bar_font_size',array(
      'label' => __('font size','event-management-pro'),
      'section' => 'drop_shipping_pro_header_section',
      'setting' => 'drop_shipping_pro_menu_open_bar_font_size',
      'type'    => 'number'
  ));

  $wp_customize->add_setting( 'drop_shipping_pro_menu_close_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_menu_close_color', array(
    'label' => __('Responsive Close Icon Color', 'event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_menu_close_color',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_header_cart_setting',array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_header_cart_setting', array(
      'label' => __('Cart Setting','event-management-pro'),
      'section' => 'drop_shipping_pro_header_section'
  )));

  $wp_customize->add_setting('drop_shipping_pro_header_shopping_basket_image',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_header_shopping_basket_image',
        array(
    'label' => __('Shopping Basket Image (64px * 64px)','dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_header_shopping_basket_image'
  )));

  $wp_customize->add_setting('drop_shipping_pro_header_shopping_text',array(
      'default'=> '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_header_shopping_text',array(
      'label' => __('Cart Text','dropshipping-store-pro'),
      'section'=> 'drop_shipping_pro_header_section',
      'setting'=> 'drop_shipping_pro_header_shopping_text',
      'type'=> 'text'
  ));

  $wp_customize->add_setting( 'drop_shipping_pro_header_cart_color_setting',array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_header_cart_color_setting', array(
      'label' => __('Cart Color and Font Setting','event-management-pro'),
      'section' => 'drop_shipping_pro_header_section'
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_header_cart_text_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_header_cart_text_color', array(
    'label' => 'Cart Text Color',
    'section' => 'drop_shipping_pro_header_section',
    'settings' => 'drop_shipping_pro_header_cart_text_color',
  )));

  $wp_customize->add_setting('drop_shipping_pro_header_cart_title_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
  $wp_customize->add_control(
    'drop_shipping_pro_header_cart_title_font_family', array(
    'section'  => 'drop_shipping_pro_header_section',
    'label'    => __( 'Cart Title Font Family','event-management-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('drop_shipping_pro_header_cart_title_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_header_cart_title_font_size',array(
    'label' => __('Cart Title Font size','event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'setting' => 'drop_shipping_pro_header_cart_title_font_size',
    'type'    => 'number'
  ));

  $wp_customize->add_setting('drop_shipping_pro_header_cart_text_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
  $wp_customize->add_control(
    'drop_shipping_pro_header_cart_text_font_family', array(
    'section'  => 'drop_shipping_pro_header_section',
    'label'    => __( 'Price Font Family','event-management-pro'),
    'type'     => 'select',
    'choices'  => $font_array,
  ));

  $wp_customize->add_setting('drop_shipping_pro_header_cart_text_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('drop_shipping_pro_header_cart_text_font_size',array(
    'label' => __('Price Font size','event-management-pro'),
    'section' => 'drop_shipping_pro_header_section',
    'setting' => 'drop_shipping_pro_header_cart_text_font_size',
    'type'    => 'number'
  ));

?>