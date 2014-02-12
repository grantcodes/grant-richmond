<?php
if (!class_exists('Timber')){
    echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
}

$update_category = 'pish';
$update_count = 10;

$blog_category = 'blog';
$blog_count = 3;

$context = Timber::get_context();

$context['blog'] = Timber::get_posts( array( 'category_name' => $blog_category, 'posts_per_page' => $blog_count ) );
if ( $blog_count == count( $context['blog'] ) ) {
    $context['blog_more'] = get_category_by_slug( $blog_category );
}

$context['updates'] = Timber::get_posts( array( 'category_name' => $update_category, 'posts_per_page' => $update_count ) );
// $context['updates'] = Timber::get_posts( array( 'terms' => array( 'post-format-status' ), 'posts_per_page' => $update_count ) );
if ( $update_count == count( $context['updates'] ) ) $context['updates_more'] = get_category_by_slug( $update_category );
Timber::render( 'home.twig', $context );