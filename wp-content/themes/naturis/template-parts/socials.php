<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Opal  Team <opalwordpress@gmail.com>
 * @copyright  Copyright (C) 2017 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/questions/
 */
/**
 * Enable/distable share box
 */

$heading = apply_filters('naturis_social_heading', esc_html__('Share:', 'naturis'));

if (naturis_get_theme_option('social_share')) {
    ?>
    <div class="naturis-social-share">
        <?php echo '<span class="social-share-header">' . esc_html($heading) . '</span>'; ?>
        <?php if (naturis_get_theme_option('social_share_facebook')): ?>
            <a class="social-facebook"
               href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&display=page"
               target="_blank" title="<?php esc_html_e('Share on facebook', 'naturis'); ?>">
                <i class="naturis-icon-facebook-f"></i>
                <span><?php esc_html_e('Facebook', 'naturis'); ?></span>
            </a>
        <?php endif; ?>

        <?php if (naturis_get_theme_option('social_share_twitter')): ?>
            <a class="social-twitter"
               href="http://twitter.com/home?status=<?php esc_url(get_the_title()); ?> <?php the_permalink(); ?>" target="_blank"
               title="<?php esc_html_e('Share on Twitter', 'naturis'); ?>">
                <i class="naturis-icon-twitter"></i>
                <span><?php esc_html_e('Twitter', 'naturis'); ?></span>
            </a>
        <?php endif; ?>

        <?php if (naturis_get_theme_option('social_share_linkedin')): ?>
            <a class="social-linkedin"
               href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"
               target="_blank" title="<?php esc_html_e('Share on LinkedIn', 'naturis'); ?>">
                <i class="naturis-icon-linkedin-in"></i>
                <span><?php esc_html_e('Linkedin', 'naturis'); ?></span>
            </a>
        <?php endif; ?>

        <?php if (naturis_get_theme_option('social_share_google-plus')): ?>
            <a class="social-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank"
               title="<?php esc_html_e('Share on Google plus', 'naturis'); ?>">
                <i class="naturis-icon-google-plus-g"></i>
                <span><?php esc_html_e('Google+', 'naturis'); ?></span>
            </a>
        <?php endif; ?>

        <?php if (naturis_get_theme_option('social_share_pinterest')): ?>
            <a class="social-pinterest"
               href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;description=<?php echo esc_url(urlencode(get_the_title())); ?>&amp;; ?>"
               target="_blank" title="<?php esc_html_e('Share on Pinterest', 'naturis'); ?>">
                <i class="naturis-icon-pinterest-p"></i>
                <span><?php esc_html_e('Pinterest', 'naturis'); ?></span>
            </a>
        <?php endif; ?>

        <?php if (naturis_get_theme_option('social_share_email')): ?>
            <a class="social-envelope" href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>"
               title="<?php esc_html_e('Email to a Friend', 'naturis'); ?>">
                <i class="naturis-icon-envelope"></i>
                <span><?php esc_html_e('Email', 'naturis'); ?></span>
            </a>
        <?php endif; ?>
    </div>
    <?php
}
?>
