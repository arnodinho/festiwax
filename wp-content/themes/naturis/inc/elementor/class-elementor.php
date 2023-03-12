<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Naturis_Elementor')) :

    /**
     * The naturis Elementor Integration class
     */
    class Naturis_Elementor {
        private $suffix = '';

        public function __construct() {
            $this->suffix = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min';

            add_action('wp', [$this, 'register_auto_scripts_frontend']);
            add_action('elementor/init', array($this, 'add_category'));
            add_action('wp_enqueue_scripts', [$this, 'add_scripts'], 15);
            add_action('elementor/widgets/register', array($this, 'customs_widgets'));
            add_action('elementor/widgets/register', array($this, 'include_widgets'));
            add_action('elementor/frontend/after_enqueue_scripts', [$this, 'add_js']);

            // Custom Animation Scroll
            add_filter('elementor/controls/animations/additional_animations', [$this, 'add_animations_scroll']);

            // Elementor Fix Noitice WooCommerce
            add_action('elementor/editor/before_enqueue_scripts', array($this, 'woocommerce_fix_notice'));

            // Backend
            add_action('elementor/editor/after_enqueue_styles', [$this, 'add_style_editor'], 99);

            // Add Icon Custom
            add_action('elementor/icons_manager/native', [$this, 'add_icons_native']);
            add_action('elementor/controls/register', [$this, 'add_icons']);

            // Add Breakpoints
            add_action('wp_enqueue_scripts', 'naturis_elementor_breakpoints', 9999);

            if (!naturis_is_elementor_pro_activated()) {
                require trailingslashit(get_template_directory()) . 'inc/elementor/custom-css.php';
                require trailingslashit(get_template_directory()) . 'inc/elementor/sticky-section.php';
                if (is_admin()) {
                    add_action('manage_elementor_library_posts_columns', [$this, 'admin_columns_headers']);
                    add_action('manage_elementor_library_posts_custom_column', [$this, 'admin_columns_content'], 10, 2);
                }
            }

            add_filter('elementor/fonts/additional_fonts', [$this, 'additional_fonts']);
            add_action('wp_enqueue_scripts', [$this, 'elementor_kit']);
        }

        public function elementor_kit() {
            $active_kit_id = Elementor\Plugin::$instance->kits_manager->get_active_id();
            Elementor\Plugin::$instance->kits_manager->frontend_before_enqueue_styles();
            $myvals = get_post_meta($active_kit_id, '_elementor_page_settings', true);
            if (!empty($myvals)) {
                $css = '';
                foreach ($myvals['system_colors'] as $key => $value) {
                    $css .= $value['color'] !== '' ? '--' . $value['_id'] . ':' . $value['color'] . ';' : '';
                }

                $var = "body{{$css}}";
                wp_add_inline_style('naturis-style', $var);
            }
        }

        public function additional_fonts($fonts) {
            $fonts["naturis heading"] = 'system';
            $fonts["naturis text"] = 'system';
            $fonts["naturis slider"] = 'system';
            return $fonts;
        }

        public function admin_columns_headers($defaults) {
            $defaults['shortcode'] = esc_html__('Shortcode', 'naturis');

            return $defaults;
        }

        public function admin_columns_content($column_name, $post_id) {
            if ('shortcode' === $column_name) {
                ob_start();
                ?>
                <input class="elementor-shortcode-input" type="text" readonly onfocus="this.select()" value="[hfe_template id='<?php echo esc_attr($post_id); ?>']"/>
                <?php
                ob_get_contents();
            }
        }

        public function add_js() {
            global $naturis_version;
            wp_enqueue_script('naturis-elementor-frontend', get_theme_file_uri('/assets/js/elementor-frontend.js'), [], $naturis_version);
        }

        public function add_style_editor() {
            global $naturis_version;
            wp_enqueue_style('naturis-elementor-editor-icon', get_theme_file_uri('/assets/css/admin/elementor/icons.css'), [], $naturis_version);
        }

        public function add_scripts() {
            global $naturis_version;
            $suffix = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min';
            wp_enqueue_style('naturis-elementor', get_template_directory_uri() . '/assets/css/base/elementor.css', '', $naturis_version);
            wp_style_add_data('naturis-elementor', 'rtl', 'replace');

            // Add Scripts
            wp_register_script('tweenmax', get_theme_file_uri('/assets/js/vendor/TweenMax.min.js'), array('jquery'), '1.11.1');
            wp_register_script('parallaxmouse', get_theme_file_uri('/assets/js/vendor/jquery-parallax.js'), array('jquery'), $naturis_version);

            if (naturis_elementor_check_type('animated-bg-parallax')) {
                wp_enqueue_script('tweenmax');
                wp_enqueue_script('jquery-panr', get_theme_file_uri('/assets/js/vendor/jquery-panr' . $suffix . '.js'), array('jquery'), '0.0.1');
            }
        }


        public function register_auto_scripts_frontend() {
            global $naturis_version;
            wp_register_script('naturis-elementor-brand', get_theme_file_uri('/assets/js/elementor/brand.js'), array('jquery','elementor-frontend'), $naturis_version, true);
            wp_register_script('naturis-elementor-countdown', get_theme_file_uri('/assets/js/elementor/countdown.js'), array('jquery','elementor-frontend'), $naturis_version, true);
            wp_register_script('naturis-elementor-header-group', get_theme_file_uri('/assets/js/elementor/header-group.js'), array('jquery','elementor-frontend'), $naturis_version, true);
            wp_register_script('naturis-elementor-image-carousel', get_theme_file_uri('/assets/js/elementor/image-carousel.js'), array('jquery','elementor-frontend'), $naturis_version, true);
            wp_register_script('naturis-elementor-image-gallery', get_theme_file_uri('/assets/js/elementor/image-gallery.js'), array('jquery','elementor-frontend'), $naturis_version, true);
            wp_register_script('naturis-elementor-posts-grid', get_theme_file_uri('/assets/js/elementor/posts-grid.js'), array('jquery','elementor-frontend'), $naturis_version, true);
            wp_register_script('naturis-elementor-product-categories', get_theme_file_uri('/assets/js/elementor/product-categories.js'), array('jquery','elementor-frontend'), $naturis_version, true);
            wp_register_script('naturis-elementor-product-tab', get_theme_file_uri('/assets/js/elementor/product-tab.js'), array('jquery','elementor-frontend'), $naturis_version, true);
            wp_register_script('naturis-elementor-products', get_theme_file_uri('/assets/js/elementor/products.js'), array('jquery','elementor-frontend'), $naturis_version, true);
            wp_register_script('naturis-elementor-tabs', get_theme_file_uri('/assets/js/elementor/tabs.js'), array('jquery','elementor-frontend'), $naturis_version, true);
            wp_register_script('naturis-elementor-testimonial', get_theme_file_uri('/assets/js/elementor/testimonial.js'), array('jquery','elementor-frontend'), $naturis_version, true);
            wp_register_script('naturis-elementor-video', get_theme_file_uri('/assets/js/elementor/video.js'), array('jquery','elementor-frontend'), $naturis_version, true);
           
        }

        public function add_category() {
            Elementor\Plugin::instance()->elements_manager->add_category(
                'naturis-addons',
                array(
                    'title' => esc_html__('naturis Addons', 'naturis'),
                    'icon'  => 'fa fa-plug',
                ),
                1);
        }

        public function add_animations_scroll($animations) {
            $animations['naturis Animation'] = [
                'opal-move-up'    => 'Move Up',
                'opal-move-down'  => 'Move Down',
                'opal-move-left'  => 'Move Left',
                'opal-move-right' => 'Move Right',
                'opal-flip'       => 'Flip',
                'opal-helix'      => 'Helix',
                'opal-scale-up'   => 'Scale',
                'opal-am-popup'   => 'Popup',
            ];

            return $animations;
        }

        public function customs_widgets() {
            $files = glob(get_theme_file_path('/inc/elementor/custom-widgets/*.php'));
            foreach ($files as $file) {
                if (file_exists($file)) {
                    require_once $file;
                }
            }
        }

        /**
         * @param $widgets_manager Elementor\Widgets_Manager
         */
        public function include_widgets($widgets_manager) {
            $files = glob(get_theme_file_path('/inc/elementor/widgets/*.php'));
            foreach ($files as $file) {
                if (file_exists($file)) {
                    require_once $file;
                }
            }
        }

        public function woocommerce_fix_notice() {
            if (naturis_is_woocommerce_activated()) {
                remove_action('woocommerce_cart_is_empty', 'woocommerce_output_all_notices', 5);
                remove_action('woocommerce_shortcode_before_product_cat_loop', 'woocommerce_output_all_notices', 10);
                remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
                remove_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);
                remove_action('woocommerce_before_cart', 'woocommerce_output_all_notices', 10);
                remove_action('woocommerce_before_checkout_form', 'woocommerce_output_all_notices', 10);
                remove_action('woocommerce_account_content', 'woocommerce_output_all_notices', 10);
                remove_action('woocommerce_before_customer_login_form', 'woocommerce_output_all_notices', 10);
            }
        }

        public function add_icons( $manager ) {
            $new_icons = json_decode( '{"naturis-icon-account":"account","naturis-icon-angle-double-down":"angle-double-down","naturis-icon-angle-down":"angle-down","naturis-icon-angle-left":"angle-left","naturis-icon-angle-right":"angle-right","naturis-icon-angle-up":"angle-up","naturis-icon-belgium":"belgium","naturis-icon-calendar":"calendar","naturis-icon-cart":"cart","naturis-icon-chat":"chat","naturis-icon-check-square-solid":"check-square-solid","naturis-icon-chevron-down":"chevron-down","naturis-icon-chevron-left":"chevron-left","naturis-icon-chevron-right":"chevron-right","naturis-icon-chevron-up":"chevron-up","naturis-icon-clock":"clock","naturis-icon-compare":"compare","naturis-icon-delivery":"delivery","naturis-icon-envelope-1":"envelope-1","naturis-icon-expand-arrows":"expand-arrows","naturis-icon-eye":"eye","naturis-icon-facebook-f":"facebook-f","naturis-icon-filter-ul":"filter-ul","naturis-icon-gift-card":"gift-card","naturis-icon-google-plus-g":"google-plus-g","naturis-icon-heart-1":"heart-1","naturis-icon-herbal":"herbal","naturis-icon-honest":"honest","naturis-icon-leaf-2":"leaf-2","naturis-icon-leaf":"leaf","naturis-icon-ligredients":"ligredients","naturis-icon-linkedin-in":"linkedin-in","naturis-icon-list-ul":"list-ul","naturis-icon-location":"location","naturis-icon-long-arrow-down":"long-arrow-down","naturis-icon-long-arrow-left":"long-arrow-left","naturis-icon-long-arrow-right":"long-arrow-right","naturis-icon-long-arrow-up":"long-arrow-up","naturis-icon-map-pin":"map-pin","naturis-icon-payment":"payment","naturis-icon-pen":"pen","naturis-icon-phone-1":"phone-1","naturis-icon-phone":"phone","naturis-icon-pin":"pin","naturis-icon-quote":"quote","naturis-icon-return":"return","naturis-icon-satisfaction":"satisfaction","naturis-icon-search-1":"search-1","naturis-icon-search-2":"search-2","naturis-icon-shoping":"shoping","naturis-icon-shopping-bag":"shopping-bag","naturis-icon-sliders-v":"sliders-v","naturis-icon-th-large":"th-large","naturis-icon-theme-arrow-right":"theme-arrow-right","naturis-icon-theme-long-arrow-right":"theme-long-arrow-right","naturis-icon-tracking":"tracking","naturis-icon-tweet":"tweet","naturis-icon-twitte-1":"twitte-1","naturis-icon-360":"360","naturis-icon-bars":"bars","naturis-icon-caret-down":"caret-down","naturis-icon-caret-left":"caret-left","naturis-icon-caret-right":"caret-right","naturis-icon-caret-up":"caret-up","naturis-icon-cart-empty":"cart-empty","naturis-icon-check-square":"check-square","naturis-icon-circle":"circle","naturis-icon-cloud-download-alt":"cloud-download-alt","naturis-icon-comment":"comment","naturis-icon-comments":"comments","naturis-icon-contact":"contact","naturis-icon-credit-card":"credit-card","naturis-icon-dot-circle":"dot-circle","naturis-icon-edit":"edit","naturis-icon-envelope":"envelope","naturis-icon-expand-alt":"expand-alt","naturis-icon-external-link-alt":"external-link-alt","naturis-icon-file-alt":"file-alt","naturis-icon-file-archive":"file-archive","naturis-icon-filter":"filter","naturis-icon-folder-open":"folder-open","naturis-icon-folder":"folder","naturis-icon-frown":"frown","naturis-icon-gift":"gift","naturis-icon-grid":"grid","naturis-icon-grip-horizontal":"grip-horizontal","naturis-icon-heart-fill":"heart-fill","naturis-icon-heart":"heart","naturis-icon-history":"history","naturis-icon-home":"home","naturis-icon-info-circle":"info-circle","naturis-icon-instagram":"instagram","naturis-icon-level-up-alt":"level-up-alt","naturis-icon-list":"list","naturis-icon-map-marker-check":"map-marker-check","naturis-icon-meh":"meh","naturis-icon-minus-circle":"minus-circle","naturis-icon-minus":"minus","naturis-icon-mobile-android-alt":"mobile-android-alt","naturis-icon-money-bill":"money-bill","naturis-icon-pencil-alt":"pencil-alt","naturis-icon-play-circle":"play-circle","naturis-icon-play":"play","naturis-icon-plus-circle":"plus-circle","naturis-icon-plus":"plus","naturis-icon-random":"random","naturis-icon-reply-all":"reply-all","naturis-icon-reply":"reply","naturis-icon-search-plus":"search-plus","naturis-icon-search":"search","naturis-icon-shield-check":"shield-check","naturis-icon-shopping-basket":"shopping-basket","naturis-icon-shopping-cart":"shopping-cart","naturis-icon-sign-out-alt":"sign-out-alt","naturis-icon-smile":"smile","naturis-icon-spinner":"spinner","naturis-icon-square":"square","naturis-icon-star":"star","naturis-icon-store":"store","naturis-icon-sync":"sync","naturis-icon-tachometer-alt":"tachometer-alt","naturis-icon-th-list":"th-list","naturis-icon-thumbtack":"thumbtack","naturis-icon-ticket":"ticket","naturis-icon-times-circle":"times-circle","naturis-icon-times":"times","naturis-icon-trophy-alt":"trophy-alt","naturis-icon-truck":"truck","naturis-icon-user-headset":"user-headset","naturis-icon-user-shield":"user-shield","naturis-icon-user":"user","naturis-icon-video":"video","naturis-icon-adobe":"adobe","naturis-icon-amazon":"amazon","naturis-icon-android":"android","naturis-icon-angular":"angular","naturis-icon-apper":"apper","naturis-icon-apple":"apple","naturis-icon-atlassian":"atlassian","naturis-icon-behance":"behance","naturis-icon-bitbucket":"bitbucket","naturis-icon-bitcoin":"bitcoin","naturis-icon-bity":"bity","naturis-icon-bluetooth":"bluetooth","naturis-icon-btc":"btc","naturis-icon-centos":"centos","naturis-icon-chrome":"chrome","naturis-icon-codepen":"codepen","naturis-icon-cpanel":"cpanel","naturis-icon-discord":"discord","naturis-icon-dochub":"dochub","naturis-icon-docker":"docker","naturis-icon-dribbble":"dribbble","naturis-icon-dropbox":"dropbox","naturis-icon-drupal":"drupal","naturis-icon-ebay":"ebay","naturis-icon-facebook":"facebook","naturis-icon-figma":"figma","naturis-icon-firefox":"firefox","naturis-icon-google-plus":"google-plus","naturis-icon-google":"google","naturis-icon-grunt":"grunt","naturis-icon-gulp":"gulp","naturis-icon-html5":"html5","naturis-icon-joomla":"joomla","naturis-icon-link-brand":"link-brand","naturis-icon-linkedin":"linkedin","naturis-icon-mailchimp":"mailchimp","naturis-icon-opencart":"opencart","naturis-icon-paypal":"paypal","naturis-icon-pinterest-p":"pinterest-p","naturis-icon-reddit":"reddit","naturis-icon-skype":"skype","naturis-icon-slack":"slack","naturis-icon-snapchat":"snapchat","naturis-icon-spotify":"spotify","naturis-icon-trello":"trello","naturis-icon-twitter":"twitter","naturis-icon-vimeo":"vimeo","naturis-icon-whatsapp":"whatsapp","naturis-icon-wordpress":"wordpress","naturis-icon-yoast":"yoast","naturis-icon-youtube":"youtube"}', true );
			$icons     = $manager->get_control( 'icon' )->get_settings( 'options' );
			$new_icons = array_merge(
				$new_icons,
				$icons
			);
			// Then we set a new list of icons as the options of the icon control
			$manager->get_control( 'icon' )->set_settings( 'options', $new_icons ); 
        }

        public function add_icons_native($tabs) {
            global $naturis_version;
            $tabs['opal-custom'] = [
                'name'          => 'naturis-icon',
                'label'         => esc_html__('naturis Icon', 'naturis'),
                'prefix'        => 'naturis-icon-',
                'displayPrefix' => 'naturis-icon-',
                'labelIcon'     => 'fab fa-font-awesome-alt',
                'ver'           => $naturis_version,
                'fetchJson'     => get_theme_file_uri('/inc/elementor/icons.json'),
                'native'        => true,
            ];

            return $tabs;
        }
    }

endif;

return new Naturis_Elementor();
