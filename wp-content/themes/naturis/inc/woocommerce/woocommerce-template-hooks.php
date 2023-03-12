<?php
/**
 * naturis WooCommerce hooks
 *
 * @package naturis
 */

/**
 * Layout
 *
 * @see  naturis_before_content()
 * @see  naturis_after_content()
 * @see  woocommerce_breadcrumb()
 * @see  naturis_shop_messages()
 */

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_action('woocommerce_before_main_content', 'naturis_before_content', 10);
add_action('woocommerce_after_main_content', 'naturis_after_content', 10);

add_action('woocommerce_before_shop_loop', 'naturis_sorting_wrapper', 19);
add_action('woocommerce_before_shop_loop', 'naturis_button_shop_canvas', 19);
add_action('woocommerce_before_shop_loop', 'naturis_button_shop_dropdown', 19);
add_action('woocommerce_before_shop_loop', 'naturis_button_grid_list_layout', 25);
add_action('woocommerce_before_shop_loop', 'naturis_sorting_wrapper_close', 40);
if (naturis_get_theme_option('woocommerce_archive_layout') == 'dropdown') {
    add_action('woocommerce_before_shop_loop', 'naturis_render_woocommerce_shop_dropdown', 35);
}

//Position label onsale
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
add_action('naturis_single_product_video_360', 'woocommerce_show_product_sale_flash', 30);

//Wrapper content single
add_action('woocommerce_before_single_product_summary', 'naturis_woocommerce_single_content_wrapper_start', 0);
add_action('woocommerce_single_product_summary', 'naturis_woocommerce_single_content_wrapper_end', 99);
// Legacy WooCommerce columns filter.
if (defined('WC_VERSION') && version_compare(WC_VERSION, '3.3', '<')) {
    add_filter('loop_shop_columns', 'naturis_loop_columns');
    add_action('woocommerce_before_shop_loop', 'naturis_product_columns_wrapper', 40);
    add_action('woocommerce_after_shop_loop', 'naturis_product_columns_wrapper_close', 40);
}

/**
 * Products
 *
 * @see naturis_upsell_display()
 * @see naturis_single_product_pagination()
 */


remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);

remove_action('woocommerce_single_product_summary', 'wooscp_add_button');
add_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 21);

add_action('woocommerce_single_product_summary', 'naturis_stock_label', 1);
add_action('woocommerce_single_product_summary', 'naturis_woocommerce_deal_progress', 25);
add_action('woocommerce_single_product_summary', 'naturis_woocommerce_time_sale', 26);

add_filter('woosc_button_position_single', '__return_false');
add_filter('woosw_button_position_single', '__return_false');

add_action('woocommerce_single_product_summary', 'naturis_wishlist_button', 31);
add_action('woocommerce_single_product_summary', 'naturis_compare_button', 32);

add_action('woocommerce_share', 'naturis_social_share', 10);

$product_single_style = naturis_get_theme_option('single_product_gallery_layout', 'horizontal');

add_theme_support('wc-product-gallery-lightbox');

if ($product_single_style === 'horizontal' || $product_single_style === 'vertical') {
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-slider');
}

if ($product_single_style === 'gallery'){
    add_filter('woocommerce_single_product_image_thumbnail_html', 'naturis_woocommerce_single_product_image_thumbnail_html', 10, 2);
}

if ($product_single_style === 'sticky'){
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
    add_action('woocommerce_single_product_summary', 'naturis_output_product_data_accordion', 70);
    add_filter('woocommerce_single_product_image_thumbnail_html', 'naturis_woocommerce_single_product_image_thumbnail_html', 10, 2);
}

add_filter('woocommerce_gallery_thumbnail_size', function () {
    return ['120', '120'];
}, 10);

add_action('naturis_single_product_video_360', 'naturis_single_product_video_360', 10);


/**
 * Cart fragment
 *
 * @see naturis_cart_link_fragment()
 */
if (defined('WC_VERSION') && version_compare(WC_VERSION, '2.3', '>=')) {
    add_filter('woocommerce_add_to_cart_fragments', 'naturis_cart_link_fragment');
} else {
    add_filter('add_to_cart_fragments', 'naturis_cart_link_fragment');
}

remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
add_action('woocommerce_after_cart', 'woocommerce_cross_sell_display');

add_action('woocommerce_checkout_order_review', 'woocommerce_checkout_order_review_start', 5);
add_action('woocommerce_checkout_order_review', 'woocommerce_checkout_order_review_end', 15);

add_filter('woocommerce_get_script_data', function ($params, $handle) {
    if ($handle == "wc-add-to-cart") {
        $params['i18n_view_cart'] = '';
    }
    return $params;
}, 10, 2);

/*
 *
 * Layout Product
 *
 * */

add_filter('woosc_button_position_archive', '__return_false');
add_filter('woosq_button_position', '__return_false');
add_filter('woosw_button_position_archive', '__return_false');

function naturis_include_hooks_product_blocks() {

    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

    add_action('woocommerce_before_shop_loop_item', 'naturis_woocommerce_product_loop_start', -1);
    add_action('woocommerce_shop_loop_item_title', 'naturis_woocommerce_product_caption_start', -1);
    /**
     * Integrations
     *
     * @see naturis_template_loop_product_thumbnail()
     *
     */
    add_action('woocommerce_shop_loop_item_title', 'naturis_woocommerce_product_caption_end', 998);
    add_action('woocommerce_after_shop_loop_item', 'naturis_woocommerce_product_loop_end', 999);

    // product-transition
    add_action('woocommerce_before_shop_loop_item_title', 'naturis_woocommerce_product_loop_image', 10);
    add_action('naturis_woocommerce_product_loop_image', 'woocommerce_show_product_loop_sale_flash', 8);
    add_action('naturis_woocommerce_product_loop_image', 'naturis_woocommerce_get_product_label_stock', 9);
    add_action('naturis_woocommerce_product_loop_image', 'naturis_template_loop_product_thumbnail', 10);
    add_action('naturis_woocommerce_product_loop_image', 'woocommerce_template_loop_product_link_open', 99);
    add_action('naturis_woocommerce_product_loop_image', 'woocommerce_template_loop_product_link_close', 99);
    add_action('naturis_woocommerce_product_loop_image', 'naturis_woocommerce_product_loop_action', 15);

    // QuickView
    add_action('naturis_woocommerce_product_loop_action', 'naturis_quickview_button', 10);

    // Wishlist
    add_action('naturis_woocommerce_product_loop_action', 'naturis_wishlist_button', 30);

    // Compare
    add_action('naturis_woocommerce_product_loop_action', 'naturis_compare_button', 40);

    // categories
    add_action('woocommerce_shop_loop_item_title', 'naturis_woocommerce_get_product_category', 20);

    // price
    add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_price', 30);

    // add to cart
    add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 40);


}

if (isset($_GET['action']) && $_GET['action'] === 'elementor') {
    return;
}

naturis_include_hooks_product_blocks();

