<?php
// This is the secret key for API authentication.
// This key will match the 'Secret Key for License Verification Requests' Key in the Software License Manager plugin settings
define( 'BWT_EPHEMERIS_SECRET_KEY', '5dc10213c492f0.80149991' );
// This is the URL where API query request will be sent to.
// This should be the URL of the site where you have installed the Software License Manager plugin.
define( 'BWT_STORE_URL', 'https://www.buywptemplates.com/' );
// This is a value that will be recorded in the Software License Manager data so you can identify licenses for this item/product.
define( 'BWT_ITEM_REFERENCE', 'BWT Transport Movers PRO' );
/**
 * Create our License Management settings page admin option and call the function to create our settings page
 */
function bwt_product_license_menu() {
    
     add_theme_page('BWT License Activation Menu', 'BWT Key Activation', 'manage_options', 'BWT-key-activation', 'bwt_product_license_page');
}
add_action( 'admin_menu', 'bwt_product_license_menu' );
/**
 * Create our License Management settings page
 */
function bwt_product_license_page() {
    $license = get_option( 'bwt_product_license_key' );
    $status = get_option( 'bwt_product_license_status' );
    ?>
    <div class="wrap">
        <h2 class="key_head"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/key-logo.png" alt="" width="150"><?php echo esc_html( 'BWT Dropshipping Store Pro License Management', 'dropshipping-store-pro' ); ?></h2>
        <form method="post" action="options.php" class="bwt_key_activation_form">

            <?php settings_fields( 'bwt_product_license' ); ?>

            <table class="form-table">
                <tbody>
                    <?php if ( $status != 'valid' ) { ?>

                        <tr valign="top">
                            <th scope="row" valign="top">
                                <?php echo esc_html( 'License Key','dropshipping-store-pro'); ?>
                            </th>
                            <td>
                                <input id="bwt_product_license_key" name="bwt_product_license_key" type="text" class="regular-text" value="<?php echo esc_attr( $license ); ?>" />
                                <p class="description" for="bwt_product_license_key"><?php echo esc_html( '( Enter your license key here )', 'dropshipping-store-pro' ); ?></p>
                                <div class="BWT_info"></div>
                                
                            </td>
                        </tr>
                    <?php } ?>

                    <?php if ( $license != '' ) { ?>
                        <tr valign="top">

                                <?php if ( $status !== false && $status == 'valid' ) { ?>
                                    <th scope="row" valign="top">
                                        <?php echo esc_html( 'License Status', 'dropshipping-store-pro' ); ?>
                                    </th>
                                    <td>
                                    <span class="license_ad_status" style="color:green; line-height:30px; padding-right:10px"><?php echo esc_html( 'Active', 'dropshipping-store-pro' ); ?></span>
                                    
                                    <input type="hidden" class="button-secondary" name="bwt_license_clientside_activation_status" value="<?php echo esc_html( 'Active' ); ?>"/>
                                    <?php wp_nonce_field( 'bwt_product_nonce', 'bwt_product_nonce' ); ?>
                                        <input type="submit" class="button-secondary" name="bwt_license_deactivate" value="<?php echo esc_html( 'Deactivate License', 'dropshipping-store-pro' ); ?>"/>
                                    </td>
                                <?php } else {
                                    wp_nonce_field( 'bwt_product_nonce', 'bwt_product_nonce' ); ?>
                                    <th scope="row" valign="top">
                                        <?php echo esc_html( 'Activate License', 'dropshipping-store-pro' ); ?>
                                    </th>
                                    <td>
                                        <input type="submit" class="button-secondary" name="bwt_license_activate" value="<?php echo esc_html( 'Activate License', 'dropshipping-store-pro' ); ?>"/>
                                    </td>

                                <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
            if ( empty( $license ) || $status != 'valid' ) {
                // If there's a valid license, we don't need to display the Save Changes submit button
                submit_button();
            }
            ?>

        </form>
    <?php
}
/**
 * Create our settings in the options table
 */
function bwt_product_register_option() {
    register_setting( 'bwt_product_license', 'bwt_product_license_key', 'bwt_product_sanitize_license' );
}
add_action( 'admin_init', 'bwt_product_register_option' );
/**
 * If we've entered a new key, make sure the old status is removed first as it will need to be reactivated
 */
function bwt_product_sanitize_license( $new_key ) {
    $old_key = get_option( 'bwt_product_license_key' );
    if( $old_key && $old_key != $new_key ) {
        delete_option( 'bwt_product_license_status' );
    }
    return $new_key;
}
/**
 * Check with our Software License Manager API if we can activate the License Key
 */
function bwt_product_activate_license() {
    $return_val = false;
    // Listen for our activate button to be clicked
    if( isset( $_POST['bwt_license_activate'] ) ) {
        // Check our nonce to validate the form request came from the current site and not somewhere else
        if( ! check_admin_referer( 'bwt_product_nonce', 'bwt_product_nonce' ) ) {
            return;
        }
        // Retrieve the License Key from the database
        $license = trim( get_option( 'bwt_product_license_key' ) );
        $api_params = array(
            'secret_key' => BWT_EPHEMERIS_SECRET_KEY,
            'slm_action' => 'slm_activate',
            'license_key' => $license,
            'registered_domain' => home_url(),
            'item_reference' => BWT_ITEM_REFERENCE
            );
        // Call the Software License Manager API.
        $response = wp_remote_get(
            add_query_arg( $api_params, trailingslashit( BWT_STORE_URL ) ),
            array(
                'timeout' => 15,
                'sslverify' => false
            )
        );

        //var_dump($response); exit();
        // Make sure the response returned ok before continuing any further
        if ( is_wp_error( $response ) ) {
            return false;
        }
        if ( is_array( $response ) ) {
            $json = $response['body'];
            $json = preg_replace( '/[\x00-\x1F\x80-\xFF]/', '', utf8_encode( $json ) );
            $license_data = json_decode( $json );
        }
        if ( $license_data->result == 'success' ) {
            // If activated successfully, update our status
            update_option( 'bwt_product_license_status', 'valid' );
            update_option( 'bwt_license_clientside_activation_status', 'Active' );

             $return_val = true;
        }
        else {
            update_option( 'bwt_product_license_status', 'invalid' );
            $return_val = false;
        }
    }
     return $return_val;
}
add_action( 'admin_init', 'bwt_product_activate_license' );
/**
 * Check with our Software License Manager API if we can deactivate the License Key
 */
function bwt_product_deactivate_license() {
    $return_val = false;
    $domain_already_inactive = 80;
    // listen for our deactivate button to be clicked
    if( isset( $_POST['bwt_license_deactivate'] ) ) {
        // Check our nonce to validate the form request came from the current site and not somewhere else
        if( ! check_admin_referer( 'bwt_product_nonce', 'bwt_product_nonce' ) ) {
            return;
        }
        // Retrieve the License Key from the database
        $license = trim( get_option( 'bwt_product_license_key' ) );
        $api_params = array(
        'secret_key' => BWT_EPHEMERIS_SECRET_KEY,
        'slm_action' => 'slm_deactivate',
        'license_key' => $license,
        'registered_domain' => home_url(),
        'item_reference' => BWT_ITEM_REFERENCE
        );
        // Call the Software License Manager API.
        $response = wp_remote_get(
            add_query_arg( $api_params, trailingslashit( BWT_STORE_URL ) ),
            array(
                'timeout' => 15,
                'sslverify' => false
            )
        );
        // Make sure the response returned ok before continuing any further
        if ( is_wp_error( $response ) ) {
            return false;
        }
        if ( is_array( $response ) ) {
            $json = $response['body'];
            $json = preg_replace( '/[\x00-\x1F\x80-\xFF]/', '', utf8_encode( $json ) );
            $license_data = json_decode( $json );
        }
        if ( $license_data->result == 'success' || $license_data->error_code == $domain_already_inactive ) {
            // If deactivated successfully or if it's already been deactivated previously, update our status
            delete_option( 'bwt_product_license_status' );
            $return_val = true;
        }
        else {
            $return_val = false;
        }
    }
    return $return_val;
}
add_action( 'admin_init', 'bwt_product_deactivate_license' );

/**
 * Check with our Software License Manager API to verify the License Key
 */
function bwt_product_activated_license_verification() {

    $license = trim( get_option( 'bwt_product_license_key' ) );

    if($license !=''){

        $status = get_option( 'bwt_product_license_status' );
        $activation_status = get_option( 'bwt_license_clientside_activation_status' );

        $api_params = array(
            'secret_key' => BWT_EPHEMERIS_SECRET_KEY,
            'slm_action' => 'slm_check',
            'license_key' => $license,
            'registered_domain' => home_url(),
            'item_reference' => BWT_ITEM_REFERENCE
            );
        // Call the Software License Manager API.
        $response = wp_remote_get(
            add_query_arg( $api_params, trailingslashit( BWT_STORE_URL ) ),
            array(
                'timeout' => 15,
                'sslverify' => false
            )
        );

        // var_dump($response);

        // Make sure the response returned ok before continuing any further
        if ( is_wp_error( $response ) ) {
            return false;
        }
        if ( is_array( $response ) ) {
            $json = $response['body'];
            $json = preg_replace( '/[\x00-\x1F\x80-\xFF]/', '', utf8_encode( $json ) );
            $license_data = json_decode( $json );
        }
        
        if ( $license_data->result == 'error' ) {
            $license_data->status = '';
            add_action( 'admin_notices', 'license_key_invalid_notice' );
        }

        if ( $license_data->status == 'blocked' ) {
            delete_option( 'bwt_product_license_status' );
            add_action( 'admin_notices', 'license_key_blocked_notice' );
        }
        elseif( $license_data->status == 'expired'){
            add_action( 'admin_notices', 'license_key_expired_notice' );
        }
    }

}
add_action( 'admin_init', 'bwt_product_activated_license_verification' );

function varifying_status_key_activation(){
    $sample_license_key = get_option('bwt_product_license_key');
    $status = get_option( 'bwt_product_license_status' );

    if($status){
        return true;
    }
    else{
        return false;
    }

}
add_action('init','varifying_status_key_activation');

function license_key_blocked_notice() {
   ?>
   <div class="notice notice-error my-dismiss-notice is-dismissible">
      <p><?php _e( 'Your theme license key has blocked. Please contact your services provider for the License key activation.', 'dropshipping-store-pro' );?></p>
   </div>
   <?php 
}

function license_key_expired_notice() {
   ?>
   <div class="notice notice-info my-dismiss-notice is-dismissible">
      <p><?php _e( 'Your theme license key has expired. Please renew it.', 'dropshipping-store-pro' );?></p>
   </div>
   <?php 
}

function license_key_invalid_notice() {
   ?>
   <div class="notice notice-error my-dismiss-notice is-dismissible">
      <p><?php _e( 'License key is invalid. Please check it once.', 'dropshipping-store-pro' );?></p>
   </div>
   <?php 
}