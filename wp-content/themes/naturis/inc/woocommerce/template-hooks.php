<?php
/**
 * =================================================
 * Hook naturis_page
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_single_post_top
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_single_post
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_single_post_bottom
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_loop_post
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_footer
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_after_footer
 * =================================================
 */
add_action('naturis_after_footer', 'naturis_sticky_single_add_to_cart', 999);

/**
 * =================================================
 * Hook wp_footer
 * =================================================
 */
add_action('wp_footer', 'naturis_render_woocommerce_shop_canvas', 1);

/**
 * =================================================
 * Hook wp_head
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_before_header
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_before_content
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_content_top
 * =================================================
 */
add_action('naturis_content_top', 'naturis_shop_messages', 10);

/**
 * =================================================
 * Hook naturis_post_content_before
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_post_content_after
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_sidebar
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_loop_after
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_page_after
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_woocommerce_before_shop_loop_item
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_woocommerce_before_shop_loop_item_title
 * =================================================
 */
add_action('naturis_woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action('naturis_woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 15);

/**
 * =================================================
 * Hook naturis_woocommerce_shop_loop_item_title
 * =================================================
 */
add_action('naturis_woocommerce_shop_loop_item_title', 'naturis_woocommerce_get_product_category', 5);
add_action('naturis_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 5);

/**
 * =================================================
 * Hook naturis_woocommerce_after_shop_loop_item_title
 * =================================================
 */
add_action('naturis_woocommerce_after_shop_loop_item_title', 'naturis_woocommerce_get_product_description', 15);
add_action('naturis_woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 20);
add_action('naturis_woocommerce_after_shop_loop_item_title', 'naturis_woocommerce_group_action', 25);

/**
 * =================================================
 * Hook naturis_woocommerce_after_shop_loop_item
 * =================================================
 */
