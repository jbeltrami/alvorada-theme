<?php

/**
 * Alvorada Cogumelos
 * Based on: https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

// Create blocks category

function custom_block_category($categories)
{
  return array_merge(
    $categories,
    [
      [
        'slug'  => 'alvorada',
        'title' => __('Alvorada Blocks'),
      ],
    ]
  );
}

// Includes
include get_theme_file_path('/includes/timber.php');
include get_theme_file_path('/includes/woocommerce.php');
include get_theme_file_path('/includes/front/enqueue.php');
include get_theme_file_path('/includes/blocks/text-image.php');
include get_theme_file_path('/includes/blocks/ctas.php');
include get_theme_file_path('/includes/blocks/infos.php');
include get_theme_file_path('/includes/blocks/richtext.php');
include get_theme_file_path('/includes/blocks/related-posts.php');

// Hooks
add_action('wp_enqueue_scripts', 'zor_enqueue');
add_action('after_setup_theme', 'theme_add_woocommerce_support');
add_action('block_categories', 'custom_block_category', 10, 2);
add_action('acf/init', 'zor_text_image');
add_action('acf/init', 'zor_ctas');
add_action('acf/init', 'zor_infos');
add_action('acf/init', 'zor_richtext');
add_action('acf/init', 'zor_related_posts');
