<?php


/**
 * Get a translatable string with allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return string
 */
function tj_get_allowed_html_desc($level = 'basic') {
  if (!in_array($level, ['basic', 'intermediate', 'advance'])) {
    $level = 'basic';
  }

  $tags_str = '<' . implode('>,<', array_keys(tj_get_allowed_html_tags($level))) . '>';
  return sprintf(__('This input field has support for the following HTML tags: %1$s', 'tjcore'), '<code>' . esc_html($tags_str) . '</code>');
}

/**
 * Get a list of all the allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return array
 */
function tj_get_allowed_html_tags($level = 'basic') {
  $allowed_html = [
    'b' => [],
    'i' => [
      'class' => [],
    ],
    'u' => [],
    'em' => [],
    'br' => [],
    'abbr' => [
      'title' => [],
    ],
    'span' => [
      'class' => [],
    ],
    'strong' => [],
  ];

  if ($level === 'intermediate') {
    $allowed_html['a'] = [
      'href' => [],
      'title' => [],
      'class' => [],
      'id' => [],
      'target' => [],
    ];
  }

  if ($level === 'advance') {
    $allowed_html['ul'] = [
      'class' => [],
      'id' => [],
    ];
    $allowed_html['ol'] = [
      'class' => [],
      'id' => [],
    ];
    $allowed_html['li'] = [
      'class' => [],
      'id' => [],
    ];
    $allowed_html['a'] = [
      'href' => [],
      'title' => [],
      'class' => [],
      'id' => [],
      'target' => [],
    ];
  }

  return $allowed_html;
}


// WP kses allowed html tags
// ----------------------------------------------------------------------------------------
function tj_kses($raw) {

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
 * Get all Pages
 */
if (!function_exists('tj_get_all_pages')) {
  function tj_get_all_pages() {

    $page_list = get_posts(array(
      'post_type' => 'page',
      'orderby' => 'date',
      'order' => 'DESC',
      'posts_per_page' => 20,
    ));

    $pages = array();

    if (!empty($page_list) && !is_wp_error($page_list)) {
      foreach ($page_list as $page) {
        $pages[$page->ID] = $page->post_title;
      }
    }

    return $pages;
  }
}

/**
 * Check elementor version
 *
 * @param string $version
 * @param string $operator
 * @return bool
 */
if (!function_exists('tj_is_elementor_version')) {
  function tj_is_elementor_version($operator = '<', $version = '2.6.0') {
    return defined('ELEMENTOR_VERSION') && version_compare(ELEMENTOR_VERSION, $version, $operator);
  }
}


/**
 * Render icon html with backward compatibility
 *
 * @param array $settings
 * @param string $old_icon_id
 * @param string $new_icon_id
 * @param array $attributes
 */
if (!function_exists('tj_render_icon')) {
  function tj_render_icon($settings = [], $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = []) {
    // Check if its already migrated
    $migrated = isset($settings['__fa4_migrated'][$new_icon_id]);
    // Check if its a new widget without previously selected icon using the old Icon control
    $is_new = empty($settings[$old_icon_id]);

    $attributes['aria-hidden'] = 'true';

    if (tj_is_elementor_version('>=', '2.6.0') && ($is_new || $migrated)) {
      \Elementor\Icons_Manager::render_icon($settings[$new_icon_id], $attributes);
    } else {
      if (empty($attributes['class'])) {
        $attributes['class'] = $settings[$old_icon_id];
      } else {
        if (is_array($attributes['class'])) {
          $attributes['class'][] = $settings[$old_icon_id];
        } else {
          $attributes['class'] .= ' ' . $settings[$old_icon_id];
        }
      }
      printf('<i %s></i>', \Elementor\Utils::render_html_attributes($attributes));
    }
  }
}
