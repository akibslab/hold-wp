<?php

/**
 * The template for displaying footer.
 *
 * @package Hold
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$footer_nav_menu = wp_nav_menu([
  'theme_location' => 'footer-menu',
  'menu_class' => 'footer_menu',
  'fallback_cb'    => false,
  'echo'           => false,
]);

// customizer
$logo = get_theme_mod('footer_logo');
$logoTitle = get_theme_mod('footer_title');
$address = get_theme_mod('footer_address');
$phone = get_theme_mod('footer_phone');
$email = get_theme_mod('footer_email');
$buttonSwitcher = get_theme_mod('footer_btn_switcher', true);
$buttonText = get_theme_mod('footer_btn_text');
$buttonLink = get_theme_mod('footer_btn_link');
$socialsSwitcher = get_theme_mod('footer_socials_switcher', true);
$facebook = get_theme_mod('facebook_link');
$instagram = get_theme_mod('instagram_link');
$youtube = get_theme_mod('youtube_link');
$linkedin = get_theme_mod('linkedin_link');

?>
<!-- Footer -->
<footer class="site_footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 offset-xl-1">
        <div class="footer_widget">
          <div class="footer_logo">
            <?php if (!empty($logo)) : ?>
              <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>"></a>
            <?php else : ?>
              <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/footer_logo.png" alt="<?php bloginfo('name'); ?>"></a>
            <?php endif; ?>
          </div>
          <div class="footer_address">
            <h4 class="title"><?php esc_html_e($logoTitle, 'hold'); ?></h4>
            <p class="address"><?php echo hold_kses($address); ?></p>
            <?php if (!empty($phone)) : ?>
              <span class="phone"><?php esc_html_e('Tel.', 'hold'); ?> <a href="tel:<?php echo esc_url($phone); ?>" target="_blank"><?php esc_html_e($phone, 'hold'); ?></a></span>
            <?php endif;
            if (!empty($email)) : ?>
              <ul class="footer_socials">
                <li><a href="mailto:<?php echo esc_url($email); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/Mail.svg'); ?>" alt="email"></a></li>
              </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-md-6 offset-md-3 col-lg-3 offset-lg-0">
        <div class="footer_widget" id="footer-menu">
          <div class="widget_inner">
            <!-- <div class="widget_title">
                        <h5>House of Life Design</h5>
                     </div> -->
            <?php if ($footer_nav_menu) {
              echo $footer_nav_menu;
            }; ?>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-3 text-center text-lg-end">
        <div class="footer_widget ">
          <div class="footer_right text-center  text-lg-start">
            <?php if ('true' == $socialsSwitcher) : ?>
              <ul class="footer_socials">
                <?php if (!empty($facebook)) : ?>
                  <li><a href="<?php echo esc_url($facebook); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/facebook.svg'); ?>" alt=""></a></li>
                <?php endif;
                if (!empty($instagram)) : ?>
                  <li><a href="<?php echo esc_url($instagram); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/instagram.svg'); ?>" alt=""></a></li>
                <?php endif;
                if (!empty($youtube)) : ?>
                  <li><a href="<?php echo esc_url($youtube); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/youtube.svg'); ?> " alt=""></a></li>
                <?php endif;
                if (!empty($linkedin)) : ?>
                  <li><a href="<?php echo esc_url($linkedin); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/linkedin.svg'); ?>" alt=""></a></li>
                <?php endif; ?>
              </ul>
            <?php endif;
            if ('true' == $buttonSwitcher) : ?>
              <div class="footer_button">
                <a href="<?php echo esc_url($buttonLink); ?>" class="btn btn-white"><?php esc_html_e($buttonText, 'hold'); ?></a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>