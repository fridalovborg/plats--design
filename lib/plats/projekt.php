<?php
/**
* Custom post type - Projekt
*/
function create_post_type() {
  register_post_type( 'projekt',
    array(
      'labels' => array(
        'name' => __( 'Projekt' ),
        'singular_name' => __( 'Projekt' )
      ),
      'supports' => array(
        'title', 
        'editor', 
        'thumbnail'
      ),
      'rewrite' => array('slug' => 'projekt'),
      'public' => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-star-filled',
    )
  );
}
add_action( 'init', 'create_post_type' );