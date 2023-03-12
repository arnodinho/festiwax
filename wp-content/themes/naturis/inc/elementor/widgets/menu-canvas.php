<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

class Naturis_Elementor__Menu_Canvas extends Elementor\Widget_Base {

    public function get_name() {
        return 'naturis-menu-canvas';
    }

    public function get_title() {
        return esc_html__('naturis Menu Canvas', 'naturis');
    }

    public function get_icon() {
        return 'eicon-nav-menu';
    }

    public function get_categories() {
        return ['opal-addons'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'icon-menu_style',
            [
                'label' => esc_html__('Icon', 'naturis'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'layout_style',
            [
                'label'        => esc_html__('Layout Style', 'naturis'),
                'type'         => Controls_Manager::SELECT,
                'options'      => [
                    'layout-1' => esc_html__('Layout 1', 'naturis'),
                    'layout-2' => esc_html__('Layout 2', 'naturis'),
                ],
                'default'      => 'layout-2',
                'prefix_class' => 'naturis-canvas-menu-',
            ]
        );

//        $this->add_responsive_control(
//            'icon_menu_size',
//            [
//                'label'     => esc_html__( 'Size Icon', 'naturis' ),
//                'type'      => Controls_Manager::SLIDER,
//                'range'     => [
//                    'px' => [
//                        'min' => 6,
//                        'max' => 300,
//                    ],
//                ],
//                'selectors' => [
//                    '{{WRAPPER}} .menu-mobile-nav-button i' => 'font-size: {{SIZE}}{{UNIT}};',
//                ],
//            ]
//        );

        $this->start_controls_tabs( 'color_tabs' );

        $this->start_controls_tab( 'colors_normal',
            [
                'label' => esc_html__( 'Normal', 'naturis' ),
            ]
        );

        $this->add_control(
            'menu_color',
            [
                'label'     => esc_html__('Color', 'naturis'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .menu-mobile-nav-button .naturis-icon > span'             => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .menu-mobile-nav-button:not(:hover) .screen-reader-text' => 'color: {{VALUE}};',
                ],
            ]
        );

//        $this->add_control(
//            'background_color',
//            [
//                'label'     => esc_html__('Background Color', 'naturis'),
//                'type'      => Controls_Manager::COLOR,
//                'default'   => '',
//                'selectors' => [
//                    '{{WRAPPER}} .menu-mobile-nav-button .naturis-icon'  => 'background-color: {{VALUE}};',
//                ],
//            ]
//        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'colors_hover',
            [
                'label' => esc_html__( 'Hover', 'naturis' ),
            ]
        );

        $this->add_control(
            '_menu_color_hover',
            [
                'label'     => esc_html__('Color', 'naturis'),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .menu-mobile-nav-button:hover .naturis-icon > span'             => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .menu-mobile-nav-button:hover .screen-reader-text' => 'color: {{VALUE}};',
                ],
            ]
        );

//        $this->add_control(
//            'background_color_hover',
//            [
//                'label'     => esc_html__('Background Color', 'naturis'),
//                'type'      => Controls_Manager::COLOR,
//                'default'   => '',
//                'selectors' => [
//                    '{{WRAPPER}} .menu-mobile-nav-button .naturis-icon:hover'  => 'background-color: {{VALUE}};',
//                ],
//            ]
//        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('wrapper', 'class', 'elementor-canvas-menu-wrapper');
        ?>
        <div <?php echo naturis_elementor_get_render_attribute_string('wrapper', $this); ?>>
            <?php naturis_mobile_nav_button(); ?>
        </div>
        <?php
    }

}

$widgets_manager->register(new Naturis_Elementor__Menu_Canvas());
