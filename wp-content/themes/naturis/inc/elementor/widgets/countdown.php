<?php


use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class Naturis_Elementor_Countdown extends Elementor\Widget_Base {

    public function get_name() {
        return 'naturis-countdown';
    }

    public function get_title() {
        return esc_html__('naturis Countdown', 'naturis');
    }

    public function get_categories() {
        return array('naturis-addons');
    }

    public function get_icon() {
        return 'eicon-countdown';
    }

    public function get_script_depends() {
        return ['naturis-elementor-countdown'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_countdown',
            [
                'label' => esc_html__('Countdown', 'naturis'),
            ]
        );

        $this->add_control(
            'due_date',
            [
                'label'       => esc_html__('Due Date', 'naturis'),
                'type'        => Controls_Manager::DATE_TIME,
                'default'     => date('Y-m-d H:i', strtotime('+1 month') + (get_option('gmt_offset') * HOUR_IN_SECONDS)),
                /* translators: %s: Time zone. */
                'description' => sprintf(esc_html__('Date set according to your timezone: %s.', 'naturis'), Utils::get_timezone_string()),
            ]
        );

        $this->add_control(
            'show_days',
            [
                'label'     => esc_html__('Days', 'naturis'),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__('Show', 'naturis'),
                'label_off' => esc_html__('Hide', 'naturis'),
                'default'   => 'yes',
            ]
        );

        $this->add_control(
            'show_hours',
            [
                'label'     => esc_html__('Hours', 'naturis'),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__('Show', 'naturis'),
                'label_off' => esc_html__('Hide', 'naturis'),
                'default'   => 'yes',
            ]
        );

        $this->add_control(
            'show_minutes',
            [
                'label'     => esc_html__('Minutes', 'naturis'),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__('Show', 'naturis'),
                'label_off' => esc_html__('Hide', 'naturis'),
                'default'   => 'yes',
            ]
        );

        $this->add_control(
            'show_seconds',
            [
                'label'     => esc_html__('Seconds', 'naturis'),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__('Show', 'naturis'),
                'label_off' => esc_html__('Hide', 'naturis'),
                'default'   => 'yes',
            ]
        );

        $this->add_control(
            'show_labels',
            [
                'label'     => esc_html__('Show Label', 'naturis'),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__('Show', 'naturis'),
                'label_off' => esc_html__('Hide', 'naturis'),
                'default'   => 'yes',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'custom_labels',
            [
                'label'     => esc_html__('Custom Label', 'naturis'),
                'type'      => Controls_Manager::SWITCHER,
                'condition' => [
                    'show_labels!' => '',
                ],
            ]
        );

        $this->add_control(
            'label_days',
            [
                'label'       => esc_html__('Days', 'naturis'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Days', 'naturis'),
                'placeholder' => esc_html__('Days', 'naturis'),
                'condition'   => [
                    'show_labels!'   => '',
                    'custom_labels!' => '',
                    'show_days'      => 'yes',
                ],
            ]
        );

        $this->add_control(
            'label_hours',
            [
                'label'       => esc_html__('Hours', 'naturis'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Hours', 'naturis'),
                'placeholder' => esc_html__('Hours', 'naturis'),
                'condition'   => [
                    'show_labels!'   => '',
                    'custom_labels!' => '',
                    'show_hours'     => 'yes',
                ],
            ]
        );

        $this->add_control(
            'label_minutes',
            [
                'label'       => esc_html__('Minutes', 'naturis'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Minutes', 'naturis'),
                'placeholder' => esc_html__('Minutes', 'naturis'),
                'condition'   => [
                    'show_labels!'   => '',
                    'custom_labels!' => '',
                    'show_minutes'   => 'yes',
                ],
            ]
        );

        $this->add_control(
            'label_seconds',
            [
                'label'       => esc_html__('Seconds', 'naturis'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Seconds', 'naturis'),
                'placeholder' => esc_html__('Seconds', 'naturis'),
                'condition'   => [
                    'show_labels!'   => '',
                    'custom_labels!' => '',
                    'show_seconds'   => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_box_style',
            [
                'label' => esc_html__('Boxes', 'naturis'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'container_width',
            [
                'label'      => esc_html__('Container Width', 'naturis'),
                'type'       => Controls_Manager::SLIDER,
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-naturis-countdown' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'items_width',
            [
                'label'      => esc_html__('Items Width', 'naturis'),
                'type'       => Controls_Manager::SLIDER,
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-countdown-item' => 'width: {{SIZE}}{{UNIT}}; flex-basis: {{SIZE}}{{UNIT}};',
                ],
                'separator'  => 'before',
            ]
        );

        $this->add_responsive_control(
            'items_height',
            [
                'label'      => esc_html__('Items Height', 'naturis'),
                'type'       => Controls_Manager::SLIDER,
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-countdown-item' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'box_background_color',
            [
                'label'     => esc_html__('Background Color', 'naturis'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-countdown-item' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_padding',
            [
                'label'      => esc_html__('Padding', 'naturis'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-countdown-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__('Margin', 'naturis'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-countdown-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                    '{{WRAPPER}}.elementor-widget-naturis-countdown .elementor-countdown-item:before' => 'right: -{{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'      => 'image_border',
                'selector'  => '{{WRAPPER}} .elementor-countdown-item',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'naturis'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-countdown-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'alignment',
            [
                'label'     => esc_html__('Alignment', 'naturis'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start' => [
                        'title' => esc_html__('Left', 'naturis'),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'     => [
                        'title' => esc_html__('Center', 'naturis'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'flex-end'   => [
                        'title' => esc_html__('Right', 'naturis'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'center',
                'selectors' => [
                    '{{WRAPPER}} .elementor-naturis-countdown' => 'justify-content: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_content_style',
            [
                'label' => esc_html__('Content', 'naturis'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_border_color',
            [
                'label'     => esc_html__('Border Color', 'naturis'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-countdown-item' => 'border-color: {{VALUE}};',
                ],
                'default'   => ''
            ]
        );

        $this->add_control(
            'digits_color',
            [
                'label'     => esc_html__('Color digit', 'naturis'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-countdown-digits, {{WRAPPER}} .elementor-countdown-item:after' => 'color: {{VALUE}};',
                ],
                'default'   => ''
            ]
        );

        $this->add_control(
            'digits_color_2',
            [
                'label'       => esc_html__('Bg Color digit', 'naturis'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .elementor-countdown-digits'        => 'background: {{VALUE}};',
                ],
                'description' => esc_html__('Background Or Border Color', 'naturis'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'digits_typography',
                'selector' => '{{WRAPPER}} .elementor-countdown-digits',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'        => 'border_digits',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .elementor-countdown-digits',
            ]
        );

        $this->add_control(
            'digits_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'naturis'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-countdown-digits' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'digits_padding',
            [
                'label'      => esc_html__('Padding digits', 'naturis'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-countdown-digits' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'digits_margin',
            [
                'label'      => esc_html__('Margin digits', 'naturis'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-countdown-digits' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_control(
            'heading_label',
            [
                'label'     => esc_html__('Label', 'naturis'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label'     => esc_html__('Color label', 'naturis'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-countdown-label' => 'color: {{VALUE}};',
                ],
                'default'   => ''
            ]
        );

        $this->add_control(
            'decor_color',
            [
                'label'     => esc_html__('Color decor', 'naturis'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementor-countdown-label:before, {{WRAPPER}} .elementor-countdown-label:after' => 'background-color: {{VALUE}};',
                ],
                'default'   => ''
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'label_typography',
                'selector' => '{{WRAPPER}} .elementor-countdown-label',
            ]
        );

        $this->add_responsive_control(
            'label_padding',
            [
                'label'      => esc_html__('Padding', 'naturis'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .elementor-countdown-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    private function get_strftime($instance) {
        $string = '';
        if ($instance['show_days']) {
            $string .= $this->render_countdown_item($instance, 'label_days', 'days', 'elementor-countdown-days');
        }
        if ($instance['show_hours']) {
            $string .= $this->render_countdown_item($instance, 'label_hours', 'hours', 'elementor-countdown-hours');
        }
        if ($instance['show_minutes']) {
            $string .= $this->render_countdown_item($instance, 'label_minutes', 'minutes', 'elementor-countdown-minutes');
        }
        if ($instance['show_seconds']) {
            $string .= $this->render_countdown_item($instance, 'label_seconds', 'seconds', 'elementor-countdown-seconds');
        }

        return $string;
    }

    private $_default_countdown_labels;

    private function _init_default_countdown_labels() {
        $this->_default_countdown_labels = [
            'label_months'  => esc_html__('Months', 'naturis'),
            'label_weeks'   => esc_html__('Weeks', 'naturis'),
            'label_days'    => esc_html__('Days', 'naturis'),
            'label_hours'   => esc_html__('Hours', 'naturis'),
            'label_minutes' => esc_html__('Minutes', 'naturis'),
            'label_seconds' => esc_html__('Seconds', 'naturis'),
        ];
    }

    public function get_default_countdown_labels() {
        if (!$this->_default_countdown_labels) {
            $this->_init_default_countdown_labels();
        }

        return $this->_default_countdown_labels;
    }


    public function render_countdown_item($instance, $label, $name, $part_class) {
        $string = '<div class="elementor-countdown-item ' . esc_attr($name) . '"><span class="elementor-countdown-digits ' . esc_attr($part_class) . '"></span>';

        if ($instance['show_labels']) {
            $default_labels = $this->get_default_countdown_labels();
            $label          = ($instance['custom_labels']) ? $instance[$label] : $default_labels[$label];
            $string         .= ' <span class="elementor-countdown-label">' . esc_html($label) . '</span>';
        }

        $string .= '</div>';

        return $string;
    }

    protected function render() {
        $instance = $this->get_settings();

        $due_date = $instance['due_date'];

        // Handle timezone ( we need to set GMT time )
        $due_date = strtotime($due_date) - (get_option('gmt_offset') * HOUR_IN_SECONDS);
        ?>
        <div class="elementor-naturis-countdown" data-date="<?php echo esc_attr($due_date); ?>">
            <?php echo naturis_elementor_get_strftime($instance, $this); // WPCS: XSS ok. ?>
        </div>
        <?php
    }
}

$widgets_manager->register(new Naturis_Elementor_Countdown());
