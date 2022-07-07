<?php
  //General Color Pallete
  $wp_customize->add_section('drop_shipping_pro_color_pallette',array(
      'title' => __('Typography / General settings','dropshipping-store-pro'),
      'description'=> __('Typography settings','dropshipping-store-pro'),
      'panel' => 'drop_shipping_pro_panel_id',
  ));

  $wp_customize->add_setting('drop_shipping_pro_radio_boxed_full_layout',
      array(
    'default' => 'full-Width',
    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
  ));
  $wp_customize->add_control('drop_shipping_pro_radio_boxed_full_layout',
      array(
    'type' => 'radio',
    'label' => __('Choose Boxed or Full Width Layout', 'dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_color_pallette',
    'choices' => array(
    'full-Width' => __('Full Width', 'dropshipping-store-pro'),
    'boxed' => __('Boxed', 'dropshipping-store-pro')
      ),
  ));

  $wp_customize->add_setting('drop_shipping_pro_radio_boxed_full_layout_value',array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_radio_boxed_full_layout_value',array(
    'label' => __('Add Boxed layout Width Here','dropshipping-store-pro'),
    'description' => __('Boxed width is always set more than 1140px.','dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_color_pallette',
    'setting' => 'drop_shipping_pro_radio_boxed_full_layout_value',
    'type'    => 'number'
    )
  );

  $wp_customize->add_setting( 'drop_shipping_pro_body_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_body_option',
    array(
        'label' => __('Body Option','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_color_pallette'
    )
  ) );
  //This is Button Text FontFamily picker setting
  $wp_customize->add_setting('drop_shipping_pro_body_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'drop_shipping_pro_body_font_family', array(
      'section'  => 'drop_shipping_pro_color_pallette',
      'label'    => __( 'Body Font family','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('drop_shipping_pro_body_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_body_font_size',array(
      'label' => __('font size','dropshipping-store-pro'),
      'section' => 'drop_shipping_pro_color_pallette',
      'setting' => 'drop_shipping_pro_body_font_size',
      'type'    => 'number'
    )
  );

  $wp_customize->add_setting( 'drop_shipping_pro_body_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_body_color', array(
    'label' => __('Body color', 'dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_color_pallette',
    'settings' => 'drop_shipping_pro_body_color',
  )));

  $wp_customize->add_setting( 'drop_shipping_pro_h1_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
  ));
  $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_h1_option',
    array(
        'label' => __('H1 Option','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_color_pallette'
    )
  ) );
  $wp_customize->add_setting('drop_shipping_pro_h1_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'drop_shipping_pro_h1_font_family', array(
      'section'  => 'drop_shipping_pro_color_pallette',
      'label'    => __( 'H1','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('drop_shipping_pro_h1_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_h1_font_size',array(
      'label' => __('H1 font size','dropshipping-store-pro'),
      'section' => 'drop_shipping_pro_color_pallette',
      'setting' => 'drop_shipping_pro_h1_font_size',
      'type'    => 'number'
    )
  );
  $wp_customize->add_setting( 'drop_shipping_pro_h1_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_h1_color', array(
    'label' => __('H1 color', 'dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_color_pallette',
    'settings' => 'drop_shipping_pro_h1_color',
  )));
  $wp_customize->add_setting( 'drop_shipping_pro_h2_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_h2_option',
    array(
        'label' => __('H2 Option','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_color_pallette'
    )
  ) );
  $wp_customize->add_setting('drop_shipping_pro_h2_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'drop_shipping_pro_h2_font_family', array(
      'section'  => 'drop_shipping_pro_color_pallette',
      'label'    => __( 'H2','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('drop_shipping_pro_h2_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_h2_font_size',array(
      'label' => __('H2 font size','dropshipping-store-pro'),
      'section' => 'drop_shipping_pro_color_pallette',
      'setting' => 'drop_shipping_pro_h2_font_size',
      'type'    => 'number'
    )
  );
  $wp_customize->add_setting( 'drop_shipping_pro_h2_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_h2_color', array(
    'label' => __('H2 color', 'dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_color_pallette',
    'settings' => 'drop_shipping_pro_h2_color',
  )));
  $wp_customize->add_setting( 'drop_shipping_pro_h3_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_h3_option',
    array(
        'label' => __('H3 Option','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_color_pallette'
    )
  ) );
  $wp_customize->add_setting('drop_shipping_pro_h3_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'drop_shipping_pro_h3_font_family', array(
      'section'  => 'drop_shipping_pro_color_pallette',
      'label'    => __( 'H3','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('drop_shipping_pro_h3_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_h3_font_size',array(
      'label' => __('H3 font size','dropshipping-store-pro'),
      'section' => 'drop_shipping_pro_color_pallette',
      'setting' => 'drop_shipping_pro_h3_font_size',
      'type'    => 'number'
    )
  );
  $wp_customize->add_setting( 'drop_shipping_pro_h3_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_h3_color', array(
    'label' => __('H3 color', 'dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_color_pallette',
    'settings' => 'drop_shipping_pro_h3_color',
  )));
  $wp_customize->add_setting( 'drop_shipping_pro_h4_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_h4_option',
    array(
        'label' => __('H4 Option','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_color_pallette'
    )
  ) );
  $wp_customize->add_setting('drop_shipping_pro_h4_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'drop_shipping_pro_h4_font_family', array(
      'section'  => 'drop_shipping_pro_color_pallette',
      'label'    => __( 'H4','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('drop_shipping_pro_h4_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_h4_font_size',array(
      'label' => __('H4 font size','dropshipping-store-pro'),
      'section' => 'drop_shipping_pro_color_pallette',
      'setting' => 'drop_shipping_pro_h4_font_size',
      'type'    => 'number'
    )
  );
  $wp_customize->add_setting( 'drop_shipping_pro_h4_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_h4_color', array(
    'label' => __('H4 color', 'dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_color_pallette',
    'settings' => 'drop_shipping_pro_h4_color',
  )));
  $wp_customize->add_setting( 'drop_shipping_pro_h5_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_h5_option',
    array(
        'label' => __('H5 Option','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_color_pallette'
    )
  ) );
  $wp_customize->add_setting('drop_shipping_pro_h5_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'drop_shipping_pro_h5_font_family', array(
      'section'  => 'drop_shipping_pro_color_pallette',
      'label'    => __( 'H5','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('drop_shipping_pro_h5_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_h5_font_size',array(
      'label' => __('H5 font size','dropshipping-store-pro'),
      'section' => 'drop_shipping_pro_color_pallette',
      'setting' => 'drop_shipping_pro_h5_font_size',
      'type'    => 'number'
    )
  );
  $wp_customize->add_setting( 'drop_shipping_pro_h5_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_h5_color', array(
    'label' => __('H5 color', 'dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_color_pallette',
    'settings' => 'drop_shipping_pro_h5_color',
  )));
  $wp_customize->add_setting( 'drop_shipping_pro_h6_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_h6_option',
    array(
        'label' => __('H6 Option','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_color_pallette'
    )
  ) );
  $wp_customize->add_setting('drop_shipping_pro_h6_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'drop_shipping_pro_h6_font_family', array(
      'section'  => 'drop_shipping_pro_color_pallette',
      'label'    => __( 'H6','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('drop_shipping_pro_h6_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_h6_font_size',array(
      'label' => __('H6 font size','dropshipping-store-pro'),
      'section' => 'drop_shipping_pro_color_pallette',
      'setting' => 'drop_shipping_pro_h6_font_size',
      'type'    => 'number'
    )
  );
  $wp_customize->add_setting( 'drop_shipping_pro_h6_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_h6_color', array(
    'label' => __('H6 color', 'dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_color_pallette',
    'settings' => 'drop_shipping_pro_h6_color',
  )));
  $wp_customize->add_setting( 'drop_shipping_pro_para_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_para_option',
    array(
        'label' => __('Paragraph Option','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_color_pallette'
    )
  ) );
  //paragarph font family
  $wp_customize->add_setting('drop_shipping_pro_paragarpah_font_family',array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(
      'drop_shipping_pro_paragarpah_font_family', array(
      'section'  => 'drop_shipping_pro_color_pallette',
      'label'    => __( 'Paragraph','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
  ));
  $wp_customize->add_setting('drop_shipping_pro_para_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('drop_shipping_pro_para_font_size',array(
      'label' => __('Paragraph font size','dropshipping-store-pro'),
      'section' => 'drop_shipping_pro_color_pallette',
      'setting' => 'drop_shipping_pro_para_font_size',
      'type'    => 'number'
    )
  );
  $wp_customize->add_setting( 'drop_shipping_pro_para_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_para_color', array(
      'label' => __('Para color', 'dropshipping-store-pro'),
      'section' => 'drop_shipping_pro_color_pallette',
      'settings' => 'drop_shipping_pro_para_color',
    )
  ));
  $wp_customize->add_setting( 'drop_shipping_pro_hi_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_hi_option',
    array(
        'label' => __('Highlight Color Option','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_color_pallette'
    )
  ) );
  $wp_customize->add_setting( 'drop_shipping_pro_hi_first_color', array(
    'default' => '',
    'input_attrs' => array(
                'placeholder' => __( '#ffcc05', 'dropshipping-store-pro' ),
            ),
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_hi_first_color', array(
    'label' => __('Highlight Color 1', 'dropshipping-store-pro'),
    'description'=>__('It will change it globally', 'dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_color_pallette',
    'settings' => 'drop_shipping_pro_hi_first_color',
  )));
  
  $wp_customize->add_setting( 'drop_shipping_pro_hi_second_color', array(
    'default' => '#000000',
    'input_attrs' => array(
                'placeholder' => __( '#000000', 'dropshipping-store-pro' ),
            ),
    'sanitize_callback' => 'sanitize_hex_color'
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_hi_second_color', array(
    'label' => __('Highlight Color 2', 'dropshipping-store-pro'),
    'description'=>__('It will change it globally', 'dropshipping-store-pro'),
    'section' => 'drop_shipping_pro_color_pallette',
    'settings' => 'drop_shipping_pro_hi_second_color',
  )));


  ///Repeater
  $wp_customize->add_section('drop_shipping_pro_section_ordering_settings',array(
    'title' => __('Section Ordering','dropshipping-store-pro'),
    'description'=> __('Section Ordering.','dropshipping-store-pro'),
    'panel' => 'drop_shipping_pro_panel_id',
  ));

  $wp_customize->add_setting( 'drop_shipping_pro_color_pallette_section_ordering_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    )
  );
  $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_color_pallette_section_ordering_option',
    array(
        'label' => __('Section Ordering Option','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_section_ordering_settings'
    )
  ) );

  $wp_customize->add_setting( 'drop_shipping_pro_section_ordering_settings_repeater',
  array(
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_text_field'
  )
  );
  $wp_customize->add_control( new drop_shipping_pro_Repeater_Custom_Control( $wp_customize, 'drop_shipping_pro_section_ordering_settings_repeater',
  array(
    'label' => __( 'Section Reordering','dropshipping-store-pro' ),
    'section' => 'drop_shipping_pro_section_ordering_settings',
    'button_labels' => array(
      'add' => __( 'Add Row','dropshipping-store-pro' ), // Optional. Button label for Add button. Default: Add
    )
  )));

  $wp_customize->add_setting('drop_shipping_pro_feature_top_bottom_padding',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('drop_shipping_pro_feature_top_bottom_padding',array(
      'label' => __('Feature Block Top Bottom Padding','dropshipping-store-pro'),
      'description' => __('Padding will appear in pixel','dropshipping-store-pro'),
      'section'   => 'drop_shipping_pro_section_ordering_settings',
      'type'      => 'number'
  ));

  $wp_customize->add_setting('drop_shipping_pro_our_product_top_bottom_padding',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('drop_shipping_pro_our_product_top_bottom_padding',array(
      'label' => __('Our Product Top Bottom Padding','dropshipping-store-pro'),
      'description' => __('Padding will appear in pixel','dropshipping-store-pro'),
      'section'   => 'drop_shipping_pro_section_ordering_settings',
      'type'      => 'number'
  ));

  $wp_customize->add_setting('drop_shipping_pro_main_category_top_bottom_padding',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('drop_shipping_pro_main_category_top_bottom_padding',array(
      'label' => __('Category Top Bottom Padding','dropshipping-store-pro'),
      'description' => __('Padding will appear in pixel','dropshipping-store-pro'),
      'section'   => 'drop_shipping_pro_section_ordering_settings',
      'type'      => 'number'
  ));

  $wp_customize->add_setting('drop_shipping_pro_product_banner1_top_bottom_padding',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('drop_shipping_pro_product_banner1_top_bottom_padding',array(
      'label' => __('Product Banner Top Bottom Padding','dropshipping-store-pro'),
      'description' => __('Padding will appear in pixel','dropshipping-store-pro'),
      'section'   => 'drop_shipping_pro_section_ordering_settings',
      'type'      => 'number'
  ));

  $wp_customize->add_setting('drop_shipping_pro_product_category_top_bottom_padding',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('drop_shipping_pro_product_category_top_bottom_padding',array(
      'label' => __('Product Category Top Bottom Padding','dropshipping-store-pro'),
      'description' => __('Padding will appear in pixel','dropshipping-store-pro'),
      'section'   => 'drop_shipping_pro_section_ordering_settings',
      'type'      => 'number'
  ));

  $wp_customize->add_setting('drop_shipping_pro_deals_top_bottom_padding',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('drop_shipping_pro_deals_top_bottom_padding',array(
      'label' => __('Deal Of The Day Top Bottom Padding','dropshipping-store-pro'),
      'description' => __('Padding will appear in pixel','dropshipping-store-pro'),
      'section'   => 'drop_shipping_pro_section_ordering_settings',
      'type'      => 'number'
  ));

  $wp_customize->add_setting('drop_shipping_pro_new_arrival_top_bottom_padding',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('drop_shipping_pro_new_arrival_top_bottom_padding',array(
      'label' => __('New Arrival Top Bottom Padding','dropshipping-store-pro'),
      'description' => __('Padding will appear in pixel','dropshipping-store-pro'),
      'section'   => 'drop_shipping_pro_section_ordering_settings',
      'type'      => 'number'
  ));

  $wp_customize->add_setting('drop_shipping_pro_featured_blog_top_bottom_padding',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('drop_shipping_pro_featured_blog_top_bottom_padding',array(
      'label' => __('Featured Blog Top Bottom Padding','dropshipping-store-pro'),
      'description' => __('Padding will appear in pixel','dropshipping-store-pro'),
      'section'   => 'drop_shipping_pro_section_ordering_settings',
      'type'      => 'number'
  ));

  $wp_customize->add_setting('drop_shipping_pro_popular_brand_top_bottom_padding',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('drop_shipping_pro_popular_brand_top_bottom_padding',array(
      'label' => __('Popular Brand Top Bottom Padding','dropshipping-store-pro'),
      'description' => __('Padding will appear in pixel','dropshipping-store-pro'),
      'section'   => 'drop_shipping_pro_section_ordering_settings',
      'type'      => 'number'
  ));

  $wp_customize->add_setting('drop_shipping_pro_product_banner2_top_bottom_padding',array(
      'default'   => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('drop_shipping_pro_product_banner2_top_bottom_padding',array(
      'label' => __('Popular Banner 2 Top Bottom Padding','dropshipping-store-pro'),
      'description' => __('Padding will appear in pixel','dropshipping-store-pro'),
      'section'   => 'drop_shipping_pro_section_ordering_settings',
      'type'      => 'number'
  ));
  