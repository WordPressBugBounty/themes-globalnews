<?php

/**
 * List block part for displaying header content in page.php
 *
 * @package MoreNews
 */

 $select_header_image_mode = morenews_get_option('select_header_image_mode');
$inline_style = '';
$morenews_class = '';
$morenews_background = '';
if (has_header_image()) {
    if ($select_header_image_mode == 'above') {
        $morenews_class = 'af-header-image';    
      } else {
      $morenews_class = 'af-header-image data-bg';
      $morenews_background = get_header_image();
      // Set inline style for background-image
      $inline_style = 'style="background-image: url(' . esc_url($morenews_background) . ');"';
      }
}
$morenews_show_top_header_section = morenews_get_option('show_top_header_section');
?>
<?php if ($morenews_show_top_header_section) : ?>

    <div class="top-header">
        <div class="container-wrapper">
            <div class="top-bar-flex">
                <div class="top-bar-left col-2">

                    <div class="date-bar-left">
                        <?php do_action('morenews_load_date'); ?>
                    </div>
                </div>
                <div class="top-bar-right col-2">
                    <div class="aft-small-social-menu">
                        <?php do_action('morenews_load_social_menu'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="mid-header-wrapper <?php echo esc_attr($morenews_class); ?>" <?php echo $inline_style; ?>>

    <div class="mid-header">
        <div class="container-wrapper">
        <?php if (has_header_image() && $select_header_image_mode == 'above') : ?>
    <div class="header-image-above-site-title">
        <img src="<?php echo esc_url(get_header_image()); ?>" alt="<?php echo esc_attr(get_bloginfo('title')); ?>" />
        </div>
    <?php endif; ?>
            <div class="mid-bar-flex">
                <div class="logo">
                    <?php do_action('morenews_load_site_branding'); ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    $morenews_banner_advertisement = morenews_get_option('banner_advertisement_section');
    if (('' != $morenews_banner_advertisement) || is_active_sidebar('home-advertisement-widgets')) {
    $morenews_banner_advertisement_scope = morenews_get_option('banner_advertisement_scope');
    if ($morenews_banner_advertisement_scope == 'front-page-only') :
        if (is_home() || is_front_page()) :
    ?>
            <div class="below-mid-header">
                <div class="container-wrapper">
                    <div class="header-promotion">
                        <?php do_action('morenews_action_banner_advertisement'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <div class="below-mid-header">
            <div class="container-wrapper">
                <div class="header-promotion">
                    <?php do_action('morenews_action_banner_advertisement'); ?>
                </div>
            </div>
        </div>
    <?php endif; 
    } ?>

</div>
<div id="main-navigation-bar" class="bottom-header">
    <div class="container-wrapper">
        <div class="bottom-nav">
            <div class="offcanvas-navigaiton">
                <?php if (is_active_sidebar('express-off-canvas-panel')) : ?>
                    <div class="off-cancas-panel">
                        <?php do_action('morenews_load_off_canvas'); ?>
                    </div>
                    <div id="sidr" class="primary-background">
                        <a class="sidr-class-sidr-button-close" href="#sidr-nav"><i class="fa fa-window-close"></i></a>
                        <?php dynamic_sidebar('express-off-canvas-panel'); ?>
                    </div>
                <?php endif; ?>
                <?php do_action('morenews_action_main_menu_nav'); ?>
                <div class="search-watch">
                    <?php do_action('morenews_load_search_form'); ?>
                    <?php do_action('morenews_load_watch_online'); ?>
                </div>

            </div>

        </div>
    </div>