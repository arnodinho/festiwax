<header id="masthead" class="site-header header-1" role="banner">
    <div class="header-container">
        <div class="container header-main">
            <div class="header-left">
                <?php
                naturis_site_branding();
                if (naturis_is_woocommerce_activated()) {
                    ?>
                    <div class="site-header-cart header-cart-mobile">
                        <?php naturis_cart_link(); ?>
                    </div>
                    <?php
                }
                ?>
                <?php naturis_mobile_nav_button(); ?>
            </div>
            <div class="header-center">
                <?php naturis_primary_navigation(); ?>
            </div>
            <div class="header-right desktop-hide-down">
                <div class="header-group-action">
                    <?php
                    naturis_header_account();
                    if (naturis_is_woocommerce_activated()) {
                        naturis_header_wishlist();
                        naturis_header_cart();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header><!-- #masthead -->
