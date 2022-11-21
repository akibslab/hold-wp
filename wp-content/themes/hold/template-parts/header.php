<?php

/**
 * The template for displaying header.
 *
 * @package Hold
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$site_name = get_bloginfo('name');
$tagline   = get_bloginfo('description', 'display');
$header_nav_menu = wp_nav_menu([
  'theme_location' => 'main-menu',
  'menu_class' => 'main-menu',
  'container_class' => 'main-menu-container',
  'fallback_cb' => false,
  'echo' => false,
]);
$custom_logo_id = get_theme_mod('custom_logo');
$customLogo = wp_get_attachment_image_src($custom_logo_id, 'full');


// customizer
$desktopLogo = get_theme_mod('desktop_logo');
$mobileLogo = get_theme_mod('mobile_logo');
$buttonSwitcher = get_theme_mod('header_btn_switcher', true);
$buttonText = get_theme_mod('header_btn_text');
$buttonLink = get_theme_mod('header_btn_link');
?>


<!-- Navigation -->
<header class="site_header">
  <div class="container-xxl">
    <div class="row align-items-center">
      <div class="col-12 d-flex flex-wrap align-items-center justify-content-between">
        <div class="site_log">

          <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php esc_attr_e('Home', 'hold'); ?>" rel="home">
            <div class="logo_img d-none d-lg-block">
              <?php if (!empty($desktopLogo)) : ?>
                <img src="<?php echo esc_url($desktopLogo); ?>" alt="<?php esc_html_e($site_name); ?>">
              <?php elseif (has_custom_logo()) : ?>
                <img src="<?php echo esc_url($customLogo[0]); ?>" alt="<?php esc_html_e($site_name); ?>">
              <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logos/logo.png'); ?>" alt="<?php esc_html_e($site_name); ?>">
              <?php endif; ?>

            </div>
            <div class="logo_img d-lg-none">
              <?php if (!empty($mobileLogo)) : ?>
                <img src="<?php echo esc_url($mobileLogo); ?>" alt="<?php esc_html_e($site_name); ?>">
              <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logos/logo-mobile.png'); ?>" alt="<?php esc_html_e($site_name); ?>">
              <?php endif; ?>
            </div>
          </a>

        </div>

        <nav class="site_navigation d-none d-md-flex">
          <div class="main_menu">
            <?php
            echo $header_nav_menu;
            ?>
          </div>
          <?php if ('true' == $buttonSwitcher) : ?>
            <div class="navigation_button">
              <a href="<?php echo esc_url($buttonText); ?>" class="btn btn-small"><?php esc_html_e($buttonText, 'hold'); ?></a>
            </div>
          <?php endif; ?>
        </nav>
        <div class="mobile-toggle d-md-none">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/mobile-bar.svg'); ?>" alt="mobile_bar">
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Sidemenu Start -->
<div class="side-menu d-md-none">
  <div class="top-area d-flex justify-content-end">
    <div class="cross-icon-box">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/cross.svg'); ?>" class="cross" alt="cross">
    </div>
  </div>

  <div class="mobile-menu"></div>

</div>
<!-- Sidemenu End -->