<?php 
  // Student Custom Post Type
  // Student Post Type
  // No Archive
  register_post_type('student', array(
    'show_in_rest' => true, // Modern Editor; JSON data is now visible
    'supports'     => array('title', 'editor', 'excerpt', 'thumbnail'), // CPT Excerpts now happen, 'editor' is mandatory
    'public'       => true,
    'labels'       => array(
      'name'          => 'Students', // Menu Item
      'add_new_item'  => 'Add New Students',
      'edit_item'     => 'Edit Student',
      'all_items'     => 'All Students',
      'singular_name' => 'Student'
    ),
    'menu_icon' => 'dashicons-welcome-learn-more'
  ));
?>