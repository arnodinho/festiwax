<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!naturis_is_woocommerce_activated()) {
    return;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class Naturis_Elementor_Breadcrumb extends Elementor\Widget_Base
{

    public function get_name()
    {
        return 'woocommerce-breadcrumb';
    }

    public function get_title()
    {
        return esc_html__('naturis WooCommerce Breadcrumbs', 'naturis');
    }

    public function get_icon()
    {
        return 'eicon-product-breadcrumbs';
    }

    public function get_categories()
    {
        return ['woocommerce-elements', 'woocommerce-elements-single'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_product_rating_style',
            [
                'label' => esc_html__('Style Breadcrumb', 'naturis'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'wc_style_warning',
            [
                'type' => Controls_Manager::RAW_HTML,
                'raw' => esc_html__('The style of this widget is often affected by your theme and plugins. If you experience any such issue, try to switch to a basic theme and deactivate related plugins.', 'naturis'),
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => esc_html__('Text Color', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-breadcrumb' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'link_color',
            [
                'label' => esc_html__('Link Color', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-breadcrumb > a:not(:hover)' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography Link', 'naturis'),
                'name' => 'text_link_typography',
                'selector' => '{{WRAPPER}} .woocommerce-breadcrumb a',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography Text', 'naturis'),
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .woocommerce-breadcrumb',
            ]
        );
        $this->add_control(
            'display_Breadcrumb',
            [
                'label' => esc_html__('Hidden Breadcrumb', 'naturis'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'prefix_class' => 'woocommerce-breadcrumb-hidden-'
            ]
        );
        $this->add_responsive_control(
            'alignment',
            [
                'label' => esc_html__('Alignment', 'naturis'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'naturis'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'naturis'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'naturis'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .woocommerce-breadcrumb' => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .naturis-woocommerce-title' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_product_rating_style_title',
            [
                'label' => esc_html__('Style Title', 'naturis'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color_title',
            [
                'label' => esc_html__('Title Color', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .naturis-woocommerce-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .naturis-woocommerce-title',
            ]
        );

        $this->add_control(
            'display_title',
            [
                'label' => esc_html__('Hidden Title', 'naturis'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'prefix_class' => 'hidden-naturis-title-'
            ]
        );

        $this->add_control(
            'display_title_single',
            [
                'label' => esc_html__('Hidden Title Single', 'naturis'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'prefix_class' => 'hidden-naturis-title-single-'
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'naturis'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .naturis-woocommerce-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $args = apply_filters(
            'woocommerce_breadcrumb_defaults',
            array(
                'delimiter' => '<span class="icon">/</span>',
                'wrap_before' => '<nav class="woocommerce-breadcrumb">',
                'wrap_after' => '</nav>',
                'before' => '',
                'after' => '',
                'home' => _x('Home Page', 'breadcrumb', 'naturis'),
            )
        );
        $breadcrumbs = new WC_Breadcrumb();
        if (!empty($args['home'])) {
            $breadcrumbs->add_crumb($args['home'], apply_filters('woocommerce_breadcrumb_home_url', home_url()));
        }
        $args['breadcrumb'] = $breadcrumbs->generate();

        /**
         * WooCommerce Breadcrumb hook
         *
         * @see WC_Structured_Data::generate_breadcrumblist_data() - 10
         */
        do_action('woocommerce_breadcrumb', $breadcrumbs, $args);

        printf('<div class="naturis-woocommerce-title">%s</div>', end($args['breadcrumb'])[0]);

        wc_get_template('global/breadcrumb.php', $args);
    }

    public function render_plain_content()
    {
    }
}

$widgets_manager->register(new Naturis_Elementor_Breadcrumb());
