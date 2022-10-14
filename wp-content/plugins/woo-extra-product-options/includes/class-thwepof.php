<?php
/**
 * Woo Extra Product Options Settings
 *
 * @author   ThemeHiGH
 * @category Admin
 */

if(!defined('ABSPATH')){ exit; }

if(!class_exists('THWEPOF')) :
class THWEPOF {
	protected static $_instance = null;
	public $wepof_admin = null;
	public $wepof_public = null;

	public function __construct() {
		$required_classes = apply_filters('th_wepof_require_class', array(
			'common' => array(
				'includes/model/rules/class-wepof-condition.php',
				'includes/model/rules/class-wepof-condition-set.php',
				'includes/model/rules/class-wepof-rule.php',
				'includes/model/rules/class-wepof-rule-set.php',
				'includes/model/fields/class-wepof-field.php',
				'includes/model/fields/class-wepof-field-inputtext.php',
				'includes/model/fields/class-wepof-field-email.php',
				'includes/model/fields/class-wepof-field-url.php',
				'includes/model/fields/class-wepof-field-range.php',
				'includes/model/fields/class-wepof-field-hidden.php',
				'includes/model/fields/class-wepof-field-number.php',
				'includes/model/fields/class-wepof-field-tel.php',
				'includes/model/fields/class-wepof-field-password.php',
				'includes/model/fields/class-wepof-field-textarea.php',
				'includes/model/fields/class-wepof-field-select.php',
				'includes/model/fields/class-wepof-field-checkbox.php',
				'includes/model/fields/class-wepof-field-checkboxgroup.php',
				'includes/model/fields/class-wepof-field-radio.php',
				'includes/model/fields/class-wepof-field-datepicker.php',
				'includes/model/fields/class-wepof-field-colorpicker.php',
				'includes/model/fields/class-wepof-field-heading.php',
				'includes/model/fields/class-wepof-field-paragraph.php',
				'includes/model/fields/class-wepof-field-switch.php',
				'includes/model/fields/class-wepof-field-separator.php',
				'includes/model/class-wepof-section.php',

				'includes/utils/class-thwepof-utils.php',
				'includes/utils/class-thwepof-utils-field.php',
				'includes/utils/class-thwepof-utils-section.php',
				'includes/class-thwepof-data.php',

				/*'classes/fe/rules/class-wepof-condition.php',
				'classes/fe/rules/class-wepof-condition-set.php',
				'classes/fe/rules/class-wepof-rule.php',
				'classes/fe/rules/class-wepof-rule-set.php',
				'classes/fe/fields/class-wepof-field.php',
				'classes/fe/fields/class-wepof-field-inputtext.php',
				'classes/fe/fields/class-wepof-field-hidden.php',
				'classes/fe/fields/class-wepof-field-number.php',
				'classes/fe/fields/class-wepof-field-tel.php',
				'classes/fe/fields/class-wepof-field-password.php',
				'classes/fe/fields/class-wepof-field-textarea.php',
				'classes/fe/fields/class-wepof-field-select.php',
				'classes/fe/fields/class-wepof-field-checkbox.php',
				'classes/fe/fields/class-wepof-field-checkboxgroup.php',
				'classes/fe/fields/class-wepof-field-radio.php',
				'classes/fe/fields/class-wepof-field-datepicker.php',
				'classes/fe/fields/class-wepof-field-colorpicker.php',
				'classes/fe/fields/class-wepof-field-heading.php',
				'classes/fe/fields/class-wepof-field-paragraph.php',
				'classes/fe/class-wepof-section.php',
				'classes/fe/class-wepof-utils.php',
				'classes/fe/class-wepof-utils-field.php',
				'classes/fe/class-wepof-utils-section.php',
				'classes/fe/class-wepof-data.php',*/
			),
			'admin' => array(
				'admin/class-thwepof-admin-form.php',
				'admin/class-thwepof-admin-form-section.php',
				'admin/class-thwepof-admin-form-field.php',

				'admin/class-thwepof-admin-settings.php',
				'admin/class-thwepof-admin-settings-general.php',
				'admin/class-thwepof-admin-settings-advanced.php',
				'admin/class-thwepof-admin-settings-pro.php',

				//'classes/class-wepof-settings-page.php',
				//'classes/fe/class-wepof-product-options-settings.php',
				//'classes/fe/class-thwepof-admin-settings-advanced.php',
			),
			'public' => array(
				'public/class-thwepof-public.php',
				//'classes/fe/class-wepof-product-options-frontend.php',
			),
		));

		$this->include_required( $required_classes );
		$this->may_copy_older_version_settings();

		add_action('admin_menu', array($this, 'admin_menu'));
		add_filter('woocommerce_screen_ids', array($this, 'add_screen_id'));
		add_filter('plugin_action_links_'.THWEPOF_BASE_NAME, array($this, 'add_settings_link'));
		add_action('upgrader_process_complete', array($this, 'may_copy_older_version_settings'));

		// add_action('wp_ajax_dismiss_thwepof_review_request_notice', array($this, 'dismiss_thwepof_review_request_notice'));
		// add_action('wp_ajax_skip_thwepof_review_request_notice', array($this, 'skip_thwepof_review_request_notice'));

		add_action('admin_footer-product_page_thwepof_extra_product_options', array($this, 'admin_notice_js_snippet'), 9999);
		add_action('wp_ajax_hide_thwepo_admin_notice', array($this, 'hide_thwepo_admin_notice'));
		
		add_action('admin_footer-plugins.php', array($this, 'wepo_deactivation_form'));
		add_action('wp_ajax_thwepo_deactivation_reason', array($this, 'thwepo_deactivation_reason'));

		$this->init();
	}

	public static function instance() {
		if(is_null(self::$_instance)){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	protected function include_required( $required_classes ) {
		if(!function_exists('is_plugin_active')) {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		foreach($required_classes as $section => $classes ) {
			foreach( $classes as $class ){
				if('common' == $section  || ('public' == $section && !is_admin() || ( defined('DOING_AJAX') && DOING_AJAX) )
					|| ('admin' == $section && is_admin()) && file_exists( THWEPOF_PATH . $class )){
					require_once( THWEPOF_PATH . $class );
				}
			}
		}
	}

	public function init() {
		$wepo_data = THWEPOF_Data::instance();
		add_action('wp_ajax_thwepof_load_products', array($wepo_data, 'load_products_ajax'));
    	add_action('wp_ajax_nopriv_thwepof_load_products', array($wepo_data, 'load_products_ajax'));

		if(!is_admin() || (defined( 'DOING_AJAX' ) && DOING_AJAX)){
			$this->wepof_public = new THWEPOF_Public();
		}else if(is_admin()){
			$this->wepof_admin = THWEPOF_Admin_Settings_General::instance();
		}

		//$this->may_copy_older_version_settings();
	}

	public function admin_menu() {
		$capability = THWEPOF_Utils::wepo_capability();
		$this->screen_id = add_submenu_page('edit.php?post_type=product', __('WooCommerce Extra Product Option', 'woo-extra-product-options'),
		__('Extra Product Option', 'woo-extra-product-options'), $capability, 'thwepof_extra_product_options', array($this, 'output_settings'));

		add_action('admin_print_scripts-'. $this->screen_id, array($this, 'enqueue_admin_scripts'));
	}

	public function add_screen_id($ids){
		$ids[] = 'product_page_thwepof_extra_product_options';
		$ids[] = strtolower(__('Product', 'woocommerce')) .'_page_thwepof_extra_product_options';
		return $ids;
	}

	public function add_settings_link($links) {
		$settings_link = '<a href="'.esc_url(admin_url('edit.php?post_type=product&page=thwepof_extra_product_options')).'">'. __('Settings') .'</a>';
		array_unshift($links, $settings_link);
		$premium_link = '<a href="https://www.themehigh.com/product/woocommerce-extra-product-options?utm_source=free&utm_medium=plugin_action_link&utm_campaign=wepo_upgrade_link" style="color:green; font-weight:bold" target="_blank">'. __('Get Pro') .'</a>';
		array_push($links, $premium_link);

		if (array_key_exists('deactivate', $links)) {
		    $links['deactivate'] = str_replace('<a', '<a class="thwepo-deactivate-link"', $links['deactivate']);
		}

		return $links;
	}

	public function output_settings() {
		// echo '<div class="wrap">';
		// echo '<h2></h2>';
		//$this->output_old_settings_copy_message();
		$tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'general_settings';

		echo '<div class="thwepof-wrap">';
		if($tab === 'advanced_settings'){			
			$advanced_settings = THWEPOF_Admin_Settings_Advanced::instance();	
			$advanced_settings->render_page();			
		}elseif($tab === 'pro'){
			$pro_details = THWEPOF_Admin_Settings_Pro::instance();	
			$pro_details->render_page();
		}else{
			$general_settings = THWEPOF_Admin_Settings_General::instance();
			$general_settings->render_page();
		}
		echo '</div">';
		// echo '</div>';
	}

	public function enqueue_admin_scripts() {
		$debug_mode = apply_filters('thwepof_debug_mode', false);
		$suffix = $debug_mode ? '' : '.min';

		wp_enqueue_style (array('woocommerce_admin_styles', 'jquery-ui-style'));
		wp_enqueue_style ('thwepof-admin-style', THWEPOF_URL.'admin/assets/css/thwepof-admin'. $suffix .'.css', THWEPOF_VERSION);
		wp_enqueue_script('thwepof-admin-script', THWEPOF_URL.'admin/assets/js/thwepof-admin'. $suffix .'.js',
		array('jquery', 'jquery-ui-sortable', 'jquery-tiptip', 'wc-enhanced-select', 'selectWoo'), THWEPOF_VERSION, false);

		$wepof_var = array(
			'tag'                 => __('Tag', 'woo-extra-product-options'),
			'equal'               => __('Equals to/ In', 'woo-extra-product-options'),
			'notequal'            => __('Not Equals to/ Not in', 'woo-extra-product-options'),
			'product'             => __('Product', 'woo-extra-product-options'),
			'category'            => __('Category', 'woo-extra-product-options'),
			'load_product_nonce'  => wp_create_nonce('wepof-load-products'),

			'edit_field'          => __('Edit Field', 'woo-extra-product-options'),
			'new_field'           => __('New Field', 'woo-extra-product-options'),
			'new_section'         => __('New Section', 'woo-extra-product-options'),
			'edit_section'        => __('Edit Section', 'woo-extra-product-options'),
		);
		wp_localize_script('thwepof-admin-script', 'thwepof_admin_var', $wepof_var);
	}

	public function output_old_settings_copy_message(){
		$new_settings = THWEPOF_Utils::get_sections();
		if($new_settings){
			return;
		}

		$custom_fields = get_option('thwepof_custom_product_fields');

		if(is_array($custom_fields) && !empty($custom_fields)){
			if(isset($_POST['may_copy_settings']))
				$result = $this->may_copy_older_version_settings();

			?>
			<form method="post" action="">
				<p>Copy older version settings <input type="submit" name="may_copy_settings" value="Copy Settings" /></p>
	        </form>
			<?php
		}
	}

	public function may_copy_older_version_settings(){
		$new_settings = THWEPOF_Utils::get_sections();
		if($new_settings){
			return;
		}

		$custom_fields = get_option('thwepof_custom_product_fields');
		if(is_array($custom_fields) && !empty($custom_fields)){
			$fields_before = isset($custom_fields['woo_before_add_to_cart_button']) ? $custom_fields['woo_before_add_to_cart_button'] : false;
			$fields_after = isset($custom_fields['woo_after_add_to_cart_button']) ? $custom_fields['woo_after_add_to_cart_button'] : false;

			$section_before = THWEPOF_Utils_Section::prepare_default_section();
			$section_after = THWEPOF_Utils_Section::prepare_default_section();

			if(is_array($fields_before)){
				foreach($fields_before as $key => $field){
					$section_before = THWEPOF_Utils_Section::add_field($section_before, $field);
				}
			}

			if(is_array($fields_after)){
				foreach($fields_after as $key => $field){
					$section_after = THWEPOF_Utils_Section::add_field($section_after, $field);
				}
			}

			$result1 = $result2 = false;

			if(THWEPOF_Utils_Section::has_fields($section_after)){
				if(THWEPOF_Utils_Section::has_fields($section_before)){
					$section_before->set_property('id', 'default');
					$section_before->set_property('name', 'default');
					$section_before->set_property('title', 'Section 1');

					$section_after->set_property('id', 'section_2');
					$section_after->set_property('name', 'section_2');
					$section_after->set_property('title', 'Section 2');

					$result1 = THWEPOF_Utils::update_section($section_before);
				}else{
					$result1 = true;
				}
				$section_after->set_property('position', 'woo_after_add_to_cart_button');
				$result2 = THWEPOF_Utils::update_section($section_after);

			}else if(THWEPOF_Utils_Section::has_fields($section_before)){
				$result1 = THWEPOF_Utils::update_section($section_before);
				$result2 = true;
			}

			if($result1 && $result2){
				update_option('thwepof_custom_product_fields_bkp', $custom_fields);
				delete_option('thwepof_custom_product_fields');
			}
		}
	}
	
	// Old Review Banner
	// public function dismiss_thwepof_review_request_notice(){
	// 	if(! check_ajax_referer( 'thwepof_review_request_notice', 'security' )){
	// 		die();
	// 	}
	// 	set_transient('thwepof_review_request_notice_dismissed', true, apply_filters('thwepof_dismissed_review_request_notice_lifespan', 1 * YEAR_IN_SECONDS));
	// }

	// public function skip_thwepof_review_request_notice(){
	// 	if(! check_ajax_referer( 'thwepof_review_request_notice', 'security' )){
	// 		die();
	// 	}
	// 	set_transient('thwepof_skip_review_request_notice', true, apply_filters('thwepof_skip_review_request_notice_lifespan', 1 * DAY_IN_SECONDS));
	// }

	public function hide_thwepo_admin_notice(){
		check_ajax_referer('thwepof_notice_security', 'thwepo_review_nonce');

		$capability = THWEPOF_Utils::wepo_capability();
		if(!current_user_can($capability)){
			wp_die(-1);
		}

		$now = time();
		update_user_meta( get_current_user_id(), 'thwepo_review_skipped', true );
		update_user_meta( get_current_user_id(), 'thwepo_review_skipped_time', $now );
	}

	public function admin_notice_js_snippet(){
		if(!apply_filters('thwepo_dismissable_admin_notice_javascript', true)){
			return;
		}		
		?>
	    <script>
			var thwepo_dismissable_notice = (function($, window, document) {
				'use strict';

				$( document ).on( 'click', '.thpladmin-notice .notice-dismiss', function() {
					var wrapper = $(this).closest('div.thpladmin-notice');
					var nonce = wrapper.data("nonce");
					var data = {
						thwepo_review_nonce: nonce,
						action: 'hide_thwepo_admin_notice',
					};
					$.post( ajaxurl, data, function() {

					});
				});

			}(window.jQuery, window, document));	
	    </script>
	    <?php
	}

	public function wepo_deactivation_form(){
		$is_snooze_time = get_user_meta( get_current_user_id(), 'thwepof_deactivation_snooze', true );
		$now = time();

		if($is_snooze_time && ($now < $is_snooze_time)){
			return;
		}

		$deactivation_reasons = $this->get_deactivation_reasons();
		?>
		<div id="thwepo_deactivation_form" class="thpladmin-modal-mask">
			<div class="thpladmin-modal">
				<div class="modal-container">
					<!-- <span class="modal-close" onclick="thwepofCloseModal(this)">×</span> -->
					<div class="modal-content">
						<div class="modal-body">
							<div class="model-header">
								<img class="th-logo" src="<?php echo esc_url(THWEPOF_URL .'admin/assets/css/themehigh.svg'); ?>" alt="themehigh-logo">
								<span><?php echo __('Quick Feedback', 'woo-extra-product-options'); ?></span>
							</div>

							<div class="get-support-version-b">
								<p>We are sad to see you go. We would be happy to fix things for you. Please raise a ticket to get help</p>
								<a class="thwepo-link thwepo-right-link thwepo-active" target="_blank" href="https://help.themehigh.com/hc/en-us/requests/new?utm_source=wepo_free&utm_medium=feedback_form&utm_campaign=get_support"><?php echo __('Get Support', 'woo-extra-product-options'); ?></a>
							</div>

							<main class="form-container main-full">
								<p class="thwepo-title-text"><?php echo __('If you have a moment, please let us know why you want to deactivate this plugin', 'woo-extra-product-options'); ?></p>
								<ul class="deactivation-reason" data-nonce="<?php echo wp_create_nonce('thwepo_deactivate_nonce'); ?>">
									<?php 
									if($deactivation_reasons){
										foreach($deactivation_reasons as $key => $reason){
											$reason_type = isset($reason['reason_type']) ? $reason['reason_type'] : '';
											$reason_placeholder = isset($reason['reason_placeholder']) ? $reason['reason_placeholder'] : '';
											?>
											<li data-type="<?php echo esc_attr($reason_type); ?>" data-placeholder="<?php echo esc_attr($reason_placeholder); ?> ">
												<label>
													<input type="radio" name="selected-reason" value="<?php echo esc_attr($key); ?>">
													<span><?php echo esc_html($reason['radio_label']); ?></span>
												</label>
											</li>
											<?php
										}
									}
									?>
								</ul>
								<p class="thwepo-privacy-cnt"><?php echo __('This form is only for getting your valuable feedback. We do not collect your personal data. To know more read our ', 'woo-extra-product-options'); ?> <a class="thwepo-privacy-link" target="_blank" href="<?php echo esc_url('https://www.themehigh.com/privacy-policy/');?>"><?php echo __('Privacy Policy', 'woo-extra-product-options'); ?></a></p>
							</main>
							<footer class="modal-footer">
								<div class="thwepo-left">
									<a class="thwepo-link thwepo-left-link thwepo-deactivate" href="#"><?php echo __('Skip & Deactivate', 'woo-extra-product-options'); ?></a>
								</div>
								<div class="thwepo-right">
									
									<!-- <a class="thwepo-link thwepo-right-link thwepo-active" target="_blank" href="https://help.themehigh.com/hc/en-us/requests/new?utm_source=wepo_free&utm_medium=feedback_form&utm_campaign=get_support"><?php echo __('Get Support', 'woo-extra-product-options'); ?></a> -->

									<a class="thwepo-link thwepo-right-link thwepo-active thwepo-submit-deactivate" href="#"><?php echo __('Submit and Deactivate', 'woo-extra-product-options'); ?></a>
									<a class="thwepo-link thwepo-right-link thwepo-close" href="#"><?php echo __('Cancel', 'woo-extra-product-options'); ?></a>
								</div>
							</footer>
						</div>
					</div>
				</div>
			</div>
		</div>
		<style type="text/css">
			.th-logo{
			    margin-right: 10px;
			}
			.thpladmin-modal-mask{
			    position: fixed;
			    background-color: rgba(17,30,60,0.6);
			    top: 0;
			    left: 0;
			    width: 100%;
			    height: 100%;
			    z-index: 9999;
			    overflow: scroll;
			    transition: opacity 250ms ease-in-out;
			}
			.thpladmin-modal-mask{
			    display: none;
			}
			.thpladmin-modal .modal-container{
			    position: absolute;
			    background: #fff;
			    border-radius: 2px;
			    overflow: hidden;
			    left: 50%;
			    top: 50%;
			    transform: translate(-50%,-50%);
			    width: 50%;
			    max-width: 960px;
			    /*min-height: 560px;*/
			    /*height: 80vh;*/
			    /*max-height: 640px;*/
			    animation: appear-down 250ms ease-in-out;
			    border-radius: 15px;
			}
			.model-header {
			    padding: 21px;
			}
			.thpladmin-modal .model-header span {
			    font-size: 18px;
			    font-weight: bold;
			}
			.thpladmin-modal .model-header {
			    padding: 21px;
			    background: #ECECEC;
			}
			.thpladmin-modal .form-container {
			    margin-left: 23px;
			    clear: both;
			}
			.thpladmin-modal .deactivation-reason input {
			    margin-right: 13px;
			}
			.thpladmin-modal .thwepo-privacy-cnt {
			    color: #919191;
			    font-size: 12px;
			    margin-bottom: 31px;
			    margin-top: 18px;
			    max-width: 75%;
			}
			.thpladmin-modal .deactivation-reason li {
			    margin-bottom: 17px;
			}
			.thpladmin-modal .modal-footer {
			    padding: 20px;
			    border-top: 1px solid #E7E7E7;
			    float: left;
			    width: 100%;
			    box-sizing: border-box;
			}
			.thwepo-left {
			    float: left;
			}
			.thwepo-right {
			    float: right;
			}
			.thwepo-link {
			    line-height: 31px;
			    font-size: 12px;
			}
			.thwepo-left-link {
			    font-style: italic;
			}
			.thwepo-right-link {
			    padding: 0px 20px;
			    border: 1px solid;
			    display: inline-block;
			    text-decoration: none;
			    border-radius: 5px;
			}
			.thwepo-right-link.thwepo-active {
			    background: #0773AC;
			    color: #fff;
			}
			.thwepo-title-text {
			    color: #2F2F2F;
			    font-weight: 500;
			    font-size: 15px;
			}
			.reason-input {
			    margin-left: 31px;
			    margin-top: 11px;
			    width: 70%;
			}
			.reason-input input {
			    width: 100%;
			    height: 40px;
			}
			.reason-input textarea {
			    width: 100%;
			    min-height: 80px;
			}
			input.th-snooze-checkbox {
			    width: 15px;
			    height: 15px;
			}
			input.th-snooze-checkbox:checked:before {
			    width: 1.2rem;
			    height: 1.2rem;
			}
			.th-snooze-select {
			    margin-left: 20px;
			    width: 172px;
			}

			/* Version B */
			.get-support-version-b {
			    width: 100%;
			    padding-left: 23px;
			    clear: both;
			    float: left;
			    box-sizing: border-box;
			    background: #0673ab;
			    color: #fff;
			    margin-bottom: 20px;
			}
			.get-support-version-b p {
			    font-size: 12px;
			    line-height: 17px;
			    width: 70%;
			    display: inline-block;
			    margin: 0px;
			    padding: 15px 0px;
			}
			.get-support-version-b .thwepo-right-link {
			    background-image: url(<?php echo esc_url(THWEPOF_URL .'admin/assets/css/get_support_icon.svg'); ?>);
			    background-repeat: no-repeat;
			    background-position: 11px 10px;
			    padding-left: 31px;
			    color: #0773AC;
			    background-color: #fff;
			    float: right;
			    margin-top: 17px;
			    margin-right: 20px;
			}
			.thwepo-privacy-link {
			    font-style: italic;
			}
			.wepo-review-link {
			    margin-top: 7px;
			    margin-left: 31px;
			    font-size: 16px;
			}
			span.wepo-rating-link {
			    color: #ffb900;
			}
			.thwepo-review-and-deactivate {
			    text-decoration: none;
			}
		</style>

		<script type="text/javascript">
			(function($){
				var popup = $("#thwepo_deactivation_form");
				var deactivation_link = '';

				$('.thwepo-deactivate-link').on('click', function(e){
					e.preventDefault();
					deactivation_link = $(this).attr('href');
					popup.css("display", "block");
					popup.find('a.thwepo-deactivate').attr('href', deactivation_link);
				});

				popup.on('click', 'input[type="radio"]', function () {
					var parent = $(this).parents('li:first');
                    popup.find('.reason-input').remove();

                    var type = parent.data('type');
                    var placeholder = parent.data('placeholder');

                    var reason_input = '';
                    if('text' == type){
                    	reason_input += '<div class="reason-input">';
                    	reason_input += '<input type="text" placeholder="'+ placeholder +'">';
                    	reason_input += '</div>';
                    }else if('textarea' == type){
                    	reason_input += '<div class="reason-input">';
                    	reason_input += '<textarea row="5" placeholder="'+ placeholder +'">';
                    	reason_input += '</textarea>';
                    	reason_input += '</div>';
                    }else if('checkbox' == type){
                    	reason_input += '<div class="reason-input ">';
                    	reason_input += '<input type="checkbox" id="th-snooze" name="th-snooze" class="th-snooze-checkbox">';
                    	reason_input += '<label for="th-snooze">Snooze this panel while troubleshooting</label>';
                    	reason_input += '<select name="th-snooze-time" class="th-snooze-select" disabled>';
                    	reason_input += '<option value="<?php echo HOUR_IN_SECONDS ?>">1 Hour</option>';
                    	reason_input += '<option value="<?php echo 12*HOUR_IN_SECONDS ?>">12 Hour</option>';
                    	reason_input += '<option value="<?php echo DAY_IN_SECONDS ?>">24 Hour</option>';
                    	reason_input += '<option value="<?php echo WEEK_IN_SECONDS ?>">1 Week</option>';
                    	reason_input += '<option value="<?php echo MONTH_IN_SECONDS ?>">1 Month</option>';
                    	reason_input += '</select>';
                    	reason_input += '</div>';
                    }else if('reviewlink' == type){
                    	reason_input += '<div class="reason-input wepo-review-link">';
                    	/*
                    	reason_input += '<?php _e('Deactivate and ', 'woo-extra-product-options');?>'
                    	reason_input += '<a href="#" target="_blank" class="thwepo-review-and-deactivate">';
                    	reason_input += '<?php _e('leave a review', 'woo-extra-product-options'); ?>';
                    	reason_input += '<span class="wepo-rating-link"> &#9733;&#9733;&#9733;&#9733;&#9733; </span>';
                    	reason_input += '</a>';
                    	*/
                    	reason_input += '<input type="hidden" value="<?php _e('Upgraded', 'woo-extra-product-options');?>">';
                    	reason_input += '</div>';
                    }

                    if(reason_input !== ''){
                    	parent.append($(reason_input));
                    }
				});

				popup.on('click', '.thwepo-close', function () {
					popup.css("display", "none");
				});

				/*
				popup.on('click', '.thwepo-review-and-deactivate', function () {
					e.preventDefault();
                    window.open("https://wordpress.org/support/plugin/woo-extra-product-options/reviews/?rate=5#new-post");
                    console.log(deactivation_link);
                    window.location.href = deactivation_link;
				});
				*/

				popup.on('click', '.thwepo-submit-deactivate', function (e) {
                    e.preventDefault();
                    var button = $(this);
                    if (button.hasClass('disabled')) {
                        return;
                    }
                    var radio = $('.deactivation-reason input[type="radio"]:checked');
                    var parent_li = radio.parents('li:first');
                    var parent_ul = radio.parents('ul:first');
                    var input = parent_li.find('textarea, input[type="text"], input[type="hidden"]');
                    var wepo_deacive_nonce = parent_ul.data('nonce');

                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'thwepo_deactivation_reason',
                            reason: (0 === radio.length) ? 'none' : radio.val(),
                            comments: (0 !== input.length) ? input.val().trim() : '',
                            security: wepo_deacive_nonce,
                        },
                        beforeSend: function () {
                            button.addClass('disabled');
                            button.text('Processing...');
                        },
                        complete: function () {
                            window.location.href = deactivation_link;
                        }
                    });
                });

                popup.on('click', '#th-snooze', function () {
                	if($(this).is(':checked')){
                		popup.find('.th-snooze-select').prop("disabled", false);
                	}else{
                		popup.find('.th-snooze-select').prop("disabled", true);
                	}
				});

			}(jQuery))
		</script>

		<?php 
	}

	private function get_deactivation_reasons(){
		return array(
			'upgraded_to_wepo_pro' => array(
				'radio_val'          => 'upgraded_to_wepo_pro',
				'radio_label'        => __('Upgraded to premium.', 'woo-extra-product-options'),
				'reason_type'        => 'reviewlink',
				'reason_placeholder' => '',
			),

			'feature_missing'=> array(
				'radio_val'          => 'feature_missing',
				'radio_label'        => __('A specific feature is missing', 'woo-extra-product-options'),
				'reason_type'        => 'text',
				'reason_placeholder' => __('Type in the feature', 'woo-extra-product-options'),
			),

			'error_or_not_working'=> array(
				'radio_val'          => 'error_or_not_working',
				'radio_label'        => __('Found an error in the plugin/ Plugin was not working', 'woo-extra-product-options'),
				'reason_type'        => 'text',
				'reason_placeholder' => __('Specify the issue', 'woo-extra-product-options'),
			),

			'hard_to_use' => array(
				'radio_val'          => 'hard_to_use',
				'radio_label'        => __('It was hard to use', 'woo-extra-product-options'),
				'reason_type'        => 'text',
				'reason_placeholder' => __('How can we improve your experience?', 'woo-extra-product-options'),
			),

			'found_better_plugin' => array(
				'radio_val'          => 'found_better_plugin',
				'radio_label'        => __('I found a better Plugin', 'woo-extra-product-options'),
				'reason_type'        => 'text',
				'reason_placeholder' => __('Could you please mention the plugin?', 'woo-extra-product-options'),
			),

			// 'not_working_as_expected'=> array(
			// 	'radio_val'          => 'not_working_as_expected',
			// 	'radio_label'        => __('The plugin didn’t work as expected', 'woo-extra-product-options'),
			// 	'reason_type'        => 'text',
			// 	'reason_placeholder' => __('Specify the issue', 'woo-extra-product-options'),
			// ),

			'temporary' => array(
				'radio_val'          => 'temporary',
				'radio_label'        => __('It’s a temporary deactivation - I’m troubleshooting an issue', 'woo-extra-product-options'),
				'reason_type'        => 'checkbox',
				'reason_placeholder' => __('Could you please mention the plugin?', 'woo-extra-product-options'),
			),

			'other' => array(
				'radio_val'          => 'other',
				'radio_label'        => __('Other', 'woo-extra-product-options'),
				'reason_type'        => 'textarea',
				'reason_placeholder' => __('Kindly tell us your reason, so that we can improve', 'woo-extra-product-options'),
			),
		);
	}

	public function thwepo_deactivation_reason(){
		global $wpdb;

		check_ajax_referer('thwepo_deactivate_nonce', 'security');

		if(!isset($_POST['reason'])){
			return;
		}

		if($_POST['reason'] === 'temporary'){

			$snooze_period = isset($_POST['th-snooze-time']) && $_POST['th-snooze-time'] ? $_POST['th-snooze-time'] : MINUTE_IN_SECONDS ;
			$time_now = time();
			$snooze_time = $time_now + $snooze_period;

			update_user_meta(get_current_user_id(), 'thwepof_deactivation_snooze', $snooze_time);

			return;
		}
		
		$data = array(
			'plugin'        => 'wepo',
			'reason' 	    => sanitize_text_field($_POST['reason']),
			'comments'	    => isset($_POST['comments']) ? sanitize_textarea_field(wp_unslash($_POST['comments'])) : '',
	        'date'          => gmdate("M d, Y h:i:s A"),
	        'software'      => $_SERVER['SERVER_SOFTWARE'],
	        'php_version'   => phpversion(),
	        'mysql_version' => $wpdb->db_version(),
	        'wp_version'    => get_bloginfo('version'),
	        'wc_version'    => (!defined('WC_VERSION')) ? '' : WC_VERSION,
	        'locale'        => get_locale(),
	        'multisite'     => is_multisite() ? 'Yes' : 'No',
	        'plugin_version'=> THWEPOF_VERSION
		);

		$response = wp_remote_post('https://feedback.themehigh.in/api/add_feedbacks', array(
	        'method'      => 'POST',
	        'timeout'     => 45,
	        'redirection' => 5,
	        'httpversion' => '1.0',
	        'blocking'    => false,
	        'headers'     => array( 'Content-Type' => 'application/json' ),
	        'body'        => json_encode($data),
	        'cookies'     => array()
	            )
	    );

	    wp_send_json_success();
	}
}
endif;
