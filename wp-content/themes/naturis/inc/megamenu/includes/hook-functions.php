<?php

defined( 'ABSPATH' ) || exit();

/**
 * Hook to delete post elementor related with this menu
 */
add_action( "before_delete_post", "naturis_megamenu_on_delete_menu_item", 9 );
function naturis_megamenu_on_delete_menu_item( $post_id ) {
	if( is_nav_menu_item($post_id) ){
		$related_id = naturis_megamenu_get_post_related_menu( $post_id );
		if( $related_id ){
			wp_delete_post( $related_id, true );
		}
	}
}



add_filter( 'elementor/editor/footer', 'naturis_megamenu_add_back_button_inspector' );
function naturis_megamenu_add_back_button_inspector() {
	if ( ! isset( $_GET['naturis-menu-editable'] ) || ! $_GET['naturis-menu-editable'] ) {
		return;
	}
	?>
        <script type="text/template" id="tmpl-elementor-panel-footer-content">
            <div id="elementor-panel-footer-back-to-admin" class="elementor-panel-footer-tool elementor-leave-open tooltip-target" data-tooltip="<?php esc_attr_e( 'Back', 'naturis' ); ?>">
				<i class="fa fa-arrow-left" aria-hidden="true"></i>
			</div>
			<div id="elementor-panel-footer-responsive" class="elementor-panel-footer-tool">
				<i class="eicon-device-desktop tooltip-target" aria-hidden="true" data-tooltip="<?php esc_attr_e( 'Responsive Mode', 'naturis' ); ?>"></i>
				<span class="elementor-screen-only">
					<?php echo esc_html__( 'Responsive Mode', 'naturis' ); ?>
				</span>
				<div class="elementor-panel-footer-sub-menu-wrapper">
					<div class="elementor-panel-footer-sub-menu">
						<div class="elementor-panel-footer-sub-menu-item" data-device-mode="desktop">
							<i class="elementor-icon eicon-device-desktop" aria-hidden="true"></i>
							<span class="elementor-title"><?php echo esc_html__( 'Desktop', 'naturis' ); ?></span>
							<span class="elementor-description"><?php echo esc_html__( 'Default Preview', 'naturis' ); ?></span>
						</div>
						<div class="elementor-panel-footer-sub-menu-item" data-device-mode="tablet">
							<i class="elementor-icon eicon-device-tablet" aria-hidden="true"></i>
							<span class="elementor-title"><?php echo esc_html__( 'Tablet', 'naturis' ); ?></span>
							<?php $breakpoints = Elementor\Core\Responsive\Responsive::get_breakpoints(); ?>
							<span class="elementor-description"><?php echo sprintf( esc_html__( 'Preview for %s', 'naturis' ), $breakpoints['md'] . 'px' ); ?></span>
						</div>
						<div class="elementor-panel-footer-sub-menu-item" data-device-mode="mobile">
							<i class="elementor-icon eicon-device-mobile" aria-hidden="true"></i>
							<span class="elementor-title"><?php echo esc_html__( 'Mobile', 'naturis' ); ?></span>
							<span class="elementor-description"><?php echo esc_html__( 'Preview for 360px', 'naturis' ); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div id="elementor-panel-footer-history" class="elementor-panel-footer-tool elementor-leave-open tooltip-target" data-tooltip="<?php esc_attr_e( 'History', 'naturis' ); ?>">
				<i class="fa fa-history" aria-hidden="true"></i>
				<span class="elementor-screen-only"><?php echo esc_html__( 'History', 'naturis' ); ?></span>
			</div>
			<div id="elementor-panel-saver-button-preview" class="elementor-panel-footer-tool tooltip-target" data-tooltip="<?php esc_attr_e( 'Preview Changes', 'naturis' ); ?>">
				<span id="elementor-panel-saver-button-preview-label">
					<i class="fa fa-eye" aria-hidden="true"></i>
					<span class="elementor-screen-only"><?php echo esc_html__( 'Preview Changes', 'naturis' ); ?></span>
				</span>
			</div>
			<div id="elementor-panel-saver-publish" class="elementor-panel-footer-tool">
				<button id="elementor-panel-saver-button-publish" class="elementor-button elementor-button-success elementor-saver-disabled">
					<span class="elementor-state-icon">
						<i class="fa fa-spin fa-circle-o-notch" aria-hidden="true"></i>
					</span>
					<span id="elementor-panel-saver-button-publish-label">
						<?php echo esc_html__( 'Publish', 'naturis' ); ?>
					</span>
				</button>
			</div>
			<div id="elementor-panel-saver-save-options" class="elementor-panel-footer-tool" >
				<button id="elementor-panel-saver-button-save-options" class="elementor-button elementor-button-success tooltip-target elementor-saver-disabled" data-tooltip="<?php esc_attr_e( 'Save Options', 'naturis' ); ?>">
					<i class="fa fa-caret-up" aria-hidden="true"></i>
					<span class="elementor-screen-only"><?php echo esc_html__( 'Save Options', 'naturis' ); ?></span>
				</button>
				<div class="elementor-panel-footer-sub-menu-wrapper">
					<p class="elementor-last-edited-wrapper">
						<span class="elementor-state-icon">
							<i class="fa fa-spin fa-circle-o-notch" aria-hidden="true"></i>
						</span>
						<span class="elementor-last-edited">
							{{{ elementor.config.document.last_edited }}}
						</span>
					</p>
					<div class="elementor-panel-footer-sub-menu">
						<div id="elementor-panel-saver-menu-save-draft" class="elementor-panel-footer-sub-menu-item elementor-saver-disabled">
							<i class="elementor-icon fa fa-save" aria-hidden="true"></i>
							<span class="elementor-title"><?php echo esc_html__( 'Save Draft', 'naturis' ); ?></span>
						</div>
						<div id="elementor-panel-saver-menu-save-template" class="elementor-panel-footer-sub-menu-item">
							<i class="elementor-icon fa fa-folder" aria-hidden="true"></i>
							<span class="elementor-title"><?php echo esc_html__( 'Save as Template', 'naturis' ); ?></span>
						</div>
					</div>
				</div>
			</div>
        </script>

	<?php
}

add_action( 'wp_ajax_naturis_load_menu_data', 'naturis_megamenu_load_menu_data' );
function naturis_megamenu_load_menu_data() {
	$nonce = ! empty( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '';
	$menu_id = ! empty( $_POST['menu_id'] ) ? absint( $_POST['menu_id'] ) : false;
	if ( ! wp_verify_nonce( $nonce, 'naturis-menu-data-nonce' ) || ! $menu_id ) {
		wp_send_json( array(
				'message' => esc_html__( 'Access denied', 'naturis' )
			) );
	}

	$data =  naturis_megamenu_get_item_data( $menu_id );

	$data = $data ? $data : array();
	if( isset($_POST['istop']) && absint($_POST['istop']) == 1  ){
		if ( class_exists( 'Elementor\Plugin' ) ) {
			if( isset($data['enabled']) && $data['enabled'] ){
				$related_id = naturis_megamenu_get_post_related_menu( $menu_id );
				if ( ! $related_id  ) {
					naturis_megamenu_create_related_post( $menu_id );
					$related_id = naturis_megamenu_get_post_related_menu( $menu_id );
				}

				if ( $related_id && isset($_REQUEST['menu_id']) && is_admin() ) {
					$url = Elementor\Plugin::instance()->documents->get( $related_id )->get_edit_url();
					$data['edit_submenu_url'] = add_query_arg( array( 'naturis-menu-editable' => 1 ), $url );
				}
			} else {
				$url = admin_url();
				$data['edit_submenu_url'] = add_query_arg( array( 'naturis-menu-createable' => 1, 'menu_id' => $menu_id ), $url );
			}
		}
	}

	$results = apply_filters( 'naturis_menu_settings_data', array(
			'status' => true,
			'data' => $data
	) );

	wp_send_json( $results );

}

add_action( 'wp_ajax_naturis_update_menu_item_data', 'naturis_megamenu_update_menu_item_data' );
function naturis_megamenu_update_menu_item_data() {
	$nonce = ! empty( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '';
	if ( ! wp_verify_nonce( $nonce, 'naturis-update-menu-item' ) ) {
		wp_send_json( array(
				'message' => esc_html__( 'Access denied', 'naturis' )
			) );
	}

	$settings = ! empty( $_POST['naturis-menu-item'] ) ? ($_POST['naturis-menu-item']) : array();
	$menu_id = ! empty( $_POST['menu_id'] ) ? absint( $_POST['menu_id'] ) : false;

	do_action( 'naturis_before_update_menu_settings', $settings );


	naturis_megamenu_update_item_data( $menu_id, $settings );

	do_action( 'naturis_menu_settings_updated', $settings );
	wp_send_json( array( 'status' => true ) );
}

add_action( 'admin_footer', 'naturis_megamenu_underscore_template' );
function naturis_megamenu_underscore_template() {
	global $pagenow;
	if ( $pagenow === 'nav-menus.php' ) { ?>
		<script type="text/html" id="tpl-naturis-menu-item-modal">
			<div id="naturis-modal" class="naturis-modal">
				<div id="naturis-modal-body" class="<%= data.edit_submenu === true ? 'edit-menu-active' : ( data.is_loading ? 'loading' : '' ) %>">
					<% if ( data.edit_submenu !== true && data.is_loading !== true ) { %>
						<form id="menu-edit-form">
					<% } %>
						<div class="naturis-modal-content">
							<% if ( data.edit_submenu === true ) { %>
								<iframe src="<%= data.edit_submenu_url %>" />
							<% } else if ( data.is_loading === true ) { %>
								<i class="fa fa-spin fa-spinner"></i>
							<% } else { %>

							<div class="form-group toggle-select-setting">
								<label for="icon"><?php esc_html_e( 'Icon', 'naturis' ) ?></label>
								<select id="icon" name="naturis-menu-item[icon]" class="form-control icon-picker naturis-input-switcher naturis-input-switcher-true" data-target=".icon-custom">
									<option value=""<%= data.icon == '' ? ' selected' : '' %>><?php echo esc_html__( "No Use", "naturis" ) ?></option>
									<option value="1"<%= data.icon == 1 ? ' selected' : '' %>><?php echo esc_html__( "Custom Class", "naturis" ) ?></option>
									<?php foreach ( naturis_megamenu_get_fontawesome_icons() as $value ) : ?>
										<option value="<?php echo 'naturis-icon-'.esc_attr( $value ) ?>"<%= data.icon == '<?php echo 'naturis-icon-'.esc_attr( $value ) ?>' ? ' selected' : '' %>><?php echo esc_attr( $value ) ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group icon-custom toggle-select-setting elementor-hidden">
								<label for="icon-custom"><?php esc_html_e( 'Icon Class Name', 'naturis' ) ?></label>
								<input type="text" name="naturis-menu-item[icon-custom]" class="input" id="icon-custom"/>
							</div>
							<div class="form-group">
								<label for="icon_color"><?php esc_html_e( 'Icon Color', 'naturis' ) ?></label>
								<input class="color-picker" name="naturis-menu-item[icon_color]" value="<%= data.icon_color %>" id="icon_color" />
							</div>

								<div class="form-group submenu-setting toggle-select-setting">
									<label><?php esc_html_e( 'Mega Submenu Enabled', 'naturis' ) ?></label>
									<select name="naturis-menu-item[enabled]" class="naturis-input-switcher naturis-input-switcher-true" data-target=".submenu-width-setting">
										<option value="1" <%= data.enabled == 1? 'selected':'' %>> <?php esc_html_e( 'Yes', 'naturis' ) ?></opttion>
										<option value="0" <%= data.enabled == 0? 'selected':'' %>><?php esc_html_e( 'No', 'naturis' ) ?></opttion>
									</select>
									<button id="edit-megamenu" class="button button-primary button-large">
										<?php esc_html_e( 'Edit Megamenu Submenu', 'naturis' ) ?>
									</button>
								</div>

								<div class="form-group submenu-width-setting toggle-select-setting elementor-hidden">
									<label><?php esc_html_e( 'Sub Megamenu Width', 'naturis' ) ?></label>
									<select name="naturis-menu-item[customwidth]" class="naturis-input-switcher naturis-input-switcher-true" data-target=".submenu-subwidth-setting">
                                        <option value="1" <%= data.customwidth == 1? 'selected':'' %>> <?php esc_html_e( 'Yes', 'naturis' ) ?></opttion>
                                        <option value="0" <%= data.customwidth == 0? 'selected':'' %>><?php esc_html_e( 'Full Width', 'naturis' ) ?></opttion>
                                        <option value="2" <%= data.customwidth == 2? 'selected':'' %>><?php esc_html_e( 'Stretch Width', 'naturis' ) ?></opttion>
                                        <option value="3" <%= data.customwidth == 3? 'selected':'' %>><?php esc_html_e( 'Container Width', 'naturis' ) ?></opttion>
									</select>
								</div>

								<div class="form-group submenu-width-setting submenu-subwidth-setting toggle-select-setting elementor-hidden">
									<label for="menu_subwidth"><?php esc_html_e( 'Sub Mega Menu Max Width', 'naturis' ) ?></label>
									<input type="text" name="naturis-menu-item[subwidth]" value="<%= data.subwidth?data.subwidth:'600' %>" class="input" id="menu_subwidth" />
									<span class="unit">px</span>
								</div>

                                <div class="form-group submenu-width-setting submenu-subwidth-setting toggle-select-setting elementor-hidden">
                                    <label><?php esc_html_e( 'Sub Mega Menu Position Left', 'naturis' ) ?></label>
                                    <select name="naturis-menu-item[menuposition]">
                                        <option value="0" <%= data.menuposition == 0? 'selected':'' %>><?php esc_html_e( 'No', 'naturis' ) ?></opttion>
                                        <option value="1" <%= data.menuposition == 1? 'selected':'' %>> <?php esc_html_e( 'Yes', 'naturis' ) ?></opttion>
                                    </select>
                                </div>

							<% } %>
						</div>
						<% if ( data.is_loading !== true && data.edit_submenu !== true ) { %>
							<div class="naturis-modal-footer">
								<a href="#" class="close button"><%= naturis_memgamnu_params.i18n.close %></a>
								<?php wp_nonce_field( 'naturis-update-menu-item', 'nonce' ) ?>
								<input name="menu_id" value="<%= data.menu_id %>" type="hidden" />
								<button type="submit" class="button button-primary button-large menu-save pull-right"><%= naturis_memgamnu_params.i18n.submit %></button>
							</div>
						<% } %>
					<% if ( data.edit_submenu !== true && data.is_loading !== true ) { %>
						</form>
					<% } %>
				</div>
				<div class="naturis-modal-overlay"></div>
			</div>
		</script>
	<?php }
}







