<?php
/**
 * Template part for displaying inline style
 *
 * @package dropshipping-store-pro
 */
?>
<?php
	// Boxed or full width layout
	$drop_shipping_pro_radio_boxed_full_layout = get_theme_mod('drop_shipping_pro_radio_boxed_full_layout');
	$drop_shipping_pro_radio_boxed_full_layout_value = get_theme_mod('drop_shipping_pro_radio_boxed_full_layout_value');

	//General Button Color Pallete option
	$drop_shipping_pro_body_font_family = get_theme_mod('drop_shipping_pro_body_font_family');
	$drop_shipping_pro_body_font_size = get_theme_mod('drop_shipping_pro_body_font_size');
	$drop_shipping_pro_body_color = get_theme_mod('drop_shipping_pro_body_color');
	$drop_shipping_pro_h1_font_family = get_theme_mod('drop_shipping_pro_h1_font_family');
	$drop_shipping_pro_h1_font_size = get_theme_mod('drop_shipping_pro_h1_font_size');
	$drop_shipping_pro_h1_color = get_theme_mod('drop_shipping_pro_h1_color');
	$drop_shipping_pro_h2_font_family = get_theme_mod('drop_shipping_pro_h2_font_family');
	$drop_shipping_pro_h2_font_size = get_theme_mod('drop_shipping_pro_h2_font_size');
	$drop_shipping_pro_h2_color = get_theme_mod('drop_shipping_pro_h2_color');
	$drop_shipping_pro_h3_font_family = get_theme_mod('drop_shipping_pro_h3_font_family');
	$drop_shipping_pro_h3_font_size = get_theme_mod('drop_shipping_pro_h3_font_size');
	$drop_shipping_pro_h3_color = get_theme_mod('drop_shipping_pro_h3_color');
	$drop_shipping_pro_h4_font_family = get_theme_mod('drop_shipping_pro_h4_font_family');
	$drop_shipping_pro_h4_font_size = get_theme_mod('drop_shipping_pro_h4_font_size');
	$drop_shipping_pro_h4_color = get_theme_mod('drop_shipping_pro_h4_color');
	$drop_shipping_pro_h5_font_family = get_theme_mod('drop_shipping_pro_h5_font_family');
	$drop_shipping_pro_h5_font_size = get_theme_mod('drop_shipping_pro_h5_font_size');
	$drop_shipping_pro_h5_color = get_theme_mod('drop_shipping_pro_h5_color');
	$drop_shipping_pro_h6_font_family = get_theme_mod('drop_shipping_pro_h6_font_family');
	$drop_shipping_pro_h6_font_size = get_theme_mod('drop_shipping_pro_h6_font_size');
	$drop_shipping_pro_h6_color = get_theme_mod('drop_shipping_pro_h6_color');
	$drop_shipping_pro_paragarpah_font_family = get_theme_mod('drop_shipping_pro_paragarpah_font_family');
	$drop_shipping_pro_para_font_size = get_theme_mod('drop_shipping_pro_para_font_size');
	$drop_shipping_pro_para_color = get_theme_mod('drop_shipping_pro_para_color');
	$drop_shipping_pro_hi_first_color = get_theme_mod('drop_shipping_pro_hi_first_color');
	$drop_shipping_pro_hi_second_color = get_theme_mod('drop_shipping_pro_hi_second_color');


	//responsive media
		$drop_shipping_pro_res_menu_width = get_theme_mod('drop_shipping_pro_res_menu_width');
	


	//-------- inline css start-----------

	$custom_css ='html body{ 
	';
		if($drop_shipping_pro_body_font_family != false){
	    	$custom_css .='font-family: '.esc_html($drop_shipping_pro_body_font_family).'!important;';
		}
		if($drop_shipping_pro_body_color != false){
	    	$custom_css .='color: '.esc_html($drop_shipping_pro_body_color).'!important;';
		}
		if($drop_shipping_pro_body_font_size != false){
	    	$custom_css .='font-size: '.esc_html($drop_shipping_pro_body_font_size).'px !important;';
		}
	$custom_css .='}';


	if($drop_shipping_pro_h1_font_family != false || $drop_shipping_pro_h1_color != false || $drop_shipping_pro_h1_font_size != false){
		$custom_css .='h1, #slider .slidemidheading,#posttype_single .posttype-box h1, #single_post .content_boxes h1, .title-box h1,.archive .container h1,.container .entry-title{';
			if($drop_shipping_pro_h1_font_family != false){
		    	$custom_css .='font-family: '.esc_html($drop_shipping_pro_h1_font_family).'!important;';
			}
			if($drop_shipping_pro_h1_color != false){
		    	$custom_css .='color: '.esc_html($drop_shipping_pro_h1_color).'!important;';
			}
			if($drop_shipping_pro_h1_font_size != false){
		    	$custom_css .='font-size: '.esc_html($drop_shipping_pro_h1_font_size).'px !important;';
			}
		$custom_css .='}';
	}
	$define_layout = get_theme_mod( 'drop_shipping_pro_radio_boxed_full_layout' );
	if('boxed' == $define_layout ){
		$custom_css .='body{';
				$custom_css .='max-width: '.esc_html($drop_shipping_pro_radio_boxed_full_layout_value).'px;';
				$custom_css .='margin: 0 auto !important ;';
				$custom_css .='width: 100% ;';
		$custom_css .='}';
	}
	
	if($drop_shipping_pro_h2_font_family != false || $drop_shipping_pro_h2_color != false || $drop_shipping_pro_h2_font_size != false){
		$custom_css .='h2, section h2{';
			if($drop_shipping_pro_h2_font_family != false){
		    	$custom_css .='font-family: '.esc_html($drop_shipping_pro_h2_font_family).';';
			}
			if($drop_shipping_pro_h2_color != false){
		    	$custom_css .='color: '.esc_html($drop_shipping_pro_h2_color).';';
			}
			if($drop_shipping_pro_h2_font_size != false){
		    	$custom_css .='font-size: '.esc_html($drop_shipping_pro_h2_font_size).'px !important;';
			}
		$custom_css .='}';
	}
	if($drop_shipping_pro_h3_font_family != false || $drop_shipping_pro_h3_color != false || $drop_shipping_pro_h3_font_size != false){
			$custom_css .='h3{';
				if($drop_shipping_pro_h3_font_family != false){
			    	$custom_css .='font-family: '.esc_html($drop_shipping_pro_h3_font_family).'!important ;';
				}
				if($drop_shipping_pro_h3_color != false){
			    	$custom_css .='color: '.esc_html($drop_shipping_pro_h3_color).'!important;';
				}
				if($drop_shipping_pro_h3_font_size != false){
			    	$custom_css .='font-size: '.esc_html($drop_shipping_pro_h3_font_size).'px !important;';
				}
			$custom_css .='}';
	}
	if($drop_shipping_pro_h4_font_family != false || $drop_shipping_pro_h4_color != false || $drop_shipping_pro_h4_font_size != false){
			$custom_css .='h4{';
				if($drop_shipping_pro_h4_font_family != false){
			    	$custom_css .='font-family: '.esc_html($drop_shipping_pro_h4_font_family).'!important;';
				}
				if($drop_shipping_pro_h4_color != false){
			    	$custom_css .='color: '.esc_html($drop_shipping_pro_h4_color).'!important;';
				}
				if($drop_shipping_pro_h4_font_size != false){
			    	$custom_css .='font-size: '.esc_html($drop_shipping_pro_h4_font_size).'px !important;';
				}
			$custom_css .='}';
	}
	if($drop_shipping_pro_h5_font_family != false || $drop_shipping_pro_h5_color != false || $drop_shipping_pro_h5_font_size != false){
			$custom_css .='h5{';
				if($drop_shipping_pro_h5_font_family != false){
			    	$custom_css .='font-family: '.esc_html($drop_shipping_pro_h5_font_family).'!important;';
				}
				if($drop_shipping_pro_h5_color != false){
			    	$custom_css .='color: '.esc_html($drop_shipping_pro_h5_color).'!important;';
				}
				if($drop_shipping_pro_h5_font_size != false){
			    	$custom_css .='font-size: '.esc_html($drop_shipping_pro_h5_font_size).'px !important;';
				}
			$custom_css .='}';
	}
	if($drop_shipping_pro_h6_font_family != false || $drop_shipping_pro_h6_color != false || $drop_shipping_pro_h6_font_size != false){
			$custom_css .='h6{';
				if($drop_shipping_pro_h6_font_family != false){
			    	$custom_css .='font-family: '.esc_html($drop_shipping_pro_h6_font_family).';';
				}
				if($drop_shipping_pro_h6_color != false){
			    	$custom_css .='color: '.esc_html($drop_shipping_pro_h6_color).';';
				}
				if($drop_shipping_pro_h6_font_size != false){
			    	$custom_css .='font-size: '.esc_html($drop_shipping_pro_h6_font_size).'px;';
				}
			$custom_css .='}';
	}
	if($drop_shipping_pro_paragarpah_font_family != false || $drop_shipping_pro_para_color != false || $drop_shipping_pro_para_font_size != false){
			$custom_css .='p{';
				if($drop_shipping_pro_paragarpah_font_family != false){
			    	$custom_css .='font-family: '.esc_html($drop_shipping_pro_paragarpah_font_family).' !important;';
				}
				if($drop_shipping_pro_para_color != false){
			    	$custom_css .='color: '.esc_html($drop_shipping_pro_para_color).' !important;';
				}
				if($drop_shipping_pro_para_font_size != false){
			    	$custom_css .='font-size: '.esc_html($drop_shipping_pro_para_font_size).'px !important;';
				}
			$custom_css .='}';
	}

	/*------------------------------ Global Color 1-------------*/
	if($drop_shipping_pro_hi_first_color != false){
			$custom_css .='.single-product .cart .button,.woocommerce .woocommerce-pagination ul.page-numbers li a, .woocommerce-page .woocommerce-pagination ul.page-numbers li a,#sidebar .widget li:before,.coupon button, .shop_table button, .woocommerce button.button, .place-order button, .woocommerce-Button.button,.shop .add_to_cart_button, .woocommerce ul.products li.product a,#sidebar .widget_search [type=submit],.bwt-copyright,#deals #timer,.popular-stores-box p,.product-cat-title h4:before,#topbar,#our-products .inner_product:hover .our-product-cart a, #new-arrival .inner_product:hover .our-product-cart a,.popular-stores-box a, #our-products .section-button a, #new-arrival .section-button a{
				background-color: '.esc_html($drop_shipping_pro_hi_first_color).';
			}';
	}
	if($drop_shipping_pro_hi_first_color != false){
			$custom_css .='#sidebar h3:after,#bwt-footer_box [type=submit],.bwt-wishlist-cart-view i{
				background: '.esc_html($drop_shipping_pro_hi_first_color).';
			}';
	}
	if($drop_shipping_pro_hi_first_color != false){
		$custom_css .='.single-product .woocommerce-tabs ul.tabs li.active a,.woocommerce .woocommerce-pagination ul.page-numbers li a, .woocommerce-page .woocommerce-pagination ul.page-numbers li a,#sidebar .widget_search input[type=search],#bwt-footer_box [type=submit],.main-navigation ul ul,.topbar_translate .switcher .option,#deals .owl-nav .owl-next i{
				border-color: '.esc_html($drop_shipping_pro_hi_first_color).';
		}';
	}
	if($drop_shipping_pro_hi_first_color != false){
		$custom_css .='#contact .feature-block-inner:hover .feature-block-text a,#contact .feature-block-inner i,.product_meta span a,.about_me i,#our-blog .owl-nav button i,#deals .owl-nav .owl-next i,.slick-slider .fa-chevron-right.slick-arrow,.product_head a,.topbar-support-box i,#topbar .topbar_translate .option a:hover,.current-menu-item.current_page_item a, .current-menu-item.current_page_item:before, .main-navigation ul .current_page_item a,.feature-block-inner i{
				color: '.esc_html($drop_shipping_pro_hi_first_color).' !important;
		}';
	}
	/*------------------------------ Global Color 2-------------*/

	if($drop_shipping_pro_hi_second_color != false){
			$custom_css .='kbd,.woocommerce #review_form #respond .form-submit input,#return-to-top,#product-banner2 .popular-stores-box:hover a,#product-banner1 .popular-stores-box:hover a,.our-product-cart a,{
				background-color: '.esc_html($drop_shipping_pro_hi_second_color).' !important;
			}';
	}
	if($drop_shipping_pro_hi_second_color != false){
		$custom_css .='#contact .feature-block-text a,.featured-box-date .entry-date,.faq-main-box .accordion-button,#typography-sec .display-6, #typography-sec h1, #typography-sec h2, #typography-sec h3, #typography-sec h4, #typography-sec h5, #typography-sec h6,.related.products h2,.woocommerce-Tabs-panel pm,.single-product .woocommerce-tabs ul.tabs li.active a, .single-product .woocommerce-tabs ul.tabs li a:hover, .single-product .woocommerce-tabs ul.tabs li a,.product_meta .posted_in, .product_meta .tagged_as,.woocommerce div.product .product_title,.woocommerce-product-details__short-description p,.single-product .cart .button,.coupon button, .shop_table button, .woocommerce button.button, .place-order button, .woocommerce-Button.button,#sidebar .widget li a, #sidebar .widget li,#sidebar h3,.entry-title-watermark .entry-title,.bradcrumbs a, .bradcrumbs span, .bradcrumbs,.banner-image .entry-title,.woocommerce ul.products li.product h2, .woocommerce h2,.shop .add_to_cart_button, .woocommerce ul.products li.product a,.about_me i,.widget_nav_menu a,.copyright-text p, .copyright-text p a,#our-blog h4 a,#our-blog p,.about_me span,#our-blog .owl-nav .disabled i,#featured-blog h3,#featured-product h5 a,.product_head a,#deals h5 a,#deals .owl-item p,#product-category h5 a,.popular-stores-box h4,.popular-stores-box p,.slick-slider .fa-chevron-left.slick-arrow,#main-category .category-content a,.product-cat-title h4,#slider .slider-box, .feature-block-title,.section-title h3,.bwt-wishlist-cart-view i,#slider .slider-icon,#slider .slidesmalltext,#slider .slide-btn.menu-item-has-children li:hover a:before,.cart-btn-box>div,.cart-customlocation,#slider .slide-small-heading,#reply-title, .comment-respond label,.icon-fill:hover i.main-navigation ul li a,.posttitle a,.section-title h4,#contact .feature-block-title,.main-navigation ul li a,.menu-item-has-children:after,.topbar-support-title,.wishlist_view i, .user-icon i,#topbar .topbar_translate .option,.cat_togglee,#deals .owl-nav .owl-prev i,#product-banner2 .popular-stores-box h4,#product-banner2 .popular-stores-box p{
				color: '.esc_html($drop_shipping_pro_hi_second_color).';
		}';
	}
	if($drop_shipping_pro_hi_second_color != false){
		$custom_css .='#deals .owl-nav .owl-prev i,#slider .slide-btn,#slider .slider-icon,.main-navigation ul ul li,#topbar .topbar_translate .option a{
				border-color: '.esc_html($drop_shipping_pro_hi_second_color).';
		}';
	}
	if($drop_shipping_pro_hi_second_color != false){
		$custom_css .='.blog-meta ul .meta-comment-box:before{
				background: '.esc_html($drop_shipping_pro_hi_second_color).';
		}';
	}
	if($drop_shipping_pro_hi_second_color != false){
		$custom_css .='.icon-fill::before{
				box-shadow: inset 0 0 0 60px'.esc_html($drop_shipping_pro_hi_second_color).';
		}';
	}


	/*------------------- Top Bar -------------------*/

	$drop_shipping_pro_topbar_bg_color = get_theme_mod('drop_shipping_pro_topbar_bg_color');

	if($drop_shipping_pro_topbar_bg_color != false){
		$custom_css .='#topbar{';
				$custom_css .='background-color: '.esc_html($drop_shipping_pro_topbar_bg_color).';
		}';
	}

	$drop_shipping_pro_topbar_content_color = get_theme_mod('drop_shipping_pro_topbar_content_color');
	$drop_shipping_pro_topbar_content_font_family = get_theme_mod('drop_shipping_pro_topbar_content_font_family');
	$drop_shipping_pro_topbar_content_font_size = get_theme_mod('drop_shipping_pro_topbar_content_font_size');
	if($drop_shipping_pro_topbar_content_font_family != false || $drop_shipping_pro_topbar_content_font_size != false || $drop_shipping_pro_topbar_content_color != false){
		$custom_css .='.topbar_translate .switcher a,#alg_currency_select, #alg_currency_selector select,.topbar-regiter a, .order-track, .my-account a span, .topbar-location, .topbar-regiter, .topbar-wishlist a,#topbar .topbar-note p,.switcher .selected a,#topbar .topbar-location a{';
			if($drop_shipping_pro_topbar_content_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_topbar_content_font_family).'!important;';
			}
			if($drop_shipping_pro_topbar_content_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_topbar_content_font_size).'px !important;';
			}
			if($drop_shipping_pro_topbar_content_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_topbar_content_color).'!important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_translator_list_color = get_theme_mod('drop_shipping_pro_topbar_translator_list_color');
	$drop_shipping_pro_topbar_translatore_list_font_family = get_theme_mod('drop_shipping_pro_topbar_translatore_list_font_family');
	$drop_shipping_pro_topbar_translator_list_font_size = get_theme_mod('drop_shipping_pro_topbar_translator_list_font_size');
	if($drop_shipping_pro_topbar_translatore_list_font_family != false || $drop_shipping_pro_topbar_translator_list_font_size != false || $drop_shipping_pro_topbar_translator_list_color != false){
		$custom_css .='#topbar .topbar_translate .option a{';
			if($drop_shipping_pro_topbar_translatore_list_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_topbar_translatore_list_font_family).'!important;';
			}
			if($drop_shipping_pro_topbar_translator_list_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_topbar_translator_list_font_size).'px !important;';
			}
			if($drop_shipping_pro_topbar_translator_list_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_topbar_translator_list_color).'!important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_translator_list_border_color = get_theme_mod('drop_shipping_pro_topbar_translator_list_border_color');
	if($drop_shipping_pro_topbar_translator_list_border_color != false){
		$custom_css .='#topbar .topbar_translate .switcher .option{';
				$custom_css .='border-color: '.esc_html($drop_shipping_pro_topbar_translator_list_border_color).' !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_translator_list_hover_color = get_theme_mod('drop_shipping_pro_topbar_translator_list_hover_color');
	if($drop_shipping_pro_topbar_translator_list_hover_color != false){
		$custom_css .='#topbar .topbar_translate .option a:hover{';
				$custom_css .='	color: '.esc_html($drop_shipping_pro_topbar_translator_list_hover_color).' !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_category_color = get_theme_mod('drop_shipping_pro_topbar_category_color');
	$drop_shipping_pro_topbar_category_font_family = get_theme_mod('drop_shipping_pro_topbar_category_font_family');
	$drop_shipping_pro_topbar_category_font_size = get_theme_mod('drop_shipping_pro_topbar_category_font_size');

	if($drop_shipping_pro_topbar_category_color != false || $drop_shipping_pro_topbar_category_font_family != false || $drop_shipping_pro_topbar_category_font_size != false){
		$custom_css .='.cat_togglee{';
			if($drop_shipping_pro_topbar_category_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_topbar_category_color).' !important;';
			if($drop_shipping_pro_topbar_category_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_topbar_category_font_family).' !important;';
			if($drop_shipping_pro_topbar_category_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_topbar_category_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_search_input_color = get_theme_mod('drop_shipping_pro_topbar_search_input_color');
	$drop_shipping_pro_topbar_search_input_font_family = get_theme_mod('drop_shipping_pro_topbar_search_input_font_family');
	$drop_shipping_pro_topbar_search_input_font_size = get_theme_mod('drop_shipping_pro_topbar_search_input_font_size');

	if($drop_shipping_pro_topbar_search_input_color != false || $drop_shipping_pro_topbar_search_input_font_family != false || $drop_shipping_pro_topbar_search_input_font_size != false){
		$custom_css .='input[type=search]::placeholder{';
			if($drop_shipping_pro_topbar_search_input_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_topbar_search_input_color).' !important;';
			if($drop_shipping_pro_topbar_search_input_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_topbar_search_input_font_family).' !important;';
			if($drop_shipping_pro_topbar_search_input_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_topbar_search_input_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_search_icon_color = get_theme_mod('drop_shipping_pro_topbar_search_icon_color');
	$drop_shipping_pro_topbar_search_icon_font_size = get_theme_mod('drop_shipping_pro_topbar_search_icon_font_size');

	if($drop_shipping_pro_topbar_search_icon_color != false || $drop_shipping_pro_topbar_search_icon_font_size != false){
		$custom_css .='.side_search .widget_product_search button i{';
			if($drop_shipping_pro_topbar_search_icon_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_topbar_search_icon_color).' !important;';
			if($drop_shipping_pro_topbar_search_icon_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_topbar_search_icon_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_search_bg_color =get_theme_mod('drop_shipping_pro_topbar_search_bg_color');

	if($drop_shipping_pro_topbar_search_bg_color != false){
		$custom_css .='.header-search-bar .row{';
				$custom_css .='background-color: '.esc_html($drop_shipping_pro_topbar_search_bg_color).' !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_support_icon_color = get_theme_mod('drop_shipping_pro_topbar_support_icon_color');
	$drop_shipping_pro_topbar_support_icon_font_size = get_theme_mod('drop_shipping_pro_topbar_support_icon_font_size');

	if($drop_shipping_pro_topbar_support_icon_color != false || $drop_shipping_pro_topbar_support_icon_font_size != false){
		$custom_css .='.topbar-support-box i{';
			if($drop_shipping_pro_topbar_support_icon_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_topbar_support_icon_color).' !important;';
			if($drop_shipping_pro_topbar_support_icon_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_topbar_support_icon_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_support_text_color =get_theme_mod('drop_shipping_pro_topbar_support_text_color');

	if($drop_shipping_pro_topbar_support_text_color != false){
		$custom_css .='.topbar-support-title,.topbar-support-text a{';
				$custom_css .='color: '.esc_html($drop_shipping_pro_topbar_support_text_color).' !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_support_title_font_family = get_theme_mod('drop_shipping_pro_topbar_support_title_font_family');
	$drop_shipping_pro_topbar_support_title_font_size = get_theme_mod('drop_shipping_pro_topbar_support_title_font_size');

	if($drop_shipping_pro_topbar_support_title_font_family != false || $drop_shipping_pro_topbar_support_title_font_size != false){
		$custom_css .='.topbar-support-title{';
			if($drop_shipping_pro_topbar_support_title_font_family != false)
				$custom_css .='font-family: '.esc_html($drop_shipping_pro_topbar_support_title_font_family).' !important;';
			if($drop_shipping_pro_topbar_support_title_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_topbar_support_title_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_support_text_font_family = get_theme_mod('drop_shipping_pro_topbar_support_text_font_family');
	$drop_shipping_pro_topbar_support_text_font_size = get_theme_mod('drop_shipping_pro_topbar_support_text_font_size');

	if($drop_shipping_pro_topbar_support_text_font_family != false || $drop_shipping_pro_topbar_support_text_font_size != false){
		$custom_css .='.topbar-support-text a{';
			if($drop_shipping_pro_topbar_support_text_font_family != false)
				$custom_css .='font-family: '.esc_html($drop_shipping_pro_topbar_support_text_font_family).' !important;';
			if($drop_shipping_pro_topbar_support_text_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_topbar_support_text_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_user_icon_color = get_theme_mod('drop_shipping_pro_topbar_user_icon_color');
	$drop_shipping_pro_topbar_user_icon_font_size = get_theme_mod('drop_shipping_pro_topbar_user_icon_font_size');

	if($drop_shipping_pro_topbar_user_icon_color != false || $drop_shipping_pro_topbar_user_icon_font_size != false){
		$custom_css .='.wishlist_view i, .user-icon i{';
			if($drop_shipping_pro_topbar_user_icon_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_topbar_user_icon_color).' !important;';
			if($drop_shipping_pro_topbar_user_icon_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_topbar_user_icon_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_topbar_border_color =get_theme_mod('drop_shipping_pro_topbar_border_color');

	if($drop_shipping_pro_topbar_border_color != false){
		$custom_css .='.middle-header{';
				$custom_css .='border-color: '.esc_html($drop_shipping_pro_topbar_border_color).' !important;';
		$custom_css .='}';
	}

	/*-------------------- Header --------------------*/

	$drop_shipping_pro_headerhomebg_color = get_theme_mod('drop_shipping_pro_headerhomebg_color');

	if($drop_shipping_pro_headerhomebg_color != false){
		$custom_css .='.main-menu{';
				$custom_css .='background-color: '.esc_html($drop_shipping_pro_headerhomebg_color).' !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_header_title_color = get_theme_mod('drop_shipping_pro_header_title_color');
	$drop_shipping_pro_header_title_font_family = get_theme_mod('drop_shipping_pro_header_title_font_family');
	$drop_shipping_pro_header_title_font_size = get_theme_mod('drop_shipping_pro_header_title_font_size');
	if($drop_shipping_pro_header_title_color != false || $drop_shipping_pro_header_title_font_family != false || $drop_shipping_pro_header_title_font_size != false){
		$custom_css .='.logo-text h2 a{';
			if($drop_shipping_pro_header_title_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_header_title_color).' !important;';
			if($drop_shipping_pro_header_title_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_header_title_font_family).' !important;';
			if($drop_shipping_pro_header_title_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_header_title_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_header_section_logo_subtitle_font_family = get_theme_mod('drop_shipping_pro_header_section_logo_subtitle_font_family');
	$drop_shipping_pro_header_section_logo_subtitle_font_size = get_theme_mod('drop_shipping_pro_header_section_logo_subtitle_font_size');
	$drop_shipping_pro_header_section_logo_subtitle_color = get_theme_mod('drop_shipping_pro_header_section_logo_subtitle_color');
	if($drop_shipping_pro_header_section_logo_subtitle_color != false || $drop_shipping_pro_header_section_logo_subtitle_font_family != false || $drop_shipping_pro_header_section_logo_subtitle_font_size != false){
		$custom_css .='.logo-text h2 p{';
			if($drop_shipping_pro_header_section_logo_subtitle_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_header_section_logo_subtitle_color).' !important;';
			if($drop_shipping_pro_header_section_logo_subtitle_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_header_section_logo_subtitle_font_family).' !important;';
			if($drop_shipping_pro_header_section_logo_subtitle_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_header_section_logo_subtitle_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_headermenu_bgcolor = get_theme_mod('drop_shipping_pro_headermenu_bgcolor');
	$drop_shipping_pro_headermenu_color = get_theme_mod('drop_shipping_pro_headermenu_color');
	$drop_shipping_pro_headermenu_font_family = get_theme_mod('drop_shipping_pro_headermenu_font_family');
	$drop_shipping_pro_headermenu_font_size = get_theme_mod('drop_shipping_pro_headermenu_font_size');
	$drop_shipping_pro_header_menu_active_color = get_theme_mod('drop_shipping_pro_header_menu_active_color');
	$drop_shipping_pro_header_menu_active_bgcolor =get_theme_mod('drop_shipping_pro_header_menu_active_bgcolor');
	$drop_shipping_pro_dropdownbg_color = get_theme_mod('drop_shipping_pro_dropdownbg_color');
	$drop_shipping_pro_dropdown_border_color = get_theme_mod('drop_shipping_pro_dropdown_border_color');


	if($drop_shipping_pro_headermenu_bgcolor != false){
		$custom_css .='.main-navigation ul{';
				$custom_css .='background-color: '.esc_html($drop_shipping_pro_headermenu_bgcolor).' !important;';
		$custom_css .='}';
	}

	if($drop_shipping_pro_headermenu_color != false){
		$custom_css .='.main-navigation ul li a,.main-navigation ul li:before,.menu-item-has-children:after{';
				$custom_css .='color: '.esc_html($drop_shipping_pro_headermenu_color).' !important;';
		$custom_css .='}';
	}

	if($drop_shipping_pro_headermenu_font_family != false){
			$custom_css .='.main-navigation a,.main-navigation ul li a{';
				
				if($drop_shipping_pro_headermenu_font_family != false)
					$custom_css .='font-family:'.esc_html($drop_shipping_pro_headermenu_font_family).'!important;';
			$custom_css .='}';
	}

	if($drop_shipping_pro_headermenu_font_size != false){
	$custom_css .='.main-navigation a,.main-navigation ul li a{
		font-size: '.esc_html($drop_shipping_pro_headermenu_font_size).'px !important;
		}';
	}

	if($drop_shipping_pro_header_menu_active_color != false){
		$custom_css .='.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a,.current-menu-item.current_page_item:before{
			color: '.esc_html($drop_shipping_pro_header_menu_active_color).' !important;
		}';
		$custom_css .='.main-navigation li.current-menu-item:before{
			color: '.esc_html($drop_shipping_pro_header_menu_active_color).' !important;
		}';
	}
	if($drop_shipping_pro_header_menu_active_bgcolor != false){
	$custom_css .='.current-menu-item.current_page_item{
		background-color: '.esc_html($drop_shipping_pro_header_menu_active_bgcolor).' !important;
		}';
	}
	
	if($drop_shipping_pro_dropdownbg_color != false){
		$custom_css .='.main-navigation ul ul{';
				$custom_css .='background-color: '.esc_html($drop_shipping_pro_dropdownbg_color).' !important;';
		$custom_css .='}';
	}

	if($drop_shipping_pro_dropdown_border_color != false){
		$custom_css .='.main-navigation ul ul{';
				$custom_css .='border-color: '.esc_html($drop_shipping_pro_dropdown_border_color).' !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_dropdownbg_itemcolor = get_theme_mod('drop_shipping_pro_dropdownbg_itemcolor');
	$drop_shipping_pro_dropdownbg_item_font_family= get_theme_mod('drop_shipping_pro_dropdownbg_item_font_family');
	$drop_shipping_pro_dropdownbg_item_font_size = get_theme_mod('drop_shipping_pro_dropdownbg_item_font_size');

	if($drop_shipping_pro_dropdownbg_itemcolor != false){
		$custom_css .='#site-navigation.main-navigation ul ul a,.main-navigation ul ul li a,.menu-item-has-children li a:before{';
				$custom_css .='color: '.esc_html($drop_shipping_pro_dropdownbg_itemcolor).' !important;';
		$custom_css .='}';
	}
	if($drop_shipping_pro_dropdownbg_itemcolor != false){
		$custom_css .='.main-navigation ul ul li{';
				$custom_css .='border-bottom-color: '.esc_html($drop_shipping_pro_dropdownbg_itemcolor).' !important;';
		$custom_css .='}';
	}

	if($drop_shipping_pro_dropdownbg_item_font_family != false){
			$custom_css .='.main-navigation ul ul a{';
				
				if($drop_shipping_pro_dropdownbg_item_font_family != false)
					$custom_css .='font-family:'.esc_html($drop_shipping_pro_dropdownbg_item_font_family).'!important;';
			$custom_css .='}';
	}

	if($drop_shipping_pro_dropdownbg_item_font_size != false){
	$custom_css .='.main-navigation ul ul a{
		font-size: '.esc_html($drop_shipping_pro_dropdownbg_item_font_size).'px !important;
		}';
	}

	$drop_shipping_pro_dropdownbg_responsivecolor = get_theme_mod('drop_shipping_pro_dropdownbg_responsivecolor');
	$drop_shipping_pro_headermenu_responsive_item_color = get_theme_mod('drop_shipping_pro_headermenu_responsive_item_color');


	$drop_shipping_pro_headermenu_responsive_active_item_color = get_theme_mod('drop_shipping_pro_headermenu_responsive_active_item_color');
	$drop_shipping_pro_menu_open_bar_color = get_theme_mod('drop_shipping_pro_menu_open_bar_color');
	$drop_shipping_pro_menu_open_bar_font_size = get_theme_mod('drop_shipping_pro_menu_open_bar_font_size');
	$drop_shipping_pro_menu_close_color = get_theme_mod('drop_shipping_pro_menu_close_color');

	$custom_css .='@media screen and (max-width:1024px) {';
		if($drop_shipping_pro_dropdownbg_responsivecolor != false){
			$custom_css .='amp-sidebar#sidebar1{
				background-color:'.esc_html($drop_shipping_pro_dropdownbg_responsivecolor).' !important;
			}';
		}
		if($drop_shipping_pro_headermenu_responsive_item_color != false){
			$custom_css .='#sidebar1 .main-navigation ul li a,#sidebar1 .main-navigation ul li a,#sidebar1 a:not([href]):not([class]), #sidebar1 a:not([href]):not([class]):hover,#sidebar1 .main-navigation ul li:before,#sidebar1 .main-navigation ul .menu-item-has-children> a:before{
				color: '.esc_html($drop_shipping_pro_headermenu_responsive_item_color).' !important ;
			}';
		}

		if($drop_shipping_pro_headermenu_responsive_active_item_color != false){
			$custom_css .='#header .main-navigation .current_page_item > a, #header .main-navigation .current-menu-item a, #header .main-navigation .current_page_ancestor a,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a,.current-menu-item.current_page_item:before{
				color: '.esc_html($drop_shipping_pro_headermenu_responsive_active_item_color).' !important;
			}';
			$custom_css .='#header .main-navigation .current_page_item:before{
				color: '.esc_html($drop_shipping_pro_headermenu_responsive_active_item_color).' !important;
			}';
		}

		if($drop_shipping_pro_menu_open_bar_color != false || $drop_shipping_pro_menu_open_bar_font_size != false){
			$custom_css .='.toggle-nav i{';
				if($drop_shipping_pro_menu_open_bar_color != false){
					$custom_css .='color: '.esc_html($drop_shipping_pro_menu_open_bar_color).' !important;';
				}
				if($drop_shipping_pro_menu_open_bar_font_size != false){
					$custom_css .= 'font-size: '.esc_html($drop_shipping_pro_menu_open_bar_font_size).'px !important;';
				}

			$custom_css .='}';
		}

		if($drop_shipping_pro_menu_close_color != false){
			$custom_css .='.close-icon:after, .close-icon:before{';
				if($drop_shipping_pro_menu_close_color != false){
					$custom_css .='background-color: '.esc_html($drop_shipping_pro_menu_close_color).' !important;';
				}

			$custom_css .='}';
		}
	$custom_css .='}';	

	$drop_shipping_pro_header_cart_text_color =get_theme_mod('drop_shipping_pro_header_cart_text_color');

	if($drop_shipping_pro_header_cart_text_color != false){
	$custom_css .='.cart-btn-box>div,.cart-customlocation{';
	    $custom_css .='color: '.esc_html($drop_shipping_pro_header_cart_text_color).' !important;';
	$custom_css .='}';
	}

	$drop_shipping_pro_header_cart_title_font_family = get_theme_mod('drop_shipping_pro_header_cart_title_font_family');
	$drop_shipping_pro_header_cart_title_font_size = get_theme_mod('drop_shipping_pro_header_cart_title_font_size');

	if($drop_shipping_pro_header_cart_title_font_family != false || $drop_shipping_pro_header_cart_title_font_size != false){
	$custom_css .='.cart-btn-box>div{';
	  if($drop_shipping_pro_header_cart_title_font_family != false)
	    $custom_css .='font-family: '.esc_html($drop_shipping_pro_header_cart_title_font_family).' !important;';
	  if($drop_shipping_pro_header_cart_title_font_size != false)
	    $custom_css .='font-size:'.esc_html($drop_shipping_pro_header_cart_title_font_size).'px !important;';
	$custom_css .='}';
	}

	$drop_shipping_pro_header_cart_text_font_family = get_theme_mod('drop_shipping_pro_header_cart_text_font_family');
	$drop_shipping_pro_header_cart_text_font_size = get_theme_mod('drop_shipping_pro_header_cart_text_font_size');

	if($drop_shipping_pro_header_cart_text_font_family != false || $drop_shipping_pro_header_cart_text_font_size != false){
	$custom_css .='.cart-customlocation{';
	  if($drop_shipping_pro_header_cart_text_font_family != false)
	    $custom_css .='font-family: '.esc_html($drop_shipping_pro_header_cart_text_font_family).' !important;';
	  if($drop_shipping_pro_header_cart_text_font_size != false)
	    $custom_css .='font-size:'.esc_html($drop_shipping_pro_header_cart_text_font_size).'px !important;';
	$custom_css .='}';
	}

	/*---------------- Slider ----------------*/
	$drop_shipping_pro_slider_Heading_font_family = get_theme_mod('drop_shipping_pro_slider_Heading_font_family');
	$drop_shipping_pro_slider_Heading_font_size = get_theme_mod('drop_shipping_pro_slider_Heading_font_size');
	$drop_shipping_pro_slider_small_Heading_font_family = get_theme_mod('drop_shipping_pro_slider_small_Heading_font_family');
	$drop_shipping_pro_slider_small_Heading_font_size = get_theme_mod('drop_shipping_pro_slider_small_Heading_font_size');
	$drop_shipping_pro_slider_text_font_family = get_theme_mod('drop_shipping_pro_slider_text_font_family');
	$drop_shipping_pro_slider_text_font_size = get_theme_mod('drop_shipping_pro_slider_text_font_size');
	$drop_shipping_pro_slider_btn_font_family = get_theme_mod('drop_shipping_pro_slider_btn_font_family');
	$drop_shipping_pro_slider_btn_font_size = get_theme_mod('drop_shipping_pro_slider_btn_font_size');
	$drop_shipping_pro_slide_btn_color = get_theme_mod('drop_shipping_pro_slide_btn_color');
	$drop_shipping_pro_slide_btn_bg_color = get_theme_mod('drop_shipping_pro_slide_btn_bg_color');
	$drop_shipping_pro_slide_btn_bg_hover_color = get_theme_mod('drop_shipping_pro_slide_btn_bg_hover_color');
	$drop_shipping_pro_slide_nav_arrow_color = get_theme_mod('drop_shipping_pro_slide_nav_arrow_color');	
	$drop_shipping_pro_slide_content_color = get_theme_mod('drop_shipping_pro_slide_content_color');

	if($drop_shipping_pro_slide_content_color != false){
		$custom_css .='#slider .slide-small-heading,#slider .slide-heading,#slider .slidesmalltext,#slider .slide-btn{
			color: '.esc_html($drop_shipping_pro_slide_content_color).';
		}';
	}

	if($drop_shipping_pro_slider_Heading_font_family != false || $drop_shipping_pro_slider_Heading_font_size != false){
		$custom_css .='#slider .slide-heading{';
			if($drop_shipping_pro_slider_Heading_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_slider_Heading_font_family).'!important;';
			}
			if($drop_shipping_pro_slider_Heading_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_slider_Heading_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	if($drop_shipping_pro_slider_small_Heading_font_family != false || $drop_shipping_pro_slider_small_Heading_font_size != false){
		$custom_css .='#slider .slide-small-heading{';
			if($drop_shipping_pro_slider_small_Heading_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_slider_small_Heading_font_family).'!important;';
			}
			if($drop_shipping_pro_slider_small_Heading_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_slider_small_Heading_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	if($drop_shipping_pro_slider_text_font_family != false  || $drop_shipping_pro_slider_text_font_size != false){
		$custom_css .='#slider p{';
			if($drop_shipping_pro_slider_text_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_slider_text_font_family).'!important;';
			}
			if($drop_shipping_pro_slider_text_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_slider_text_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	if( $drop_shipping_pro_slider_btn_font_family != false ){
		$custom_css .='#slider .slide-btn{';
			if($drop_shipping_pro_slider_btn_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_slider_btn_font_family).'!important;';
			}
		$custom_css .='}';
	}

	if( $drop_shipping_pro_slide_btn_bg_hover_color != false ){
		$custom_css .='#slider .first:hover{';
			if($drop_shipping_pro_slide_btn_bg_hover_color != false){
				$custom_css .='box-shadow:0 0 40px 40px '.esc_html($drop_shipping_pro_slide_btn_bg_hover_color).' inset !important;';
			}
			if($drop_shipping_pro_slide_btn_bg_hover_color != false){
				$custom_css .='border-color:'.esc_html($drop_shipping_pro_slide_btn_bg_hover_color).'!important;';
			}
		$custom_css .='}';
	}

	if($drop_shipping_pro_slider_btn_font_size != false || $drop_shipping_pro_slide_btn_color != false || $drop_shipping_pro_slide_btn_bg_color != false){
		$custom_css .='#slider .slide-btn{';
			if($drop_shipping_pro_slider_btn_font_size != false){
				$custom_css .='font-size: '.esc_html($drop_shipping_pro_slider_btn_font_size).'!important;';
			}
			if($drop_shipping_pro_slide_btn_color != false){
				$custom_css .='border-color: '.esc_html($drop_shipping_pro_slide_btn_color).'!important;';
			}
			if($drop_shipping_pro_slide_btn_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_slide_btn_color).';';
			}
			if($drop_shipping_pro_slide_btn_bg_color != false){
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_slide_btn_bg_color).'!important;';
			}
		$custom_css .='}';
	}

	if($drop_shipping_pro_slide_nav_arrow_color != false){
		$custom_css .='#slider .slider-icon{';
			if($drop_shipping_pro_slide_nav_arrow_color != false){
				$custom_css .='color: '.esc_html($drop_shipping_pro_slide_nav_arrow_color).';';
			}
			if($drop_shipping_pro_slide_nav_arrow_color != false){
				$custom_css .='border-color: '.esc_html($drop_shipping_pro_slide_nav_arrow_color).';';
			}
		$custom_css .='}';
	}

	/*--------------Category Product Banner---------*/
	$drop_shipping_pro_product_banner1_heading_color = get_theme_mod('drop_shipping_pro_product_banner1_heading_color');
	$drop_shipping_pro_product_banner1_heading_font_family = get_theme_mod('drop_shipping_pro_product_banner1_heading_font_family');
	$drop_shipping_pro_product_banner1_heading_font_size = get_theme_mod('drop_shipping_pro_product_banner1_heading_font_size');
	if($drop_shipping_pro_product_banner1_heading_color != false || $drop_shipping_pro_product_banner1_heading_font_family != false || $drop_shipping_pro_product_banner1_heading_font_size != false){
		$custom_css .='.popular-stores-box h4{';
			if($drop_shipping_pro_product_banner1_heading_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_product_banner1_heading_color).'!important;';
			}
			if($drop_shipping_pro_product_banner1_heading_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_product_banner1_heading_font_family).'!important;';
			}
			if($drop_shipping_pro_product_banner1_heading_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_product_banner1_heading_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_product_banner1_text_color = get_theme_mod('drop_shipping_pro_product_banner1_text_color');
	$drop_shipping_pro_product_banner1_text_font_family = get_theme_mod('drop_shipping_pro_product_banner1_text_font_family');
	$drop_shipping_pro_product_banner1_text_font_size = get_theme_mod('drop_shipping_pro_product_banner1_text_font_size');
	if($drop_shipping_pro_product_banner1_text_color != false || $drop_shipping_pro_product_banner1_text_font_family != false || $drop_shipping_pro_product_banner1_text_font_size != false){
		$custom_css .='.popular-stores-box p{';
			if($drop_shipping_pro_product_banner1_text_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_product_banner1_text_color).'!important;';
			}
			if($drop_shipping_pro_product_banner1_text_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_product_banner1_text_font_family).'!important;';
			}
			if($drop_shipping_pro_product_banner1_text_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_product_banner1_text_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_product_banner1_btn_bg_color = get_theme_mod('drop_shipping_pro_product_banner1_btn_bg_color');
	$drop_shipping_pro_product_banner1_btn_color = get_theme_mod('drop_shipping_pro_product_banner1_btn_color');
	$drop_shipping_pro_product_banner1_btn_font_family = get_theme_mod('drop_shipping_pro_product_banner1_btn_font_family');
	$drop_shipping_pro_product_banner1_btn_font_size = get_theme_mod('drop_shipping_pro_product_banner1_btn_font_size');
	if($drop_shipping_pro_product_banner1_btn_bg_color != false || $drop_shipping_pro_product_banner1_btn_color != false || $drop_shipping_pro_product_banner1_btn_font_family != false || $drop_shipping_pro_product_banner1_btn_font_size != false){
		$custom_css .='.popular-stores-box a{';
			if($drop_shipping_pro_product_banner1_btn_bg_color != false){
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_product_banner1_btn_bg_color).'!important;';
			}
			if($drop_shipping_pro_product_banner1_btn_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_product_banner1_btn_color).'!important;';
			}
			if($drop_shipping_pro_product_banner1_btn_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_product_banner1_btn_font_family).'!important;';
			}
			if($drop_shipping_pro_product_banner1_btn_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_product_banner1_btn_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	/*------------Featured Block-------------------*/
	$drop_shipping_pro_feature_block_content_color = get_theme_mod('drop_shipping_pro_feature_block_content_color');
	
	if($drop_shipping_pro_feature_block_content_color != false){
		$custom_css .='#feature-block .feature-block-title,#feature-block .feature-block-text{
			color: '.esc_html($drop_shipping_pro_feature_block_content_color).';
		}';
	}

	$drop_shipping_pro_feature_block_Heading_font_family = get_theme_mod('drop_shipping_pro_feature_block_Heading_font_family');
	$drop_shipping_pro_feature_block_Heading_font_size = get_theme_mod('drop_shipping_pro_feature_block_Heading_font_size');
	if($drop_shipping_pro_feature_block_Heading_font_family != false || $drop_shipping_pro_feature_block_Heading_font_size != false){
		$custom_css .='#feature-block .feature-block-title{';
			if($drop_shipping_pro_feature_block_Heading_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_feature_block_Heading_font_family).'!important;';
			}
			if($drop_shipping_pro_feature_block_Heading_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_feature_block_Heading_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_feature_block_text_font_family = get_theme_mod('drop_shipping_pro_feature_block_text_font_family');
	$drop_shipping_pro_feature_block_text_font_size = get_theme_mod('drop_shipping_pro_feature_block_text_font_size');
	if($drop_shipping_pro_feature_block_text_font_family != false || $drop_shipping_pro_feature_block_text_font_size != false){
		$custom_css .='#feature-block .feature-block-text{';
			if($drop_shipping_pro_feature_block_text_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_feature_block_text_font_family).'!important;';
			}
			if($drop_shipping_pro_feature_block_text_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_feature_block_text_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_feature_block_icon_color = get_theme_mod('drop_shipping_pro_feature_block_icon_color');
	$drop_shipping_pro_feature_block_icon_font_size = get_theme_mod('drop_shipping_pro_feature_block_icon_font_size');
	if($drop_shipping_pro_feature_block_icon_color != false || $drop_shipping_pro_feature_block_icon_font_size != false){
		$custom_css .='#feature-block .feature-block-inner i{';
			if($drop_shipping_pro_feature_block_icon_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_feature_block_icon_color).'!important;';
			}
			if($drop_shipping_pro_feature_block_icon_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_feature_block_icon_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_feature_block_hover_color = get_theme_mod('drop_shipping_pro_feature_block_hover_color');
	
	if($drop_shipping_pro_feature_block_hover_color != false){
		$custom_css .='.feature-block-inner:hover{
			background-color: '.esc_html($drop_shipping_pro_feature_block_hover_color).';
		}';
	}

	/*-------- Our Product -----------*/
	$drop_shipping_pro_our_product_section_title_color = get_theme_mod('drop_shipping_pro_our_product_section_title_color');
	$drop_shipping_pro_our_product_section_title_fonts = get_theme_mod('drop_shipping_pro_our_product_section_title_fonts');
	$drop_shipping_pro_our_product_section_title_font_size = get_theme_mod('drop_shipping_pro_our_product_section_title_font_size');
	if($drop_shipping_pro_our_product_section_title_color != false || $drop_shipping_pro_our_product_section_title_fonts != false || $drop_shipping_pro_our_product_section_title_font_size != false){
		$custom_css .='#our-products .section-title h3{';
			if($drop_shipping_pro_our_product_section_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_our_product_section_title_color).'!important;';
			}
			if($drop_shipping_pro_our_product_section_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_our_product_section_title_fonts).' !important;';
			}
			if($drop_shipping_pro_our_product_section_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_our_product_section_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_our_product_title_color = get_theme_mod('drop_shipping_pro_our_product_title_color');
	$drop_shipping_pro_our_product_title_fonts = get_theme_mod('drop_shipping_pro_our_product_title_fonts');
	$drop_shipping_pro_our_product_title_font_size = get_theme_mod('drop_shipping_pro_our_product_title_font_size');
	if($drop_shipping_pro_our_product_title_color != false || $drop_shipping_pro_our_product_title_fonts != false || $drop_shipping_pro_our_product_title_font_size != false){
		$custom_css .='#our-products .product_head a{';
			if($drop_shipping_pro_our_product_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_our_product_title_color).'!important;';
			}
			if($drop_shipping_pro_our_product_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_our_product_title_fonts).' !important;';
			}
			if($drop_shipping_pro_our_product_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_our_product_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_our_product_star_color = get_theme_mod('drop_shipping_pro_our_product_star_color');
	
	if($drop_shipping_pro_our_product_star_color != false){
		$custom_css .='#our-products .star-rating:before,#our-products .star-rating span{
			color: '.esc_html($drop_shipping_pro_our_product_star_color).';
		}';
	}

	$drop_shipping_pro_our_product_price_color = get_theme_mod('drop_shipping_pro_our_product_price_color');
	$drop_shipping_pro_our_product_price_fonts = get_theme_mod('drop_shipping_pro_our_product_price_fonts');
	$drop_shipping_pro_our_product_price_font_size = get_theme_mod('drop_shipping_pro_our_product_price_font_size');
	if($drop_shipping_pro_our_product_price_color != false || $drop_shipping_pro_our_product_price_fonts != false || $drop_shipping_pro_our_product_price_font_size != false){
		$custom_css .='#our-products .price ins,#our-products .price del{';
			if($drop_shipping_pro_our_product_price_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_our_product_price_color).'!important;';
			}
			if($drop_shipping_pro_our_product_price_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_our_product_price_fonts).' !important;';
			}
			if($drop_shipping_pro_our_product_price_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_our_product_price_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_our_product_cart_btn_color = get_theme_mod('drop_shipping_pro_our_product_cart_btn_color');
	$drop_shipping_pro_our_product_cart_btnbg_color = get_theme_mod('drop_shipping_pro_our_product_cart_btnbg_color');
	$drop_shipping_pro_our_product_cart_btn_fonts = get_theme_mod('drop_shipping_pro_our_product_cart_btn_fonts');
	$drop_shipping_pro_our_product_cart_btn_font_size = get_theme_mod('drop_shipping_pro_our_product_cart_btn_font_size');
	if($drop_shipping_pro_our_product_cart_btn_color != false|| $drop_shipping_pro_our_product_cart_btnbg_color != false || $drop_shipping_pro_our_product_cart_btn_fonts != false || $drop_shipping_pro_our_product_cart_btn_font_size != false){
		$custom_css .='#our-products .our-product-cart a{';
			if($drop_shipping_pro_our_product_cart_btn_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_our_product_cart_btn_color).'!important;';
			}
			if($drop_shipping_pro_our_product_cart_btnbg_color != false){
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_our_product_cart_btnbg_color).'!important;';
			}
			if($drop_shipping_pro_our_product_cart_btn_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_our_product_cart_btn_fonts).' !important;';
			}
			if($drop_shipping_pro_our_product_cart_btn_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_our_product_cart_btn_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_our_product_cart_btn_hover_color = get_theme_mod('drop_shipping_pro_our_product_cart_btn_hover_color');
	
	if($drop_shipping_pro_our_product_cart_btn_hover_color != false){
		$custom_css .='#our-products .inner_product:hover .our-product-cart a{
			color: '.esc_html($drop_shipping_pro_our_product_cart_btn_hover_color).';
		}';
	}
	
	$drop_shipping_pro_our_product_sale_badge_color = get_theme_mod('drop_shipping_pro_our_product_sale_badge_color');
	$drop_shipping_pro_our_product_sale_badgebg_color = get_theme_mod('drop_shipping_pro_our_product_sale_badgebg_color');
	$drop_shipping_pro_our_product_sale_badge_fonts = get_theme_mod('drop_shipping_pro_our_product_sale_badge_fonts');
	$drop_shipping_pro_our_product_sale_badge_font_size = get_theme_mod('drop_shipping_pro_our_product_sale_badge_font_size');
	if($drop_shipping_pro_our_product_sale_badge_color != false|| $drop_shipping_pro_our_product_sale_badgebg_color != false || $drop_shipping_pro_our_product_sale_badge_fonts != false || $drop_shipping_pro_our_product_sale_badge_font_size != false){
		$custom_css .='#our-products .inner_product .product-sale p{';
			if($drop_shipping_pro_our_product_sale_badge_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_our_product_sale_badge_color).'!important;';
			}
			if($drop_shipping_pro_our_product_sale_badgebg_color != false){
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_our_product_sale_badgebg_color).'!important;';
			}
			if($drop_shipping_pro_our_product_sale_badge_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_our_product_sale_badge_fonts).' !important;';
			}
			if($drop_shipping_pro_our_product_sale_badge_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_our_product_sale_badge_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_our_product_box_icon_color = get_theme_mod('drop_shipping_pro_our_product_box_icon_color');
	$drop_shipping_pro_our_product_box_iconbg_color = get_theme_mod('drop_shipping_pro_our_product_box_iconbg_color');
	$drop_shipping_pro_our_product_box_icon_font_size = get_theme_mod('drop_shipping_pro_our_product_box_icon_font_size');
	if($drop_shipping_pro_our_product_box_icon_color != false|| $drop_shipping_pro_our_product_box_iconbg_color != false  || $drop_shipping_pro_our_product_box_icon_font_size != false){
		$custom_css .='#our-products .bwt-wishlist-cart-view i{';
			if($drop_shipping_pro_our_product_box_icon_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_our_product_box_icon_color).'!important;';
			}
			if($drop_shipping_pro_our_product_box_iconbg_color != false){
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_our_product_box_iconbg_color).'!important;';
			}
			if($drop_shipping_pro_our_product_box_icon_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_our_product_box_icon_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_our_product_btn_color = get_theme_mod('drop_shipping_pro_our_product_btn_color');
	$drop_shipping_pro_our_product_btnbg_color = get_theme_mod('drop_shipping_pro_our_product_btnbg_color');
	$drop_shipping_pro_our_product_btn_fonts = get_theme_mod('drop_shipping_pro_our_product_btn_fonts');
	$drop_shipping_pro_our_product_btn_font_size = get_theme_mod('drop_shipping_pro_our_product_btn_font_size');
	if($drop_shipping_pro_our_product_btn_color != false|| $drop_shipping_pro_our_product_btnbg_color != false || $drop_shipping_pro_our_product_btn_fonts != false || $drop_shipping_pro_our_product_btn_font_size != false){
		$custom_css .='#our-products .section-button a{';
			if($drop_shipping_pro_our_product_btn_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_our_product_btn_color).'!important;';
			}
			if($drop_shipping_pro_our_product_btnbg_color != false){
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_our_product_btnbg_color).'!important;';
			}
			if($drop_shipping_pro_our_product_btn_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_our_product_btn_fonts).' !important;';
			}
			if($drop_shipping_pro_our_product_btn_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_our_product_btn_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_our_product_hover_bg_color = get_theme_mod('drop_shipping_pro_our_product_hover_bg_color');
	
	if($drop_shipping_pro_our_product_hover_bg_color != false){
		$custom_css .='#our-products .inner_product:hover .our-product-img{
			background-color: '.esc_html($drop_shipping_pro_our_product_hover_bg_color).';
		}';
	}

	/*----------------- All Category --------------*/
	$drop_shipping_pro_all_category_section_title_color = get_theme_mod('drop_shipping_pro_all_category_section_title_color');
	$drop_shipping_pro_all_category_section_title_fonts = get_theme_mod('drop_shipping_pro_all_category_section_title_fonts');
	$drop_shipping_pro_all_category_section_title_font_size = get_theme_mod('drop_shipping_pro_all_category_section_title_font_size');
	if($drop_shipping_pro_all_category_section_title_color != false || $drop_shipping_pro_all_category_section_title_fonts != false || $drop_shipping_pro_all_category_section_title_font_size != false){
		$custom_css .='#main-category .section-title h3{';
			if($drop_shipping_pro_all_category_section_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_all_category_section_title_color).'!important;';
			}
			if($drop_shipping_pro_all_category_section_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_all_category_section_title_fonts).' !important;';
			}
			if($drop_shipping_pro_all_category_section_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_all_category_section_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_all_category_title_color = get_theme_mod('drop_shipping_pro_all_category_title_color');
	$drop_shipping_pro_all_category_title_fonts = get_theme_mod('drop_shipping_pro_all_category_title_fonts');
	$drop_shipping_pro_all_category_title_font_size = get_theme_mod('drop_shipping_pro_all_category_title_font_size');
	if($drop_shipping_pro_all_category_title_color != false || $drop_shipping_pro_all_category_title_fonts != false || $drop_shipping_pro_all_category_title_font_size != false){
		$custom_css .='#main-category .category-content a{';
			if($drop_shipping_pro_all_category_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_all_category_title_color).'!important;';
			}
			if($drop_shipping_pro_all_category_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_all_category_title_fonts).' !important;';
			}
			if($drop_shipping_pro_all_category_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_all_category_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_all_category_img_bg1_color = get_theme_mod('drop_shipping_pro_all_category_img_bg1_color');
	
	if($drop_shipping_pro_all_category_img_bg1_color != false){
		$custom_css .='#main-category .owl-item:nth-child(1) .cat-image-bg:after, #main-category .owl-item:nth-child(6) .cat-image-bg:after{
			background-color: '.esc_html($drop_shipping_pro_all_category_img_bg1_color).';
		}';
	}

	$drop_shipping_pro_all_category_img_bg2_color = get_theme_mod('drop_shipping_pro_all_category_img_bg2_color');
	
	if($drop_shipping_pro_all_category_img_bg2_color != false){
		$custom_css .='#main-category .owl-item:nth-child(2) .cat-image-bg:after, #main-category .owl-item:nth-child(7) .cat-image-bg:after{
			background-color: '.esc_html($drop_shipping_pro_all_category_img_bg2_color).';
		}';
	}

	$drop_shipping_pro_all_category_img_bg3_color = get_theme_mod('drop_shipping_pro_all_category_img_bg3_color');
	
	if($drop_shipping_pro_all_category_img_bg3_color != false){
		$custom_css .='#main-category .owl-item:nth-child(3) .cat-image-bg:after, #main-category .owl-item:nth-child(8) .cat-image-bg:after{
			background-color: '.esc_html($drop_shipping_pro_all_category_img_bg3_color).';
		}';
	}

	$drop_shipping_pro_all_category_img_bg4_color = get_theme_mod('drop_shipping_pro_all_category_img_bg4_color');
	
	if($drop_shipping_pro_all_category_img_bg4_color != false){
		$custom_css .='#main-category .owl-item:nth-child(4) .cat-image-bg:after, #main-category .owl-item:nth-child(9) .cat-image-bg:after{
			background-color: '.esc_html($drop_shipping_pro_all_category_img_bg4_color).';
		}';
	}

	$drop_shipping_pro_all_category_img_bg5_color = get_theme_mod('drop_shipping_pro_all_category_img_bg5_color');
	
	if($drop_shipping_pro_all_category_img_bg5_color != false){
		$custom_css .='#main-category .owl-item:nth-child(5) .cat-image-bg:after, #main-category .owl-item:nth-child(10) .cat-image-bg:after{
			background-color: '.esc_html($drop_shipping_pro_all_category_img_bg5_color).';
		}';
	}

	/*--------------Product Category------------------------*/
	$drop_shipping_pro_product_section_title_color = get_theme_mod('drop_shipping_pro_product_section_title_color');
	$drop_shipping_pro_product_section_title_fonts = get_theme_mod('drop_shipping_pro_product_section_title_fonts');
	$drop_shipping_pro_product_section_title_font_size = get_theme_mod('drop_shipping_pro_product_section_title_font_size');
	if($drop_shipping_pro_product_section_title_color != false || $drop_shipping_pro_product_section_title_fonts != false || $drop_shipping_pro_product_section_title_font_size != false){
		$custom_css .='#product-category .product-cat-title h4{';
			if($drop_shipping_pro_product_section_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_product_section_title_color).'!important;';
			}
			if($drop_shipping_pro_product_section_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_product_section_title_fonts).' !important;';
			}
			if($drop_shipping_pro_product_section_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_product_section_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_product_title_color = get_theme_mod('drop_shipping_pro_product_title_color');
	$drop_shipping_pro_product_title_fonts = get_theme_mod('drop_shipping_pro_product_title_fonts');
	$drop_shipping_pro_product_title_font_size = get_theme_mod('drop_shipping_pro_product_title_font_size');
	if($drop_shipping_pro_product_title_color != false || $drop_shipping_pro_product_title_fonts != false || $drop_shipping_pro_product_title_font_size != false){
		$custom_css .='#product-category h5 a{';
			if($drop_shipping_pro_product_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_product_title_color).'!important;';
			}
			if($drop_shipping_pro_product_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_product_title_fonts).' !important;';
			}
			if($drop_shipping_pro_product_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_product_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_product_price_color = get_theme_mod('drop_shipping_pro_product_price_color');
	$drop_shipping_pro_product_price_fonts = get_theme_mod('drop_shipping_pro_product_price_fonts');
	$drop_shipping_pro_product_price_font_size = get_theme_mod('drop_shipping_pro_product_price_font_size');
	if($drop_shipping_pro_product_price_color != false || $drop_shipping_pro_product_price_fonts != false || $drop_shipping_pro_product_price_font_size != false){
		$custom_css .='#product-category ins, #product-category bdi{';
			if($drop_shipping_pro_product_price_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_product_price_color).'!important;';
			}
			if($drop_shipping_pro_product_price_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_product_price_fonts).' !important;';
			}
			if($drop_shipping_pro_product_price_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_product_price_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_product_rating_color = get_theme_mod('drop_shipping_pro_product_rating_color');
	
	if($drop_shipping_pro_product_rating_color != false){
		$custom_css .='#product-category .star-rating:before,#product-category .star-rating span{
			color: '.esc_html($drop_shipping_pro_product_rating_color).';
		}';
	}

	/*------------- Deal Of The Day ----------------*/
	$drop_shipping_pro_deals_section_title_color = get_theme_mod('drop_shipping_pro_deals_section_title_color');
	$drop_shipping_pro_deals_section_title_fonts = get_theme_mod('drop_shipping_pro_deals_section_title_fonts');
	$drop_shipping_pro_deals_section_title_font_size = get_theme_mod('drop_shipping_pro_deals_section_title_font_size');
	if($drop_shipping_pro_deals_section_title_color != false || $drop_shipping_pro_deals_section_title_fonts != false || $drop_shipping_pro_deals_section_title_font_size != false){
		$custom_css .='#deals .section-title h3{';
			if($drop_shipping_pro_deals_section_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_deals_section_title_color).'!important;';
			}
			if($drop_shipping_pro_deals_section_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_deals_section_title_fonts).' !important;';
			}
			if($drop_shipping_pro_deals_section_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_deals_section_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_deals_product_title_color = get_theme_mod('drop_shipping_pro_deals_product_title_color');
	$drop_shipping_pro_deals_product_title_fonts = get_theme_mod('drop_shipping_pro_deals_product_title_fonts');
	$drop_shipping_pro_deals_product_title_font_size = get_theme_mod('drop_shipping_pro_deals_product_title_font_size');
	if($drop_shipping_pro_deals_product_title_color != false || $drop_shipping_pro_deals_product_title_fonts != false || $drop_shipping_pro_deals_product_title_font_size != false){
		$custom_css .='#deals h5 a{';
			if($drop_shipping_pro_deals_product_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_deals_product_title_color).'!important;';
			}
			if($drop_shipping_pro_deals_product_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_deals_product_title_fonts).' !important;';
			}
			if($drop_shipping_pro_deals_product_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_deals_product_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_deals_product_text_color = get_theme_mod('drop_shipping_pro_deals_product_text_color');
	$drop_shipping_pro_deals_product_text_fonts = get_theme_mod('drop_shipping_pro_deals_product_text_fonts');
	$drop_shipping_pro_deals_product_text_font_size = get_theme_mod('drop_shipping_pro_deals_product_text_font_size');
	if($drop_shipping_pro_deals_product_text_color != false || $drop_shipping_pro_deals_product_text_fonts != false || $drop_shipping_pro_deals_product_text_font_size != false){
		$custom_css .='#deals .owl-item p{';
			if($drop_shipping_pro_deals_product_text_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_deals_product_text_color).'!important;';
			}
			if($drop_shipping_pro_deals_product_text_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_deals_product_text_fonts).' !important;';
			}
			if($drop_shipping_pro_deals_product_text_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_deals_product_text_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_deals_product_price_color = get_theme_mod('drop_shipping_pro_deals_product_price_color');
	$drop_shipping_pro_deals_product_price_fonts = get_theme_mod('drop_shipping_pro_deals_product_price_fonts');
	$drop_shipping_pro_deals_product_price_font_size = get_theme_mod('drop_shipping_pro_deals_product_price_font_size');
	if($drop_shipping_pro_deals_product_price_color != false || $drop_shipping_pro_deals_product_price_fonts != false || $drop_shipping_pro_deals_product_price_font_size != false){
		$custom_css .='#deals .amount bdi{';
			if($drop_shipping_pro_deals_product_price_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_deals_product_price_color).'!important;';
			}
			if($drop_shipping_pro_deals_product_price_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_deals_product_price_fonts).' !important;';
			}
			if($drop_shipping_pro_deals_product_price_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_deals_product_price_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_deals_star_color = get_theme_mod('drop_shipping_pro_deals_star_color');
	
	if($drop_shipping_pro_deals_star_color != false){
		$custom_css .='#deals .star-rating:before, #deals .star-rating span{
			color: '.esc_html($drop_shipping_pro_deals_star_color).';
		}';
	}

	$drop_shipping_pro_deals_timer_bg_color = get_theme_mod('drop_shipping_pro_deals_timer_bg_color');
	
	if($drop_shipping_pro_deals_timer_bg_color != false){
		$custom_css .='#deals #timer{
			background-color: '.esc_html($drop_shipping_pro_deals_timer_bg_color).';
		}';
	}

	$drop_shipping_pro_deals_timer_color = get_theme_mod('drop_shipping_pro_deals_timer_color');
	
	if($drop_shipping_pro_deals_timer_color != false){
		$custom_css .='#deals .countdowntimer .numbers,#deals .countdowntimer .numbers span{
			color: '.esc_html($drop_shipping_pro_deals_timer_color).';
		}';
	}

	$drop_shipping_pro_deals_timer_number_fonts = get_theme_mod('drop_shipping_pro_deals_timer_number_fonts');
	$drop_shipping_pro_deals_timer_number_font_size = get_theme_mod('drop_shipping_pro_deals_timer_number_font_size');
	if($drop_shipping_pro_deals_timer_number_fonts != false || $drop_shipping_pro_deals_timer_number_font_size != false){
		$custom_css .='#deals #timer{';
			if($drop_shipping_pro_deals_timer_number_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_deals_timer_number_fonts).' !important;';
			}
			if($drop_shipping_pro_deals_timer_number_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_deals_timer_number_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_deals_timer_span_fonts = get_theme_mod('drop_shipping_pro_deals_timer_span_fonts');
	$drop_shipping_pro_deals_timer_span_font_size = get_theme_mod('drop_shipping_pro_deals_timer_span_font_size');
	if($drop_shipping_pro_deals_timer_span_fonts != false || $drop_shipping_pro_deals_timer_span_font_size != false){
		$custom_css .='#deals .countdowntimer .numbers span{';
			if($drop_shipping_pro_deals_timer_span_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_deals_timer_span_fonts).' !important;';
			}
			if($drop_shipping_pro_deals_timer_span_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_deals_timer_span_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_deals_next_nav_color = get_theme_mod('drop_shipping_pro_deals_next_nav_color');
	$drop_shipping_pro_deals_next_nav_font_size = get_theme_mod('drop_shipping_pro_deals_next_nav_font_size');
	if($drop_shipping_pro_deals_next_nav_color != false || $drop_shipping_pro_deals_next_nav_font_size != false){
		$custom_css .='#deals .owl-nav .owl-next i{';
			if($drop_shipping_pro_deals_next_nav_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_deals_next_nav_color).' !important;';
			}
			if($drop_shipping_pro_deals_next_nav_color != false){
				$custom_css .='border-color:'.esc_html($drop_shipping_pro_deals_next_nav_color).' !important;';
			}
			if($drop_shipping_pro_deals_next_nav_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_deals_next_nav_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_deals_prev_nav_color = get_theme_mod('drop_shipping_pro_deals_prev_nav_color');
	$drop_shipping_pro_deals_prev_nav_font_size = get_theme_mod('drop_shipping_pro_deals_prev_nav_font_size');
	if($drop_shipping_pro_deals_prev_nav_color != false || $drop_shipping_pro_deals_prev_nav_font_size != false){
		$custom_css .='#deals .owl-nav .owl-prev i{';
			if($drop_shipping_pro_deals_prev_nav_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_deals_prev_nav_color).' !important;';
			}
			if($drop_shipping_pro_deals_next_nav_color != false){
				$custom_css .='border-color:'.esc_html($drop_shipping_pro_deals_next_nav_color).' !important;';
			}
			if($drop_shipping_pro_deals_prev_nav_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_deals_prev_nav_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	/*--------------Category Product Banner---------*/
	$drop_shipping_pro_product_banner2_heading_color = get_theme_mod('drop_shipping_pro_product_banner2_heading_color');
	$drop_shipping_pro_product_banner2_heading_font_family = get_theme_mod('drop_shipping_pro_product_banner2_heading_font_family');
	$drop_shipping_pro_product_banner2_heading_font_size = get_theme_mod('drop_shipping_pro_product_banner2_heading_font_size');
	if($drop_shipping_pro_product_banner2_heading_color != false || $drop_shipping_pro_product_banner2_heading_font_family != false || $drop_shipping_pro_product_banner2_heading_font_size != false){
		$custom_css .='.popular-stores-box h4{';
			if($drop_shipping_pro_product_banner2_heading_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_product_banner2_heading_color).'!important;';
			}
			if($drop_shipping_pro_product_banner2_heading_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_product_banner2_heading_font_family).'!important;';
			}
			if($drop_shipping_pro_product_banner2_heading_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_product_banner2_heading_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_product_banner2_text_color = get_theme_mod('drop_shipping_pro_product_banner2_text_color');
	$drop_shipping_pro_product_banner2_text_font_family = get_theme_mod('drop_shipping_pro_product_banner2_text_font_family');
	$drop_shipping_pro_product_banner2_text_font_size = get_theme_mod('drop_shipping_pro_product_banner2_text_font_size');
	if($drop_shipping_pro_product_banner2_text_color != false || $drop_shipping_pro_product_banner2_text_font_family != false || $drop_shipping_pro_product_banner2_text_font_size != false){
		$custom_css .='.popular-stores-box p{';
			if($drop_shipping_pro_product_banner2_text_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_product_banner2_text_color).'!important;';
			}
			if($drop_shipping_pro_product_banner2_text_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_product_banner2_text_font_family).'!important;';
			}
			if($drop_shipping_pro_product_banner2_text_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_product_banner2_text_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_product_banner2_btn_bg_color = get_theme_mod('drop_shipping_pro_product_banner2_btn_bg_color');
	$drop_shipping_pro_product_banner2_btn_color = get_theme_mod('drop_shipping_pro_product_banner2_btn_color');
	$drop_shipping_pro_product_banner2_btn_font_family = get_theme_mod('drop_shipping_pro_product_banner2_btn_font_family');
	$drop_shipping_pro_product_banner2_btn_font_size = get_theme_mod('drop_shipping_pro_product_banner2_btn_font_size');
	if($drop_shipping_pro_product_banner2_btn_bg_color != false || $drop_shipping_pro_product_banner2_btn_color != false || $drop_shipping_pro_product_banner2_btn_font_family != false || $drop_shipping_pro_product_banner2_btn_font_size != false){
		$custom_css .='.popular-stores-box a{';
			if($drop_shipping_pro_product_banner2_btn_bg_color != false){
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_product_banner2_btn_bg_color).'!important;';
			}
			if($drop_shipping_pro_product_banner2_btn_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_product_banner2_btn_color).'!important;';
			}
			if($drop_shipping_pro_product_banner2_btn_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_product_banner2_btn_font_family).'!important;';
			}
			if($drop_shipping_pro_product_banner2_btn_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_product_banner2_btn_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	/*----------------- New Arrival --------------------*/
	$drop_shipping_pro_new_arrival_section_title_color = get_theme_mod('drop_shipping_pro_new_arrival_section_title_color');
	$drop_shipping_pro_new_arrival_section_title_fonts = get_theme_mod('drop_shipping_pro_new_arrival_section_title_fonts');
	$drop_shipping_pro_new_arrival_section_title_font_size = get_theme_mod('drop_shipping_pro_new_arrival_section_title_font_size');
	if($drop_shipping_pro_new_arrival_section_title_color != false || $drop_shipping_pro_new_arrival_section_title_fonts != false || $drop_shipping_pro_new_arrival_section_title_font_size != false){
		$custom_css .='#new-arrival .section-title h3{';
			if($drop_shipping_pro_new_arrival_section_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_new_arrival_section_title_color).'!important;';
			}
			if($drop_shipping_pro_new_arrival_section_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_new_arrival_section_title_fonts).' !important;';
			}
			if($drop_shipping_pro_new_arrival_section_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_new_arrival_section_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_new_arrival_title_color = get_theme_mod('drop_shipping_pro_new_arrival_title_color');
	$drop_shipping_pro_new_arrival_title_fonts = get_theme_mod('drop_shipping_pro_new_arrival_title_fonts');
	$drop_shipping_pro_new_arrival_title_font_size = get_theme_mod('drop_shipping_pro_new_arrival_title_font_size');
	if($drop_shipping_pro_new_arrival_title_color != false || $drop_shipping_pro_new_arrival_title_fonts != false || $drop_shipping_pro_new_arrival_title_font_size != false){
		$custom_css .='#new-arrival .product_head a{';
			if($drop_shipping_pro_new_arrival_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_new_arrival_title_color).'!important;';
			}
			if($drop_shipping_pro_new_arrival_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_new_arrival_title_fonts).' !important;';
			}
			if($drop_shipping_pro_new_arrival_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_new_arrival_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_new_arrival_star_color = get_theme_mod('drop_shipping_pro_new_arrival_star_color');
	
	if($drop_shipping_pro_new_arrival_star_color != false){
		$custom_css .='#new-arrival .star-rating:before,#our-products .star-rating span{
			color: '.esc_html($drop_shipping_pro_new_arrival_star_color).';
		}';
	}

	$drop_shipping_pro_new_arrival_price_color = get_theme_mod('drop_shipping_pro_new_arrival_price_color');
	$drop_shipping_pro_new_arrival_price_fonts = get_theme_mod('drop_shipping_pro_new_arrival_price_fonts');
	$drop_shipping_pro_new_arrival_price_font_size = get_theme_mod('drop_shipping_pro_new_arrival_price_font_size');
	if($drop_shipping_pro_new_arrival_price_color != false || $drop_shipping_pro_new_arrival_price_fonts != false || $drop_shipping_pro_new_arrival_price_font_size != false){
		$custom_css .='#new-arrival .price ins,#our-products .price del{';
			if($drop_shipping_pro_new_arrival_price_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_new_arrival_price_color).'!important;';
			}
			if($drop_shipping_pro_new_arrival_price_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_new_arrival_price_fonts).' !important;';
			}
			if($drop_shipping_pro_new_arrival_price_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_new_arrival_price_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_new_arrival_cart_btn_color = get_theme_mod('drop_shipping_pro_new_arrival_cart_btn_color');
	$drop_shipping_pro_new_arrival_cart_btnbg_color = get_theme_mod('drop_shipping_pro_new_arrival_cart_btnbg_color');
	$drop_shipping_pro_new_arrival_cart_btn_fonts = get_theme_mod('drop_shipping_pro_new_arrival_cart_btn_fonts');
	$drop_shipping_pro_new_arrival_cart_btn_font_size = get_theme_mod('drop_shipping_pro_new_arrival_cart_btn_font_size');
	if($drop_shipping_pro_new_arrival_cart_btn_color != false|| $drop_shipping_pro_new_arrival_cart_btnbg_color != false || $drop_shipping_pro_new_arrival_cart_btn_fonts != false || $drop_shipping_pro_new_arrival_cart_btn_font_size != false){
		$custom_css .='#new-arrival .our-product-cart a{';
			if($drop_shipping_pro_new_arrival_cart_btn_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_new_arrival_cart_btn_color).'!important;';
			}
			if($drop_shipping_pro_new_arrival_cart_btnbg_color != false){
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_new_arrival_cart_btnbg_color).'!important;';
			}
			if($drop_shipping_pro_new_arrival_cart_btn_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_new_arrival_cart_btn_fonts).' !important;';
			}
			if($drop_shipping_pro_new_arrival_cart_btn_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_new_arrival_cart_btn_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_new_arrival_cart_btn_hover_color = get_theme_mod('drop_shipping_pro_new_arrival_cart_btn_hover_color');
	
	if($drop_shipping_pro_new_arrival_cart_btn_hover_color != false){
		$custom_css .='#new-arrival .inner_product:hover .our-product-cart a{
			color: '.esc_html($drop_shipping_pro_new_arrival_cart_btn_hover_color).';
		}';
	}
	
	$drop_shipping_pro_new_arrival_sale_badge_color = get_theme_mod('drop_shipping_pro_new_arrival_sale_badge_color');
	$drop_shipping_pro_new_arrival_sale_badgebg_color = get_theme_mod('drop_shipping_pro_new_arrival_sale_badgebg_color');
	$drop_shipping_pro_new_arrival_sale_badge_fonts = get_theme_mod('drop_shipping_pro_new_arrival_sale_badge_fonts');
	$drop_shipping_pro_new_arrival_sale_badge_font_size = get_theme_mod('drop_shipping_pro_new_arrival_sale_badge_font_size');
	if($drop_shipping_pro_new_arrival_sale_badge_color != false|| $drop_shipping_pro_new_arrival_sale_badgebg_color != false || $drop_shipping_pro_new_arrival_sale_badge_fonts != false || $drop_shipping_pro_new_arrival_sale_badge_font_size != false){
		$custom_css .='#new-arrival .inner_product .onsale{';
			if($drop_shipping_pro_new_arrival_sale_badge_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_new_arrival_sale_badge_color).'!important;';
			}
			if($drop_shipping_pro_new_arrival_sale_badgebg_color != false){
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_new_arrival_sale_badgebg_color).'!important;';
			}
			if($drop_shipping_pro_new_arrival_sale_badge_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_new_arrival_sale_badge_fonts).' !important;';
			}
			if($drop_shipping_pro_new_arrival_sale_badge_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_new_arrival_sale_badge_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_new_arrival_box_icon_color = get_theme_mod('drop_shipping_pro_new_arrival_box_icon_color');
	$drop_shipping_pro_new_arrival_box_iconbg_color = get_theme_mod('drop_shipping_pro_new_arrival_box_iconbg_color');
	$drop_shipping_pro_new_arrival_box_icon_font_size = get_theme_mod('drop_shipping_pro_new_arrival_box_icon_font_size');
	if($drop_shipping_pro_new_arrival_box_icon_color != false|| $drop_shipping_pro_new_arrival_box_iconbg_color != false  || $drop_shipping_pro_new_arrival_box_icon_font_size != false){
		$custom_css .='#new-arrival .bwt-wishlist-cart-view i{';
			if($drop_shipping_pro_new_arrival_box_icon_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_new_arrival_box_icon_color).'!important;';
			}
			if($drop_shipping_pro_new_arrival_box_iconbg_color != false){
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_new_arrival_box_iconbg_color).'!important;';
			}
			if($drop_shipping_pro_new_arrival_box_icon_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_new_arrival_box_icon_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_new_arrival_btn_color = get_theme_mod('drop_shipping_pro_new_arrival_btn_color');
	$drop_shipping_pro_new_arrival_btnbg_color = get_theme_mod('drop_shipping_pro_new_arrival_btnbg_color');
	$drop_shipping_pro_new_arrival_btn_fonts = get_theme_mod('drop_shipping_pro_new_arrival_btn_fonts');
	$drop_shipping_pro_new_arrival_btn_font_size = get_theme_mod('drop_shipping_pro_new_arrival_btn_font_size');
	if($drop_shipping_pro_new_arrival_btn_color != false|| $drop_shipping_pro_new_arrival_btnbg_color != false || $drop_shipping_pro_new_arrival_btn_fonts != false || $drop_shipping_pro_new_arrival_btn_font_size != false){
		$custom_css .='#new-arrival .section-button a{';
			if($drop_shipping_pro_new_arrival_btn_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_new_arrival_btn_color).'!important;';
			}
			if($drop_shipping_pro_new_arrival_btnbg_color != false){
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_new_arrival_btnbg_color).'!important;';
			}
			if($drop_shipping_pro_new_arrival_btn_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_new_arrival_btn_fonts).' !important;';
			}
			if($drop_shipping_pro_new_arrival_btn_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_new_arrival_btn_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_new_arrival_hover_bg_color = get_theme_mod('drop_shipping_pro_new_arrival_hover_bg_color');
	
	if($drop_shipping_pro_new_arrival_hover_bg_color != false){
		$custom_css .='#new-arrival .inner_product:hover .our-product-img{
			background-color: '.esc_html($drop_shipping_pro_new_arrival_hover_bg_color).';
		}';
	}

	/*-----------------Featured Product-------------------*/

	$drop_shipping_pro_featured_product_section_title_color = get_theme_mod('drop_shipping_pro_featured_product_section_title_color');
	$drop_shipping_pro_featured_product_section_title_fonts = get_theme_mod('drop_shipping_pro_featured_product_section_title_fonts');
	$drop_shipping_pro_featured_product_section_title_font_size = get_theme_mod('drop_shipping_pro_featured_product_section_title_font_size');
	if($drop_shipping_pro_featured_product_section_title_color != false || $drop_shipping_pro_featured_product_section_title_fonts != false || $drop_shipping_pro_featured_product_section_title_font_size != false){
		$custom_css .='#featured-product .section-title h3{';
			if($drop_shipping_pro_featured_product_section_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_featured_product_section_title_color).'!important;';
			}
			if($drop_shipping_pro_featured_product_section_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_featured_product_section_title_fonts).' !important;';
			}
			if($drop_shipping_pro_featured_product_section_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_featured_product_section_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_featured_product_title_color = get_theme_mod('drop_shipping_pro_featured_product_title_color');
	$drop_shipping_pro_featured_product_title_fonts = get_theme_mod('drop_shipping_pro_featured_product_title_fonts');
	$drop_shipping_pro_featured_product_title_font_size = get_theme_mod('drop_shipping_pro_featured_product_title_font_size');
	if($drop_shipping_pro_featured_product_title_color != false || $drop_shipping_pro_featured_product_title_fonts != false || $drop_shipping_pro_featured_product_title_font_size != false){
		$custom_css .='#featured-product h5 a{';
			if($drop_shipping_pro_featured_product_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_featured_product_title_color).'!important;';
			}
			if($drop_shipping_pro_featured_product_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_featured_product_title_fonts).' !important;';
			}
			if($drop_shipping_pro_featured_product_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_featured_product_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_featured_product_star_color = get_theme_mod('drop_shipping_pro_featured_product_star_color');
	
	if($drop_shipping_pro_featured_product_star_color != false){
		$custom_css .='#featured-product .star-rating:before,#featured-product .star-rating span{
			color: '.esc_html($drop_shipping_pro_featured_product_star_color).';
		}';
	}

	$drop_shipping_pro_featured_product_price_color = get_theme_mod('drop_shipping_pro_featured_product_price_color');
	$drop_shipping_pro_featured_product_price_fonts = get_theme_mod('drop_shipping_pro_featured_product_price_fonts');
	$drop_shipping_pro_featured_product_price_font_size = get_theme_mod('drop_shipping_pro_featured_product_price_font_size');
	if($drop_shipping_pro_featured_product_price_color != false || $drop_shipping_pro_featured_product_price_fonts != false || $drop_shipping_pro_featured_product_price_font_size != false){
		$custom_css .='#featured-product del, #featured-product ins{';
			if($drop_shipping_pro_featured_product_price_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_featured_product_price_color).'!important;';
			}
			if($drop_shipping_pro_featured_product_price_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_featured_product_price_fonts).' !important;';
			}
			if($drop_shipping_pro_featured_product_price_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_featured_product_price_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_featured_product_cart_btn_color = get_theme_mod('drop_shipping_pro_featured_product_cart_btn_color');
	$drop_shipping_pro_featured_product_cart_btnbg_color = get_theme_mod('drop_shipping_pro_featured_product_cart_btnbg_color');
	$drop_shipping_pro_featured_product_cart_btn_fonts = get_theme_mod('drop_shipping_pro_featured_product_cart_btn_fonts');
	$drop_shipping_pro_featured_product_cart_btn_font_size = get_theme_mod('drop_shipping_pro_featured_product_cart_btn_font_size');
	if($drop_shipping_pro_featured_product_cart_btn_color != false|| $drop_shipping_pro_featured_product_cart_btnbg_color != false || $drop_shipping_pro_featured_product_cart_btn_fonts != false || $drop_shipping_pro_featured_product_cart_btn_font_size != false){
		$custom_css .='#featured-product .our-product-cart a{';
			if($drop_shipping_pro_featured_product_cart_btn_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_featured_product_cart_btn_color).'!important;';
			}
			if($drop_shipping_pro_featured_product_cart_btnbg_color != false){
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_featured_product_cart_btnbg_color).'!important;';
			}
			if($drop_shipping_pro_featured_product_cart_btn_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_featured_product_cart_btn_fonts).' !important;';
			}
			if($drop_shipping_pro_featured_product_cart_btn_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_featured_product_cart_btn_font_size).'px !important;';
			}
		$custom_css .='}';
	}	

	/*-------------- Our Blog ------------------*/
	$drop_shipping_pro_our_blog_section_title_color = get_theme_mod('drop_shipping_pro_our_blog_section_title_color');
	$drop_shipping_pro_our_blog_section_title_fonts = get_theme_mod('drop_shipping_pro_our_blog_section_title_fonts');
	$drop_shipping_pro_our_blog_section_title_font_size = get_theme_mod('drop_shipping_pro_our_blog_section_title_font_size');
	if($drop_shipping_pro_our_blog_section_title_color != false || $drop_shipping_pro_our_blog_section_title_fonts != false || $drop_shipping_pro_our_blog_section_title_font_size != false){
		$custom_css .='#our-blog .section-title h3{';
			if($drop_shipping_pro_our_blog_section_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_our_blog_section_title_color).'!important;';
			}
			if($drop_shipping_pro_our_blog_section_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_our_blog_section_title_fonts).' !important;';
			}
			if($drop_shipping_pro_our_blog_section_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_our_blog_section_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}	

	$drop_shipping_pro_our_blog_title_color = get_theme_mod('drop_shipping_pro_our_blog_title_color');
	$drop_shipping_pro_our_blog_title_fonts = get_theme_mod('drop_shipping_pro_our_blog_title_fonts');
	$drop_shipping_pro_our_blog_title_font_size = get_theme_mod('drop_shipping_pro_our_blog_title_font_size');
	if($drop_shipping_pro_our_blog_title_color != false || $drop_shipping_pro_our_blog_title_fonts != false || $drop_shipping_pro_our_blog_title_font_size != false){
		$custom_css .='#our-blog h4 a{';
			if($drop_shipping_pro_our_blog_title_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_our_blog_title_color).'!important;';
			}
			if($drop_shipping_pro_our_blog_title_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_our_blog_title_fonts).' !important;';
			}
			if($drop_shipping_pro_our_blog_title_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_our_blog_title_font_size).'px !important;';
			}
		$custom_css .='}';
	}	

	$drop_shipping_pro_our_blog_text_color = get_theme_mod('drop_shipping_pro_our_blog_text_color');
	$drop_shipping_pro_our_blog_text_fonts = get_theme_mod('drop_shipping_pro_our_blog_text_fonts');
	$drop_shipping_pro_our_blog_text_font_size = get_theme_mod('drop_shipping_pro_our_blog_text_font_size');
	if($drop_shipping_pro_our_blog_text_color != false || $drop_shipping_pro_our_blog_text_fonts != false || $drop_shipping_pro_our_blog_text_font_size != false){
		$custom_css .='#our-blog p{';
			if($drop_shipping_pro_our_blog_text_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_our_blog_text_color).'!important;';
			}
			if($drop_shipping_pro_our_blog_text_fonts != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_our_blog_text_fonts).' !important;';
			}
			if($drop_shipping_pro_our_blog_text_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_our_blog_text_font_size).'px !important;';
			}
		$custom_css .='}';
	}	



	/*-------------___Footer---------------------*/
	$drop_shipping_pro_footer_widget_title_color = get_theme_mod('drop_shipping_pro_footer_widget_title_color');
	$drop_shipping_pro_footer_widget_title_font_family = get_theme_mod('drop_shipping_pro_footer_widget_title_font_family');
	$drop_shipping_pro_footer_widget_title_font_size = get_theme_mod('drop_shipping_pro_footer_widget_title_font_size');

	if($drop_shipping_pro_footer_widget_title_color != false || $drop_shipping_pro_footer_widget_title_font_family != false || $drop_shipping_pro_footer_widget_title_font_size != false){
		$custom_css .='.footer-details h3{';
			if($drop_shipping_pro_footer_widget_title_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_footer_widget_title_color).' !important;';
			if($drop_shipping_pro_footer_widget_title_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_footer_widget_title_font_family).' !important;';
			if($drop_shipping_pro_footer_widget_title_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_footer_widget_title_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_footer_widget_content_color = get_theme_mod('drop_shipping_pro_footer_widget_content_color');
	$drop_shipping_pro_footer_widget_content_font_family = get_theme_mod('drop_shipping_pro_footer_widget_content_font_family');
	$drop_shipping_pro_footer_widget_content_font_size = get_theme_mod('drop_shipping_pro_footer_widget_content_font_size');

	if($drop_shipping_pro_footer_widget_content_color != false || $drop_shipping_pro_footer_widget_content_font_family != false || $drop_shipping_pro_footer_widget_content_font_size != false){
		$custom_css .='#bwt-footer_box .menu a, #bwt-footer_box .textwidget p, #bwt-footer_box .textwidget ul li{';
			if($drop_shipping_pro_footer_widget_content_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_footer_widget_content_color).' !important;';
			if($drop_shipping_pro_footer_widget_content_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_footer_widget_content_font_family).' !important;';
			if($drop_shipping_pro_footer_widget_content_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_footer_widget_content_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_footer_newsletter_input_bg_color = get_theme_mod('drop_shipping_pro_footer_newsletter_input_bg_color');
	if($drop_shipping_pro_footer_newsletter_input_bg_color != false){
		$custom_css .='#bwt-footer_box .wpcf7 input[type="email"]{';
			if($drop_shipping_pro_footer_newsletter_input_bg_color != false)
				$custom_css .='background-color: '.esc_html($drop_shipping_pro_footer_newsletter_input_bg_color).' !important;';
			if($drop_shipping_pro_footer_newsletter_input_bg_color != false)
				$custom_css .='border-color: '.esc_html($drop_shipping_pro_footer_newsletter_input_bg_color).' !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_footer_newsletter_button_color = get_theme_mod('drop_shipping_pro_footer_newsletter_button_color');
	$drop_shipping_pro_footer_newsletter_button_bg_color = get_theme_mod('drop_shipping_pro_footer_newsletter_button_bg_color');
	$drop_shipping_pro_footer_newsletter_button_font_family = get_theme_mod('drop_shipping_pro_footer_newsletter_button_font_family');
	$drop_shipping_pro_footer_newsletter_button_font_size = get_theme_mod('drop_shipping_pro_footer_newsletter_button_font_size');

	if($drop_shipping_pro_footer_newsletter_button_color != false || $drop_shipping_pro_footer_newsletter_button_font_family != false || $drop_shipping_pro_footer_newsletter_button_font_size != false || $drop_shipping_pro_footer_newsletter_button_bg_color != false){
		$custom_css .='#bwt-footer_box [type=submit]{';
			if($drop_shipping_pro_footer_newsletter_button_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_footer_newsletter_button_color).' !important;';
			if($drop_shipping_pro_footer_newsletter_button_bg_color != false)
				$custom_css .='background-color: '.esc_html($drop_shipping_pro_footer_newsletter_button_bg_color).' !important;';
			if($drop_shipping_pro_footer_newsletter_button_bg_color != false)
				$custom_css .='border-color: '.esc_html($drop_shipping_pro_footer_newsletter_button_bg_color).' !important;';
			if($drop_shipping_pro_footer_newsletter_button_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_footer_newsletter_button_font_family).' !important;';
			if($drop_shipping_pro_footer_newsletter_button_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_footer_newsletter_button_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_footer_widget_contact_content_color = get_theme_mod('drop_shipping_pro_footer_widget_contact_content_color');
	$drop_shipping_pro_footer_widget_contact_content_font_family = get_theme_mod('drop_shipping_pro_footer_widget_contact_content_font_family');
	$drop_shipping_pro_footer_widget_contact_content_font_size = get_theme_mod('drop_shipping_pro_footer_widget_contact_content_font_size');

	if($drop_shipping_pro_footer_widget_contact_content_color != false || $drop_shipping_pro_footer_widget_contact_content_font_family != false || $drop_shipping_pro_footer_widget_contact_content_font_size != false){
		$custom_css .='.about_me span{';
			if($drop_shipping_pro_footer_widget_contact_content_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_footer_widget_contact_content_color).' !important;';
			if($drop_shipping_pro_footer_widget_contact_content_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_footer_widget_contact_content_font_family).' !important;';
			if($drop_shipping_pro_footer_widget_contact_content_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_footer_widget_contact_content_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_footer_widget_contact_icon_color = get_theme_mod('drop_shipping_pro_footer_widget_contact_icon_color');
	$drop_shipping_pro_footer_widget_contact_icon_size = get_theme_mod('drop_shipping_pro_footer_widget_contact_icon_size');

	if($drop_shipping_pro_footer_widget_contact_icon_color != false || $drop_shipping_pro_footer_widget_contact_icon_size != false){
		$custom_css .='.about_me i{';
			if($drop_shipping_pro_footer_widget_contact_icon_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_footer_widget_contact_icon_color).' !important;';
			if($drop_shipping_pro_footer_widget_contact_icon_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_footer_widget_contact_icon_size).'px !important;';
		$custom_css .='}';
	}

	/*------------------------------ Footer Copyright ----------------------------------------*/
	$drop_shipping_pro_footer_para_color = get_theme_mod('drop_shipping_pro_footer_para_color');
	$drop_shipping_pro_footer_para_font_family = get_theme_mod('drop_shipping_pro_footer_para_font_family');
	$drop_shipping_pro_copyright_top_bottom_padding = get_theme_mod('drop_shipping_pro_copyright_top_bottom_padding');
	$drop_shipping_pro_copyright_para_font_size = get_theme_mod('drop_shipping_pro_copyright_para_font_size');

	if($drop_shipping_pro_footer_para_color != false || $drop_shipping_pro_footer_para_font_family != false || $drop_shipping_pro_copyright_para_font_size != false){
		$custom_css .='.copyright-text p,.copyright-text .last_copy_head{';
			if($drop_shipping_pro_footer_para_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_footer_para_color).';';
			if($drop_shipping_pro_footer_para_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_footer_para_font_family).';';
			if($drop_shipping_pro_copyright_para_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_copyright_para_font_size).'px !important;';
		$custom_css .='}';
	}
	if($drop_shipping_pro_copyright_top_bottom_padding != false ){
        $custom_css .='.copyright-text p{
            padding-top: '.esc_html($drop_shipping_pro_copyright_top_bottom_padding).'px !important;
            padding-bottom: '.esc_html($drop_shipping_pro_copyright_top_bottom_padding).'px !important;
        }';

    }
    // ------------ Copyright Alignment -----------

    $copy_alignment = get_theme_mod('drop_shipping_pro_footer_copy_alingment','left');
    if($copy_alignment=="left"){
        $custom_css .='.copyright-text p{
            text-align: left !important;
        }';
    }

    if($copy_alignment=="center"){
        $custom_css .='.copyright-text p{
            text-align: center !important;
        }';
    }

    if($copy_alignment=="right"){
        $custom_css .='.copyright-text p{
            text-align: right !important;
        }';
    }

    /*----------Footer Social Icon-------------*/
   	$drop_shipping_pro_footer_social_icon_bg_color = get_theme_mod('drop_shipping_pro_footer_social_icon_bg_color');
	$drop_shipping_pro_footer_social_icon_color = get_theme_mod('drop_shipping_pro_footer_social_icon_color');
	$drop_shipping_pro_footer_social_icon_font_size = get_theme_mod('drop_shipping_pro_footer_social_icon_font_size');
	$drop_shipping_pro_footer_social_icon_shadow_color = get_theme_mod('drop_shipping_pro_footer_social_icon_shadow_color');
	$drop_shipping_pro_footer_social_icon_hover_color = get_theme_mod('drop_shipping_pro_footer_social_icon_hover_color');

	if($drop_shipping_pro_footer_social_icon_color != false || $drop_shipping_pro_footer_social_icon_font_size != false){
		$custom_css .='.footer-social-icon a i{';
			if($drop_shipping_pro_footer_social_icon_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_footer_social_icon_color).';';
			if($drop_shipping_pro_footer_social_icon_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_footer_social_icon_font_size).'px !important;';
		$custom_css .='}';
	}

	if($drop_shipping_pro_footer_social_icon_bg_color != false ){
        $custom_css .='.icon-fill::before{
            box-shadow: inset 0 0 0 60px '.esc_html($drop_shipping_pro_footer_social_icon_bg_color).' !important;
        }';
    }

	if($drop_shipping_pro_footer_social_icon_shadow_color != false ){
        $custom_css .='.icon-fill:hover::before{
            box-shadow: inset 0 0 0 1px '.esc_html($drop_shipping_pro_footer_social_icon_shadow_color).' !important;
        }';
    }

	if($drop_shipping_pro_footer_social_icon_hover_color != false ){
        $custom_css .='.footer-social-icon a:hover i{
            color: '.esc_html($drop_shipping_pro_footer_social_icon_hover_color).' !important;
        }';
    }

	// --------- Scroll top to bottom --------
	$drop_shipping_pro_general_scroll_top_color = get_theme_mod('drop_shipping_pro_general_scroll_top_color');
	$drop_shipping_pro_general_scroll_top_bgcolor = get_theme_mod('drop_shipping_pro_general_scroll_top_bgcolor');
	$drop_shipping_pro_general_scroll_top_hover_bgcolor = get_theme_mod('drop_shipping_pro_general_scroll_top_hover_bgcolor');

	$drop_shipping_pro_scroll_top_icon_width = get_theme_mod('drop_shipping_pro_scroll_top_icon_width');
	$drop_shipping_pro_scroll_top_icon_height = get_theme_mod('drop_shipping_pro_scroll_top_icon_height');
	$drop_shipping_pro_scroll_top_icon_border_radius = get_theme_mod('drop_shipping_pro_scroll_top_icon_border_radius');

    if($drop_shipping_pro_scroll_top_icon_width != false || $drop_shipping_pro_scroll_top_icon_height != false || $drop_shipping_pro_scroll_top_icon_border_radius != false){
        $custom_css .='#return-to-top{
            width: '.esc_html($drop_shipping_pro_scroll_top_icon_width).'px;
            height: '.esc_html($drop_shipping_pro_scroll_top_icon_height).'px;
            border-radius: '.esc_html($drop_shipping_pro_scroll_top_icon_border_radius).'%;
        }';

    }

    if($drop_shipping_pro_general_scroll_top_color != false){
		$custom_css .='#return-to-top i{
			color: '.esc_html($drop_shipping_pro_general_scroll_top_color).';
		}';
	}

	if($drop_shipping_pro_general_scroll_top_bgcolor != false){
		$custom_css .='#return-to-top{
			background-color: '.esc_html($drop_shipping_pro_general_scroll_top_bgcolor).';
		}';
	}

	if($drop_shipping_pro_general_scroll_top_hover_bgcolor != false){
		$custom_css .='#return-to-top:hover{
			background-color: '.esc_html($drop_shipping_pro_general_scroll_top_hover_bgcolor).';
		}';
	}

	// ------------- Site Frame ------------
	$drop_shipping_pro_site_frame_width = get_theme_mod('drop_shipping_pro_site_frame_width');
	$drop_shipping_pro_site_frame_type = get_theme_mod('drop_shipping_pro_site_frame_type');
	$drop_shipping_pro_site_frame_color = get_theme_mod('drop_shipping_pro_site_frame_color');

	//Button Settings 
	$drop_shipping_pro_button_padding_top_bottom = get_theme_mod('drop_shipping_pro_button_padding_top_bottom');
	$drop_shipping_pro_button_padding_left_right = get_theme_mod('drop_shipping_pro_button_padding_left_right');
	$drop_shipping_pro_button_border_radius = get_theme_mod('drop_shipping_pro_button_border_radius');

	/* ---------- Frame Setting ------------ */

	if($drop_shipping_pro_site_frame_width != false && $drop_shipping_pro_site_frame_type != false && $drop_shipping_pro_site_frame_color != false){
		$custom_css .='body{
			border: '.esc_html($drop_shipping_pro_site_frame_width).'px '.esc_html($drop_shipping_pro_site_frame_type).' '.esc_html($drop_shipping_pro_site_frame_color).';
		}';
	}


	/* ------------ Button Settings ----------------- */

	if($drop_shipping_pro_button_padding_top_bottom != false || $drop_shipping_pro_button_padding_left_right != false || $drop_shipping_pro_button_border_radius != false){
		$custom_css .='{';
			if($drop_shipping_pro_button_padding_left_right != false){
				$custom_css .='padding-left: '.esc_html($drop_shipping_pro_button_padding_left_right).'px;';
				$custom_css .='padding-right:'.esc_html($drop_shipping_pro_button_padding_left_right).'px;';
			}
			if($drop_shipping_pro_button_padding_top_bottom != false){
				$custom_css .='padding-top: '.esc_html($drop_shipping_pro_button_padding_top_bottom).'px;';
				$custom_css .='padding-bottom:'.esc_html($drop_shipping_pro_button_padding_top_bottom).'px;';
			}
			if($drop_shipping_pro_button_border_radius != false){
				$custom_css .='border-radius:'.esc_html($drop_shipping_pro_button_border_radius).'px !important;';
			}
		$custom_css .='}';
	}



	/*---------------------------Page Title Layout -------------------*/
	$page_title_lay = get_theme_mod( 'drop_shipping_pro_page_title_content_option','Center');
    if($page_title_lay == 'Left'){
		$custom_css .='.banner-image .entry-title,.bradcrumbs a, .bradcrumbs span, .bradcrumbs,.main_title h1,h1.entry-title,h1.page-title,.woocommerce h1{';
			$custom_css .='text-align:left !important;';
		$custom_css .='}';
	}else if($page_title_lay == 'Center'){
		$custom_css .='.banner-image .entry-title,.bradcrumbs a, .bradcrumbs span, .bradcrumbs,.main_title h1,h1.page-title,h1.entry-title,.woocommerce h1{';
			$custom_css .='text-align:center !important;';
		$custom_css .='}';
	}else if($page_title_lay == 'Right'){
		$custom_css .='.banner-image .entry-title,.bradcrumbs a, .bradcrumbs span, .bradcrumbs,.main_title h1,h1.page-title,h1.entry-title,.woocommerce h1{';
			$custom_css .='text-align:right !important;';
		$custom_css .='}';
	}

	/*-------------Spinner Color Settings---------------------------*/

	$drop_shipping_pro_general_spinner_bgcolor = get_theme_mod('drop_shipping_pro_general_spinner_bgcolor');
	if($drop_shipping_pro_general_spinner_bgcolor != false){
		$custom_css .='.bwt-travel-loading-box{
			background-color: '.esc_html($drop_shipping_pro_general_spinner_bgcolor).';
		}';
	}

	$drop_shipping_pro_general_spinner_color = get_theme_mod('drop_shipping_pro_general_spinner_color');
	if($drop_shipping_pro_general_spinner_color != false){
		$custom_css .='.bwt-travel-loading-box .codepad-logo{
			color: '.esc_html($drop_shipping_pro_general_spinner_color).';
		}';
	}

	$drop_shipping_pro_general_spinner_color = get_theme_mod('drop_shipping_pro_general_spinner_color');
	if($drop_shipping_pro_general_spinner_color != false){
		$custom_css .='.loader-1 .loader-outter,.loader-1 .loader-inner{
			border-color:'.esc_html($drop_shipping_pro_general_spinner_color).';
		}';
	}

	/*----------------Contact Page-------------------------------*/
	$drop_shipping_pro_contact_main_title_color = get_theme_mod('drop_shipping_pro_contact_main_title_color');
	$drop_shipping_pro_contact_main_title_font_family = get_theme_mod('drop_shipping_pro_contact_main_title_font_family');
	$drop_shipping_pro_contact_main_title_font_size = get_theme_mod('drop_shipping_pro_contact_main_title_font_size');
	if($drop_shipping_pro_contact_main_title_color != false || $drop_shipping_pro_contact_main_title_font_family != false || $drop_shipping_pro_contact_main_title_font_size != false){
		$custom_css .='#contact .contact-box .section-title h4{';
			if($drop_shipping_pro_contact_main_title_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_contact_main_title_color).' !important;';
			if($drop_shipping_pro_contact_main_title_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_contact_main_title_font_family).' !important;';
			if($drop_shipping_pro_contact_main_title_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_contact_main_title_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_contact_page_block_content_color = get_theme_mod('drop_shipping_pro_contact_page_block_content_color');
	
	if($drop_shipping_pro_contact_page_block_content_color != false){
		$custom_css .='#contact #feature-block .feature-block-title,#feature-block .feature-block-text{
			color: '.esc_html($drop_shipping_pro_contact_page_block_content_color).';
		}';
	}

	$drop_shipping_pro_contact_page_block_Heading_font_family = get_theme_mod('drop_shipping_pro_contact_page_block_Heading_font_family');
	$drop_shipping_pro_contact_page_block_Heading_font_size = get_theme_mod('drop_shipping_pro_contact_page_block_Heading_font_size');
	if($drop_shipping_pro_contact_page_block_Heading_font_family != false || $drop_shipping_pro_contact_page_block_Heading_font_size != false){
		$custom_css .='#contact #feature-block .feature-block-title{';
			if($drop_shipping_pro_contact_page_block_Heading_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_contact_page_block_Heading_font_family).'!important;';
			}
			if($drop_shipping_pro_contact_page_block_Heading_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_contact_page_block_Heading_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_contact_page_block_text_font_family = get_theme_mod('drop_shipping_pro_contact_page_block_text_font_family');
	$drop_shipping_pro_contact_page_block_text_font_size = get_theme_mod('drop_shipping_pro_contact_page_block_text_font_size');
	if($drop_shipping_pro_contact_page_block_text_font_family != false || $drop_shipping_pro_contact_page_block_text_font_size != false){
		$custom_css .='#contact #feature-block .feature-block-text{';
			if($drop_shipping_pro_contact_page_block_text_font_family != false){
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_contact_page_block_text_font_family).'!important;';
			}
			if($drop_shipping_pro_contact_page_block_text_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_contact_page_block_text_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_contact_page_block_icon_color = get_theme_mod('drop_shipping_pro_contact_page_block_icon_color');
	$drop_shipping_pro_contact_page_block_icon_font_size = get_theme_mod('drop_shipping_pro_contact_page_block_icon_font_size');
	if($drop_shipping_pro_contact_page_block_icon_color != false || $drop_shipping_pro_contact_page_block_icon_font_size != false){
		$custom_css .='#contact #feature-block .feature-block-inner i{';
			if($drop_shipping_pro_contact_page_block_icon_color != false){
				$custom_css .='color:'.esc_html($drop_shipping_pro_contact_page_block_icon_color).'!important;';
			}
			if($drop_shipping_pro_contact_page_block_icon_font_size != false){
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_contact_page_block_icon_font_size).'px !important;';
			}
		$custom_css .='}';
	}

	$drop_shipping_pro_contact_page_block_hover_color = get_theme_mod('drop_shipping_pro_contact_page_block_hover_color');
	
	if($drop_shipping_pro_contact_page_block_hover_color != false){
		$custom_css .='#contact .feature-block-inner:hover{
			background-color: '.esc_html($drop_shipping_pro_contact_page_block_hover_color).';
		}';
	}

	$drop_shipping_pro_contact_form_title_color = get_theme_mod('drop_shipping_pro_contact_form_title_color');
	$drop_shipping_pro_contact_form_title_font_family = get_theme_mod('drop_shipping_pro_contact_form_title_font_family');
	$drop_shipping_pro_contact_form_title_font_size = get_theme_mod('drop_shipping_pro_contact_form_title_font_size');
	if($drop_shipping_pro_contact_form_title_color != false || $drop_shipping_pro_contact_form_title_font_family != false || $drop_shipping_pro_contact_form_title_font_size != false){
		$custom_css .='#contact .contact-shortcode .section-title h4{';
			if($drop_shipping_pro_contact_form_title_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_contact_form_title_color).' !important;';
			if($drop_shipping_pro_contact_form_title_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_contact_form_title_font_family).' !important;';
			if($drop_shipping_pro_contact_form_title_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_contact_form_title_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_contact_form_input_color = get_theme_mod('drop_shipping_pro_contact_form_input_color');
	$drop_shipping_pro_contact_form_input_font_family = get_theme_mod('drop_shipping_pro_contact_form_input_font_family');
	$drop_shipping_pro_contact_form_input_font_size = get_theme_mod('drop_shipping_pro_contact_form_input_font_size');
	if($drop_shipping_pro_contact_form_input_color != false || $drop_shipping_pro_contact_form_input_font_family != false || $drop_shipping_pro_contact_form_input_font_size != false){
		$custom_css .='.contact-shortcode textarea, .contact-shortcode input[type=text], .contact-shortcode input[type=password], .contact-shortcode input[type=datetime], .contact-shortcode input[type=datetime-local], input[type=date], .contact-shortcode input[type=month], .contact-shortcode input[type=time], .contact-shortcode input[type=week], .contact-shortcode input[type=number], .contact-shortcode input[type=email], .contact-shortcode input[type=url], .contact-shortcode input[type=search], .contact-shortcode input[type=tel], .contact-shortcode input[type=color], .contact-shortcode .uneditable-input{';
			if($drop_shipping_pro_contact_form_input_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_contact_form_input_color).' !important;';
			if($drop_shipping_pro_contact_form_input_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_contact_form_input_font_family).' !important;';
			if($drop_shipping_pro_contact_form_input_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_contact_form_input_font_size).'px !important;';
		$custom_css .='}';
	}


	$drop_shipping_pro_contact_submit_btn_color = get_theme_mod('drop_shipping_pro_contact_submit_btn_color');
	$drop_shipping_pro_contact_submit_btn_font_family = get_theme_mod('drop_shipping_pro_contact_submit_btn_font_family');
	$drop_shipping_pro_contact_submit_btn_font_size = get_theme_mod('drop_shipping_pro_contact_submit_btn_font_size');
	if($drop_shipping_pro_contact_submit_btn_color != false || $drop_shipping_pro_contact_submit_btn_font_family != false || $drop_shipping_pro_contact_submit_btn_font_size != false){
		$custom_css .='#contact input[type=submit]{';
			if($drop_shipping_pro_contact_submit_btn_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_contact_submit_btn_color).' !important;';
			if($drop_shipping_pro_contact_submit_btn_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_contact_submit_btn_font_family).' !important;';
			if($drop_shipping_pro_contact_submit_btn_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_contact_submit_btn_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_contact_submit_btn_bg_color = get_theme_mod('drop_shipping_pro_contact_submit_btn_bg_color');
	if($drop_shipping_pro_contact_submit_btn_bg_color != false){
		$custom_css .='#contact input[type=submit]{
			background-color: '.esc_html($drop_shipping_pro_contact_submit_btn_bg_color).';
		}';
	}

	$drop_shipping_pro_contact_submit_btn_bg_hover_color = get_theme_mod('drop_shipping_pro_contact_submit_btn_bg_hover_color');
	if($drop_shipping_pro_contact_submit_btn_bg_hover_color != false){
		$custom_css .='#contact input[type=submit]:hover{
			background-color: '.esc_html($drop_shipping_pro_contact_submit_btn_bg_hover_color).';
		}';
	}

	/*-------404---------*/

	$drop_shipping_pro_error_title_color = get_theme_mod('drop_shipping_pro_error_title_color');
	$drop_shipping_pro_error_title_font_family = get_theme_mod('drop_shipping_pro_error_title_font_family');
	$drop_shipping_pro_error_title_font_size = get_theme_mod('drop_shipping_pro_error_title_font_size');
	if($drop_shipping_pro_error_title_color != false || $drop_shipping_pro_error_title_font_family != false || $drop_shipping_pro_error_title_font_size != false){
		$custom_css .='#error_page .page-content h2 span{';
			if($drop_shipping_pro_error_title_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_error_title_color).' !important;';
			if($drop_shipping_pro_error_title_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_error_title_font_family).' !important;';
			if($drop_shipping_pro_error_title_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_error_title_font_size).'px !important;';
		$custom_css .='}';
	}


	$drop_shipping_pro_error_small_title_color = get_theme_mod('drop_shipping_pro_error_small_title_color');
	$drop_shipping_pro_error_small_title_font_family = get_theme_mod('drop_shipping_pro_error_small_title_font_family');
	$drop_shipping_pro_error_small_title_font_size = get_theme_mod('drop_shipping_pro_error_small_title_font_size');
	if($drop_shipping_pro_error_small_title_color != false || $drop_shipping_pro_error_small_title_font_family != false || $drop_shipping_pro_error_small_title_font_size != false){
		$custom_css .='#error_page .page-content h4{';
			if($drop_shipping_pro_error_small_title_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_error_small_title_color).' !important;';
			if($drop_shipping_pro_error_small_title_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_error_small_title_font_family).' !important;';
			if($drop_shipping_pro_error_small_title_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_error_small_title_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_error_text_color = get_theme_mod('drop_shipping_pro_error_text_color');
	$drop_shipping_pro_error_text_font_family = get_theme_mod('drop_shipping_pro_error_text_font_family');
	$drop_shipping_pro_error_text_font_size = get_theme_mod('drop_shipping_pro_error_text_font_size');
	if($drop_shipping_pro_error_text_color != false || $drop_shipping_pro_error_text_font_family != false || $drop_shipping_pro_error_text_font_size != false){
		$custom_css .='#error_page .page-content h6{';
			if($drop_shipping_pro_error_text_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_error_text_color).' !important;';
			if($drop_shipping_pro_error_text_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_error_text_font_family).' !important;';
			if($drop_shipping_pro_error_text_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_error_text_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_error_btn_color = get_theme_mod('drop_shipping_pro_error_btn_color');
	$drop_shipping_pro_error_btn_font_family = get_theme_mod('drop_shipping_pro_error_btn_font_family');
	$drop_shipping_pro_error_btn_font_size = get_theme_mod('drop_shipping_pro_error_btn_font_size');
	$drop_shipping_pro_error_btn_bg_color = get_theme_mod('drop_shipping_pro_error_btn_bg_color');
	if($drop_shipping_pro_error_btn_color != false || $drop_shipping_pro_error_btn_font_family != false || $drop_shipping_pro_error_btn_font_size != false || $drop_shipping_pro_error_btn_bg_color != false){
		$custom_css .='.error-box a{';
			if($drop_shipping_pro_error_btn_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_error_btn_color).' !important;';
			if($drop_shipping_pro_error_btn_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_error_btn_font_family).' !important;';
			if($drop_shipping_pro_error_btn_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_error_btn_font_size).'px !important;';
			if($drop_shipping_pro_error_btn_bg_color != false)
				$custom_css .='background-color:'.esc_html($drop_shipping_pro_error_btn_bg_color).'!important;';
		$custom_css .='}';
	}

	/*----------___Faq--------------------*/
	$drop_shipping_pro_faq_title_color = get_theme_mod('drop_shipping_pro_faq_title_color');
	$drop_shipping_pro_faq_title_font_family = get_theme_mod('drop_shipping_pro_faq_title_font_family');
	$drop_shipping_pro_faq_title_font_size = get_theme_mod('drop_shipping_pro_faq_title_font_size');
	if($drop_shipping_pro_faq_title_color != false || $drop_shipping_pro_faq_title_font_family != false || $drop_shipping_pro_faq_title_font_size != false){
		$custom_css .='#faq .section-title h3{';
			if($drop_shipping_pro_faq_title_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_faq_title_color).' !important;';
			if($drop_shipping_pro_faq_title_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_faq_title_font_family).' !important;';
			if($drop_shipping_pro_faq_title_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_faq_title_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_faq_que_color = get_theme_mod('drop_shipping_pro_faq_que_color');
	$drop_shipping_pro_faq_que_font_family = get_theme_mod('drop_shipping_pro_faq_que_font_family');
	$drop_shipping_pro_faq_que_font_size = get_theme_mod('drop_shipping_pro_faq_que_font_size');
	if($drop_shipping_pro_faq_que_color != false || $drop_shipping_pro_faq_que_font_family != false || $drop_shipping_pro_faq_que_font_size != false){
		$custom_css .='.faq-main-box .accordion-button{';
			if($drop_shipping_pro_faq_que_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_faq_que_color).' !important;';
			if($drop_shipping_pro_faq_que_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_faq_que_font_family).' !important;';
			if($drop_shipping_pro_faq_que_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_faq_que_font_size).'px !important;';
		$custom_css .='}';
	}

	$drop_shipping_pro_faq_ans_color = get_theme_mod('drop_shipping_pro_faq_ans_color');
	$drop_shipping_pro_faq_ans_font_family = get_theme_mod('drop_shipping_pro_faq_ans_font_family');
	$drop_shipping_pro_faq_ans_font_size = get_theme_mod('drop_shipping_pro_faq_ans_font_size');
	if($drop_shipping_pro_faq_ans_color != false || $drop_shipping_pro_faq_ans_font_family != false || $drop_shipping_pro_faq_ans_font_size != false){
		$custom_css .='.faq-main-box .accordion-body{';
			if($drop_shipping_pro_faq_ans_color != false)
				$custom_css .='color: '.esc_html($drop_shipping_pro_faq_ans_color).' !important;';
			if($drop_shipping_pro_faq_ans_font_family != false)
				$custom_css .='font-family:'.esc_html($drop_shipping_pro_faq_ans_font_family).' !important;';
			if($drop_shipping_pro_faq_ans_font_size != false)
				$custom_css .='font-size:'.esc_html($drop_shipping_pro_faq_ans_font_size).'px !important;';
		$custom_css .='}';
	}

	/*-------- Section Reordering ---------*/

	$drop_shipping_pro_feature_top_bottom_padding = get_theme_mod('drop_shipping_pro_feature_top_bottom_padding');
	if($drop_shipping_pro_feature_top_bottom_padding != false){
		$custom_css .='#feature-block{
		padding-top: '.esc_html($drop_shipping_pro_feature_top_bottom_padding).'px!important;
		padding-bottom: '.esc_html($drop_shipping_pro_feature_top_bottom_padding).'px!important;
		}';
	}

	$drop_shipping_pro_our_product_top_bottom_padding = get_theme_mod('drop_shipping_pro_our_product_top_bottom_padding');
	if($drop_shipping_pro_our_product_top_bottom_padding != false){
		$custom_css .='#our-products{
		padding-top: '.esc_html($drop_shipping_pro_our_product_top_bottom_padding).'px!important;
		padding-bottom: '.esc_html($drop_shipping_pro_our_product_top_bottom_padding).'px!important;
		}';
	}

	$drop_shipping_pro_main_category_top_bottom_padding = get_theme_mod('drop_shipping_pro_main_category_top_bottom_padding');
	if($drop_shipping_pro_main_category_top_bottom_padding != false){
		$custom_css .='#main-category{
		padding-top: '.esc_html($drop_shipping_pro_main_category_top_bottom_padding).'px!important;
		padding-bottom: '.esc_html($drop_shipping_pro_main_category_top_bottom_padding).'px!important;
		}';
	}

	$drop_shipping_pro_product_banner1_top_bottom_padding = get_theme_mod('drop_shipping_pro_product_banner1_top_bottom_padding');
	if($drop_shipping_pro_product_banner1_top_bottom_padding != false){
		$custom_css .='#product-banner1{
		padding-top: '.esc_html($drop_shipping_pro_product_banner1_top_bottom_padding).'px!important;
		padding-bottom: '.esc_html($drop_shipping_pro_product_banner1_top_bottom_padding).'px!important;
		}';
	}

	$drop_shipping_pro_product_category_top_bottom_padding = get_theme_mod('drop_shipping_pro_product_category_top_bottom_padding');
	if($drop_shipping_pro_product_category_top_bottom_padding != false){
		$custom_css .='#product-category{
		padding-top: '.esc_html($drop_shipping_pro_product_category_top_bottom_padding).'px!important;
		padding-bottom: '.esc_html($drop_shipping_pro_product_category_top_bottom_padding).'px!important;
		}';
	}

	$drop_shipping_pro_deals_top_bottom_padding = get_theme_mod('drop_shipping_pro_deals_top_bottom_padding');
	if($drop_shipping_pro_deals_top_bottom_padding != false){
		$custom_css .='#deals{
		padding-top: '.esc_html($drop_shipping_pro_deals_top_bottom_padding).'px!important;
		padding-bottom: '.esc_html($drop_shipping_pro_deals_top_bottom_padding).'px!important;
		}';
	}

	$drop_shipping_pro_new_arrival_top_bottom_padding = get_theme_mod('drop_shipping_pro_new_arrival_top_bottom_padding');
	if($drop_shipping_pro_new_arrival_top_bottom_padding != false){
		$custom_css .='#new-arrival{
		padding-top: '.esc_html($drop_shipping_pro_new_arrival_top_bottom_padding).'px!important;
		padding-bottom: '.esc_html($drop_shipping_pro_new_arrival_top_bottom_padding).'px!important;
		}';
	}

	$drop_shipping_pro_featured_blog_top_bottom_padding = get_theme_mod('drop_shipping_pro_featured_blog_top_bottom_padding');
	if($drop_shipping_pro_featured_blog_top_bottom_padding != false){
		$custom_css .='#featured-blog{
		padding-top: '.esc_html($drop_shipping_pro_featured_blog_top_bottom_padding).'px!important;
		padding-bottom: '.esc_html($drop_shipping_pro_featured_blog_top_bottom_padding).'px!important;
		}';
	}

	$drop_shipping_pro_popular_brand_top_bottom_padding = get_theme_mod('drop_shipping_pro_popular_brand_top_bottom_padding');
	if($drop_shipping_pro_popular_brand_top_bottom_padding != false){
		$custom_css .='#popular-brand{
		padding-top: '.esc_html($drop_shipping_pro_popular_brand_top_bottom_padding).'px!important;
		padding-bottom: '.esc_html($drop_shipping_pro_popular_brand_top_bottom_padding).'px!important;
		}';
	}

	$drop_shipping_pro_product_banner2_top_bottom_padding = get_theme_mod('drop_shipping_pro_product_banner2_top_bottom_padding');
	if($drop_shipping_pro_product_banner2_top_bottom_padding != false){
		$custom_css .='#product-banner2{
		padding-top: '.esc_html($drop_shipping_pro_product_banner2_top_bottom_padding).'px!important;
		padding-bottom: '.esc_html($drop_shipping_pro_product_banner2_top_bottom_padding).'px!important;
		}';
	}