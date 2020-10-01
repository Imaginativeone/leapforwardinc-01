<?php 
  // Student Custom Post Type
  register_post_type('student', array(
    'show_in_rest' => true, // Modern Editor
    'supports' => array('title', 'editor', 'excerpt'), // CPT Excerpts now happen, 'editor' is mandatory
    // 'custom-fields' removed, using ACF now
    // 'rewrite' => array('slug' => 'students'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Students', // Menu Item
      'add_new_item' => 'Add New Student',
      'edit_item' => 'Edit Student',
      'all_items' => 'All Students',
      'singular_name' => 'Student'
    ),
    'menu_icon' => 'dashicons-calendar'
  ));
?>