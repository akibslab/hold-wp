<?php

/**
 * Theme functions and definitions
 *
 * @package Hold
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!defined('HOLDVERSIONVERSION')) {
    // Replace the version number of the theme on each release.
    define('HOLDVERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if (!function_exists('hold_support')) {
    /**
     * Set up theme support.
     *
     */
    function hold_support() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain('hold', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
            ]
        );

        // Editor Style.
        add_editor_style('classic-editor.css');

        // Gutenberg wide images.
        add_theme_support('align-wide');

        /**
         * Woocommerce
         */

        // WooCommerce in general.
        add_theme_support('woocommerce');
        // Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
        // zoom.
        add_theme_support('wc-product-gallery-zoom');
        // lightbox.
        add_theme_support('wc-product-gallery-lightbox');
        // swipe.
        add_theme_support('wc-product-gallery-slider');

        // Add support for core custom logo.
        add_theme_support(
            'custom-logo',
            [
                'height'      => 100,
                'width'       => 350,
                'flex-height' => true,
                'flex-width'  => true,
            ]
        );

        // Add support for custom background.
        add_theme_support('custom-background');

        // Add support for custom header
        add_theme_support('custom-header');

        // Add support for responsive embeds
        add_theme_support("responsive-embeds");

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'main-menu'   => __('Header Menu', 'hold'),
            'footer-menu' => __('Footer Menu', 'hold'),
        ));
    }
}
add_action('after_setup_theme', 'hold_support');

/**
 * Theme Scripts & Styles.
 *
 * @return void
 */
if (!function_exists('hold_scripts_styles')) {
    function hold_scripts_styles() {
        // Load CSS
        wp_enqueue_style('hold-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap-5.2.2.min.css', [], '5.2.2', 'all');
        wp_enqueue_style('hold-fontAwesome', get_template_directory_uri() . '/assets/css/font-awesome-pro.css', [], '1.0.1', 'all');
        wp_enqueue_style('hold-magnificPopup', get_template_directory_uri() . '/assets/css/magnific-popup.css', [], '1.0.1', 'all');
        wp_enqueue_style('hold-meanMenu', get_template_directory_uri() . '/assets/css/meanmenu.css', [], '1.0.1', 'all');
        wp_enqueue_style('hold-slick', get_template_directory_uri() . '/assets/css/slick.min.css', [], '1.0.1', 'all');
        wp_enqueue_style('hold-main', get_template_directory_uri() . '/assets/css/main.css', [], HOLDVERSION, 'all');
        wp_enqueue_style('hold-responsive', get_template_directory_uri() . '/assets/css/responsive.css', [], HOLDVERSION, 'all');
        wp_enqueue_style('hold-style', get_stylesheet_uri(), [], HOLDVERSION);

        // Load JS
        wp_enqueue_script('hold-modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.5.0.min.js', ['jquery'], '1.0.0', true);
        wp_enqueue_script('hold-bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.bundle-5.2.2.min.js', ['jquery'], '1.0.0', true);
        wp_enqueue_script('hold-magnificPopup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', ['jquery'], '1.0.0', true);
        wp_enqueue_script('hold-meanMenu', get_template_directory_uri() . '/assets/js/meanmenu.js', ['jquery'], '1.0.0', true);
        wp_enqueue_script('hold-slick', get_template_directory_uri() . '/assets/js/slick.min.js', ['jquery'], '1.0.0', true);
        wp_enqueue_script('hold-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], HOLDVERSION, true);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('wp_enqueue_scripts', 'hold_scripts_styles');

/**
 * Register Elementor Locations.
 *
 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
 *
 * @return void
 */
function hold_register_elementor_locations($elementor_theme_manager) {

    $elementor_theme_manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'hold_register_elementor_locations');

/**
 * Elementor notice about the plugin is not activated.
 */
if (is_admin()) {
    require get_template_directory() . '/inc/admin-functions.php';
}

/**
 * Check hide title.
 *
 * @param bool $val default value.
 *
 * @return bool
 */
if (!function_exists('hold_check_hide_title')) {
    function hold_check_hide_title($val) {
        if (defined('ELEMENTOR_VERSION')) {
            $current_doc = Elementor\Plugin::instance()->documents->get(get_the_ID());
            if ($current_doc && 'yes' === $current_doc->get_settings('hide_title')) {
                $val = false;
            }
        }
        return $val;
    }
}
add_filter('hold_page_title', 'hold_check_hide_title');

/**
 * Wrapper function to deal with backwards compatibility.
 */
if (!function_exists('hold_body_open')) {
    function hold_body_open() {
        if (function_exists('wp_body_open')) {
            wp_body_open();
        } else {
            do_action('wp_body_open');
        }
    }
}


function hold_kses($raw) {

    $allowed_tags = array(
        'a'                         => array(
            'class'   => array(),
            'href'    => array(),
            'rel'  => array(),
            'title'   => array(),
            'target' => array(),
        ),
        'abbr'                      => array(
            'title' => array(),
        ),
        'b'                         => array(),
        'blockquote'                => array(
            'cite' => array(),
        ),
        'cite'                      => array(
            'title' => array(),
        ),
        'code'                      => array(),
        'del'                    => array(
            'datetime'   => array(),
            'title'      => array(),
        ),
        'dd'                     => array(),
        'div'                    => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'dl'                     => array(),
        'dt'                     => array(),
        'em'                     => array(),
        'h1'                     => array(),
        'h2'                     => array(),
        'h3'                     => array(),
        'h4'                     => array(),
        'h5'                     => array(),
        'h6'                     => array(),
        'i'                         => array(
            'class' => array(),
        ),
        'img'                    => array(
            'alt'  => array(),
            'class'   => array(),
            'height' => array(),
            'src'  => array(),
            'width'   => array(),
        ),
        'li'                     => array(
            'class' => array(),
        ),
        'ol'                     => array(
            'class' => array(),
        ),
        'p'                         => array(
            'class' => array(),
        ),
        'q'                         => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'                      => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'                 => array(
            'width'         => array(),
            'height'     => array(),
            'scrolling'     => array(),
            'frameborder'   => array(),
            'allow'         => array(),
            'src'        => array(),
        ),
        'strike'                 => array(),
        'br'                     => array(),
        'strong'                 => array(),
        'data-wow-duration'            => array(),
        'data-wow-delay'            => array(),
        'data-wallpaper-options'       => array(),
        'data-stellar-background-ratio'   => array(),
        'ul'                     => array(
            'class' => array(),
        ),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}


/**
 * Allow svg
 */
include_once 'inc/allow-svg.php';



/**
 * TGM Plugin Activator
 */
if (!class_exists('TGM_Plugin_Activation')) {
    include_once 'inc/tgm-plugin-activation.php';
    include_once 'inc/required-plugins.php';
}

/**
 * 
 */
if (class_exists('Kirki')) {
    include_once 'inc/hold-customizer.php';
}
