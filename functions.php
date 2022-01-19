<?php
/**
 * Alvorada Cogumelos
 * Based on: https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

define('ZOR_DEV_MODE', true);

// Includes
include get_theme_file_path('/includes/timber.php');
include get_theme_file_path('/includes/front/enqueue.php');

// Hooks
add_action('wp_enqueue_scripts', 'zor_enqueue');