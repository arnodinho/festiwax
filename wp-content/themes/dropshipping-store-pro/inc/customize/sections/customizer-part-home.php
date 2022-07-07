<?php
	/*------------ Featured Block Section -------------*/
	$wp_customize->add_section('drop_shipping_pro_feature_section',array(
		'title'	=> __('Feature Block Settings','dropshipping-store-pro'),
		'description'	=> __('Add Your Content.','dropshipping-store-pro'),
		'priority'	=> null,
		'panel' => 'drop_shipping_pro_panel_id',
	));

	$wp_customize->add_setting('drop_shipping_pro_radio_feature_enable',array(
	    'default'=> 'Enable',
	    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_radio_feature_enable', array(
	    'type' => 'radio',
	    'label' => 'Do you want this section',
	    'section' => 'drop_shipping_pro_feature_section',
	    'choices' => array(
	        'Enable' => 'Enable',
	        'Disable' => 'Disable'
	    ),
	));

  	$wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_radio_feature_enable', array(
	    'selector' => '#feature-block .feature-block2',
	    'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_radio_feature_enable',
	));

	$wp_customize->add_setting( 'drop_shipping_pro_feature_bgcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_feature_bgcolor', array(
		'label' => __('Background Color', 'dropshipping-store-pro'),
		'description'   => __('Either add background color or background image, if you add both background color will be top most priority','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_feature_section',
		'settings' => 'drop_shipping_pro_feature_bgcolor',
	)));

	$wp_customize->add_setting('drop_shipping_pro_feature_bgimage',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize,'drop_shipping_pro_feature_bgimage',array(
		'label' => __('Section Background Image','dropshipping-store-pro'),
		'description' => __('Dimension 1600px * 900px','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_feature_section',
		'settings' => 'drop_shipping_pro_feature_bgimage'
	)));
	        
	$wp_customize->add_setting( 'drop_shipping_pro_feature_bgimage_setting', array(
		'default'         => 'bwt-scroll',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_feature_bgimage_setting', array(
		'type'      => 'radio',
		'label'     => __('Choose image option', 'dropshipping-store-pro'),
		'section'   => 'drop_shipping_pro_feature_section',
		'choices'   => array(
		'bwt-scroll'      => __( 'Scroll', 'dropshipping-store-pro' ),  
		'bwt-fixed'      => __( 'Fixed', 'dropshipping-store-pro' ),                  
	),));	

	$wp_customize->add_setting( 'drop_shipping_pro_feature_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_feature_content_settings',
	    array(
	    'label' => __('Content Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_feature_section'
	)));

	$wp_customize->add_setting('drop_shipping_pro_feature_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_feature_number',array(
		'label'	=> __('Number of Blocks to show','dropshipping-store-pro'),
		'section'	=> 'drop_shipping_pro_feature_section',
		'type'		=> 'number'
	));
	$block_number_count =  get_theme_mod('drop_shipping_pro_feature_number', 4);
	for($i=1;$i<=$block_number_count;$i++) {

        $wp_customize->add_setting( 'drop_shipping_pro_feature_image_separator_option'.$i,
            array(
                'default' => '',
                'transport' => 'postMessage',
                'sanitize_callback' => 'sanitize_textarea_field'
            )
        );
        $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_feature_image_separator_option'.$i,
            array(
                'label' => __('Block Settings ','dropshipping-store-pro').$i,
                'section' => 'drop_shipping_pro_feature_section'
            )
        ) );

		$wp_customize->add_setting('drop_shipping_pro_feature_heading'.$i,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));		
		$wp_customize->add_control('drop_shipping_pro_feature_heading'.$i,array(
			'label'	=> __('Block Title','dropshipping-store-pro'),
			'section'=> 'drop_shipping_pro_feature_section',
			'type'	=> 'text'
		));

		$wp_customize->add_setting('drop_shipping_pro_feature_text'.$i,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
		));		
		$wp_customize->add_control('drop_shipping_pro_feature_text'.$i,array(
			'label'	=> __('Block Text','dropshipping-store-pro'),
			'section'=> 'drop_shipping_pro_feature_section',
			'type'	=> 'text'
		));

	    $wp_customize->add_setting(
	      'drop_shipping_pro_feature_icon'.$i,
	      array(
	        'default'     => '',
	        'sanitize_callback' => 'sanitize_text_field'
	      )
	    );
	    $wp_customize->add_control(
	      new drop_shipping_pro_Fontawesome_Icon_Chooser(
	        $wp_customize,
	        'drop_shipping_pro_feature_icon'.$i,
	        array(
	          'settings'    => 'drop_shipping_pro_feature_icon'.$i,
	          'section'   => 'drop_shipping_pro_feature_section',
	          'type'      => 'icon',
	          'label'     => esc_html__( 'Choose Icon ', 'dropshipping-store-pro' ).$i,
	        )
	      )
	    );

	}
	
	$wp_customize->add_setting( 'drop_shipping_pro_feature_section_color_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_feature_section_color_settings',
	    array(
	    'label' => __('Feature Block Content Color And Font Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_feature_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_feature_block_content_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_feature_block_content_color', array(
		'label' => 'Block Content Color',
		'section' => 'drop_shipping_pro_feature_section',
		'settings' => 'drop_shipping_pro_feature_block_content_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_feature_block_Heading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_feature_block_Heading_font_family', array(
	    'section'  => 'drop_shipping_pro_feature_section',
	    'label'    => __( 'Block Heading Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_feature_block_Heading_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_feature_block_Heading_font_size',array(
		'label' => __('Block Heading Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_feature_section',
		'setting' => 'drop_shipping_pro_feature_block_Heading_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting('drop_shipping_pro_feature_block_text_font_family',array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_feature_block_text_font_family', array(
	    'section'  => 'drop_shipping_pro_feature_section',
	    'label'    => __( 'Block Text Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_feature_block_text_font_size',array(
	  'default' => '',
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_feature_block_text_font_size',array(
		'label' => __('Block Text Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_feature_section',
		'setting' => 'drop_shipping_pro_feature_block_text_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_feature_block_icon_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_feature_block_icon_color', array(
		'label' => 'Block Icon Color',
		'section' => 'drop_shipping_pro_feature_section',
		'settings' => 'drop_shipping_pro_feature_block_icon_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_feature_block_icon_font_size',array(
	  'default' => '',
	  'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_feature_block_icon_font_size',array(
		'label' => __('Block Icon Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_feature_section',
		'setting' => 'drop_shipping_pro_feature_block_icon_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_feature_block_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_feature_block_hover_color', array(
		'label' => 'Block Hover Color',
		'section' => 'drop_shipping_pro_feature_section',
		'settings' => 'drop_shipping_pro_feature_block_hover_color',
	)));

	/*------------ Our product --------------------*/

	$wp_customize->add_section('drop_shipping_pro_our_product_section',array(
		'title'	=> __('Our Product Settings','dropshipping-store-pro'),
		'description'	=> __('Add Your Content.','dropshipping-store-pro'),
		'priority'	=> null,
		'panel' => 'drop_shipping_pro_panel_id',
	));

	$wp_customize->add_setting('drop_shipping_pro_all_product_enabledisable',array(
	    'default'=> 'Enable',
	    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_all_product_enabledisable', array(
	    'type' => 'radio',
	    'label' => 'Do you want this section',
	    'section' => 'drop_shipping_pro_our_product_section',
	    'choices' => array(
	        'Enable' => 'Enable',
	        'Disable' => 'Disable'
	    ),
	));

	$wp_customize->add_setting( 'drop_shipping_pro_all_product_bg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_all_product_bg_color', array(
		'label' => __('Background Color', 'dropshipping-store-pro'),
		'description'   => __('Either add background color or background image, if you add both background color will be top most priority','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_all_product_bg_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_all_product_bg_image',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize,'drop_shipping_pro_all_product_bg_image',array(
		'label' => __('Section Background Image','dropshipping-store-pro'),
		'description' => __('Dimension 1600px * 900px','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_all_product_bg_image'
	)));
	        
	$wp_customize->add_setting( 'drop_shipping_pro_all_product_image_attachment', array(
		'default'         => 'bwt-scroll',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_all_product_image_attachment', array(
		'type'      => 'radio',
		'label'     => __('Choose image option', 'dropshipping-store-pro'),
		'section'   => 'drop_shipping_pro_our_product_section',
		'choices'   => array(
		'bwt-scroll'      => __( 'Scroll', 'dropshipping-store-pro' ),  
		'bwt-fixed'      => __( 'Fixed', 'dropshipping-store-pro' ),                  
	),));	

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_our_product_content_settings',
	    array(
	    'label' => __('Content Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_our_product_section'
	)));

    $wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_our_product_heading', array(
	    'selector' => '#our-products h3',
	    'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_our_product_heading',
	));

	$wp_customize->add_setting('drop_shipping_pro_our_product_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));		
	$wp_customize->add_control('drop_shipping_pro_our_product_heading',array(
		'label'	=> __('Heading','dropshipping-store-pro'),
		'section'=> 'drop_shipping_pro_our_product_section',
		'type'	=> 'text'
	));

	$args = array(
            'type'                     => 'product',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => 'term_group',
            'order'                    => 'ASC',
            'hide_empty'               => false,
            'hierarchical'             => 1,
            'number'                   => '',
            'taxonomy'                 => 'product_tag',
            'pad_counts'               => false
        );
        $tags = get_tags( $args );
        $cats = array();
        $i = 0;
        foreach($tags as $tag){
            if($i==0){
                $default = $tag->slug;
                $i++;
            }
        $cats[$tag->slug] = $tag->name;
        }

	$wp_customize->add_setting('drop_shipping_pro_our_product_tag',array(
	  'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_our_product_tag',array(
	  'type'    => 'select',
	  'choices' => $cats,
	  'label' => __('Select Product Tag','dropshipping-store-pro'),
	  'section' => 'drop_shipping_pro_our_product_section',
	));

	$wp_customize->add_setting('drop_shipping_pro_our_product_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_textarea_field',
	));
	$wp_customize->add_control('drop_shipping_pro_our_product_text',array(
		'label' => __('Our Product Button Text ','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_product_section',
		'setting'	=> 'drop_shipping_pro_our_product_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_our_product_btnurl',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('drop_shipping_pro_our_product_btnurl',array(
		'label' => __('Our Product Button URL ','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_product_section',
		'setting'	=> 'drop_shipping_pro_our_product_btnurl',
		'type'	=> 'text'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_color_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_our_product_color_settings',
	    array(
	    'label' => __('Section Color And Font Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_our_product_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_section_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_section_title_color', array(
		'label' => 'Section Title Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_section_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_our_product_section_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_our_product_section_title_fonts', array(
	    'section'  => 'drop_shipping_pro_our_product_section',
	    'label'    => __( 'Section Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_our_product_section_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_our_product_section_title_font_size',array(
		'label' => __('Section Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_product_section',
		'setting' => 'drop_shipping_pro_our_product_section_title_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_font_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_our_product_font_settings',
	    array(
	    'label' => __('Product Color And Font Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_our_product_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_title_color', array(
		'label' => 'Product Title Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_our_product_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_our_product_title_fonts', array(
	    'section'  => 'drop_shipping_pro_our_product_section',
	    'label'    => __( 'Product Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_our_product_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_our_product_title_font_size',array(
		'label' => __('Product Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_product_section',
		'setting' => 'drop_shipping_pro_our_product_title_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_star_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_star_color', array(
		'label' => 'Product Star Rating Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_star_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_price_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_price_color', array(
		'label' => 'Product Price Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_price_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_our_product_price_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_our_product_price_fonts', array(
	    'section'  => 'drop_shipping_pro_our_product_section',
	    'label'    => __( 'Product Price Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_our_product_price_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_our_product_price_font_size',array(
		'label' => __('Product Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_product_section',
		'setting' => 'drop_shipping_pro_our_product_price_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_cart_btn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_cart_btn_color', array(
		'label' => 'Product Cart Button Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_cart_btn_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_cart_btnbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_cart_btnbg_color', array(
		'label' => 'Product Cart Button Background Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_cart_btnbg_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_cart_btn_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_cart_btn_hover_color', array(
		'label' => 'Product Cart Button Background Hover Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_cart_btn_hover_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_our_product_cart_btn_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_our_product_cart_btn_fonts', array(
	    'section'  => 'drop_shipping_pro_our_product_section',
	    'label'    => __( 'Product Cart Button Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_our_product_cart_btn_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_our_product_cart_btn_font_size',array(
		'label' => __('Product Cart Button Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_product_section',
		'setting' => 'drop_shipping_pro_our_product_cart_btn_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_sale_badge_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_sale_badge_color', array(
		'label' => 'Product Sale Badge Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_sale_badge_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_sale_badgebg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_sale_badgebg_color', array(
		'label' => 'Product Sale Badge Background Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_sale_badgebg_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_our_product_sale_badge_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_our_product_sale_badge_fonts', array(
	    'section'  => 'drop_shipping_pro_our_product_section',
	    'label'    => __( 'Product Sale Badge Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_our_product_sale_badge_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_our_product_sale_badge_font_size',array(
		'label' => __('Product Sale Badge Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_product_section',
		'setting' => 'drop_shipping_pro_our_product_sale_badge_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_box_icon_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_box_icon_color', array(
		'label' => 'Product Box Icon Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_box_icon_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_box_iconbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_box_iconbg_color', array(
		'label' => 'Product Box Icon Background Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_box_iconbg_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_our_product_box_icon_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_our_product_box_icon_font_size',array(
		'label' => __('Product Box Icon Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_product_section',
		'setting' => 'drop_shipping_pro_our_product_box_icon_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_btn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_btn_color', array(
		'label' => 'Section Button Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_btn_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_btnbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_btnbg_color', array(
		'label' => 'Section Button Background Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_btnbg_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_our_product_btn_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_our_product_btn_fonts', array(
	    'section'  => 'drop_shipping_pro_our_product_section',
	    'label'    => __( 'Section Button Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_our_product_btn_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_our_product_btn_font_size',array(
		'label' => __('Section Button Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_product_section',
		'setting' => 'drop_shipping_pro_our_product_btn_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_our_product_hover_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_product_hover_bg_color', array(
		'label' => 'Product Background Hover Color',
		'section' => 'drop_shipping_pro_our_product_section',
		'settings' => 'drop_shipping_pro_our_product_hover_bg_color',
	)));


	/*------------------Product Categories Section-----------------*/
	$wp_customize->add_section('drop_shipping_pro_all_category_section',array(
		'title'	=> __('Category Section','dropshipping-store-pro'),
		'description'=> __('Add Product Categories here.','dropshipping-store-pro'),
		'panel' => 'drop_shipping_pro_panel_id',
	));

	$wp_customize->add_setting('drop_shipping_pro_category_enable',array(
	    'default'=> 'Enable',
	    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_category_enable', array(
	    'type' => 'radio',
	    'label' => 'Do you want this section',
	    'section' => 'drop_shipping_pro_all_category_section',
	    'choices' => array(
	        'Enable' => 'Enable',
	        'Disable' => 'Disable'
	    ),
	));

    $wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_category_enable', array(
	    'selector' => '#category h3',
	    'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_category_enable',
	));

    $wp_customize->add_setting( 'drop_shipping_pro_category_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_category_bgcolor',array(
		'label' => __('Background Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_all_category_section',
		'settings' => 'drop_shipping_pro_category_bgcolor',
	)));
	$wp_customize->add_setting('drop_shipping_pro_category_bgimage',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_category_bgimage',
        array(
            'label' => __('Background Image','dropshipping-store-pro'),
            'description'=> __('Background Image.','dropshipping-store-pro'),
            'section' => 'drop_shipping_pro_all_category_section',
            'settings' => 'drop_shipping_pro_category_bgimage'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_category_image_attachment', array(
		'default'         => '',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_category_image_attachment', array(
		'type'      => 'radio',
		'label'     => __('Choose image option', 'dropshipping-store-pro'),
		'section'   => 'drop_shipping_pro_all_category_section',
		'choices'   => array(
		'vw-fixed'      => __( 'Fixed', 'dropshipping-store-pro' ),
		'vw-scroll'      => __( 'Scroll', 'dropshipping-store-pro' ),                    
	)));

	$wp_customize->add_setting('drop_shipping_pro_category_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_category_title',array(
		'label' => __('Title','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_all_category_section',
		'setting' => 'drop_shipping_pro_category_title',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_category_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_category_content_settings',
	    array(
	    'label' => __('Section Content Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_all_category_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_all_category_section_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_all_category_section_title_color', array(
		'label' => 'Section Title Color',
		'section' => 'drop_shipping_pro_all_category_section',
		'settings' => 'drop_shipping_pro_all_category_section_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_all_category_section_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_all_category_section_title_fonts', array(
	    'section'  => 'drop_shipping_pro_all_category_section',
	    'label'    => __( 'Section Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_all_category_section_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_all_category_section_title_font_size',array(
		'label' => __('Section Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_all_category_section',
		'setting' => 'drop_shipping_pro_all_category_section_title_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_all_category_font_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_all_category_font_settings',
	    array(
	    'label' => __('Category Color And Font Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_all_category_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_all_category_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_all_category_title_color', array(
		'label' => 'Category Title Color',
		'section' => 'drop_shipping_pro_all_category_section',
		'settings' => 'drop_shipping_pro_all_category_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_all_category_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_all_category_title_fonts', array(
	    'section'  => 'drop_shipping_pro_all_category_section',
	    'label'    => __( 'Category Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_all_category_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_all_category_title_font_size',array(
		'label' => __('Category Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_all_category_section',
		'setting' => 'drop_shipping_pro_all_category_title_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_all_category_img_bg1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_all_category_img_bg1_color', array(
		'label' => 'Category Image Background Color 1',
		'section' => 'drop_shipping_pro_all_category_section',
		'settings' => 'drop_shipping_pro_all_category_img_bg1_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_all_category_img_bg2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_all_category_img_bg2_color', array(
		'label' => 'Category Image Background Color 2',
		'section' => 'drop_shipping_pro_all_category_section',
		'settings' => 'drop_shipping_pro_all_category_img_bg2_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_all_category_img_bg3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_all_category_img_bg3_color', array(
		'label' => 'Category Image Background Color 3',
		'section' => 'drop_shipping_pro_all_category_section',
		'settings' => 'drop_shipping_pro_all_category_img_bg3_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_all_category_img_bg4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_all_category_img_bg4_color', array(
		'label' => 'Category Image Background Color 4',
		'section' => 'drop_shipping_pro_all_category_section',
		'settings' => 'drop_shipping_pro_all_category_img_bg4_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_all_category_img_bg5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_all_category_img_bg5_color', array(
		'label' => 'Category Image Background Color 5',
		'section' => 'drop_shipping_pro_all_category_section',
		'settings' => 'drop_shipping_pro_all_category_img_bg5_color',
	)));

	/*--------------Product Brand Banner-----------*/
	$wp_customize->add_section('drop_shipping_pro_product_banner1_section',array(
		'title'	=> __('Product Banner Settings','dropshipping-store-pro'),
		'description'	=> __('Add Product Banner Content.','dropshipping-store-pro'),
		'priority'	=> null,
		'panel' => 'drop_shipping_pro_panel_id',
	));

	$wp_customize->add_setting('drop_shipping_pro_radio_product_banner1_enable',array(
	    'default'=> 'Enable',
	    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_radio_product_banner1_enable', array(
	    'type' => 'radio',
	    'label' => 'Do you want this section',
	    'section' => 'drop_shipping_pro_product_banner1_section',
	    'choices' => array(
	        'Enable' => 'Enable',
	        'Disable' => 'Disable'
	    ),
	));

  	$wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_radio_product_banner1_enable', array(
	    'selector' => '#product-banner1 .popular-stores-box:first-child h4',
	    'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_radio_product_banner1_enable',
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner1_bgcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_banner1_bgcolor', array(
		'label' => __('Background Color', 'dropshipping-store-pro'),
		'description'   => __('Either add background color or background image, if you add both background color will be top most priority','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'settings' => 'drop_shipping_pro_product_banner1_bgcolor',
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_bgimage',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize,'drop_shipping_pro_product_banner1_bgimage',array(
		'label' => __('Section Background Image','dropshipping-store-pro'),
		'description' => __('Dimension 1600px * 900px','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'settings' => 'drop_shipping_pro_product_banner1_bgimage'
	)));
	        
	$wp_customize->add_setting( 'drop_shipping_pro_product_banner1_bgimage_setting', array(
		'default'         => 'bwt-scroll',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner1_bgimage_setting', array(
		'type'      => 'radio',
		'label'     => __('Choose image option', 'dropshipping-store-pro'),
		'section'   => 'drop_shipping_pro_product_banner1_section',
		'choices'   => array(
		'bwt-scroll'      => __( 'Scroll', 'dropshipping-store-pro' ),  
		'bwt-fixed'      => __( 'Fixed', 'dropshipping-store-pro' ),                  
	),));	

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner1s_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_product_banner1s_content_settings',
	    array(
	    'label' => __('Content Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_product_banner1_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner1s_content_box1_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_product_banner1s_content_box1_settings',
	    array(
	    'label' => __('Box 1 Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_product_banner1_section'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_box_bgimage1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_product_banner1_box_bgimage1',
        array(
        'label' => __('Background Image ','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_product_banner1_section',
        'settings' => 'drop_shipping_pro_product_banner1_box_bgimage1'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_image1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_product_banner1_image1',
        array(
        'label' => __('Product Image 1','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_product_banner1_section',
        'settings' => 'drop_shipping_pro_product_banner1_image1'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_main_title1',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner1_main_title1',array(
		'label' => __('Title 1','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'setting'	=> 'drop_shipping_pro_product_banner1_main_title1',
		'type'	=> 'text'
	));	

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_small_title1',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner1_small_title1',array(
		'label' => __('Small Title 1','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'setting'	=> 'drop_shipping_pro_product_banner1_small_title1',
		'type'	=> 'text'
	));	

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_btn_text1',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner1_btn_text1',array(
		'label' => __('Button Text','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'setting' => 'drop_shipping_pro_product_banner1_btn_text1',
		'type'  => 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_btn_url1',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner1_btn_url1',array(
		'label' => __('Button Url','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'setting' => 'drop_shipping_pro_product_banner1_btn_url1',
		'type'  => 'text'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner1s_content_box2_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_product_banner1s_content_box2_settings',
	    array(
	    'label' => __('Box 2 Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_product_banner1_section'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_box_bgimage2',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_product_banner1_box_bgimage2',
        array(
        'label' => __('Background Image ','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_product_banner1_section',
        'settings' => 'drop_shipping_pro_product_banner1_box_bgimage2'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_image2',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_product_banner1_image2',
        array(
        'label' => __('Product Image 2','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_product_banner1_section',
        'settings' => 'drop_shipping_pro_product_banner1_image2'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_main_title2',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner1_main_title2',array(
		'label' => __('Title 2','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'setting'	=> 'drop_shipping_pro_product_banner1_main_title2',
		'type'	=> 'text'
	));	

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_small_title2',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner1_small_title2',array(
		'label' => __('Small Title 2','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'setting'	=> 'drop_shipping_pro_product_banner1_small_title2',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_btn_text2',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner1_btn_text2',array(
		'label' => __('Button Text','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'setting' => 'drop_shipping_pro_product_banner1_btn_text2',
		'type'  => 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_btn_url2',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner1_btn_url2',array(
		'label' => __('Button Url','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'setting' => 'drop_shipping_pro_product_banner1_btn_url2',
		'type'  => 'text'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner1_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_product_banner1_content_settings',
	    array(
	    'label' => __('Font and Color Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_product_banner1_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner1_heading_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_banner1_heading_color', array(
		'label' => 'Heading Color',
		'section' => 'drop_shipping_pro_product_banner1_section',
		'settings' => 'drop_shipping_pro_product_banner1_heading_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_heading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_product_banner1_heading_font_family', array(
	    'section'  => 'drop_shipping_pro_product_banner1_section',
	    'label'    => __( 'Heading Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_heading_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner1_heading_font_size',array(
		'label' => __('Heading Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'setting' => 'drop_shipping_pro_product_banner1_heading_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner1_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_banner1_text_color', array(
		'label' => 'Text Color',
		'section' => 'drop_shipping_pro_product_banner1_section',
		'settings' => 'drop_shipping_pro_product_banner1_text_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_text_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_product_banner1_text_font_family', array(
	    'section'  => 'drop_shipping_pro_product_banner1_section',
	    'label'    => __( 'Text Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_text_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner1_text_font_size',array(
		'label' => __('Text Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'setting' => 'drop_shipping_pro_product_banner1_text_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner1_btn_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_banner1_btn_bg_color', array(
		'label' => 'Button Background Color',
		'section' => 'drop_shipping_pro_product_banner1_section',
		'settings' => 'drop_shipping_pro_product_banner1_btn_bg_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner1_btn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_banner1_btn_color', array(
		'label' => 'Button Color',
		'section' => 'drop_shipping_pro_product_banner1_section',
		'settings' => 'drop_shipping_pro_product_banner1_btn_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_btn_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_product_banner1_btn_font_family', array(
	    'section'  => 'drop_shipping_pro_product_banner1_section',
	    'label'    => __( 'Button Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner1_btn_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner1_btn_font_size',array(
		'label' => __('Button Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner1_section',
		'setting' => 'drop_shipping_pro_product_banner1_btn_font_size',
		'type'    => 'number'
	));

  /*--------------- Product Category -----------------*/
	$wp_customize->add_section('drop_shipping_pro_product_category',array(
		'title' => __('Product Category','dropshipping-store-pro'),
		'description' => __('Add Content Here','dropshipping-store-pro'),
		'panel' => 'drop_shipping_pro_panel_id',
	));

	$wp_customize->add_setting('drop_shipping_pro_product_category_enable',array(
	    'default'=> 'Enable',
	    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_product_category_enable', array(
	    'type' => 'radio',
	    'label' => 'Do you want this section',
	    'section' => 'drop_shipping_pro_product_category',
	    'choices' => array(
	        'Enable' => 'Enable',
	        'Disable' => 'Disable'
	    ),
	));

    $wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_product_category_enable', array(
	    'selector' => '#product-category h4',
	    'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_product_category_enable',
	));

    $wp_customize->add_setting( 'drop_shipping_pro_product_category_bgcolor', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_category_bgcolor',array(
		'label' => __('Background Color', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_category',
		'settings' => 'drop_shipping_pro_product_category_bgcolor',
	)));
	$wp_customize->add_setting('drop_shipping_pro_product_category_bgimage',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_product_category_bgimage',
        array(
            'label' => __('Background Image','dropshipping-store-pro'),
            'description'=> __('Background Image.','dropshipping-store-pro'),
            'section' => 'drop_shipping_pro_product_category',
            'settings' => 'drop_shipping_pro_product_category_bgimage'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_product_category_image_attachment', array(
		'default'         => '',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_product_category_image_attachment', array(
		'type'      => 'radio',
		'label'     => __('Choose image option', 'dropshipping-store-pro'),
		'section'   => 'drop_shipping_pro_product_category',
		'choices'   => array(
		'vw-fixed'      => __( 'Fixed', 'dropshipping-store-pro' ),
		'vw-scroll'      => __( 'Scroll', 'dropshipping-store-pro' ),                    
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_category_trending_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_category_trending_heading',array(
		'label' => __('Category 1 Heading','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_category',
		'setting' => 'drop_shipping_pro_product_category_trending_heading',
		'type'    => 'text'
	));


  	$args = array(
        'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_tag',
        'pad_counts'               => false
    );
    $tags = get_tags( $args );
    $cats = array();
    $i = 0;
    foreach($tags as $tag){
        if($i==0){
            $default = $tag->slug;
            $i++;
        }
    $cats[$tag->slug] = $tag->name;
    }

	$wp_customize->add_setting('drop_shipping_pro_trending_now_category',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_trending_now_category',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Product Tag','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_category',
	));

	$wp_customize->add_setting('drop_shipping_pro_product_category_top_rated_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_category_top_rated_heading',array(
		'label' => __('Category 2 Heading','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_category',
		'setting' => 'drop_shipping_pro_product_category_top_rated_heading',
		'type'    => 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_top_rated_category',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_top_rated_category',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Product Tag','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_category',
	));

	$wp_customize->add_setting('drop_shipping_pro_product_category_most_popular_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_category_most_popular_heading',array(
		'label' => __('Category 3 Heading','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_category',
		'setting' => 'drop_shipping_pro_product_category_most_popular_heading',
		'type'    => 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_most_popular_category',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_most_popular_category',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Product Tag','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_category',
	));

	$wp_customize->add_setting('drop_shipping_pro_product_category_top_selling_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_category_top_selling_heading',array(
		'label' => __('Category 4 Heading','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_category',
		'setting' => 'drop_shipping_pro_product_category_top_selling_heading',
		'type'    => 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_top_selling_category',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_top_selling_category',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Product Tag','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_category',
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_category_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_product_category_content_settings',
	    array(
	    'label' => __('Content Color and Font Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_product_category'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_product_section_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_section_title_color', array(
		'label' => 'Section Title Color',
		'section' => 'drop_shipping_pro_product_category',
		'settings' => 'drop_shipping_pro_product_section_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_section_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_product_section_title_fonts', array(
	    'section'  => 'drop_shipping_pro_product_category',
	    'label'    => __( 'Section Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_product_section_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_section_title_font_size',array(
		'label' => __('Section Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_category',
		'setting' => 'drop_shipping_pro_product_section_title_font_size',
		'type'    => 'number'
	));


	$wp_customize->add_setting( 'drop_shipping_pro_product_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_title_color', array(
		'label' => 'Product Title Color',
		'section' => 'drop_shipping_pro_product_category',
		'settings' => 'drop_shipping_pro_product_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_product_title_fonts', array(
	    'section'  => 'drop_shipping_pro_product_category',
	    'label'    => __( 'Product Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_product_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_title_font_size',array(
		'label' => __('Product Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_category',
		'setting' => 'drop_shipping_pro_product_title_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_rating_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_rating_color', array(
		'label' => 'Product Star Rating Color',
		'section' => 'drop_shipping_pro_product_category',
		'settings' => 'drop_shipping_pro_product_rating_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_product_price_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_price_color', array(
		'label' => 'Product Price Color',
		'section' => 'drop_shipping_pro_product_category',
		'settings' => 'drop_shipping_pro_product_price_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_price_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_product_price_fonts', array(
	    'section'  => 'drop_shipping_pro_product_category',
	    'label'    => __( 'Product Price Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_product_price_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_price_font_size',array(
		'label' => __('Product Price Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_category',
		'setting' => 'drop_shipping_pro_product_price_font_size',
		'type'    => 'number'
	));

	/*--------------- Deals -----------------*/
	$wp_customize->add_section('drop_shipping_pro_deals_section',array(
		'title' => __('Deal Of The Day','dropshipping-store-pro'),
		'description' => __('Add Content Here','dropshipping-store-pro'),
		'panel' => 'drop_shipping_pro_panel_id',
	));

    $wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_deals_enable', array(
	    'selector' => '#deals .section-title h3',
	    'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_deals_enable',
	));

	$wp_customize->add_setting('drop_shipping_pro_deals_enable',array(
	    'default'=> 'Enable',
	    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_deals_enable', array(
	    'type' => 'radio',
	    'label' => 'Do you want this section',
	    'section' => 'drop_shipping_pro_deals_section',
	    'choices' => array(
	        'Enable' => 'Enable',
	        'Disable' => 'Disable'
	    ),
	));

	$wp_customize->add_setting( 'drop_shipping_pro_deals_bgcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_deals_bgcolor', array(
		'label' => __('Background Color', 'dropshipping-store-pro'),
		'description'   => __('Either add background color or background image, if you add both background color will be top most priority','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_deals_section',
		'settings' => 'drop_shipping_pro_deals_bgcolor',
	)));

	$wp_customize->add_setting('drop_shipping_pro_deals_bgimage',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize,'drop_shipping_pro_deals_bgimage',array(
		'label' => __('Section Background Image','dropshipping-store-pro'),
		'description' => __('Dimension 1600px * 900px','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_deals_section',
		'settings' => 'drop_shipping_pro_deals_bgimage'
	)));
	        
	$wp_customize->add_setting( 'drop_shipping_pro_deals_bgimage_attachment', array(
		'default'         => 'bwt-scroll',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_deals_bgimage_attachment', array(
		'type'      => 'radio',
		'label'     => __('Choose image option', 'dropshipping-store-pro'),
		'section'   => 'drop_shipping_pro_deals_section',
		'choices'   => array(
		'bwt-scroll'      => __( 'Scroll', 'dropshipping-store-pro' ),  
		'bwt-fixed'      => __( 'Fixed', 'dropshipping-store-pro' ),                  
	),));	

	$wp_customize->add_setting( 'drop_shipping_pro_featured_product_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_featured_product_content_settings',
	    array(
	    'label' => __('Content Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_deals_section'
	)));	
 
	$wp_customize->add_setting('drop_shipping_pro_deals_section_main_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_deals_section_main_heading',array(
		'label' => __('Section Main Heading','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_deals_section',
		'setting' => 'drop_shipping_pro_deals_section_main_heading',
		'type'    => 'text'
	));


	$args = array(
            'type'                     => 'product',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => 'term_group',
            'order'                    => 'ASC',
            'hide_empty'               => false,
            'hierarchical'             => 1,
            'number'                   => '',
            'taxonomy'                 => 'product_tag',
            'pad_counts'               => false
        );
        $tags = get_tags( $args );
        $cats = array();
        $i = 0;
        foreach($tags as $tag){
            if($i==0){
                $default = $tag->slug;
                $i++;
            }
        $cats[$tag->slug] = $tag->name;
        }
	$wp_customize->add_setting('drop_shipping_pro_deals_section_category',array(
	  'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_deals_section_category',array(
	  'type'    => 'select',
	  'choices' => $cats,
	  'label' => __('Select Product Tag','dropshipping-store-pro'),
	  'section' => 'drop_shipping_pro_deals_section',
	));

	$wp_customize->add_setting('drop_shipping_pro_deals_section_clock_timer_end',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('drop_shipping_pro_deals_section_clock_timer_end',array(
		'label' => __('Enter End Date of Timer','dropshipping-store-pro'),
		'section'=> 'drop_shipping_pro_deals_section',
		'description'=>'Timer get the current date and time. So you just need to add the end date. Please Use the following format to add the date "Month date year hours:minutes:seconds" example "August 11 2020 11:00:00".',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_deals_color_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_deals_color_content_settings',
	    array(
	    'label' => __('Color And Font Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_deals_section'
	)));	

	$wp_customize->add_setting( 'drop_shipping_pro_deals_section_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_deals_section_title_color', array(
		'label' => 'Section Title Color',
		'section' => 'drop_shipping_pro_deals_section',
		'settings' => 'drop_shipping_pro_deals_section_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_deals_section_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_deals_section_title_fonts', array(
	    'section'  => 'drop_shipping_pro_deals_section',
	    'label'    => __( 'Section Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_deals_section_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_deals_section_title_font_size',array(
		'label' => __('Section Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_deals_section',
		'setting' => 'drop_shipping_pro_deals_section_title_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_deals_product_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_deals_product_title_color', array(
		'label' => 'Product Title Color',
		'section' => 'drop_shipping_pro_deals_section',
		'settings' => 'drop_shipping_pro_deals_product_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_deals_product_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_deals_product_title_fonts', array(
	    'section'  => 'drop_shipping_pro_deals_section',
	    'label'    => __( 'Product Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_deals_product_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_deals_product_title_font_size',array(
		'label' => __('Product Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_deals_section',
		'setting' => 'drop_shipping_pro_deals_product_title_font_size',
		'type'    => 'number'
	));	

	$wp_customize->add_setting( 'drop_shipping_pro_deals_product_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_deals_product_text_color', array(
		'label' => 'Product Description Color',
		'section' => 'drop_shipping_pro_deals_section',
		'settings' => 'drop_shipping_pro_deals_product_text_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_deals_product_text_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_deals_product_text_fonts', array(
	    'section'  => 'drop_shipping_pro_deals_section',
	    'label'    => __( 'Product Description Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_deals_product_text_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_deals_product_text_font_size',array(
		'label' => __('Product Description Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_deals_section',
		'setting' => 'drop_shipping_pro_deals_product_text_font_size',
		'type'    => 'number'
	));	
	
	$wp_customize->add_setting( 'drop_shipping_pro_deals_product_price_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_deals_product_price_color', array(
		'label' => 'Product Price Color',
		'section' => 'drop_shipping_pro_deals_section',
		'settings' => 'drop_shipping_pro_deals_product_price_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_deals_product_price_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_deals_product_price_fonts', array(
	    'section'  => 'drop_shipping_pro_deals_section',
	    'label'    => __( 'Product Price Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_deals_product_price_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_deals_product_price_font_size',array(
		'label' => __('Product Price Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_deals_section',
		'setting' => 'drop_shipping_pro_deals_product_price_font_size',
		'type'    => 'number'
	));	

	$wp_customize->add_setting( 'drop_shipping_pro_deals_star_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_deals_star_color', array(
		'label' => 'Product Star Rating Color',
		'section' => 'drop_shipping_pro_deals_section',
		'settings' => 'drop_shipping_pro_deals_star_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_deals_timer_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_deals_timer_bg_color', array(
		'label' => 'Product Timer Background Color',
		'section' => 'drop_shipping_pro_deals_section',
		'settings' => 'drop_shipping_pro_deals_timer_bg_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_deals_timer_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_deals_timer_color', array(
		'label' => 'Product Timer Content Color',
		'section' => 'drop_shipping_pro_deals_section',
		'settings' => 'drop_shipping_pro_deals_timer_color',
	)));	

	$wp_customize->add_setting('drop_shipping_pro_deals_timer_number_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_deals_timer_number_fonts', array(
	    'section'  => 'drop_shipping_pro_deals_section',
	    'label'    => __( 'Product Timer Number Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_deals_timer_number_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_deals_timer_number_font_size',array(
		'label' => __('Product Timer Number Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_deals_section',
		'setting' => 'drop_shipping_pro_deals_timer_number_font_size',
		'type'    => 'number'
	));	

	$wp_customize->add_setting('drop_shipping_pro_deals_timer_span_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_deals_timer_span_fonts', array(
	    'section'  => 'drop_shipping_pro_deals_section',
	    'label'    => __( 'Product Timer Text Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_deals_timer_span_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_deals_timer_span_font_size',array(
		'label' => __('Product Timer Text Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_deals_section',
		'setting' => 'drop_shipping_pro_deals_timer_span_font_size',
		'type'    => 'number'
	));	

	$wp_customize->add_setting( 'drop_shipping_pro_deals_next_nav_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_deals_next_nav_color', array(
		'label' => 'Nav Next Color',
		'section' => 'drop_shipping_pro_deals_section',
		'settings' => 'drop_shipping_pro_deals_next_nav_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_deals_next_nav_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_deals_next_nav_font_size',array(
		'label' => __('Nav Next Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_deals_section',
		'setting' => 'drop_shipping_pro_deals_next_nav_font_size',
		'type'    => 'number'
	));	

	$wp_customize->add_setting( 'drop_shipping_pro_deals_prev_nav_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_deals_prev_nav_color', array(
		'label' => 'Nav Prev Color',
		'section' => 'drop_shipping_pro_deals_section',
		'settings' => 'drop_shipping_pro_deals_prev_nav_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_deals_prev_nav_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_deals_prev_nav_font_size',array(
		'label' => __('Nav Prev Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_deals_section',
		'setting' => 'drop_shipping_pro_deals_prev_nav_font_size',
		'type'    => 'number'
	));	

/*--------------Product Brand Banner-----------*/
	$wp_customize->add_section('drop_shipping_pro_product_banner2_section',array(
		'title'	=> __('Product Banner 2 Settings','dropshipping-store-pro'),
		'description'	=> __('Add Product Banner Content.','dropshipping-store-pro'),
		'priority'	=> null,
		'panel' => 'drop_shipping_pro_panel_id',
	));

	$wp_customize->add_setting('drop_shipping_pro_radio_product_banner2_enable',array(
	    'default'=> 'Enable',
	    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_radio_product_banner2_enable', array(
	    'type' => 'radio',
	    'label' => 'Do you want this section',
	    'section' => 'drop_shipping_pro_product_banner2_section',
	    'choices' => array(
	        'Enable' => 'Enable',
	        'Disable' => 'Disable'
	    ),
	));

  	$wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_radio_product_banner2_enable', array(
	    'selector' => '#product-banner1 .popular-stores-box:first-child h4',
	    'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_radio_product_banner2_enable',
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner2_bgcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_banner2_bgcolor', array(
		'label' => __('Background Color', 'dropshipping-store-pro'),
		'description'   => __('Either add background color or background image, if you add both background color will be top most priority','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'settings' => 'drop_shipping_pro_product_banner2_bgcolor',
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_bgimage',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize,'drop_shipping_pro_product_banner2_bgimage',array(
		'label' => __('Section Background Image','dropshipping-store-pro'),
		'description' => __('Dimension 1600px * 900px','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'settings' => 'drop_shipping_pro_product_banner2_bgimage'
	)));
	        
	$wp_customize->add_setting( 'drop_shipping_pro_product_banner2_bgimage_setting', array(
		'default'         => 'bwt-scroll',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner2_bgimage_setting', array(
		'type'      => 'radio',
		'label'     => __('Choose image option', 'dropshipping-store-pro'),
		'section'   => 'drop_shipping_pro_product_banner2_section',
		'choices'   => array(
		'bwt-scroll'      => __( 'Scroll', 'dropshipping-store-pro' ),  
		'bwt-fixed'      => __( 'Fixed', 'dropshipping-store-pro' ),                  
	),));	

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner2s_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_product_banner2s_content_settings',
	    array(
	    'label' => __('Content Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_product_banner2_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner2s_content_box1_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_product_banner2s_content_box1_settings',
	    array(
	    'label' => __('Box 1 Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_product_banner2_section'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_box_bgimage1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_product_banner2_box_bgimage1',
        array(
        'label' => __('Background Image ','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_product_banner2_section',
        'settings' => 'drop_shipping_pro_product_banner2_box_bgimage1'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_image1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_product_banner2_image1',
        array(
        'label' => __('Product Image 1','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_product_banner2_section',
        'settings' => 'drop_shipping_pro_product_banner2_image1'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_main_title1',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner2_main_title1',array(
		'label' => __('Title 1','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting'	=> 'drop_shipping_pro_product_banner2_main_title1',
		'type'	=> 'text'
	));	

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_small_title1',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner2_small_title1',array(
		'label' => __('Small Title 1','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting'	=> 'drop_shipping_pro_product_banner2_small_title1',
		'type'	=> 'text'
	));	

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_btn_text1',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner2_btn_text1',array(
		'label' => __('Button Text','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting' => 'drop_shipping_pro_product_banner2_btn_text1',
		'type'  => 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_btn_url1',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner2_btn_url1',array(
		'label' => __('Button Url','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting' => 'drop_shipping_pro_product_banner2_btn_url1',
		'type'  => 'text'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner2s_content_box2_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_product_banner2s_content_box2_settings',
	    array(
	    'label' => __('Box 2 Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_product_banner2_section'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_box_bgimage2',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_product_banner2_box_bgimage2',
        array(
        'label' => __('Background Image ','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_product_banner2_section',
        'settings' => 'drop_shipping_pro_product_banner2_box_bgimage2'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_image2',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_product_banner2_image2',
        array(
        'label' => __('Product Image 2','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_product_banner2_section',
        'settings' => 'drop_shipping_pro_product_banner2_image2'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_main_title2',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner2_main_title2',array(
		'label' => __('Title 2','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting'	=> 'drop_shipping_pro_product_banner2_main_title2',
		'type'	=> 'text'
	));	

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_small_title2',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner2_small_title2',array(
		'label' => __('Small Title 2','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting'	=> 'drop_shipping_pro_product_banner2_small_title2',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_btn_text2',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner2_btn_text2',array(
		'label' => __('Button Text','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting' => 'drop_shipping_pro_product_banner2_btn_text2',
		'type'  => 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_btn_url2',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner2_btn_url2',array(
		'label' => __('Button Url','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting' => 'drop_shipping_pro_product_banner2_btn_url2',
		'type'  => 'text'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner3s_content_box3_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_product_banner3s_content_box3_settings',
	    array(
	    'label' => __('Box 3 Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_product_banner2_section'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner3_box_bgimage3',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_product_banner3_box_bgimage3',
        array(
        'label' => __('Background Image ','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_product_banner2_section',
        'settings' => 'drop_shipping_pro_product_banner3_box_bgimage3'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner3_image3',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_product_banner3_image3',
        array(
        'label' => __('Product Image 3','dropshipping-store-pro'),
        'section' => 'drop_shipping_pro_product_banner2_section',
        'settings' => 'drop_shipping_pro_product_banner3_image3'
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner3_main_title3',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner3_main_title3',array(
		'label' => __('Title 3','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting'	=> 'drop_shipping_pro_product_banner3_main_title3',
		'type'	=> 'text'
	));	

	$wp_customize->add_setting('drop_shipping_pro_product_banner3_small_title3',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner3_small_title3',array(
		'label' => __('Small Title 3','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting'	=> 'drop_shipping_pro_product_banner3_small_title3',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner3_btn_text3',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner3_btn_text3',array(
		'label' => __('Button Text','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting' => 'drop_shipping_pro_product_banner3_btn_text3',
		'type'  => 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner3_btn_url3',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner3_btn_url3',array(
		'label' => __('Button Url','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting' => 'drop_shipping_pro_product_banner3_btn_url3',
		'type'  => 'text'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner2_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_product_banner2_content_settings',
	    array(
	    'label' => __('Font and Color Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_product_banner2_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner2_heading_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_banner2_heading_color', array(
		'label' => 'Heading Color',
		'section' => 'drop_shipping_pro_product_banner2_section',
		'settings' => 'drop_shipping_pro_product_banner2_heading_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_heading_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_product_banner2_heading_font_family', array(
	    'section'  => 'drop_shipping_pro_product_banner2_section',
	    'label'    => __( 'Heading Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_heading_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner2_heading_font_size',array(
		'label' => __('Heading Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting' => 'drop_shipping_pro_product_banner2_heading_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner2_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_banner2_text_color', array(
		'label' => 'Text Color',
		'section' => 'drop_shipping_pro_product_banner2_section',
		'settings' => 'drop_shipping_pro_product_banner2_text_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_text_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_product_banner2_text_font_family', array(
	    'section'  => 'drop_shipping_pro_product_banner2_section',
	    'label'    => __( 'Text Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_text_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner2_text_font_size',array(
		'label' => __('Text Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting' => 'drop_shipping_pro_product_banner2_text_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner2_btn_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_banner2_btn_bg_color', array(
		'label' => 'Button Background Color',
		'section' => 'drop_shipping_pro_product_banner2_section',
		'settings' => 'drop_shipping_pro_product_banner2_btn_bg_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_product_banner2_btn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_product_banner2_btn_color', array(
		'label' => 'Button Color',
		'section' => 'drop_shipping_pro_product_banner2_section',
		'settings' => 'drop_shipping_pro_product_banner2_btn_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_btn_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_product_banner2_btn_font_family', array(
	    'section'  => 'drop_shipping_pro_product_banner2_section',
	    'label'    => __( 'Button Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_product_banner2_btn_font_size',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_product_banner2_btn_font_size',array(
		'label' => __('Button Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_product_banner2_section',
		'setting' => 'drop_shipping_pro_product_banner2_btn_font_size',
		'type'    => 'number'
	));

	/*------------ New Arrival --------------------*/

	$wp_customize->add_section('drop_shipping_pro_new_arrival_section',array(
		'title'	=> __('New Arrival Settings','dropshipping-store-pro'),
		'description'	=> __('Add Your Content.','dropshipping-store-pro'),
		'priority'	=> null,
		'panel' => 'drop_shipping_pro_panel_id',
	));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_enabledisable',array(
	    'default'=> 'Enable',
	    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_new_arrival_enabledisable', array(
	    'type' => 'radio',
	    'label' => 'Do you want this section',
	    'section' => 'drop_shipping_pro_new_arrival_section',
	    'choices' => array(
	        'Enable' => 'Enable',
	        'Disable' => 'Disable'
	    ),
	));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_bg_color', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_bg_color', array(
		'label' => __('Background Color', 'dropshipping-store-pro'),
		'description'   => __('Either add background color or background image, if you add both background color will be top most priority','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_bg_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_bg_image',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize,'drop_shipping_pro_new_arrival_bg_image',array(
		'label' => __('Section Background Image','dropshipping-store-pro'),
		'description' => __('Dimension 1600px * 900px','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_bg_image'
	)));
	        
	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_image_attachment', array(
		'default'         => 'bwt-scroll',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_new_arrival_image_attachment', array(
		'type'      => 'radio',
		'label'     => __('Choose image option', 'dropshipping-store-pro'),
		'section'   => 'drop_shipping_pro_new_arrival_section',
		'choices'   => array(
		'bwt-scroll'      => __( 'Scroll', 'dropshipping-store-pro' ),  
		'bwt-fixed'      => __( 'Fixed', 'dropshipping-store-pro' ),                  
	),));	

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_new_arrival_content_settings',
	    array(
	    'label' => __('Content Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_new_arrival_section'
	)));

    $wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_new_arrival_heading', array(
	    'selector' => '#new-arrival h3',
	    'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_new_arrival_heading',
	));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));		
	$wp_customize->add_control('drop_shipping_pro_new_arrival_heading',array(
		'label'	=> __('Heading','dropshipping-store-pro'),
		'section'=> 'drop_shipping_pro_new_arrival_section',
		'type'	=> 'text'
	));

	$args = array(
            'type'                     => 'product',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => 'term_group',
            'order'                    => 'ASC',
            'hide_empty'               => false,
            'hierarchical'             => 1,
            'number'                   => '',
            'taxonomy'                 => 'product_tag',
            'pad_counts'               => false
        );
        $tags = get_tags( $args );
        $cats = array();
        $i = 0;
        foreach($tags as $tag){
            if($i==0){
                $default = $tag->slug;
                $i++;
            }
        $cats[$tag->slug] = $tag->name;
        }

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_tag',array(
	  'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_new_arrival_tag',array(
	  'type'    => 'select',
	  'choices' => $cats,
	  'label' => __('Select Product Tag','dropshipping-store-pro'),
	  'section' => 'drop_shipping_pro_new_arrival_section',
	));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_textarea_field',
	));
	$wp_customize->add_control('drop_shipping_pro_new_arrival_text',array(
		'label' => __('Our Product Button Text ','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_new_arrival_section',
		'setting'	=> 'drop_shipping_pro_new_arrival_text',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_btnurl',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('drop_shipping_pro_new_arrival_btnurl',array(
		'label' => __('Our Product Button URL ','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_new_arrival_section',
		'setting'	=> 'drop_shipping_pro_new_arrival_btnurl',
		'type'	=> 'text'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_color_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_new_arrival_color_settings',
	    array(
	    'label' => __('Section Color And Font Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_new_arrival_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_section_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_section_title_color', array(
		'label' => 'Section Title Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_section_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_section_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_new_arrival_section_title_fonts', array(
	    'section'  => 'drop_shipping_pro_new_arrival_section',
	    'label'    => __( 'Section Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_section_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_new_arrival_section_title_font_size',array(
		'label' => __('Section Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_new_arrival_section',
		'setting' => 'drop_shipping_pro_new_arrival_section_title_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_font_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_new_arrival_font_settings',
	    array(
	    'label' => __('Product Color And Font Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_new_arrival_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_title_color', array(
		'label' => 'Product Title Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_new_arrival_title_fonts', array(
	    'section'  => 'drop_shipping_pro_new_arrival_section',
	    'label'    => __( 'Product Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_new_arrival_title_font_size',array(
		'label' => __('Product Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_new_arrival_section',
		'setting' => 'drop_shipping_pro_new_arrival_title_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_star_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_star_color', array(
		'label' => 'Product Star Rating Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_star_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_price_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_price_color', array(
		'label' => 'Product Price Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_price_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_price_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_new_arrival_price_fonts', array(
	    'section'  => 'drop_shipping_pro_new_arrival_section',
	    'label'    => __( 'Product Price Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_price_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_new_arrival_price_font_size',array(
		'label' => __('Product Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_new_arrival_section',
		'setting' => 'drop_shipping_pro_new_arrival_price_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_cart_btn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_cart_btn_color', array(
		'label' => 'Product Cart Button Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_cart_btn_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_cart_btnbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_cart_btnbg_color', array(
		'label' => 'Product Cart Button Background Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_cart_btnbg_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_cart_btn_hover_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_cart_btn_hover_color', array(
		'label' => 'Product Cart Button Background Hover Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_cart_btn_hover_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_cart_btn_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_new_arrival_cart_btn_fonts', array(
	    'section'  => 'drop_shipping_pro_new_arrival_section',
	    'label'    => __( 'Product Cart Button Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_cart_btn_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_new_arrival_cart_btn_font_size',array(
		'label' => __('Product Cart Button Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_new_arrival_section',
		'setting' => 'drop_shipping_pro_new_arrival_cart_btn_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_sale_badge_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_sale_badge_color', array(
		'label' => 'Product Sale Badge Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_sale_badge_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_sale_badgebg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_sale_badgebg_color', array(
		'label' => 'Product Sale Badge Background Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_sale_badgebg_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_sale_badge_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_new_arrival_sale_badge_fonts', array(
	    'section'  => 'drop_shipping_pro_new_arrival_section',
	    'label'    => __( 'Product Sale Badge Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_sale_badge_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_new_arrival_sale_badge_font_size',array(
		'label' => __('Product Sale Badge Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_new_arrival_section',
		'setting' => 'drop_shipping_pro_new_arrival_sale_badge_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_box_icon_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_box_icon_color', array(
		'label' => 'Product Box Icon Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_box_icon_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_box_iconbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_box_iconbg_color', array(
		'label' => 'Product Box Icon Background Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_box_iconbg_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_box_icon_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_new_arrival_box_icon_font_size',array(
		'label' => __('Product Box Icon Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_new_arrival_section',
		'setting' => 'drop_shipping_pro_new_arrival_box_icon_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_btn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_btn_color', array(
		'label' => 'Section Button Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_btn_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_btnbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_btnbg_color', array(
		'label' => 'Section Button Background Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_btnbg_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_btn_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_new_arrival_btn_fonts', array(
	    'section'  => 'drop_shipping_pro_new_arrival_section',
	    'label'    => __( 'Section Button Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_new_arrival_btn_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_new_arrival_btn_font_size',array(
		'label' => __('Section Button Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_new_arrival_section',
		'setting' => 'drop_shipping_pro_new_arrival_btn_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_new_arrival_hover_bg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_new_arrival_hover_bg_color', array(
		'label' => 'Product Background Hover Color',
		'section' => 'drop_shipping_pro_new_arrival_section',
		'settings' => 'drop_shipping_pro_new_arrival_hover_bg_color',
	)));

	/*--------------- Featured Product -------------------- */

	$wp_customize->add_section('drop_shipping_pro_featured_product',array(
		'title' => __('Featured Product Section','dropshipping-store-pro'),
		'description' => __('Add Content Here','dropshipping-store-pro'),
		'panel' => 'drop_shipping_pro_panel_id',
	));

	$wp_customize->add_setting('drop_shipping_pro_featured_product_enable',
	  array(
	  'default' => 'Enable',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_featured_product_enable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section(It will disable featured product section and blog section both)', 'dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_featured_product',
		'choices' => array(
		'Enable' => __('Enable', 'dropshipping-store-pro'),
		'Disable' => __('Disable', 'dropshipping-store-pro')
	),));

	$wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_featured_product_enable', array(
		'selector' => '#featured-product .container',
		'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_featured_product_enable',
	) );

	$wp_customize->add_setting( 'drop_shipping_pro_featured_product_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	));
	$wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_featured_product_settings',
	array(
		'label' => __('Section Background Settings','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_featured_product'
	)));
	$wp_customize->add_setting( 'drop_shipping_pro_featured_product_bgcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_featured_product_bgcolor', array(
		'label' => __('Background Color', 'dropshipping-store-pro'),
		'description'   => __('Either add background color or background image, if you add both background color will be top most priority','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_featured_product',
		'settings' => 'drop_shipping_pro_featured_product_bgcolor',
	)));

	$wp_customize->add_setting('drop_shipping_pro_featured_product_bgimage',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize,'drop_shipping_pro_featured_product_bgimage',array(
		'label' => __('Section Background Image','dropshipping-store-pro'),
		'description' => __('Dimension 1600px * 900px','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_featured_product',
		'settings' => 'drop_shipping_pro_featured_product_bgimage'
	)));


	$wp_customize->add_setting( 'drop_shipping_pro_featured_product_content_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	));
	$wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_featured_product_content_settings',
	array(
		'label' => __('Section Content Settings','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_featured_product'
	)));


	$wp_customize->add_setting('drop_shipping_pro_featured_product_main_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_featured_product_main_heading',array(
		'label' => __('Section Main Heading','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_featured_product',
		'setting' => 'drop_shipping_pro_featured_product_main_heading',
		'type'    => 'text'
	));

	$args = array(
	        'type'                     => 'product',
	        'child_of'                 => 0,
	        'parent'                   => '',
	        'orderby'                  => 'term_group',
	        'order'                    => 'ASC',
	        'hide_empty'               => false,
	        'hierarchical'             => 1,
	        'number'                   => '',
	        'taxonomy'                 => 'product_tag',
	        'pad_counts'               => false
	    );
	    $tags = get_tags( $args );
	    $cats = array();
	    $i = 0;
	    foreach($tags as $tag){
	        if($i==0){
	            $default = $tag->slug;
	            $i++;
	        }
	    $cats[$tag->slug] = $tag->name;
	    }

	$wp_customize->add_setting('drop_shipping_pro_featured_product_tag',array(
	  'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_featured_product_tag',array(
	  'type'    => 'select',
	  'choices' => $cats,
	  'label' => __('Select Product Tag','dropshipping-store-pro'),
	  'section' => 'drop_shipping_pro_featured_product',
	));

	$wp_customize->add_setting( 'drop_shipping_pro_featured_product_color_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_featured_product_color_settings',
	    array(
	    'label' => __('Section Color And Font Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_featured_product'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_featured_product_section_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_featured_product_section_title_color', array(
		'label' => 'Section Title Color',
		'section' => 'drop_shipping_pro_featured_product',
		'settings' => 'drop_shipping_pro_featured_product_section_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_featured_product_section_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_featured_product_section_title_fonts', array(
	    'section'  => 'drop_shipping_pro_featured_product',
	    'label'    => __( 'Section Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_featured_product_section_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_featured_product_section_title_font_size',array(
		'label' => __('Section Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_featured_product',
		'setting' => 'drop_shipping_pro_featured_product_section_title_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_featured_product_font_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_featured_product_font_settings',
	    array(
	    'label' => __('Product Color And Font Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_featured_product'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_featured_product_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_featured_product_title_color', array(
		'label' => 'Product Title Color',
		'section' => 'drop_shipping_pro_featured_product',
		'settings' => 'drop_shipping_pro_featured_product_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_featured_product_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_featured_product_title_fonts', array(
	    'section'  => 'drop_shipping_pro_featured_product',
	    'label'    => __( 'Product Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_featured_product_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_featured_product_title_font_size',array(
		'label' => __('Product Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_featured_product',
		'setting' => 'drop_shipping_pro_featured_product_title_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_featured_product_star_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_featured_product_star_color', array(
		'label' => 'Product Star Rating Color',
		'section' => 'drop_shipping_pro_featured_product',
		'settings' => 'drop_shipping_pro_featured_product_star_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_featured_product_price_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_featured_product_price_color', array(
		'label' => 'Product Price Color',
		'section' => 'drop_shipping_pro_featured_product',
		'settings' => 'drop_shipping_pro_featured_product_price_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_featured_product_price_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_featured_product_price_fonts', array(
	    'section'  => 'drop_shipping_pro_featured_product',
	    'label'    => __( 'Product Price Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_featured_product_price_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_featured_product_price_font_size',array(
		'label' => __('Product Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_featured_product',
		'setting' => 'drop_shipping_pro_featured_product_price_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_featured_product_cart_btn_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_featured_product_cart_btn_color', array(
		'label' => 'Product Cart Button Color',
		'section' => 'drop_shipping_pro_featured_product',
		'settings' => 'drop_shipping_pro_featured_product_cart_btn_color',
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_featured_product_cart_btnbg_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_featured_product_cart_btnbg_color', array(
		'label' => 'Product Cart Button Background Color',
		'section' => 'drop_shipping_pro_featured_product',
		'settings' => 'drop_shipping_pro_featured_product_cart_btnbg_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_featured_product_cart_btn_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_featured_product_cart_btn_fonts', array(
	    'section'  => 'drop_shipping_pro_featured_product',
	    'label'    => __( 'Product Cart Button Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_featured_product_cart_btn_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_featured_product_cart_btn_font_size',array(
		'label' => __('Product Cart Button Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_featured_product',
		'setting' => 'drop_shipping_pro_featured_product_cart_btn_font_size',
		'type'    => 'number'
	));


	/*----------------- Our Blog------------------*/
	$wp_customize->add_section('drop_shipping_pro_our_blog_section',array(
		'title'	=> __('Our Blog Settings','dropshipping-store-pro'),
		'description'	=> __('Add Your Content.','dropshipping-store-pro'),
		'priority'	=> null,
		'panel' => 'drop_shipping_pro_panel_id',
	));

  	$wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_our_blog_bgcolor', array(
	    'selector' => '#our-blog h3',
	    'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_our_blog_bgcolor',
	));

	$wp_customize->add_setting( 'drop_shipping_pro_our_blog_bgcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_blog_bgcolor', array(
		'label' => __('Background Color', 'dropshipping-store-pro'),
		'description'   => __('Either add background color or background image, if you add both background color will be top most priority','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_blog_section',
		'settings' => 'drop_shipping_pro_our_blog_bgcolor',
	)));

	$wp_customize->add_setting('drop_shipping_pro_our_blog_bgimage',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize,'drop_shipping_pro_our_blog_bgimage',array(
		'label' => __('Section Background Image','dropshipping-store-pro'),
		'description' => __('Dimension 1600px * 900px','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_blog_section',
		'settings' => 'drop_shipping_pro_our_blog_bgimage'
	)));
	        
	$wp_customize->add_setting( 'drop_shipping_pro_our_blog_bgimage_setting', array(
		'default'         => 'bwt-scroll',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_our_blog_bgimage_setting', array(
		'type'      => 'radio',
		'label'     => __('Choose image option', 'dropshipping-store-pro'),
		'section'   => 'drop_shipping_pro_our_blog_section',
		'choices'   => array(
		'bwt-scroll'      => __( 'Scroll', 'dropshipping-store-pro' ),  
		'bwt-fixed'      => __( 'Fixed', 'dropshipping-store-pro' ),                  
	),));	

	$wp_customize->add_setting( 'drop_shipping_pro_our_blog_content_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_our_blog_content_settings',
	    array(
	    'label' => __('Content Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_our_blog_section'
	)));

	$wp_customize->add_setting('drop_shipping_pro_our_blog_main_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_our_blog_main_title',array(
		'label'	=> __('Section Title','dropshipping-store-pro'),
		'section'	=> 'drop_shipping_pro_our_blog_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_our_blog_section_color_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_our_blog_section_color_settings',
	    array(
	    'label' => __('Section Color And Font Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_our_blog_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_our_blog_section_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_blog_section_title_color', array(
		'label' => 'Section Title Color',
		'section' => 'drop_shipping_pro_our_blog_section',
		'settings' => 'drop_shipping_pro_our_blog_section_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_our_blog_section_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_our_blog_section_title_fonts', array(
	    'section'  => 'drop_shipping_pro_our_blog_section',
	    'label'    => __( 'Section Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_our_blog_section_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_our_blog_section_title_font_size',array(
		'label' => __('Section Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_blog_section',
		'setting' => 'drop_shipping_pro_our_blog_section_title_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_our_blog_section_font_settings',
	    array(
	    'default' => '',
	    'transport' => 'postMessage',
	    'sanitize_callback' => 'drop_shipping_pro_text_sanitization'
	 ));
	 $wp_customize->add_control( new drop_shipping_pro_Seperator_custom_Control( $wp_customize, 'drop_shipping_pro_our_blog_section_font_settings',
	    array(
	    'label' => __('Blog Color And Font Settings ','dropshipping-store-pro'),
	    'section' => 'drop_shipping_pro_our_blog_section'
	)));

	$wp_customize->add_setting( 'drop_shipping_pro_our_blog_title_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_blog_title_color', array(
		'label' => 'Blog Title Color',
		'section' => 'drop_shipping_pro_our_blog_section',
		'settings' => 'drop_shipping_pro_our_blog_title_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_our_blog_title_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_our_blog_title_fonts', array(
	    'section'  => 'drop_shipping_pro_our_blog_section',
	    'label'    => __( 'Blog Title Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_our_blog_title_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_our_blog_title_font_size',array(
		'label' => __('Blog Title Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_blog_section',
		'setting' => 'drop_shipping_pro_our_blog_title_font_size',
		'type'    => 'number'
	));

	$wp_customize->add_setting( 'drop_shipping_pro_our_blog_text_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_our_blog_text_color', array(
		'label' => 'Blog Description Color',
		'section' => 'drop_shipping_pro_our_blog_section',
		'settings' => 'drop_shipping_pro_our_blog_text_color',
	)));

	$wp_customize->add_setting('drop_shipping_pro_our_blog_text_fonts',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control(
    'drop_shipping_pro_our_blog_text_fonts', array(
	    'section'  => 'drop_shipping_pro_our_blog_section',
	    'label'    => __( 'Blog Description Font Family','dropshipping-store-pro'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('drop_shipping_pro_our_blog_text_font_size',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('drop_shipping_pro_our_blog_text_font_size',array(
		'label' => __('Blog Description Font size','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_our_blog_section',
		'setting' => 'drop_shipping_pro_our_blog_text_font_size',
		'type'    => 'number'
	));

	/*--------- Popular Store ----------------*/

	$wp_customize->add_section('drop_shipping_pro_popular_brands_section',array(
		'title'	=> __('Popular Brand Settings','dropshipping-store-pro'),
		'description'	=> __('Add Popular Brand Content.','dropshipping-store-pro'),
		'priority'	=> null,
		'panel' => 'drop_shipping_pro_panel_id',
	));

	$wp_customize->add_setting('drop_shipping_pro_radio_productbrand_enable',array(
	    'default'=> 'Enable',
	    'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_radio_productbrand_enable', array(
	    'type' => 'radio',
	    'label' => 'Do you want this section',
	    'section' => 'drop_shipping_pro_popular_brands_section',
	    'choices' => array(
	        'Enable' => 'Enable',
	        'Disable' => 'Disable'
	    ),
	));

  $wp_customize->selective_refresh->add_partial( 'drop_shipping_pro_radio_productbrand_enable', array(
	    'selector' => '#popular-brand .popular-stores-img img',
	    'render_callback' => 'drop_shipping_pro_customize_partial_drop_shipping_pro_radio_productbrand_enable',
	));

	$wp_customize->add_setting( 'drop_shipping_pro_popular_brands_bgcolor', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_shipping_pro_popular_brands_bgcolor', array(
		'label' => __('Background Color', 'dropshipping-store-pro'),
		'description'   => __('Either add background color or background image, if you add both background color will be top most priority','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_popular_brands_section',
		'settings' => 'drop_shipping_pro_popular_brands_bgcolor',
	)));

	$wp_customize->add_setting('drop_shipping_pro_popular_brands_bgimage',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize,'drop_shipping_pro_popular_brands_bgimage',array(
		'label' => __('Section Background Image','dropshipping-store-pro'),
		'description' => __('Dimension 1600px * 900px','dropshipping-store-pro'),
		'section' => 'drop_shipping_pro_popular_brands_section',
		'settings' => 'drop_shipping_pro_popular_brands_bgimage'
	)));
	        
	$wp_customize->add_setting( 'drop_shipping_pro_popular_brands_bgimage_setting', array(
		'default'         => 'bwt-scroll',
		'sanitize_callback' => 'drop_shipping_pro_sanitize_choices'
	));
	$wp_customize->add_control('drop_shipping_pro_popular_brands_bgimage_setting', array(
		'type'      => 'radio',
		'label'     => __('Choose image option', 'dropshipping-store-pro'),
		'section'   => 'drop_shipping_pro_popular_brands_section',
		'choices'   => array(
		'bwt-scroll'      => __( 'Scroll', 'dropshipping-store-pro' ),  
		'bwt-fixed'      => __( 'Fixed', 'dropshipping-store-pro' ),                  
	),));	
	$wp_customize->add_setting('drop_shipping_pro_popular_brands_box_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('drop_shipping_pro_popular_brands_box_number',array(
		'label'	=> __('Number of stores to show','dropshipping-store-pro'),
		'section'	=> 'drop_shipping_pro_popular_brands_section',
		'type'		=> 'number'
	));

	$popularstore =  get_theme_mod('drop_shipping_pro_popular_brands_box_number');
	for($i=1; $i<=$popularstore; $i++) {
		
		$wp_customize->add_setting('drop_shipping_pro_popular_brands_image'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'drop_shipping_pro_popular_brands_image'.$i,
	        array(
            'label' => __('Brand Image ','dropshipping-store-pro').$i.__(' (1600px * 562px)','dropshipping-store-pro'),
            'section' => 'drop_shipping_pro_popular_brands_section',
            'settings' => 'drop_shipping_pro_popular_brands_image'.$i
		)));
	}	


?>