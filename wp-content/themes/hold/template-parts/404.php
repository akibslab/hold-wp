<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @package Hold
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<main id="content" class="site-main" role="main">
  <?php if (apply_filters('hold_page_title', true)) : ?>
    <header class="page-header">
      <h1 class="entry-title"><?php esc_html_e('The page can&rsquo;t be found.', 'hold'); ?></h1>
    </header>
  <?php endif; ?>
  <div class="page-content">
    <p><?php esc_html_e('It looks like nothing was found at this location.', 'hold'); ?></p>
  </div>

</main>