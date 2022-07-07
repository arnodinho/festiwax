<?php

    $wp_customize->add_section('drop_shipping_pro_general_blog_settings',array(
        'title' => __('General Settings','dropshipping-store-pro'),
        'description'   => __('Change General Settings here','dropshipping-store-pro'),
        'panel' => 'drop_shipping_pro_panel_id',
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_general_blog_settings_scroll_top',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_general_blog_settings_scroll_top',
    array(
        'label' => __('Scroll Top Settings','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings'
    )));

    $wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_general_blog_settings_scroll_top', array(
        'selector' => '#return-to-top',
        'render_callback' => 'drop_shipping_pro_customize_drop_shipping_pro_general_blog_settings_scroll_top',
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_genral_section_show_scroll_top',
    array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_genral_section_show_scroll_top',
         array(
            'label' => esc_html__( 'Show or Hide Scroll Top', 'dropshipping-store-pro' ),
            'section' => 'drop_shipping_pro_general_blog_settings'
    )));

    $wp_customize->add_setting(
      'drop_shipping_pro_scroll_to_top_icon',
      array(
        'default'     => '',
        'sanitize_callback' => 'sanitize_text_field'
      )
    );
    $wp_customize->add_control(
      new drop_shipping_pro_Fontawesome_Icon_Chooser(
        $wp_customize,
        'drop_shipping_pro_scroll_to_top_icon',
        array(
          'settings'    => 'drop_shipping_pro_scroll_to_top_icon',
          'section'   => 'drop_shipping_pro_general_blog_settings',
          'type'      => 'icon',
          'label'     => esc_html__( 'Choose Icon', 'dropshipping-store-pro' ),
        )
      )
    );

    $wp_customize->add_setting( 'drop_shipping_pro_general_scroll_top_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_general_scroll_top_color', array(
        'label' => __('Scroll Top Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings',
        'settings' => 'drop_shipping_pro_general_scroll_top_color',
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_general_scroll_top_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_general_scroll_top_bgcolor', array(
        'label' => __('Scroll Top Background Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings',
        'settings' => 'drop_shipping_pro_general_scroll_top_bgcolor',
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_general_scroll_top_hover_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_general_scroll_top_hover_bgcolor', array(
        'label' => __('Scroll Top Hover Background Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings',
        'settings' => 'drop_shipping_pro_general_scroll_top_hover_bgcolor',
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_scroll_top_icon_width', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_scroll_top_icon_width', array(
        'label' => __('Scroll Width', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings',
        'type'      => 'number'
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_scroll_top_icon_height', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_scroll_top_icon_height', array(
        'label' => __('Scroll height', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings',
        'type'      => 'number'
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_scroll_top_icon_border_radius', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_scroll_top_icon_border_radius', array(
        'label' => __('Scroll Border radius', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings',
        'type'      => 'number'
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_site_frame_settings',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_site_frame_settings',
    array(
        'label' => __('Site Frame Settings','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings'
    )));
    $wp_customize->add_setting('drop_shipping_pro_site_frame_width',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('drop_shipping_pro_site_frame_width',array(
        'label' => __('Frame Width','dropshipping-store-pro'),
        'section'   => 'drop_shipping_pro_general_blog_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('drop_shipping_pro_site_frame_type',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('drop_shipping_pro_site_frame_type',array(
        'type' => 'select',
        'label' => __('Frame Type','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings',
        'choices' => array(
            '' => __('','dropshipping-store-pro'),
            'solid' => __('Solid','dropshipping-store-pro'),
            'dashed' => __('Dashed','dropshipping-store-pro'),
            'double' => __('Double','dropshipping-store-pro'),
            'groove' => __('Groove','dropshipping-store-pro'),
            'ridge' => __('Ridge','dropshipping-store-pro'),
            'inset' => __('Inset','dropshipping-store-pro')
        ),  
    ) );

    $wp_customize->add_setting( 'drop_shipping_pro_site_frame_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_site_frame_color', array(
        'label' => __('Frame Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings',
        'settings' => 'drop_shipping_pro_site_frame_color',
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_general_spinner_settings',
    array(
      'default' => '',
      'transport' => 'postMessage',
      'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_general_spinner_settings',
        array(
        'label' => __('Spinner Setting','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings'
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_general_spinner_enable_disable',
    array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
    ));

    $wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_general_spinner_enable_disable',
     array(
        'label' => esc_html__( 'Spinner On/Off', 'dropshipping-store-pro' ),
        'section' => 'drop_shipping_pro_general_blog_settings'
    )));

    $wp_customize->add_setting('drop_shipping_pro_general_spinner_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_general_spinner_bgcolor', array(
        'label' => __('Spinner Background Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings',
        'settings' => 'drop_shipping_pro_general_spinner_bgcolor',
    )));

    $wp_customize->add_setting('drop_shipping_pro_general_spinner_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_general_spinner_color', array(
        'label' => __('Spinner Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_general_blog_settings',
        'settings' => 'drop_shipping_pro_general_spinner_color',
    )));

    // ------------ Post Settings ----------

    $wp_customize->add_section('drop_shipping_pro_blog_settings',array(
        'title' => __('Post Settings','dropshipping-store-pro'),
        'description'   => __('Change Your Setting','dropshipping-store-pro'),
        'priority'  => null,
        'panel' => 'drop_shipping_pro_panel_id',
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_blog_category_prev_settings',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'fotografia_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_blog_category_prev_settings',
    array(
        'label' => __('Blog Options','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_blog_settings'
    )));

    //Page Title layout
    $wp_customize->add_setting('drop_shipping_pro_page_title_content_option',array(
        'default' => __('Center','dropshipping-store-pro'),
        'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(new drop_shipping_pro_Image_Radio_Control($wp_customize, 'drop_shipping_pro_page_title_content_option', array(
      'type' => 'select',
      'label' => __('Page Title Layouts','dropshipping-store-pro'),
      'section' => 'drop_shipping_pro_blog_settings',
      'choices' => array(
          'Left' => get_template_directory_uri().'/assets/images/header-layout1.png',
          'Center' => get_template_directory_uri().'/assets/images/header-layout2.png',
          'Right' => get_template_directory_uri().'/assets/images/header-layout3.png',
    ))));

    $wp_customize->add_setting( 'drop_shipping_pro_blog_show_hide_settings',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'fotografia_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_blog_show_hide_settings',
    array(
        'label' => __('Blog Show Hide Settings','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_blog_settings'
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_general_settings_post_date',
    array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_general_settings_post_date',
     array(
        'label' => esc_html__( 'Show or Hide Post Date', 'dropshipping-store-pro' ),
        'section' => 'drop_shipping_pro_blog_settings'
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_general_settings_post_comments',
    array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_general_settings_post_comments',
     array(
        'label' => esc_html__( 'Show or Hide Comments', 'dropshipping-store-pro' ),
        'section' => 'drop_shipping_pro_blog_settings'
     )
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_general_settings_post_author',
    array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_general_settings_post_author',
     array(
        'label' => esc_html__( 'Show or Hide Author', 'dropshipping-store-pro' ),
        'section' => 'drop_shipping_pro_blog_settings'
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_general_settings_post_share',
    array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_general_settings_post_share',
     array(
        'label' => esc_html__( 'Show or Hide Share Icons', 'dropshipping-store-pro' ),
        'section' => 'drop_shipping_pro_blog_settings'
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_general_settings_post_share_facebook',
    array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_general_settings_post_share_facebook',
     array(
        'label' => esc_html__( 'Post Share Facebook', 'dropshipping-store-pro' ),
        'section' => 'drop_shipping_pro_blog_settings'
    )));


    $wp_customize->add_setting( 'drop_shipping_pro_general_settings_post_share_twitter',
    array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_general_settings_post_share_twitter',
     array(
        'label' => esc_html__( 'Post Share Twitter', 'dropshipping-store-pro' ),
        'section' => 'drop_shipping_pro_blog_settings'
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_general_settings_post_sidebar',
    array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'drop_shipping_pro_switch_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Toggle_Switch_Custom_control( $wp_customize, 'drop_shipping_pro_general_settings_post_sidebar',
     array(
        'label' => esc_html__( 'Show or Hide Sidebar', 'dropshipping-store-pro' ),
        'section' => 'drop_shipping_pro_blog_settings'
     )
    ));

    $wp_customize->add_setting('drop_shipping_pro_blog_category_prev_title',array(
        'default'   => 'Previous',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('drop_shipping_pro_blog_category_prev_title',array(
        'label' => __('Previous Title','dropshipping-store-pro'),
        'section'   => 'drop_shipping_pro_blog_settings',
        'type'      => 'text'
    ));

    $wp_customize->add_setting('drop_shipping_pro_blog_category_next_title',array(
        'default'   => 'Next',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('drop_shipping_pro_blog_category_next_title',array(
        'label' => __('Next Title','dropshipping-store-pro'),
        'section'   => 'drop_shipping_pro_blog_settings',
        'type'      => 'text'
    ));

    /* Footer Sections */
    $wp_customize->add_section('drop_shipping_pro_footer_section_first',array(
        'title' => __('Footer','dropshipping-store-pro'),
        'description'   => __('Edit footer sections','dropshipping-store-pro'),
        'panel' => 'drop_shipping_pro_panel_id',
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'fotografia_pro_text_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_footer_option',
    array(
        'label' => __('Footer Option','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first'
    )
    ) );

    $wp_customize->add_setting('drop_shipping_pro_radiolast_enable',
    array(
        'default' => 'Enable',
        'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
    ));
    $wp_customize->add_control('drop_shipping_pro_radiolast_enable',
    array(
        'type' => 'radio',
        'label' => 'Do you want this section',
        'section' => 'drop_shipping_pro_footer_section_first',
        'choices' => array(
            'Enable' => __('Enable', 'dropshipping-store-pro'),
            'Disable' => __('Disable', 'dropshipping-store-pro')
        ),
    ));

    $wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_radiolast_enable', array(
        'selector' => '#bwt-footer .bwt-footer-cols',
        'render_callback' => 'drop_shipping_pro_customize_drop_shipping_pro_radiolast_enable',
    ));

    // add color picker setting
    $wp_customize->add_setting( 'drop_shipping_pro_section_footer_bgcolor', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    // add color picker control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_section_footer_bgcolor', array(
        'label' => __('Background Color', 'dropshipping-store-pro'),
        'description'   => __('Either add background color or background image, if you add both background color will be top most priority','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'settings' => 'drop_shipping_pro_section_footer_bgcolor',
    )));

    $wp_customize->add_setting('drop_shipping_pro_footer_bgimage',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'drop_shipping_pro_footer_bgimage',
            array(
                'label' => __('Background image','dropshipping-store-pro'),
                'description' => __('Dimension 1600px * 600px','dropshipping-store-pro'),
                'section' => 'drop_shipping_pro_footer_section_first',
                'settings' => 'drop_shipping_pro_footer_bgimage'
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_image_bg', array(
        'default'         => '',
        'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
    ));
    $wp_customize->add_control('drop_shipping_pro_footer_image_bg', array(
        'type'      => 'radio',
        'label'     => __('Choose image option', 'dropshipping-store-pro'),
        'section'   => 'drop_shipping_pro_footer_section_first',
        'choices'   => array(
          'bg-fixed'      => __( 'Fixed', 'dropshipping-store-pro' ),
          'bg-scroll'      => __( 'Scroll', 'dropshipping-store-pro' ),                    
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_content_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_footer_content_option',
    array(
        'label' => __('Footer Color and Font Option','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first'
        )
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_widget_title_content_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_footer_widget_title_content_option',
    array(
        'label' => __('Footer Widget Title','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first'
        )
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_widget_title_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_footer_widget_title_color', array(
        'label' => __('Widget Title Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'settings' => 'drop_shipping_pro_footer_widget_title_color',
    )));

    $wp_customize->add_setting('drop_shipping_pro_footer_widget_title_font_family',array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
      'drop_shipping_pro_footer_widget_title_font_family', array(
      'section'  => 'drop_shipping_pro_footer_section_first',
      'label'    => __( 'Widget Title Fonts','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
    ));

    $wp_customize->add_setting('drop_shipping_pro_footer_widget_title_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('drop_shipping_pro_footer_widget_title_font_size',array(
        'label' => __('Widget Title Font Size','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'setting'   => 'drop_shipping_pro_footer_widget_title_font_size',
        'type'  => 'number'
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_widget_content_content_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_footer_widget_content_content_option',
    array(
        'label' => __('Footer Widget Content','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first'
        )
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_widget_content_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_footer_widget_content_color', array(
        'label' => __('Widget Content Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'settings' => 'drop_shipping_pro_footer_widget_content_color',
    )));

    $wp_customize->add_setting('drop_shipping_pro_footer_widget_content_font_family',array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
      'drop_shipping_pro_footer_widget_content_font_family', array(
      'section'  => 'drop_shipping_pro_footer_section_first',
      'label'    => __( 'Widget Content Fonts','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
    ));

    $wp_customize->add_setting('drop_shipping_pro_footer_widget_content_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('drop_shipping_pro_footer_widget_content_font_size',array(
        'label' => __('Widget Content Font Size','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'setting'   => 'drop_shipping_pro_footer_widget_content_font_size',
        'type'  => 'number'
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_widget_newsletter_content_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_footer_widget_newsletter_content_option',
    array(
        'label' => __('Footer Widget Newsletter','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first'
        )
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_newsletter_input_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_footer_newsletter_input_bg_color', array(
        'label' => __('Newsletter Input Background Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'settings' => 'drop_shipping_pro_footer_newsletter_input_bg_color',
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_newsletter_button_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_footer_newsletter_button_bg_color', array(
        'label' => __('Newsletter Button Background Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'settings' => 'drop_shipping_pro_footer_newsletter_button_bg_color',
    )));


    $wp_customize->add_setting( 'drop_shipping_pro_footer_newsletter_button_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_footer_newsletter_button_color', array(
        'label' => __('Newsletter Button Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'settings' => 'drop_shipping_pro_footer_newsletter_button_color',
    )));

    $wp_customize->add_setting('drop_shipping_pro_footer_newsletter_button_font_family',array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
      'drop_shipping_pro_footer_newsletter_button_font_family', array(
      'section'  => 'drop_shipping_pro_footer_section_first',
      'label'    => __( 'Newsletter Button Fonts','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
    ));

    $wp_customize->add_setting('drop_shipping_pro_footer_newsletter_button_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('drop_shipping_pro_footer_newsletter_button_font_size',array(
        'label' => __('Newsletter Button Font Size','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'setting'   => 'drop_shipping_pro_footer_newsletter_button_font_size',
        'type'  => 'number'
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_widget_contact_content_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_footer_widget_contact_content_option',
    array(
        'label' => __('Footer Widget Contact Information','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first'
        )
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_widget_contact_content_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_footer_widget_contact_content_color', array(
        'label' => __('Content Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'settings' => 'drop_shipping_pro_footer_widget_contact_content_color',
    )));

    $wp_customize->add_setting('drop_shipping_pro_footer_widget_contact_content_font_family',array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
      'drop_shipping_pro_footer_widget_contact_content_font_family', array(
      'section'  => 'drop_shipping_pro_footer_section_first',
      'label'    => __( 'Content Fonts','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
    ));

    $wp_customize->add_setting('drop_shipping_pro_footer_widget_contact_content_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('drop_shipping_pro_footer_widget_contact_content_font_size',array(
        'label' => __('Content Font Size','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'setting'   => 'drop_shipping_pro_footer_widget_contact_content_font_size',
        'type'  => 'number'
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_widget_contact_icon_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_footer_widget_contact_icon_color', array(
        'label' => __('Icon Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'settings' => 'drop_shipping_pro_footer_widget_contact_icon_color',
    )));

    $wp_customize->add_setting('drop_shipping_pro_footer_widget_contact_icon_size',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('drop_shipping_pro_footer_widget_contact_icon_size',array(
        'label' => __('Icon Font Size','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section_first',
        'setting'   => 'drop_shipping_pro_footer_widget_contact_icon_size',
        'type'  => 'number'
    ));

    //Footer Copyright

    $wp_customize->add_section('drop_shipping_pro_footer_section',array(
    'title' => __('Footer Text','dropshipping-store-pro'),
        'description'   => __('Add some text for footer like copyright etc.','dropshipping-store-pro'),
        'priority'  => null,
        'panel' => 'drop_shipping_pro_panel_id',
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_logo_content_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_footer_logo_content_option',
    array(
        'label' => __('Footer Logo Settings','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section'
        )
    ));

    $wp_customize->add_setting('drop_shipping_pro_footer_image_logo',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'drop_shipping_pro_footer_image_logo',array(
        'label' => __('Footer Logo','dropshipping-store-pro'),
        'description' => __('Dimension 140px * 130px','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section',
        'settings' => 'drop_shipping_pro_footer_image_logo'
    )));    

    $wp_customize->add_setting( 'drop_shipping_pro_footer_copyright_social_content_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
    ));
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_footer_copyright_social_content_option',
    array(
        'label' => __('Footer Copyright And Social Icon Settings','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section'
        )
    ));

    //Social Icons
    $wp_customize->add_setting('drop_shipping_pro_footer_social_icon_link_number',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
      ));
    $wp_customize->add_control('drop_shipping_pro_footer_social_icon_link_number',array(
        'label' => __('No Of Social Icon','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section',
        'setting' => 'drop_shipping_pro_footer_social_icon_link_number',
        'type'    => 'number'
    ));

    $wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_footer_social_icon_link_number', array(
          'selector' => '.bwt-copyright .footer-social-icon',
          'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_header_social_icon_link_number',
    ));

    $Social_icon=get_theme_mod('drop_shipping_pro_footer_social_icon_link_number', 5);
    for($i=1;$i<=$Social_icon;$i++){
        $wp_customize->add_setting('drop_shipping_pro_footer_social_icon_link'.$i,array(
            'default'   => '',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control('drop_shipping_pro_footer_social_icon_link'.$i,array(
            'label' => __('Add link','dropshipping-store-pro').$i,
            'section'   => 'drop_shipping_pro_footer_section',
            'setting'   => 'drop_shipping_pro_footer_social_icon_link'.$i,
            'type'  => 'text'
        ));

        $wp_customize->add_setting(
          'drop_shipping_pro_footer_social_icon_picker'.$i,
          array(
            'default'     => '',
            'sanitize_callback' => 'sanitize_text_field'
          )
        );
        $wp_customize->add_control(
          new drop_shipping_pro_Fontawesome_Icon_Chooser(
            $wp_customize,
            'drop_shipping_pro_footer_social_icon_picker'.$i,
            array(
              'settings'    => 'drop_shipping_pro_footer_social_icon_picker'.$i,
              'section'   => 'drop_shipping_pro_footer_section',
              'type'      => 'icon',
              'label'     => esc_html__( 'Choose Icon ', 'dropshipping-store-pro' ).$i,
            )
          )
        );

    }

    $wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_footer_copy', array(
          'selector' => '.copyright-text p',
          'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_footer_copy',
    ));

    $wp_customize->add_setting('drop_shipping_pro_footer_copy',array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control(new drop_shipping_pro_Editor_Control($wp_customize,'drop_shipping_pro_footer_copy',array(
        'label' => __('Copyright Text','dropshipping-store-pro'),
        'section'   => 'drop_shipping_pro_footer_section',
    )));


    $wp_customize->add_setting( 'drop_shipping_pro_footer_copy_color_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'fotografia_pro_text_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_footer_text_option',
    array(
        'label' => __('Footer Content Color and Font Setting','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section'
    )
    ) );

    $wp_customize->add_setting( 'drop_shipping_pro_footer_copyright_color_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'fotografia_pro_text_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_footer_copyright_color_option',
    array(
        'label' => __('Footer Copyright','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section'
    )
    ) );

    $wp_customize->add_setting('drop_shipping_pro_copyright_top_bottom_padding',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('drop_shipping_pro_copyright_top_bottom_padding',array(
        'label' => __('Copyright Top Bottom Padding','dropshipping-store-pro'),
        'section'   => 'drop_shipping_pro_footer_section',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('drop_shipping_pro_footer_copy_alingment',array(
        'default' => __('left','dropshipping-store-pro'),
        'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(new drop_shipping_pro_Image_Radio_Control($wp_customize, 'drop_shipping_pro_footer_copy_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section',
        'settings' => 'drop_shipping_pro_footer_copy_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/assets/images/copyright1.png',
            'center' => get_template_directory_uri().'/assets/images/copyright2.png',
            'right' => get_template_directory_uri().'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_para_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_footer_para_color', array(
        'label' => __('Copyright Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section',
        'settings' => 'drop_shipping_pro_footer_para_color',
    )));

    $wp_customize->add_setting('drop_shipping_pro_footer_para_font_family',array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
    ));
    $wp_customize->add_control(
      'drop_shipping_pro_footer_para_font_family', array(
      'section'  => 'drop_shipping_pro_footer_section',
      'label'    => __( 'Copyright Fonts','dropshipping-store-pro'),
      'type'     => 'select',
      'choices'  => $font_array,
    ));

    $wp_customize->add_setting('drop_shipping_pro_copyright_para_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('drop_shipping_pro_copyright_para_font_size',array(
        'label' => __('Copyright Font Size','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section',
        'setting'   => 'drop_shipping_pro_copyright_para_font_size',
        'type'  => 'number'
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_social_icon_color_option',
    array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'fotografia_pro_text_sanitization'
    )
    );
    $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_footer_social_icon_color_option',
    array(
        'label' => __('Footer Social Icon','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section'
    )
    ) );

    $wp_customize->add_setting( 'drop_shipping_pro_footer_social_icon_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_footer_social_icon_bg_color', array(
        'label' => __('Social Icon Background Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section',
        'settings' => 'drop_shipping_pro_footer_social_icon_bg_color',
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_social_icon_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_footer_social_icon_color', array(
        'label' => __('Social Icon Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section',
        'settings' => 'drop_shipping_pro_footer_social_icon_color',
    )));

    $wp_customize->add_setting('drop_shipping_pro_footer_social_icon_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('drop_shipping_pro_footer_social_icon_font_size',array(
        'label' => __('Social Icon Font Size','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section',
        'setting'   => 'drop_shipping_pro_footer_social_icon_font_size',
        'type'  => 'number'
    ));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_social_icon_shadow_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_footer_social_icon_shadow_color', array(
        'label' => __('Social Icon Hover Background Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section',
        'settings' => 'drop_shipping_pro_footer_social_icon_shadow_color',
    )));

    $wp_customize->add_setting( 'drop_shipping_pro_footer_social_icon_hover_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_footer_social_icon_hover_color', array(
        'label' => __('Social Icon Hover Color', 'dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_footer_section',
        'settings' => 'drop_shipping_pro_footer_social_icon_hover_color',
    )));
?>