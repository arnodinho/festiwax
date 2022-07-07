<?php
/**
 * The template for displaying search forms in dropshipping-store-pro
 *
 * @package dropshipping-store-pro
 */
?>
<form role="search" method="get" class="search-form serach-page" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'dropshipping-store-pro' ); ?>" value="<?php echo esc_attr(the_search_query()); ?>" name="s">
    </label>
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'dropshipping-store-pro' ); ?>" >
</form>