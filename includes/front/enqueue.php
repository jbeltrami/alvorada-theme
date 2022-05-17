<?php

function zor_enqueue()
{
  $uri = get_theme_file_uri();

  // Register Styles
  wp_register_style('zor_style', $uri . '/static/css/index.min.css', []);
  wp_register_style('zor_bootstrap', $uri . '/static/css/bootstrap.min.css', []);

  // Enqueue Styles
  wp_enqueue_style('zor_style');
  wp_enqueue_style('zor_bootstrap');


  // Register Scripts
  wp_register_script('zor_functions', $uri . '/static/js/index.min.js', [], '', true);
  wp_register_script('zor_jquery', $uri . '/static/js/vendor/jquery-3.6.0.min.js', ['jquery'], '', true);

  // Enqueue Scripts
  wp_enqueue_script('zor_functions');
  wp_enqueue_script('jquery');
  wp_enqueue_script('zor_jquery');
}
