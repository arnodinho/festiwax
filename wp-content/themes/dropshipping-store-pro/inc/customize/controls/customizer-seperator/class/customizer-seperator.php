<?php

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

if( ! class_exists( 'drop_shipping_pro_Seperator_custom_Control' ) ){

	class drop_shipping_pro_Seperator_custom_Control extends WP_Customize_Control {

		/**
	 * Enqueue our scripts and styles
	 */
		public function enqueue() {
			wp_enqueue_style( 'bwt-seperator-style',get_template_directory_uri().'/inc/customize/controls/customizer-seperator/css/customizer-seperator.css', null, '1.0.0' );
		}

		public function render_content(){ ?>
			<div class="simple-seperator-custom-control">
				<?php if( $this->label ){ ?>
		    	    <span class="customize-control-title">
		    			<?php echo esc_html( $this->label ); ?>
		    		</span>
		    	<?php } ?>

	    		<?php if( $this->description ){ ?>
	    			<span class="description customize-control-description">
	    			<?php echo wp_kses_post( $this->description ); ?>
	    			</span>
	    		<?php } ?>
	    	</div>
        <?php }
	}
}
