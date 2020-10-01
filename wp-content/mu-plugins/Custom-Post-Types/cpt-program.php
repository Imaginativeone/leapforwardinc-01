<?php 
  register_post_type('program', array(
    'show_in_rest' => true, // Modern Editor
    'supports' => array('title', 'editor', 'excerpt'), // CPT Excerpts now happen, 'editor' is mandatory
    // 'custom-fields' removed, using ACF now
    'rewrite' => array('slug' => 'programs'), // Custom Archive URL
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Programs', // Menu Item
      'add_new_item' => 'Add New Programs',
      'edit_item' => 'Edit Program',
      'all_items' => 'All Programs',
      'singular_name' => 'Program'
    ),
    'menu_icon' => 'dashicons-awards'
  ));
?>