<?php
if (!class_exists('Timber')){
    echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
}
$context = Timber::get_context();

add_action( 'pre_get_posts', function( $query ) {
    $query->query_vars['posts_per_page'] = 0;
} );

// TODO: get proper title
$context['title'] = 'Pish';

$context['posts'] = Timber::get_posts();
Timber::render( 'category-pish.twig', $context );