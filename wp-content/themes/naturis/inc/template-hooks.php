<?php
/**
 * =================================================
 * Hook naturis_page
 * =================================================
 */
add_action('naturis_page', 'naturis_page_header', 10);
add_action('naturis_page', 'naturis_page_content', 20);

/**
 * =================================================
 * Hook naturis_single_post_top
 * =================================================
 */
add_action('naturis_single_post_top', 'naturis_post_thumbnail', 10);

/**
 * =================================================
 * Hook naturis_single_post
 * =================================================
 */
add_action('naturis_single_post', 'naturis_post_header', 10);
add_action('naturis_single_post', 'naturis_post_content', 30);

/**
 * =================================================
 * Hook naturis_single_post_bottom
 * =================================================
 */
add_action('naturis_single_post_bottom', 'naturis_post_taxonomy', 5);
add_action('naturis_single_post_bottom', 'naturis_post_nav', 10);
add_action('naturis_single_post_bottom', 'naturis_display_comments', 20);

/**
 * =================================================
 * Hook naturis_loop_post
 * =================================================
 */
add_action('naturis_loop_post', 'naturis_post_header', 15);
add_action('naturis_loop_post', 'naturis_post_content', 30);

/**
 * =================================================
 * Hook naturis_footer
 * =================================================
 */
add_action('naturis_footer', 'naturis_footer_default', 20);

/**
 * =================================================
 * Hook naturis_after_footer
 * =================================================
 */

/**
 * =================================================
 * Hook wp_footer
 * =================================================
 */
add_action('wp_footer', 'naturis_template_account_dropdown', 1);
add_action('wp_footer', 'naturis_mobile_nav', 1);

/**
 * =================================================
 * Hook wp_head
 * =================================================
 */
add_action('wp_head', 'naturis_pingback_header', 1);

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
add_action('naturis_sidebar', 'naturis_get_sidebar', 10);

/**
 * =================================================
 * Hook naturis_loop_after
 * =================================================
 */
add_action('naturis_loop_after', 'naturis_paging_nav', 10);

/**
 * =================================================
 * Hook naturis_page_after
 * =================================================
 */
add_action('naturis_page_after', 'naturis_display_comments', 10);

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

/**
 * =================================================
 * Hook naturis_woocommerce_shop_loop_item_title
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_woocommerce_after_shop_loop_item_title
 * =================================================
 */

/**
 * =================================================
 * Hook naturis_woocommerce_after_shop_loop_item
 * =================================================
 */
