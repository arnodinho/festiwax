<?php
if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('Naturis_Customize')) {

    class  Naturis_Customize {


        public function __construct() {
            add_action('customize_register', array($this, 'customize_register'));
        }

        /**
         * @param $wp_customize WP_Customize_Manager
         */
        public function customize_register($wp_customize) {

            /**
             * Theme options.
             */
            require_once get_theme_file_path('inc/customize-control/editor.php');
            $this->init_naturis_blog($wp_customize);

            $this->init_naturis_social($wp_customize);

            if (naturis_is_woocommerce_activated()) {
                $this->init_woocommerce($wp_customize);
            }

            do_action('naturis_customize_register', $wp_customize);
        }


        /**
         * @param $wp_customize WP_Customize_Manager
         *
         * @return void
         */
        public function init_naturis_blog($wp_customize) {

            $wp_customize->add_section('naturis_blog_archive', array(
                'title' => esc_html__('Blog', 'naturis'),
            ));

            // =========================================
            // Select Style
            // =========================================

            $wp_customize->add_setting('naturis_options_blog_style', array(
                'type'              => 'option',
                'default'           => 'standard',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_blog_style', array(
                'section' => 'naturis_blog_archive',
                'label'   => esc_html__('Blog style', 'naturis'),
                'type'    => 'select',
                'choices' => array(
                    'standard' => esc_html__('Blog Standard', 'naturis'),
                    //====start_premium
                    'grid'  => esc_html__('Blog Grid', 'naturis'),
                    'list'     => esc_html__('Blog List', 'naturis'),
                    //====end_premium
                ),
            ));

            $wp_customize->add_setting('naturis_options_blog_columns', array(
                'type'              => 'option',
                'default'           => 1,
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_blog_columns', array(
                'section' => 'naturis_blog_archive',
                'label'   => esc_html__('Colunms', 'naturis'),
                'type'    => 'select',
                'choices' => array(
                    1 => esc_html__('1', 'naturis'),
                    2 => esc_html__('2', 'naturis'),
                    3 => esc_html__('3', 'naturis'),
                    4 => esc_html__('4', 'naturis'),
                ),
            ));
        }

        /**
         * @param $wp_customize WP_Customize_Manager
         *
         * @return void
         */
        public function init_naturis_social($wp_customize) {

            $wp_customize->add_section('naturis_social', array(
                'title' => esc_html__('Socials', 'naturis'),
            ));
            $wp_customize->add_setting('naturis_options_social_share', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_social_share', array(
                'type'    => 'checkbox',
                'section' => 'naturis_social',
                'label'   => esc_html__('Show Social Share', 'naturis'),
            ));
            $wp_customize->add_setting('naturis_options_social_share_facebook', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_social_share_facebook', array(
                'type'    => 'checkbox',
                'section' => 'naturis_social',
                'label'   => esc_html__('Share on Facebook', 'naturis'),
            ));
            $wp_customize->add_setting('naturis_options_social_share_twitter', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_social_share_twitter', array(
                'type'    => 'checkbox',
                'section' => 'naturis_social',
                'label'   => esc_html__('Share on Twitter', 'naturis'),
            ));
            $wp_customize->add_setting('naturis_options_social_share_linkedin', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_social_share_linkedin', array(
                'type'    => 'checkbox',
                'section' => 'naturis_social',
                'label'   => esc_html__('Share on Linkedin', 'naturis'),
            ));
            $wp_customize->add_setting('naturis_options_social_share_google-plus', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_social_share_google-plus', array(
                'type'    => 'checkbox',
                'section' => 'naturis_social',
                'label'   => esc_html__('Share on Google+', 'naturis'),
            ));

            $wp_customize->add_setting('naturis_options_social_share_pinterest', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_social_share_pinterest', array(
                'type'    => 'checkbox',
                'section' => 'naturis_social',
                'label'   => esc_html__('Share on Pinterest', 'naturis'),
            ));
            $wp_customize->add_setting('naturis_options_social_share_email', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_social_share_email', array(
                'type'    => 'checkbox',
                'section' => 'naturis_social',
                'label'   => esc_html__('Share on Email', 'naturis'),
            ));
        }

        /**
         * @param $wp_customize WP_Customize_Manager
         *
         * @return void
         */
        public function init_woocommerce($wp_customize) {

            $wp_customize->add_panel('woocommerce', array(
                'title' => esc_html__('Woocommerce', 'naturis'),
            ));

            $wp_customize->add_section('naturis_woocommerce_archive', array(
                'title'      => esc_html__('Archive', 'naturis'),
                'capability' => 'edit_theme_options',
                'panel'      => 'woocommerce',
                'priority'   => 1,
            ));

            $wp_customize->add_setting('naturis_options_woocommerce_archive_layout', array(
                'type'              => 'option',
                'default'           => 'default',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_woocommerce_archive_layout', array(
                'section' => 'naturis_woocommerce_archive',
                'label'   => esc_html__('Layout Style', 'naturis'),
                'type'    => 'select',
                'choices' => array(
                    'default'   => esc_html__('Sidebar', 'naturis'),
                    'canvas'    => esc_html__('Canvas Filter', 'naturis'),
                    'dropdown'  => esc_html__('Dropdown Filter', 'naturis'),
                    'fullwidth' => esc_html__('Full Width', 'naturis'),
                ),
            ));

            $wp_customize->add_setting('naturis_options_woocommerce_archive_sidebar', array(
                'type'              => 'option',
                'default'           => 'left',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_woocommerce_archive_sidebar', array(
                'section' => 'naturis_woocommerce_archive',
                'label'   => esc_html__('Sidebar Position', 'naturis'),
                'type'    => 'select',
                'choices' => array(
                    'left'  => esc_html__('Left', 'naturis'),
                    'right' => esc_html__('Right', 'naturis'),

                ),
            ));

            // =========================================
            // Single Product
            // =========================================

            $wp_customize->add_section('naturis_woocommerce_single', array(
                'title'      => esc_html__('Single Product', 'naturis'),
                'capability' => 'edit_theme_options',
                'panel'      => 'woocommerce',
            ));

            $wp_customize->add_setting('naturis_options_single_product_gallery_layout', array(
                'type'              => 'option',
                'default'           => 'horizontal',
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control('naturis_options_single_product_gallery_layout', array(
                'section' => 'naturis_woocommerce_single',
                'label'   => esc_html__('Style', 'naturis'),
                'type'    => 'select',
                'choices' => array(
                    'horizontal' => esc_html__('Horizontal', 'naturis'),
                    //====start_premium
                    'vertical'   => esc_html__('Vertical', 'naturis'),
                    'gallery'    => esc_html__('Gallery', 'naturis'),
                    'sticky'     => esc_html__('Sticky', 'naturis'),
                    //====end_premium
                ),
            ));


            // =========================================
            // Product
            // =========================================

            $wp_customize->add_section('naturis_woocommerce_product', array(
                'title'      => esc_html__('Product Block', 'naturis'),
                'capability' => 'edit_theme_options',
                'panel'      => 'woocommerce',
            ));

            $wp_customize->add_setting('naturis_options_wocommerce_block_style', array(
                'type'              => 'option',
                'default'           => '1',
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control('naturis_options_wocommerce_block_style', array(
                'section' => 'naturis_woocommerce_product',
                'label'   => esc_html__('Style', 'naturis'),
                'type'    => 'select',
                'choices' => array(
                    '1' => esc_html__('Style 1', 'naturis')
                ),
            ));

            $wp_customize->add_setting('naturis_options_woocommerce_product_hover', array(
                'type'              => 'option',
                'default'           => 'none',
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control('naturis_options_woocommerce_product_hover', array(
                'section' => 'naturis_woocommerce_product',
                'label'   => esc_html__('Animation Image Hover', 'naturis'),
                'type'    => 'select',
                'choices' => array(
                    'none'          => esc_html__('None', 'naturis'),
                    'bottom-to-top' => esc_html__('Bottom to Top', 'naturis'),
                    'top-to-bottom' => esc_html__('Top to Bottom', 'naturis'),
                    'right-to-left' => esc_html__('Right to Left', 'naturis'),
                    'left-to-right' => esc_html__('Left to Right', 'naturis'),
                    'swap'          => esc_html__('Swap', 'naturis'),
                    'fade'          => esc_html__('Fade', 'naturis'),
                    'zoom-in'       => esc_html__('Zoom In', 'naturis'),
                    'zoom-out'      => esc_html__('Zoom Out', 'naturis'),
                ),
            ));

            $wp_customize->add_setting('naturis_options_wocommerce_row_laptop', array(
                'type'              => 'option',
                'default'           => 3,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_wocommerce_row_laptop', array(
                'section' => 'woocommerce_product_catalog',
                'label'   => esc_html__('Products per row Laptop', 'naturis'),
                'type'    => 'number',
            ));

            $wp_customize->add_setting('naturis_options_wocommerce_row_tablet', array(
                'type'              => 'option',
                'default'           => 2,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_wocommerce_row_tablet', array(
                'section' => 'woocommerce_product_catalog',
                'label'   => esc_html__('Products per row tablet', 'naturis'),
                'type'    => 'number',
            ));

            $wp_customize->add_setting('naturis_options_wocommerce_row_mobile', array(
                'type'              => 'option',
                'default'           => 1,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('naturis_options_wocommerce_row_mobile', array(
                'section' => 'woocommerce_product_catalog',
                'label'   => esc_html__('Products per row mobile', 'naturis'),
                'type'    => 'number',
            ));
        }
    }
}
return new Naturis_Customize();
