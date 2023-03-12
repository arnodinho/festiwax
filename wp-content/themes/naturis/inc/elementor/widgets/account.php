<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;

class Naturis_Elementor_Account extends Elementor\Widget_Base {

    public function get_name() {
        return 'naturis-account';
    }

    public function get_title() {
        return esc_html__( 'Naturis Account', 'naturis' );
    }

    public function get_icon() {
        return 'eicon-lock-user';
    }

    public function get_categories() {
        return array( 'naturis-addons' );
    }

    protected function register_controls() {

        $this->start_controls_section(
            'header-group-style',
            [
                'label' => esc_html__( 'Icon', 'naturis' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Color', 'naturis' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-header-account .header-group-action > div a:not(:hover) i:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-header-account .header-group-action > div a:not(:hover):before'   => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color_hover',
            [
                'label'     => esc_html__( 'Color Hover', 'naturis' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-header-account .header-group-action > div a:hover i:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-header-account .header-group-action > div a:hover:before'   => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label'     => esc_html__( 'Font Size', 'naturis' ),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-header-account .header-group-action > div a i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute( 'wrapper', 'class', 'elementor-header-account' );
        ?>
        <div <?php echo naturis_elementor_get_render_attribute_string( 'wrapper', $this ); ?>>
            <div class="header-group-action">
                <?php naturis_header_account(); ?>
            </div>
        </div>
        <?php
    }
}

$widgets_manager->register( new Naturis_Elementor_Account() );
