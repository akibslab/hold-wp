<?php

/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package Hold
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

while (have_posts()) :
  the_post();
?>

  <main id="content" <?php post_class('site-main'); ?> role="main">
    <?php if (apply_filters('hold_page_title', true)) : ?>
      <header class="page-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
      </header>
    <?php endif; ?>
    <div class="page-content">
      <?php the_content(); ?>
      <div class="post-tags">
        <?php the_tags('<span class="tag-links">' . __('Tagged ', 'hold'), null, '</span>'); ?>
      </div>
      <?php wp_link_pages(); ?>
    </div>

    <?php comments_template(); ?>
  </main>

<?php
endwhile;
