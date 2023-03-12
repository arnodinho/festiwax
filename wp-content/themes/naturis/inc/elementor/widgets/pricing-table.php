<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

class Naturis_Elementor_Price_Table extends Elementor\Widget_Base
{

    public function get_name()
    {
        return 'naturis-price-table';
    }

    public function get_title()
    {
        return esc_html__('Naturis Price Table', 'naturis');
    }

    public function get_categories()
    {
        return array('naturis-addons');
    }

    public function get_icon()
    {
        return 'eicon-price-table';
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_header',
            [
                'label' => esc_html__('Wrap', 'naturis'),
            ]
        );

        $this->add_control(
            'show_ribbon',
            [
                'label' => esc_html__('Show ribbon', 'naturis'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Title', 'naturis'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Pricing Table', 'naturis'),
            ]
        );

        $this->add_control('heading_pricing', [
            'label' => esc_html__('Pricing', 'naturis'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control(
            'price',
            [
                'label' => esc_html__('Price', 'naturis'),
                'type' => Controls_Manager::NUMBER,
                'default' => '29',
            ]
        );

        $this->add_control(
            'price 2nd',
            [
                'label' => esc_html__('Price 2nd', 'naturis'),
                'type' => Controls_Manager::NUMBER,
                'default' => '99',
            ]
        );

        $this->add_control(
            'period',
            [
                'label' => esc_html__('Period', 'naturis'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('per month', 'naturis'),
                'placeholder' => esc_html__('Period ...', 'naturis'),
            ]
        );

        $this->add_control(
            'currency_symbol',
            [
                'label' => esc_html__('Currency Symbol', 'naturis'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('None', 'naturis'),
                    'dollar' => '&#36; ' . _x('Dollar', 'Currency Symbol', 'naturis'),
                    'euro' => '&#128; ' . _x('Euro', 'Currency Symbol', 'naturis'),
                    'baht' => '&#3647; ' . _x('Baht', 'Currency Symbol', 'naturis'),
                    'franc' => '&#8355; ' . _x('Franc', 'Currency Symbol', 'naturis'),
                    'guilder' => '&fnof; ' . _x('Guilder', 'Currency Symbol', 'naturis'),
                    'krona' => 'kr ' . _x('Krona', 'Currency Symbol', 'naturis'),
                    'lira' => '&#8356; ' . _x('Lira', 'Currency Symbol', 'naturis'),
                    'peseta' => '&#8359 ' . _x('Peseta', 'Currency Symbol', 'naturis'),
                    'peso' => '&#8369; ' . _x('Peso', 'Currency Symbol', 'naturis'),
                    'pound' => '&#163; ' . _x('Pound Sterling', 'Currency Symbol', 'naturis'),
                    'real' => 'R$ ' . _x('Real', 'Currency Symbol', 'naturis'),
                    'ruble' => '&#8381; ' . _x('Ruble', 'Currency Symbol', 'naturis'),
                    'rupee' => '&#8360; ' . _x('Rupee', 'Currency Symbol', 'naturis'),
                    'indian_rupee' => '&#8377; ' . _x('Rupee (Indian)', 'Currency Symbol', 'naturis'),
                    'shekel' => '&#8362; ' . _x('Shekel', 'Currency Symbol', 'naturis'),
                    'yen' => '&#165; ' . _x('Yen/Yuan', 'Currency Symbol', 'naturis'),
                    'won' => '&#8361; ' . _x('Won', 'Currency Symbol', 'naturis'),
                    'custom' => esc_html__('Custom', 'naturis'),
                ],
                'default' => 'dollar',
            ]
        );

        $this->add_control(
            'currency_symbol_custom',
            [
                'label' => esc_html__('Custom Symbol', 'naturis'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'currency_symbol' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'currency_format',
            [
                'label' => esc_html__('Currency Format', 'naturis'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => '1,234.56 (Default)',
                    ',' => '1.234,56',
                ],
            ]
        );

        $this->add_control(
            'currency_content',
            [
                'label'       => esc_html__('Content', 'naturis'),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'label_block' => true,
                'rows'        => '5',
            ]
        );

        $this->add_control('heading_button', [
            'label' => esc_html__('Button', 'naturis'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control(
            'button_type',
            [
                'label' => esc_html__('Type', 'naturis'),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__('Default', 'naturis'),
                    'primary' => esc_html__('Primary', 'naturis'),
                    'link' => esc_html__('Link', 'naturis'),
                    'info' => esc_html__('Info', 'naturis'),
                    'success' => esc_html__('Success', 'naturis'),
                    'warning' => esc_html__('Warning', 'naturis'),
                    'danger' => esc_html__('Danger', 'naturis'),
                ],
                'prefix_class' => 'elementor-button-',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'naturis'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Click Here', 'naturis'),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'naturis'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'naturis'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_features',
            [
                'label' => esc_html__('Features', 'naturis'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_text',
            [
                'label' => esc_html__('Text', 'naturis'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('List Item', 'naturis'),
            ]
        );

        $repeater -> add_control(
                'item_icon',
                [
                    'label' => esc_html__('Icon', 'naturis'),
                    'type' => Controls_Manager::ICONS,
                ]
        );

        $this->add_control(
            'features_list',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'item_text' => esc_html__('List Item #1', 'naturis'),
                    ],
                    [
                        'item_text' => esc_html__('List Item #2', 'naturis'),
                    ],
                    [
                        'item_text' => esc_html__('List Item #3', 'naturis'),
                    ],
                ],
                'title_field' => '{{{ item_text }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_wrapper_style',
            [
                'label' => esc_html__('Wrapper', 'naturis'),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'wrapper_price_border',
                'selector' => '{{WRAPPER}} .elementor-price-table',
            ]
        );

        $this->add_control(
            'wrapper_border_radius',
            [
                'label' => esc_html__('Border Radius', 'naturis'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'wrapper_price_boxshadow',
                'selector' => '{{WRAPPER}} .elementor-price-table',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'wrapper_price_background',
                'selector' => '{{WRAPPER}} .elementor-price-table',
            ]
        );

        $this->add_responsive_control(
            'wrapper_padding',
            [
                'label' => esc_html__('Padding', 'naturis'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'price_table_heading_style',
            [
                'label' => esc_html__('Header', 'naturis'),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );

        $this->add_control('price_title_heading', [
            'label' => esc_html__('Heading', 'naturis'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__('Color', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__heading' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'selector' => '{{WRAPPER}} .elementor-price-table__heading',
            ]
        );

        $this->add_control(
            'heading_spacing',
            [
                'label' => esc_html__('Spacing', 'naturis'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__heading' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'wrapper_price_heading_background',
                'selector' => '{{WRAPPER}} .elementor-price-table__heading',
            ]
        );

        $this->add_control('price_price_heading', [
            'label' => esc_html__('Price', 'naturis'),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control(
            'price_color',
            [
                'label' => esc_html__('Color', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__price span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'price_size',
            [
                'label' => esc_html__('Value Size', 'naturis'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__integer-part' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'price_symbol_size',
            [
                'label' => esc_html__('Symbol Size', 'naturis'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__currency' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'price_heading_period',
            [
                'label' => esc_html__('Period', 'naturis'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'price_period_color',
            [
                'label' => esc_html__('Color', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__period' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_period_typo',
                'selector' => '{{WRAPPER}} .elementor-price-table__period',
            ]
        );

        $this->add_control(
            'price_spacing',
            [
                'label' => esc_html__('Spacing', 'naturis'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__period' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'price_heading_content',
            [
                'label' => esc_html__('Content', 'naturis'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'price_content_color',
            [
                'label' => esc_html__('Color', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__content' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_content_typo',
                'selector' => '{{WRAPPER}} .elementor-price-table__content',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'section_features_list_style',
            [
                'label' => esc_html__('Features', 'naturis'),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_list_icon_item_typo',
                'selector' => '{{WRAPPER}} .elementor-price-table__feature-inner',
            ]
        );

        $this->add_control(
            'features_list_color',
            [
                'label' => esc_html__('Color', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__feature-inner ' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'features_list_icon_color',
            [
                'label' => esc_html__('Color', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__feature-inner i' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'features_list_icon_spacing',
            [
                'label' => esc_html__('Item Spacing', 'naturis'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__feature-inner' => 'padding: {{SIZE}}{{UNIT}} 0',
                ],
            ]
        );

        $this->add_control(
            'feature_spacing',
            [
                'label' => esc_html__('Spacing', 'naturis'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__feature-inner' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_button_style',
            [
                'label' => esc_html__('Button', 'naturis'),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
                'condition' => [
                    'button_text!' => '',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .elementor-price-table__button',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .elementor-button',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '.elementor-price-table__button.elementor-button'
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'naturis'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_button_style');

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => esc_html__('Normal', 'naturis'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_background_color',
                'selector' => '{{WRAPPER}} .elementor-price-table__button:not(:hover)',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => esc_html__('Hover', 'naturis'),
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => esc_html__('Text Color', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__button:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-price-table__button:hover:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_background_hover_color',
                'selector' => '{{WRAPPER}} .elementor-price-table__button:hover',
            ]
        );

        $this->add_control(
            'button_hover_animation',
            [
                'label' => esc_html__('Animation', 'naturis'),
                'type' => Controls_Manager::HOVER_ANIMATION,
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'text_padding',
            [
                'label' => esc_html__('Padding', 'naturis'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => esc_html__('Margin', 'naturis'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table__footer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'ribbon_style',
            [
                'label' => esc_html__('Ribbon', 'naturis'),
                'tab' => Controls_Manager::TAB_STYLE,
                'show_label' => false,
                'condition' => [
                    'show_ribbon!' => ''
                ]
            ]
        );

        $this->add_control(
            'ribbon_icon_color',
            [
                'label' => esc_html__('Color', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table_ribbon span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'ribbon_bkg',
            [
                'label' => esc_html__('Background', 'naturis'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-price-table_ribbon:before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }


    private function get_currency_symbol($symbol_name)
    {
        $symbols = [
            'dollar' => '&#36;',
            'euro' => '&#128;',
            'franc' => '&#8355;',
            'pound' => '&#163;',
            'ruble' => '&#8381;',
            'shekel' => '&#8362;',
            'baht' => '&#3647;',
            'yen' => '&#165;',
            'won' => '&#8361;',
            'guilder' => '&fnof;',
            'peso' => '&#8369;',
            'peseta' => '&#8359',
            'lira' => '&#8356;',
            'rupee' => '&#8360;',
            'indian_rupee' => '&#8377;',
            'real' => 'R$',
            'krona' => 'kr',
        ];
        return isset($symbols[$symbol_name]) ? $symbols[$symbol_name] : '';
    }

    protected function render()
    {
        $settings = $this->get_settings();
        $symbol = '';

        $this->add_render_attribute('price_wrapper', 'class', 'elementor-price-table');

        if (!empty($settings['currency_symbol'])) {
            if ('custom' !== $settings['currency_symbol']) {
                $symbol = $this->get_currency_symbol($settings['currency_symbol']);
            } else {
                $symbol = $settings['currency_symbol_custom'];
            }
        }

        $this->add_render_attribute('button_text', 'class', [
            'elementor-price-table__button',
            'elementor-button',
        ]);

        if (!empty($settings['link']['url'])) {
            $this->add_render_attribute('button_text', 'href', $settings['link']['url']);

            if (!empty($settings['link']['is_external'])) {
                $this->add_render_attribute('button_text', 'target', '_blank');
            }
        }

        if (!empty($settings['button_hover_animation'])) {
            $this->add_render_attribute('button_text', 'class', 'elementor-animation-' . $settings['button_hover_animation']);
        }

        $this->add_render_attribute('heading', 'class', 'elementor-price-table__heading');

        $this->add_inline_editing_attributes('heading', 'none');
        $this->add_inline_editing_attributes('description');
        $this->add_inline_editing_attributes('button_text');

        ?>

        <div <?php echo naturis_elementor_get_render_attribute_string('price_wrapper', $this); ?>>
            <?php if ('yes' === $settings['show_ribbon']): ?>
                <div class="elementor-price-table_ribbon">
                    <span><?php echo esc_html__('Most Popular', 'naturis'); ?></span>
                </div>
            <?php endif; ?>
            <div class="elementor-price-table__wrapper-header">
                <?php
                $pricing_number = '';
                if (!empty($settings['price'])) {
                    $pricing_string = (string)$settings['price'];
                    $pricing_array = explode('.', $pricing_string);
                    if (isset($pricing_array[1]) && strlen($pricing_array[1]) < 2) {
                        $decimals = 1;
                    } else {
                        $decimals = 2;
                    }

                    if (count($pricing_array) < 2) {
                        $decimals = 0;
                    }

                    if (empty($settings['currency_format'])) {
                        $dec_point = '.';
                        $thousands_sep = ',';
                    } else {
                        $dec_point = ',';
                        $thousands_sep = '.';
                    }
                    $pricing_number = number_format($settings['price'], $decimals, $dec_point, $thousands_sep);
                }
                ?>


                <?php if ($settings['heading']) : ?>
                    <div class="elementor-price-table__header">
                        <?php if (!empty($settings['heading'])) : ?>
                            <h3 <?php echo naturis_elementor_get_render_attribute_string('heading', $this); ?>><?php echo sprintf('%s', $settings['heading']); ?></h3>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>


                <?php if (!empty($settings['price'])) : ?>
                    <div class="elementor-price-table__price">
                        <div class="price">
                            <?php if (!empty($symbol)) : ?>
                                <span class="elementor-price-table__currency"><?php echo esc_html($symbol); ?></span>
                            <?php endif; ?>
                            <span class="elementor-price-table__integer-part"><?php echo esc_html($pricing_number); ?></span>
                            <span class="elementor-price-table__decimal-part"><?php echo esc_html($settings['price 2nd']); ?></span>
                        </div>
                        <div class="elementor-price-table__period"><?php echo esc_html($settings['period']); ?></div>
                        <div class="elementor-price-table__content"><?php echo esc_html($settings['currency_content']); ?></div>
                    </div>
                <?php endif; ?>


            </div>

            <?php if (!empty($settings['features_list'])) : ?>
                <ul class="elementor-price-table__features-list">
                    <?php foreach ($settings['features_list'] as $index => $item) :
                        ?>
                        <li class="elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">
                            <div class="elementor-price-table__feature-inner">
                                <?php \Elementor\Icons_Manager::render_icon( $item['item_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php if (!empty($item['item_text'])) : echo esc_html($item['item_text']); endif; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if (!empty($settings['button_text'])) : ?>
                <div class="elementor-price-table__footer">
                    <?php if (!empty($settings['button_text'])) : ?>
                        <a <?php echo naturis_elementor_get_render_attribute_string('button_text', $this); ?>><?php echo esc_html($settings['button_text']); ?><i class="naturis-icon-long-arrow-right"></i></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
        <?php
    }
}

$widgets_manager->register(new Naturis_Elementor_Price_Table());
