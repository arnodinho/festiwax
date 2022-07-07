<?php
/**
 * dropshipping-store-pro Theme Customizer
 *
 * @package dropshipping-store-pro
 */
/**
 * Loads custom control for layout settings
 */
function drop_shipping_pro_custom_controls() {
    require_once get_template_directory() . '/inc/customize/controls/admin/customize-texteditor-control.php';
    require_once get_template_directory() . '/inc/customize/controls/custom-controls.php';

}
add_action( 'customize_register', 'drop_shipping_pro_custom_controls' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function drop_shipping_pro_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->add_setting('kindergarden_eductaion_pro_display_title',array(
        'default' => 'false',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('kindergarden_eductaion_pro_display_title',array(
        'type' => 'checkbox',
        'label' => __('Show Title','dropshipping-store-pro'),
        'section' => 'title_tagline',
    ));
    $wp_customize->add_setting('kindergarden_eductaion_pro_display_tagline',array(
        'default' => 'false',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('kindergarden_eductaion_pro_display_tagline',array(
        'type' => 'checkbox',
        'label' => __('Show Tagline','dropshipping-store-pro'),
        'section' => 'title_tagline',
    ));
    //add home page setting pannel
    $wp_customize->add_panel( 'drop_shipping_pro_panel_id', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Theme Settings', 'dropshipping-store-pro' ),
        'description' => __( 'Description of what this panel does.', 'dropshipping-store-pro' ),
    ) );
    $font_array = array(
        '' => __( 'No Fonts', 'dropshipping-store-pro' ),
        'Abril Fatface' => __( 'Abril Fatface', 'dropshipping-store-pro' ),
        'Acme' => __( 'Acme', 'dropshipping-store-pro' ),
        'Anton' => __( 'Anton', 'dropshipping-store-pro' ),
        'Architects Daughter' => __( 'Architects Daughter', 'dropshipping-store-pro' ),
        'Arimo' => __( 'Arimo', 'dropshipping-store-pro' ),
        'Arsenal' => __( 'Arsenal', 'dropshipping-store-pro' ),
        'Arvo' => __( 'Arvo', 'dropshipping-store-pro' ),
        'Alegreya' => __( 'Alegreya', 'dropshipping-store-pro' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'dropshipping-store-pro' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'dropshipping-store-pro' ),
        'Bangers' => __( 'Bangers', 'dropshipping-store-pro' ),
        'Boogaloo' => __( 'Boogaloo', 'dropshipping-store-pro' ),
        'Bad Script' => __( 'Bad Script', 'dropshipping-store-pro' ),
        'Bitter' => __( 'Bitter', 'dropshipping-store-pro' ),
        'Bree Serif' => __( 'Bree Serif', 'dropshipping-store-pro' ),
        'BenchNine' => __( 'BenchNine', 'dropshipping-store-pro' ),
        'Cabin' => __( 'Cabin', 'dropshipping-store-pro' ),
        'Cardo' => __( 'Cardo', 'dropshipping-store-pro' ),
        'Courgette' => __( 'Courgette', 'dropshipping-store-pro' ),
        'Cherry Swash' => __( 'Cherry Swash', 'dropshipping-store-pro' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'dropshipping-store-pro' ),
        'Crimson Text' => __( 'Crimson Text', 'dropshipping-store-pro' ),
        'Cuprum' => __( 'Cuprum', 'dropshipping-store-pro' ),
        'Cookie' => __( 'Cookie', 'dropshipping-store-pro' ),
        'Chewy' => __( 'Chewy', 'dropshipping-store-pro' ),
        'Days One' => __( 'Days One', 'dropshipping-store-pro' ),
        'Dosis' => __( 'Dosis', 'dropshipping-store-pro' ),
        'Economica' => __( 'Economica', 'dropshipping-store-pro' ),
        'Fredoka One' => __( 'Fredoka One', 'dropshipping-store-pro' ),
        'Fjalla One' => __( 'Fjalla One', 'dropshipping-store-pro' ),
        'Francois One' => __( 'Francois One', 'dropshipping-store-pro' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'dropshipping-store-pro' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'dropshipping-store-pro' ),
        'Great Vibes' => __( 'Great Vibes', 'dropshipping-store-pro' ),
        'Handlee' => __( 'Handlee', 'dropshipping-store-pro' ),
        'Hammersmith One' => __( 'Hammersmith One', 'dropshipping-store-pro' ),
        'Inconsolata' => __( 'Inconsolata', 'dropshipping-store-pro' ),
        'Indie Flower' => __( 'Indie Flower', 'dropshipping-store-pro' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'dropshipping-store-pro' ),
        'Julius Sans One' => __( 'Julius Sans One', 'dropshipping-store-pro' ),
        'Josefin Slab' => __( 'Josefin Slab', 'dropshipping-store-pro' ),
        'Josefin Sans' => __( 'Josefin Sans', 'dropshipping-store-pro' ),
        'Kanit' => __( 'Kanit', 'dropshipping-store-pro' ),
        'Lobster' => __( 'Lobster', 'dropshipping-store-pro' ),
        'Lato' => __( 'Lato', 'dropshipping-store-pro' ),
        'Lora' => __( 'Lora', 'dropshipping-store-pro' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'dropshipping-store-pro' ),
        'Lobster Two' => __( 'Lobster Two', 'dropshipping-store-pro' ),
        'Merriweather' => __( 'Merriweather', 'dropshipping-store-pro' ),
        'Monda' => __( 'Monda', 'dropshipping-store-pro' ),
        'Montserrat' => __( 'Montserrat', 'dropshipping-store-pro' ),
        'Muli' => __( 'Muli', 'dropshipping-store-pro' ),
        'Marck Script' => __( 'Marck Script', 'dropshipping-store-pro' ),
        'Noto Serif' => __( 'Noto Serif', 'dropshipping-store-pro' ),
        'Open Sans' => __( 'Open Sans', 'dropshipping-store-pro' ),
        'Overpass' => __( 'Overpass', 'dropshipping-store-pro' ),
        'Overpass Mono' => __( 'Overpass Mono', 'dropshipping-store-pro' ),
        'Oxygen' => __( 'Oxygen', 'dropshipping-store-pro' ),
        'Orbitron' => __( 'Orbitron', 'dropshipping-store-pro' ),
        'Patua One' => __( 'Patua One', 'dropshipping-store-pro' ),
        'Pacifico' => __( 'Pacifico', 'dropshipping-store-pro' ),
        'Padauk' => __( 'Padauk', 'dropshipping-store-pro' ),
        'Playball' => __( 'Playball', 'dropshipping-store-pro' ),
        'Playfair Display' => __( 'Playfair Display', 'dropshipping-store-pro' ),
        'PT Sans' => __( 'PT Sans', 'dropshipping-store-pro' ),
        'Philosopher' => __( 'Philosopher', 'dropshipping-store-pro' ),
        'Permanent Marker' => __( 'Permanent Marker', 'dropshipping-store-pro' ),
        'Poiret One' => __( 'Poiret One', 'dropshipping-store-pro' ),
        'Quicksand' => __( 'Quicksand', 'dropshipping-store-pro' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'dropshipping-store-pro' ),
        'Raleway' => __( 'Raleway', 'dropshipping-store-pro' ),
        'Rubik' => __( 'Rubik', 'dropshipping-store-pro' ),
        'Rokkitt' => __( 'Rokkitt', 'dropshipping-store-pro' ),
        'Russo One' => __( 'Russo One', 'dropshipping-store-pro' ),
        'Righteous' => __( 'Righteous', 'dropshipping-store-pro' ),
        'Slabo' => __( 'Slabo', 'dropshipping-store-pro' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'dropshipping-store-pro' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'dropshipping-store-pro'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'dropshipping-store-pro' ),
        'Sacramento' => __( 'Sacramento', 'dropshipping-store-pro' ),
        'Shrikhand' => __( 'Shrikhand', 'dropshipping-store-pro' ),
        'Tangerine' => __( 'Tangerine', 'dropshipping-store-pro' ),
        'Ubuntu' => __( 'Ubuntu', 'dropshipping-store-pro' ),
        'VT323' => __( 'VT323', 'dropshipping-store-pro' ),
        'Varela Round' => __( 'Varela Round', 'dropshipping-store-pro' ),
        'Vampiro One' => __( 'Vampiro One', 'dropshipping-store-pro' ),
        'Vollkorn' => __( 'Vollkorn', 'dropshipping-store-pro' ),
        'Volkhov' => __( 'Volkhov', 'dropshipping-store-pro' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'dropshipping-store-pro' )
    );
         
    if ( Whizzie::get_the_suspension_status() == 'false' ){
         //Seperator
        require_once get_template_directory() . '/inc/customize/controls/customizer-notice/class/customizer-notice.php';

        require_once get_template_directory() . '/inc/customize/controls/button-controls.php';

        require_once get_template_directory() . '/inc/customize/controls/customizer-text-radio-button/class/customizer-text-radio-button.php';
        //Customizer Seperator
        require get_template_directory() . '/inc/customize/controls/customizer-seperator/class/customizer-seperator.php';
        //Customizer Reperator
        require get_template_directory() . '/inc/customize/controls/customize-repeater/customize-repeater.php';
        //Slider Line Controls
        require get_template_directory() . '/inc/customize/controls/slider-line-control/slider-line-control.php';
        //Social Icon Picker
        require get_template_directory() . '/inc/customize/controls/social-icons/social-icon-picker.php';
        //general Settings
        require get_template_directory() . '/inc/customize/sections/customizer-custom-variables.php';
        //Top bar
        require get_template_directory() . '/inc/customize/sections/customizer-part-topbar.php';
        //Slider
        require get_template_directory() . '/inc/customize/sections/customizer-part-slide.php';
        
        //Home page sections
        require get_template_directory() . '/inc/customize/sections/customizer-part-home.php';
        
        //Footer
        require get_template_directory() . '/inc/customize/sections/customizer-part-footer.php';

        //Other Pages 
        require get_template_directory() . '/inc/customize/sections/customizer-part-other-page.php';

     }

}
add_action( 'customize_register', 'drop_shipping_pro_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );
//Integer
function drop_shipping_pro_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class drop_shipping_pro_customize {
    /**
     * Returns the instance.
     *
     * @since  1.0.0
     * @access public
     * @return object
     */
    public static function get_instance() {
        static $instance = null;
        if ( is_null( $instance ) ) {
            $instance = new self;
            $instance->setup_actions();
        }
        return $instance;
    }
    /**
     * Constructor method.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function __construct() {}
    /**
     * Sets up initial actions.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setup_actions() {
        // Register scripts and styles for the controls.
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
    }
    /**
     * Loads theme customizer CSS.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue_control_scripts() {
        wp_enqueue_script( 'dropshipping-store-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );
        wp_enqueue_style( 'dropshipping-store-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
    }
}
// Doing this customizer thang!
drop_shipping_pro_customize::get_instance();