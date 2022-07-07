<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
/**
 * Class to create a custom text editor control
 */
class drop_shipping_pro_Editor_Control extends WP_Customize_Control {
	public $type = 'editor';
	public function render_content() { ?>
		<script type="text/javascript">
			(function($) {
				wp.customizerCtrlEditor = {
					init: function() {
						$(window).load(function() {
							$('textarea.wp-editor-area').each(function() {
								var tArea = $(this),
									id = tArea.attr('id'),
									input = $('input[data-customize-setting-link="' + id + '"]'),
									editor = tinyMCE.get(id),
									setChange,
									content;
								if (editor) {
									editor.on('change', function(e) {
										editor.save();
										content = editor.getContent();
										clearTimeout(setChange);
										setChange = setTimeout(function() {
											input.val(content).trigger('change');
										}, 500);
									});
								}
								tArea.css({
									visibility: 'visible'
								}).on('keyup', function() {
									content = tArea.val();
									clearTimeout(setChange);
									setChange = setTimeout(function() {
										input.val(content).trigger('change');
									}, 500);
								});
							});
						});
					}
				};
				wp.customizerCtrlEditor.init();
			})(jQuery);
		</script>
		<label>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
			</span>
			<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
		</label>
		<?php
		$settings = array(
			'textarea_name'    => $this->id,
			'teeny'            => true,
		);
		wp_editor( $this->value(), $this->id, $settings );
		do_action('admin_print_footer_scripts');
	}
}

/**
 * Text sanitization
 *
 * @param  string	Input to be sanitized (either a string containing a single string or multiple, separated by commas)
 * @return string	Sanitized input
 */
if ( ! function_exists( 'drop_shipping_pro_text_sanitization' ) ) {
	function drop_shipping_pro_text_sanitization( $input ) {
		if ( strpos( $input, ',' ) !== false) {
			$input = explode( ',', $input );
		}
		if( is_array( $input ) ) {
			foreach ( $input as $key => $value ) {
				$input[$key] = sanitize_text_field( $value );
			}
			$input = implode( ',', $input );
		}
		else {
			$input = sanitize_text_field( $input );
		}
		return $input;
	}
}
