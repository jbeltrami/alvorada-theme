<?php
function zor_related_posts()
{
  // Bail out if function doesn’t exist.
  if (!function_exists('acf_register_block')) {
    return;
  }

  // Register a new block.
  acf_register_block([
    'name'        => 'related-posts',
    'title'        => __('Related Posts'),
    'description'    => __('A custom block with related posts.'),
    'render_callback'  => 'zor_related_posts_render_callback',
    'category'      => 'alvorada',
    'icon'        => 'admin-comments',
    'keywords'      => array('related', 'posts'),
  ]);
}

function zor_related_posts_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();

  // Store block values.
  $context['block'] = $block;

  // Store field values.
  $context['fields'] = get_fields();

  // Store $is_preview value.
  $context['is_preview'] = $is_preview;

  // Render the block.
  Timber::render('/block/related-posts/related-posts.twig', $context);
}
