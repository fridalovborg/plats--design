<?php

function create_post_type() {
  register_post_type( 'project',
    array(
      'labels' => array(
        'name' => __( 'Projects' ),
        'singular_name' => __( 'Project' )
      ),
      'supports' => array(
        'title', 
        'editor', 
        'thumbnail'
      ),
      'rewrite' => array('slug' => 'project'),
      'public' => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-star-filled',
    )
  );
}
add_action( 'init', 'create_post_type' );