<?php

/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$templates = array('search.twig', 'archive.twig', 'index.twig');

$context          = Timber::context();
$context['search_results'] = 'Resultados da pesquisa: ' . get_search_query();
$context['posts'] = new Timber\PostQuery();

Timber::render($templates, $context);
